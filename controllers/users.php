<?php
require_once('ipage.php');
class usersController extends ipage{
	
	public function initialize(){
		$this->addModel('users');
		$this->users=new users();
	}
	
	public function login(){
		if (isset($this->r['email'],$this->r['password']) &&
			$this->r['formName']=='login'){
			$u=$this->users->login(
				$this->r['email'],
				$this->r['password']);
			if ($u) 
				return $this->createSession($u);
			else 	
				return false;
		}	
	}
	
	public function createSession($u){
		$s=new sSession();
		$s->create($u);
		$this->isLogined=true;
		$this->u=$u;
	}
	
	public function register(){
		
		if (isset($this->r['email'],$this->r['password']) && 
			$this->r['formName']=='register')
			return $this->users->register(
				$this->r['email'],
				$this->r['password']);	
	}
	
	public function viewloginForm(){
			$l=$this->login();
			if (!$this->isLogined)
				return $this->loadView(
					'loginForm.php',null,false
				);
	}
	
	public function viewregisterForm(){
			$x=new stdClass();
			$x->isRegistered=$this->register();
			return $this->loadView('registerForm.php',$x,false);
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
