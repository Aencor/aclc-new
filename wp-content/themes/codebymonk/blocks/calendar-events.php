<?php
/**
 * Block: Calendar Events
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-calendar py-16 bg-white');

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
$empty_msg = get_field('empty_msg') ?: 'No dates in this format yet.';

$cta_title = get_field('cta_title') ?: 'Nothing that fits your dates?';
$cta_text  = get_field('cta_text') ?: 'Register and we send you new dates as soon as they are confirmed.';
$cta_btn   = get_field('cta_btn_text') ?: 'Register for information';
$cta_url   = get_field('cta_btn_url') ?: '#register';

// Query events from CPT `aclc_event`
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
			'title'     => get_the_title(),
			'month'     => get_field('event_month', $eid) ?: 'TBC',
			'day'       => get_field('event_day', $eid) ?: '—',
			'date_lbl'  => get_field('date_label', $eid) ?: '',
			'format'    => get_field('format', $eid) ?: 'Online',
			'location'  => get_field('location', $eid) ?: 'Online',
			'price'     => get_field('price', $eid) ?: '',
			'confirmed' => get_field('is_confirmed', $eid) !== false,
		];
	}
	wp_reset_postdata();
}

// Fallback events if database hasn't populated yet
if (empty($events_data)) {
	$events_data = [
		['title' => 'Redefine Your Self-Worth', 'month' => 'SEP', 'day' => '5', 'date_lbl' => '5 & 6 September 2026', 'format' => 'Online', 'location' => 'Online', 'price' => '', 'confirmed' => true],
		['title' => 'Vital Fundamentals', 'month' => 'SEP', 'day' => '19', 'date_lbl' => '19–26 September 2026', 'format' => 'In person', 'location' => 'Letoli Ranch', 'price' => '$3,997', 'confirmed' => true],
		['title' => 'Life Enhancement Course', 'month' => 'NOV', 'day' => '2', 'date_lbl' => '2, 3, 4, 8 & 9 November 2026', 'format' => 'Online', 'location' => 'Online', 'price' => '', 'confirmed' => true],
		['title' => 'Redefine Your Self-Worth', 'month' => 'NOV', 'day' => '14', 'date_lbl' => '14 & 15 November 2026', 'format' => 'Online', 'location' => 'Online', 'price' => '', 'confirmed' => true],
		['title' => 'Vital Fundamentals', 'month' => 'DEC', 'day' => '5', 'date_lbl' => '5–12 December 2026', 'format' => 'In person', 'location' => 'Letoli Ranch', 'price' => '$3,997', 'confirmed' => true],
		['title' => 'Life Enhancement Course', 'month' => 'JAN', 'day' => 'TBC', 'date_lbl' => 'Early 2027', 'format' => 'Online', 'location' => 'Online', 'price' => '', 'confirmed' => false],
	];
}
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

		<!-- Interactive Filter Tabs -->
		<div class="tabs flex gap-2 mb-6" id="calTabs" data-events='<?= esc_attr(wp_json_encode($events_data)); ?>'>
			<button class="cal-tab on px-4 py-1.5 text-xs font-semibold rounded-md bg-aclc-navy text-white transition-colors" data-format="All">All</button>
			<button class="cal-tab px-4 py-1.5 text-xs font-semibold rounded-md bg-slate-100 text-[#4A5764] hover:bg-slate-200 transition-colors" data-format="Online">Online</button>
			<button class="cal-tab px-4 py-1.5 text-xs font-semibold rounded-md bg-slate-100 text-[#4A5764] hover:bg-slate-200 transition-colors" data-format="In person">In person</button>
		</div>

		<!-- Events List Container -->
		<div class="border border-aclc-line rounded-[10px] divide-y divide-aclc-line bg-white shadow-sm overflow-hidden mb-10" id="calList">
			<?php foreach ($events_data as $ev): ?>
				<div class="cal-row p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:bg-slate-50/70 transition-colors" data-ev-format="<?= esc_attr($ev['format']); ?>">
					<!-- Date Box -->
					<div class="flex items-center gap-4">
						<div class="w-14 h-14 rounded-lg bg-aclc-navysoft text-center flex flex-col justify-center flex-none">
							<div class="font-mono text-[10px] text-aclc-fuego uppercase tracking-wider font-bold"><?= esc_html($ev['month']); ?></div>
							<div class="font-mono font-bold text-lg text-aclc-navy leading-none mt-0.5"><?= esc_html($ev['day']); ?></div>
						</div>

						<div>
							<div class="font-semibold text-base text-aclc-ink flex items-center gap-2">
								<?= esc_html($ev['title']); ?>
								<?php if (empty($ev['confirmed'])): ?>
									<span class="font-mono text-[10px] uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-300 px-2 py-0.5 rounded">Date to be confirmed</span>
								<?php endif; ?>
							</div>
							<div class="text-xs text-[#5A6875] mt-1">
								<?= esc_html($ev['date_lbl']); ?> · <?= esc_html($ev['format']); ?><?= $ev['format'] === 'In person' ? ', ' . esc_html($ev['location']) : ''; ?>
							</div>
						</div>
					</div>

					<!-- Price & CTA -->
					<div class="flex items-center gap-4 self-end md:self-auto">
						<?php if (!empty($ev['price'])): ?>
							<span class="font-mono font-bold text-base text-aclc-ink"><?= esc_html($ev['price']); ?></span>
						<?php else: ?>
							<span class="font-mono text-xs text-aclc-fuego border border-dashed border-aclc-fuego/40 bg-aclc-fuego/5 px-2.5 py-1 rounded">price TBD</span>
						<?php endif; ?>

						<a href="#register" class="btn btn-ghost border border-aclc-line px-4 py-2 rounded-lg text-xs font-semibold text-aclc-ink hover:border-aclc-navy transition-colors whitespace-nowrap">
							Get details
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- CTA Teaser -->
		<div class="card bg-slate-50 border border-aclc-line rounded-[10px] p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
			<div>
				<h3 class="font-display font-semibold text-lg text-aclc-ink mb-1"><?= esc_html($cta_title); ?></h3>
				<p class="text-sm text-[#4A5764] font-body max-w-xl"><?= esc_html($cta_text); ?></p>
			</div>
			<?php if ($cta_btn && $cta_url): ?>
				<a href="<?= esc_url($cta_url); ?>" class="btn btn-primary inline-flex items-center justify-center px-6 py-3 bg-aclc-fuego text-white font-semibold text-sm rounded-lg hover:opacity-95 transition-transform hover:-translate-y-0.5 whitespace-nowrap self-start sm:self-auto">
					<?= esc_html($cta_btn); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
