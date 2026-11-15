<?php
/**
 * Block: Lead Form
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-lead-form py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker    = get_field('kicker') ?: 'Registration';
$headline  = get_field('headline') ?: 'Get the details before you decide anything';
$lede      = get_field('lede') ?: 'We send you dates, pricing, preparation requirements, and curriculum breakdown. No aggressive follow-up calls.';

$interest_choices = get_field('interest_choices') ?: [
	['label' => 'Vital Fundamentals'],
	['label' => 'Redefine Your Self-Worth'],
	['label' => 'Life Enhancement Course'],
	['label' => '1-on-1 Coaching'],
	['label' => 'Zones Profiles'],
];

$lang_choices = get_field('lang_choices') ?: [
	['language' => 'English'],
	['language' => 'Spanish'],
];

$call_label     = get_field('call_label') ?: 'I would like a coach to contact me to arrange an introductory call';
$privacy_label  = get_field('privacy_label') ?: 'I agree to the Privacy Policy and to receive programme information via email';
$submit_text    = get_field('submit_text') ?: 'Send me the information';
$success_title  = get_field('success_title') ?: 'Check your inbox';
$success_tmpl   = get_field('success_template') ?: 'We have sent the course details to your email address. You will receive complete dates, preparation guidance, and investment breakdown.';
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<div class="max-w-2xl mx-auto">
			<div class="mb-10 text-center">
				<?php if ($kicker): ?>
					<div class="kicker font-mono text-xs uppercase tracking-widest text-aclc-fuego mb-2"><?= esc_html($kicker); ?></div>
				<?php endif; ?>
				<h2 class="font-display font-semibold text-3xl sm:text-4xl text-aclc-ink mb-3"><?= esc_html($headline); ?></h2>
				<?php if ($lede): ?>
					<p class="lede text-base text-[#4A5764] font-body"><?= esc_html($lede); ?></p>
				<?php endif; ?>
			</div>

			<!-- Form Container -->
			<div class="card border border-aclc-line rounded-xl p-6 sm:p-10 bg-white shadow-lg">
				<form id="aclcRegForm" class="space-y-6">
					<!-- Step 1: Interest selection -->
					<div>
						<label class="font-mono text-xs uppercase tracking-wider text-[#5A6875] block mb-3">1. What are you interested in?</label>
						<div class="flex flex-wrap gap-2" id="interestGroup">
							<?php foreach ($interest_choices as $ic): ?>
								<button type="button" class="interest-btn font-mono text-xs px-3.5 py-2 rounded-lg border border-aclc-line text-[#4A5764] hover:border-aclc-navy transition-all" data-value="<?= esc_attr($ic['label']); ?>">
									<?= esc_html($ic['label']); ?>
								</button>
							<?php endforeach; ?>
						</div>
						<input type="hidden" name="selected_interest" id="hiddenInterest" value="" required />
					</div>

					<!-- Step 2: Language -->
					<div>
						<label class="font-mono text-xs uppercase tracking-wider text-[#5A6875] block mb-3">2. Preferred language for materials</label>
						<div class="flex gap-2" id="langGroup">
							<?php foreach ($lang_choices as $idx => $lc): ?>
								<button type="button" class="lang-btn font-mono text-xs px-4 py-1.5 rounded-lg border <?= $idx === 0 ? 'bg-aclc-navy text-white border-aclc-navy' : 'border-aclc-line text-[#4A5764]'; ?> transition-all" data-lang="<?= esc_attr($lc['language']); ?>">
									<?= esc_html($lc['language']); ?>
								</button>
							<?php endforeach; ?>
						</div>
						<input type="hidden" name="selected_lang" id="hiddenLang" value="English" />
					</div>

					<!-- Step 3: Contact Inputs -->
					<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
						<div>
							<label for="regFirstName" class="block text-xs font-semibold text-aclc-ink mb-1">First name *</label>
							<input type="text" id="regFirstName" name="first_name" required placeholder="Your first name" class="w-full px-3.5 py-2.5 text-sm border border-aclc-line rounded-lg focus:outline-none focus:border-aclc-navy" />
						</div>
						<div>
							<label for="regLastName" class="block text-xs font-semibold text-aclc-ink mb-1">Last name</label>
							<input type="text" id="regLastName" name="last_name" placeholder="Your last name" class="w-full px-3.5 py-2.5 text-sm border border-aclc-line rounded-lg focus:outline-none focus:border-aclc-navy" />
						</div>
					</div>

					<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
						<div>
							<label for="regEmail" class="block text-xs font-semibold text-aclc-ink mb-1">Email address *</label>
							<input type="email" id="regEmail" name="email" required placeholder="you@domain.com" class="w-full px-3.5 py-2.5 text-sm border border-aclc-line rounded-lg focus:outline-none focus:border-aclc-navy" />
						</div>
						<div>
							<label for="regPhone" class="block text-xs font-semibold text-aclc-ink mb-1">Phone number (optional)</label>
							<input type="tel" id="regPhone" name="phone" placeholder="+1 ..." class="w-full px-3.5 py-2.5 text-sm border border-aclc-line rounded-lg focus:outline-none focus:border-aclc-navy" />
						</div>
					</div>

					<!-- Checkboxes -->
					<div class="space-y-3 pt-2 text-xs text-[#4A5764]">
						<label class="flex items-start gap-2.5 cursor-pointer">
							<input type="checkbox" id="regCall" name="wants_call" class="mt-0.5 rounded text-aclc-navy focus:ring-0" />
							<span><?= esc_html($call_label); ?></span>
						</label>

						<label class="flex items-start gap-2.5 cursor-pointer">
							<input type="checkbox" id="regPrivacy" name="agree_privacy" required class="mt-0.5 rounded text-aclc-navy focus:ring-0" />
							<span><?= esc_html($privacy_label); ?></span>
						</label>
					</div>

					<button type="submit" id="regSubmitBtn" class="btn btn-primary w-full py-3.5 bg-aclc-fuego text-white rounded-lg font-semibold text-sm hover:opacity-95 transition-opacity shadow-md">
						<?= esc_html($submit_text); ?>
					</button>
				</form>

				<!-- Success State -->
				<div id="aclcRegDone" class="text-center py-8" hidden>
					<div class="w-16 h-16 rounded-full bg-emerald-100 text-aclc-green flex items-center justify-center mx-auto mb-4">
						<svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><use href="#i-check"/></svg>
					</div>
					<h3 class="font-display font-semibold text-2xl text-aclc-ink mb-2"><?= esc_html($success_title); ?></h3>
					<p id="aclcRegSuccessMsg" class="text-sm text-[#4A5764] leading-relaxed max-w-md mx-auto mb-6"><?= esc_html($success_tmpl); ?></p>
					<button type="button" id="aclcRegResetBtn" class="text-xs font-mono text-aclc-navy underline hover:text-aclc-fuego">Submit another request</button>
				</div>
			</div>
		</div>
	</div>
</section>
