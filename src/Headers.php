<?php

namespace WPH\Security;
/**
 * Applies default HTTPS headers to WP websites and allows further config.
 * Accepts additional class injections to handle complex headers and cookies.
 *
 * @since  1.0.0
 * @uses  WPH\Security\ContentSecurityPolicy
 * @author  WP Helpers | Carlos Matos
 */
class Headers {

    /**
     * Preconfigured headers.
     * @var  $toApply  array  Array of preconfigured HTTPs headers.
     */
    public $toApply = [
    	'X-Frame-Options' => 'SAMEORIGIN',
    	'X-Content-Type-Options' => 'nosniff',
    	'X-XSS-Protection' => '1; mode=block',
    	'Referrer-Policy' => 'no-referrer-when-downgrade',
    	'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',
    	'Expect-CT' => '',
    ];
    /**
     * Report log location URI.
     * @var  $report_uri  string  URL to report file.
     */
    public $report_uri;

    /**
     * Class constructor.
     *
     * @since  1.0.0
     * @author  WP Helpers | Carlos Matos
     *
     * @param  $csp  object  COntentSecurityPolicy instance.
     * @return  void()
     *
     */
    public function __construct(\WPH\Security\ContentSecurityPolicy $csp = null) {

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

    /**
     * Adds headers after the class instance.
     *
     * @internal
     * @since  1.0.0
     */
    public function add() {

    	foreach ($this->toApply as $key => $value) {
    		
    		header($key . ': ' . $value);
    	}

    }

    /**
     * Allows adding new headers after the class instance.
     *
     * @param  $header  string  Name of the header.
     * @param  $value  string  Value and arguments for this header.
     *
     * @since  1.0.0
     */
    public function set(string $header, string $value) {

    	$this->toApply[$header] = $value;
    }

    /**
     * Retrieves an array of all headers to be set.
     *
     * @since 1.0.0
     * @return  $this->toApply  array
     */
    public static function list() {

    	return $this->toApply;
    }
}

