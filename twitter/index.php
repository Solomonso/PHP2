<?php
	/***********************************************/
    /****** Author: solomon              ***********/
    /****** Desc: Home page it shows the message post*/
    /****** Date Created: dd-mm-yyyy 06-24-2019 ********/
    /******  ****************************************/
    /**********************************************/

?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css">
</head>
<body>
	<div id="container">
	<?php
		if(isset($_SESSION["valid_id"]) && isset($_SESSION["valid_name"]))
		{			


			$conn = mysqli_connect("localhost","root","","stenden_twitter");
			if(!$conn)
			{
				echo "Could not connect to server".mysqli_error($conn);
			}
				echo "<div class='header-img' >
					<p class='twitter-text float-header'>Stenden Twitter</p>
					<div class='button'>
						<a href='logout.php'><button class='button-style'>Logout</button></a>
						<a href='addmsg.php'><button class='right'>Add more Post</button></a>
					</div>
				</div>";
			
				$query = "SELECT user_image_path,user_name,message FROM stenden_message,stenden_user
				  WHERE stenden_user.user_id = stenden_message.user_id ORDER BY msgid DESC";

					if($stmt=mysqli_prepare($conn,$query))
					{  

					  	if(mysqli_stmt_execute($stmt))
					  	{
					  		echo ""."<br>";

					  	}else{echo "Error ".mysqli_error($conn);}	

					  	mysqli_stmt_bind_result($stmt,$image,$name,$msg);
					  	//mysqli_stmt_store_result($stmt);//store result only for amount of rows


					  	while(mysqli_stmt_fetch($stmt))
					  	{

					  		echo "
					  		<div class=post>
					  			<div class=img-name>
					  		    	<img src=$image alt=No image>
					  				<span>$name</span>
					  			<div><br>
					  			<p>Your Post: $msg</p>  
					  		</div>
					  		<br>
					  		<hr>
					  		<br>";
					  	}

					  	//mysqli_stmt_free_result($stmt);
					  	mysqli_stmt_close($stmt);
					  	mysqli_close($conn);	

			    	}else{echo "Unable to prepare ".mysqli_error($conn);}		
	   }	

	   // else if((!isset($_SESSION["valid_id"]) && !isset($_SESSION["valid_name"])))
	   // {

	   // 		 echo "<div class='header-img' >
				// 	<p class='twitter-text float-header'>Stenden Twitter</p>
				// 	<div class='button'>
				// 		<a href='login.php'><button class='button-style'>Login</button></a>
				// 		<a href='sign_up.php'><button>Sign Up</button></a><br><br>
				// 	</div>
				// </div>";
	   // }	
	   else
	   {
	   		 echo "<div class='header-img' >
					<p class='twitter-text float-header'>Stenden Twitter</p>
					<div class='button'>
						<a href='login.php'><button class='button-style'>Login</button></a>
						<a href='sign_up.php'><button>Sign Up</button></a><br><br>
						
					</div>
				</div>";
	   }	
	?>
	</div>
	
	<?php
	
			// if(isset($_SESSION["valid_id"]) && isset($_SESSION["valid_name"]))
			// {	
				
		   // }

	?>
	
</body>
</html>