<?php
if ( class_exists( 'Kirki' ) ) {
    //setup Kirki config
    Kirki::add_config( 'mt_fonts', array(
        'capability'  => 'edit_theme_options',
        'option_type' => 'theme_mod',
        'option_name' => 'mt_fonts',
    ) );

    Kirki::add_panel('mt_fonts', array(
        'priority' => 10,
        'title'    => esc_html__('Fonts', 'nextnews'),
    ) );

    // Add section
    Kirki::add_section( 'mt_typography_section', array(
        'title'       => esc_html__('Fonts', 'nextnews'),
        'panel'       => 'mt_fonts',
        'priority'    => 50,
    ) );


    Kirki::add_field( 'mt_fonts', array(
     'type'        => 'typography',
     'settings'    => 'mt_typography_headings',
     'label'       => esc_attr__( 'Headings', 'nextnews' ),
     'section'     => 'mt_typography_section',
     'priority'    => 10,
     'default'     => array( 'font-family'  => 'Lato', 'subsets' => array( 'latin-ext' ), ),
     'output' => array(
       array(
         'element' => 'h1, h2, h3, h4, h5, h6, blockquote',
       ),
     ),

    ) );

    Kirki::add_field( 'mt_fonts', array(
     'type'        => 'typography',
     'settings'    => 'mt_typography_body',
     'label'       => esc_attr__( 'Body', 'nextnews' ),
     'section'     => 'mt_typography_section',
     'priority'    => 10,
     'default'     => array( 'font-family'  => 'Lato', 'subsets' => array( 'latin-ext' ) ),
     'output' => array(
       array(
         'element' => 'body',
       ),
     ),

    ) );

    Kirki::add_field( 'mt_fonts', array(
     'type'        => 'typography',
     'settings'    => 'mt_typography_menu',
     'label'       => esc_attr__( 'Menu', 'nextnews' ),
     'section'     => 'mt_typography_section',
     'priority'    => 10,
     'default'     => array( 'font-family'  => 'Lato', 'subsets' => array( 'latin-ext' ) ),
     'output' => array(
       array(
         'element' => '.sf-menu',
       ),
     )
    ) );


    Kirki::add_field( 'mt_fonts', array(
     'type'        => 'typography',
     'settings'    => 'mt_typography_single_text',
     'label'       => esc_attr__( 'Post Text', 'nextnews' ),
     'section'     => 'mt_typography_section',
     'priority'    => 10,
     'default'     => array( 'font-family'  => 'Lato', 'subsets' => array( 'latin-ext' ) ),
     'output' => array(
       array(
         'element' => '.single-content p, .single-content ul, .single-content ol, .single-content li',
       ),
     ),

    ) );
}
?>
