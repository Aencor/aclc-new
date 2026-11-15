<?php
/**
 * Block: Book Showcase
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-book-showcase py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker  = get_field('kicker') ?: 'The book';
$title   = get_field('title') ?: 'The Fire Within';
$author  = get_field('author') ?: 'By Alan C. Walter · The Essential Foundations of Human Power';
$lede    = get_field('lede') ?: 'The breakthrough work that introduces the Zones of Life, the laws of emotional processing, and how human beings recover their innate power and presence.';

$links = get_field('links') ?: [
	['label' => 'Buy on Knowledgism Bookstore', 'url' => 'https://knowledgism.com/bookstore'],
	['label' => 'Register for the Study Course', 'url' => '#register'],
];

$insights = get_field('insights') ?: [
	['title' => 'The Zones of Life Decoded', 'description' => 'The complete mechanical breakdown of how humans shift from unconscious reaction to conscious creation.'],
	['title' => 'The Anchor Points of Willpower', 'description' => 'Why traditional self-help fails and how to permanently clear the energetic charges beneath stress.'],
	['title' => 'The Architecture of Wealth', 'description' => 'How internal power directly determines financial abundance, relational harmony, and peace of mind.'],
];
?>

<section <?= $block_attrs; ?>>
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<div class="grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] gap-12 items-center">
			
			<!-- Content -->
			<div>
				<?php if ($kicker): ?>
					<div class="kicker font-mono text-xs uppercase tracking-widest text-aclc-fuego mb-2"><?= esc_html($kicker); ?></div>
				<?php endif; ?>

				<h1 class="font-display font-semibold text-3xl sm:text-4xl lg:text-[44px] text-aclc-ink mb-2"><?= esc_html($title); ?></h1>

				<?php if ($author): ?>
					<div class="font-mono text-xs text-aclc-navy uppercase tracking-wider mb-6"><?= esc_html($author); ?></div>
				<?php endif; ?>

				<?php if ($lede): ?>
					<p class="lede text-base sm:text-lg text-[#3D4A57] mb-8 leading-relaxed font-body"><?= esc_html($lede); ?></p>
				<?php endif; ?>

				<!-- Insights List -->
				<div class="space-y-4 mb-8">
					<?php foreach ($insights as $in): ?>
						<div class="p-4 rounded-lg bg-slate-50 border border-aclc-line">
							<strong class="font-semibold text-aclc-ink text-sm block mb-1"><?= esc_html($in['title'] ?? ''); ?></strong>
							<span class="text-xs text-[#5A6875] leading-relaxed block"><?= esc_html($in['description'] ?? ''); ?></span>
						</div>
					<?php endforeach; ?>
				</div>

				<!-- Links CTA -->
				<div class="flex flex-wrap gap-4">
					<?php foreach ($links as $idx => $l): ?>
						<a href="<?= esc_url($l['url'] ?? '#'); ?>" class="btn <?= $idx === 0 ? 'bg-aclc-fuego text-white' : 'border border-aclc-line text-aclc-ink hover:border-aclc-navy bg-white'; ?> px-6 py-3 rounded-lg text-sm font-semibold transition-colors">
							<?= esc_html($l['label'] ?? ''); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Book Cover Mockup Card -->
			<div class="flex justify-center">
				<div class="w-full max-w-sm rounded-xl p-8 bg-aclc-navy text-white text-center shadow-2xl border border-aclc-gold/40 relative overflow-hidden">
					<div class="absolute -top-10 -right-10 w-40 h-40 bg-aclc-gold/10 rounded-full blur-2xl"></div>
					<div class="font-mono text-xs text-aclc-gold uppercase tracking-widest mb-4">Official Publication</div>
					<h3 class="font-display font-semibold text-2xl mb-2 text-white"><?= esc_html($title); ?></h3>
					<div class="font-mono text-xs text-white/70 mb-8"><?= esc_html($author); ?></div>
					
					<div class="w-48 h-64 mx-auto bg-gradient-to-br from-aclc-fuego to-aclc-kn rounded shadow-inner flex flex-col justify-center items-center p-4 border border-white/20">
						<svg class="w-12 h-12 text-aclc-gold mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><use href="#i-book"/></svg>
						<span class="font-display text-sm font-bold text-white uppercase tracking-wider text-center"><?= esc_html($title); ?></span>
					</div>

					<div class="mt-6 font-mono text-xs text-white/60">Hardcover & Digital Available</div>
				</div>
			</div>

		</div>
	</div>
</section>
