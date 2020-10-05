<?php 
	if(isset($_POST['submit'])){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "result";
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		if(!$conn){
			die("Connection Failed : ".mysqli_connect_error());
		}
		$username = $_POST['username'];
		$password = $_POST['password'];
		$pass = md5($password);
		$sql = "INSERT INTO data1 (username,password) VALUES ('$username','$pass')";
		$result = mysqli_query($conn,$sql);

	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	
 		<form method="POST" action="q1_md5.php">
 			<input contenteditable class="inputstyle" type="text" name="username" placeholder="Username" required><br><br>
 			<input class="inputstyle" type="password" name="password" placeholder="Password" required><br><br>
 			<input id="submit" type="submit" name="submit" value="login"><br><br><br>
 		</form><br><br><br>
 		<?php 
 			if(isset($_POST['submit'])){
	 			if($result){
	 				echo "Record was created successfully<br><br>";
	 			}
	 			else{
	 				echo "No record was created ";
	 			}

	 			echo "Encrypted password is ".$pass;
			}

 		 ?><br><br>
 	</div>
 </body>
 </html>