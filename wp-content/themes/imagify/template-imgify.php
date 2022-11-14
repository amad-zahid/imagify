<?php
/*
    Template Name: Imagify Template
*/
/*
 *
 * @package      Devinsta
 * @author       Devinsta
 * @copyright    Copyright (c) 2018, Devinsta
 * @license
 *
 */
// Force full width
add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');

// Content Area
remove_action('genesis_loop', 'genesis_do_loop');
add_filter('genesis_loop', 'home_content');

genesis();

function home_content()
{
    $qry = new WP_Query(array('posts_per_page' => -1, 'post_type' => 'slide', 'order' => 'ASC'));
?>
    <div class="hompage">
        <section class="banner">
            <div class="wrap">
                <div class="banner_slider">
                <?php   if ($qry->have_posts()): 
                            while ($qry->have_posts()) : $qry->the_post();
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                            ?>  
                            <div>
                                <div class="banner_row">
                                    <div class="text_area">
                                        <h4 class="cs_banner_heading"><?php the_title(); ?></h4>
                                        <div class="cs_banner_desc"><?php the_content(); ?></div>
                                        <div class="cs_imagify_btn">
                                            <a class="wp-block-button__link wp-element-button" href="#">Get Started 
                                                <img src="http://localhost/imagify/wp-content/uploads/2022/11/long-arrow-right.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img src="<?php echo $image[0]; ?>" alt="<?php the_title() ?>" />
                                    </div>
                                </div>
                            </div>
                            <?php
                            endwhile; 
                        endif;
                        wp_reset_query();
                ?>
                </div>
        </div>
        </section>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    </div>
<?php
}
?>
