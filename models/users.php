<?php

class users
{
	/**
	 * register the user by given data
	 * */
	public function register($email,$password){
		$this->isRegistered($email);
		
		$email=$this->db->escape($email);
		$password=$this->db->escape($password);

		$sql='insert into users (email,password)
			values
			(
				\''.$email.'\',
				\''.$password.'\'
			)';
		
		$this->db->query($sql);
		return $this->db->affectedRows>0;
		
	}
	
	
	/**
	 * login via email and password
	 * @param string $email
	 * @param string $password
	 * */
	public function login($email,$password){
	
		$email=$this->db->escape($email);
		$password=$this->db->escape($password);
		
		$sql='select * from users
			where
			email=\''.$email.'\' and
			password=\''.$password.'\'
			limit 1';
		
		return $this->db->fetchFirst($sql);
	}
	

	/**
	 * gives the all registered users
	 * @return array
	 * */
	public function getUsers(){
		return $this->db->fetch('select * from users');
	}
	
	
	/**
	 * checks whether email is registered
	 * @param string $email
	 * @return bool
	 * */
	public function isRegistered($email){
		
		$email=$this->db->escape($email);
		
		$sql='select id from users
			where
			email=\''.$email.'\'
			limit 1';
		
		$r=$this->db->fetch($sql);
		
		return ( $r===false ? false : true )
	}

	/**
	 * validate the fields of login or register form
	 * @param string email
	 * @param string password
	 * @return bool/string
	 * */
	public function validateForm($email,$password){
		$error='';
		
		$emailPattern='/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i';
		$passwordPattern='/^[a-z0-9]{5,40}$/i';
		
		$email=$this->db->escape($email);
		$password=$this->db->escape($password);
		
		if(!preg_match($emailPattern,$email))
			$error.='Your email is not valid.';

		if(!preg_match($passwordPattern,$password))
			$error='Password is not valid. Letters and number are allowed.';
		
		return ( $error==''? true : $error );
	}

}

?>
