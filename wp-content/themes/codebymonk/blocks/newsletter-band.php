<?php
/**
 * Block: Newsletter Band
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker    = get_field('kicker') ?: 'Free weekly';
$headline  = get_field('headline') ?: 'The Thought of the Week';
$desc      = get_field('description') ?: 'One practical distinction on power, leadership and living in the Green Zone. No promotions, no noise. Arrives every Monday morning.';
$btn_text  = get_field('btn_text') ?: 'Subscribe';
?>

<section <?= $block_attrs; ?>>
	<div class="wrap">
		<div class="newsband">
			<div class="split" style="align-items:center;gap:32px">
				<div>
					<div class="kicker">
						<svg class="ic" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-mail"/></svg>
						<?= esc_html($kicker); ?>
					</div>
					<h3 class="mt8"><?= esc_html($headline); ?></h3>
					<p class="sm mt8"><?= esc_html($desc); ?></p>
				</div>

				<div>
					<div class="newsForm">
						<div class="newsrow">
							<input class="input nMail" type="email" placeholder="you@domain.com" aria-label="Email address for Thought of the Week">
							<button type="button" class="btn btn-primary nGo"><?= esc_html($btn_text); ?></button>
						</div>
						<label class="check xs mt8">
							<input type="checkbox" class="nOk">
							<span>I agree to the <a href="#privacy" style="text-decoration:underline">Privacy policy</a>. Unsubscribe in one click.</span>
						</label>
					</div>

					<div class="newsDone center" hidden>
						<div class="iconbox green" style="margin:0 auto 12px">
							<svg class="ic" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-check"/></svg>
						</div>
						<h4>You are subscribed</h4>
						<p class="sm mt8 newsTxt">The Thought of the Week goes to your inbox every Monday.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
