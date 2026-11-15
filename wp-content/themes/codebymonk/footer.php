</main><!-- #main-content -->

<?php
$req_uri = $_SERVER['REQUEST_URI'] ?? '';
$is_es = (strpos($req_uri, '/es/') !== false || $req_uri === '/es' || (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'es'));
?>

<footer class="site"><div class="wrap">
 <div class="footgrid">
  <div>
   <div class="wordmark" style="font-size:12px">ACLC</div>
   <p class="xs mt16" style="color:rgba(255,255,255,.6);max-width:30ch">
     <?= $is_es ? 'Coaching integral de la persona desde 2001. Letoli Ranch, Saint Jo, Texas.' : 'Whole-person coaching since 2001. Letoli Ranch, Saint Jo, Texas.'; ?>
   </p>
   <h4 class="mt24"><?= $is_es ? 'Síguenos' : 'Follow'; ?></h4>
   <div class="social">
    <a href="https://facebook.com/aclc.us" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><svg class="ic " width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-fb"/></svg></a>
    <a href="<?= esc_url($is_es ? home_url('/es/contacto/') : home_url('/contact/')); ?>" class="tbd" aria-label="Instagram"><svg class="ic " width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-ig"/></svg></a>
    <a href="<?= esc_url($is_es ? home_url('/es/contacto/') : home_url('/contact/')); ?>" class="tbd" aria-label="LinkedIn"><svg class="ic " width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-in"/></svg></a>
    <a href="<?= esc_url($is_es ? home_url('/es/contacto/') : home_url('/contact/')); ?>" class="tbd" aria-label="YouTube"><svg class="ic " width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><use href="#i-yt"/></svg></a>
   </div>
  </div>
  <div><h4><?= $is_es ? 'Programas' : 'Programmes'; ?></h4>
   <a href="<?= esc_url(home_url('/calendar/')); ?>"><?= $is_es ? 'Próximos cursos' : 'Upcoming courses'; ?></a>
   <a href="<?= esc_url(home_url('/vital-fundamentals/')); ?>">Vital Fundamentals</a>
   <a href="<?= esc_url($is_es ? home_url('/es/programas/') : home_url('/programs/')); ?>"><?= $is_es ? 'Curso de Potenciación' : 'Life Enhancement Course'; ?></a>
   <a href="<?= esc_url($is_es ? home_url('/es/programas/') : home_url('/programs/')); ?>"><?= $is_es ? 'Cursos a tu ritmo' : 'Self-paced courses'; ?></a>
  </div>
  <div><h4>Coaching</h4>
   <a href="<?= esc_url($is_es ? home_url('/es/coaching/') : home_url('/coaching/')); ?>"><?= $is_es ? 'Coaching 1-a-1' : '1-on-1 Coaching'; ?></a>
   <a href="<?= esc_url($is_es ? home_url('/es/coaching/') : home_url('/coaching/')); ?>"><?= $is_es ? 'Ruta de Coach de Clase Mundial' : 'World Class Coach path'; ?></a>
   <a href="<?= esc_url($is_es ? home_url('/es/registro/') : home_url('/register/')); ?>"><?= $is_es ? 'Registro de información' : 'Register for information'; ?></a>
  </div>
  <div><h4><?= $is_es ? 'Aprender' : 'Learn'; ?></h4>
   <a href="<?= esc_url(home_url('/clients/')); ?>"><?= $is_es ? 'Testimonios de clientes' : 'What our clients say'; ?></a>
   <a href="<?= esc_url($is_es ? home_url('/es/lectura/') : home_url('/reading/')); ?>"><?= $is_es ? 'Lecturas recomendadas' : 'Recommended reading'; ?></a>
   <a href="<?= esc_url(home_url('/the-fire-within/')); ?>">The Fire Within</a>
   <a href="<?= esc_url($is_es ? home_url('/es/perfiles/') : home_url('/profiles/')); ?>"><?= $is_es ? 'Perfiles de Zonas' : 'Zones Profiles'; ?></a>
   <a href="<?= esc_url($is_es ? home_url('/es/coaches/') : home_url('/coaches/')); ?>"><?= $is_es ? 'Nuestros coaches' : 'Our coaches'; ?></a>
  </div>
  <div><h4><?= $is_es ? 'Compañía' : 'Company'; ?></h4>
   <a href="<?= esc_url($is_es ? home_url('/es/contacto/') : home_url('/contact/')); ?>"><?= $is_es ? 'Contacto' : 'Contact'; ?></a>
   <a href="<?= esc_url(home_url('/privacy-policy/')); ?>"><?= $is_es ? 'Política de privacidad' : 'Privacy policy'; ?></a>
   <a href="<?= esc_url(home_url('/cookie-policy/')); ?>"><?= $is_es ? 'Política de cookies' : 'Cookie policy'; ?></a>
  </div>
 </div>
 <div class="legal"><span>© <?= date('Y'); ?> Advanced Coaching &amp; Leadership Center, Inc.</span>
  <span>1400 Camp Letoli Road, Saint Jo, Texas 76265 · <span class="mono">+1 940-995-3187</span></span></div>
</div></footer>

<div class="cookiebar" id="cookieBar" hidden><div class="wrap cookieinner">
 <p class="xs" style="max-width:68ch">
   <?= $is_es ? 'Usamos cookies para recordar preferencias, mantener tu sesión iniciada y entender cómo se usa el sitio. Sin rastreo publicitario de terceros.' : 'We use cookies to remember preferences, keep you signed in, and see where people get stuck. No third-party ad tracking.'; ?>
 </p>
 <div class="hgroup">
   <button class="btn btn-ghost btn-sm" id="ckReject"><?= $is_es ? 'Solo esenciales' : 'Essential only'; ?></button>
   <button class="btn btn-primary btn-sm" id="ckAccept"><?= $is_es ? 'Aceptar todas' : 'Accept all'; ?></button>
 </div>
</div></div>

<?php wp_footer(); ?>
</body>
</html>
