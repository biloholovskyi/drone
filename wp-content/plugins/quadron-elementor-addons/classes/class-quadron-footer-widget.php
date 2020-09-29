<?php

// register Quadron_Footer_Collapsed_Widget
add_action( 'widgets_init', function(){
    register_widget( 'Quadron_Footer_Collapsed_Widget' );
});

// Creating the widget
class Quadron_Footer_Collapsed_Widget extends WP_Widget {
    // class constructor
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'quadron_footer_collapsed_widget',
            'description' => esc_html__( 'Quadron Footer Collapsed Widget', 'quadron' ) );
        parent::__construct( 'quadron_footer_collapsed_widget', 'Quadron Footer Collapsed Widget', $widget_ops );
    }

    public function widget( $args, $instance )
    {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );
        $text = $instance[ 'text' ];
        $menu = $instance[ 'c_link' ];
        $collg = $instance[ 'c_lgcol' ] != '' ? ' '.esc_attr($instance[ 'c_lgcol' ]) : '';
        $colmd = $instance[ 'c_mdcol' ] != '' ? ' '.esc_attr($instance[ 'c_mdcol' ]) : '';
        $colsm = $instance[ 'c_smcol' ] != '' ? ' '.esc_attr($instance[ 'c_smcol' ]) : '';
        $colxs = $instance[ 'c_xscol' ] != '' ? ' '.esc_attr($instance[ 'c_xscol' ]) : '';
        $class = $instance[ 'c_class' ] != '' ? ' '.esc_attr($instance[ 'c_class' ]) : '';

        // The following variable is for a checkbox option type
        $c_html = $instance[ 'c_html' ] ? 'true' : 'false';

        echo '<div class="col-nt'.$colxs.$colsm.$colmd.$collg.$class.'"><div class="mobile-collapse">';

        echo wp_kses( $before_widget, quadron_allowed_html() );

            if ( $title ) {
                echo wp_kses( $before_title . $title . $after_title, quadron_allowed_html() );
            }
            echo '<div class="pt-collapse-content">';
            // Retrieve the checkbox
            if( 'true' == $c_html ) {
                echo wp_kses( $text, quadron_allowed_html() );
            }

            if( 'false' == $c_html ) {
                if ( has_nav_menu($menu) ) {
                    echo'<ul class="list">';
                        // default wp menu
                        wp_nav_menu(
                            array(
                                'theme_location' => $menu,
                                'container' => '', // menu wrapper element
                                'container_class' => '',
                                'container_id' => '', // default: none
                                'menu_class' => '', // ul class
                                'menu_id' => '', // ul id
                                'items_wrap' => '%3$s',
                                'before' => '', // before <a>
                                'after' => '', // after <a>
                                'link_before' => '', // inside <a>, before text
                                'link_after' => '', // inside <a>, after text
                                'depth' => 1, // '0' to display all depths
                                'echo' => true,
                                'fallback_cb' => 'Quadron_Wp_Bootstrap_Navwalker::fallback',
                                'walker' => new Quadron_Wp_Bootstrap_Navwalker()
                            )
                        );
                    echo'</ul>';
                }
            }
        echo wp_kses( $after_widget, quadron_allowed_html() );
        echo '</div></div></div>';
    }

    public function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags($new_instance[ 'title' ]);
        $instance['text'] = wp_kses($new_instance['text'], quadron_allowed_html());
        // The update for the variable of the checkbox
        $instance[ 'c_html' ] = $new_instance[ 'c_html' ];
        $instance[ 'c_link' ] = $new_instance[ 'c_link' ];
        $instance[ 'c_lgcol' ] = esc_attr($new_instance[ 'c_lgcol' ]);
        $instance[ 'c_mdcol' ] = esc_attr($new_instance[ 'c_mdcol' ]);
        $instance[ 'c_smcol' ] = esc_attr($new_instance[ 'c_smcol' ]);
        $instance[ 'c_xscol' ] = esc_attr($new_instance[ 'c_xscol' ]);
        $instance[ 'c_class' ] = esc_attr($new_instance[ 'c_class' ]);
        return $instance;
    }

    public function form( $instance )
    {
        $defaults = array(
            'title' => esc_html__( 'Useful Links', 'quadron' ),
            'c_html' => 'off',
            'c_lgcol' => '',
            'c_mdcol' => '',
            'c_smcol' => '',
            'c_xscol' => '',
            'c_link' => '',
            'c_class' => ''
        );
        $instance = wp_parse_args( ( array ) $instance, $defaults );
        $registered_menus = get_registered_nav_menus();
        $collg = array(
            '' => esc_html__( 'Select column width', 'quadron' ),
            'col-lg-auto' => esc_html__( 'Auto column', 'quadron' ),
            'col-lg-1' => esc_html__( '1 column', 'quadron' ),
            'col-lg-2' => esc_html__( '2 column', 'quadron' ),
            'col-lg-3' => esc_html__( '3 column', 'quadron' ),
            'col-lg-4' => esc_html__( '4 column', 'quadron' ),
            'col-lg-5' => esc_html__( '5 column', 'quadron' ),
            'col-lg-6' => esc_html__( '6 column', 'quadron' ),
            'col-lg-7' => esc_html__( '7 column', 'quadron' ),
            'col-lg-8' => esc_html__( '8 column', 'quadron' ),
            'col-lg-9' => esc_html__( '9 column', 'quadron' ),
            'col-lg-10' => esc_html__( '10 column', 'quadron' ),
            'col-lg-11' => esc_html__( '11 column', 'quadron' ),
            'col-lg-12' => esc_html__( '12 column', 'quadron' )
        );
        $colmd = array(
            '' => esc_html__( 'Select column width', 'quadron' ),
            'col-md-auto' => esc_html__( 'Auto column', 'quadron' ),
            'col-md-1' => esc_html__( '1 column', 'quadron' ),
            'col-md-2' => esc_html__( '2 column', 'quadron' ),
            'col-md-3' => esc_html__( '3 column', 'quadron' ),
            'col-md-4' => esc_html__( '4 column', 'quadron' ),
            'col-md-5' => esc_html__( '5 column', 'quadron' ),
            'col-md-6' => esc_html__( '6 column', 'quadron' ),
            'col-md-7' => esc_html__( '7 column', 'quadron' ),
            'col-md-8' => esc_html__( '8 column', 'quadron' ),
            'col-md-9' => esc_html__( '9 column', 'quadron' ),
            'col-md-10' => esc_html__( '10 column', 'quadron' ),
            'col-md-11' => esc_html__( '11 column', 'quadron' ),
            'col-md-12' => esc_html__( '12 column', 'quadron' )
        );
        $colsm = array(
            '' => esc_html__( 'Select column width', 'quadron' ),
            'col-sm-auto' => esc_html__( 'Auto column', 'quadron' ),
            'col-sm-1' => esc_html__( '1 column', 'quadron' ),
            'col-sm-2' => esc_html__( '2 column', 'quadron' ),
            'col-sm-3' => esc_html__( '3 column', 'quadron' ),
            'col-sm-4' => esc_html__( '4 column', 'quadron' ),
            'col-sm-5' => esc_html__( '5 column', 'quadron' ),
            'col-sm-6' => esc_html__( '6 column', 'quadron' ),
            'col-sm-7' => esc_html__( '7 column', 'quadron' ),
            'col-sm-8' => esc_html__( '8 column', 'quadron' ),
            'col-sm-9' => esc_html__( '9 column', 'quadron' ),
            'col-sm-10' => esc_html__( '10 column', 'quadron' ),
            'col-sm-11' => esc_html__( '11 column', 'quadron' ),
            'col-sm-12' => esc_html__( '12 column', 'quadron' )
        );
        $colxs = array(
            '' => esc_html__( 'Select column width', 'quadron' ),
            'col-xs-auto' => esc_html__( 'Auto column', 'quadron' ),
            'col-xs-1' => esc_html__( '1 column', 'quadron' ),
            'col-xs-2' => esc_html__( '2 column', 'quadron' ),
            'col-xs-3' => esc_html__( '3 column', 'quadron' ),
            'col-xs-4' => esc_html__( '4 column', 'quadron' ),
            'col-xs-5' => esc_html__( '5 column', 'quadron' ),
            'col-xs-6' => esc_html__( '6 column', 'quadron' ),
            'col-xs-7' => esc_html__( '7 column', 'quadron' ),
            'col-xs-8' => esc_html__( '8 column', 'quadron' ),
            'col-xs-9' => esc_html__( '9 column', 'quadron' ),
            'col-xs-10' => esc_html__( '10 column', 'quadron' ),
            'col-xs-11' => esc_html__( '11 column', 'quadron' ),
            'col-xs-12' => esc_html__( '12 column', 'quadron' )
        );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title', 'quadron' ); ?></label>
            <input class="widefat"  id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'title' ] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'c_lgcol' ); ?>"><?php echo esc_html__( 'Responsive Column ( Large Device )', 'quadron' ); ?></label>
        </p>
        <p>
            <select class="col-lg" name="<?php echo $this->get_field_name( 'c_lgcol' ); ?>">
                <?php foreach ( $collg as $col => $desc) { ?>
                    <option <?php selected( $instance[ 'c_lgcol' ], $col ); ?> value="<?php echo $col; ?>"><?php echo $desc; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'c_mdcol' ); ?>"><?php echo esc_html__( 'Responsive Column ( Desktop / Tablet-Landscape )', 'quadron' ); ?></label>
        </p>
        <p>
            <select class="col-md" name="<?php echo $this->get_field_name( 'c_mdcol' ); ?>">
                <?php foreach ( $colmd as $col => $desc) { ?>
                    <option <?php selected( $instance[ 'c_mdcol' ], $col ); ?> value="<?php echo $col; ?>"><?php echo $desc; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'c_smcol' ); ?>"><?php echo esc_html__( 'Responsive Column ( Tablet-Portrait )', 'quadron' ); ?></label>
        </p>
        <p>
            <select class="col-sm" name="<?php echo $this->get_field_name( 'c_smcol' ); ?>">
                <?php foreach ( $colsm as $col => $desc) { ?>
                    <option <?php selected( $instance[ 'c_smcol' ], $col ); ?> value="<?php echo $col; ?>"><?php echo $desc; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'c_xscol' ); ?>"><?php echo esc_html__( 'Responsive Column ( Phone )', 'quadron' ); ?></label>
        </p>
        <p>
            <select class="col-sm" name="<?php echo $this->get_field_name( 'c_xscol' ); ?>">
                <?php foreach ( $colxs as $col => $desc) { ?>
                    <option <?php selected( $instance[ 'c_xscol' ], $col ); ?> value="<?php echo $col; ?>"><?php echo $desc; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'c_html' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'c_html' ); ?>" name="<?php echo $this->get_field_name( 'c_html' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'c_html' ); ?>"><?php echo esc_html__( 'Use Custom HTML instead of Link (click the save button after checking)', 'quadron' ); ?></label>
        </p>
        <?php if ( 'on' == $instance[ 'c_html' ] ) { ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php echo esc_html__( 'Custom HTML Area', 'quadron' ); ?></label>
                <textarea class="widefat content" id="<?php echo $this->get_field_id( 'text' ); ?>" rows="10" cols="10" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $instance[ 'text' ]; ?></textarea>
            </p>
        <?php } else { ?>
            <p>
                <label for="<?php echo $this->get_field_name( 'c_link' ); ?>"><?php echo esc_html__( 'Select Menu:', 'quadron' ); ?></label>
                <select name="<?php echo $this->get_field_name( 'c_link' ); ?>">
                    <?php foreach ( $registered_menus as $location => $description ) { ?>
                        <option <?php selected( $instance[ 'c_link' ], $location ); ?> value="<?php echo $location; ?>"><?php echo $description; ?></option>
                    <?php } ?>
                </select>
            </p>
        <?php } ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'c_class' ); ?>"><?php echo esc_html__( 'Custom Class', 'quadron' ); ?></label>
            <input class="widefat"  id="<?php echo $this->get_field_id( 'c_class' ); ?>" name="<?php echo $this->get_field_name( 'c_class' ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'c_class' ] ); ?>" />
        </p>
    <?php
    }
}
