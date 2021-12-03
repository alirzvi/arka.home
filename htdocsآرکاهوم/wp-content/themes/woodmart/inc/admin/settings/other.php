<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

use XTS\Options;

Options::add_field(
	array(
		'id'          => 'negative_gap',
		'name'        => esc_html__( 'Elementor sections negative margin', 'woodmart' ),
		'description' => esc_html__( 'Add a negative margin to each Elementor section to align the content with your website container.', 'woodmart' ),
		'type'        => 'buttons',
		'section'     => 'other_section',
		'options'     => array(
			'enabled'  => array(
				'name'  => esc_html__( 'Enabled', 'woodmart' ),
				'value' => 'enabled',
			),
			'disabled' => array(
				'name'  => esc_html__( 'Disabled', 'woodmart' ),
				'value' => 'disabled',
			),
		),
		'default'     => 'enabled',
		'priority'    => 10,
	)
);

Options::add_field(
	array(
		'id'       => 'sticky_notifications',
		'name'     => esc_html__( 'Sticky notifications (deprecated)', 'woodmart' ),
		'type'     => 'switcher',
		'section'  => 'other_section',
		'default'  => '0',
		'priority' => 20,
	)
);

Options::add_field(
	array(
		'id'          => 'woodmart_slider',
		'name'        => esc_html__( 'Enable custom slider', 'woodmart' ),
		'description' => esc_html__( 'If you enable this option, a new post type for sliders will be added to your Dashboard menu. You will be able to create sliders with page builder and place them on any page on your website.', 'woodmart' ),
		'type'        => 'switcher',
		'section'     => 'other_section',
		'default'     => '1',
		'priority'    => 30,
	)
);

Options::add_field(
	array(
		'id'          => 'allow_upload_svg',
		'name'        => esc_html__( 'Allow SVG upload', 'woodmart' ),
		'description' => wp_kses(
			__( 'Allow SVG uploads as well as SVG format for custom fonts. We suggest you to use <a href="https://wordpress.org/plugins/safe-svg/">this plugin</a> to be sure that all uploaded content is safe. If you will install this plugin, you can disable this option.', 'woodmart' ),
			array(
				'a'      => array(
					'href'   => true,
					'target' => true,
				),
				'br'     => array(),
				'strong' => array(),
			)
		),
		'type'        => 'switcher',
		'section'     => 'other_section',
		'default'     => '1',
		'priority'    => 40,
	)
);

Options::add_field(
	array(
		'id'       => 'rev_slider_inherit_theme_font',
		'name'     => esc_html__( 'Slider Revolution inherit theme font', 'woodmart' ),
		'type'     => 'switcher',
		'section'  => 'other_section',
		'default'  => '0',
		'priority' => 50,
	)
);

Options::add_field(
	array(
		'id'          => 'page_builder',
		'name'        => esc_html__( 'Page builder (deprecated)', 'woodmart' ),
		'description' => esc_html__( 'You need to select "Auto" value here. It will detect which one is currently installed. If both builders are installed, the WPBakery will be used.', 'woodmart' ),
		'type'        => 'buttons',
		'section'     => 'other_section',
		'options'     => array(
			'wpb'       => array(
				'name'  => esc_html__( 'WPB', 'woodmart' ),
				'value' => 'wpb',
			),
			'elementor' => array(
				'name'  => esc_html__( 'Elementor', 'woodmart' ),
				'value' => 'elementor',
			),
			'auto'      => array(
				'name'  => esc_html__( 'Auto', 'woodmart' ),
				'value' => 'auto',
			),
		),
		'default'     => 'auto',
		'priority'    => 60,
	)
);

Options::add_field(
	array(
		'id'          => 'demo_woodmart_select',
		'name'        => esc_html__( 'دموی خود را انتخاب نمایید', 'woodmart' ),
		'description' => esc_html__( 'توجه : برای آپدیت قالب خود ، اگر از ویژوال کامپوزر استفاده میکنید ، حتما دموی سفارشی خود را انتخاب کنید ، مثل دیجی کالا ، موتن رو و دموی کاستوم ، در غیر اینصورت اگر از ویژوال کاپوزر استفاده نمی کنید ، و یا دموی شما جزو دمو های سفارشی شده نیست ، حالت انتخابی را روی دموهای اصلی قرار بدهید ', 'woodmart' ),
		'type'        => 'select',
		'section'     => 'other_section',
		'default'     => 'main-demo',
		'options'     => array(
		    
		    
				'small-images' => array(
				'name'  => esc_html__( 'دموهای اصلی', 'woodmart' ),
				'value' => 'main-demo',
			),
			
			
				'base' => array(
				'name'  => esc_html__( 'دمو وودمارت پلاس', 'woodmart' ),
				'value' => 'base',
			),
		    
			'inherit'      => array(
				'name'  => esc_html__( 'دیجی کالا ', 'woodmart' ),
				'value' => 'digikala',
			),
			
			
		
			'default'      => array(
				'name'  => esc_html__( 'موتن رو', 'woodmart' ),
				'value' => 'mootanro',
			),
			'default-alt'  => array(
				'name'  => esc_html__( 'توسعه وردپرس', 'woodmart' ),
				'value' => 'custom',
			)
		
		),
		'priority'    => 70,
	)
);



Options::add_field(
	array(
		'id'          => 'pishnahad',
		'name'        => esc_html__( 'لینک اسلایدر پیشنهادات ویژه بیشتر', 'woodmart' ),
		
		'type'        => 'text_input',
		'section'     => 'other_section',
		'default'     => '#',
		'priority'    => 80,
	)
);


Options::add_field(
	array(
		'id'          => 'site_viewportt',
		'name'        => esc_html__( 'Viewport tag', 'woodmart' ),
		'description' => esc_html__( 'Default viewport tag:', 'woodmart' ) .  '<br><code>' . htmlspecialchars( '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">' ) . '</code>',
		'type'        => 'select',
		'section'     => 'other_section',
		'default'     => 'not_scalable',
		'options'     => array(
			'not_scalable' => array(
				'name'  => esc_html__( 'Not scalable', 'woodmart' ),
				'value' => 'not_scalable',
			),
			'scalable'   => array(
				'name'  => esc_html__( 'Scalable', 'woodmart' ),
				'value' => 'scalable',
			),
		),
		'priority'    => 90,
	)
);

