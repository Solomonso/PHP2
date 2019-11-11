<?php
	/***********************************************/
    /****** Author: solomon              ***********/
    /****** Desc: Code for the database for stenden 
                   twitter***
     ******            ********************
     ******  *****			**********************
     ******    									*******/
    /****** Date Created: dd-mm-yyyy 06-24-2019 ********/
    /******  ****************************************/
    /**********************************************/

?>
<!DOCTYPE html>
<html>
<head>
	<title>Stenden Database and Tables</title>
</head>
<body>
	<?php
		$conn = mysqli_connect("localhost","root","");

		if(!$conn)
		{
			echo "Unable to connect to server ".mysqli_error($conn);
		
		}else{echo "Connection to Server successful";}	

			echo "<br>";
			
		$db = "CREATE DATABASE stenden_twitter";

		if($stmt = mysqli_prepare($conn,$db))
		{
			if(mysqli_stmt_execute($stmt))
			 {
			 	echo "Database Created Sucessfully";

			 }else{echo "Unable to create database".mysqli_error($conn);}	

			   mysqli_stmt_close($stmt);
				echo "<br>";

		}else{echo "Unable to prepare".mysqli_error($conn);}	
		
		mysqli_select_db($conn,"stenden_twitter");

		$db_table = "CREATE TABLE stenden_message
		             (
		             	msgid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		             	user_id INT NOT NULL,
		             	message VARCHAR(120),
		             	CONSTRAINT FK_stenden_message FOREIGN KEY(user_id) REFERENCES stenden_user(user_id)
		             	ON UPDATE CASCADE
   						ON DELETE CASCADE
		             )";

	   if($stmt = mysqli_prepare($conn,$db_table))
	   {

	   	if(mysqli_stmt_execute($stmt))
	   	{
	   		echo "Stenden Message Table Created Successfully";
	   	
	   	}else{echo "Unable To Create Stenden Message Table ".mysqli_error($conn);}	
	   		
	   		mysqli_stmt_close($stmt);

	   }else{echo "Unable to Prepare Table one ".mysqli_error($conn);}
			echo "<br>";

	   $db_table_two = "CREATE TABLE stenden_user
	                    (
	                      user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	                      user_name VARCHAR(128),
	                      user_pass VARCHAR(128),
	                      user_email VARCHAR(128),
	                      user_image_path VARCHAR(120)

	                    )";
		
		if($stmt = mysqli_prepare($conn,$db_table_two))
		{

			if(mysqli_stmt_execute($stmt))
			{
				echo "Stenden User Table Created Successfully ";
			
			}else{echo "Unable To Create Stenden User Table ".mysqli_error($conn);}	

				echo "<br>";

			mysqli_stmt_close($stmt);

		} else{echo "Unable to prepare table two".mysqli_error($conn);}	
	

		mysqli_close($conn);
	?>
</body>
</html>