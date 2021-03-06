<?php 

	namespace App\Khan\Component\Router\Http\Interfaces;

	interface Response{
    
			public function sendHeaders();
			public function sendContent();
			public function send();
			public function setContent($content);
			public function getContent();
			public function setProtocolVersion($version);
			public function getProtocolVersion();
			public function setStatusCode($code, $text = NULL);
			public function getStatusCode();
			public function setCharset($charset);
			public function getCharset();
			public function isCacheable();
			public function isFresh();
			public function isValidateable();
			public function setPrivate();
			public function setPublic();
			public function mustRevalidate();
			public function getDate();
			public function getAge();
			public function expire();
			public function getExpires();
			public function getMaxAge();
			public function setMaxAge($value);
			public function setSharedMaxAge($value);
			public function getTtl();
			public function setTtl($seconds);
			public function setClientTtl($seconds);
			public function getLastModified();
			public function getEtag();
			public function setEtag($etag = NULL, $weak = false);
			public function setCache($options);
			public function setNotModified();
			public function hasVary();
			public function getVary();
			public function setVary($headers,$replace = true);
			public function isInvalid();
			public function isInformational();
			public function isSuccessful();
			public function isRedirection();
			public function isClientError();
			public function isServerError();
			public function isOk();
			public function isForbidden();
			public function isNotFound();
			public function isRedirect($location = NULL);
			public function isEmpty();
			public static function closeOutputBuffers($targetLevel, $flush);
			// public function sendFile($file);
			// public function loadView($view, $data);
    
	}
