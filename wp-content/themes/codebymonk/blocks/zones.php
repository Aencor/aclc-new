<?php
/**
 * Block: Zones of Life
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

$headline    = get_field('headline') ?: 'Where you are now decides where you start';
$cards       = get_field('zone_cards') ?: [
	[
		'title'        => 'Red Zone',
		'active_level' => 1,
		'description'  => 'Out of flow. You react to what happens instead of directing it.',
	],
	[
		'title'        => 'Amber Zone',
		'active_level' => 2,
		'description'  => 'Awake. You can name what is not working, but change still depends on willpower.',
	],
	[
		'title'        => 'Green Zone',
		'active_level' => 3,
		'description'  => 'In flow. Results come consistently because there is structure holding them.',
	],
];

$teaser_title    = get_field('teaser_title') ?: 'Not sure which Zone you are in?';
$teaser_text     = get_field('teaser_text') ?: 'The free profile takes two minutes and tells you which programme fits.';
$teaser_btn_text = get_field('teaser_btn_text') ?: 'Take the free profile';
$teaser_btn_url  = get_field('teaser_btn_url') ?: home_url('/profiles/');
?>

<section <?= $block_attrs; ?>>
	<div class="wrap">
		<?php if ($headline): ?>
			<h2 class="mb24"><?= esc_html($headline); ?></h2>
		<?php endif; ?>

		<div class="g3">
			<?php foreach ($cards as $card): 
				$lvl = (int) ($card['active_level'] ?? 1);
			?>
				<div class="card">
					<div class="zones dim">
						<i class="z1 <?= $lvl >= 1 ? 'on' : ''; ?>"></i>
						<i class="z2 <?= $lvl >= 2 ? 'on' : ''; ?>"></i>
						<i class="z3 <?= $lvl >= 3 ? 'on' : ''; ?>"></i>
						<i class="z4 <?= $lvl >= 4 ? 'on' : ''; ?>"></i>
					</div>
					<h4 class="mt16"><?= esc_html($card['title'] ?? ''); ?></h4>
					<p class="sm mt8"><?= esc_html($card['description'] ?? ''); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="card tint mt32 split" style="align-items:center">
			<div>
				<h3><?= esc_html($teaser_title); ?></h3>
				<p class="sm mt8"><?= esc_html($teaser_text); ?></p>
			</div>
			<?php if ($teaser_btn_text && $teaser_btn_url): ?>
				<a class="btn btn-go" href="<?= esc_url($teaser_btn_url); ?>">
					<?= esc_html($teaser_btn_text); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
