<?php

namespace App\Khan\Libraries;
use App\Khan\Contracts\Libraries\Libraries as LibrariesContract;
use PHPMailer\PHPMailer\PHPMailer;

class Mail implements LibrariesContract {

	protected static $instance = null;

	public static function create() {
		if (is_null(self::$instance)) {
			self::$instance = new Mail();
		}
		return self::$instance;
	}
	protected function __construct() {
		$this->mail = new PHPMailer();
		if (!$_ENV) {exit("Not set mail config");}
		// $this->mail->SMTPDebug = 1;
		$this->mail->isSMTP();
		$this->mail->Host = $_ENV['EMAIL_HOST'];
		$this->mail->SMTPAuth = true;
    $this->mail->SMTPSecure = $_ENV['EMAIL_ENCRYPTION'];
		$this->mail->Username = $_ENV['EMAIL_USERNAME'];
		$this->mail->Password = $_ENV['EMAIL_PASSWORD'];
		$this->mail->Port = $_ENV['EMAIL_PORT'];
		return $this->mail;
	}

}
