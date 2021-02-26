<?php

namespace WPH\Security;

class Headers {

    public $toApply = [
    	'X-Frame-Options' => 'SAMEORIGIN',
    	'X-Content-Type-Options' => 'nosniff',
    	'X-XSS-Protection' => '1; mode=block',
    	'Referrer-Policy' => 'no-referrer-when-downgrade',
    	'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',
    	'Expect-CT' => '',
    ];

    public function __construct() {

    	if (!file_exists(WP_CONTENT_DIR . '/security/')) {
			mkdir(WP_CONTENT_DIR . '/security/', 0777, true);
		}
		
		$this->site = site_url('/wp-content/security/', 'https');
		$this->set('Expect-CT', 'max-age=0, report-uri=' . site_url("/wp-content/security/", "https"));

    	add_filter('wp_headers', array($this, 'add'), 10, 1);

    }

    protected function add($headers) {

    	foreach ($this->toApply as $key => $value) {
    		
    		$headers[$key] = $value;
    	}

    	return $headers;
    }

    public function set(string $header, string $value) {

    	$this->toApply[$header] = $value;
    }

    public static function list() {

    	return $this->toApply;
    }
}

