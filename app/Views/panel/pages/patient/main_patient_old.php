<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari Pasien.." />
            </div>
            <!--end::Search-->
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">   
                
                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr091.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(0 -1 -1 0 12.75 19.75)" fill="currentColor"></rect>
                            <path d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z" fill="currentColor"></path>
                            <path opacity="0.3" d="M18.75 15.75H17.75C17.1977 15.75 16.75 15.3023 16.75 14.75C16.75 14.1977 17.1977 13.75 17.75 13.75C18.3023 13.75 18.75 13.3023 18.75 12.75V5.75C18.75 5.19771 18.3023 4.75 17.75 4.75L5.75 4.75C5.19772 4.75 4.75 5.19771 4.75 5.75V12.75C4.75 13.3023 5.19771 13.75 5.75 13.75C6.30229 13.75 6.75 14.1977 6.75 14.75C6.75 15.3023 6.30229 15.75 5.75 15.75H4.75C3.64543 15.75 2.75 14.8546 2.75 13.75V4.75C2.75 3.64543 3.64543 2.75 4.75 2.75L18.75 2.75C19.8546 2.75 20.75 3.64543 20.75 4.75V13.75C20.75 14.8546 19.8546 15.75 18.75 15.75Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Export
                </button>     
                <div id="kt_datatable_example_export_menu" data-kt-menu="true" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-200px py-4" style="">
                    <div class="menu-item px-3">
                        <a href="/Api/Patient/exportExcel" target="_blank" class="menu-link px-3">Export as Excel</a>
                    </div>
                </div>                   
                
                <div id="kt_datatable_example_buttons" class="d-none">
                    <div class="dt-buttons btn-group flex-wrap">                              
                        <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="kt_datatable_example" type="button"><span>Excel</span></button>
                    </div>
                </div>
                <!--begin::Add customer-->
                <button type="button" id="addBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add" onClick="clearForm()">Tambah Pasien</button>
                <!--end::Add customer-->

                <button type="button" id="resetBtn" data-kt-customer-table-filter="resetBtn" class="btn btn-light d-none">Reset</button>
            </div>
            <!--end::Toolbar-->
            
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table-patient">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bold text-uppercase gs-0">
                    <th class="min-w-125px">No. RM</th>
                    <th class="min-w-125px">Nama Pasien</th>
                    <th class="min-w-125px">Email</th>
                    <th class="min-w-125px">No. HP</th>
                    <th class="min-w-125px">Dibuat pada</th>
                    <th class="text-end min-w-70px">Aksi</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-semibold text-gray-600">

            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->

