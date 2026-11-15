<?php
/**
 * Block: Calendar Events
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

$kicker    = get_field('kicker') ?: 'Upcoming courses';
$headline  = get_field('headline') ?: 'Every date, in one place';
$lede      = get_field('lede') ?: 'Live online and in-person immersions at Letoli Ranch. Dates are confirmed unless marked otherwise.';

$cta_title = get_field('cta_title') ?: 'Nothing that fits your dates?';
$cta_text  = get_field('cta_text') ?: 'Register and we send you new dates as soon as they are confirmed.';
$cta_btn   = get_field('cta_btn_text') ?: 'Register for information';
$cta_url   = get_field('cta_btn_url') ?: '#register';

$events_query = new WP_Query([
	'post_type'      => 'aclc_event',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
]);

$events_data = [];
if ($events_query->have_posts()) {
	while ($events_query->have_posts()) {
		$events_query->the_post();
		$eid = get_the_ID();
		$events_data[] = [
			't' => get_the_title(),
			'm' => get_field('event_month', $eid) ?: 'TBC',
			'd' => get_field('event_day', $eid) ?: '—',
			'w' => get_field('date_label', $eid) ?: '',
			'f' => get_field('format', $eid) ?: 'Online',
			'p' => get_field('price', $eid) ?: null,
			'c' => get_field('is_confirmed', $eid) !== false ? 1 : 0,
		];
	}
	wp_reset_postdata();
}

if (empty($events_data)) {
	$events_data = [
		['m' => 'SEP', 'd' => '5', 't' => 'Redefine Your Self-Worth', 'w' => '5 & 6 September 2026', 'f' => 'Online', 'p' => null, 'c' => 1],
		['m' => 'SEP', 'd' => '19', 't' => 'Vital Fundamentals', 'w' => '19–26 September 2026', 'f' => 'In person', 'p' => '$3,997', 'c' => 1],
		['m' => 'NOV', 'd' => '2', 't' => 'Life Enhancement Course', 'w' => '2, 3, 4, 8 & 9 November 2026', 'f' => 'Online', 'p' => null, 'c' => 1],
		['m' => 'NOV', 'd' => '14', 't' => 'Redefine Your Self-Worth', 'w' => '14 & 15 November 2026', 'f' => 'Online', 'p' => null, 'c' => 1],
		['m' => 'DEC', 'd' => '5', 't' => 'Vital Fundamentals', 'w' => '5–12 December 2026', 'f' => 'In person', 'p' => '$3,997', 'c' => 1],
		['m' => 'JAN', 'd' => 'TBC', 't' => 'Life Enhancement Course', 'w' => 'Early 2027', 'f' => 'Online', 'p' => null, 'c' => 0],
	];
}
?>

<section <?= $block_attrs; ?>>
	<div class="hero tint">
		<div class="wrap">
			<?php if ($kicker): ?>
				<div class="kicker"><?= esc_html($kicker); ?></div>
			<?php endif; ?>
			<h1 class="mt16"><?= esc_html($headline); ?></h1>
			<?php if ($lede): ?>
				<p class="lede mt16" style="max-width:64ch"><?= esc_html($lede); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<div class="block">
		<div class="wrap">
			<div class="tabs" id="calTabs" data-events='<?= esc_attr(wp_json_encode($events_data)); ?>'></div>
			<div class="rowbox" id="calList">
				<?php foreach ($events_data as $ev): ?>
					<div class="row" data-f="<?= esc_attr($ev['f']); ?>">
						<div class="datebox">
							<div class="tiny"><?= esc_html($ev['m']); ?></div>
							<div class="d"><?= esc_html($ev['d']); ?></div>
						</div>
						<div class="grow" style="flex:1">
							<div style="font-weight:600">
								<?= esc_html($ev['t']); ?>
								<?php if (empty($ev['c'])): ?>
									<span class="pill" style="margin-left:8px">Date to be confirmed</span>
								<?php endif; ?>
							</div>
							<div class="xs">
								<?= esc_html($ev['w']); ?> · <?= esc_html($ev['f']); ?><?= $ev['f'] === 'In person' ? ', Letoli Ranch' : ''; ?>
							</div>
						</div>
						<?php if (!empty($ev['p'])): ?>
							<span class="price" style="font-size:16px"><?= esc_html($ev['p']); ?></span>
						<?php else: ?>
							<span class="pending">price TBD</span>
						<?php endif; ?>
						<a class="btn btn-ghost btn-sm" href="#register">Get details</a>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="card mt32 split" style="align-items:center">
				<div>
					<h3><?= esc_html($cta_title); ?></h3>
					<p class="sm mt8"><?= esc_html($cta_text); ?></p>
				</div>
				<a class="btn btn-primary" href="<?= esc_url($cta_url); ?>"><?= esc_html($cta_btn); ?></a>
			</div>
		</div>
	</div>
</section>
