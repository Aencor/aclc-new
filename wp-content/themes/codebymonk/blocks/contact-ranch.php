<?php
/**
 * Block: Contact Ranch
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-contact py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$headline     = get_field('headline') ?: 'Letoli Ranch';
$ranch_name   = get_field('ranch_name') ?: 'Advanced Coaching & Leadership Center';
$address      = get_field('address') ?: "Letoli Ranch\nSaint Jo, Texas 76265\nUnited States";
$phone        = get_field('phone') ?: '+1 (940) 995-2020';
$email        = get_field('email') ?: 'info@aclc.us';
$arrival_note = get_field('arrival_note') ?: 'Letoli Ranch is located approximately 90 minutes north of Dallas/Fort Worth International Airport (DFW). Private shuttle coordinates are sent upon course confirmation.';
$ranch_photo  = get_field('ranch_photo');
$photo_url    = !empty($ranch_photo['url']) ? $ranch_photo['url'] : get_template_directory_uri() . '/assets/img/backgrounds/letoli-ranch-sunrise.jpg';
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
			
			<!-- Contact Information -->
			<div>
				<div class="kicker font-mono text-xs uppercase tracking-widest text-aclc-fuego mb-2">Location &amp; Visit</div>
				<h1 class="font-display font-semibold text-3xl sm:text-4xl lg:text-[44px] text-aclc-ink mb-6"><?= esc_html($headline); ?></h1>

				<div class="card border border-aclc-line rounded-xl p-6 sm:p-8 bg-slate-50 mb-6 space-y-4">
					<div>
						<div class="font-semibold text-aclc-navy text-base mb-1"><?= esc_html($ranch_name); ?></div>
						<p class="text-sm text-[#4A5764] leading-relaxed whitespace-pre-line"><?= esc_html($address); ?></p>
					</div>

					<div class="pt-4 border-t border-aclc-line flex flex-wrap gap-6 text-sm">
						<?php if ($phone): ?>
							<div>
								<div class="font-mono text-[11px] text-[#5A6875] uppercase tracking-wider">Phone</div>
								<a href="tel:<?= esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="text-aclc-ink font-semibold hover:text-aclc-fuego transition-colors"><?= esc_html($phone); ?></a>
							</div>
						<?php endif; ?>

						<?php if ($email): ?>
							<div>
								<div class="font-mono text-[11px] text-[#5A6875] uppercase tracking-wider">Email</div>
								<a href="mailto:<?= esc_attr($email); ?>" class="text-aclc-ink font-semibold hover:text-aclc-fuego transition-colors"><?= esc_html($email); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<?php if ($arrival_note): ?>
					<div class="p-4 rounded-lg bg-aclc-navysoft/60 border border-transparent text-xs text-[#4A5764] leading-relaxed">
						<strong class="font-semibold text-aclc-navy block mb-1">Arrival Logistics:</strong>
						<?= esc_html($arrival_note); ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- Ranch Photo -->
			<div>
				<div class="rounded-xl overflow-hidden shadow-xl border border-aclc-line relative">
					<img src="<?= esc_url($photo_url); ?>" alt="<?= esc_attr($headline); ?>" class="w-full h-[400px] object-cover" />
					<div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 to-transparent p-6 text-white">
						<div class="font-mono text-xs text-aclc-gold uppercase tracking-wider">Saint Jo, Texas</div>
						<div class="font-display font-semibold text-lg">Peace, nature, and deep human transformation</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
