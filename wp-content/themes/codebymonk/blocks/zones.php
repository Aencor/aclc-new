<?php
/**
 * Block: Zones of Life
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-zones py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$headline    = get_field('headline') ?: 'Where you are now decides where you start';
$cards       = get_field('zone_cards') ?: [
	[
		'title'        => 'Red Zone',
		'active_level' => 1,
		'diagnostic'   => 'Out of flow',
		'description'  => 'Out of flow. You react to what happens instead of directing it.',
	],
	[
		'title'        => 'Amber Zone',
		'active_level' => 2,
		'diagnostic'   => 'Awake',
		'description'  => 'Awake. You can name what is not working, but change still depends on willpower.',
	],
	[
		'title'        => 'Green Zone',
		'active_level' => 3,
		'diagnostic'   => 'In flow',
		'description'  => 'In flow. Results come consistently because there is structure holding them.',
	],
];

$teaser_title    = get_field('teaser_title') ?: 'Not sure which Zone you are in?';
$teaser_text     = get_field('teaser_text') ?: 'The free profile takes two minutes and tells you which programme fits.';
$teaser_btn_text = get_field('teaser_btn_text') ?: 'Take the free profile';
$teaser_btn_url  = get_field('teaser_btn_url') ?: '#profiles';
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<?php if ($headline): ?>
			<h2 class="font-display font-semibold text-2xl sm:text-3xl lg:text-[35px] text-aclc-ink mb-8">
				<?= esc_html($headline); ?>
			</h2>
		<?php endif; ?>

		<!-- 3 Zone Cards -->
		<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
			<?php foreach ($cards as $card): 
				$lvl = (int) ($card['active_level'] ?? 1);
			?>
				<div class="card border border-aclc-line rounded-[10px] p-5 bg-white shadow-sm hover:shadow-md transition-shadow">
					<div class="zones flex gap-[3px] h-[7px] rounded-[4px] overflow-hidden mb-4">
						<i class="flex-1 block h-full <?= $lvl >= 1 ? 'bg-aclc-red' : 'bg-aclc-red/20'; ?>"></i>
						<i class="flex-1 block h-full <?= $lvl >= 2 ? 'bg-aclc-amber' : 'bg-aclc-amber/20'; ?>"></i>
						<i class="flex-1 block h-full <?= $lvl >= 3 ? 'bg-aclc-green' : 'bg-aclc-green/20'; ?>"></i>
						<i class="flex-1 block h-full <?= $lvl >= 4 ? 'bg-aclc-gold' : 'bg-aclc-gold/20'; ?>"></i>
					</div>

					<h4 class="font-display font-semibold text-base text-aclc-ink mb-2">
						<?= esc_html($card['title'] ?? ''); ?>
					</h4>
					<p class="text-sm leading-relaxed text-[#4A5764] font-body">
						<?= esc_html($card['description'] ?? ''); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Teaser Card Assessment -->
		<div class="card bg-aclc-navysoft/60 border border-transparent rounded-[10px] p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
			<div>
				<h3 class="font-display font-semibold text-xl text-aclc-navy mb-1">
					<?= esc_html($teaser_title); ?>
				</h3>
				<p class="text-sm text-[#4A5764] font-body">
					<?= esc_html($teaser_text); ?>
				</p>
			</div>
			<?php if ($teaser_btn_text && $teaser_btn_url): ?>
				<a href="<?= esc_url($teaser_btn_url); ?>" class="btn btn-go inline-flex items-center justify-center px-6 py-3 bg-aclc-green text-white font-semibold text-sm rounded-lg hover:opacity-95 transition-transform hover:-translate-y-0.5 whitespace-nowrap self-start sm:self-auto">
					<?= esc_html($teaser_btn_text); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
