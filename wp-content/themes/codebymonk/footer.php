</main><!-- #main-content -->

<footer class="site bg-aclc-kn text-white pt-16 pb-12 border-t border-white/10 mt-16">
	<div class="wrap mx-auto max-w-[1160px] px-6">
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">
			
			<!-- Brand col -->
			<div class="lg:col-span-1">
				<div class="font-mono font-bold text-sm tracking-widest text-white uppercase mb-3">ACLC</div>
				<p class="text-xs text-white/60 leading-relaxed max-w-[28ch] mb-6">Whole-person coaching since 2001. Letoli Ranch, Saint Jo, Texas.</p>
				
				<h4 class="font-display text-sm font-semibold text-white mb-3">Follow</h4>
				<div class="flex items-center gap-3 text-white/70">
					<a href="https://facebook.com/aclc.us" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors" aria-label="Facebook">
						<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-fb"/></svg>
					</a>
					<a href="#contact" class="hover:text-white transition-colors" aria-label="Instagram">
						<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-ig"/></svg>
					</a>
					<a href="#contact" class="hover:text-white transition-colors" aria-label="LinkedIn">
						<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-in"/></svg>
					</a>
					<a href="#contact" class="hover:text-white transition-colors" aria-label="YouTube">
						<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><use href="#i-yt"/></svg>
					</a>
				</div>
			</div>

			<!-- Col 2: Programmes -->
			<div>
				<h4 class="font-display font-semibold text-sm text-white mb-4">Programmes</h4>
				<ul class="space-y-2.5 text-xs text-white/70">
					<li><a href="<?= esc_url(home_url('/#calendar')); ?>" class="hover:text-white transition-colors">Upcoming courses</a></li>
					<li><a href="<?= esc_url(home_url('/#program')); ?>" class="hover:text-white transition-colors">Vital Fundamentals</a></li>
					<li><a href="<?= esc_url(home_url('/#programs')); ?>" class="hover:text-white transition-colors">Life Enhancement Course</a></li>
					<li><a href="<?= esc_url(home_url('/#programs')); ?>" class="hover:text-white transition-colors">Self-paced courses</a></li>
				</ul>
			</div>

			<!-- Col 3: Coaching -->
			<div>
				<h4 class="font-display font-semibold text-sm text-white mb-4">Coaching</h4>
				<ul class="space-y-2.5 text-xs text-white/70">
					<li><a href="<?= esc_url(home_url('/#coaching')); ?>" class="hover:text-white transition-colors">1-on-1 Coaching</a></li>
					<li><a href="<?= esc_url(home_url('/#coaching')); ?>" class="hover:text-white transition-colors">World Class Coach path</a></li>
					<li><a href="<?= esc_url(home_url('/#register')); ?>" class="hover:text-white transition-colors">Register for information</a></li>
				</ul>
			</div>

			<!-- Col 4: Learn -->
			<div>
				<h4 class="font-display font-semibold text-sm text-white mb-4">Learn</h4>
				<ul class="space-y-2.5 text-xs text-white/70">
					<li><a href="<?= esc_url(home_url('/#clients')); ?>" class="hover:text-white transition-colors">What our clients say</a></li>
					<li><a href="<?= esc_url(home_url('/#reading')); ?>" class="hover:text-white transition-colors">Recommended reading</a></li>
					<li><a href="<?= esc_url(home_url('/#book')); ?>" class="hover:text-white transition-colors">The Fire Within</a></li>
					<li><a href="<?= esc_url(home_url('/#profiles')); ?>" class="hover:text-white transition-colors">Zones Profiles</a></li>
					<li><a href="<?= esc_url(home_url('/#coaches')); ?>" class="hover:text-white transition-colors">Our coaches</a></li>
				</ul>
			</div>

			<!-- Col 5: Company -->
			<div>
				<h4 class="font-display font-semibold text-sm text-white mb-4">Company</h4>
				<ul class="space-y-2.5 text-xs text-white/70">
					<li><a href="<?= esc_url(home_url('/#contact')); ?>" class="hover:text-white transition-colors">Contact</a></li>
					<li><a href="<?= esc_url(home_url('/#privacy')); ?>" class="hover:text-white transition-colors">Privacy policy</a></li>
					<li><a href="<?= esc_url(home_url('/#cookies')); ?>" class="hover:text-white transition-colors">Cookie policy</a></li>
					<li><a href="<?= esc_url(home_url('/#privacy')); ?>" class="hover:text-white transition-colors">Terms of service</a></li>
				</ul>
			</div>

		</div>

		<!-- Legal Bottom Bar -->
		<div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-white/50">
			<span>© <?= date('Y'); ?> Advanced Coaching &amp; Leadership Center, Inc.</span>
			<span>1400 Camp Letoli Road, Saint Jo, Texas 76265 · <span class="font-mono text-white/70">+1 940-995-3187</span></span>
		</div>
	</div>
</footer>

<!-- Cookie Banner -->
<div id="cookieBar" class="cookiebar fixed bottom-0 inset-x-0 z-50 bg-aclc-kn text-white py-4 border-t-2 border-aclc-gold shadow-2xl" hidden>
	<div class="wrap mx-auto max-w-[1160px] px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
		<p class="text-xs text-white/80 max-w-2xl">
			We use cookies to analyze site traffic, personalize content, and preserve your language preferences. See our <a href="<?= esc_url(home_url('/#cookies')); ?>" class="underline text-white font-semibold">Cookie policy</a> for details.
		</p>
		<div class="flex items-center gap-2 flex-none">
			<button id="ckReject" class="px-3 py-1.5 border border-white/30 rounded text-xs text-white/80 hover:text-white hover:border-white transition-colors">Reject non-essential</button>
			<button id="ckAccept" class="px-4 py-1.5 bg-aclc-gold text-aclc-kn font-semibold rounded text-xs hover:bg-aclc-gold/90 transition-colors">Accept all</button>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
