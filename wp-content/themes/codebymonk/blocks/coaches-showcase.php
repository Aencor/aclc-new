<?php
/**
 * Block: Coaches Showcase
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-coaches py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker    = get_field('kicker') ?: 'The team';
$headline  = get_field('headline') ?: 'Who you will be working with';
$lede      = get_field('lede') ?: '';
$view_text = get_field('view_all_text') ?: 'Meet all coaches';
$view_url  = get_field('view_all_url') ?: '#coaches';

// Obtener coaches vía relación ACF o query directa del CPT `coach`
$selected_coaches = get_field('coaches_selection');
if (empty($selected_coaches)) {
	$coaches_query = new WP_Query([
		'post_type'      => 'coach',
		'posts_per_page' => 3,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	]);
	$coaches = $coaches_query->posts;
} else {
	$coaches = $selected_coaches;
}
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10">
			<div>
				<?php if ($kicker): ?>
					<div class="kicker font-mono text-xs uppercase tracking-widest text-aclc-fuego mb-2">
						<?= esc_html($kicker); ?>
					</div>
				<?php endif; ?>
				<h2 class="font-display font-semibold text-2xl sm:text-3xl lg:text-[35px] text-aclc-ink">
					<?= esc_html($headline); ?>
				</h2>
				<?php if ($lede): ?>
					<p class="lede text-base text-[#4A5764] mt-2 max-w-2xl font-body"><?= esc_html($lede); ?></p>
				<?php endif; ?>
			</div>

			<?php if ($view_text && $view_url): ?>
				<a href="<?= esc_url($view_url); ?>" class="btn btn-ghost inline-flex items-center gap-2 px-5 py-2.5 border border-aclc-line bg-white text-aclc-ink rounded-lg text-sm font-semibold hover:border-aclc-navy transition-colors whitespace-nowrap self-start sm:self-auto">
					<?= esc_html($view_text); ?>
					<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><use href="#i-arrow"/></svg>
				</a>
			<?php endif; ?>
		</div>

		<!-- Coaches Grid -->
		<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
			<?php if (!empty($coaches)): foreach ($coaches as $coach): 
				$cid   = is_object($coach) ? $coach->ID : $coach;
				$cname = get_the_title($cid);
				$role  = get_field('role_title', $cid);
				$bio   = get_field('bio_lead', $cid);
				$photo = get_field('photo', $cid);
				$purl  = !empty($photo['url']) ? $photo['url'] : '';
			?>
				<div class="card border border-aclc-line rounded-[10px] p-6 bg-white hover:border-aclc-navy transition-all shadow-sm hover:-translate-y-1">
					<div class="flex items-center gap-4 mb-4">
						<?php if ($purl): ?>
							<img src="<?= esc_url($purl); ?>" alt="<?= esc_attr($cname); ?>" class="w-16 h-16 rounded-full object-cover border-2 border-aclc-gold" />
						<?php else: ?>
							<div class="w-16 h-16 rounded-full bg-aclc-navysoft flex items-center justify-center text-aclc-navy">
								<svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-users"/></svg>
							</div>
						<?php endif; ?>

						<div>
							<h4 class="font-display font-semibold text-lg text-aclc-ink"><?= esc_html($cname); ?></h4>
							<?php if ($role): ?>
								<div class="font-mono text-xs uppercase text-aclc-fuego tracking-wider mt-0.5"><?= esc_html($role); ?></div>
							<?php endif; ?>
						</div>
					</div>

					<?php if ($bio): ?>
						<p class="text-sm leading-relaxed text-[#4A5764] font-body line-clamp-4"><?= esc_html($bio); ?></p>
					<?php endif; ?>
				</div>
			<?php endforeach; else: ?>
				<!-- Fallbacks if no CPT entries yet -->
				<div class="card border border-aclc-line rounded-[10px] p-6 bg-white">
					<h4 class="font-display font-semibold text-lg text-aclc-ink">Ceil Stanford</h4>
					<div class="font-mono text-xs text-aclc-fuego uppercase tracking-wider mt-1 mb-3">President</div>
					<p class="text-sm text-[#4A5764]">Mindset and leadership coach to elite entrepreneurs, executives and spiritual seekers.</p>
				</div>
				<div class="card border border-aclc-line rounded-[10px] p-6 bg-white">
					<h4 class="font-display font-semibold text-lg text-aclc-ink">Jeff Crippen</h4>
					<div class="font-mono text-xs text-aclc-fuego uppercase tracking-wider mt-1 mb-3">CEO & Director of Coaching</div>
					<p class="text-sm text-[#4A5764]">International speaker, Chiropractor and Author of Timeless You. Pioneer in human potential.</p>
				</div>
				<div class="card border border-aclc-line rounded-[10px] p-6 bg-white">
					<h4 class="font-display font-semibold text-lg text-aclc-ink">Raul Rivera</h4>
					<div class="font-mono text-xs text-aclc-fuego uppercase tracking-wider mt-1 mb-3">Master Coach & Speaker</div>
					<p class="text-sm text-[#4A5764]">Coaching worldwide in English and Spanish. Specialist in family business transformations.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
