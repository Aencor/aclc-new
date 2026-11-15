<?php
/**
 * Block: Program Detail
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-program-detail py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker      = get_field('kicker') ?: 'Live programme · immersion';
$title       = get_field('title') ?: 'Vital Fundamentals';
$lede        = get_field('lede') ?: 'Eight days at Letoli Ranch putting the fundamentals that hold everything else in place. You leave with a structure, not notes.';
$zone_text   = get_field('zone_text') ?: 'Takes you from Amber to Green';

$badges = get_field('badges') ?: [
	['badge' => '5–12 Dec 2026'],
	['badge' => 'In person · Saint Jo, Texas'],
	['badge' => 'Assigned coach'],
];

$steps = get_field('steps') ?: [
	[
		'icon'        => 'compass',
		'title'       => 'Where you are.',
		'description' => 'Your Zones profile is read with your coach and one area is chosen to move first.',
	],
	[
		'icon'        => 'spark',
		'title'       => 'Processing.',
		'description' => 'One-to-one work removing what holds you back. Daily sessions until you reach flow.',
	],
	[
		'icon'        => 'chart',
		'title'       => 'The Structure.',
		'description' => 'Putting the systems and habits in place that make the shift permanent.',
	],
	[
		'icon'        => 'shield',
		'title'       => 'The Exit.',
		'description' => 'You leave with a clear battle plan and 90 days of check-ins with your coach.',
	],
];

$card_title = get_field('card_title') ?: 'Programme investment';
$price      = get_field('price') ?: '$3,997';
$price_note = get_field('price_note') ?: 'Includes lodging & meals at Letoli Ranch';
$guarantee  = get_field('guarantee') ?: 'Full refund guarantee if after day 2 you don\'t feel a permanent shift in clarity and power.';
$btn_text   = get_field('btn_text') ?: 'Register for details';
$btn_url    = get_field('btn_url') ?: '#register';

$inclusions = get_field('inclusions') ?: [
	['item' => '8 days of private room & board at Letoli Ranch'],
	['item' => 'Daily 1-on-1 coaching & processing sessions'],
	['item' => 'Comprehensive Zones Profile reassessment'],
	['item' => 'Lifetime access to course materials & portal'],
];
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<div class="grid grid-cols-1 lg:grid-cols-[1.2fr_0.8fr] gap-12 items-start">
			
			<!-- Left Column: Curriculum & Flow -->
			<div>
				<?php if ($kicker): ?>
					<div class="kicker font-mono text-xs uppercase tracking-widest text-aclc-fuego mb-2"><?= esc_html($kicker); ?></div>
				<?php endif; ?>

				<h1 class="font-display font-semibold text-3xl sm:text-4xl lg:text-[42px] text-aclc-ink mb-4"><?= esc_html($title); ?></h1>

				<?php if ($lede): ?>
					<p class="lede text-lg text-[#3D4A57] mb-6 leading-relaxed font-body"><?= esc_html($lede); ?></p>
				<?php endif; ?>

				<!-- Badges Chips -->
				<div class="flex flex-wrap gap-2 mb-6">
					<?php foreach ($badges as $b): ?>
						<span class="font-mono text-xs tracking-wider bg-aclc-navysoft text-aclc-navy px-3 py-1.5 rounded-[5px]">
							<?= esc_html($b['badge'] ?? ''); ?>
						</span>
					<?php endforeach; ?>
				</div>

				<!-- Zones Indicator -->
				<div class="max-w-[340px] mb-10">
					<div class="zones flex gap-[3px] h-[7px] rounded-[4px] overflow-hidden">
						<i class="flex-1 block bg-aclc-red"></i>
						<i class="flex-1 block bg-aclc-amber"></i>
						<i class="flex-1 block bg-aclc-green"></i>
						<i class="flex-1 block bg-aclc-gold/20"></i>
					</div>
					<?php if ($zone_text): ?>
						<div class="font-mono text-[11px] text-[#5A6875] tracking-wider mt-2"><?= esc_html($zone_text); ?></div>
					<?php endif; ?>
				</div>

				<!-- Ladder Steps -->
				<div class="ladder space-y-6 pt-6 border-t border-aclc-line">
					<div class="font-mono text-xs uppercase text-[#5A6875] tracking-widest mb-4">What happens</div>
					
					<?php foreach ($steps as $st): 
						$icon = $st['icon'] ?: 'spark';
					?>
						<div class="st flex items-start gap-4">
							<span class="w-8 h-8 rounded-full bg-aclc-navysoft text-aclc-navy flex items-center justify-center flex-none">
								<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-<?= esc_attr($icon); ?>"/></svg>
							</span>
							<div>
								<strong class="text-aclc-ink font-semibold"><?= esc_html($st['title'] ?? ''); ?></strong>
								<span class="text-sm text-[#4A5764] leading-relaxed block mt-0.5"><?= esc_html($st['description'] ?? ''); ?></span>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Right Column: Investment Card -->
			<div class="sticky top-24">
				<div class="card border border-aclc-line rounded-[10px] p-6 sm:p-8 bg-white shadow-lg">
					<div class="font-mono text-xs uppercase text-aclc-fuego tracking-wider mb-2"><?= esc_html($card_title); ?></div>
					<div class="font-mono font-bold text-3xl sm:text-4xl text-aclc-ink mb-1"><?= esc_html($price); ?></div>
					<?php if ($price_note): ?>
						<div class="text-xs text-[#5A6875] mb-6"><?= esc_html($price_note); ?></div>
					<?php endif; ?>

					<ul class="space-y-3 mb-6 border-t border-b border-aclc-line py-5 text-sm text-[#3D4A57]">
						<?php foreach ($inclusions as $inc): ?>
							<li class="flex items-start gap-2">
								<svg class="w-4 h-4 text-aclc-green flex-none mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><use href="#i-check"/></svg>
								<span><?= esc_html($inc['item'] ?? ''); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>

					<?php if ($btn_text && $btn_url): ?>
						<a href="<?= esc_url($btn_url); ?>" class="btn btn-primary w-full py-3 px-6 bg-aclc-fuego text-white rounded-lg font-semibold text-center block hover:opacity-95 transition-opacity shadow-md mb-4">
							<?= esc_html($btn_text); ?>
						</a>
					<?php endif; ?>

					<?php if ($guarantee): ?>
						<p class="font-mono text-[11px] text-[#5A6875] text-center leading-relaxed"><?= esc_html($guarantee); ?></p>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</section>
