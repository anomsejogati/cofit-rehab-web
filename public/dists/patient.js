let isUpdate = false;


saveData = () => {

    $('.indicator-label').hide();
    $('.indicator-progress').show();
    $('.spinner-border').show();

    $.ajax({
        type: 'POST',
        url: site_url + 'Api/Patient/create',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        data: new FormData($('#kt_modal_add_form')[0]),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        dataType: 'JSON',
        success: function (response) {

            if (response.status == true) {

                Swal.fire({
                    text: 'Data pasien berhasil ditambahkan',
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })

                $('#resetBtn').click();

                $('#kt_modal_add_cancel').click();

            } else {

                Swal.fire({
                    text: response.message,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })

            }

            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('.spinner-border').hide();

        }
    });

}


updateData = () => {

    $('.indicator-label').hide();
    $('.indicator-progress').show();
    $('.spinner-border').show();

    $.ajax({
        type: 'POST',
        url: site_url + 'Api/Patient/update',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        data: new FormData($('#kt_modal_add_form')[0]),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        dataType: 'JSON',
        success: function (response) {

            if (response.status == true) {

                Swal.fire({
                    text: response.message,
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })

                $('#resetBtn').click();

                $('#kt_modal_add_cancel').click();

            } else {

                Swal.fire({
                    text: response.message,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })

            }

            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('.spinner-border').hide();

        }
    });

}


