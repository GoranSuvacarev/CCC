<?php

use app\models\CompareModel;
use app\models\ProductModel;

/** @var $params CompareModel
 * @var $params ProductModel
 */

var_dump($params->product1);
exit;

?>


<main class="page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <div style="text-align: center;margin-bottom: 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="text-start" style="font-size: 19px;"><i class="fa fa-home"></i><span><a href="/" style="color: black;">&nbsp;Home&nbsp;</a></span><span><i class="fa fa-angle-double-right"></i></span><span><a href="#" style="color: black;">&nbsp;Category</a></span><span><i class="fa fa-angle-double-right"></i></span><span><a href="#" style="color: black;">&nbsp;<?php echo $params->product1->name ?></a></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content" style="height: 500.312px;">
                <div class="product-info">
                    <div class="row d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center" style="height: 500.312px;">
                        <div class="col-md-6 col-xxl-3 d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center gallery" style="height: 425px;width: 400px;text-align: center;">
                            <div class="gallery">
                                <div id="product-preview" class="vanilla-zoom">
                                    <div class="zoomed-image"></div>
                                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center sidebar"><img class="img-fluid small-preview" src="assets/img/gpu_default.jpg" width="322" height="168" style="margin-top: 50px;"></div>
                                </div>
                                <p class="text-center" style="color: var(--bs-emphasis-color);font-size: 30px;margin-top: 30px;">Product#1</p>
                            </div>
                        </div>
                        <div class="col-md-6 d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center" style="height: 425px;width: 150px;">
                            <div class="gallery">
                                <div id="product-preview-2" class="vanilla-zoom">
                                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center sidebar"><img class="img-fluid d-lg-flex small-preview" src="assets/img/vs.jpg" width="216" height="216" style="margin-top: 0;margin-bottom: 0px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center gallery" style="height: 425px;width: 400px;text-align: center;">
                            <div class="gallery">
                                <div id="product-preview-3" class="vanilla-zoom">
                                    <div class="zoomed-image"></div>
                                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center sidebar"><img class="img-fluid small-preview" src="assets/img/gpu_default.jpg" width="326" height="170" style="margin-top: 50px;"></div>
                                </div>
                                <p class="text-center" style="color: var(--bs-emphasis-color);font-size: 30px;margin-top: 30px;">Product#1</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xxl-flex justify-content-xxl-center align-items-xxl-center" style="height: 800px;border-top-style: groove;border-top-color: var(--bs-emphasis-color);">
                <div><canvas data-bss-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;January&quot;,&quot;February&quot;,&quot;March&quot;,&quot;April&quot;,&quot;May&quot;,&quot;June&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:&quot;#4e73df&quot;,&quot;borderColor&quot;:&quot;#4e73df&quot;,&quot;data&quot;:[&quot;4500&quot;,&quot;5300&quot;,&quot;6250&quot;,&quot;7800&quot;,&quot;9800&quot;,&quot;15000&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;bold&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;ticks&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}],&quot;yAxes&quot;:[{&quot;ticks&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}]}}}"></canvas></div>
            </div>
        </div>
    </section>
</main>
