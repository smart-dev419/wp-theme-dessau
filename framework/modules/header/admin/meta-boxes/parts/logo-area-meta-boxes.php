<?php

if ( ! function_exists( 'dessau_select_get_hide_dep_for_header_logo_area_meta_boxes' ) ) {
	function dessau_select_get_hide_dep_for_header_logo_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'dessau_select_header_logo_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'dessau_select_get_hide_dep_for_header_logo_area_widgets_meta_boxes' ) ) {
	function dessau_select_get_hide_dep_for_header_logo_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'dessau_select_header_logo_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'dessau_select_header_logo_area_meta_options_map' ) ) {
	function dessau_select_header_logo_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = dessau_select_get_hide_dep_for_header_logo_area_meta_boxes();
		$hide_dep_widgets = dessau_select_get_hide_dep_for_header_logo_area_widgets_meta_boxes();
		
		$logo_area_container = dessau_select_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_container',
				'parent'          => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		dessau_select_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_area_style',
				'title'  => esc_html__( 'Logo Area Style', 'dessau' )
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_header_widget_logo_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Logo Area Widget', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the logo area', 'dessau' ),
				'parent'        => $logo_area_container,
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$dessau_custom_sidebars = dessau_select_get_custom_sidebars();
		if ( count( $dessau_custom_sidebars ) > 0 ) {
			dessau_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_logo_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area for Logo Area', 'dessau' ),
					'description' => esc_html__( 'Choose custom widget area to display in header logo area"', 'dessau' ),
					'parent'      => $logo_area_container,
					'options'     => $dessau_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'qodef_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_logo_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area In Grid', 'dessau' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'dessau' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => dessau_select_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_container = dessau_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'qodef_logo_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'dessau' ),
				'description' => esc_html__( 'Set grid background color for logo area', 'dessau' ),
				'parent'      => $logo_area_in_grid_container
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'dessau' ),
				'description' => esc_html__( 'Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'dessau' ),
				'parent'      => $logo_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_logo_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'dessau' ),
				'description'   => esc_html__( 'Set border on grid logo area', 'dessau' ),
				'parent'        => $logo_area_in_grid_container,
				'default_value' => '',
				'options'       => dessau_select_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_border_container = dessau_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_border_container',
				'parent'          => $logo_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'qodef_logo_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'dessau' ),
				'description' => esc_html__( 'Set border color for grid area', 'dessau' ),
				'parent'      => $logo_area_in_grid_border_container
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'dessau' ),
				'description' => esc_html__( 'Choose a background color for logo area', 'dessau' ),
				'parent'      => $logo_area_container
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'dessau' ),
				'description' => esc_html__( 'Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'dessau' ),
				'parent'      => $logo_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_logo_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area Border', 'dessau' ),
				'description'   => esc_html__( 'Set border on logo area', 'dessau' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => dessau_select_get_yes_no_select_array()
			)
		);
		
		$logo_area_border_bottom_color_container = dessau_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_border_bottom_color_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'qodef_logo_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'dessau' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'dessau' ),
				'parent'      => $logo_area_border_bottom_color_container
			)
		);
		
		do_action( 'dessau_select_header_logo_area_additional_meta_boxes_map', $logo_area_container );
	}
	
	add_action( 'dessau_select_header_logo_area_meta_boxes_map', 'dessau_select_header_logo_area_meta_options_map', 10, 1 );
}