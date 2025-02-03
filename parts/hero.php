<div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url(<?php echo get_template_directory_uri(  )?>/assets/img/bg-hero.jpg);">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft"><?php echo esc_html(get_option('hero_title'))?></h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2"><?php echo esc_html(get_option('hero_description'))?></p>
                            <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="<?php echo esc_url(get_option('hero_image'))?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
