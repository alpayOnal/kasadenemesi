<?php
class users extends apage{
	
	public function initiailize(){
		$this->addModel('users');
		$this->users=new users();
	}
	
	public function login(){
		if (isset($this->rq['email'])  && isset($this->rq['password']))
			return $this->users->login(
				$this->rq'email'],
				$this->rq['password']);	
	}
	
	public function register(){
		if (isset($this->rq['email'])  && isset($this->rq['password']))
			return $this->users->register(
				$this->rq['email'],
				$this->rq['password']);	
	}

	public function viewUserList(){
		return $this->loadWiew('userList',$this-users->getUsers());
	}
}
?>
