<?php

if ( ! function_exists( 'dessau_select_get_hide_dep_for_header_vertical_menu_options' ) ) {
	function dessau_select_get_hide_dep_for_header_vertical_menu_options() {
		$hide_dep_options = apply_filters( 'dessau_select_header_vertical_menu_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'dessau_select_header_vertical_navigation_options_map' ) ) {
	function dessau_select_header_vertical_navigation_options_map() {
		$hide_dep_options = dessau_select_get_hide_dep_for_header_vertical_menu_options();
		
		$panel_vertical_main_menu = dessau_select_add_admin_panel(
			array(
				'title'           => esc_html__( 'Vertical Main Menu', 'dessau' ),
				'name'            => 'panel_vertical_main_menu',
				'page'            => '_header_page',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);

		$drop_down_group = dessau_select_add_admin_group(
			array(
				'parent'      => $panel_vertical_main_menu,
				'name'        => 'vertical_drop_down_group',
				'title'       => esc_html__( 'Main Dropdown Menu', 'dessau' ),
				'description' => esc_html__( 'Set a style for dropdown menu', 'dessau' )
			)
		);
		
		$vertical_drop_down_row1 = dessau_select_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name'   => 'qodef_drop_down_row1',
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_top_margin',
				'default_value' => '',
				'label'         => esc_html__( 'Top Margin', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $vertical_drop_down_row1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_bottom_margin',
				'default_value' => '',
				'label'         => esc_html__( 'Bottom Margin', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $vertical_drop_down_row1
			)
		);

		dessau_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'vertical_menu_dropdown_opening',
				'default_value' => 'below',
				'label'         => esc_html__( 'Submenu Opening', 'dessau' ),
				'options'		=> array(
					'below' => esc_html__('Below', 'dessau'),
					'side' => esc_html__('On Side', 'dessau'),
				),
				'parent'        => $panel_vertical_main_menu
			)
		);

		$group_vertical_first_level = dessau_select_add_admin_group(
			array(
				'name'        => 'group_vertical_first_level',
				'title'       => esc_html__( '1st level', 'dessau' ),
				'description' => esc_html__( 'Define styles for 1st level menu', 'dessau' ),
				'parent'      => $panel_vertical_main_menu
			)
		);
		
		$row_vertical_first_level_1 = dessau_select_add_admin_row(
			array(
				'name'   => 'row_vertical_first_level_1',
				'parent' => $group_vertical_first_level
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'vertical_menu_1st_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'dessau' ),
				'parent'        => $row_vertical_first_level_1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'vertical_menu_1st_hover_color',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'dessau' ),
				'parent'        => $row_vertical_first_level_1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_1st_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $row_vertical_first_level_1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_1st_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $row_vertical_first_level_1
			)
		);
		
		$row_vertical_first_level_2 = dessau_select_add_admin_row(
			array(
				'name'   => 'row_vertical_first_level_2',
				'parent' => $group_vertical_first_level,
				'next'   => true
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'vertical_menu_1st_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'dessau' ),
				'options'       => dessau_select_get_text_transform_array(),
				'parent'        => $row_vertical_first_level_2
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'fontsimple',
				'name'          => 'vertical_menu_1st_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'dessau' ),
				'parent'        => $row_vertical_first_level_2
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'vertical_menu_1st_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'dessau' ),
				'options'       => dessau_select_get_font_style_array(),
				'parent'        => $row_vertical_first_level_2
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'vertical_menu_1st_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'dessau' ),
				'options'       => dessau_select_get_font_weight_array(),
				'parent'        => $row_vertical_first_level_2
			)
		);
		
		$row_vertical_first_level_3 = dessau_select_add_admin_row(
			array(
				'name'   => 'row_vertical_first_level_3',
				'parent' => $group_vertical_first_level,
				'next'   => true
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_1st_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $row_vertical_first_level_3
			)
		);
		
		$group_vertical_second_level = dessau_select_add_admin_group(
			array(
				'name'        => 'group_vertical_second_level',
				'title'       => esc_html__( '2nd level', 'dessau' ),
				'description' => esc_html__( 'Define styles for 2nd level menu', 'dessau' ),
				'parent'      => $panel_vertical_main_menu
			)
		);
		
		$row_vertical_second_level_1 = dessau_select_add_admin_row(
			array(
				'name'   => 'row_vertical_second_level_1',
				'parent' => $group_vertical_second_level
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'vertical_menu_2nd_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'dessau' ),
				'parent'        => $row_vertical_second_level_1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'vertical_menu_2nd_hover_color',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'dessau' ),
				'parent'        => $row_vertical_second_level_1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_2nd_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $row_vertical_second_level_1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_2nd_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $row_vertical_second_level_1
			)
		);
		
		$row_vertical_second_level_2 = dessau_select_add_admin_row(
			array(
				'name'   => 'row_vertical_second_level_2',
				'parent' => $group_vertical_second_level,
				'next'   => true
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'vertical_menu_2nd_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'dessau' ),
				'options'       => dessau_select_get_text_transform_array(),
				'parent'        => $row_vertical_second_level_2
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'fontsimple',
				'name'          => 'vertical_menu_2nd_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'dessau' ),
				'parent'        => $row_vertical_second_level_2
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'vertical_menu_2nd_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'dessau' ),
				'options'       => dessau_select_get_font_style_array(),
				'parent'        => $row_vertical_second_level_2
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'vertical_menu_2nd_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'dessau' ),
				'options'       => dessau_select_get_font_weight_array(),
				'parent'        => $row_vertical_second_level_2
			)
		);
		
		$row_vertical_second_level_3 = dessau_select_add_admin_row(
			array(
				'name'   => 'row_vertical_second_level_3',
				'parent' => $group_vertical_second_level,
				'next'   => true
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_2nd_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $row_vertical_second_level_3
			)
		);
		
		$group_vertical_third_level = dessau_select_add_admin_group(
			array(
				'name'        => 'group_vertical_third_level',
				'title'       => esc_html__( '3rd level', 'dessau' ),
				'description' => esc_html__( 'Define styles for 3rd level menu', 'dessau' ),
				'parent'      => $panel_vertical_main_menu
			)
		);
		
		$row_vertical_third_level_1 = dessau_select_add_admin_row(
			array(
				'name'   => 'row_vertical_third_level_1',
				'parent' => $group_vertical_third_level
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'vertical_menu_3rd_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'dessau' ),
				'parent'        => $row_vertical_third_level_1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'vertical_menu_3rd_hover_color',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'dessau' ),
				'parent'        => $row_vertical_third_level_1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_3rd_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $row_vertical_third_level_1
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_3rd_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $row_vertical_third_level_1
			)
		);
		
		$row_vertical_third_level_2 = dessau_select_add_admin_row(
			array(
				'name'   => 'row_vertical_third_level_2',
				'parent' => $group_vertical_third_level,
				'next'   => true
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'vertical_menu_3rd_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'dessau' ),
				'options'       => dessau_select_get_text_transform_array(),
				'parent'        => $row_vertical_third_level_2
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'fontsimple',
				'name'          => 'vertical_menu_3rd_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'dessau' ),
				'parent'        => $row_vertical_third_level_2
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'vertical_menu_3rd_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'dessau' ),
				'options'       => dessau_select_get_font_style_array(),
				'parent'        => $row_vertical_third_level_2
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'vertical_menu_3rd_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'dessau' ),
				'options'       => dessau_select_get_font_weight_array(),
				'parent'        => $row_vertical_third_level_2
			)
		);
		
		$row_vertical_third_level_3 = dessau_select_add_admin_row(
			array(
				'name'   => 'row_vertical_third_level_3',
				'parent' => $group_vertical_third_level,
				'next'   => true
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'vertical_menu_3rd_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'dessau' ),
				'args'          => array(
					'suffix' => 'px'
				),
				'parent'        => $row_vertical_third_level_3
			)
		);
	}
	
	add_action( 'dessau_select_additional_header_main_navigation_options_map', 'dessau_select_header_vertical_navigation_options_map', 10, 1 );
}