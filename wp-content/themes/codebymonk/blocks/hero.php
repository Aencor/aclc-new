<?php
/**
 * Block: Hero
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'hero dark relative overflow-hidden bg-aclc-navy text-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker          = get_field('kicker') ?: 'Since 2001 · Letoli Ranch, Texas';
$headline        = get_field('headline') ?: 'TRANSFORM YOURSELF<br>and change the world.';
$lede            = get_field('lede') ?: 'Whole-person coaching — body, mind and spirit — built on the methodology of Alan C. Walter. With an assigned coach, until you live consistently in the Green Zone.';
$btn_text        = get_field('btn_text') ?: 'Register for more information';
$btn_url         = get_field('btn_url') ?: '#register';
$btn_note        = get_field('btn_note') ?: 'Free · no call required';
$video_label     = get_field('video_label') ?: 'Watch: what actually happens here';
$video_sublabel  = get_field('video_sublabel') ?: '90 seconds · with Ceil Stanford';
$video_url       = get_field('video_url') ?: '';
$poster_image    = get_field('poster_image');
$poster_url      = !empty($poster_image['url']) ? $poster_image['url'] : get_template_directory_uri() . '/assets/img/backgrounds/letoli-ranch-sunrise.jpg';

$sidebar_title   = get_field('sidebar_title') ?: 'Live programmes with dates';
$sidebar_btn_text = get_field('sidebar_btn_text') ?: 'See all programmes';
$sidebar_btn_url  = get_field('sidebar_btn_url') ?: '#programs';
$live_items      = get_field('sidebar_live_items') ?: [
	['title' => 'Redefine Your Self-Worth', 'dates' => 'July · September · November 2026'],
	['title' => 'Vital Fundamentals', 'dates' => '19–26 Sep · 5–12 Dec 2026'],
	['title' => 'Life Enhancement Course', 'dates' => '2–9 November 2026'],
];
$selfpaced_items = get_field('sidebar_selfpaced_items') ?: [
	['label' => 'Self-paced', 'title' => 'Building Your Inner Wealth · The Prosperity Course'],
];
?>

<section <?= $block_attrs; ?>>
	<canvas id="heroCanvas" class="absolute inset-0 w-full h-full pointer-events-none opacity-30"></canvas>
	
	<div class="wrap mx-auto max-w-[1160px] px-6 py-16 relative z-10">
		<div class="grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] gap-12 items-center">
			
			<!-- Columna Principal -->
			<div class="hero-main-content">
				<?php if ($kicker): ?>
					<div class="kicker inline-flex items-center gap-2 font-mono text-xs uppercase tracking-widest text-aclc-gold mb-4">
						<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-pin"/></svg>
						<?= esc_html($kicker); ?>
					</div>
				<?php endif; ?>

				<?php if ($headline): ?>
					<h1 class="font-display font-semibold text-4xl sm:text-5xl lg:text-[52px] leading-[1.12] tracking-tight text-white mb-6">
						<?= wp_kses_post($headline); ?>
					</h1>
				<?php endif; ?>

				<?php if ($lede): ?>
					<p class="lede text-lg sm:text-[19px] leading-relaxed text-white/75 max-w-[46ch] mb-8 font-body">
						<?= esc_html($lede); ?>
					</p>
				<?php endif; ?>

				<div class="flex flex-wrap items-center gap-4 mb-8">
					<?php if ($btn_text && $btn_url): ?>
						<a href="<?= esc_url($btn_url); ?>" class="btn btn-primary inline-flex items-center gap-2 px-6 py-3 bg-aclc-fuego text-white rounded-lg font-semibold hover:opacity-95 transition-transform hover:-translate-y-0.5 shadow-md">
							<?= esc_html($btn_text); ?>
							<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><use href="#i-arrow"/></svg>
						</a>
					<?php endif; ?>
					<?php if ($btn_note): ?>
						<span class="font-mono text-xs text-white/60 tracking-wider"><?= esc_html($btn_note); ?></span>
					<?php endif; ?>
				</div>

				<!-- Play Film Row -->
				<div class="playrow flex items-center gap-4 pt-4 border-t border-white/10">
					<button type="button" id="playFilm" class="playbtn w-12 h-12 rounded-full border border-aclc-gold text-aclc-gold flex items-center justify-center hover:bg-aclc-gold hover:text-aclc-kn transition-colors" aria-label="Play film">
						<svg class="w-6 h-6 ml-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-play"/></svg>
					</button>
					<div>
						<div class="font-semibold text-[14.5px] text-white"><?= esc_html($video_label); ?></div>
						<div class="font-mono text-xs text-white/55 flex items-center gap-1.5 mt-1">
							<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-clock"/></svg>
							<?= esc_html($video_sublabel); ?>
						</div>
					</div>
				</div>
			</div>

			<!-- Columna Lateral: Tarjeta Programas -->
			<div>
				<div class="card bg-[#193150] border border-[#2B4A70] rounded-xl p-6 text-white shadow-xl">
					<div class="font-mono text-xs text-aclc-gold flex items-center gap-2 uppercase tracking-wider mb-4">
						<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-calendar"/></svg>
						<?= esc_html($sidebar_title); ?>
					</div>

					<div class="divide-y divide-[#24405F]">
						<?php if (!empty($live_items)): foreach ($live_items as $item): ?>
							<div class="py-3">
								<div class="font-semibold text-white"><?= esc_html($item['title'] ?? ''); ?></div>
								<div class="font-mono text-xs text-[#8FA5BB] mt-1"><?= esc_html($item['dates'] ?? ''); ?></div>
							</div>
						<?php endforeach; endif; ?>

						<?php if (!empty($selfpaced_items)): foreach ($selfpaced_items as $sp): ?>
							<div class="pt-3">
								<div class="font-mono text-xs text-[#8FA5BB]"><?= esc_html($sp['label'] ?? ''); ?></div>
								<div class="text-xs text-[#DCE7F1] mt-1"><?= esc_html($sp['title'] ?? ''); ?></div>
							</div>
						<?php endforeach; endif; ?>
					</div>

					<?php if ($sidebar_btn_text && $sidebar_btn_url): ?>
						<a href="<?= esc_url($sidebar_btn_url); ?>" class="btn btn-onDark w-full mt-5 py-2.5 px-4 text-center text-sm font-semibold border border-white/35 rounded-lg text-white hover:bg-white/10 transition-colors block">
							<?= esc_html($sidebar_btn_text); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>

	<!-- Modal Video Film -->
	<div id="filmModal" class="fixed inset-0 z-50 bg-black/85 flex items-center justify-center p-4 backdrop-blur-sm" hidden>
		<div class="relative bg-aclc-kn border border-white/20 rounded-xl p-6 max-w-2xl w-full text-white shadow-2xl">
			<button id="closeFilm" class="absolute top-4 right-4 text-white/70 hover:text-white text-xl font-bold" aria-label="Close modal">&times;</button>
			<h3 class="font-display text-xl mb-4 text-aclc-gold"><?= esc_html($video_label); ?></h3>
			<div class="aspect-video bg-black/50 rounded-lg overflow-hidden flex items-center justify-center relative">
				<img src="<?= esc_url($poster_url); ?>" alt="Video Poster" class="w-full h-full object-cover">
				<div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center p-6 text-center">
					<p class="font-mono text-sm text-white/90 mb-2">Narrated 90-second film with Ceil Stanford</p>
					<span class="inline-block px-3 py-1 bg-aclc-fuego text-xs rounded text-white font-semibold">Video Player Ready</span>
				</div>
			</div>
		</div>
	</div>
</section>
