<?php
	session_start();
	require_once('../../dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../../index.php';</script>";
	}
	$username=$_SESSION['username'];
			    $query="select * from faculty where username='$username'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
			        $row=$query_run->fetch_assoc();
                }
                $dept=$row['dept'];
                $batch=$row['batch'];
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>

    <title>Advisor</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="../../css/tailwind.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class=" bg-blue-400 ">
<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row['name'];?>)</span>
		</div>
		<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="advisor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="sadd.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Add Student
				</a>
				<a href="../slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Student List(Dept)
				</a>
				<a href="slist_class.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Class List
				</a>
				<a href="requeststofaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Advisorship
				</a>
				<a href="changepassword.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Change Password
				</a>
				</div>
                <div>
				<a href="../../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
            </div>
			
		</nav>
        <!-- <div class="h-screen pb-14 bg-right bg-cover"> -->
			
			<!-- <div class="container pt-24 md:pt-48 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center"> -->
				

        <!--Left Col-->
				<!-- <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden"> -->
                
		           
                   <div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class=" g:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 w-2/3" >
                <div>Approve Edit Request here:</div><br /> 
				
		<?php
		    $flag=0;
		    $query="select * from student where dept='$dept' and start_yr='$batch'";
	        $query_run = mysqli_query($con,$query);
		    while($row=$query_run->fetch_assoc() )
		    {
		        if($flag==0)
		        {
		        @$username= $row["username"];
		        
		        if($row["edit"]==1 )
		        {
		            @$username= $row["username"];
		            $flag=1;
		            echo"<br>";
		            echo"<br>";
		            echo"<br>";
		            echo "Username: $username";
		            echo"<br>";
		            $query1="select * from temp_student where username='$username'";
		            $query_run1 = mysqli_query($con,$query1);
		            while($row1=$query_run1->fetch_assoc())
		            {
		                  if( $row["name"] != $row1["name"])
		                  {
		                      @$name=$row1["name"];
		                      echo "Edited name: $name";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  if( $row["dateofbirth"]!=$row1["dateofbirth"])
		                  {
		                      @$dob=$row1["dateofbirth"];
		                      echo "Edited dob: $dateofbirth";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  if( $row["address"]!=$row1["address"])
		                  {
		                      @$address=$row1["address"];
		                      echo "Edited address: $address";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  if( $row["email"]!=$row1["email"])
		                  {
		                      @$email=$row1["email"];
		                      echo "Edited email: $email";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["phone_no"]!=$row1["phone_no"])
		                  {
		                      @$phone_no=$row1["phone_no"];
		                      echo "Edited Contact: $phone_no";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["father"]!=$row1["father"])
		                  {
		                      @$father=$row1["father"];
		                      echo "Edited Father's Name: $father";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["focc"]!=$row1["focc"])
		                  {
		                      @$focc=$row1["focc"];
		                      echo "Edited Father's Occupation: $focc";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["mother"]!=$row1["mother"])
		                  {
		                      @$mother=$row1["mother"];
		                      echo "Edited Mother's Name: $mother";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["mocc"]!=$row1["mocc"])
		                  {
		                      @$mocc=$row1["mocc"];
		                      echo "Edited Mother's Occupation: $mocc";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["school10"]!=$row1["school10"])
		                  {
		                      @$school10=$row1["school10"];
		                      echo "Edited 10th School name: $school10";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["mark10"]!=$row1["mark10"])
		                  {
		                      @$mark10=$row1["mark10"];
		                      echo "Edited 10th Mark: $mark10";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["perc10"]!=$row1["perc10"])
		                  {
		                      @$perc10=$row1["perc10"];
		                      echo "Edited 10th percentage: $perc10";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["school12"]!=$row1["school12"])
		                  {
		                      @$school12=$row1["school12"];
		                      echo "Edited 12th School name: $school13";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["mark12"]!=$row1["mark12"])
		                  {
		                      @$mark12=$row1["mark12"];
		                      echo "Edited 12th Mark: $mark12";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["perc12"]!=$row1["perc12"])
		                  {
		                      @$perc12=$row1["perc12"];
		                      echo "Edited 12th percentage: $perc12";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["othername"]!=$row1["othername"])
		                  {
		                      @$othername=$row1["othername"];
		                      echo "Edited other School name: $othername";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["othermark"]!=$row1["othermark"])
		                  {
		                      @$othermark=$row1["othermark"];
		                      echo "Edited other mark: $othermark";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["otherperc"]!=$row1["otherperc"])
		                  {
		                      @$otherperc=$row1["otherperc"];
		                      echo "Edited other percentage: $otherperc";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["C1"]!=$row1["C1"])
		                  {
		                      @$C1=$row1["C1"];
		                      echo "Edited C1: $C1";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["A1"]!=$row1["A1"])
		                  {
		                      @$A1=$row1["A1"];
		                      echo "A1: $A1";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["C2"]!=$row1["C2"])
		                  {
		                      @$C2=$row1["C2"];
		                      echo "Edited C2: $C2";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["A2"]!=$row1["A2"])
		                  {
		                      @$A2=$row1["A2"];
		                      echo "Edited A2: $A2";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["C3"]!=$row1["C3"])
		                  {
		                      @$C3=$row1["C3"];
		                      echo "Edited C3: $C3";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["A3"]!=$row1["A3"])
		                  {
		                      @$A3=$row1["A3"];
		                      echo "Edited A3: $A3";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["C4"]!=$row1["C4"])
		                  {
		                      @$C4=$row1["C4"];
		                      echo "Edited C4: $C4";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["A4"]!=$row1["A4"])
		                  {
		                      @$A4=$row1["A4"];
		                      echo "Edited A4: $A4";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["C5"]!=$row1["C5"])
		                  {
		                      @$C5=$row1["C5"];
		                      echo "Edited C5: $C5";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["A5"]!=$row1["A5"])
		                  {
		                      @$A5=$row1["A5"];
		                      echo "Edited A5: $A5";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["C6"]!=$row1["C6"])
		                  {
		                      @$C6=$row1["C6"];
		                      echo "Edited C6: $C6";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["A6"]!=$row1["A6"])
		                  {
		                      @$A6=$row1["A6"];
		                      echo "Edited A6: $A6";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["C7"]!=$row1["C7"])
		                  {
		                      @$C7=$row1["C7"];
		                      echo "Edited C7: $C7";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["A7"]!=$row1["A7"])
		                  {
		                      @$A7=$row1["A7"];
		                      echo "Edited A7: $A7";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["C8"]!=$row1["C8"])
		                  {
		                      @$C8=$row1["C8"];
		                      echo "Edited C8: $C8";
		                      echo "<br>";
		                      echo "<br>";
						  }
						  if( $row["A8"]!=$row1["A8"])
		                  {
		                      @$A8=$row1["A8"];
		                      echo "Edited A8: $A8";
		                      echo "<br>";
		                      echo "<br>";
						  }
				
		                  @$name=$row1['name'];
		                  @$dateofbirth=$row1['dateofbirth'];
			           	  @$address=$row1['address'];
						  @$email=$row1['email'];
						  @$phone_no=$row1['phone_no'];
						  @$father=$row1['father'];
						  @$focc=$row1['focc'];
						  @$mother=$row1['mother'];
						  @$mocc=$row1['mocc'];
						  @$school10=$row1['school10'];
						  @$mark10=$row1['mark10'];
						  @$perc10=$row1['perc10'];
						  @$school12=$row1['school12'];
						  @$mark12=$row1['mark12'];
						  @$perc12=$row1['perc12'];
						  @$otherschool=$row1['otherschool'];
						  @$othermark=$row1['othermark'];
						  @$otherperc=$row1['otherperc'];
						  @$C1=$row1['C1'];
						  @$A1=$row1['A1'];
						  @$C2=$row1['C2'];
						  @$A2=$row1['A2'];
						  @$C3=$row1['C3'];
						  @$A3=$row1['A3'];
						  @$C4=$row1['C4'];
						  @$A4=$row1['A4'];
						  @$C5=$row1['C5'];
						  @$A5=$row1['A5'];
						  @$C6=$row1['C6'];
						  @$A6=$row1['A6'];
						  @$C7=$row1['C7'];
						  @$A7=$row1['A7'];
						  @$C8=$row1['C8'];
						  @$A8=$row1['A8'];
		            }
		        }
		        }
		    }
		  ?>
		      <form action="requeststofaculty.php" method="post">
			  <br /><br /><button name="confirm" class="w-20 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right" type="submit">Confirm</button><br /><br />
			  <button name="discard" class="w-20 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right" type="submit">Discard</button>
				</form>

		  
		  <?php
			if(isset($_POST['confirm']))
			{
				
				echo "$username";
	            $query = "update student set name='$name',dateofbirth='$dateofbirth',address='$address',email='$email',phone_no='$phone_no',father='$father',focc='$focc',mother='$mother',mocc='$mocc',school10='$school10',mark10='$mark10',perc10='$perc10',school12='$school12',mark12='$mark12',perc12='$perc12',C1='$C1',A1='$A1',C2='$C2',A2='$A2',C3='$C3',A3='$A3',C4='$C4',A4='$A4',C5='$C5',A5='$A5',C6='$C6',A6='$A6',C7='$C7',A7='$A7',C8='$C8',A8='$A8',edit='0' where username='$username'";
				$query_run= mysqli_query($con,$query);
				if($query_run)
				{
				    $query = "delete from temp_student where username='$username'";
				    $query_run= mysqli_query($con,$query);
					echo '<script type="text/javascript">alert("Update success for user")</script>';
				    echo "<script>window.location.href='advisor.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}
			else
			{
			}
			if(isset($_POST['discard']))
			{
				
				echo "$username";
	            $query = "delete from temp_student where username='$username'";
				$query_run= mysqli_query($con,$query);
				if($query_run)
				{
					$query = "update student set edit=0 where username='$username'";
					$query_run = mysqli_query($con,$query);
					echo '<script type="text/javascript">alert("Edit discarded successfully!!")</script>';
				    echo "<script>window.location.href='advisor.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}
			else
			{
			}
		?>
		  </div>

	</div>

				<!-- </div> -->
				
				<!--Right Col-->
				<!-- <div class="w-full xl:w-3/5 py-6 overflow-y-hidden"> -->
                                        
            <div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 w-2/3" >
                Approve Counselor Request here:
		<?php
		    $flag=0;
		    $query="select * from request where dept='$dept' and start_yr='$batch'";
	        $query_run = mysqli_query($con,$query);
		    while($row=$query_run->fetch_assoc() )
		    {
		        if($flag==0)
		        {
		        @$username= $row["username"];
		        
		        if($row["approve"]==0 )
		        {
		            @$username= $row["username"];
		            $reason=$row["reason"];
		            $flag=1;
		            echo"<br>";
		            echo"<br>";
		            echo"<br>";
		            echo "Username: $username";
		            echo"<br>";
		            echo "REASON: $reason";
		            echo"<br>";
		            echo"<br>";

		        }
		        }
		    }
		  ?>
		      <form method="post" action="requeststofaculty.php">
		      <input type="hidden" name="user" value="<?php echo $username ?>">
			  <br /><br /><button name="forward" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" type="submit">Forward</button></a>
			  <button name="reject" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" type="submit">Reject</button>
				</form>

		  
		  <?php
			if(isset($_POST['forward']))
			{
				
				$username=$_POST['user'];
	            $query = "update request set approve='1' where username='$username'";
				$query_run= mysqli_query($con,$query);
				if($query_run)
				{
					echo '<script type="text/javascript"> alert(" Successfully Forwarded to HOD")</script>';
				    echo "<script>window.location.href='advisor.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}
			if(isset($_POST['reject']))
			{
				$username=$_POST['user'];
				$query = "delete from request where username='$username'";
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
					$query = "update student set rqstcon='0' where username='$username';";
					$query_run = mysqli_query($con,$query);
					if($query_run){
						echo '<script type="text/javascript"> alert("Rejection of request successfull.")</script>';
						echo "<script>window.location.href='advisor.php';</script>";
					}
					else {
						echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
					}
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}

		?>
		  
	</div>
	
		  </div>
		  
	<!-- </div> -->
	
				<!-- </div> -->
				
        
        <!-- </div> -->
		<!-- <div class="w-full xl:w-3/5 py-6 overflow-y-hidden"> -->
                                        
                <div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 w-2/3" >
                Request counselor for a student: <br/>
				<form action="requeststofaculty.php" method="post"  >
					<div class="-mx-3 md:flex mb-6">
				
						<div class="md:w-full px-3 mb-6 md:mb-0">
			
							<br/><label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
								username(collegeid):
							</label>
							<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="username1" type="text" >
						</div>
					</div>
					<div class="mb-4">
					<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
								why would you suggest?
							</label>
						<input class="shadow appearance-none border rounded w-full py-12 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="reason" type="text" placeholder="Please specify a reason for request here..." class="reason" required>
					</div>
					<div class="flex items-center justify-between">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="request_counselor" type="submit">
							Request
						</button>
					
                    </form>
		  </div>
	</div>
			
        </div>
		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 w-2/3" >
                Counsellor Feedbacks: <br/><br/>
				<table class="text-left w-full ml-8">
					<thead class="bg-blue-500 flex text-white w-full"> 
					<tr class="flex w-full mb-4"> 
  
  							<th class="p-4 w-1/6">Student ID</th> 
							  <th class="p-4 w-1/6">Student Name</th> 
  							<th class="p-4 w-3/6">Feedback</th>  
							  <th class="p-4 w-1/6"></th> 
					</tr> 

					</thead>
					<tbody class="bg-grey-light flex flex-col items-center justify-between w-full" >
					
					<tr ><td><p class="text-red-600">Counselor feedbacks once closed is considered lost forever!!!</p></td></tr>
					<?php 
						$view_feedback="select * from request where dept='$dept' and start_yr='$batch' and approve=3";//select query for viewing users.  
						$run=mysqli_query($con,$view_feedback);//here run the sql query.  
				  		
						while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
						{ 

							$user_id=$row['username'];  
							$department=$row['dept'];  
							$sy=$row['start_yr'];  
							$feedback=$row['feedback'];
							$view_name="select * from student where username='$user_id'";
							$run1=mysqli_query($con,$view_name);
							$row2=mysqli_fetch_array($run1);
					?>
						<tr class="flex w-full mb-1"> 
							<td class="p-4 w-1/6 overflow-hidden"><?php echo $user_id; ?></td>  
							<td class="p-4 w-1/6 overflow-hidden"><?php echo $row2["name"]; ?></td>  
							<td class="p-4 w-3/6 overflow-hidden"><?php echo $feedback; ?></td>  
							<form action="requeststofaculty.php" method="post">
								<td class="p-4 w-1/6 overflow-hidden"><a href="requeststofaculty.php"><button type="submit" class="w-20 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="notifyclose<?php echo $user_id; ?>">Close </button></a></td>
							</form>
						</tr>
						<?php 
							if(isset($_POST["notifyclose$user_id"]))
							{
								$query="delete from request where username='$user_id'";
								$query_run = mysqli_query($con,$query);
								if($query_run)
								{
										  echo '<script type="text/javascript">alert("Notification closed successfully!")</script>';
										  echo "<script>window.location.href='requeststofaculty.php';</script>";
								}
								else
								{
									echo '<script type="text/javascript">alert("DB error")</script>';
								}
							}
						
						?>
						<?php }?>
					</tbody>
				</table>
		  		</div>
		</div>
		</div>
</body>
<html>
<?php
  if(isset($_POST["request_counselor"])){
	$username1=$_POST['username1'];
     $query = "update student set rqstcon=1 where username='$username1';";
	 $query_run = mysqli_query($con,$query);
     
     $reason=$_POST['reason'];
    //  $dept=$_POST['dept'];
     $approve=1;
     
     $sql = "DELETE FROM request WHERE username='$username1';";
     $stmt = mysqli_stmt_init($con);
     if(!mysqli_stmt_prepare($stmt,$sql)){
         echo "There was an error";
         exit();
     }
     else{
        //  mysqli_stmt_bind_param($stmt,"s",$userEmail);
       
         mysqli_stmt_execute($stmt);
     }
     echo $username1,$reason,$approve,$dept,$batch;
     $sql = "INSERT INTO request (username,reason,dept,start_yr,approve) values (?,?,?,?,$approve);";
     $stmt = mysqli_stmt_init($con);
     if(!mysqli_stmt_prepare($stmt,$sql)){
         echo "There was an error!!!";
         exit();
     }
     else{
         mysqli_stmt_bind_param($stmt,"ssss",$username1,$reason,$dept,$batch);
         mysqli_stmt_execute($stmt);
         echo '<script type="text/javascript">alert("Request Successful")</script>';
         echo "<script>window.location.href='advisor.php';</script>";
     }
  }
?>