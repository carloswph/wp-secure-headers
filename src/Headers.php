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

    public $report_uri;

    public function __construct(ContentSecurityPolicy $csp = null) {

    	if (!file_exists(WP_CONTENT_DIR . '/security/')) {
			mkdir(WP_CONTENT_DIR . '/security/', 0777, true);
		}

		$this->report_uri = site_url('/wp-content/security/', 'https');
		$this->set('Expect-CT', 'max-age=0, report-uri=' . $this->report_uri);

        if($csp) {
            if($csp->reportOnly === true) {
                $this->set('Content-Security-Policy-Report-Only', $csp->get());
            } else {
                $this->set('Content-Security-Policy', $csp->get());
            }
        }

    	add_action('send_headers', array($this, 'add'));

    }

    public function add() {

    	foreach ($this->toApply as $key => $value) {
    		
    		header($key . ': ' . $value);
    	}

    }

    public function set(string $header, string $value) {

    	$this->toApply[$header] = $value;
    }

    public static function list() {

    	return $this->toApply;
    }
}

