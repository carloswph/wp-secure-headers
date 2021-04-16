<?php

namespace WPH\Security;

class ContentSecurityPolicy
{
	public $policies = [];

	public $ReportOnly = false;

	public function get()
	{
		$csp = implode('; ', $this->policies);

		return $csp;
	}

	public function ReportOnly()
	{
		$this->ReportOnly = true;
	}

	/**
	 * Sets the child-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/child-src
	 * @since  1.2.0
	 */
	public function setChild(string $values)
	{
		$this->policies[] = 'child-src ' . $values;

		return $this;
	}

	/**
	 * Sets the connect-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/connect-src
	 * @since  1.2.0
	 */
	public function setConnect(string $values)
	{
		$this->policies[] = 'connect-src ' . $values;

		return $this;
	}

	/**
	 * Sets the default-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/default-src
	 * @since  1.2.0
	 */
	public function setDefault(string $values)
	{
		$this->policies[] = 'default-src ' . $values;

		return $this;
	}

	/**
	 * Sets the font-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/font-src
	 * @since  1.2.0
	 */
	public function setFont(string $values)
	{
		$this->policies[] = 'font-src ' . $values;

		return $this;
	}

	/**
	 * Sets the frame-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-src
	 * @since  1.2.0
	 */
	public function setFrame(string $values)
	{
		$this->policies[] = 'frame-src ' . $values;

		return $this;
	}

	/**
	 * Sets the img-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/img-src
	 * @since  1.2.0
	 */
	public function setImg(string $values)
	{
		$this->policies[] = 'img-src ' . $values;

		return $this;
	}

	/**
	 * Sets the manifest-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/manifest-src
	 * @since  1.2.0
	 */
	public function setManifest(string $values)
	{
		$this->policies[] = 'manifest-src ' . $values;

		return $this;
	}

	/**
	 * Sets the media-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/media-src
	 * @since  1.2.0
	 */
	public function setMedia(string $values)
	{
		$this->policies[] = 'media-src ' . $values;

		return $this;
	}

	/**
	 * Sets the object-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/object-src
	 * @since  1.2.0
	 */
	public function setObject(string $values)
	{
		$this->policies[] = 'object-src ' . $values;

		return $this;
	}

	/**
	 * Sets the prefetch-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/prefetch-src
	 * @since  1.2.0
	 */
	public function setPrefetch(string $values)
	{
		$this->policies[] = 'prefetch-src ' . $values;

		return $this;
	}

	/**
	 * Sets the script-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src
	 * @since  1.2.0
	 */
	public function setScript(string $values)
	{
		$this->policies[] = 'script-src ' . $values;

		return $this;
	}

	/**
	 * Sets the script-src-elem directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src-elem
	 * @since  1.2.0
	 */
	public function setScriptElem(string $values)
	{
		$this->policies[] = 'script-src-elem ' . $values;

		return $this;
	}

	/**
	 * Sets the script-src-attr directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src-attr
	 * @since  1.2.0
	 */
	public function setScriptAttr(string $values)
	{
		$this->policies[] = 'script-src-attr ' . $values;

		return $this;
	}

	/**
	 * Sets the style-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src
	 * @since  1.2.0
	 */
	public function setStyle(string $values)
	{
		$this->policies[] = 'style-src ' . $values;

		return $this;
	}

	/**
	 * Sets the script-src-elem directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src-elem
	 * @since  1.2.0
	 */
	public function setStyleElem(string $values)
	{
		$this->policies[] = 'style-src-elem ' . $values;

		return $this;
	}

	/**
	 * Sets the script-src-attr directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src-attr
	 * @since  1.2.0
	 */
	public function setStyleAttr(string $values)
	{
		$this->policies[] = 'style-src-attr ' . $values;

		return $this;
	}

	/**
	 * Sets the worker-src directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/worker-src
	 * @since  1.2.0
	 */
	public function setWorker(string $values)
	{
		$this->policies[] = 'worker-src ' . $values;

		return $this;
	}

	// Document Directives

	/**
	 * Sets the base-uri directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/base-uri
	 * @since  1.2.0
	 */
	public function setBaseUri(string $values)
	{
		$this->policies[] = 'base-uri ' . $values;

		return $this;
	}

	/**
	 * Sets the sandbox directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/sandbox
	 * @since  1.2.0
	 */
	public function setSandbox(string $values)
	{
		$this->policies[] = 'sandbox ' . $values;

		return $this;
	}

	/**
	 * Sets the form-action directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/form-action
	 * @since  1.2.0
	 */
	public function setFormAction(string $values)
	{
		$this->policies[] = 'form-action ' . $values;

		return $this;
	}

	/**
	 * Sets the frame-ancestors directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/frame-ancestors
	 * @since  1.2.0
	 */
	public function setFrameAncestors(string $values)
	{
		$this->policies[] = 'frame-ancestors ' . $values;

		return $this;
	}

	/**
	 * Sets the navigate-to directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/navigate-to
	 * @since  1.2.0
	 */
	public function setNavigateTo(string $values)
	{
		$this->policies[] = 'navigate-to ' . $values;

		return $this;
	}

	/**
	 * Sets the report-uri directive
	 * @see  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-uri
	 * @since  1.2.0
	 */
	public function setReportUri(string $values)
	{
		$this->policies[] = 'report-uri ' . $values;

		return $this;
	}
}