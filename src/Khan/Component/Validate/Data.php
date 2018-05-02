<?php

	namespace App\Khan\Component\Validate;

	class Data {

	    public static $errors = null;
	    public $validate;

	    public static function validate($post, $data) {
			foreach($data as $key => $rule) {
				 switch($rule) {
							case 'not_empty':
							    if(empty($post[$key]) == $key) {
									self::$errors[] = $rule;
								}
							break;
							
							case 'numeric':
							    if(!is_numeric($post[$key]) == $key) {
									self::$errors[] = $rule;
								}
							break;
							
							case 'is_email':
							    if(!Data::validEmail($post[$key]) == $key) {
									self::$errors[] = $rule;
								}
							break;
							
							case 'alphanumeric':
							    if(!ctype_alnum($post[$key]) == $key) {
									self::$errors[] = $rule;
								}
							break;
							
							/*case 'between':
							    foreach($error as $between => $minmax) {
									//echo $between .  '<br/>';
									switch($between) {
										case 'min':
										    //echo $between . $minmax;
										    if(strlen($post[$key]) < $minmax) {
											    $this->message[$key] = $error['error'];	
											}
										break;
										
										case 'max':
										    //echo $between . $minmax;
										    if(strlen($post[$key]) > $minmax) {
											    $this->message[$key] = $error['error'];	
											}
										break;
										
									}
								}
							break;
							
							case 'equal_to':
							    if($post[$key] != $post[$value['equal_to']]) {
									self::$errors[] = $rule;
								}
							break;
							*/
							/**
		                    * return url
		                    */					
							case 'is_url':
							    if(!Data::is_url($post[$key]) == $key) {
									self::$errors[] = $rule;
								}
							break;
							
							/**
		                    * check or radio button
		                    */					
							case 'is_check':
							    if(empty($post[$key]) == $key) {
									self::$errors[] = $rule;
								}
							break;
							
							/**
		                    * select option form, make sure first value = empty or 0
		                    */
							case 'is_select':
							    if($post[$key] == '' || $post[$key] == 0) {
									self::$errors[] = $rule;
								}
							break;
						}
				}
			return is_null(self::$errors);
		}
		
		public static function validEmail($email) {
			return filter_var($email, FILTER_VALIDATE_EMAIL);
		}
		
		public static function is_url($url) {
		    if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) {
		    	return true;
		    } else {
		    	return false;
		    }
	    }     

	}
