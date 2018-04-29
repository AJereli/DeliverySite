<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
				<h3>Авторизируйтесь</h3>
				<form method="POST"  >
				<input type="text" id="userName"  name = "name" class="form-control input-sm chat-input" placeholder="Логин" required />
				</br>
				<input type="password" id="userPassword" name ="password" class="form-control input-sm chat-input" placeholder="Пароль" required />
				</br>
				<div class="wrapper">
					<span class="group-btn"> 
					
					<input class="btn btn-primary btn-md" name="submit" type="submit" value="Войти">
					
					</span>
				</div>
				</form>
            </div>
        
        </div>
    </div>
</div>

<?

include("config.php");

$link=mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(isset($_POST['submit']))
{
    
    $query = mysqli_query($link,"SELECT access_token, password FROM user WHERE name='".mysqli_real_escape_string($link,$_POST['name'])."' LIMIT 1");
    
	if ($query == FALSE){
		print '<div class="container">
    <div class="row"><div class="alert alert-danger">
  <strong>Небольшой мех!</strong> Вы ввели неверный логин или пароль
</div></div>
    </div>';
	}else{
		$data = mysqli_fetch_assoc($query);	
		
		//hash('sha512', $_POST['password']);
		if($data['password'] === hash('sha512', $_POST['password']))
		{
			$_SESSION['access_token']= $data['access_token'];
			//print $_SESSION['access_token'];
			//setcookie("access_token", $data['access_token'], time()+60*60*24*15);
			
		}

		else
		{
			print '<div class="container">
		<div class="row"><div class="alert alert-danger">
	  <strong>Небольшой мех!</strong> Вы ввели неверный логин или пароль
	</div></div>
		</div>';
		}
	}
	
}
?>