let isUpdateWeeklyReport = false;

let isUpdateMonthlyReport = false;


clearWeeklyReportForm = () => {
    isUpdateWeeklyReport = false
    $('#wr_patient_id').val('')
    $('#wr_report_no').val('')
    $('#wr_bfi').val(0)
    $('#wr_sts_30').val(0)
}


clearMonthlyReportForm = () => {
    isUpdateMonthlyReport = false
    $('#mr_patient_id').val('')
    $('#mr_report_no').val('')
    $('#mr_mwt6').val(0)
    $('#mr_barthel_index').val(0)
    $('#mr_mmrc').val(0)
}


listOfPatient = (selectIDComponent) => {

    selectIDComponent.select2({
        ajax: {
            type: 'GET',
            url: site_url + 'Api/Patient/listOfPatient',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'JSON',
            quietMillis: 250,
            data: function (params) {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true

            // results: function (data) {
            //     return {
            //         results: $.map(data, function (item) {
            //             return {
            //                 text: item.name,
            //                 id: item.id
            //             }
            //         })
            //     };
            // }
        }
    });

}


$(document).ready(function () {

    $("#wr_input_date").flatpickr();
    $("#mr_input_date").flatpickr();

    $('#kt_modal_weekly_report_loading').hide()
    $('#kt_modal_monthly_report_loading').hide()

    listOfPatient($('#wr_patient_id'))
    listOfPatient($('#mr_patient_id'))

    $('#kt_modal_weekly_report_add_form').submit(function () {
        return false;
    })

    $('#kt_modal_monthly_report_add_form').submit(function () {
        return false;
    })


    $('#kt_modal_weekly_report_cancel').click(function () {
        clearWeeklyReportForm();
    })


    $('#kt_modal_monthly_report_cancel').click(function () {
        clearMonthlyReportForm();
    })


    $('#kt_modal_weekly_report_submit').click(function () {

        if ($('#wr_petiant_id').val() == '') {

            showMessage('error', 'Pasien belum dipilih..')

        } else if ($('#wr_report_no').val() == '') {

            showMessage('error', 'Minggu ke belum diisi..')

        } else if ($('#wr_bfi').val() == '') {

            showMessage('error', 'BFI belum diisi..')

        } else if ($('#wr_sts_30').val() == '') {

            showMessage('error', 'STS 30 belum diisi..')

        } else {

            $('#kt_modal_weekly_report_submit').hide()
            $('#kt_modal_weekly_report_loading').show()

            setTimeout(() => {

                let setMethod = (isUpdateWeeklyReport == false) ? 'create' : 'update';

                $.ajax({
                    type: 'POST',
                    url: `${site_url}Api/WeeklyReport/${setMethod}`,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    data: new FormData($('#kt_modal_weekly_report_add_form')[0]),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: 'JSON',
                    success: function (response) {

                        if (response.status == true) {

                            showMessage('success', response.message)

                            $('#resetWeeklyReportBtn').click()

                            $('#kt_modal_weekly_report_cancel').click()

                        } else {

                            showMessage('error', response.message)

                        }

                        $('#kt_modal_weekly_report_submit').show();
                        $('#kt_modal_weekly_report_loading').hide();

                    }
                });

            }, 500)

        }


    })


    $('#kt_modal_monthly_report_submit').click(function () {

        if ($('#mr_petiant_id').val() == '') {

            showMessage('error', 'Pasien belum dipilih..')

        } else if ($('#mr_report_no').val() == '') {

            showMessage('error', 'Bulan ke belum diisi..')

        } else if ($('#mr_mwt6').val() == '') {

            showMessage('error', '6MWT belum diisi..')

        } else if ($('#mr_barthel_index').val() == '') {

            showMessage('error', 'Index Barthel belum diisi..')

        } else if ($('#mr_mmrc').val() == '') {

            showMessage('error', 'mMRC belum diisi..')

        } else {

            $('#kt_modal_monthly_report_submit').hide()
            $('#kt_modal_monthly_report_loading').show()

            setTimeout(() => {

                let setMethod = (isUpdateMonthlyReport == false) ? 'create' : 'update';

                $.ajax({
                    type: 'POST',
                    url: `${site_url}Api/MonthlyReport/${setMethod}`,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    data: new FormData($('#kt_modal_monthly_report_add_form')[0]),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: 'JSON',
                    success: function (response) {

                        if (response.status == true) {

                            showMessage('success', response.message)

                            $('#resetMonthlyReportBtn').click()

                            $('#kt_modal_monthly_report_cancel').click()

                        } else {

                            showMessage('error', response.message)

                        }

                        $('#kt_modal_monthly_report_submit').show();
                        $('#kt_modal_monthly_report_loading').hide();

                    }
                });

            }, 500)

        }


    })


    $('#mr_mwt6, #mr_barthel_index, #wr_bfi, #mr_mmrc, #wr_sts_30').keypress(function (e) {

        var charCode = (e.which) ? e.which : e.keyCode

        if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;

    })


})


$(document).on('input', '#mr_barthel_index', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) {

        $(this).val(Math.max(Math.min(value, 20), 0))
    }
})