editData = (patient_id) => {

    clearForm();

    isUpdate = true;

    $.ajax({
        type: 'GET',
        url: site_url + 'Api/Patient/getByID/' + patient_id,
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'JSON',
        success: function (response) {

            $('#patient_id').val(patient_id);
            $('#user_id').val(response.user_id);
            $('#mr_no').val(response.mr_no);
            $('#name').val(response.name);

            if (response.status == 'L') {
                $('#gender_1').prop('checked', true);
            } else {
                $('#gender_2').prop('checked', true);
            }

            $('#birth_date').val(response.birth_date);
            $('#education').val(response.education);
            $('#profession').val(response.profession);
            $('#email').val(response.email);
            $('#phone_no').val(response.phone_no);
            $('#address').val(response.address);

            if (response.exercise_habits == 'Ya') {
                $('#exercise_habits_1').prop('checked', true);
            } else {
                $('#exercise_habits_2').prop('checked', true);
            }

            $('#exercise_habits_frek').val(response.exercise_habits_frek);
            $('#exercise_type').val(response.exercise_type);

            $('#date_pos_covid').val(response.date_pos_covid);
            // $('#date_neg_covid').val(response.date_neg_covid);
            if (response.covid_level == 'OTG') {
                $('#covid_level_1').prop('checked', true);
            } else if (response.covid_level == 'Ringan') {
                $('#covid_level_2').prop('checked', true);
            } else if (response.covid_level == 'Sedang') {
                $('#covid_level_3').prop('checked', true);
            } else if (response.covid_level == 'Berat') {
                $('#covid_level_4').prop('checked', true);
            } else if (response.covid_level == 'Kritis') {
                $('#covid_level_5').prop('checked', true);
            }

            if (response.confirmed_positive == '1') {
                $('#confirmed_positive_1').prop('checked', true);
            } else if (response.covid_level == '2') {
                $('#confirmed_positive_2').prop('checked', true);
            } else if (response.covid_level == '3') {
                $('#confirmed_positive_3').prop('checked', true);
            }

            $('#covid_confirmed_date_1').val(response.covid_confirmed_date_1);
            $('#covid_degree_1').val(response.covid_degree_1);
            $('#covid_confirmed_date_2').val(response.covid_confirmed_date_2);
            $('#covid_degree_2').val(response.covid_degree_2);
            $('#covid_confirmed_date_3').val(response.covid_confirmed_date_3);
            $('#covid_degree_3').val(response.covid_degree_3);

            $('#vaccine_date_1').val(response.vaccine_date_1);
            $('#vaccine_type_1').val(response.vaccine_type_1);
            $('#vaccine_date_2').val(response.vaccine_date_2);
            $('#vaccine_type_2').val(response.vaccine_type_2);
            $('#vaccine_date_3').val(response.vaccine_date_3);
            $('#vaccine_type_3').val(response.vaccine_type_3);

            //history of chronic disease
            var pcc = response.post_covid_complaints;

            if (pcc.includes('Fatigue/Kelelahan')) {

                $('#post_covid_complaints_1').prop('checked', true);

            }

            if (pcc.includes('Batuk/Sesak Napas')) {

                $('#post_covid_complaints_2').prop('checked', true);

            }

            if (pcc.includes('Nyeri Sendi/Otot')) {

                $('#post_covid_complaints_3').prop('checked', true);

            }

            if (pcc.includes('Sakit Kepala')) {

                $('#post_covid_complaints_4').prop('checked', true);

            }

            if (pcc.includes('Insomnia')) {

                $('#post_covid_complaints_5').prop('checked', true);

            }

            if (pcc.includes('Gangguan Konsentrasi/Memori')) {

                $('#post_covid_complaints_6').prop('checked', true);

            }


            if (response.smoking_habits == 'Ya') {
                $('#smoking_habits_1').prop('checked', true);
            } else {
                $('#smoking_habits_2').prop('checked', true);
            }

            if (response.smoking_record == 'Ya') {
                $('#smoking_record_1').prop('checked', true);
            } else {
                $('#smoking_record_2').prop('checked', true);
            }

            $('#year_started_smoking').val(response.year_start);
            $('#year_end_smoking').val(response.year_end);
            $('#num_of_cigarettes').val(response.num_of_cigarettes);

            //history of chronic disease
            var strng = response.hocd_pra;

            if (strng.includes('Hipertensi')) {

                $('#hocd_pra_1').prop('checked', true);

            }

            if (strng.includes('Jantung Koroner')) {

                $('#hocd_pra_2').prop('checked', true);

            }

            if (strng.includes('Gagal Jantung')) {

                $('#hocd_pra_3').prop('checked', true);

            }

            if (strng.includes('Stroke')) {

                $('#hocd_pra_4').prop('checked', true);

            }

            if (strng.includes('Diabetes')) {

                $('#hocd_pra_5').prop('checked', true);

            }

            if (strng.includes('TBC')) {

                $('#hocd_pra_6').prop('checked', true);

            }

            if (strng.includes('Keganasan')) {

                $('#hocd_pra_7').prop('checked', true);

            }

            if (strng.includes('Gagal Ginjal')) {

                $('#hocd_pra_8').prop('checked', true);

            }

            $('#hocd_pra_other').val(response.hocd_pra_other);


            var strng = response.hocd_post;

            if (strng.includes('Hipertensi')) {

                $('#hocd_post_1').prop('checked', true);

            }

            if (strng.includes('Jantung Koroner')) {

                $('#hocd_post_2').prop('checked', true);

            }

            if (strng.includes('Gagal Jantung')) {

                $('#hocd_post_3').prop('checked', true);

            }

            if (strng.includes('Stroke')) {

                $('#hocd_post_4').prop('checked', true);

            }

            if (strng.includes('Diabetes')) {

                $('#hocd_post_5').prop('checked', true);

            }

            if (strng.includes('TBC')) {

                $('#hocd_post_6').prop('checked', true);

            }

            if (strng.includes('Keganasan')) {

                $('#hocd_post_7').prop('checked', true);

            }

            if (strng.includes('Gagal Ginjal')) {

                $('#hocd_post_8').prop('checked', true);

            }

            $('#hocd_post_other').val(response.hocd_post_other);

            $('#tb').val(response.tb);
            $('#bb_pra').val(response.bb_pra);
            $('#imt_pra').val(response.imt_pra);
            $('#mwt6').val(response.mwt6);

            $('#barthel_index').val(response.barthel_index);
            $('#bfi').val(response.bfi);
            $('#mmrc').val(response.mmrc);
            $('#eq5d5l').val(response.eq5d5l);
            $('#eq_vas').val(response.eq_vas);
            $('#psqi').val(response.psqi);
            $('#gad7').val(response.gad7);
            $('#phq9').val(response.phq9);
            $('#moca_ina').val(response.moca_ina);
            $('#handgrip').val(response.handgrip);
            $('#sts_30').val(response.sts_30);
            $('#chest_expansion').val(response.chest_expansion);

            $('#rehab_option').val(response.rehab_option);
            $('#rehab_start').val(response.rehab_start);
            $('#rehab_end').val(response.rehab_end);

        }
    })

}


