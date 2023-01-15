<script src="/dists/videos.js?v=<?= date('Y-m-d H:i:s') ?>"></script>

<div class="content flex-row-fluid" id="kt_content">
    
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
                    <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari Video.." />
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
                    <div id="kt_datatable_example_export_menu" data-kt-menu="true" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" style="">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="copy">Copy to clipboard</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="excel">Export as Excel</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="csv">Export as CSV</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="pdf">Export as PDF</a>
                        </div>
                        <!--end::Menu item-->
                    </div>                   
                    
                    <!--begin::Hide default export buttons-->
                    <div id="kt_datatable_example_buttons" class="d-none"></div>
                    <!--end::Hide default export buttons-->

                    <!--begin::Add customer-->
                    <button type="button" id="addBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add" onClick="clearForm()">Tambah</button>
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
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table-videos">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="">No.</th>
                        <th class="min-w-125px">Nama Latihan</th>
                        <th class="min-w-125px">Tautan</th>
                        <th class="min-w-125px">Status</th>
                        <th class="text-end min-w-70px"></th>
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
    <!--begin::Modals-->
    <!--begin::Modal - Customers - Add-->
    <div class="modal fade" id="kt_modal_add" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_add_form">
                    <input type="hidden" id="video_id" name="video_id">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Tambah Video Latihan</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_scroll" data-kt-scroll="false" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_header" data-kt-scroll-wrappers="#kt_modal_add_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                                <!--begin::Col-->
                                <div class="col-md-12 fv-row">                                    
                                    <!--begin::Row-->
                                    <div class="row fv-row">
                                        <!--begin::Col-->
                                        <div class="col-4">
                                            <label class="required fs-6 fw-semibold form-label mb-2">No. Urut</label>
                                            <select id="order_no" name="order_no" class="form-select form-select-solid">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-8">
                                            <label class="required fs-6 fw-semibold mb-2">Nama Latihan</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="" id="name" name="name" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="fv-row mb-7">
                                
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                    <span class="required">Sumber Video</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pilih sumber video"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin:Options-->
                                <div class="fv-row">
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                        <!--begin:Label-->
                                        <span class="d-flex align-items-center me-2">
                                            <!--begin:Icon-->
                                            <span class="symbol symbol-50px me-6">
                                                <span class="symbol-label bg-light-danger">
                                                    <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M15.6 11.6L22 7v10l-6.4-4.5v-1zM4 5h9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7c0-1.1.9-2 2-2z" fill="currentColor" />
                                                            <path d="M15.6 11.6L22 7v10l-6.4-4.5v-1zM4 5h9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7c0-1.1.9-2 2-2z" fill="currentColor" />
                                                        </svg>
                                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15.6 11.6L22 7v10l-6.4-4.5v-1zM4 5h9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7c0-1.1.9-2 2-2z"/></svg> -->
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <!--end:Icon-->
                                            <!--begin:Info-->
                                            <span class="d-flex flex-column">
                                                <span class="fw-bold fs-6">YouTube</span>
                                                <span class="fs-7 text-muted">Ambil dari tautan Youtube</span>
                                            </span>
                                            <!--end:Info-->
                                        </span>
                                        <!--end:Label-->
                                        <!--begin:Input-->
                                        <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input source_type" type="radio" id="source_type_1" name="source_type" value="YouTube"/>
                                        </span>
                                        <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack cursor-pointer">
                                        <!--begin:Label-->
                                        <span class="d-flex align-items-center me-2">
                                            <!--begin:Icon-->
                                            <span class="symbol symbol-50px me-6">
                                                <span class="symbol-label bg-light">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 8l-5-5-5 5M12 4.2v10.3" fill="currentColor" />
                                                            <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 8l-5-5-5 5M12 4.2v10.3" fill="currentColor" />                                                            
                                                        </svg>
                                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 8l-5-5-5 5M12 4.2v10.3"/></svg> -->
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <!--end:Icon-->
                                            <!--begin:Info-->
                                            <span class="d-flex flex-column">
                                                <span class="fw-bold fs-6">Komputer Saya</span>
                                                <span class="fs-7 text-muted">Unggah video dari komputer saya</span>
                                            </span>
                                            <!--end:Info-->
                                        </span>
                                        <!--end:Label-->
                                        <!--begin:Input-->
                                        <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input source_type" type="radio" id="source_type_2" name="source_type" value="Local" />
                                        </span>
                                        <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end:Options-->
                                
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 input_link">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Tautan</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" id="link" name="link" placeholder="Gunakan tautan dari YouTube" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7 input_local">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Unggah Video</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" class="form-control form-control-solid" id="upload" name="upload"/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                    <span class="required">Status Akses</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pilih status akses video"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin:Options-->
                                <div class="fv-row">
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                        <!--begin:Label-->
                                        <span class="d-flex align-items-center me-2">
                                            <!--begin:Icon-->
                                            <span class="symbol symbol-50px me-6">
                                                <span class="symbol-label bg-light-primary">
                                                    <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor" />
                                                            <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <!--end:Icon-->
                                            <!--begin:Info-->
                                            <span class="d-flex flex-column">
                                                <span class="fw-bold fs-6">Umum</span>
                                                <span class="fs-7 text-muted">Dapat diakses untuk semua pasien</span>
                                            </span>
                                            <!--end:Info-->
                                        </span>
                                        <!--end:Label-->
                                        <!--begin:Input-->
                                        <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" id="status_1" name="status" value="Public" checked/>
                                        </span>
                                        <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack cursor-pointer">
                                        <!--begin:Label-->
                                        <span class="d-flex align-items-center me-2">
                                            <!--begin:Icon-->
                                            <span class="symbol symbol-50px me-6">
                                                <span class="symbol-label bg-light-success">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z" fill="currentColor" />
                                                            <path d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <!--end:Icon-->
                                            <!--begin:Info-->
                                            <span class="d-flex flex-column">
                                                <span class="fw-bold fs-6">Terbatas</span>
                                                <span class="fs-7 text-muted">Akses terbatas untuk pasien tertentu</span>
                                            </span>
                                            <!--end:Info-->
                                        </span>
                                        <!--end:Label-->
                                        <!--begin:Input-->
                                        <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" id="status_2" name="status" value="Restricted" />
                                        </span>
                                        <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end:Options-->
                                
                            </div>
                            <!--end::Input group-->
                            
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
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
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    
</div>