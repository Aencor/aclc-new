<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo("charset"); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?= esc_url(get_template_directory_uri()); ?>/assets/img/logos/logo.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- SVG Icon Sprite -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
<defs>
<g id="i-calendar"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></g>
<g id="i-users"><circle cx="9" cy="8" r="3.2"/><path d="M3.5 20c0-3.1 2.5-5.2 5.5-5.2s5.5 2.1 5.5 5.2"/><path d="M16.5 6.4a3 3 0 0 1 0 5.9M17.5 14.4c2 .6 3.5 2.4 3.5 4.6"/></g>
<g id="i-book"><path d="M5 4.5A1.5 1.5 0 0 1 6.5 3H19v15H6.5A1.5 1.5 0 0 0 5 19.5z"/><path d="M5 19.5A1.5 1.5 0 0 1 6.5 18H19v3H6.5A1.5 1.5 0 0 1 5 19.5z"/></g>
<g id="i-target"><circle cx="12" cy="12" r="8.2"/><circle cx="12" cy="12" r="4.4"/><circle cx="12" cy="12" r="1"/></g>
<g id="i-compass"><circle cx="12" cy="12" r="8.5"/><path d="M15.6 8.4l-2 5.2-5.2 2 2-5.2z"/></g>
<g id="i-mail"><rect x="3" y="5.5" width="18" height="13" rx="2"/><path d="M3.6 7l8.4 6 8.4-6"/></g>
<g id="i-phone"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 4.5 5.7a2 2 0 0 1 2-2.2z"/></g>
<g id="i-pin"><path d="M12 21c4-4.6 6-7.8 6-10.4A6 6 0 0 0 6 10.6C6 13.2 8 16.4 12 21z"/><circle cx="12" cy="10.4" r="2.3"/></g>
<g id="i-play"><circle cx="12" cy="12" r="8.5"/><path d="M10.2 8.6l5.4 3.4-5.4 3.4z"/></g>
<g id="i-check"><path d="M4.5 12.6l4.6 4.6L19.5 6.8"/></g>
<g id="i-spark"><path d="M12 3.2l2.1 5.1 5.1 2.1-5.1 2.1-2.1 5.1-2.1-5.1-5.1-2.1 5.1-2.1z"/><path d="M18.5 16.5l.8 2 2 .8-2 .8-.8 2-.8-2-2-.8 2-.8z"/></g>
<g id="i-chart"><path d="M4 20V4"/><path d="M4 20h16"/><path d="M8 16.5v-4M12.5 16.5V8M17 16.5v-6.5"/></g>
<g id="i-globe"><circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17"/><path d="M12 3.5c2.4 2.6 3.6 5.4 3.6 8.5S14.4 18.4 12 20.5c-2.4-2.1-3.6-5.4-3.6-8.5S9.6 6.1 12 3.5z"/></g>
<g id="i-shield"><path d="M12 3.2l7 2.6v5.4c0 4.2-2.8 7.6-7 9.6-4.2-2-7-5.4-7-9.6V5.8z"/></g>
<g id="i-clock"><circle cx="12" cy="12" r="8.5"/><path d="M12 7.2V12l3.2 2"/></g>
<g id="i-arrow"><path d="M4.5 12h14"/><path d="M13.2 6.4L18.8 12l-5.6 5.6"/></g>
<g id="i-fb"><path d="M14.6 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5H18V3.6c-.3-.04-1.3-.13-2.45-.13-2.4 0-4.05 1.47-4.05 4.17V9.9H8.8V13h2.7v8z"/></g>
<g id="i-ig"><rect x="3.6" y="3.6" width="16.8" height="16.8" rx="4.6"/><circle cx="12" cy="12" r="4.1"/><circle cx="16.9" cy="7.1" r="1.05"/></g>
<g id="i-in"><rect x="3.6" y="3.6" width="16.8" height="16.8" rx="2.4"/><path d="M8 10.4V17"/><circle cx="8" cy="7.3" r="1.15"/><path d="M12 17v-3.7a2.5 2.5 0 0 1 5 0V17"/><path d="M12 10.4V17"/></g>
<g id="i-yt"><rect x="2.8" y="5.6" width="18.4" height="12.8" rx="3.6"/><path d="M10.4 9.6l5.2 2.4-5.2 2.4z"/></g>
</defs>
</svg>

<header class="site">
	<div class="wrap bar">
		<a href="<?= esc_url(home_url('/')); ?>" class="hgroup">
			<img class="logo" alt="Advanced Coaching & Leadership Center" src="<?= esc_url(get_template_directory_uri()); ?>/assets/img/logos/logo.png">
		</a>

		<nav class="main">
			<a href="<?= esc_url(home_url('/programs/')); ?>" class="<?= is_page('programs') ? 'on' : ''; ?>">Programs</a>
			<a href="<?= esc_url(home_url('/calendar/')); ?>" class="<?= is_page('calendar') ? 'on' : ''; ?>">Upcoming courses</a>
			<a href="<?= esc_url(home_url('/coaching/')); ?>" class="<?= is_page('coaching') ? 'on' : ''; ?>">1-on-1 Coaching</a>
			<a href="<?= esc_url(home_url('/clients/')); ?>" class="<?= is_page('clients') ? 'on' : ''; ?>">Clients</a>
			<a href="<?= esc_url(home_url('/coaches/')); ?>" class="<?= is_page('coaches') ? 'on' : ''; ?>">Coaches</a>
			<a href="<?= esc_url(home_url('/reading/')); ?>" class="<?= is_page('reading') ? 'on' : ''; ?>">Reading</a>
		</nav>

		<div class="hgroup">
			<div class="langsw">
				<?php 
				$current_lang = defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'en';
				?>
				<button type="button" class="<?= $current_lang === 'en' ? 'on' : ''; ?>" data-lang="en">EN</button>
				<button type="button" class="<?= $current_lang === 'es' ? 'on' : ''; ?>" data-lang="es">ES</button>
			</div>

			<a class="btn btn-primary btn-sm" href="<?= esc_url(home_url('/register/')); ?>">
				Register for information
			</a>

			<button class="burger" id="burgerToggle" aria-label="Menu">
				<i></i><i></i><i></i>
			</button>
		</div>
	</div>
</header>
<main id="main-content">