<div class="modal bg-white fade" tabindex="-1" id="kt_modal_add">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content shadow-none">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Pasien</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

                <form id="kt_modal_add_form">

                    <input type="hidden" id="patient_id" name="patient_id">
                    <input type="hidden" id="user_id" name="user_id">

                    <div class="d-flex flex-column flex-md-row rounded border p-10">

                        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-10 mb-3 mb-md-0 fs-6 min-w-lg-300px" role="tablist">
                            <li class="nav-item w-100 me-0 mb-md-2" role="presentation">
                                <a class="nav-link w-100 btn btn-flex btn-active-light-success active" data-bs-toggle="tab" href="#kt_vtab_pane_1" aria-selected="true" role="tab">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-primary me-3">
                                        <!-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor"></path>
                                        </svg> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" fill="currentColor"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">Profil</span>
                                        <span class="fs-7">Data diri pasien</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item w-100 me-0 mb-md-2" role="presentation">
                                <a class="nav-link w-100 btn btn-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_pane_2" aria-selected="false" role="tab" tabindex="-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen003.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-primary">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.0079 2.6L15.7079 7.2L21.0079 8.4C21.9079 8.6 22.3079 9.7 21.7079 10.4L18.1079 14.4L18.6079 19.8C18.7079 20.7 17.7079 21.4 16.9079 21L12.0079 18.8L7.10785 21C6.20785 21.4 5.30786 20.7 5.40786 19.8L5.90786 14.4L2.30785 10.4C1.70785 9.7 2.00786 8.6 3.00786 8.4L8.30785 7.2L11.0079 2.6C11.3079 1.8 12.5079 1.8 13.0079 2.6Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">COVID-19</span>
                                        <span class="fs-7">Riwayat terkonfirmasi COVID-19</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item w-100 me-0 mb-md-2" role="presentation">
                                <a class="nav-link w-100 btn btn-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_pane_3" aria-selected="false" role="tab" tabindex="-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen003.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-primary">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.0079 2.6L15.7079 7.2L21.0079 8.4C21.9079 8.6 22.3079 9.7 21.7079 10.4L18.1079 14.4L18.6079 19.8C18.7079 20.7 17.7079 21.4 16.9079 21L12.0079 18.8L7.10785 21C6.20785 21.4 5.30786 20.7 5.40786 19.8L5.90786 14.4L2.30785 10.4C1.70785 9.7 2.00786 8.6 3.00786 8.4L8.30785 7.2L11.0079 2.6C11.3079 1.8 12.5079 1.8 13.0079 2.6Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">Penyakit Lain</span>
                                        <span class="fs-7">Riwayat mengidap penyakit lain</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item w-100" role="presentation">
                                <a class="nav-link w-100 btn btn-flex btn-active-light-danger" data-bs-toggle="tab" href="#kt_vtab_pane_4" aria-selected="false" role="tab" tabindex="-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen017.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-primary">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M5 8.04999L11.8 11.95V19.85L5 15.85V8.04999Z" fill="currentColor"></path>
                                            <path d="M20.1 6.65L12.3 2.15C12 1.95 11.6 1.95 11.3 2.15L3.5 6.65C3.2 6.85 3 7.15 3 7.45V16.45C3 16.75 3.2 17.15 3.5 17.25L11.3 21.75C11.5 21.85 11.6 21.85 11.8 21.85C12 21.85 12.1 21.85 12.3 21.75L20.1 17.25C20.4 17.05 20.6 16.75 20.6 16.45V7.45C20.6 7.15 20.4 6.75 20.1 6.65ZM5 15.85V7.95L11.8 4.05L18.6 7.95L11.8 11.95V19.85L5 15.85Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">Data Awal</span>
                                        <span class="fs-7">Pengukuran kondisi</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item w-100" role="presentation">
                                <a class="nav-link w-100 btn btn-flex btn-active-light-danger" data-bs-toggle="tab" href="#kt_vtab_pane_5" aria-selected="false" role="tab" tabindex="-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen017.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-primary">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M5 8.04999L11.8 11.95V19.85L5 15.85V8.04999Z" fill="currentColor"></path>
                                            <path d="M20.1 6.65L12.3 2.15C12 1.95 11.6 1.95 11.3 2.15L3.5 6.65C3.2 6.85 3 7.15 3 7.45V16.45C3 16.75 3.2 17.15 3.5 17.25L11.3 21.75C11.5 21.85 11.6 21.85 11.8 21.85C12 21.85 12.1 21.85 12.3 21.75L20.1 17.25C20.4 17.05 20.6 16.75 20.6 16.45V7.45C20.6 7.15 20.4 6.75 20.1 6.65ZM5 15.85V7.95L11.8 4.05L18.6 7.95L11.8 11.95V19.85L5 15.85Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">Opsi Rehab</span>
                                        <span class="fs-7">Pengukuran kondisi</span>
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent" style="width: 100% !important">

                            <div class="tab-pane fade active show" id="kt_vtab_pane_1" role="tabpanel">

                                <div class="row g-9 mb-5">
                                    <div class="col-lg-4">
                                        <label class="required fw-semibold mb-2">No. RM</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="" id="mr_no" name="mr_no" />
                                    </div>
                                    <div class="col-lg-8">
                                        <label class="required fw-semibold mb-2">Nama Pasien</label>
                                        <input type="text" class="form-control" placeholder="" id="name" name="name" value="" />
                                    </div>
                                </div>

                                <div class="row g-9 mb-5">
                                    <div class="col-lg-4">
                                        
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="fw-semibold mb-2">Jenis Kelamin
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Show your ads to either men or women, or select 'All' for both" data-kt-initialized="1"></i></label>
                                            <!--End::Label-->
                                            <!--begin::Row-->
                                            <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']" data-kt-initialized="1">                                        
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-2" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input h-20px" type="radio" id="gender_1" name="gender" value="L">
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5 mt-1">
                                                            <span class="fw-bold text-gray-800 d-block">Laki-laki</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-2" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input h-20px" type="radio" id="gender_2" name="gender" value="P">
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5 mt-1">
                                                            <span class="fw-bold text-gray-800 d-block">Perempuan</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>

                                    </div>

                                    <div class="col-lg-8">
                                        
                                        <label class="required fw-semibold mb-2">Tanggal Lahir</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control ps-12 flatpickr-input" placeholder="" id="birth_date" name="birth_date" type="text">
                                            <!--end::Datepicker-->
                                        </div>

                                    </div>

                                    <div class="col-lg-4">
                                        <label class="required fw-semibold mb-2">Pendidikan</label>
                                        <select id="education" name="education" class="form-select" data-placeholder="">
                                            <option value=""></option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>                                        
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="required fw-semibold mb-2">Pekerjaan</label>
                                        <select id="profession" name="profession" class="form-select" data-placeholder="">
                                            <option value=""></option>
                                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Polisi">Polisi</option>
                                            <option value="TNI">TNI</option>
                                            <option value="PNS">PNS</option>                                            
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>                                            
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="fw-semibold mb-2">Kebiasaan Olah Raga
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label>
                                            <!--End::Label-->
                                            <!--begin::Row-->
                                            <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']" data-kt-initialized="2">                                        
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-2" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input h-20px exercise_habits" type="radio" id="exercise_habits_1" name="exercise_habits" value="Ya">
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5 mt-1">
                                                            <span class="fw-bold text-gray-800 d-block">Ya</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-2" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input h-20px exercise_habits" type="radio" id="exercise_habits_2" name="exercise_habits" value="Tidak">
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5 mt-1">
                                                            <span class="fw-bold text-gray-800 d-block">Tidak</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                    </div>

                                    <div class="col-lg-4 exercise_habits_add">
                                        <label class="required fw-semibold mb-2">Frekuensi</label>
                                        <select id="exercise_habits_frek" name="exercise_habits_frek" class="form-select" data-placeholder="">
                                            <option value=""></option>
                                            <option value="3-5x seminggu">3-5x seminggu</option>
                                            <option value="< 3x seminggu">< 3x seminggu</option>
                                            <option value="> 5x seminggu">> 5x seminggu</option>                                            
                                        </select>
                                    </div>

                                    <div class="col-lg-4 exercise_habits_add">
                                        <label class="required fw-semibold mb-2">Jenis Olah Raga</label>
                                        <input type="text" class="form-control" placeholder="" id="exercise_type" name="exercise_type" value="" />
                                    </div>

                                </div>

                                <div class="row g-9 mb-5">

                                    <div class="col-lg-4">
                                        <label class="fw-semibold mb-2">Email</label>
                                        <input type="text" class="form-control" placeholder="" id="email" name="email" value="" />
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="required fw-semibold mb-2">No. HP</label>
                                        <input type="text" class="form-control" placeholder="" id="phone_no" name="phone_no" value="" />
                                    </div>

                                </div>

                                <div class="fv-row mb-5">
                                    <label class="required fw-semibold mb-2">Alamat</label>
                                    <textarea class="form-control fs-7" id="address" name="address"></textarea>
                                </div>
                                
                            </div>


                            <div class="tab-pane fade" id="kt_vtab_pane_2" role="tabpanel">
                                
                                <div class="row g-9 mb-5">
        
                                    <div class="col-lg-4">
                                        <label class="required fw-semibold mb-2">Tanggal Positif Covid</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control ps-12 flatpickr-input" placeholder="" id="date_pos_covid" name="date_pos_covid" type="text">
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="fv-row mb-5">
                                    <label class="required fw-semibold mb-2">Tingkat Covid</label>

                                    <div class="d-flex">

                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value="OTG" name="covid_level" id="covid_level_1"/>
                                            <label class="form-check-label" for="covid_level_1">
                                                OTG
                                            </label>
                                        </div>
    
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value="Ringan" name="covid_level" id="covid_level_2"/>
                                            <label class="form-check-label" for="covid_level_2">
                                                Ringan
                                            </label>
                                        </div>
    
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value="Sedang" name="covid_level" id="covid_level_3"/>
                                            <label class="form-check-label" for="covid_level_3">
                                                Sedang
                                            </label>
                                        </div>
    
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value="Berat" name="covid_level" id="covid_level_4"/>
                                            <label class="form-check-label" for="covid_level_4">
                                                Berat
                                            </label>
                                        </div>
    
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value="Kritis" name="covid_level" id="covid_level_5"/>
                                            <label class="form-check-label" for="covid_level_5">
                                                Kritis
                                            </label>
                                        </div>

                                    </div>
                                    

                                </div>

                                <!-- Tambahan -->
                                <div class="fv-row mb-5">
                                    <label class="required fw-semibold mb-2">Berapa kali terkonfirmasi positif COVID-19</label>

                                    <div class="d-flex">

                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input confirmed_positive" type="radio" value="1" name="confirmed_positive" id="confirmed_positive_1"/>
                                            <label class="form-check-label" for="confirmed_positive_1">
                                                1
                                            </label>
                                        </div>
    
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input confirmed_positive" type="radio" value="2" name="confirmed_positive" id="confirmed_positive_2"/>
                                            <label class="form-check-label" for="confirmed_positive_2">
                                                2
                                            </label>
                                        </div>
    
                                        <div class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input confirmed_positive" type="radio" value="3" name="confirmed_positive" id="confirmed_positive_3"/>
                                            <label class="form-check-label" for="confirmed_positive_3">
                                                3
                                            </label>
                                        </div>                                        

                                    </div>
                                    

                                </div>
                                
                                <div class="row g-9 mb-5 input_covid_confirmed input_covid_confirmed_1">

                                    <div class="col-lg-12">
                                        <label class="required fw-semibold mb-0 mt-3">COVID-19 ke-1 :</label>
                                    </div>
            
                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Tanggal terkonfirmasi</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control ps-12 flatpickr-input" placeholder="" id="covid_confirmed_date_1" name="covid_confirmed_date_1" type="text">
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>

                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Derajat COVID-19</label>
                                        <input type="text" id="covid_degree_1" name="covid_degree_1" class="form-control">                                    
                                    </div>

                                </div>

                                <div class="row g-9 mb-5 input_covid_confirmed input_covid_confirmed_2">

                                    <div class="col-lg-12">
                                        <label class="required fw-semibold mb-0">COVID-19 ke-2 :</label>
                                    </div>
            
                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Tanggal terkonfirmasi</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control ps-12 flatpickr-input" placeholder="" id="covid_confirmed_date_2" name="covid_confirmed_date_2" type="text">
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>

                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Derajat COVID-19</label>
                                        <input type="text" id="covid_degree_2" name="covid_degree_2" class="form-control">                                    
                                    </div>

                                </div>

                                <div class="row g-9 mb-5 input_covid_confirmed input_covid_confirmed_3">

                                    <div class="col-lg-12">
                                        <label class="required fw-semibold mb-0">COVID-19 ke-3 :</label>
                                    </div>
            
                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Tanggal terkonfirmasi</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control ps-12 flatpickr-input" placeholder="" id="covid_confirmed_date_3" name="covid_confirmed_date_3" type="text">
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>

                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Derajat COVID-19</label>
                                        <input type="text" id="covid_degree_3" name="covid_degree_3" class="form-control">                                    
                                    </div>

                                </div>


                                <!-- Tambahan Riwayat Vaksin-->
                                <div class="fv-row mb-5 mt-5">
                                    <label class="required fw-semibold mb-2">Riwayat Vaksin COVID-19</label>                                
                                </div>
                                
                                <div class="row g-9 mb-5 covid_confirmed_1">

                                    <div class="col-lg-12">
                                        <label class="required fw-semibold mb-0 mt-3">Vaksin ke-1 :</label>
                                    </div>
            
                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Tanggal</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control ps-12 flatpickr-input" placeholder="" id="vaccine_date_1" name="vaccine_date_1" type="text">
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>

                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Jenis Vaksin</label>
                                        <select id="vaccine_type_1" name="vaccine_type_1" class="form-select" data-placeholder="">
                                            <option value=""></option>
                                            <option value="Sinovac">Sinovac</option>
                                            <option value="AstraZeneca">AstraZeneca</option>
                                            <option value="Pfizer">Pfizer</option>
                                            <option value="Moderna">Moderna</option>
                                            <option value="Janssen (J&J)">Janssen (J&J)</option>
                                            <option value="Sinopharm">Sinopharm</option>                                  
                                        </select>
                                    </div>

                                </div>

                                <div class="row g-9 mb-5 vaccine_2">

                                    <div class="col-lg-12">
                                        <label class="required fw-semibold mb-0">Vaksin ke-2 :</label>
                                    </div>
            
                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Tanggal</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control ps-12 flatpickr-input" placeholder="" id="vaccine_date_2" name="vaccine_date_2" type="text">
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>

                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Jenis Vaksin</label>
                                        <select id="vaccine_type_2" name="vaccine_type_2" class="form-select" data-placeholder="">
                                            <option value=""></option>
                                            <option value="Sinovac">Sinovac</option>
                                            <option value="AstraZeneca">AstraZeneca</option>
                                            <option value="Pfizer">Pfizer</option>
                                            <option value="Moderna">Moderna</option>
                                            <option value="Janssen (J&J)">Janssen (J&J)</option>
                                            <option value="Sinopharm">Sinopharm</option>                                  
                                        </select>
                                    </div>

                                </div>

                                <div class="row g-9 mb-5 vaccine_2">

                                    <div class="col-lg-12">
                                        <label class="required fw-semibold mb-0">Vaksin ke-3 :</label>
                                    </div>
            
                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Tanggal</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control ps-12 flatpickr-input" placeholder="" id="vaccine_date_3" name="vaccine_date_3" type="text">
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>

                                    <div class="col mt-1">
                                        <label class="required fw-semibold mb-2">Jenis Vaksin</label>
                                        <select id="vaccine_type_3" name="vaccine_type_3" class="form-select" data-placeholder="">
                                            <option value=""></option>
                                            <option value="Sinovac">Sinovac</option>
                                            <option value="AstraZeneca">AstraZeneca</option>
                                            <option value="Pfizer">Pfizer</option>
                                            <option value="Moderna">Moderna</option>
                                            <option value="Janssen (J&J)">Janssen (J&J)</option>
                                            <option value="Sinopharm">Sinopharm</option>                                  
                                        </select>
                                    </div>

                                </div>


                                <div class="fv-row mb-5">
                                    <label class="required fw-semibold mb-2">Keluhan Pasca COVID-19</label>

                                    <div class="row">

                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input post_covid_complaints" type="checkbox" value="Fatigue/Kelelahan" name="post_covid_complaints[]" id="post_covid_complaints_1"/>
                                                <label class="form-check-label" for="post_covid_complaints_1">
                                                    Fatigue/Kelelahan
                                                </label>
                                            </div>
    
                                        </div>

                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input post_covid_complaints" type="checkbox" value="Batuk/Sesak Napas" name="post_covid_complaints[]" id="post_covid_complaints_2"/>
                                                <label class="form-check-label" for="post_covid_complaints_2">
                                                    Batuk/Sesak Napas
                                                </label>
                                            </div>
    
                                        </div>

                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input post_covid_complaints" type="checkbox" value="Nyeri Sendi/Otot" name="post_covid_complaints[]" id="post_covid_complaints_3"/>
                                                <label class="form-check-label" for="post_covid_complaints_3">
                                                    Nyeri Sendi/Otot
                                                </label>
                                            </div>
    
                                        </div>

                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input post_covid_complaints" type="checkbox" value="Sakit Kepala" name="post_covid_complaints[]" id="post_covid_complaints_4"/>
                                                <label class="form-check-label" for="post_covid_complaints_4">
                                                    Sakit Kepala
                                                </label>
                                            </div>
    
                                        </div>

                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input post_covid_complaints" type="checkbox" value="Insomnia" name="post_covid_complaints[]" id="post_covid_complaints_5"/>
                                                <label class="form-check-label" for="post_covid_complaints_5">
                                                    Insomnia
                                                </label>
                                            </div>
    
                                        </div>

                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input post_covid_complaints" type="checkbox" value="Gangguan Konsentrasi/Memori" name="post_covid_complaints[]" id="post_covid_complaints_6"/>
                                                <label class="form-check-label" for="post_covid_complaints_6">
                                                    Gangguan Konsentrasi/Memori
                                                </label>
                                            </div>
    
                                        </div>
    

                                    </div>

                                </div>

                            </div>


                            <div class="tab-pane fade" id="kt_vtab_pane_3" role="tabpanel">

                                <div class="row g-9 mb-8">

                                    <div class="col-lg-4">
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="fw-semibold mb-2">Kebiasaan Merokok Saat ini
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" data-kt-initialized="4"></i></label>
                                            <!--End::Label-->
                                            <!--begin::Row-->
                                            <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']" data-kt-initialized="4">                                        
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-2" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input h-20px smoking_habits" type="radio" id="smoking_habits_1" name="smoking_habits" value="Ya">
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5 mt-1">
                                                            <span class="fw-bold text-gray-800 d-block">Ya</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-2" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input h-20px smoking_habits" type="radio" id="smoking_habits_2" name="smoking_habits" value="Tidak">
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5 mt-1">
                                                            <span class="fw-bold text-gray-800 d-block">Tidak</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                    </div>


                                    <div class="col-lg-4 smoking_record_add">
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="fw-semibold mb-2">Riwayat Merokok
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" data-kt-initialized="4"></i></label>
                                            <!--End::Label-->
                                            <!--begin::Row-->
                                            <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']" data-kt-initialized="4">                                        
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-2" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input h-20px smoking_record" type="radio" id="smoking_record_1" name="smoking_record" value="Ya">
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5 mt-1">
                                                            <span class="fw-bold text-gray-800 d-block">Ya</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-2" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input h-20px smoking_record" type="radio" id="smoking_record_2" name="smoking_record" value="Tidak">
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5 mt-1">
                                                            <span class="fw-bold text-gray-800 d-block">Tidak</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                    </div>


                                    <div class="col-lg-4 smoking_year_add">
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="fw-semibold mb-2">Riwayat Tahun Merokok</label>
                                            <!--End::Label-->
                                            <!--begin::Row-->
                                            <div class="row g-9">                                        
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <input type="text" class="form-control" id="year_started_smoking" name="year_started_smoking" placeholder="Tahun Mulai">
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <input type="text" class="form-control" id="year_end_smoking" name="year_end_smoking" placeholder="Tahun Berhenti">
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                    </div>

                                    <div class="col-lg-6 num_of_cigarettes">
                                        <label class="required fw-semibold mb-2">Berapa batang konsumsi rokok per hari?</label>
                                        <input type="text" class="form-control" placeholder="" id="num_of_cigarettes" name="num_of_cigarettes" placeholder="Jumlah" value="0" />
                                    </div>
                                    

                                </div>

                                <div class="fv-row mb-5">
                                    <label class="required fw-semibold mb-2">Riwayat Penyakit Kronis (sebelum terkonfirmasi COVID-19)</label>

                                    <div class="row">

                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_pra" type="checkbox" value="Hipertensi" name="hocd_pra[]" id="hocd_pra_1"/>
                                                <label class="form-check-label" for="hocd_pra_1">
                                                    Hipertensi
                                                </label>
                                            </div>
    
                                        </div>
    
                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_pra" type="checkbox" value="Jantung Koroner" name="hocd_pra[]" id="hocd_pra_2" />
                                                <label class="form-check-label" for="hocd_pra_2">
                                                    Jantung Koroner
                                                </label>
                                            </div>                                        
                                            
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_pra" type="checkbox" value="Gagal Jantung" name="hocd_pra[]" id="hocd_pra_3"/>
                                                <label class="form-check-label" for="hocd_pra_3">
                                                    Gagal Jantung
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_pra" type="checkbox" value="Stroke" name="hocd_pra[]" id="hocd_pra_4"/>
                                                <label class="form-check-label" for="hocd_pra_4">
                                                    Stroke
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_pra" type="checkbox" value="Diabetes" name="hocd_pra[]" id="hocd_pra_5"/>
                                                <label class="form-check-label" for="hocd_pra_5">
                                                    Diabetes
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_pra" type="checkbox" value="TBC" name="hocd_pra[]" id="hocd_pra_6"/>
                                                <label class="form-check-label" for="hocd_pra_6">
                                                    TBC
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_pra" type="checkbox" value="Keganasan" name="hocd_pra[]" id="hocd_pra_7"/>
                                                <label class="form-check-label" for="hocd_pra_7">
                                                    Keganasan
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_pra" type="checkbox" value="Gagal Ginjal" name="hocd_pra[]" id="hocd_pra_8"/>
                                                <label class="form-check-label" for="hocd_pra_8">
                                                    Gagal Ginjal
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <input type="text" class="form-control" placeholder="Lainnya..." id="hocd_pra_other" name="hocd_pra_other" value="" />
                                        </div>

                                    </div>

                                </div>

                                <div class="fv-row mb-5">
                                    <label class="required fw-semibold mb-2">Riwayat Penyakit Kronis (sesudah terkonfirmasi COVID-19)</label>

                                    <div class="row">

                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_post" type="checkbox" value="Hipertensi" name="hocd_post[]" id="hocd_post_1"/>
                                                <label class="form-check-label" for="hocd_post_1">
                                                    Hipertensi
                                                </label>
                                            </div>
    
                                        </div>
    
                                        <div class="col-lg-3 mb-3">
    
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_post" type="checkbox" value="Jantung Koroner" name="hocd_post[]" id="hocd_post_2" />
                                                <label class="form-check-label" for="hocd_post_2">
                                                    Jantung Koroner
                                                </label>
                                            </div>                                        
                                            
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_post" type="checkbox" value="Gagal Jantung" name="hocd_post[]" id="hocd_post_3"/>
                                                <label class="form-check-label" for="hocd_post_3">
                                                    Gagal Jantung
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_post" type="checkbox" value="Stroke" name="hocd_post[]" id="hocd_post_4"/>
                                                <label class="form-check-label" for="hocd_post_4">
                                                    Stroke
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_post" type="checkbox" value="Diabetes" name="hocd_post[]" id="hocd_post_5"/>
                                                <label class="form-check-label" for="hocd_post_5">
                                                    Diabetes
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_post" type="checkbox" value="TBC" name="hocd_post[]" id="hocd_post_6"/>
                                                <label class="form-check-label" for="hocd_post_6">
                                                    TBC
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_post" type="checkbox" value="Keganasan" name="hocd_post[]" id="hocd_post_7"/>
                                                <label class="form-check-label" for="hocd_post_7">
                                                    Keganasan
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <div class="form-check form-check-custom form-check-solid me-4">
                                                <input class="form-check-input hocd_post" type="checkbox" value="Gagal Ginjal" name="hocd_post[]" id="hocd_post_8"/>
                                                <label class="form-check-label" for="hocd_post_8">
                                                    Gagal Ginjal
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <input type="text" class="form-control" placeholder="Lainnya..." id="hocd_post_other" name="hocd_post_other" value="" />
                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="tab-pane fade" id="kt_vtab_pane_4" role="tabpanel">
                                
                                
                                <div class="row g-9 mb-5">
                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">Tinggi Badan (cm)</label>
                                        <input type="text" id="tb" name="tb" class="form-control"/>                                    
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">BB Sebelum Rehab (kg)</label>
                                        <input type="text" id="bb_pra" name="bb_pra" class="form-control"/>                                    
                                    </div>

                                    <!-- <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">BB Sesudah Rehab (kg)</label>
                                        <input type="text" id="bb_post" name="bb_post" class="form-control"/>                                    
                                    </div> -->

                                </div>

                                <div class="row g-9 mb-10">

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">IMT Sebelum Rehab (m<sup>2</sup>/kg)</label>
                                        <input type="text" id="imt_pra" name="imt_pra" class="form-control" readonly/>                                    
                                    </div>

                                    <!-- <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">IMT Sesudah Rehab (m<sup>2</sup>/kg)</label>
                                        <input type="text" id="imt_post" name="imt_post" class="form-control" readonly/>                                    
                                    </div> -->

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">6MWT (m)</label>                                    
                                        <input type="text" id="mwt6" name="mwt6" class="form-control"/>
                                    </div>
                                </div>


                                <!-- Tambahan -->
                                <div class="row g-9 mb-10">

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">Indeks Barthel (0-20)</label>                                    
                                        <input type="number" id="barthel_index" name="barthel_index" class="form-control" min="0" max="20" value="0"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">BFI (0-10)</label>                                    
                                        <input type="number" id="bfi" name="bfi" class="form-control" min="0" max="10" value="0"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">mMRC (0-4)</label>                                    
                                        <input type="number" id="mmrc" name="mmrc" class="form-control" min="0" max="4" value="0"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">EQ5D5L (xxxxx)</label>                                    
                                        <input type="text" id="eq5d5l" name="eq5d5l" class="form-control"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">EQ-VAS (0-100)</label>                                    
                                        <input type="number" id="eq_vas" name="eq_vas" class="form-control" min="0" max="100" value="0"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">PSQI (0-21)</label>                                    
                                        <input type="number" id="psqi" name="psqi" class="form-control" min="0" max="21" value="0"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">GAD-7 (0-21)</label>                                    
                                        <input type="number" id="gad7" name="gad7" class="form-control" min="0" max="21" value="0"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">PHQ-9 (0-27)</label>                                    
                                        <input type="number" id="phq9" name="phq9" class="form-control" min="0" max="27" value="0"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">MoCA-INA (0-30)</label>                                    
                                        <input type="number" id="moca_ina" name="moca_ina" class="form-control" min="0" max="30" value="0"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">Handgrip (kg)</label>                                    
                                        <input type="text" id="handgrip" name="handgrip" class="form-control"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">STS 30 (0-30)</label>                                    
                                        <input type="number" id="sts_30" name="sts_30" class="form-control" min="0" max="30" value="0"/>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">Ekspansi dada (x,y,z)</label>                                    
                                        <input type="text" id="chest_expansion" name="chest_expansion" class="form-control"/>
                                    </div>

                                </div>


                            </div>

                            <div class="tab-pane fade" id="kt_vtab_pane_5" role="tabpanel">

                                <div class="fv-row mb-5">
                                    <div class="col-lg-6">
                                        <label class="required fw-semibold mb-2">Opsi Rehab</label>
                                        <select id="rehab_option" name="rehab_option" class="form-select form-select-solid">
                                            <option value=""></option>
                                            <option value="1">1 - Latihan Pernapasan</option>
                                            <option value="2">2 - Latihan Aerobik 1 + Latihan Penguatan</option>
                                            <option value="3">3 - Latihan Aerobik 2 + Latihan Penguatan</option>
                                            <option value="4">4 - Latihan Aerobik 3 + Latihan Penguatan</option>
                                            <option value="5">5 - Latihan Pernapasan + Latihan Aerobik 1 + Latihan Penguatan</option>
                                            <option value="6">6 - Latihan Pernapasan + Latihan Aerobik 2 + Latihan Penguatan</option>
                                            <option value="7">7 - Latihan Pernapasan + Latihan Aerobik 3 + Latihan Penguatan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-9 mb-5">

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">Tanggal Mulai Rehab</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control form-control-solid ps-12 flatpickr-input" placeholder="" id="rehab_start" name="rehab_start" type="text">
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="required fw-semibold mb-2">Tanggal Selesai Rehab</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4 fs-7">
                                                <svg width="24" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                                    <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                                    <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control form-control-solid ps-12 flatpickr-input" placeholder="" id="rehab_end" name="rehab_end" type="text">
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>

                                </div>
                                
                            </div>


                        </div>

                    </div>
                    

                </form>
                

            </div>

            <div class="modal-footer">
                <!--begin::Button-->
                <button type="button" id="kt_modal_add_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="button" id="kt_modal_add_submit" class="btn btn-primary">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Mohon tunggu...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>
        </div>
    </div>
</div>