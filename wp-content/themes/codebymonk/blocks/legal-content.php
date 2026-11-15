<?php
/**
 * Block: Legal Content
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-legal py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$is_cookie = (stripos(get_the_title(), 'cookie') !== false || stripos(get_field('page_title'), 'cookie') !== false);

$title        = get_field('page_title') ?: ($is_cookie ? 'Cookie policy' : 'Privacy policy');
$last_updated = get_field('last_updated') ?: 'Last updated: to be confirmed on publication.';
$lede         = get_field('lede') ?: ($is_cookie ? 'Cookies are small files stored on your device. We use four categories. You can change your choice at any time using the button at the end of this page.' : 'This page sets out how we handle your personal information and privacy rights.');

if ($is_cookie) {
	$sections = get_field('sections') ?: [
		[
			'heading' => 'Strictly necessary',
			'body'    => '<p>Session handling, security, remembering your cookie choice. The site cannot work without these. <span class="pill">Always on</span></p>',
		],
		[
			'heading' => 'Analytics',
			'body'    => '<p>Google Analytics 4, to understand which pages and programmes people actually use. Shared across our sites so we can see a whole journey. <span class="pill">Consent required</span></p>',
		],
		[
			'heading' => 'Marketing',
			'body'    => '<p>Advertising platforms, to measure which campaigns lead to enrolments. <span class="pill">Consent required</span></p>',
		],
		[
			'heading' => 'Functional',
			'body'    => '<p>Language preference and other convenience settings. <span class="pill">Consent required</span></p>',
		],
		[
			'heading' => 'Third parties',
			'body'    => '<p>A complete table of every cookie set, its provider, purpose and lifetime must be published here and kept current. Cookies set by embedded content and by the checkout process are included.</p>',
		],
		[
			'heading' => 'Changing your mind',
			'body'    => '<p>Your choice is stored and can be changed whenever you like.</p><button type="button" class="btn btn-ghost mt16" id="reopenCookies">Change cookie settings</button>',
		],
	];
} else {
	$sections = get_field('sections') ?: [
		[
			'heading' => 'Who we are',
			'body'    => '<p>Advanced Coaching &amp; Leadership Center, Inc., 1400 Camp Letoli Road, Saint Jo, Texas 76265, United States.</p>',
		],
		[
			'heading' => 'What we collect',
			'body'    => '<p>Information you give us directly when you register for programme information, subscribe to the Thought of the Week, contact us or enrol in a programme: name, email address, telephone number where you provide it, preferred language, and the programme interests you select.</p>',
		],
		[
			'heading' => 'Why we use it',
			'body'    => '<p>To send you the information you asked for; to deliver programmes you enrol in; to answer your enquiries; to measure how our sites are used so we can improve them; and, where you have consented, to send you the weekly newsletter. We do not sell personal data.</p>',
		],
		[
			'heading' => 'Assessment data',
			'body'    => '<p>Where you complete a Zones assessment, your answers and resulting profile are personal data. They are used to produce your result, to inform coaching if you enrol, and are not published or shared without your written consent.</p>',
		],
		[
			'heading' => 'Your rights',
			'body'    => '<p>Depending on where you live, you may have the right to access, correct, delete, restrict or port your data, to object to processing, and to withdraw consent at any time (GDPR, CCPA, and Mexico LFPDPPP).</p>',
		],
	];
}
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[800px] px-6">
		<header class="mb-10 pb-6 border-b border-aclc-line">
			<h1 class="font-display font-semibold text-3xl sm:text-4xl text-aclc-ink mb-2"><?= esc_html($title); ?></h1>
			<?php if ($last_updated): ?>
				<div class="font-mono text-xs text-[#5A6875] tracking-wider"><?= esc_html($last_updated); ?></div>
			<?php endif; ?>
			<?php if ($lede): ?>
				<p class="lede text-base text-[#4A5764] mt-4 leading-relaxed font-body"><?= esc_html($lede); ?></p>
			<?php endif; ?>
		</header>

		<div class="legal-body space-y-8">
			<?php foreach ($sections as $sec): ?>
				<div class="legal-section">
					<h3 class="font-display font-semibold text-xl text-aclc-ink mb-3"><?= esc_html($sec['heading'] ?? ''); ?></h3>
					<div class="prose max-w-none text-sm text-[#4A5764] leading-relaxed">
						<?= wp_kses_post($sec['body'] ?? ''); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

