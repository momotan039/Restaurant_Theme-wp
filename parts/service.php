 <div class="container-xxl py-5">
     <div class="container">
         <div class="row g-4">
             <?php
                $args = array(
                    'post_type'      => 'service',
                    'posts_per_page' => 4,
                    'orderby'        => 'rand',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                     <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                         <div class="service-item rounded pt-3">
                             <div class="p-4">
                                 <i class="fa fa-3x <?php the_field('service_fa_icon')?> text-primary mb-4"></i>
                                 <h5><?php echo get_the_title( )?></h5>
                                 <p><?php the_field('service_description')?></p>
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
