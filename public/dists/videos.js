var isUpdate = false;


saveData = () => {

    $('.indicator-label').hide();
    $('.indicator-progress').show();
    $('.spinner-border').show();

    $.ajax({
        type: 'POST',
        url: site_url + 'Api/Videos/create',
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
                    text: 'Data tautan video berhasil ditambahkan',
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
        url: site_url + 'Api/Videos/update',
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


editData = (video_id) => {

    isUpdate = true;

    $.ajax({
        type: 'GET',
        url: site_url + 'Api/Videos/getByID/' + video_id,
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'JSON',
        success: function (response) {

            $('#video_id').val(video_id);
            $('#order_no').val(response.order_no);
            $('#name').val(response.name);
            $('#link').val(response.link);

            if (response.status == 'Public') {
                $('#status_1').prop('checked', true);
            } else {
                $('#status_2').prop('checked', true);
            }

        }
    })

}


clearForm = () => {
    isUpdate = false;
    $('#video_id').val('');
    $('#order_no').val('');
    $('#name').val('');
    $('#link').val('');
}


$(document).ready(function () {

    $('.input_link').hide()
    $('.input_local').hide()


    $('#kt_modal_add_form').submit(function () {
        return false;
    })


    $('#kt_modal_add_submit').click(function () {

        console.log(isUpdate);

        if ($('#order_no').val() == '') {

            Swal.fire({
                text: "No. urut belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#name').val() == '') {

            Swal.fire({
                text: "Nama latihan belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('#link').val() == '') {

            Swal.fire({
                text: "Tautan video belum diisi..",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })

        } else if ($('input[name="status"]').length == 0) {

            Swal.fire({
                text: "Status video belum dipilih..",
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


    $('.source_type').click(function () {

        var source_type = $(this).val();

        if (source_type == 'YouTube') {
            $('.input_link').show()
            $('.input_local').hide()
        } else {
            $('.input_local').show()
            $('.input_link').hide()
        }

    })


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
                url: site_url + 'Api/Videos/getAll',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                dataSrc: 'data'
            },
            columns: [
                { data: 'order_no' },
                { data: 'name' },
                { data: 'link' },
                { data: 'status' },
                { data: null }
            ],
            columnDefs: [
                {
                    targets: 0,
                    data: 'order_no',
                    render: function (data, type, row) {
                        return `<span class="video_id d-none">${row.id}</span>${row.order_no}`;
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
                    data: 'link',
                    render: function (data, type, row) {
                        return `<a href="${row.link}" target="_blank">${row.link}</a>`;
                    }
                },
                {
                    targets: 3,
                    data: 'status',
                    render: function (data, type, row) {
                        return `${row.status}`;
                    }
                },
                {
                    targets: 4,
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
        const documentTitle = 'Video Latihan';
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
                const videoID = parent.querySelector('.video_id').innerText;

                // console.log(videoID);

                // Get name
                const videoName = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Apakah anda yakin ingin menghapus " + videoName + "?",
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
                            url: site_url + 'Api/Videos/delete',
                            headers: { 'X-Requested-With': 'XMLHttpRequest' },
                            data: {
                                id: videoID
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response == true) {

                                    Swal.fire({
                                        text: "Tautan " + videoName + " berhasil dihapus!",
                                        icon: 'info',
                                        confirmButtonText: 'OK',
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    })

                                    dt.draw();

                                } else {

                                    Swal.fire({
                                        text: "Tautan " + videoName + " tidak bisa dihapus atau sudah digunakan!",
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    })

                                }
                            }
                        });


                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: videoName + " batal dihapus.",
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
                const videoID = parent.querySelector('.video_id').innerText;


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
        const container = document.querySelector('#table-videos');
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

            table = document.querySelector('#table-videos');

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


// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});

