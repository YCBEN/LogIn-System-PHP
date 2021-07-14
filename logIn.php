<?php
require_once 'includes/header.php'



?>

<div class="d-flex align-items-center flex-column ">
    <h1 class="p-2 border-bottom">LogIn</h1>

    <form class="p-2 border shadow p-3 mb-5 bg-white rounded" action="includes/login-cod.php" method="post">
    
    	<label class="mt-2">User Name</label>
        <input name="username" class="form-control" placeholder="Username" type="text">
    

    	<label class="mt-2">Password</label>
        <input name='password'class="form-control" placeholder="******" type="password">
  
    

        <button name="submit"type="submit" class="btn btn-primary btn-block mt-2">Login</button>
                                                        
    </form>
</div>
<?php
require_once 'includes/footer.php'



?>