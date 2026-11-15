<?php
/**
 * Block: Coaches Showcase
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker    = get_field('kicker') ?: 'THE TEAM';
$headline  = get_field('headline') ?: 'Who you will be working with';
$view_text = get_field('view_all_text') ?: 'Meet all coaches →';
$view_url  = get_field('view_all_url') ?: home_url('/coaches/');

$selected_coaches = get_field('coaches_selection');
if (empty($selected_coaches)) {
	$coaches_query = new WP_Query([
		'post_type'      => 'coach',
		'posts_per_page' => 3,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	]);
	$coaches = $coaches_query->posts;
} else {
	$coaches = $selected_coaches;
}
?>

<section <?= $block_attrs; ?>>
	<div class="wrap">
		<?php if ($kicker): ?>
			<div class="tiny" style="color:var(--fuego)"><?= esc_html($kicker); ?></div>
		<?php endif; ?>

		<div class="split" style="align-items:end;margin-top:6px">
			<h2><?= esc_html($headline); ?></h2>
			<?php if ($view_text && $view_url): ?>
				<a class="sm" href="<?= esc_url($view_url); ?>" style="font-weight:600"><?= esc_html($view_text); ?></a>
			<?php endif; ?>
		</div>

		<div class="g3 mt24">
			<?php if (!empty($coaches)): foreach ($coaches as $coach): 
				$cid   = is_object($coach) ? $coach->ID : $coach;
				$cname = get_the_title($cid);
				$role  = get_field('role_title', $cid);
				$bio   = get_field('bio_lead', $cid);
				$photo = get_field('photo', $cid);
				$purl  = !empty($photo['url']) ? $photo['url'] : '';
			?>
				<div class="card">
					<?php if ($purl): ?>
						<img src="<?= esc_url($purl); ?>" alt="<?= esc_attr($cname); ?>" class="coachpic sm mb16" style="object-fit:cover" />
					<?php else: ?>
						<div class="coachpic sm mb16">
							<svg class="ic" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-users"/></svg>
						</div>
					<?php endif; ?>

					<h4><?= esc_html($cname); ?></h4>
					<?php if ($role): ?>
						<div class="tiny mt8" style="color:var(--fuego)"><?= esc_html(strtoupper($role)); ?></div>
					<?php endif; ?>
					<?php if ($bio): ?>
						<p class="sm mt8"><?= esc_html($bio); ?></p>
					<?php endif; ?>
				</div>
			<?php endforeach; else: ?>
				<div class="card">
					<div class="coachpic sm mb16"><svg class="ic" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-users"/></svg></div>
					<h4>Ceil Stanford</h4><div class="tiny mt8" style="color:var(--fuego)">PRESIDENT</div>
					<p class="sm mt8">Leadership and mindset coach to elite entrepreneurs, business owners, executives and spiritual seekers.</p>
				</div>
				<div class="card">
					<div class="coachpic sm mb16"><svg class="ic" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-users"/></svg></div>
					<h4>Jeff Crippen</h4><div class="tiny mt8" style="color:var(--fuego)">CEO &amp; DIRECTOR OF COACHING</div>
					<p class="sm mt8">International speaker, Chiropractor, and author of Timeless You. Pioneer in human potential.</p>
				</div>
				<div class="card">
					<div class="coachpic sm mb16"><svg class="ic" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-users"/></svg></div>
					<h4>Raul Rivera</h4><div class="tiny mt8" style="color:var(--fuego)">MASTER COACH &amp; SPEAKER</div>
					<p class="sm mt8">Coaching leaders worldwide in English and Spanish. Specialist in family business transformations.</p>
				</div>
			<?php endif; ?>
		</div>

		<?php 
		$show_spanish_section = get_field('show_spanish_section');
		if ($show_spanish_section === null || $show_spanish_section === true || is_page('coaches')): 
			$es_title = get_field('spanish_section_title') ?: 'Coaching in Spanish';
			$es_desc  = get_field('spanish_section_desc') ?: 'Raul Rivera leads the Spanish-speaking market. You can request your information and any follow-up in Spanish.';
			$es_btn   = get_field('spanish_section_btn') ?: 'Register for information';
			$es_url   = get_field('spanish_section_url') ?: home_url('/register/');
		?>
			<div class="card tint pad-lg split mt32" style="align-items:center">
				<div class="hgroup" style="gap:16px;align-items:flex-start">
					<div class="iconbox">
						<svg class="ic" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-globe"/></svg>
					</div>
					<div>
						<h3><?= esc_html($es_title); ?></h3>
						<p class="sm mt8"><?= esc_html($es_desc); ?></p>
					</div>
				</div>
				<a class="btn btn-primary" href="<?= esc_url($es_url); ?>"><?= esc_html($es_btn); ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>
