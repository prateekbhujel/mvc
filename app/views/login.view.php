<h1>Login View</h1>

<form method="post">
	
	<input type ="email" value="<?=old_value('email')?>" name="email" placeHolder="example@email.com"><br>
	<div style="color:red;"><?=$user->getError('email')?></div><br>
    
	<input type ="password" value="<?=old_value('password')?>" name="password" placeHolder="Type Your Password"><br>
	
	<button>Login</button>
</form>