clearForm = () => {
    isUpdate = false;
    $('#patient_id').val('');
    $('#mr_no').val('');
    $('#name').val('');

    $('#birth_date').val('');
    $('#education').val('');
    $('#profession').val('');
    $('#email').val('');
    $('#phone_no').val('');
    $('#address').val('');

    $('input[name="exercise_habits"]').prop('checked', false);
    $('#exercise_habits_frek').val('0');
    $('#exercise_type').val('');

    $('#date_pos_covid').val('');
    // $('#date_neg_covid').val('');
    $('input[name="covid_level"]').prop('checked', false);
    $('input[name="confirmed_positive"]').prop('checked', false);
    $('#covid_confirmed_date_1').val('');
    $('#covid_degree_1').val('');
    $('#covid_confirmed_date_2').val('');
    $('#covid_degree_2').val('');
    $('#covid_confirmed_date_3').val('');
    $('#covid_degree_3').val('');

    $('#vaccine_date_1').val('');
    $('#vaccine_type_1').val('');
    $('#vaccine_date_2').val('');
    $('#vaccine_type_2').val('');
    $('#vaccine_date_3').val('');
    $('#vaccine_type_3').val('');

    $('.post_covid_complaints').prop('checked', false);

    $('#smoking_habits_2').prop('checked', true);
    $('#smoking_record_2').prop('checked', true);
    $('#year_started_smoking').val('');
    $('#year_end_smoking').val('');
    $('#num_of_cigarettes').val(0);

    //history of chronic disease
    $('.hocd_pra').prop('checked', false);
    $('.hocd_post').prop('checked', false);
    $('#hocd_pra_other').val('');
    $('#hocd_post_other').val('');

    $('#tb').val('');
    $('#bb_pra').val('');
    $('#imt_pra').val('');
    // $('#bb_post').val('');
    $('#mwt6').val('');

    $('#barthel_index').val(0);
    $('#bfi').val(0);
    $('#mmrc').val(0);
    $('#eq5d5l').val('');
    $('#eq_vas').val(0);
    $('#psqi').val(0);
    $('#gad7').val(0);
    $('#phq9').val(0);
    $('#moca_ina').val(0);
    $('#handgrip').val('');
    $('#sts_30').val(0);
    $('#chest_expansion').val('');

    $('#rehab_option').val('1');
    $('#rehab_start').val('');
    $('#rehab_end').val('');
}


