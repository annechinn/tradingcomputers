<?php

namespace Trading_Computers\Elementor;

class Init {
    public function init() {
        add_action( 'elementor/widgets/register', array($this, 'register_new_widgets') );
    }

    public function register_new_widgets( $widgets_manager ) {
        require_once( TC_ELEMENTOR_PLUGIN_DIR . '/includes/widgets/class-product.php' );
        $widgets_manager->register( new \Trading_Computers\Elementor\Widgets\Product() );

    }
}