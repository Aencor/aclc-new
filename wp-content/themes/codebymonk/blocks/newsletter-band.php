<?php
/**
 * Block: Newsletter Band
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-newsletter py-12 bg-white border-t border-aclc-line');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker    = get_field('kicker') ?: 'Free weekly';
$headline  = get_field('headline') ?: 'The Thought of the Week';
$desc      = get_field('description') ?: 'A short, practical perspective on power, leadership, and emotional clarity from the ACLC coaching team. No promotions.';
$freq      = get_field('frequency_text') ?: 'Every Monday · 2 min read';
$btn_text  = get_field('btn_text') ?: 'Subscribe free';
$priv_note = get_field('privacy_note') ?: 'I accept the Privacy Policy';
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<div class="newsband bg-slate-50 border border-aclc-line rounded-xl p-6 sm:p-8">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
				<!-- Text -->
				<div>
					<div class="inline-flex items-center gap-1.5 font-mono text-xs uppercase tracking-wider text-aclc-fuego mb-1">
						<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-mail"/></svg>
						<?= esc_html($kicker); ?>
					</div>
					<h3 class="font-display font-semibold text-2xl text-aclc-ink mb-2"><?= esc_html($headline); ?></h3>
					<p class="text-sm text-[#4A5764] leading-relaxed mb-3"><?= esc_html($desc); ?></p>
					<span class="inline-block font-mono text-[11px] text-[#5A6875] bg-white border border-aclc-line px-2.5 py-1 rounded"><?= esc_html($freq); ?></span>
				</div>

				<!-- Form -->
				<div>
					<form class="newsForm space-y-3" onsubmit="event.preventDefault();">
						<div class="flex flex-col sm:flex-row gap-2">
							<input type="email" required placeholder="Enter your email" class="nMail flex-grow px-3.5 py-2.5 text-sm border border-aclc-line rounded-lg focus:outline-none focus:border-aclc-navy bg-white" />
							<button type="button" class="nGo btn btn-primary px-5 py-2.5 bg-aclc-fuego text-white rounded-lg text-xs font-semibold whitespace-nowrap hover:opacity-95 transition-opacity">
								<?= esc_html($btn_text); ?>
							</button>
						</div>

						<label class="flex items-center gap-2 cursor-pointer text-xs text-[#5A6875]">
							<input type="checkbox" required class="nOk rounded text-aclc-navy focus:ring-0" />
							<span><?= esc_html($priv_note); ?></span>
						</label>
					</form>

					<!-- Done State -->
					<div class="newsDone p-4 bg-emerald-50 border border-emerald-200 rounded-lg text-center" hidden>
						<div class="font-semibold text-sm text-emerald-800 mb-1">You are subscribed</div>
						<p class="newsTxt text-xs text-emerald-600">The Thought of the Week goes to your email every Monday.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
