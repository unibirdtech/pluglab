<?php

if(!function_exists('slider_default_json')){
    function slider_default_json() {
        return json_encode(array(
                array(
                    'image_url' => PLUGLAB_PLUGIN_URL . 'assets/images/slider1.jpg',
                    'title' => 'Exceeding Your Expectations',
                    'subtitle' => 'Business we operate in is like an intricate game of strategy and chess, where every move counts and you keep score with money',
                    'text' => 'Curabitur',
                    'text2' => 'Phasellus',
                    'link' => '#',
                    'link2' => '#',
                    'id' => 'customizer_repeater_77y7op1f70b00'
                ),
                array(
                    'image_url' => PLUGLAB_PLUGIN_URL . 'assets/images/slider2.jpg',
                    'title' => 'Future Is Bright Think Avantage',
                    'subtitle' => 'Business we operate in is like an intricate game of strategy and chess, where every move counts and you keep score with money.',
                    'text' => 'Curabitur',
                    'text2' => 'Phasellus',
                    'link' => '#',
                    'link2' => '#',
                    'id' => 'customizer_repeater_77y7op1f70b01'
                ),
            ));
    }
}

if(!function_exists('service_default_json')){
    function service_default_json() {
        return json_encode(array(
                array(
                    'image_url' => PLUGLAB_PLUGIN_URL . 'assets/images/ser1.jpg',
                    'title' => 'Avantage Services',
                    'subtitle' => 'Business we operate in is like an intricate',
                    'text' => 'Curabitur',
                    'link' => '#',
                    'choice' => 'customizer_repeater_icon',
                    'icon_value' => 'fa-first-order',
                    'id' => 'customizer_repeater_97y7op8f70b00'
                ),
                array(
                    'image_url' => PLUGLAB_PLUGIN_URL . 'assets/images/ser2.jpg',
                    'title' => 'Our Approach',
                    'subtitle' => 'Business we operate in is like an intricate',
                    'text' => 'Curabitur',
                    'link' => '#',
                    'choice' => 'customizer_repeater_icon',
                    'icon_value' => 'fa-phone',
                    'id' => 'customizer_repeater_99y7op8f70b00'
                ),
                array(
                    'image_url' => PLUGLAB_PLUGIN_URL . 'assets/images/ser3.jpg',
                    'title' => 'Business Management',
                    'subtitle' => 'Business we operate in is like an intricate',
                    'text' => 'Curabitur',
                    'link' => '#',
                    'choice' => 'customizer_repeater_icon',
                    'icon_value' => 'fa-certificate',
                    'id' => 'customizer_repeater_90y7op8f70b00'
                ),
            ));
    }
}

if(!function_exists('testimonial_default_json')){
    function testimonial_default_json() {
        return json_encode(array(
                array(
                    'title' => 'Absolutely spot-on!',
                    'subtitle' => 'Donec eget ex nec leo mattis dignissim.',
                    'text' => 'Curabitur',
                    'text2' => 'Curabitur',
                    'link' => '#',
                    'link2' => '#',
                    'choice' => 'customizer_repeater_icon',
                    'image_url' => PLUGLAB_PLUGIN_URL . 'assets/images/circle.png',
                    'id' => 'customizer_repeater_90y7op8f70b40'
                ),
                array(
                    'title' => 'Best decision ever',
                    'subtitle' => 'Donec eget ex nec leo mattis dignissim.',
                    'text' => 'Curabitur',
                    'text2' => 'Curabitur',
                    'link' => '#',
                    'choice' => 'customizer_repeater_icon',
                    'image_url' => PLUGLAB_PLUGIN_URL . 'assets/images/circle1.png',
                    'id' => 'customizer_repeater_91y7op8f70b00'
                ),
                array(
                    'title' => 'Saved my Business',
                    'subtitle' => 'Donec eget ex nec leo mattis dignissim.',
                    'text' => 'Curabitur',
                    'text2' => 'Curabitur',
                    'link' => '#',
                    'choice' => 'customizer_repeater_icon',
                    'image_url' => PLUGLAB_PLUGIN_URL . 'assets/images/circle2.png',
                    'id' => 'customizer_repeater_95h7op8f70b00'
                ),
            ));
    }
}

function pluglab_get_social_icon_default() {
    return apply_filters(
        'pluglab_get_social_icon_default', json_encode(
                 array(
                array(
                    'icon_value'      =>  esc_html__( 'fa-facebook', 'pluglab' ),
                    'link'    =>  esc_html__( '#', 'pluglab' ),
                    'id'              => 'customizer_repeater_header_social_001',
                ),
                array(
                    'icon_value'      =>  esc_html__( 'fa-twitter', 'pluglab' ),
                    'link'    =>  esc_html__( '#', 'pluglab' ),
                    'id'              => 'customizer_repeater_header_social_003',
                ),
                array(
                    'icon_value'      =>  esc_html__( 'fa-linkedin', 'pluglab' ),
                    'link'    =>  esc_html__( '#', 'pluglab' ),
                    'id'              => 'customizer_repeater_header_social_004',
                ),
                array(
                    'icon_value'      =>  esc_html__( 'fa-instagram', 'pluglab' ),
                    'link'    =>  esc_html__( '#', 'pluglab' ),
                    'id'              => 'customizer_repeater_header_social_005',
                ),
            )
        )
    );
}

function plugLab_customizer_sanitize_callback($wp_customize) {

    if (!function_exists('pluglab_customizer_switch_sanitization')) {

        function pluglab_customizer_switch_sanitization($input) {
            if (true === $input) {
                return 1;
            } else {
                return 0;
            }
        }

    }

    if (!function_exists('customizer_text_sanitization')) {

        function customizer_text_sanitization() {
            if (strpos($input, ',') !== false) {
                $input = explode(',', $input);
            }
            if (is_array($input)) {
                foreach ($input as $key => $value) {
                    $input[$key] = sanitize_text_field($value);
                }
                $input = implode(',', $input);
            } else {
                $input = sanitize_text_field($input);
            }
            return $input;
        }

    }

    if (!function_exists('customizer_repeater_sanitize')) {

        function customizer_repeater_sanitize($input) {
            $input_decoded = json_decode($input, true);
            if (!empty($input_decoded)) {
                foreach ($input_decoded as $boxk => $box) {
                    foreach ($box as $key => $value) {

                        $input_decoded[$boxk][$key] = wp_kses_post(force_balance_tags($value));
                    }
                }
                return json_encode($input_decoded);
            }
            return $input;
        }

    }

    if (!function_exists('customizer_repeater_sanitize')) {
    function pluglab_sanitize_range_value( $number, $setting ) {
    
    // Ensure input is an absolute integer.
    $number = absint( $number );
    
    // Get the input attributes associated with the setting.
    $atts = $setting->manager->get_control( $setting->id )->input_attrs;
    
    // Get minimum number in the range.
    $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
    
    // Get maximum number in the range.
    $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
    
    // Get step.
    $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
    
    // If the number is within the valid range, return it; otherwise, return the default
    return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
}
    
    $slider_default_data = $wp_customize->get_setting('slider_repeater');
        if (!empty($slider_default_data)) {
            $slider_default_data->default = slider_default_json();
        }
    
    $service_default_data = $wp_customize->get_setting('service_repeater');
        if (!empty($service_default_data)) {
            $service_default_data->default = service_default_json();
        }
    
    $testimonial_default_data = $wp_customize->get_setting('testimonial_repeater');
        if (!empty($testimonial_default_data)) {
            $testimonial_default_data->default = testimonial_default_json();
        }
}

add_action('customize_register', 'plugLab_customizer_sanitize_callback',12);