<?php
/**
 * Block: Coaching Paths
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-coaching-paths py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker    = get_field('kicker') ?: '1-on-1 Coaching';
$headline  = get_field('headline') ?: 'Work that starts when you decide, not when a cohort does';
$lede      = get_field('lede') ?: 'Personalized processing tailored to your exact emotional barriers, goals, and leadership responsibilities.';

$paths = get_field('paths') ?: [
	[
		'title'       => 'Initial session',
		'pill'        => 'First step',
		'description' => 'Two hours evaluating your Zones profile, naming what is not working, and mapping your personalized processing trajectory.',
	],
	[
		'title'       => 'Processing',
		'pill'        => 'Core methodology',
		'description' => 'Direct, intensive sessions removing historical triggers, emotional anchors, and limiting beliefs using Alan C. Walter’s proprietary protocols.',
	],
	[
		'title'       => 'World Class Coach path',
		'pill'        => 'Mastery',
		'description' => 'For seasoned executives and professionals who wish to master the processing technology to transform their own organizations.',
	],
];

$cta_title    = get_field('cta_title') ?: 'Start by getting the details';
$cta_text     = get_field('cta_text') ?: 'We discuss your situation and whether 1-on-1 processing is the right fit.';
$cta_btn_text = get_field('cta_btn_text') ?: 'Register for details';
$cta_btn_url  = get_field('cta_btn_url') ?: '#register';
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<div class="mb-10">
			<?php if ($kicker): ?>
				<div class="kicker font-mono text-xs uppercase tracking-widest text-aclc-fuego mb-2"><?= esc_html($kicker); ?></div>
			<?php endif; ?>
			<h2 class="font-display font-semibold text-3xl sm:text-4xl text-aclc-ink mb-3"><?= esc_html($headline); ?></h2>
			<?php if ($lede): ?>
				<p class="lede text-base text-[#4A5764] max-w-2xl font-body"><?= esc_html($lede); ?></p>
			<?php endif; ?>
		</div>

		<!-- Paths Grid -->
		<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
			<?php foreach ($paths as $p): ?>
				<div class="card border border-aclc-line rounded-[10px] p-6 bg-white shadow-sm flex flex-col justify-between hover:border-aclc-navy transition-colors">
					<div>
						<div class="flex items-center justify-between mb-3">
							<h4 class="font-display font-semibold text-lg text-aclc-ink"><?= esc_html($p['title'] ?? ''); ?></h4>
							<?php if (!empty($p['pill'])): ?>
								<span class="font-mono text-[10px] uppercase tracking-wider bg-aclc-navysoft text-aclc-navy px-2 py-0.5 rounded"><?= esc_html($p['pill']); ?></span>
							<?php endif; ?>
						</div>
						<p class="text-sm leading-relaxed text-[#4A5764] font-body"><?= esc_html($p['description'] ?? ''); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- CTA Teaser -->
		<div class="card bg-aclc-navysoft/60 border border-transparent rounded-[10px] p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
			<div>
				<h3 class="font-display font-semibold text-xl text-aclc-navy mb-1"><?= esc_html($cta_title); ?></h3>
				<p class="text-sm text-[#4A5764] font-body"><?= esc_html($cta_text); ?></p>
			</div>
			<?php if ($cta_btn_text && $cta_btn_url): ?>
				<a href="<?= esc_url($cta_btn_url); ?>" class="btn btn-primary inline-flex items-center justify-center px-6 py-3 bg-aclc-fuego text-white font-semibold text-sm rounded-lg hover:opacity-95 transition-transform hover:-translate-y-0.5 whitespace-nowrap self-start sm:self-auto">
					<?= esc_html($cta_btn_text); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
