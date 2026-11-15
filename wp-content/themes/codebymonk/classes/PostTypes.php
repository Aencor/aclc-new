<?php
namespace Monk;

/**
 * Class PostTypes
 *
 * Registra y gestiona los Custom Post Types del sitio ACLC (Reglas 5 y 6: POO, SOLID, DRY).
 */
class PostTypes {
	public static function init(): void {
		add_action('init', [self::class, 'registerPostTypes']);
	}

	public static function registerPostTypes(): void {
		// 1. Programas (Programmes)
		register_post_type('program', [
			'labels' => [
				'name'               => __('Programmes', 'codebymonk'),
				'singular_name'      => __('Programme', 'codebymonk'),
				'add_new'            => __('Add New Programme', 'codebymonk'),
				'add_new_item'       => __('Add New Programme', 'codebymonk'),
				'edit_item'          => __('Edit Programme', 'codebymonk'),
				'new_item'           => __('New Programme', 'codebymonk'),
				'view_item'          => __('View Programme', 'codebymonk'),
				'search_items'       => __('Search Programmes', 'codebymonk'),
				'not_found'          => __('No programmes found', 'codebymonk'),
				'not_found_in_trash' => __('No programmes found in Trash', 'codebymonk'),
				'menu_name'          => __('Programmes', 'codebymonk'),
			],
			'public'             => true,
			'has_archive'        => false,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-awards',
			'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
			'rewrite'            => ['slug' => 'programmes', 'with_front' => false],
		]);

		// 2. Eventos / Calendario (Course Events)
		register_post_type('aclc_event', [
			'labels' => [
				'name'               => __('Course Events', 'codebymonk'),
				'singular_name'      => __('Course Event', 'codebymonk'),
				'add_new'            => __('Add New Event', 'codebymonk'),
				'add_new_item'       => __('Add New Course Event', 'codebymonk'),
				'edit_item'          => __('Edit Course Event', 'codebymonk'),
				'new_item'           => __('New Course Event', 'codebymonk'),
				'view_item'          => __('View Course Event', 'codebymonk'),
				'search_items'       => __('Search Events', 'codebymonk'),
				'not_found'          => __('No events found', 'codebymonk'),
				'menu_name'          => __('Calendar Events', 'codebymonk'),
			],
			'public'             => true,
			'has_archive'        => false,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-calendar-alt',
			'supports'           => ['title', 'revisions'],
			'rewrite'            => ['slug' => 'calendar-events', 'with_front' => false],
		]);

		// 3. Coaches / Equipo
		register_post_type('coach', [
			'labels' => [
				'name'               => __('Coaches', 'codebymonk'),
				'singular_name'      => __('Coach', 'codebymonk'),
				'add_new'            => __('Add New Coach', 'codebymonk'),
				'add_new_item'       => __('Add New Coach', 'codebymonk'),
				'edit_item'          => __('Edit Coach', 'codebymonk'),
				'new_item'           => __('New Coach', 'codebymonk'),
				'view_item'          => __('View Coach', 'codebymonk'),
				'search_items'       => __('Search Coaches', 'codebymonk'),
				'not_found'          => __('No coaches found', 'codebymonk'),
				'menu_name'          => __('Coaches', 'codebymonk'),
			],
			'public'             => true,
			'has_archive'        => false,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-businessperson',
			'supports'           => ['title', 'thumbnail', 'revisions'],
			'rewrite'            => ['slug' => 'coaches-team', 'with_front' => false],
		]);

		// 4. Testimonios / Casos de Éxito
		register_post_type('testimonial', [
			'labels' => [
				'name'               => __('Testimonials', 'codebymonk'),
				'singular_name'      => __('Testimonial', 'codebymonk'),
				'add_new'            => __('Add New Testimonial', 'codebymonk'),
				'add_new_item'       => __('Add New Testimonial', 'codebymonk'),
				'edit_item'          => __('Edit Testimonial', 'codebymonk'),
				'new_item'           => __('New Testimonial', 'codebymonk'),
				'view_item'          => __('View Testimonial', 'codebymonk'),
				'search_items'       => __('Search Testimonials', 'codebymonk'),
				'not_found'          => __('No testimonials found', 'codebymonk'),
				'menu_name'          => __('Testimonials', 'codebymonk'),
			],
			'public'             => true,
			'has_archive'        => false,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-testimonial',
			'supports'           => ['title', 'editor', 'thumbnail', 'revisions'],
			'rewrite'            => ['slug' => 'client-stories', 'with_front' => false],
		]);

		// 5. Libros / Lecturas Recomendadas
		register_post_type('book', [
			'labels' => [
				'name'               => __('Books', 'codebymonk'),
				'singular_name'      => __('Book', 'codebymonk'),
				'add_new'            => __('Add New Book', 'codebymonk'),
				'add_new_item'       => __('Add New Book', 'codebymonk'),
				'edit_item'          => __('Edit Book', 'codebymonk'),
				'new_item'           => __('New Book', 'codebymonk'),
				'view_item'          => __('View Book', 'codebymonk'),
				'search_items'       => __('Search Books', 'codebymonk'),
				'not_found'          => __('No books found', 'codebymonk'),
				'menu_name'          => __('Books & Reading', 'codebymonk'),
			],
			'public'             => true,
			'has_archive'        => false,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-book-alt',
			'supports'           => ['title', 'editor', 'thumbnail', 'revisions'],
			'rewrite'            => ['slug' => 'recommended-reading', 'with_front' => false],
		]);
	}
}
