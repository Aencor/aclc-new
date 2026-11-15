<?php
/**
 * Block: Legal Content
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-legal py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$title        = get_field('page_title') ?: get_the_title();
$last_updated = get_field('last_updated') ?: 'Last updated: November 2026';
$lede         = get_field('lede') ?: '';
$sections     = get_field('sections') ?: [
	[
		'heading' => 'Who we are',
		'body'    => '<p>Advanced Coaching &amp; Leadership Center (ACLC), based at Letoli Ranch, Saint Jo, Texas. We deliver whole-person coaching, leadership immersion courses, and processing based on the technology of Alan C. Walter.</p>',
	],
	[
		'heading' => 'What data we collect',
		'body'    => '<p>We collect information you provide directly through our registration forms (name, email, phone number, and programme preferences) as well as data from your Zones of Life profiles.</p>',
	],
	[
		'heading' => 'How we use your data',
		'body'    => '<p>Your information is used solely to deliver coaching programmes, communicate course logistics, provide the Thought of the Week newsletter, and coordinate your sessions. We never sell or rent your personal information to third parties.</p>',
	],
];
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[800px] px-6">
		<header class="mb-10 pb-6 border-b border-aclc-line">
			<h1 class="font-display font-semibold text-3xl sm:text-4xl text-aclc-ink mb-2"><?= esc_html($title); ?></h1>
			<?php if ($last_updated): ?>
				<div class="font-mono text-xs text-[#5A6875] tracking-wider"><?= esc_html($last_updated); ?></div>
			<?php endif; ?>
			<?php if ($lede): ?>
				<p class="lede text-base text-[#4A5764] mt-4 leading-relaxed font-body"><?= esc_html($lede); ?></p>
			<?php endif; ?>
		</header>

		<div class="legal-body space-y-8">
			<?php foreach ($sections as $sec): ?>
				<div class="legal-section">
					<h3 class="font-display font-semibold text-xl text-aclc-ink mb-3"><?= esc_html($sec['heading'] ?? ''); ?></h3>
					<div class="prose max-w-none text-sm text-[#4A5764] leading-relaxed">
						<?= wp_kses_post($sec['body'] ?? ''); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

