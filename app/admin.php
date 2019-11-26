<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
		]);


		$wp_customize->add_setting('upload_logo');

		$wp_customize->add_control(
				new \WP_Customize_Image_Control(
						$wp_customize,
						'upload_logo',
						array(
								'label' => 'Logo',
								'section' => 'title_tagline',
								'settings' => 'upload_logo',
								'transport' => 'postMessage'
						)
				)
		);


		$wp_customize->add_setting(
			'copyright',
			array(
			  'default' => '',
			  'sanitize_callback' => 'sanitize_text_field'
			)
		  );

		  $wp_customize->add_control(
			'copyright',
			array(
			  'label' => 'Copyright',
			  'section' => 'footer',
			  'settings' => 'copyright',
			  'transport' => 'postMessage'
			)
		  );

		  $wp_customize->add_section( 'footer' ,
			array(
				'title'      => __('Stopka','Sage'),
				'priority'   => 30,
			)
		);

		// Add By image
		$wp_customize->add_setting('footer_logo');

		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				'footer_logo',
				array(
					'label' => 'Wykonano przez Logo',
					'section' => 'footer',
					'settings' => 'footer_logo',
					'transport' => 'postMessage'
				)
			)
		);

		// name

		$wp_customize->add_setting(
			'name',
			array(
			  'default' => '',
			  'sanitize_callback' => 'sanitize_text_field'
			)
		  );

		  $wp_customize->add_control(
			'name',
			array(
			  'label' => 'Osoba do kontaktu',
			  'section' => 'contact',
			  'settings' => 'name',
			  'transport' => 'postMessage'
			)
		  );

		// email

		$wp_customize->add_setting(
			'email',
			array(
			  'default' => '',
			  'sanitize_callback' => 'sanitize_text_field'
			)
		  );

		  $wp_customize->add_control(
			'email',
			array(
			  'label' => 'Adres e-mail',
			  'section' => 'contact',
			  'settings' => 'email',
			  'transport' => 'postMessage'
			)
		  );

		//phone

		$wp_customize->add_setting(
			'phone',
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field'
			)
			);

			$wp_customize->add_control(
			'phone',
			array(
				'label' => 'Telefon',
				'section' => 'contact',
				'settings' => 'phone',
				'transport' => 'postMessage'
			)
		);

		//address

		$wp_customize->add_setting(
			'address1',
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field'
			)
			);

			$wp_customize->add_control(
			'address1',
			array(
				'label' => 'Adres 1',
				'section' => 'contact',
				'settings' => 'address1',
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_setting(
			'address2',
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field'
			)
			);

			$wp_customize->add_control(
			'address2',
			array(
				'label' => 'Adres 2',
				'section' => 'contact',
				'settings' => 'address2',
				'transport' => 'postMessage'
			)
		);

			$wp_customize->add_section( 'contact' ,
			array(
				'title'      => __('Kontakt','Sage'),
				'priority'   => 30,
			)
		);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

