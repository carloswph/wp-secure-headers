<?php

namespace WPH\Security;

class Headers {

    public $toApply = [
    	'X-Frame-Options' => 'SAMEORIGIN',
    	'X-Content-Type-Options' => 'nosniff',
    	'X-XSS-Protection' => '1; mode=block',
    	'Referrer-Policy' => 'no-referrer-when-downgrade',
    	'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',

    ];

    public function __construct() {

    	if (!empty($_SERVER['HTTPS'])) {
    		add_filter('wp_headers', array($this, 'add'));
    	}

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

