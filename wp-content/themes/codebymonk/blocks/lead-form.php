<?php
/**
 * Block: Lead Form
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

$kicker    = get_field('kicker') ?: 'Register for information';
$headline  = get_field('headline') ?: 'Get the details before you decide anything';
$lede      = get_field('lede') ?: 'We send you dates, format, what is covered and what it costs. No sales pitch, no follow-up calls unless you ask for one.';

$interest_choices = get_field('interest_choices') ?: [
	['label' => 'Vital Fundamentals'],
	['label' => 'Redefine Your Self-Worth'],
	['label' => 'Life Enhancement Course'],
	['label' => '1-on-1 Coaching'],
	['label' => 'Zones Profiles'],
];

$lang_choices = get_field('lang_choices') ?: [
	['language' => 'English'],
	['language' => 'Español'],
];

$call_label     = get_field('call_label') ?: 'I would also like to speak to a coach before deciding';
$privacy_label  = get_field('privacy_label') ?: 'I agree to the Privacy policy. We do not share your details with third parties.';
$submit_text    = get_field('submit_text') ?: 'Send me the information';
$success_title  = get_field('success_title') ?: 'Check your inbox';
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
			<div class="split top">
				<div>
					<div class="card pad-lg">
						<div id="regForm" class="stack">
							<div>
								<div class="tiny mb8">1. What are you interested in?</div>
								<div class="choices" id="rInterest">
									<?php foreach ($interest_choices as $ic): ?>
										<button type="button" class="choice" data-v="<?= esc_attr($ic['label']); ?>"><?= esc_html($ic['label']); ?></button>
									<?php endforeach; ?>
								</div>
							</div>

							<div class="mt16">
								<div class="tiny mb8">2. Language you prefer</div>
								<div class="hgroup" id="rLang">
									<?php foreach ($lang_choices as $idx => $lc): ?>
										<button type="button" class="btn btn-ghost btn-sm <?= $idx === 0 ? 'sel' : ''; ?>" data-l="<?= esc_attr($lc['language']); ?>"><?= esc_html($lc['language']); ?></button>
									<?php endforeach; ?>
								</div>
							</div>

							<div class="rule"></div>

							<div class="g2">
								<div>
									<label class="tiny" for="rName">First name *</label>
									<input class="input mt8" id="rName" placeholder="Jane" required>
								</div>
								<div>
									<label class="tiny" for="rLast">Last name</label>
									<input class="input mt8" id="rLast" placeholder="Doe">
								</div>
							</div>

							<div class="g2">
								<div>
									<label class="tiny" for="rMail">Email *</label>
									<input class="input mt8" id="rMail" type="email" placeholder="jane@company.com" required>
								</div>
								<div>
									<label class="tiny" for="rPhone">Phone (optional)</label>
									<input class="input mt8" id="rPhone" type="tel" placeholder="+1 555 000 0000">
								</div>
							</div>

							<div class="stack mt8">
								<label class="check sm">
									<input type="checkbox" id="rCall">
									<span><?= esc_html($call_label); ?></span>
								</label>
								<label class="check sm">
									<input type="checkbox" id="rOk" required>
									<span>I agree to the <a href="#privacy" style="text-decoration:underline">Privacy policy</a>. We do not share your details with third parties.</span>
								</label>
							</div>

							<button type="button" class="btn btn-primary btn-block mt16" id="rGo"><?= esc_html($submit_text); ?></button>
						</div>

						<div id="regDone" hidden class="center pad-lg">
							<div class="iconbox green" style="margin:0 auto 16px">
								<svg class="ic" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-check"/></svg>
							</div>
							<h3><?= esc_html($success_title); ?></h3>
							<p class="lede mt8" id="regTxt">We have sent the details to your email address.</p>
							<button type="button" class="btn btn-ghost btn-sm mt24" id="rReset">Register for something else</button>
						</div>
					</div>
				</div>

				<div>
					<div class="card pad-lg">
						<h4>Want to know where to start first?</h4>
						<p class="sm mt8">Take the two-minute Zones Profile. It shows you which Zone you are operating in right now and points to the programme that fits.</p>
						<a class="btn btn-go mt16" href="#profiles">Take the free profile</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
