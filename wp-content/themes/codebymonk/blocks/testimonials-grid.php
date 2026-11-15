<?php
/**
 * Block: Testimonials Grid
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-testimonials py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker    = get_field('kicker') ?: 'What our clients say';
$headline  = get_field('headline') ?: 'Fifteen years of people who kept coming back';

$cs_title  = get_field('cs_title') ?: 'Jeff Crippen, Robert Kiyosaki and Ceil Stanford';
$cs_quote  = get_field('cs_quote') ?: '“ACLC gave me the emotional architecture to navigate global financial crises and high-stakes ventures with absolute clarity. The processing work is unparalleled.”';
$cs_author = get_field('cs_author') ?: 'Robert Kiyosaki';
$cs_role   = get_field('cs_role') ?: 'Author of Rich Dad Poor Dad';
$cs_image  = get_field('cs_image');
$cs_url    = !empty($cs_image['url']) ? $cs_image['url'] : get_template_directory_uri() . '/assets/img/photos/jeff-robert-ceil.jpg';

$cs2_quote  = get_field('cs2_quote') ?: '“The clarity I gained at Letoli Ranch changed not just my businesses, but my relationship with myself and everyone around me.”';
$cs2_author = get_field('cs2_author') ?: 'Kim Kiyosaki, Author of Rich Woman';
$cs2_image  = get_field('cs2_image');
$cs2_url    = !empty($cs2_image['url']) ? $cs2_image['url'] : get_template_directory_uri() . '/assets/img/photos/kim-kiyosaki.jpg';

$metrics_title = get_field('metrics_title') ?: 'Results people reported';
$metrics       = get_field('metrics') ?: [
	['number' => '15+', 'label' => 'Years returning', 'detail' => 'Entrepreneurs who started in 2008 and continue annual processing to this day.'],
	['number' => '94%', 'label' => 'Green Zone shift', 'detail' => 'Participants who moved and remained permanently in the Green Zone within 90 days.'],
	['number' => '3.8x', 'label' => 'Average net worth growth', 'detail' => 'Observed across executives completing the full Vital Fundamentals ladder.'],
];

$quotes_title = get_field('quotes_title') ?: 'In their own words';
$quotes       = get_field('quotes') ?: [
	[
		'name'   => 'Rita Khagram',
		'role'   => 'Managing Director · London',
		'metric' => 'Green Zone',
		'quote'  => 'I was trapped in relentless reactivity. Vital Fundamentals gave me an anchor point that stopped the noise completely. I made the biggest business decisions of my career from a place of peace.',
	],
	[
		'name'   => 'David Pritchett',
		'role'   => 'Technology Founder · Austin',
		'metric' => 'Processing',
		'quote'  => 'Standard coaching gives you tools and accountability. Alan C. Walter’s processing actually extracts the emotional charges that cause self-sabotage in the first place.',
	],
	[
		'name'   => 'Rigoberto Acosta',
		'role'   => 'Coach de Negocios · México',
		'metric' => 'En Español',
		'quote'  => 'El impacto de este trabajo en líderes de habla hispana ha sido extraordinario. La precisión del modelo de Zonas de Vida trasciende cualquier técnica convencional.',
	],
	[
		'name'   => 'Tom',
		'role'   => 'Real Estate Developer · Dallas',
		'metric' => 'Letoli Ranch',
		'quote'  => 'The 8 days at Letoli Ranch reset my entire internal operating system. There is no other environment like it on earth.',
	],
];
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<div class="mb-12">
			<?php if ($kicker): ?>
				<div class="kicker font-mono text-xs uppercase tracking-widest text-aclc-fuego mb-2"><?= esc_html($kicker); ?></div>
			<?php endif; ?>
			<h2 class="font-display font-semibold text-3xl sm:text-4xl text-aclc-ink mb-3"><?= esc_html($headline); ?></h2>
		</div>

		<!-- Featured Case Study Banner (Robert Kiyosaki) -->
		<div class="card border-2 border-aclc-gold rounded-xl p-6 sm:p-8 bg-white shadow-md mb-12">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
				<div class="rounded-lg overflow-hidden border border-aclc-line shadow-sm">
					<img src="<?= esc_url($cs_url); ?>" alt="<?= esc_attr($cs_title); ?>" class="w-full h-auto object-cover" />
					<div class="font-mono text-xs text-[#5A6875] p-2 bg-slate-50 border-t border-aclc-line text-center"><?= esc_html($cs_title); ?></div>
				</div>

				<div>
					<p class="font-display text-lg sm:text-xl text-aclc-ink leading-relaxed mb-4"><?= esc_html($cs_quote); ?></p>
					<div class="font-semibold text-aclc-navy"><?= esc_html($cs_author); ?></div>
					<div class="font-mono text-xs text-aclc-fuego"><?= esc_html($cs_role); ?></div>

					<!-- Second testimonial inside box (Kim Kiyosaki) -->
					<div class="mt-6 pt-6 border-t border-aclc-line flex items-center gap-4">
						<img src="<?= esc_url($cs2_url); ?>" alt="<?= esc_attr($cs2_author); ?>" class="w-12 h-12 rounded-full object-cover border border-aclc-gold flex-none" />
						<div>
							<p class="text-xs text-[#4A5764] italic"><?= esc_html($cs2_quote); ?></p>
							<div class="font-semibold text-xs text-aclc-ink mt-1"><?= esc_html($cs2_author); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Metrics Results Grid -->
		<?php if ($metrics_title): ?>
			<h3 class="font-display font-semibold text-2xl text-aclc-ink mb-6"><?= esc_html($metrics_title); ?></h3>
		<?php endif; ?>
		<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
			<?php foreach ($metrics as $m): ?>
				<div class="card border border-aclc-line rounded-[10px] p-6 bg-white shadow-sm">
					<div class="font-mono font-bold text-3xl sm:text-4xl text-aclc-fuego mb-1"><?= esc_html($m['number'] ?? ''); ?></div>
					<div class="font-semibold text-base text-aclc-ink mb-2"><?= esc_html($m['label'] ?? ''); ?></div>
					<p class="text-xs text-[#5A6875] leading-relaxed"><?= esc_html($m['detail'] ?? ''); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Client Direct Quotes -->
		<?php if ($quotes_title): ?>
			<h3 class="font-display font-semibold text-2xl text-aclc-ink mb-6"><?= esc_html($quotes_title); ?></h3>
		<?php endif; ?>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
			<?php foreach ($quotes as $q): ?>
				<div class="card border border-aclc-line rounded-[10px] p-6 bg-white shadow-sm flex flex-col justify-between">
					<p class="text-sm leading-relaxed text-[#3D4A57] mb-6 italic">“<?= esc_html($q['quote'] ?? ''); ?>”</p>
					<div class="flex items-center justify-between border-t border-aclc-line pt-4">
						<div>
							<div class="font-semibold text-sm text-aclc-ink"><?= esc_html($q['name'] ?? ''); ?></div>
							<div class="text-xs text-[#5A6875]"><?= esc_html($q['role'] ?? ''); ?></div>
						</div>
						<?php if (!empty($q['metric'])): ?>
							<span class="font-mono text-[10px] tracking-wider uppercase px-2 py-1 bg-aclc-navysoft text-aclc-navy rounded"><?= esc_html($q['metric']); ?></span>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
