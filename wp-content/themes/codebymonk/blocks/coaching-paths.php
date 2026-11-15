<?php
/**
 * Block: Coaching Paths
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block);

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker    = get_field('kicker') ?: '1-on-1 Coaching';
$headline  = get_field('headline') ?: 'Work that starts when you decide, not when a cohort does';
$lede      = get_field('lede') ?: 'Direct processing with an assigned Master Coach. Tailored to the exact issues keeping you from living in the Green Zone.';

$paths = get_field('paths') ?: [
	[
		'title'       => 'Initial session',
		'pill'        => 'FIRST STEP',
		'description' => 'Two hours reading your profile, naming what is not working and establishing where the leverage is. You leave with one area to shift first.',
	],
	[
		'title'       => 'Processing',
		'pill'        => 'DEEP WORK',
		'description' => 'Weekly sessions clearing the charges behind your decisions. You work through specific situations until the emotional charge is gone.',
	],
	[
		'title'       => 'World Class Coach path',
		'pill'        => 'LONG TERM',
		'description' => 'For leaders and coaches who want to master the technology and apply it with their own teams or clients.',
	],
];

$cta_title    = get_field('cta_title') ?: 'Start by getting the details';
$cta_text     = get_field('cta_text') ?: 'Register and we send you coach bios, session structures and pricing.';
$cta_btn_text = get_field('cta_btn_text') ?: 'Register for information';
$cta_btn_url  = get_field('cta_btn_url') ?: '#register';
?>

<section <?= $block_attrs; ?>>
	<div class="hero tint">
		<div class="wrap">
			<?php if ($kicker): ?>
				<div class="kicker"><?= esc_html($kicker); ?></div>
			<?php endif; ?>
			<h1 class="mt16"><?= esc_html($headline); ?></h1>
			<?php if ($lede): ?>
				<p class="lede mt16" style="max-width:62ch"><?= esc_html($lede); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<div class="block">
		<div class="wrap">
			<div class="g3">
				<?php foreach ($paths as $p): ?>
					<div class="card">
						<?php if (!empty($p['pill'])): ?>
							<div class="tiny" style="color:var(--fuego)"><?= esc_html($p['pill']); ?></div>
						<?php endif; ?>
						<h4 class="mt8"><?= esc_html($p['title'] ?? ''); ?></h4>
						<p class="sm mt8"><?= esc_html($p['description'] ?? ''); ?></p>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="card tint mt32 split" style="align-items:center">
				<div>
					<h3><?= esc_html($cta_title); ?></h3>
					<p class="sm mt8"><?= esc_html($cta_text); ?></p>
				</div>
				<?php if ($cta_btn_text && $cta_btn_url): ?>
					<a class="btn btn-primary" href="<?= esc_url($cta_btn_url); ?>">
						<?= esc_html($cta_btn_text); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
