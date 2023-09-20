<h1>Signup View</h1>

<form method="post">
	
	<input type="name" value="<?=old_value('username')?>" name="username" placeHolder="jhon.smith"><br>
	<div style="color:red;">
        <?=$user->getError('username')?>
    </div><br>
	
	<input type="email"value="<?=old_value('email')?>" name="email" placeHolder="example@email.com"><br>
	<div style="color:red;">
        <?=$user->getError('email')?>
    </div><br>
	
	<input type="password" value="<?=old_value('password')?>" name="Enter Password" placeHolder="Password"><br>
	<div style="color:red;">
        <?=$user->getError('password')?>
    </div><br>

	<button>Signup</button>

</form>