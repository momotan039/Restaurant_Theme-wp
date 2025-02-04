<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                    <h1 class="mb-5">Our Clients Say!!!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    
                    <?php
                $args = array(
                    'post_type'      => 'testimonial',
                    'posts_per_page' => -1,
                    'orderby'        => 'rand',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                     <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p><?php the_field('review')?></p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="<?php echo get_the_post_thumbnail_url(  )?>" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1"><?php the_title()?></h5>
                                <small><?php the_field('client_job')?></small>
                            </div>
                        </div>
                    </div>
             <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<h1>No services found</h1>';
                endif;
                ?>
                </div>
            </div>
        </div>