<?php

declare (strict_types = 1);

namespace App\Khan\Component\Dotenv;

function init(string $path) {
	$dotenv = new \Dotenv\Dotenv($path);
	$dotenv->load();
}