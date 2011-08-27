<h4>Kayıt Formu</h4>
<?php 

	if (isset($o->isRegistered))
		echo ($o->isRegistered===true?'Eklendi':'bozuk');
	
?>
<form>
	<input type="hidden" name="formName" value="register" />
	<p><label>E-posta:<br /><input type="text" name="email" /></label></p>
	<p><label>Şifre<br /><input type="text" name="password" /></label></p>
	<p><input type="submit" name="signup" value="Kaydet" /></p>
</form>
