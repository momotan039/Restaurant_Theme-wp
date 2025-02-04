<div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
                    <h1 class="mb-5">Our Master Chefs</h1>
                </div>
                <div class="row g-4">
                    <?php
                $args = array(
                    'post_type'      => 'team-member',
                    'posts_per_page' => 4,
                    'orderby'        => 'rand',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                     <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url()?>" alt="">
                            </div>
                            <h5 class="mb-0"><?php the_title()?></h5>
                            <small><?php the_field('title_job_member')?></small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="<?php the_field('facebook_account_link')?>"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="<?php the_field('twitter_account_link')?>"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="<?php the_field('instagram_account_link')?>"><i class="fab fa-instagram"></i></a>
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