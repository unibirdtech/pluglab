<?php

namespace Plug_Lab\Theme\Shapro;

class pluglab_layouts {

    public function top_header() { ?>

        <div class="topbar">
        <div class="container">
          <div class="row align-items-center">
            <?php $hide_show_top_details = get_theme_mod('hide_show_top_details','1'); 
            if($hide_show_top_details == '1') {

            $top_mail_icon = get_theme_mod('top_mail_icon','fa-map-marker');
            $top_header_mail_text = get_theme_mod('top_header_mail_text','youremail@gmail.com');
            $top_phone_icon = get_theme_mod('top_phone_icon','fa-phone');
            $top_header_phone_text = get_theme_mod('top_header_phone_text','134-566-7680');
            ?>
            <div class="col-md-6">
              <ul class="left">
                <li><i class="fa <?php echo $top_mail_icon; ?>"></i><a href="#"><?php echo $top_header_mail_text; ?></a></li>
                <li><i class="fa <?php echo $top_phone_icon; ?>"></i><a href="#"><?php echo $top_header_phone_text; ?></a></li>
              </ul>
            </div>
            <?php } $social_icon_enable_disable = get_theme_mod('social_icon_enable_disable','1');
             ?>
            <div class="col-md-6">
              <ul class="right">
                <?php
                    $social_icons = get_theme_mod( 'shapro_social_icons',pluglab_get_social_icon_default());
                    if($social_icon_enable_disable == '1') {
                    $social_icons = json_decode($social_icons);
                    if( $social_icons!='' )
                    {
                    foreach($social_icons as $social_item){ 
                    $social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'shapro_translate_single_string', $social_item->icon_value, 'Header section' ) : ''; 
                    $social_link = ! empty( $social_item->link ) ? apply_filters( 'shapro_translate_single_string', $social_item->link, 'Header section' ) : '';
                ?>
                    <li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
                <?php } } } ?>
                <?php 
                $hire_us_btn_enable_disable = get_theme_mod('hire_us_btn_enable_disable','1');
                if($hire_us_btn_enable_disable == '1') {
                $hire_btn_text = get_theme_mod('hire_btn_text', 'Hire Us!'); 
                $hire_btn_link = get_theme_mod('hire_btn_link','#');
                ?>
                <a href="<?php echo esc_url($hire_btn_link); ?>" target="_blank" class="btn btn-default quote_btn"><?php echo $hire_btn_text; ?></a>
                <?php } ?>
            </ul>
            </div>
          </div>
        </div>
      </div>
    <?php }

    public function slider() {
        $is_display_enable = get_theme_mod('slider_display', true);
        if ($is_display_enable) {
            $slider_content_raw = get_theme_mod('slider_repeater', slider_default_json());
            $slider_content = json_decode($slider_content_raw);
            ?><div class="sliderhome owl-carousel owl-theme"><?php
            foreach ($slider_content as $item) {
//        print_r($item);die;
                $slider_image = !empty($item->image_url) ? apply_filters('translate_single_string', $item->image_url, 'Slider section') : '';
                $slider_button1 = !empty($item->text) ? apply_filters('translate_single_string', $item->text, 'Slider section') : '';
                $slider_button2 = !empty($item->text2) ? apply_filters('translate_single_string', $item->text2, 'Slider section') : '';
                $slider_title = !empty($item->title) ? apply_filters('translate_single_string', $item->title, 'Slider section') : '';
                $slider_subtitle = !empty($item->subtitle) ? apply_filters('translate_single_string', $item->subtitle, 'Slider section') : '';
                $slider_link1 = !empty($item->link) ? apply_filters('translate_single_string', $item->link, 'Slider section') : '';
                $slider_link2 = !empty($item->link2) ? apply_filters('translate_single_string', $item->link2, 'Slider section') : '';
                ?>

                    <?php // $slid1=PLUGLAB_PLUGIN_URL . 'assets/images/slider1.jpg'; ?>
                    <?php $slid1 = $slider_image; ?>
                    <div class="slide d-flex align-items-center cover" style="background-image: url(<?php echo $slid1; ?> );">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-center text-center">
                                <div class="col-10 col-md-6 static">
                                    <div class="owl-slide-text">
                                        <h2 class="owl-slide-animated owl-slide-title"><?php echo $slider_title; ?></h2>
                                        <div class="owl-slide-animated owl-slide-subtitle mb-3">
                                            <?php echo $slider_subtitle; ?>
                                        </div>
                                        <a class="btn btn-default owl-slide-animated owl-slide-cta" href="#" target="_blank" role="button"><?php echo $slider_button1; ?></a>
                                        <a class="btn btn-white owl-slide-animated owl-slide-cta" href="#" target="_blank" role="button"><?php echo $slider_button2; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/owl-slide-->


                <?php }
                ?></div><?php
                
            }
    }

    public function callout() {
        if (isset($is_display_enable))
            unset($is_display_enable);
        $is_display_enable = get_theme_mod('slider_display', true);
        $callout1_icon = get_theme_mod('callout1_icon', 'fa-bullseye');
        $callout1_title = get_theme_mod('callout1_title', 'Strategy');
        $callout1_desc = get_theme_mod('callout1_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $callout2_icon = get_theme_mod('callout2_icon', 'fa-rocket');
        $callout2_title = get_theme_mod('callout2_title', 'Start Ups');
        $callout2_desc = get_theme_mod('callout2_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $callout3_icon = get_theme_mod('callout3_icon', 'fa-comments');
        $callout3_title = get_theme_mod('callout3_title', 'Organisations');
        $callout3_desc = get_theme_mod('callout3_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        ?>

        <div class="container section features bg-grey tp-80 mb-40" >
            <div class="row align-items-center no-gutter">
                <div class="col-md-4">
                    <div class="media hover_eff feature">
                        <i class="fa <?php echo $callout1_icon; ?> mr-3"></i>
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $callout1_title; ?></h5>
                            <p><?php echo $callout1_desc; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media hover_eff feature">
                        <i class="fa <?php echo $callout2_icon; ?> mr-3"></i>
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $callout2_title; ?></h5>
                            <p><?php echo $callout2_desc; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media hover_eff feature">
                        <i class="fa <?php echo $callout3_icon; ?> mr-3"></i>
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $callout3_title; ?></h5>
                            <p><?php echo $callout3_desc; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function service() {

        if (isset($is_display_enable))
            unset($is_display_enable);
        $is_display_enable = get_theme_mod('service_display', true);

        if ($is_display_enable) {
            $service_title = get_theme_mod('service_title', 'WHAT CAN WE OFFER');
            $service_sub_title = get_theme_mod('service_sub_title', "Services We're offering");
            $service_desc = get_theme_mod('service_description', 'Business we operate in is like an intricate');

            $service_content_raw = get_theme_mod('service_repeater', service_default_json());
            $service_content = json_decode($service_content_raw);
            ?>

            <div id="service-section" class="section pdt0">
                <div class="container">
                    <div class="section-heading text-center">
                        <h3 class="sub-title"><?php echo $service_title; ?></h3>
                        <h2 class="ititle"><?php echo $service_sub_title; ?></h2>
                        <p><?php echo $service_desc; ?></p>
                    </div>
                    <div class="row">

                        <?php
                        foreach ($service_content as $item) {
//        print_r($item);die;
                            $service_item_title = !empty($item->title) ? apply_filters('translate_single_string', $item->title, 'Service section') : '';
                            $service_item_subtitle = !empty($item->subtitle) ? apply_filters('translate_single_string', $item->subtitle, 'Service section') : '';
                            $service_choice = !empty($item->choice) ? apply_filters('translate_single_string', $item->choice, 'Service section') : '';
                            $service_image = !empty($item->image_url) ? apply_filters('translate_single_string', $item->image_url, 'Service section') : '';
                            $service_icon_value = !empty($item->icon_value) ? apply_filters('translate_single_string', $item->icon_value, 'Service section') : '';
                            $service_button = !empty($item->text) ? apply_filters('translate_single_string', $item->text, 'Service section') : '';
                            $service_link = !empty($item->link) ? apply_filters('translate_single_string', $item->link, 'Service section') : '';
                            ?>
                            <div class="col-md-4">
                                <div class="service hover_eff cover-bg text-center" style="background-image: url(<?php echo $service_image; ?> );">
                                    <div class="inner">
                                        <div class="top_icon">
                                            <i class="fa <?php echo $service_icon_value; ?>"></i>
                                        </div>
                                        <div class="bottom_text">
                                            <h2><a href="#"><?php echo $service_item_title; ?></a></h2>
                                            <p><?php echo $service_item_subtitle; ?></p>
                                            <?php if (!empty($service_button) && !empty($service_link)) { ?>
                                                <a href="<?php echo $service_link; ?>" class="btn btn-default"><?php echo $service_button; ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function cta()
    { 

    $cta_display = get_theme_mod('cta_display','1');
    $cta_title = get_theme_mod('cta_title','Pellentesque molestie laor' );
    $cta_desc = get_theme_mod('cta_desc','NEED A CONSULTATION?');
    $cta_btn_read = get_theme_mod('cta_btn_read','Contact');
    $cta_btn_link = get_theme_mod('cta_btn_link','#');
    
    if($cta_display == '1') {

        ?>
        <div class="section callout bg-dark cover-bg text-center" style="background-image: url(images/ser1.jpg);" >
      <div class="container">
        <div class="row align-items-center flex-column">
            <h3 class="sub-title"><?php echo $cta_title; ?></h3>
            <h2 class="ititle mb-4"><?php echo $cta_desc; ?></h2>
            <a class="btn btn-white" href="<?php echo $cta_btn_link; ?>"><?php echo $cta_btn_read; ?></a>
          
        </div>
      </div>
    </div>
    <?php } }



    public function testimonial() {
        if (isset($is_display_enable))
            unset($is_display_enable);
        $is_display_enable = get_theme_mod('testimonial_display', true);

        if ($is_display_enable) {
            $testimonial_title = get_theme_mod('testimonial_title', 'GREAT REVIEWS');
            $testimonial_sub_title = get_theme_mod('testimonial_sub_title', 'Trusted Biggest Names');
            $testimonial_desc = get_theme_mod('testimonial_description', 'Business we operate in is like an intricate');

            $testimonial_content_raw = get_theme_mod('testimonial_repeater', testimonial_default_json());
            $testimonial_content = json_decode($testimonial_content_raw);
            ?>

            <div class="section testimonials" >
                <div class="container">
                    <div class="section-heading text-center">
                        <h3 class="sub-title"><?php echo $testimonial_title; ?></h3>
                        <h2 class="ititle"><?php echo $testimonial_sub_title; ?></h2>
                        <p><?php echo $testimonial_desc; ?></p>
                    </div>
                    <div class="row">

                        <?php
                        foreach ($testimonial_content as $item) {
//        print_r($item);die;
                            $testimonial_item_title = !empty($item->title) ? apply_filters('translate_single_string', $item->title, 'Testimonial section') : '';
                            $testimonial_item_subtitle = !empty($item->subtitle) ? apply_filters('translate_single_string', $item->subtitle, 'Testimonial section') : '';
                            $testimonial_choice = !empty($item->choice) ? apply_filters('translate_single_string', $item->choice, 'Testimonial section') : '';
                            $testimonial_image = !empty($item->image_url) ? apply_filters('translate_single_string', $item->image_url, 'Testimonial section') : '';
                            $testimonial_icon_value = !empty($item->icon_value) ? apply_filters('translate_single_string', $item->icon_value, 'Testimonial section') : '';
                            $testimonial_text = !empty($item->text) ? apply_filters('translate_single_string', $item->text, 'Testimonial section') : '';
                            $testimonial_text2 = !empty($item->text2) ? apply_filters('translate_single_string', $item->text2, 'Testimonial section') : '';
                            ?>
                            <div class="col-md-4">
                                <div class="testimonial hover_eff">
                                    <div class="inner">
                                        <h4 class="mb-4"><?php echo $testimonial_item_title; ?></h4>
                                        <div class="bottom_text mb-4">
                                            <p><?php echo $testimonial_item_subtitle; ?></p>
                                        </div>


                                        <div class="media">
                                            <img class="mr-3 img-author" src="<?php echo $testimonial_image; ?>" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h6><?php echo $testimonial_text; ?></h6>
                                                <div class="details"><?php echo $testimonial_text2; ?></div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <?php
        }
    }

    public function blog() {
        if (isset($is_display_enable))
            unset($is_display_enable);
        $is_display_enable = get_theme_mod('blog_display', true);

        if ($is_display_enable) {
            $blog_title = get_theme_mod('blog_title', 'OUR LATEST NEWS');
            $blog_sub_title = get_theme_mod('blog_sub_title', 'Avantage Blog Posts');
            $blog_desc = get_theme_mod('blog_description', 'Business we operate in is like an intricate');
            ?>
            <!--section blog-->
            <div class="section blogs bg-grey">
                <div class="container">
                    <?php if (!empty($blog_title) || !empty($blog_sub_title) || !empty($blog_desc))  ?>
                    <div class="section-heading text-center">
                        <?php echo ($blog_title) ? "<h3 class='sub-title'>$blog_title</h3>" : ''; ?>
                        <?php echo ($blog_sub_title) ? "<h2 class='ititle'>$blog_sub_title</h2>" : ''; ?>
                        <?php echo ($blog_desc) ? "<p>$blog_desc</p>" : ''; ?>
                        <?php $shapro_theme_blog_category = get_theme_mod('shapro_theme_blog_category','1'); ?>
                    </div>

                    <?php
                    $post_args = array('post_type' => 'post', 'category__in' => $shapro_theme_blog_category, 'post__not_in' => get_option("sticky_posts"));
                    query_posts($post_args);
                    if (query_posts($post_args)) {
                        echo '<div class="row">'; //parent row of posts
                        while (have_posts()):the_post(); {
                                ?>
                                <div class="col-md-4">
                                    <div class="blog_post hover_eff mb-4 bg-white">
                                        <div class="post_img img_eff">

                                            <!--featured image-->
                                            <?php if (has_post_thumbnail()): ?>						
                                                <figure class="post-thumbnail">
                                                    <?php $img_class = array('class' => "img-fluid"); ?>
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', $img_class); ?></a>
                                                </figure>
                                            <?php endif; ?>	
                                            <!--featured image-->

                                            <span class="date"><a href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>"><time><?php echo esc_html(get_the_date()); ?></time></a></span>
                                        </div>
                                        <div class="post_content">
                                            <div class="post_meta">
                                                <span class="author"><?php echo esc_html__('by ', 'pluglab'); ?> 
                                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?>
                                                    </a>
                                                </span>

                                                <!--blog categories-->
                                                <?php
                                                $category_data = get_the_category_list();
                                                if (!empty($category_data)) {
                                                    ?>
                                                    <span class="categories"><a href="<?php the_permalink(); ?>"><?php the_category(', '); ?></a></span>
                                                <?php } ?>
                                                <!--blog categories-->

                                            </div>
                                            <h4 class="mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <a href="<?php the_permalink(); ?>" class="more btn btn-default"><?php esc_html_e('Read More', 'pluglab'); ?></a>
                                        </div> 
                                    </div>
                                </div>
                                <?php
                            }
                        endwhile;
                        echo '</div>'; //row end
                    }
                }
                ?>
            </div>
        </div>
        <!--/section-->
        <?php
    }

}