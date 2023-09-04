<h1>Home Page View</h1>
<form method="post">

    <input type="" name="username"><br>
    <div><?=$data->getError('username')?></div>
    
    <input type="" name="email"><br>
    <div><?=$data->getError('email')?></div>
    
    <input type="" name="password"><br>
    <div><?=$data->getError('password')?></div>
    
    <button>Signup</button>
</form>
