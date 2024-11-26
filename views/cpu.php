<?php

use app\models\FeatureModel;

$socket = new FeatureModel();
$socket->one("where id_feature = 8 and id_products=$params->id");
$chipset = new FeatureModel();
$chipset->one("where id_feature = 9 and id_products=$params->id");
$semiconductor_size = new FeatureModel();
$semiconductor_size->one("where id_feature = 10 and id_products=$params->id");
$thermal_design_power = new FeatureModel();
$thermal_design_power->one("where id_feature = 11 and id_products=$params->id");
$clock_speed = new FeatureModel();
$clock_speed->one("where id_feature = 12 and id_products=$params->id");
$turbo_speed = new FeatureModel();
$turbo_speed->one("where id_feature = 13 and id_products=$params->id");
$threads = new FeatureModel();
$threads->one("where id_feature = 14 and id_products=$params->id");
$cores = new FeatureModel();
$cores->one("where id_feature = 15 and id_products=$params->id");
$l1_cache = new FeatureModel();
$l1_cache->one("where id_feature = 16 and id_products=$params->id");
$l2_cache = new FeatureModel();
$l2_cache->one("where id_feature = 17 and id_products=$params->id");
$l3_cache = new FeatureModel();
$l3_cache->one("where id_feature = 18 and id_products=$params->id");

?>

<main class="page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <div style="text-align: center;margin-bottom: 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="text-start" style="font-size: 19px;"><i class="fa fa-home"></i><span><a href="index.html" style="color: black;">&nbsp;Home&nbsp;</a></span><span><i class="fa fa-angle-double-right"></i></span><span><a href="#" style="color: black;">&nbsp;Category</a></span><span><i class="fa fa-angle-double-right"></i></span><span><a href="#" style="color: black;">&nbsp;<?php echo $params->name ?>&nbsp;</a></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center">
                        <div class="col-md-6 d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center gallery" style="height: 400px;width: 400px;text-align: center;">
                            <div class="gallery">
                                <div id="product-preview" class="vanilla-zoom">
                                    <div class="zoomed-image"></div>
                                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center sidebar"><img class="img-fluid small-preview" src="assets/img/<?php echo $params->image?>.jpg" width="376" height="196" style="margin-top: 0px;"></div>
                                </div>
                                <p class="text-center" style="color: var(--bs-emphasis-color);font-size: 30px;margin-top: 50px;"><?php echo $params->name ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xxl-flex justify-content-xxl-center align-items-xxl-center" style="height: 800px;border-top-style: groove;border-top-color: var(--bs-emphasis-color);">
                <div>
                    <p>socket:<?php echo "$socket->value"; ?></p>
                    <p>chipset:<?php echo "$$chipset->value"; ?></p>
                    <p>semiconductor_size:<?php echo "$semiconductor_size->value"; ?></p>
                    <p>thermal_design_power:<?php echo "$thermal_design_power->value"; ?></p>
                    <p>clock_speed:<?php echo "$clock_speed->value"; ?></p>
                    <p>turbo_speed:<?php echo "$turbo_speed->value"; ?></p>
                    <p>threads:<?php echo "$threads->value"; ?></p>
                    <p>cores:<?php echo "$cores->value"; ?></p>
                    <p>l1_cache:<?php echo "$l1_cache->value"; ?></p>
                    <p>l2_cache:<?php echo "$l2_cache->value"; ?></p>
                    <p>l3_cache:<?php echo "$l3_cache->value"; ?></p>

                </div>
            </div>
            <div class="d-flex d-sm-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-sm-center justify-content-md-center justify-content-lg-center align-items-lg-center" style="height: 400px;border-top-style: groove;border-top-color: var(--bs-emphasis-color);">
                <div class="d-lg-flex justify-content-lg-center align-items-xxl-center" style="width: 500px;height: 300px;">
                    <div style="width: 500px;height: 250px;margin-top: 50px;">
                        <form style="width: 500px;">
                            <div class="d-sm-flex justify-content-sm-center">
                                <h1 class="d-flex" style="font-size: 35px;width: 348px;">Leave a review</h1>
                            </div>
                            <div class="d-flex d-md-flex justify-content-lg-center align-items-lg-center div-review">
                                <p class="d-lg-flex align-items-lg-center p-review"><?php echo $params->name ?></p>
                                <div><select class="form-select" style="width: 110.203px;padding: 12px 72px 12px 24px;height: 55px;margin-right: 9px;">
                                        <optgroup label="Rating">
                                            <option value="1" selected="">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </optgroup>
                                    </select></div>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center align-items-center"><button class="btn btn-primary d-flex d-xxl-flex justify-content-xxl-center align-items-xxl-center" type="submit">Submit</button></div>
                        <form style="width: 500px;">
                            <div class="d-flex justify-content-center align-items-center"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>