<?php

use app\models\FeatureModel;

$sequential_read_speed = new FeatureModel();
$sequential_read_speed->one("where id_feature = 19 and id_products=$params->id");
$random_read_speed = new FeatureModel();
$random_read_speed->one("where id_feature = 20 and id_products=$params->id");
$sequential_write_speed = new FeatureModel();
$sequential_write_speed->one("where id_feature = 21 and id_products=$params->id");
$random_write_speed = new FeatureModel();
$random_write_speed->one("where id_feature = 22 and id_products=$params->id");
$storage = new FeatureModel();
$storage->one("where id_feature = 23 and id_products=$params->id");
$pcie_version = new FeatureModel();
$pcie_version->one("where id_feature = 24 and id_products=$params->id");
$terabytes_written = new FeatureModel();
$terabytes_written->one("where id_feature = 25 and id_products=$params->id");
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
                    <p>sequential_read_speed:<?php echo "$sequential_read_speed->value"; ?></p>
                    <p>random_read_speed:<?php echo "$random_read_speed->value"; ?></p>
                    <p>sequential_write_speed:<?php echo "$sequential_write_speed->value"; ?></p>
                    <p>random_write_speed:<?php echo "$random_write_speed->value"; ?></p>
                    <p>storage:<?php echo "$storage->value"; ?></p>
                    <p>pcie_version:<?php echo "$pcie_version->value"; ?></p>
                    <p>terabytes_written:<?php echo "$terabytes_written->value"; ?></p>
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
