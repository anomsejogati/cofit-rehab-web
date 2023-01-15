<script src="/dists/evaluation.js?v=<?= date('Y-m-d H:i:s') ?>"></script>

<div class="content flex-row-fluid pt-6" id="kt_content">

    <div class="card card-flush h-xl-100">
        <!--begin::Body-->
        <div class="card-body pt-6">
            <!--begin::Nav-->
            <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">                

                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                    <!--begin::Link-->
                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-175px h-85px pt-5 pb-2 active" id="kt_tab_mingguan" data-bs-toggle="pill" href="#kt_stats_widget_mingguan" aria-selected="false" role="tab" tabindex="-1">
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
                <!--end::Item-->
                
            </ul>
            
            <div class="tab-content">                            

                <div class="tab-pane fade active show" id="kt_stats_widget_mingguan" role="tabpanel" aria-labelledby="#kt_stats_widget_mingguan">

                    <?= $this->include('panel/pages/evaluation/main_weeklyreport'); ?>

                </div>

                <div class="tab-pane fade" id="kt_stats_widget_bulanan" role="tabpanel" aria-labelledby="#kt_stats_widget_bulanan">

                    <?= $this->include('panel/pages/evaluation/main_monthlyreport'); ?>

                </div>
                
            </div>
            <!--end::Tab Content-->
        </div>
        <!--end: Card Body-->
    </div>

</div>