$(document).ready(function () {

    $("#birth_date").flatpickr();
    $("#date_pos_covid").flatpickr();
    $("#covid_confirmed_date_1").flatpickr();
    $("#covid_confirmed_date_2").flatpickr();
    $("#covid_confirmed_date_3").flatpickr();
    $("#vaccine_date_1").flatpickr();
    $("#vaccine_date_2").flatpickr();
    $("#vaccine_date_3").flatpickr();
    $("#rehab_start").flatpickr();
    $("#rehab_end").flatpickr();

    $('.exercise_habits_add').hide()
    // $('.smoking_record_add').hide()
    $('.smoking_year_add').hide()
    $('.num_of_cigarettes').hide()
    $('.input_covid_confirmed').hide();

    $('#kt_modal_add_form').submit(function () {
        return false;
    })

    $('#kt_modal_weekly_report_add_form').submit(function () {
        return false;
    })

    $('#kt_modal_monthly_report_add_form').submit(function () {
        return false;
    })


    $('#exportBtn').click(function () {
        $('.exportExcelBtn').click()
    })


    $('#kt_modal_add_submit').click(function () {

        if ($('#mr_no').val() == '') {

            Swal.fire({
                text: "No. RM belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#name').val() == '') {

            Swal.fire({
                text: "Nama pasien belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('input[name="gender"]').length == 0) {

            Swal.fire({
                text: "Jenis kelamin belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#birth_date').val() == '') {

            Swal.fire({
                text: "Tanggal lahir belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#education').val() == '') {

            Swal.fire({
                text: "Pendidikan belum dipilih..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#phone_no').val() == '') {

            Swal.fire({
                text: "No. HP belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else {

            if (isUpdate == false) {

                saveData();

            } else {

                updateData();

            }

        }


    })


    $('#kt_modal_add_cancel').click(function () {
        clearForm();
    })

    $('#kt_modal_weekly_report_cancel').click(function () {
        clearWeeklyReportForm();
    })

    $('#kt_modal_monthly_report_cancel').click(function () {
        clearMonthlyReportForm();
    })


    $('.exercise_habits').click(function () {

        if ($(this).val() == 'Ya') {

            $('.exercise_habits_add').show()

        } else {

            $('.exercise_habits_add').hide()

        }

    })


    $('.smoking_habits').click(function () {

        if ($(this).val() == 'Tidak') {

            $('.smoking_record_add').show()

        } else {

            $('.smoking_record_add').hide()

        }

    })


    $('.smoking_record').click(function () {

        if ($(this).val() == 'Ya') {

            $('.smoking_year_add').show()
            $('.num_of_cigarettes').show()

        } else {

            $('.smoking_year_add').hide()
            $('.num_of_cigarettes').hide()

        }

    })


    $('.confirmed_positive').click(function () {

        var id = $(this).val();
        console.log(id);
        $('.input_covid_confirmed').hide();

        if (id == 1) {
            $('.input_covid_confirmed_1').show();
        } else if (id == 2) {
            $('.input_covid_confirmed_1').show();
            $('.input_covid_confirmed_2').show();
        } else if (id == 3) {
            $('.input_covid_confirmed_1').show();
            $('.input_covid_confirmed_2').show();
            $('.input_covid_confirmed_3').show();
        }


    })


    $('#bb_pra').keyup(function () {

        if ($(this).val() == '' || $(this).val() == 0) {

            $('#imt_pra').val(0);

        } else {
            var tb = $('#tb').val();
            var bb_pra = $(this).val();

            var imt_pra = parseFloat(bb_pra) / ((parseFloat(tb) / 100) * (parseFloat(tb) / 100));

            $('#imt_pra').val(imt_pra.toFixed(2));

        }

    })


    $('#tb, #bb_pra, #mwt6, #barthel_index, #bfi, #mmrc, #eq_vas, #psqi, #gad7, #phq9, #moca_ina, #handgrip, #sts_30').keypress(function (e) {

        var charCode = (e.which) ? e.which : e.keyCode

        if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;

    })


    $('#eq5d5l').keypress(function (e) {

        var charCode = (e.which) ? e.which : e.keyCode

        if (String.fromCharCode(charCode).match(/[^0-5]/g)) return false;

        if ($(this).val().length == 5) return false;

    })


    $('#chest_expansion').keypress(function (e) {

        var charCode = (e.which) ? e.which : e.keyCode

        if (String.fromCharCode(charCode).match(/[^0-5]/g)) return false;

        if ($(this).val().length == 3) return false;

    })


})


$(document).on('input', '#barthel_index', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) {

        $(this).val(Math.max(Math.min(value, 20), 0))
    }
})


$(document).on('input', '#bfi', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 10), 0))

})


$(document).on('input', '#mmrc', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 4), 0))

})


$(document).on('input', '#eq_vas', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 100), 0))

})


$(document).on('input', '#psqi', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 21), 0))

})