$(document).on('input', '#wr_bfi', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 10), 0))

})


$(document).on('input', '#mr_mmrc', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 4), 0))

})


$(document).on('input', '#wr_sts_30', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 30), 0))

})


var getWeeklyEvaluation = function () {
    // Shared variables
    var table;
    var dt;

    // Private functions
    var initDatatable = function () {

        dt = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            // order: [[5, 'desc']],
            stateSave: true,
            ajax: {
                type: 'GET',
                url: site_url + 'Api/WeeklyReport/getAll',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                dataSrc: 'data'
            },
            columns: [
                { data: 'mr_no' },
                { data: 'name' },
                { data: 'report_no' },
                { data: 'input_date' },
                { data: 'bfi' },
                { data: 'sts_30' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    data: 'mr_no',
                    render: function (data, type, row) {
                        return `<span class='weekly_report_id d-none'>${row.id}</span>${row.mr_no}`;
                    }
                },
                {
                    targets: 1,
                    data: 'name',
                    render: function (data, type, row) {
                        return `${row.name}`;
                    }
                },
                {
                    targets: 2,
                    data: 'report_no',
                    render: function (data, type, row) {
                        return `${row.report_no}`;
                    }
                },
                {
                    targets: 3,
                    data: 'input_date',
                    render: function (data, type, row) {
                        return moment(row.input_date, 'YYYY-MM-DD').format('DD MMM YYYY')
                    }
                },
                {
                    targets: 4,
                    data: 'bfi',
                    render: function (data, type, row) {
                        return row.bfi
                    }
                },
                {
                    targets: 5,
                    data: 'sts_30',
                    render: function (data, type, row) {
                        return row.sts_30
                    }
                },
                {
                    targets: 6,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                Aksi
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-weekly-report-table-filter="delete_row">
                                        Hapus
                                    </a>
                                </div>
                                
                            </div>
                            
                        `;
                    }
                }
            ],

        });


        dt.on('draw', function () {
            handleDeleteRows();
            KTMenu.createInstances();
        });

    }

    var handleSearchWeeklyReport = function () {
        const filterSearch = document.querySelector('#searchWeeklyReport');

        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }


    // Delete weekly report
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-weekly-report-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get ID
                const weeklyReportID = parent.querySelector('.weekly_report_id').innerText;

                // console.log(patientID);

                // Get name
                const rmNo = parent.querySelectorAll('td')[0].innerText;
                const name = parent.querySelectorAll('td')[1].innerText;
                const week = parent.querySelectorAll('td')[2].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: `Apakah anda yakin ingin menghapus evaluasi mingguan ke-${week} pasien No. RM: ${rmNo}?`,
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {

                        $.ajax({
                            type: "POST",
                            url: site_url + 'Api/WeeklyReport/delete',
                            headers: { 'X-Requested-With': 'XMLHttpRequest' },
                            data: {
                                id: weeklyReportID
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response == true) {

                                    showMessage('info', `Evaluasi mingguan ke-${week} pasien No. RM ${rmNo} berhasil dihapus!`)

                                    dt.draw();

                                } else {

                                    showMessage('error', `Evaluasi mingguan ke-${week} pasien No. RM ${rmNo} tidak bisa dihapus atau sudah digunakan!`)

                                }
                            }
                        });


                    } else if (result.dismiss === 'cancel') {

                        showMessage('error', `Evaluasi mingguan ke-${week} pasien No. RM ${rmNo} batal dihapus!`)

                    }
                });
            })
        });
    }


    // Save and Update
    var handleResetTable = () => {

        const resetTable = document.querySelector('[data-kt-weekly-table-filter="reset"]');

        resetTable.addEventListener('click', function (e) {

            e.preventDefault();

            dt.draw();

        });

    }

    // Public methods
    return {
        init: function () {

            table = document.querySelector('#table-weekly-report');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearchWeeklyReport();
            handleDeleteRows
            handleResetTable();
        }
    }
}();


var getMonthlyEvaluation = function () {
    // Shared variables
    var table;
    var dt;

    // Private functions
    var initDatatable = function () {

        dt = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: {
                type: 'GET',
                url: site_url + 'Api/MonthlyReport/getAll',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                dataSrc: 'data'
            },
            columns: [
                { data: 'mr_no' },
                { data: 'name' },
                { data: 'report_no' },
                { data: 'input_date' },
                { data: 'mwt6' },
                { data: 'barthel_index' },
                { data: 'mmrc' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    data: 'mr_no',
                    render: function (data, type, row) {
                        return `<span class='monthly_report_id d-none'>${row.id}</span>${row.mr_no}`;
                    }
                },
                {
                    targets: 1,
                    data: 'name',
                    render: function (data, type, row) {
                        return `${row.name}`;
                    }
                },
                {
                    targets: 2,
                    data: 'report_no',
                    render: function (data, type, row) {
                        return `${row.report_no}`;
                    }
                },
                {
                    targets: 3,
                    data: 'input_date',
                    render: function (data, type, row) {
                        return moment(row.input_date, 'YYYY-MM-DD').format('DD MMM YYYY')
                    }
                },
                {
                    targets: 4,
                    data: 'mwt6',
                    render: function (data, type, row) {
                        return row.mwt6
                    }
                },
                {
                    targets: 5,
                    data: 'barthel_index',
                    render: function (data, type, row) {
                        return row.barthel_index
                    }
                },
                {
                    targets: 6,
                    data: 'mmrc',
                    render: function (data, type, row) {
                        return row.mmrc
                    }
                },
                {
                    targets: 7,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                Aksi
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-monthly-report-table-filter="delete_row">
                                        Hapus
                                    </a>
                                </div>
                                
                            </div>
                            
                        `;
                    }
                }
            ],

        });


        dt.on('draw', function () {
            handleDeleteRows();
            KTMenu.createInstances();
        });

    }

    var handleSearchMonthlyReport = function () {
        const filterSearch = document.querySelector('#searchMonthlyReport');

        filterSearch.addEventListener('keyup', function (e) {

            dt.search(e.target.value).draw();

        });
    }


    // Delete weekly report
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-monthly-report-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get ID
                const monthlyReportID = parent.querySelector('.monthly_report_id').innerText;

                // console.log(patientID);

                // Get name
                const rmNo = parent.querySelectorAll('td')[0].innerText;
                const name = parent.querySelectorAll('td')[1].innerText;
                const month = parent.querySelectorAll('td')[2].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: `Apakah anda yakin ingin menghapus evaluasi bulanan ke-${month} pasien No. RM: ${rmNo}?`,
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {

                        $.ajax({
                            type: "POST",
                            url: site_url + 'Api/MonthlyReport/delete',
                            headers: { 'X-Requested-With': 'XMLHttpRequest' },
                            data: {
                                id: monthlyReportID
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response == true) {

                                    showMessage('info', `Evaluasi bulanan ke-${month} pasien No. RM ${rmNo} berhasil dihapus!`)

                                    dt.draw();

                                } else {

                                    showMessage('error', `Evaluasi bulanan ke-${month} pasien No. RM ${rmNo} tidak bisa dihapus atau sudah digunakan!`)

                                }
                            }
                        });


                    } else if (result.dismiss === 'cancel') {

                        showMessage('error', `Evaluasi bulanan ke-${month} pasien No. RM ${rmNo} batal dihapus!`)

                    }
                });
            })
        });
    }


    // Save and Update
    var handleResetTable = () => {

        const resetTable = document.querySelector('[data-kt-monthly-table-filter="reset"]');

        resetTable.addEventListener('click', function (e) {

            e.preventDefault();

            dt.draw();

        });

    }

    // Public methods
    return {
        init: function () {

            table = document.querySelector('#table-monthly-report');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearchMonthlyReport();
            handleDeleteRows
            handleResetTable();
        }
    }
}();


// On document ready
KTUtil.onDOMContentLoaded(function () {

    getWeeklyEvaluation.init();
    getMonthlyEvaluation.init();

});


