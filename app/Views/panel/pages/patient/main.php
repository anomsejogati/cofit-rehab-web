<script src="/dists/patient.js?v=<?= date('Y-m-d H:i:s') ?>"></script>

<div class="content flex-row-fluid pt-6" id="kt_content">

    <div class="card card-flush h-xl-100">
        
        <div class="card-body pt-6">
            
            <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">
                
                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                    
                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-175px h-85px pt-5 pb-2 active" id="kt_stats_widget_16_tab_link_1" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_1" aria-selected="true" role="tab">
                        
                        <div class="nav-icon mb-3">
                            <i class="fonticon-user fs-1 p-0"></i>
                        </div>
                    
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Data Pasien</span>
                    
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                    
                    </a>
                    
                </li>
                
                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                    
                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-175px h-85px pt-5 pb-2" id="kt_stats_widget_16_tab_link_2" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_2" aria-selected="false" role="tab" tabindex="-1">
                    
                        <div class="nav-icon mb-3">
                            <i class="fonticon-settings-1 fs-1 p-0"></i>
                        </div>
                    
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Pengaturan Latihan</span>
                    
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                    
                    </a>
                    
                </li>

                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                    <!--begin::Link-->
                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-175px h-85px pt-5 pb-2" id="kt_tab_mingguan" data-bs-toggle="pill" href="#kt_stats_widget_mingguan" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <i class="fonticon-settings-1 fs-1 p-0"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Evaluasi Mingguan</span>
                        <!--end::Title-->
                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                    </a>
                    <!--end::Link-->
                </li>

                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                    <!--begin::Link-->
                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-175px h-85px pt-5 pb-2" id="kt_tab_bulanan" data-bs-toggle="pill" href="#kt_stats_widget_bulanan" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <i class="fonticon-settings-1 fs-1 p-0"></i>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Evaluasi Bulanan</span>
                        <!--end::Title-->
                        <!--begin::Bullet-->
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        <!--end::Bullet-->
                    </a>
                    <!--end::Link-->
                </li>
                
                
            </ul>
            
            <div class="tab-content">
                
                <div class="tab-pane fade active show" id="kt_stats_widget_16_tab_1" role="tabpanel" aria-labelledby="#kt_stats_widget_16_tab_1">
                
                    <?= $this->include('panel/pages/patient/main_patient'); ?>
                
                </div>
                
                <div class="tab-pane fade" id="kt_stats_widget_16_tab_2" role="tabpanel" aria-labelledby="#kt_stats_widget_16_tab_2">

                    <?= $this->include('panel/pages/patient/main_video_setting'); ?>

                </div>
                
            </div>
        
        </div>
        
    </div>

</div>