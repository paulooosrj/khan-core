<?php 

	namespace App\Khan\Component\Router\src\Http\Interfaces;

	interface Response{
    
			public function sendHeaders();
			public function sendContent();
			public function send();
			public function setContent($content);
			public function getContent();
			public function setProtocolVersion(string $version);
			public function getProtocolVersion();
			public function setStatusCode(int $code, $text = NULL);
			public function getStatusCode();
			public function setCharset(string $charset);
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
			public function setMaxAge(int $value);
			public function setSharedMaxAge(int $value);
			public function getTtl();
			public function setTtl(int $seconds);
			public function setClientTtl(int $seconds);
			public function getLastModified();
			public function getEtag();
			public function setEtag(string $etag = NULL, bool $weak = false);
			public function setCache(array $options);
			public function setNotModified();
			public function hasVary();
			public function getVary();
			public function setVary($headers, bool $replace = true);
			public function isInvalid();
			public function isInformational();
			public function isSuccessful();
			public function isRedirection();
			public function isClientError();
			public function isServerError();
			public function isOk();
			public function isForbidden();
			public function isNotFound();
			public function isRedirect(string $location = NULL);
			public function isEmpty();
			public static function closeOutputBuffers(int $targetLevel, bool $flush);
			// public function sendFile($file);
			// public function loadView($view, $data);
    
	}
