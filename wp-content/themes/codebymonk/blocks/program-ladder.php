<?php
/**
 * Block: Program Ladder
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

$kicker    = get_field('kicker') ?: 'Programmes';
$headline  = get_field('headline') ?: 'Five ways in, one ladder';
$lede      = get_field('lede') ?: 'Register once and we send you the details of whichever programme fits: dates, format, what it covers and what it costs.';
$subhead   = get_field('subhead') ?: 'Live, with dates';

$programs_list = get_field('programs_list') ?: [
	[
		'active_zone'   => 2,
		'title'         => 'Redefine Your Self-Worth',
		'duration'      => 'Two days · three editions a year · live online',
		'price'         => '',
		'price_pending' => true,
		'btn_text'      => 'Get information',
		'btn_url'       => '#register',
	],
	[
		'active_zone'   => 3,
		'title'         => 'Vital Fundamentals',
		'duration'      => 'Eight days in person at Letoli Ranch',
		'price'         => '$3,997',
		'price_pending' => false,
		'btn_text'      => 'View',
		'btn_url'       => '#program',
	],
	[
		'active_zone'   => 3,
		'title'         => 'Life Enhancement Course',
		'duration'      => 'Five sessions · live online',
		'price'         => '',
		'price_pending' => true,
		'btn_text'      => 'Get information',
		'btn_url'       => '#register',
	],
];
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
			<?php if ($subhead): ?>
				<div class="tiny mb16"><?= esc_html($subhead); ?></div>
			<?php endif; ?>

			<div class="rowbox mb32">
				<?php foreach ($programs_list as $prog): 
					$z = (int) ($prog['active_zone'] ?? 2);
					$is_pending = !empty($prog['price_pending']);
					$price = $prog['price'] ?? '';
					$btn_t = $prog['btn_text'] ?: 'View';
					$btn_u = $prog['btn_url'] ?: '#register';
					$is_primary = (strpos($btn_u, '#program') !== false || $btn_t === 'View');
				?>
					<div class="row">
						<div style="width:70px;flex:none">
							<div class="zones dim">
								<i class="z1 <?= $z >= 1 ? 'on' : ''; ?>"></i>
								<i class="z2 <?= $z >= 2 ? 'on' : ''; ?>"></i>
								<i class="z3 <?= $z >= 3 ? 'on' : ''; ?>"></i>
								<i class="z4 <?= $z >= 4 ? 'on' : ''; ?>"></i>
							</div>
						</div>

						<div class="grow" style="flex:1">
							<div style="font-weight:600"><?= esc_html($prog['title'] ?? ''); ?></div>
							<div class="xs"><?= esc_html($prog['duration'] ?? ''); ?></div>
						</div>

						<?php if ($is_pending || empty($price)): ?>
							<span class="pending">price TBD</span>
						<?php else: ?>
							<span class="price" style="font-size:16px"><?= esc_html($price); ?></span>
						<?php endif; ?>

						<a class="btn <?= $is_primary ? 'btn-primary' : 'btn-ghost'; ?> btn-sm" href="<?= esc_url($btn_u); ?>">
							<?= esc_html($btn_t); ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
