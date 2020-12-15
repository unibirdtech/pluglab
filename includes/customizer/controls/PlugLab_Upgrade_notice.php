<?php

namespace Plug_Lab\Customizer\Controls;

class PlugLab_Upgrade_Notice extends \WP_Customize_Control {

    /**
     * Customize control type.
     *
     * @var    string
     */
    public $type = 'pluglab-upgrade';

    /**
     * Render content.
     */
    protected function render_content() {
        $upgrade_link = 'https://unibirdtech.com/pluglab-pro-theme/';
        ?>

        <div class="pluglab-upgrade-pro-message" style="display:none;">
            <h4 class="customize-control-title"><?php echo wp_kses_post('Upgrade to <a href="' . esc_url($upgrade_link) . '" target="_blank" > Shapro Pro </a> for unlimited', 'pluglab'); ?>  <?php esc_html_e('and get more premium features.', 'pluglab') ?></h4>
        </div>

        <?php
    }

}
