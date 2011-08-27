<?php 
$login=$this->loadView('loginForm.php');
if($this->isLogined)
	$login=$this->loadView('profil.php',$this->u);

$reg=$this->loadView('registerForm.php'); 
?>

<div style="float:left;">
<?php echo $this->loadView('userList.php');?>
</div>

<div style="float:left;margin-left:100px;">
	<?php echo $login; ?>
	<?php echo $reg; ?>
</div>
