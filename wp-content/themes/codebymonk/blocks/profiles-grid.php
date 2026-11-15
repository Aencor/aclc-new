<?php
/**
 * Block: Profiles Grid
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-profiles-grid py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker    = get_field('kicker') ?: 'Zones Profiles';
$headline  = get_field('headline') ?: 'Three areas, one picture';
$lede      = get_field('lede') ?: 'Assessments developed across 30+ years measuring where your energy, wealth, and focus are leaking, and where your greatest leverage lies.';

$profiles = get_field('profiles') ?: [
	[
		'active_zone' => 2,
		'title'       => 'Financial Profile',
		'time_scope'  => '30 minutes · Online',
		'description' => 'Uncovers how you relate to money, wealth accumulation patterns, and hidden financial anxieties that prevent scaling.',
		'btn_text'    => 'Take assessment',
		'btn_url'     => 'https://zonesoflife.com',
	],
	[
		'active_zone' => 3,
		'title'       => 'Life & Skills Profile',
		'time_scope'  => '45 minutes · Online',
		'description' => 'Maps your emotional baseline across 24 human dynamics, pinpoints stress triggers, and reveals leadership bottlenecks.',
		'btn_text'    => 'Take assessment',
		'btn_url'     => 'https://zonesoflife.com',
	],
	[
		'active_zone' => 2,
		'title'       => 'Body Profile',
		'time_scope'  => '20 minutes · Online',
		'description' => 'Measures physical vitality, sleep recovery quality, and somatic tension indicators that drain your executive presence.',
		'btn_text'    => 'Take assessment',
		'btn_url'     => 'https://zonesoflife.com',
	],
];

$notice_title    = get_field('notice_title') ?: 'The assessment lives on its own site';
$notice_desc     = get_field('notice_desc') ?: 'You will complete your assessment on the dedicated Zones of Life engine and your results will be reviewed in your first ACLC session.';
$notice_btn_text = get_field('notice_btn_text') ?: 'Go to Zones of Life';
$notice_btn_url  = get_field('notice_btn_url') ?: 'https://zonesoflife.com';
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

		<!-- Profiles Cards -->
		<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
			<?php foreach ($profiles as $prof): 
				$z = (int) ($prof['active_zone'] ?? 2);
			?>
				<div class="card border border-aclc-line rounded-[10px] p-6 bg-white shadow-sm flex flex-col justify-between hover:border-aclc-navy transition-all">
					<div>
						<div class="zones flex gap-[3px] h-[6px] rounded-[3px] overflow-hidden mb-4">
							<i class="flex-1 block <?= $z >= 1 ? 'bg-aclc-red' : 'bg-aclc-red/20'; ?>"></i>
							<i class="flex-1 block <?= $z >= 2 ? 'bg-aclc-amber' : 'bg-aclc-amber/20'; ?>"></i>
							<i class="flex-1 block <?= $z >= 3 ? 'bg-aclc-green' : 'bg-aclc-green/20'; ?>"></i>
							<i class="flex-1 block <?= $z >= 4 ? 'bg-aclc-gold' : 'bg-aclc-gold/20'; ?>"></i>
						</div>

						<h4 class="font-display font-semibold text-xl text-aclc-ink mb-1"><?= esc_html($prof['title'] ?? ''); ?></h4>
						<div class="font-mono text-xs text-[#5A6875] mb-4"><?= esc_html($prof['time_scope'] ?? ''); ?></div>
						<p class="text-sm leading-relaxed text-[#4A5764] font-body mb-6"><?= esc_html($prof['description'] ?? ''); ?></p>
					</div>

					<a href="<?= esc_url($prof['btn_url'] ?? '#'); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-ghost w-full py-2.5 px-4 text-center border border-aclc-line text-aclc-ink rounded-lg text-xs font-semibold hover:border-aclc-navy transition-colors">
						<?= esc_html($prof['btn_text'] ?: 'Take assessment'); ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Notice Box -->
		<div class="card bg-slate-50 border border-aclc-line rounded-[10px] p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
			<div>
				<h3 class="font-display font-semibold text-lg text-aclc-navy mb-1"><?= esc_html($notice_title); ?></h3>
				<p class="text-sm text-[#4A5764] font-body max-w-xl"><?= esc_html($notice_desc); ?></p>
			</div>
			<?php if ($notice_btn_text && $notice_btn_url): ?>
				<a href="<?= esc_url($notice_btn_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary inline-flex items-center justify-center px-6 py-3 bg-aclc-navy text-white font-semibold text-sm rounded-lg hover:opacity-95 transition-transform hover:-translate-y-0.5 whitespace-nowrap self-start sm:self-auto">
					<?= esc_html($notice_btn_text); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
