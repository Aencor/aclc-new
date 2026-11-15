<?php
namespace Monk;

/**
 * Class Taxonomies
 *
 * Registra y gestiona las taxonomías del sitio ACLC (Reglas 5 y 6: POO, SOLID, DRY).
 */
class Taxonomies {
	public static function init(): void {
		add_action('init', [self::class, 'registerTaxonomies']);
	}

	public static function registerTaxonomies(): void {
		// 1. Formato de Programa (Online, Presencial, Self-Paced)
		register_taxonomy('program_format', ['program', 'aclc_event'], [
			'labels' => [
				'name'          => __('Formats', 'codebymonk'),
				'singular_name' => __('Format', 'codebymonk'),
				'search_items'  => __('Search Formats', 'codebymonk'),
				'all_items'     => __('All Formats', 'codebymonk'),
				'edit_item'     => __('Edit Format', 'codebymonk'),
				'update_item'   => __('Update Format', 'codebymonk'),
				'add_new_item'  => __('Add New Format', 'codebymonk'),
				'new_item_name' => __('New Format Name', 'codebymonk'),
				'menu_name'     => __('Formats', 'codebymonk'),
			],
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => ['slug' => 'format'],
		]);

		// 2. Zona de Vida (Red, Amber, Green)
		register_taxonomy('program_zone', ['program', 'book'], [
			'labels' => [
				'name'          => __('Zones', 'codebymonk'),
				'singular_name' => __('Zone', 'codebymonk'),
				'search_items'  => __('Search Zones', 'codebymonk'),
				'all_items'     => __('All Zones', 'codebymonk'),
				'edit_item'     => __('Edit Zone', 'codebymonk'),
				'update_item'   => __('Update Zone', 'codebymonk'),
				'add_new_item'  => __('Add New Zone', 'codebymonk'),
				'new_item_name' => __('New Zone Name', 'codebymonk'),
				'menu_name'     => __('Zones of Life', 'codebymonk'),
			],
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => ['slug' => 'zone'],
		]);

		// 3. Idioma de Coach (English, Spanish)
		register_taxonomy('coach_language', ['coach'], [
			'labels' => [
				'name'          => __('Languages', 'codebymonk'),
				'singular_name' => __('Language', 'codebymonk'),
				'search_items'  => __('Search Languages', 'codebymonk'),
				'all_items'     => __('All Languages', 'codebymonk'),
				'edit_item'     => __('Edit Language', 'codebymonk'),
				'add_new_item'  => __('Add New Language', 'codebymonk'),
				'menu_name'     => __('Languages', 'codebymonk'),
			],
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
		]);
	}
}
