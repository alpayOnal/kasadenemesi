<?php
main::loadController('users');
$users=new usersController();
?>

<div>
	<h3>Anasayfa</h3>
	<div style="float:left;width:100%;">
		<p>
			fkasfjsaklfas jfsaklfjsaklfsajlfksafas<br />
			fkasfjsaklfas jfsaklfjsaklfsajlfksafas<br />
			fkasfjsaklfas jfsaklfjsaklfsajlfksafas<br />
			fkasfjsaklfas jfsaklfjsaklfsajlfksafas<br />
		</p>
	</div>
	<div style="float:left;margin-top:25px;width:100%;">
		<div style="float:left;">
			<?php echo $this->loadView('loginForm.php');?>
		</div>
		<div style="float:left;margin-left:25px;">
			<?php echo $this->loadView('registerForm.php');?>
			<?php echo $users->loadView('userList.php');?>
		</div>
	</div>
</div>
