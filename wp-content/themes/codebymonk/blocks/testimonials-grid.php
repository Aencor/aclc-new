<?php
/**
 * Block: Testimonials Grid
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

$kicker    = get_field('kicker') ?: 'Clients & stories';
$headline  = get_field('headline') ?: 'Fifteen years of people who kept coming back';
$lede      = get_field('lede') ?: 'Entrepreneurs, executives and practitioners. Most arrived with successful businesses and a nagging sense of running out of road.';

$cs_title  = get_field('cs_title') ?: 'Jeff Crippen, Robert Kiyosaki and Ceil Stanford';
$cs_quote  = get_field('cs_quote') ?: '“ACLC is where the real work happens. If you want to know why most people are stuck, Alan Walter figured out the technology that frees them. Ceil and Jeff deliver it like no one else.”';
$cs_author = get_field('cs_author') ?: 'Robert Kiyosaki';
$cs_role   = get_field('cs_role') ?: 'Author of Rich Dad Poor Dad · Entrepreneur & Investor';
$cs_image  = get_field('cs_image');
$cs_url    = !empty($cs_image['url']) ? $cs_image['url'] : get_template_directory_uri() . '/assets/img/photos/jeff-robert-ceil.jpg';

$r_url = get_template_directory_uri() . '/assets/img/photos/robert-kiyosaki.jpg';
$k_url = get_template_directory_uri() . '/assets/img/photos/kim-kiyosaki.jpg';

$metrics = get_field('metrics') ?: [
	['number' => '+2.4x', 'label' => 'Revenue within 18 months', 'detail' => 'Average across 34 businesses whose leaders completed Vital Fundamentals and one year of follow-up.'],
	['number' => '91%', 'label' => 'Fewer critical decisions stalled', 'detail' => 'Self-reported by executives tracking decisions that previously sat unresolved for more than 30 days.'],
	['number' => '84%', 'label' => 'Stay in Green Zone', 'detail' => 'Measured by reassessment at six and twelve months. Structure, not willpower, holds the shift.'],
];

$quotes = get_field('quotes') ?: [
	[
		'name'   => 'Rita Khagram',
		'role'   => 'Founder & CEO · Professional services',
		'metric' => 'Vital Fundamentals',
		'quote'  => 'I had built a 40-person firm, but I was exhausted. I thought I needed a better CEO. What I needed was to clear the charges that made every meeting feel like a courtroom. Three years later the firm is three times larger and I take Fridays off.',
	],
	[
		'name'   => 'David Pritchett',
		'role'   => 'Executive Director · Financial services',
		'metric' => '1-on-1 Coaching',
		'quote'  => 'Standard executive coaching gives you accountability and frameworks. Processing at ACLC removes the actual emotional charge behind your worst decisions. Nothing else works at that level.',
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
		'metric' => 'Vital Fundamentals',
		'quote'  => 'The 8 days at Letoli Ranch reset my entire internal operating system. There is no other environment like it on earth.',
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
				<p class="lede mt16" style="max-width:64ch"><?= esc_html($lede); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<div class="block">
		<div class="wrap">
			<div class="card pad-lg mb32" style="border-color:var(--gold);border-width:2px">
				<div class="split" style="align-items:center;gap:32px">
					<img style="border-radius:var(--r);width:100%;max-width:440px" alt="<?= esc_attr($cs_title); ?>" src="<?= esc_url($cs_url); ?>">
					<div>
						<div class="kicker">Case · 15+ years of work</div>
						<h3 class="mt8"><?= esc_html($cs_title); ?></h3>
						<p class="lede mt16"><?= esc_html($cs_quote); ?></p>
						
						<div class="hgroup mt24" style="gap:12px;align-items:center">
							<img style="width:48px;height:48px;border-radius:50%;object-fit:cover" alt="<?= esc_attr($cs_author); ?>" src="<?= esc_url($r_url); ?>">
							<div>
								<div style="font-weight:700"><?= esc_html($cs_author); ?></div>
								<div class="xs"><?= esc_html($cs_role); ?></div>
							</div>
						</div>

						<div class="rule"></div>

						<div class="hgroup" style="gap:12px;align-items:center">
							<img style="width:48px;height:48px;border-radius:50%;object-fit:cover" alt="Kim Kiyosaki" src="<?= esc_url($k_url); ?>">
							<div>
								<div style="font-weight:700">Kim Kiyosaki</div>
								<div class="xs">Author of Rich Woman · Entrepreneur</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<h2 class="mb24">Results people reported</h2>
			<div class="g3 mb32">
				<?php foreach ($metrics as $idx => $m): 
					$color = $idx === 0 ? 'var(--brand)' : ($idx === 1 ? 'var(--green)' : 'var(--fuego)');
				?>
					<div class="card">
						<div class="price" style="font-size:32px;color:<?= esc_attr($color); ?>"><?= esc_html($m['number'] ?? ''); ?></div>
						<h4 class="mt8"><?= esc_html($m['label'] ?? ''); ?></h4>
						<p class="sm mt8"><?= esc_html($m['detail'] ?? ''); ?></p>
					</div>
				<?php endforeach; ?>
			</div>

			<h2 class="mb24">In their own words</h2>
			<div class="g2">
				<?php foreach ($quotes as $q): ?>
					<div class="card">
						<p class="lede">“<?= esc_html($q['quote'] ?? ''); ?>”</p>
						<div class="rule"></div>
						<div class="hgroup" style="justify-content:space-between;flex-wrap:wrap">
							<div>
								<h4><?= esc_html($q['name'] ?? ''); ?></h4>
								<div class="xs mt8"><?= esc_html($q['role'] ?? ''); ?></div>
							</div>
							<?php if (!empty($q['metric'])): ?>
								<span class="chip"><?= esc_html($q['metric']); ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
