<?php

use app\core\Application;

?>
<section class="clean-block clean-catalog dark" style="background: var(--bs-body-bg);">
    <div class="container">
        <div style="text-align: center;">
            <div class="row">
                <div class="col">
                    <div class="text-start" style="font-size: 19px;"><i class="fa fa-home"></i><span><a href="index.html" style="color: black;">&nbsp;Home&nbsp;</a></span><span><i class="fa fa-angle-double-right"></i></span><span><a href="#" style="color: black;">&nbsp;Graphics cards</a></span></div>
                </div>
            </div>
        </div>
        <div class="block-heading">
            <h2 style="color: var(--bs-emphasis-color);">Graphics cards comparison</h2>
            <p></p>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-none d-md-block">
                        <div class="filters">
                            <div style="margin-bottom: 20px;">
                                <h3><strong>Sort by:</strong></h3><select>
                                    <option value="14" selected="">Release Date</option>
                                    <option value="12">Price (low to high)</option>
                                    <option value="13">Price (high to low)</option>
                                </select>
                            </div>
                            <div class="filter-item" style="margin-bottom: 20px;">
                                <h3><strong>manufacturer</strong></h3>
                                <div class="form-check" style="font-size: 26px;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="color: rgb(0,0,0);font-size: 22px;">Nvidia</label></div>
                                <div class="form-check" style="font-size: 26px;color: rgb(0,0,0);"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2" style="font-size: 22px;">AMD</label></div>
                            </div>
                            <div class="filter-item" style="margin-bottom: 20px;">
                                <h3 style="margin-bottom: 10px;">Performance</h3>
                                <div style="margin-bottom: 20px;">
                                    <p><label class="form-label" for="amount-1" style="margin-bottom: 0px;font-size: 22px;">Clock speed:</label></p><input type="text" id="clock-speed-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-range-clock-speed" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <p><label class="form-label" for="amount-1" style="margin-bottom: 0px;font-size: 22px;">Texture mapping units:</label></p><input type="text" id="texture-mapping-units-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-texture-mapping-units" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <p><label class="form-label" for="amount-1" style="margin-bottom: 0px;font-size: 22px;">Memory bus width:</label></p><input type="text" id="memory-bus-widht-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-memory-bus-widht" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <p><label class="form-label" for="amount-1" style="margin-bottom: 0px;font-size: 22px;">Vram size:</label></p><input type="text" id="vram-size-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-vram-size" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                            </div>
                            <div class="filter-item" style="margin-bottom: 20px;">
                                <h3 style="margin-bottom: 10px;">Price</h3>
                                <div>
                                    <p><label class="form-label" for="amount" style="margin-bottom: 0px;font-size: 22px;">Price range:</label></p><input type="text" id="price-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-range-price" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">Filters<i class="icon-arrow-down filter-caret"></i></a>
                        <div class="collapse" id="filters">
                            <div class="filters">
                                <div class="filter-item">
                                    <h3>Categories</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Phones</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Laptops</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">PC</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Tablets</label></div>
                                </div>
                                <div class="filter-item">
                                    <h3>Brands</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Samsung</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Apple</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">HTC</label></div>
                                </div>
                                <div class="filter-item">
                                    <h3>OS</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Android</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">iOS</label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="products" style="border-color: var(--bs-emphasis-color);">
                        <div class="row g-0">

                            <?php
                            if(Application::$app->session->get('user')){
                                if($_SESSION['user'][0]['role'] == 'Admin'){
                                    echo "<div class='col-12 col-md-6 col-lg-4'>
                                            <div class='border-light-subtle clean-product-item'>
                                            <div class='image'><a href='/addGPU'><img class='img-fluid d-block mx-auto' src='assets/img/gpu_default.jpg' style='width: 230px;margin: 0px;margin-top: 24px;height: 120px;margin-bottom: 24px;'></a></div>
                                            <div class='product-name'><a href='/addGPU' style='font-size: 26px;font-weight: bold;'>Add new</a></div>
                                            <div class='about'>
                                                <div class='price'>
                                                    <h3></h3>
                                                </div>
                                            </div>
                                        </div>
                                      </div>";
                                }
                            }
                            foreach($params as $param){
                                    echo "<div class='col-12 col-md-6 col-lg-4'>
                                            <div class='border-light-subtle clean-product-item'>
                                            <div class='image'><a href="; echo"/gpu?id=$param[id]"; echo "><img class='img-fluid d-block mx-auto' src='assets/img/"; echo"$param[image].jpg'"; echo"style='width: 230px;margin: 0px;margin-top: 24px;height: 120px;margin-bottom: 24px;'></a></div>
                                            <div class='product-name'><a href='#' style='font-size: 26px;font-weight: bold;'>$param[name]</a></div>
                                            <div class='about'>";
                                    if(Application::$app->session->get('user')){
                                        if($_SESSION['user'][0]['role'] == 'Admin'){
                                            echo "<div><a href="; echo "/deleteProduct?id=$param[id]&id_category=$param[id_category]"; echo">Delete</a></div>";
                                        }
                                    }
                                    echo "<div class='price'>
                                                    <h3>$$param[price]</h3>
                                                </div>
                                            </div>
                                        </div>
                                      </div>";
                            }
                            ?>
                        </div>
                        <nav class="d-flex d-xl-flex d-xxl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="margin-top: 30px;">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link">1</a></li>
                                <li class="page-item"><a class="page-link">2</a></li>
                                <li class="page-item"><a class="page-link">3</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
