<?php
    session_start();
    require_once('dbconfig/config.php');
    	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
	}
    //phpinfo();
	$username=$_SESSION['username'];
	$query="select * from counselor where username='$username'";
	$query_run = mysqli_query($con,$query);
	if($query_run)
	{
		$row=$query_run->fetch_assoc();
	}
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Counselor-edit</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/tailwind.min.css">
</head>
<body class=" bg-blue-400 ">


		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
			<form action="cedit.php" method="post">
		<div class="-mx-3 md:flex mb-6">
				
			<div class=" px-3 mb-6 md:mb-0">
			
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Name
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="name" type="text" value="<?php echo $row['name']?>">
			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Email
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="email" type="text" value="<?php echo $row["email"];?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Qualification
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="qualification" type="text" value="<?php echo $row["qualification"];?>">

			</div>
		</div>
		
		<div class="flex items-center justify-between ">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" name="cedit" type="submit">
							Edit
						</button>
			</form>
						<form href="fedit.php" method="post">
							<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right" type="submit" name="back" >
								back
							</button>
						</form>
			</div>
		</div>
            <!-- <div id="main-wrapper"
            <centre><h2>Edit Details:</h2></centre>
            <div class="imgcontainer">
			<img src="imgs/avatar.png" alt="Avatar" class="avatar">
		    </div>
            <form action="cedit.php" method="post">
                <div class="inner_container">
                    <label><b>Name</b></label>
                    <input type="text" name="name"  value="<?php echo $row['name']?>"/>
                    <label><b>Qualification</b></label>
                    <input type="text" name="qualification"  value="<?php echo $row['qualification']?>"/>
                    <label><b>Email</b></label>
                    <input type="text" name="email"  value="<?php echo $row['email']?>"/>
                    <a href="cedit.php"><button name="cedit" class="sign_up_btn" type="submit">Submit</button></a>
                    <a href="cview.php"><button type="button" class="back_btn"><< Back</button></a>
                </div> 
            </form> -->
            <?php
			if(isset($_POST['back']))
			{
			     echo "<script>window.location.href='chome.php';</script>";
			}
			if(isset($_POST['cedit']))
			{
			    @$name=$_POST['name'];
				@$qualification=$_POST['qualification'];
				@$email=$_POST['email'];
			    $query = "update counselor set name='$name',qualification='$qualification',email='$email' where username='$username'";
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
				 echo '<script type="text/javascript">alert("Updates saved!")</script>';
			     echo "<script>window.location.href='chome.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Unsuccessful due to server error. Please try later</p>';
				}
			}
			else
			{
			}
		?>
			</div>
			</div>
        </body>
    </html>