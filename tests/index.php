<?php

	class Email {

	    public function send(){
	       echo "Send!!";
	    }

	}

	class Usuario {

	    protected $email;

	    // Injeção de dependência através do método construtor
	    public function __construct(Email $email){
	        $this->email = $email;
	    }

	    public function porEmail(){
	        $this->email->send();
	    }

	}

	$user = new Usuario(new Email());

	//$user->porEmail();

	var_dump($user);
