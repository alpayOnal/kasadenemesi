<?php
class users{
	
	public function __construct(){
		$this->initialize();
	}
	
	public function initiailize(){
		$this->addModel('users');
		$this->users=new users();
	}
	
	public function login(){
		if (isset($this->rq['email'])  && isset($this->rq['password']))
			return $this->users->login(
				$this->['email'],
				$this->['password']);	
	}
	
	public function register(){
		if (isset($this->rq['email'])  && isset($this->rq['password']))
			return $this->users->register(
				$this->['email'],
				$this->['password']);	
	}

	public function viewUserList(){
		return $this->loadWiew('userList',$this-users->getUsers());
	}
}
?>