$(document).on('input', '#gad7', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 21), 0))

})


$(document).on('input', '#phq9', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 27), 0))

})


$(document).on('input', '#sts_30', function () {

    var value = $(this).val()

    if ((value !== '') && (value.indexOf('.') === -1)) $(this).val(Math.max(Math.min(value, 30), 0))

})

// Class definition
var KTDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;

    // Private functions
    var initDatatable = function () {

        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 4th column in table
            dateRow[3].setAttribute('data-order', realDate);
        });

        dt = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            // order: [[5, 'desc']],
            stateSave: true,
            ajax: {
                type: 'GET',
                url: site_url + 'Api/Patient/getAll',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                dataSrc: 'data'
            },
            columns: [
                { data: 'mr_no' },
                { data: 'name' },
                { data: 'email' },
                { data: 'phone_no' },
                { data: 'created_at' },
                { data: null }
            ],
            columnDefs: [
                {
                    targets: 0,
                    data: 'mr_no',
                    render: function (data, type, row) {
                        return `<span class="patient_id d-none">${row.id}</span>${row.mr_no}`;
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
                    data: 'email',
                    render: function (data, type, row) {
                        return `${row.email}`;
                    }
                },
                {
                    targets: 3,
                    data: 'phone',
                    render: function (data, type, row) {
                        return `${row.phone_no}`;
                    }
                },
                {
                    targets: 4,
                    data: 'created_at',
                    render: function (data, type, row) {
                        return `${row.created_at}`;
                    }
                },
                {
                    targets: 5,
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
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-customer-table-filter="edit_row" data-bs-toggle="modal" data-bs-target="#kt_modal_add" onClick="editData(${row.id})">
                                        Ubah
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">
                                        Hapus
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        `;
                    },
                },
            ],

        });

        // table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            initToggleToolbar();
            handleDeleteRows();
            KTMenu.createInstances();
        });
    }


    // Hook export buttons
    var exportButtons = () => {
        const documentTitle = 'Data Pasien';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle
                }
            ]
        }).container().appendTo($('#kt_datatable_example_buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#kt_datatable_example_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-customer-table-filter="search"]');

        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }


    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-customer-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get ID
                const patientID = parent.querySelector('.patient_id').innerText;

                // console.log(patientID);

                // Get name
                const rmNo = parent.querySelectorAll('td')[0].innerText;
                const name = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Apakah anda yakin ingin menghapus pasien No. RM: " + rmNo + "?",
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
                            url: site_url + 'Api/Patient/delete',
                            headers: { 'X-Requested-With': 'XMLHttpRequest' },
                            data: {
                                id: patientID
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response == true) {

                                    Swal.fire({
                                        text: "Pasien No. RM" + rmNo + " berhasil dihapus!",
                                        icon: 'info',
                                        confirmButtonText: 'OK',
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    })

                                    dt.draw();

                                } else {

                                    Swal.fire({
                                        text: "Pasien No. RM " + rmNo + " tidak bisa dihapus atau sudah digunakan!",
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    })

                                }
                            }
                        });


                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: name + " batal dihapus.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }


    // Edit data
    var handleEditRows = () => {

        const editButtons = document.querySelectorAll('[data-kt-customer-table-filter="edit_row"]');

        editButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get ID
                const pasitnID = parent.querySelector('.patient_id').innerText;


            })
        });
    }


    // Save and Update
    var handleResetTable = () => {

        const resetTable = document.querySelector('[data-kt-customer-table-filter="resetBtn"]');

        resetTable.addEventListener('click', function (e) {

            e.preventDefault();

            dt.draw();

        });

    }

    // Init toggle toolbar
    var initToggleToolbar = function () {
        // Toggle selected action toolbar
        // Select all checkboxes
        const container = document.querySelector('#table-patient');
        const checkboxes = container.querySelectorAll('[type="checkbox"]');

        // Select elements
        const deleteSelected = document.querySelector('[data-kt-customer-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

    }

    // Public methods
    return {
        init: function () {

            table = document.querySelector('#table-patient');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearchDatatable();
            initToggleToolbar();
            handleDeleteRows();
            // handleEditRows();
            handleResetTable();
            exportButtons();
        }
    }
}();


var getExerciseMenu = function () {
    // Shared variables
    var table;
    var dt;

    // Private functions
    var initDatatable = function () {

        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 4th column in table
            dateRow[3].setAttribute('data-order', realDate);
        });

        dt = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            // order: [[5, 'desc']],
            stateSave: true,
            ajax: {
                type: 'GET',
                url: site_url + 'Api/Patient/getExerciseMenu',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                dataSrc: 'data'
            },
            columns: [
                { data: 'mr_no' },
                { data: 'name' },
                { data: 'lat_pernapasan' },
                { data: 'lat_aerobik_1' },
                { data: 'lat_aerobik_2' },
                { data: 'lat_aerobik_3' },
                { data: 'lat_penguatan' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    data: 'mr_no',
                    render: function (data, type, row) {
                        return `${row.mr_no}`;
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
                    data: 'lat_pernapasan',
                    render: function (data, type, row) {
                        if (row.lat_pernapasan == 1) {
                            return `<span class="badge badge-light-success fs-base me-2"><i class="fas fa-check-circle"></i></span>`;
                        } else {
                            return `<span class="badge badge-light-danger fs-base me-2"><i class="far fa-times-circle"></i></span>`;
                        }
                    }
                },
                {
                    targets: 3,
                    data: 'lat_aerobik_1',
                    render: function (data, type, row) {
                        if (row.lat_aerobik_1 == 1) {
                            return `<span class="badge badge-light-success fs-base me-2"><i class="fas fa-check-circle"></i></span>`;
                        } else {
                            return `<span class="badge badge-light-danger fs-base me-2"><i class="far fa-times-circle"></i></span>`;
                        }
                    }
                },
                {
                    targets: 4,
                    data: 'lat_aerobik_2',
                    render: function (data, type, row) {
                        if (row.lat_aerobik_2 == 1) {
                            return `<span class="badge badge-light-success fs-base me-2"><i class="fas fa-check-circle"></i></span>`;
                        } else {
                            return `<span class="badge badge-light-danger fs-base me-2"><i class="far fa-times-circle"></i></span>`;
                        }
                    }
                },
                {
                    targets: 5,
                    data: 'lat_aerobik_3',
                    render: function (data, type, row) {
                        if (row.lat_aerobik_3 == 1) {
                            return `<span class="badge badge-light-success fs-base me-2"><i class="fas fa-check-circle"></i></span>`;
                        } else {
                            return `<span class="badge badge-light-danger fs-base me-2"><i class="far fa-times-circle"></i></span>`;
                        }
                    }
                },
                {
                    targets: 6,
                    data: 'lat_penguatan',
                    render: function (data, type, row) {
                        if (row.lat_penguatan == 1) {
                            return `<span class="badge badge-light-success fs-base me-2"><i class="fas fa-check-circle"></i></span>`;
                        } else {
                            return `<span class="badge badge-light-danger fs-base me-2"><i class="far fa-times-circle"></i></span>`;
                        }
                    }
                }
            ],

        });

        // table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            // initToggleToolbar();
            KTMenu.createInstances();
        });
    }


    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-exercise-table-filter="search"]');

        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }


    // Save and Update
    var handleResetTable = () => {

        const resetTable = document.querySelector('[data-kt-exercise-table-filter="resetBtn"]');

        resetTable.addEventListener('click', function (e) {

            e.preventDefault();

            dt.draw();

        });

    }

    // Public methods
    return {
        init: function () {

            table = document.querySelector('#table-exercise-menu');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearchDatatable();
            handleResetTable();
        }
    }
}();



// On document ready
KTUtil.onDOMContentLoaded(function () {

    KTDatatablesServerSide.init();
    getExerciseMenu.init();

});
