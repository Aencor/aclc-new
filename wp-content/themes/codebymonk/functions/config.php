<?php
/**
 * Enable theme features
 */

// Limit revisions
function monk_revision_limit($num, $post) {
	return 5;
}
add_filter("wp_revisions_to_keep", "monk_revision_limit", 10, 2);

// Add Support for SVGs
function monk_mime_types($mimes) {
	$mimes["svg"] = "image/svg+xml";
	return $mimes;
}
add_filter("upload_mimes", "monk_mime_types");

// ACF PRO License Key
if (function_exists('acf_pro_update_license')) {
	acf_pro_update_license('b3JkZXJfaWQ9ODA5OTl8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE2LTA1LTA1IDE3OjE1OjE0');
}

