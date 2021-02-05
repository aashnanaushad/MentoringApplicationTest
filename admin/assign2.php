<?php
    	session_start();
        require_once('../dbconfig/config.php');
        if(!isset($_SESSION['username'])){
        echo "<script>window.location.href='../index.php';</script>";
         }

                        if(isset($_POST['sb']))
                        {
                            $flag=$_POST['flag'];
                            $user_id=$_POST['hod'];
                            $dept = $_POST['dept'];
                            //echo $user_id;
                            if($flag == 1){
                                $user_type= "faculty" ;
                                $query = "update faculty set user_type='$user_type' where username='$user_id';";
                                $query_run = mysqli_query($con,$query);
                                    if($query_run)
                                    {
                                        echo '<script type="text/javascript">alert("Successfully de-assigned HOD ")</script>';
                                        echo "<script>window.location.href='assignhod.php';</script>";
                                    }
                                    else
                                    {
                                        echo '<script type="text/javascript">alert("cannot de-assign HOD!!")</script>';
                                    }
                            }else{
                            $query="select * from faculty where dept='$dept' and user_type='HOD'";
                            $query_run = mysqli_query($con,$query);
                            if($query_run)
                            {
                                if(mysqli_num_rows($query_run)<2)
                                {
                                    $user_type= "HOD" ;
                                    $query = 'update faculty set user_type="'.$user_type.'",batch=0 where username="'.$user_id.'";';
                                    $query_run = mysqli_query($con,$query);
                                    if($query_run)
                                    {
                                    echo '<script type="text/javascript">alert("Successfully assigned hod ")</script>';
                                    echo "<script>window.location.href='assignhod.php';</script>";
                                    }
                                    else
                                    {
                                    echo '<script type="text/javascript">alert("DB error")</script>';
                                    }
                                }
                                else
                                {
                                    echo '<script type="text/javascript">alert("Already 2 HODs assigned for the department!")</script>';
                                }
                            }
                            else
                            {
                                echo '<script type="text/javascript">alert("DB error")</script>';
                            }
                        }
                        echo "<script>window.location.href='assignhod.php';</script>";
                    }
                    ?>