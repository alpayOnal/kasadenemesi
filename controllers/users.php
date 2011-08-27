<?php
require_once('ipage.php');
class usersController extends ipage{
	
	public function initialize(){
		$this->addModel('users');
		$this->users=new users();
	}
	
	public function login(){
		if (isset($this->rq['email'])  && isset($this->rq['password']))
			return $this->users->login(
				$this->rq['email'],
				$this->rq['password']);	
	}
	
	public function register(){
		if (isset($this->rq['email'])  && isset($this->rq['password']))
			return $this->users->register(
				$this->rq['email'],
				$this->rq['password']);	
	}
	
	public function viewuserList(){
		
		return $this->loadView(
			'userList.php',
			$this->users->getUsers(),
			false
		);
		
	}
}
?>
