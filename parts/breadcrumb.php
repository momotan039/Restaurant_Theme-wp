<div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url(<?php echo get_template_directory_uri(  )?>/assets/img/bg-hero.jpg);">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo get_the_title()?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="<?php echo get_home_url()?>">Home</a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><a href="<?php echo get_the_permalink()?>"><?php echo get_the_title()?></a></li>
                        </ol>
                    </nav>
                </div>
            </div>