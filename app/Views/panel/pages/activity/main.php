<script src="/dists/activity.js?v=<?= date('Y-m-d H:i:s') ?>"></script>

<div class="content flex-row-fluid pt-6" id="kt_content">

    <div class="card card-flush h-xl-100">
        <!--begin::Body-->
        <div class="card-body pt-6">
            <!--begin::Nav-->
            <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">                

                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                    
                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-175px h-85px pt-5 pb-2 active" id="kt_tab_pernapasan" data-bs-toggle="pill" href="#kt_latihan_pernapasan" aria-selected="false" role="tab" tabindex="-1">
                    
                        <div class="nav-icon mb-3">
                            <i class="fonticon-settings-1 fs-1 p-0"></i>
                        </div>
                    
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Latihan Pernapasan</span>
                    
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                    
                    </a>
                    
                </li>

                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                    
                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-175px h-85px pt-5 pb-2" id="kt_tab_aerobik" data-bs-toggle="pill" href="#kt_latihan_aerobik" aria-selected="false" role="tab" tabindex="-1">
                    
                        <div class="nav-icon mb-3">
                            <i class="fonticon-settings-1 fs-1 p-0"></i>
                        </div>
                    
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Latihan Aerobik</span>
                    
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                    
                    </a>
                    
                </li>

                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                    
                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-175px h-85px pt-5 pb-2" id="kt_tab_penguatan" data-bs-toggle="pill" href="#kt_latihan_penguatan" aria-selected="false" role="tab" tabindex="-1">
                    
                        <div class="nav-icon mb-3">
                            <i class="fonticon-settings-1 fs-1 p-0"></i>
                        </div>
                    
                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Latihan Penguatan</span>
                    
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                    
                    </a>
                    
                </li>
                
                
            </ul>
            
            <div class="tab-content">            

                <div class="tab-pane fade show active" id="kt_latihan_pernapasan" role="tabpanel" aria-labelledby="#kt_latihan_pernapasan">

                    <?= $this->include('panel/pages/activity/breathing'); ?>

                </div>

                <div class="tab-pane fade" id="kt_latihan_aerobik" role="tabpanel" aria-labelledby="#kt_latihan_aerobik">

                    <?= $this->include('panel/pages/activity/aerobic'); ?>

                </div>

                <div class="tab-pane fade" id="kt_latihan_penguatan" role="tabpanel" aria-labelledby="#kt_latihan_penguatan">

                    <?= $this->include('panel/pages/activity/strengthening'); ?>

                </div>
                
            </div>
            
        </div>
        
    </div>

</div>