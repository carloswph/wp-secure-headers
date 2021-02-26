<?php

namespace WPH\Security;
use Phpcsp\Security\ContentSecurityPolicyHeaderBuilder;

class Headers {

	protected $csp;

	protected $csp_result;

    public $toApply = [
    	'X-Frame-Options' => 'SAMEORIGIN',
    	'X-Content-Type-Options' => 'nosniff',
    	'X-XSS-Protection' => '1; mode=block',
    	'Referrer-Policy' => 'no-referrer-when-downgrade',
    	'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',
    	'Expect-CT' => '',
    ];

    public function __construct(ContentSecurityPolicyHeaderBuilder $csp = null) {

    	if (!file_exists(WP_CONTENT_DIR . '/security/')) {
			mkdir(WP_CONTENT_DIR . '/security/', 0777, true);
		}

		if($csp) {
			$this->csp = $csp;
			$this->setCsp();
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

    public function setCsp() {

		$this->csp->setReportUri($this->site);
		$this->csp_result = $this->csp->getHeaders(false);

		$this->set($this->csp_result[0]['name'], $this->csp_result[0]['value']);
    }

    public static function list() {

    	return $this->toApply;
    }
}

