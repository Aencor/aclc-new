<?php
/**
 * Block: Profiles Grid
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

$kicker    = get_field('kicker') ?: 'Zones Profiles';
$headline  = get_field('headline') ?: 'Three areas, one picture';
$lede      = get_field('lede') ?: 'A precise reading of where you are in life, wealth and physical resilience. Completed online, debriefed with your coach.';

$profiles = get_field('profiles') ?: [
	[
		'active_zone' => 2,
		'title'       => 'Where your wealth sits',
		'badge'       => 'Financial Profile',
		'description' => 'Measures clarity, flow and emotional charges around money. Most entrepreneurs discover they are operating in the Amber Zone with their wealth.',
		'btn_text'    => 'Take this profile',
		'btn_url'     => 'https://zonesoflife.com',
	],
	[
		'active_zone' => 2,
		'title'       => 'How you operate',
		'badge'       => 'Life & Skills Profile',
		'description' => '24 areas of human functioning. Reveals which dynamics hold you in reactivity and where your highest leverage point is.',
		'btn_text'    => 'Take this profile',
		'btn_url'     => 'https://zonesoflife.com',
	],
	[
		'active_zone' => 2,
		'title'       => 'Physical foundation',
		'badge'       => 'Body Profile',
		'description' => 'You cannot live in the Green Zone in an exhausted body. Pinpoints where physical energy leaks and what restores it.',
		'btn_text'    => 'Take this profile',
		'btn_url'     => 'https://zonesoflife.com',
	],
];

$notice_title    = get_field('notice_title') ?: 'The assessment lives on its own site';
$notice_desc     = get_field('notice_desc') ?: 'You complete the questions at zonesoflife.com. We read and debrief your profile together at ACLC.';
$notice_btn_text = get_field('notice_btn_text') ?: 'Go to zonesoflife.com';
$notice_btn_url  = get_field('notice_btn_url') ?: 'https://zonesoflife.com';
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
			<div class="g3">
				<?php foreach ($profiles as $prof): 
					$z = (int) ($prof['active_zone'] ?? 2);
				?>
					<div class="card">
						<div class="zones dim">
							<i class="z1 <?= $z >= 1 ? 'on' : ''; ?>"></i>
							<i class="z2 <?= $z >= 2 ? 'on' : ''; ?>"></i>
							<i class="z3 <?= $z >= 3 ? 'on' : ''; ?>"></i>
							<i class="z4 <?= $z >= 4 ? 'on' : ''; ?>"></i>
						</div>
						<div class="tiny mt16"><?= esc_html($prof['badge'] ?? 'Zones Profile'); ?></div>
						<h4 class="mt8"><?= esc_html($prof['title'] ?? ''); ?></h4>
						<p class="sm mt8"><?= esc_html($prof['description'] ?? ''); ?></p>
						<a class="btn btn-ghost btn-sm mt16" href="<?= esc_url($prof['btn_url'] ?? 'https://zonesoflife.com'); ?>">
							<?= esc_html($prof['btn_text'] ?: 'Take this profile'); ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="card tint mt32 split" style="align-items:center">
				<div>
					<h3><?= esc_html($notice_title); ?></h3>
					<p class="sm mt8"><?= esc_html($notice_desc); ?></p>
				</div>
				<a class="btn btn-go" href="<?= esc_url($notice_btn_url); ?>">
					<?= esc_html($notice_btn_text); ?>
				</a>
			</div>
		</div>
	</div>
</section>
