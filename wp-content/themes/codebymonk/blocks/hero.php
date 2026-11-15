<?php
/**
 * Block: Hero
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'vhero');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker           = get_field('kicker') ?: 'Since 2001 · Letoli Ranch, Texas';
$headline         = get_field('headline') ?: 'TRANSFORM YOURSELF<br>and change the world.';
$lede             = get_field('lede') ?: 'Whole-person coaching — body, mind and spirit — built on the methodology of Alan C. Walter. With an assigned coach, until you live consistently in the Green Zone.';
$btn_text         = get_field('btn_text') ?: 'Register for more information';
$btn_url          = get_field('btn_url') ?: '#register';
$btn_note         = get_field('btn_note') ?: 'Free · no call required';
$video_label      = get_field('video_label') ?: 'Watch: what actually happens here';
$video_sublabel   = get_field('video_sublabel') ?: '90 seconds · with Ceil Stanford';
$video_url        = get_field('video_url') ?: '';
$poster_image     = get_field('poster_image');
$poster_url       = !empty($poster_image['url']) ? $poster_image['url'] : get_template_directory_uri() . '/assets/img/backgrounds/letoli-ranch-sunrise.jpg';

$sidebar_title    = get_field('sidebar_title') ?: 'Live programmes with dates';
$sidebar_btn_text = get_field('sidebar_btn_text') ?: 'See all programmes';
$sidebar_btn_url  = get_field('sidebar_btn_url') ?: '#programs';
$live_items       = get_field('sidebar_live_items') ?: [
	['title' => 'Redefine Your Self-Worth', 'dates' => 'July · September · November 2026'],
	['title' => 'Vital Fundamentals', 'dates' => '19–26 Sep · 5–12 Dec 2026'],
	['title' => 'Life Enhancement Course', 'dates' => '2–9 November 2026'],
];
$selfpaced_items  = get_field('sidebar_selfpaced_items') ?: [
	['label' => 'Self-paced', 'title' => 'Building Your Inner Wealth · The Prosperity Course'],
];
?>

<section <?= $block_attrs; ?>>
	<div class="vbg">
		<img class="vphoto" alt="Letoli Ranch at sunrise" src="<?= esc_url($poster_url); ?>">
		<canvas id="heroCanvas"></canvas>
		<div class="vscrim"></div>
	</div>

	<div class="wrap vinner">
		<div class="split top">
			<div>
				<?php if ($kicker): ?>
					<div class="kicker" style="color:var(--gold)">
						<svg class="ic" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-pin"/></svg>
						<?= esc_html($kicker); ?>
					</div>
				<?php endif; ?>

				<?php if ($headline): ?>
					<h1 class="mt16 rv"><?= wp_kses_post($headline); ?></h1>
				<?php endif; ?>

				<?php if ($lede): ?>
					<p class="lede mt24 rv" style="max-width:46ch; color:rgba(255,255,255,.72);"><?= esc_html($lede); ?></p>
				<?php endif; ?>

				<div class="hgroup mt32 rv" style="flex-wrap:wrap;gap:14px">
					<?php if ($btn_text && $btn_url): ?>
						<a class="btn btn-primary" href="<?= esc_url($btn_url); ?>">
							<?= esc_html($btn_text); ?>
							<svg class="ic" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-arrow"/></svg>
						</a>
					<?php endif; ?>
					<?php if ($btn_note): ?>
						<span class="tiny" style="color:rgba(255,255,255,.6)"><?= esc_html($btn_note); ?></span>
					<?php endif; ?>
				</div>

				<div class="playrow rv">
					<button class="playbtn" id="playFilm" aria-label="Play the film">
						<svg class="ic" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-play"/></svg>
					</button>
					<div>
						<div style="font-weight:600;font-size:14.5px;color:#fff"><?= esc_html($video_label); ?></div>
						<div class="tiny mt8" style="color:rgba(255,255,255,.55)">
							<svg class="ic" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-clock"/></svg>
							<?= esc_html($video_sublabel); ?>
						</div>
					</div>
				</div>
			</div>

			<!-- Sidebar Card: Live Programmes -->
			<div class="card" style="background:#193150;border-color:#2B4A70;color:#fff">
				<div class="tiny" style="color:var(--gold)">
					<svg class="ic" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-calendar"/></svg>
					<?= esc_html($sidebar_title); ?>
				</div>

				<?php if (!empty($live_items)): foreach ($live_items as $item): ?>
					<div class="mt16" style="border-bottom:1px solid #24405F;padding-bottom:12px">
						<div style="font-weight:600;color:#fff"><?= esc_html($item['title'] ?? ''); ?></div>
						<div class="tiny mt8" style="color:#8FA5BB"><?= esc_html($item['dates'] ?? ''); ?></div>
					</div>
				<?php endforeach; endif; ?>

				<?php if (!empty($selfpaced_items)): foreach ($selfpaced_items as $sp): ?>
					<div style="padding-top:12px">
						<div class="tiny" style="color:#8FA5BB"><?= esc_html($sp['label'] ?? ''); ?></div>
						<div class="xs mt8" style="color:#DCE7F1"><?= esc_html($sp['title'] ?? ''); ?></div>
					</div>
				<?php endforeach; endif; ?>

				<?php if ($sidebar_btn_text && $sidebar_btn_url): ?>
					<a class="btn btn-onDark btn-sm btn-block mt16" href="<?= esc_url($sidebar_btn_url); ?>">
						<?= esc_html($sidebar_btn_text); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Modal Video Film -->
	<div id="filmModal" class="modal" hidden>
		<div class="wrap">
			<div class="player">
				<div style="display:flex;justify-content:space-between;width:100%;align-items:center">
					<span class="mono" style="font-size:12px;color:var(--gold)">Film · 90 seconds</span>
					<button id="closeFilm" style="color:#fff;font-size:18px;font-weight:700" aria-label="Close">✕</button>
				</div>
				<div style="position:relative;width:100%;height:100%;max-height:420px;overflow:hidden;border-radius:8px">
					<img src="<?= esc_url($poster_url); ?>" alt="Video Poster" style="width:100%;height:100%;object-fit:cover">
					<div style="position:absolute;inset:0;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;flex-direction:column">
						<div class="playbtn" style="width:68px;height:68px;margin-bottom:12px"><svg class="ic" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-play"/></svg></div>
						<div style="font-size:14px;color:#fff;font-weight:600"><?= esc_html($video_label); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
