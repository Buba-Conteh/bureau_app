<?php      session_start();
                  require('dbconn.php');
                       $email=htmlspecialchars($_POST['email']);
                       $password=htmlspecialchars(md5($_POST['password']));



                       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                         # code...
                         $_SESSION['validation']="Please insert a valid email";
                         header('location: ../login.php');


                       }
                       if($password==''){
                         # code...
                         $_SESSION['validation']="Please insert a valid password";
                         header('location: ../login.php');


                       }
                       if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password !=='') {


                        
                        $login=$pdo->query("SELECT * FROM users WHERE `email` = '$email' AND `password`='$password'");
                        $login=$login->fetch(PDO::FETCH_ASSOC);
                            // var_dump($_POST['status']);
                            // die; 
                             $status=$_POST['status'];
                                if($login['status']!=$_POST['status']){
                                  $_SESSION['validation']="you are not a  $status";
                                 
                                   header('location: ../login.php');
                                   echo"stop";
                                  die;
                                }
                                // if($login['status']!==$_POST['status']){
                                //   
                                // }
                                if($login) {
                                  $_SESSION['admin']=$_POST['status'];
                                  $_SESSION['user_name']= $login['first_name'];
                                  $_SESSION['user_surename']= $login['last_name'];
                                  $_SESSION['user_id']= $login['id'];
                                  $_SESSION['profile_img']= $login['profile'];
                                    header('location: ../index.php');
                                }
                                else{

                                  $_SESSION['validation']="Please insert a valid Password and email";
                                  header('location: ../login.php');
                          
                                
                                }    

                  } else {

                    $_SESSION['validation']="Please insert valid Password and email";
                    header('location: ../login.php');
                  }

                      
                       
                   
                  ?>