<?php

class TC_Elementor_Widgets_Init {
    public function init() {
        add_action( 'elementor/widgets/register', array($this, 'register_new_widgets') );
    }

    public function register_new_widgets( $widgets_manager ) {
        require_once( TC_ELEMENTOR_PLUGIN_DIR . '/includes/Widgets/TC_Elementor_Product.php' );
        $widgets_manager->register( new \TC_Elementor_Product() );

    }
}