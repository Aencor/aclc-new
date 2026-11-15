<?php
/**
 * Block: Reading List
 *
 * @var array $block
 */
$block_attrs = cbm_block_attributes($block, 'block-reading-list py-16 bg-white');

if (!empty($block['data']['is_preview'])) {
	$preview = $block['data']['preview_image'] ?? null;
	if ($preview) {
		echo '<div class="block-preview-wrapper p-2 bg-slate-100 rounded-lg text-center"><img src="' . esc_url($preview) . '" alt="Preview" class="max-w-full h-auto mx-auto shadow-sm rounded" /></div>';
		return;
	}
}

$kicker   = get_field('kicker') ?: 'Recommended reading';
$headline = get_field('headline') ?: 'Where to start reading, and in what order';
$lede     = get_field('lede') ?: 'The written work is published by Knowledgism. Coaching applies it; these books explain it. Each one is matched to the Zone it is written for.';

$books = get_field('books') ?: [
	[
		'active_zone' => 1,
		'badge'       => 'Start here · Red and Amber',
		'title'       => 'The Secrets To Increasing Your Power, Wealth and Happiness',
		'description' => 'The entry point. The book the free chapter is taken from, and the one most people should read first.',
		'price'       => '$9.99 – $19.95',
		'link'        => 'https://knowledgism.com/bookstore',
	],
	[
		'active_zone' => 2,
		'badge'       => 'Next · Amber',
		'title'       => 'The Clean Slate Series',
		'description' => 'Clearing what is in the way before adding anything new. Pairs with the processing work in one-to-one coaching.',
		'price'       => '$47.00',
		'link'        => 'https://knowledgism.com/bookstore',
	],
	[
		'active_zone' => 3,
		'badge'       => 'Method · Amber and Green',
		'title'       => 'Introduction to Processing',
		'description' => 'A complete introduction to the mechanics of clearing emotional charges and regaining sovereignty.',
		'price'       => '$29.95',
		'link'        => 'https://knowledgism.com/bookstore',
	],
	[
		'active_zone' => 2,
		'badge'       => 'Reference · All Zones',
		'title'       => 'Knowledgism Dictionary',
		'description' => 'Precise definitions for the 500+ specialized terms used in Alan C. Walter’s technology of human potential.',
		'price'       => '$34.95',
		'link'        => 'https://knowledgism.com/bookstore',
	],
	[
		'active_zone' => 3,
		'badge'       => 'Mastery · Green Zone',
		'title'       => 'The Fire Within',
		'description' => 'The foundational text on the Zones of Life and how human beings recover their innate power.',
		'price'       => '$24.95',
		'link'        => home_url('/the-fire-within/'),
	],
];
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

		<!-- Books Grid -->
		<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
			<?php foreach ($books as $b): 
				$z = (int) ($b['active_zone'] ?? 1);
			?>
				<div class="card border border-aclc-line rounded-[10px] p-6 bg-white shadow-sm flex flex-col justify-between hover:border-aclc-navy transition-all">
					<div>
						<div class="zones flex gap-[3px] h-[6px] rounded-[3px] overflow-hidden mb-3">
							<i class="flex-1 block <?= $z >= 1 ? 'bg-aclc-red' : 'bg-aclc-red/20'; ?>"></i>
							<i class="flex-1 block <?= $z >= 2 ? 'bg-aclc-amber' : 'bg-aclc-amber/20'; ?>"></i>
							<i class="flex-1 block <?= $z >= 3 ? 'bg-aclc-green' : 'bg-aclc-green/20'; ?>"></i>
							<i class="flex-1 block <?= $z >= 4 ? 'bg-aclc-gold' : 'bg-aclc-gold/20'; ?>"></i>
						</div>

						<div class="font-mono text-xs text-[#5A6875] mb-2"><?= esc_html($b['badge'] ?? ''); ?></div>
						<h4 class="font-display font-semibold text-lg text-aclc-ink mb-2"><?= esc_html($b['title'] ?? ''); ?></h4>
						<p class="text-sm leading-relaxed text-[#4A5764] font-body mb-6"><?= esc_html($b['description'] ?? ''); ?></p>
					</div>

					<div class="flex items-center justify-between border-t border-aclc-line pt-4">
						<span class="font-mono font-bold text-sm text-aclc-ink"><?= esc_html($b['price'] ?? ''); ?></span>
						<a href="<?= esc_url($b['link'] ?? '#'); ?>" <?= strpos($b['link'], 'knowledgism') !== false ? 'target="_blank" rel="noopener"' : ''; ?> class="btn btn-ghost px-3.5 py-1.5 border border-aclc-line rounded-lg text-xs font-semibold hover:border-aclc-navy text-aclc-ink transition-colors">
							<?= strpos($b['link'], 'knowledgism') !== false ? 'Buy on Knowledgism' : 'View book'; ?>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

