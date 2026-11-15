<?php
/**
 * Block: Program Ladder
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-programs-ladder py-16 bg-white');

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

		<?php if ($subhead): ?>
			<div class="font-mono text-xs uppercase text-[#5A6875] tracking-wider mb-4"><?= esc_html($subhead); ?></div>
		<?php endif; ?>

		<!-- Rows Box -->
		<div class="border border-aclc-line rounded-[10px] divide-y divide-aclc-line bg-white shadow-sm overflow-hidden mb-10">
			<?php foreach ($programs_list as $prog): 
				$z = (int) ($prog['active_zone'] ?? 2);
				$is_pending = !empty($prog['price_pending']);
				$price = $prog['price'] ?? '';
				$btn_t = $prog['btn_text'] ?: 'View';
				$btn_u = $prog['btn_url'] ?: '#register';
			?>
				<div class="p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:bg-slate-50/70 transition-colors">
					<!-- Zones indicator -->
					<div class="w-[70px] flex-none">
						<div class="zones flex gap-[3px] h-[6px] rounded-[3px] overflow-hidden">
							<i class="flex-1 block <?= $z >= 1 ? 'bg-aclc-red' : 'bg-aclc-red/20'; ?>"></i>
							<i class="flex-1 block <?= $z >= 2 ? 'bg-aclc-amber' : 'bg-aclc-amber/20'; ?>"></i>
							<i class="flex-1 block <?= $z >= 3 ? 'bg-aclc-green' : 'bg-aclc-green/20'; ?>"></i>
							<i class="flex-1 block <?= $z >= 4 ? 'bg-aclc-gold' : 'bg-aclc-gold/20'; ?>"></i>
						</div>
					</div>

					<!-- Details -->
					<div class="flex-grow">
						<div class="font-semibold text-base text-aclc-ink"><?= esc_html($prog['title'] ?? ''); ?></div>
						<div class="text-xs text-[#5A6875] mt-0.5"><?= esc_html($prog['duration'] ?? ''); ?></div>
					</div>

					<!-- Price & CTA -->
					<div class="flex items-center gap-4 self-end md:self-auto">
						<?php if ($is_pending || empty($price)): ?>
							<span class="font-mono text-xs text-aclc-fuego border border-dashed border-aclc-fuego/40 bg-aclc-fuego/5 px-2.5 py-1 rounded">price TBD</span>
						<?php else: ?>
							<span class="font-mono font-bold text-base text-aclc-ink"><?= esc_html($price); ?></span>
						<?php endif; ?>

						<a href="<?= esc_url($btn_u); ?>" class="btn <?= strpos($btn_u, '#program') !== false ? 'bg-aclc-fuego text-white' : 'border border-aclc-line bg-white text-aclc-ink hover:border-aclc-navy'; ?> px-4 py-2 rounded-lg text-xs font-semibold whitespace-nowrap transition-colors">
							<?= esc_html($btn_t); ?>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
