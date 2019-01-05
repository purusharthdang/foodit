<?php
session_start();
require_once("conn.php");

            if (isset($_POST['submit'])) {
              $name=$_POST['name'];
              $mobile=$_POST['mobile'];
              $msg=$_POST['msg'];
                }
                 if ($name='') {
                   $dang=0;
                    $_SESSION['err']['dis']['name']="NAME IS REQUIRED";}
                    if ($mobile='') {
                      $dang=0;
                        $_SESSION['err']['dis']['mobile']="PHONE NUMBER IS REQUIRED";}
                        if ($msg='') {
                          $dang=0;
                            $_SESSION['err']['dis']['message']="MESSAGE IS REQUIRED";}
                            if ($dang=0) {
                                    header("Location:http//localhost/foodit/contact.php");
                            }else {
                              $stmt=$conn->prepare("INSERT INTO reservations (name, mobile, msg) VALUES (:name, :mobile, :msg)");
                              $stmt->bindParam('name', $name);
                              $stmt->bindParam('mobile', $mobile);
                              $stmt->bindParam('msg', $msg);
                              $stmt->execute();
                            }


            if (isset($_POST['save'])) {
              $user=$_POST['user'];
              $exp=$_POST['experience'];
              $fback=$_POST['fback'];
              $sql=$conn->prepare("INSERT INTO reviews (user, experience, fback) VALUES (:user, :experience, :fback)");
              $sql->bindParam('user', $user);
              $sql->bindParam('experience', $exp);
              $sql->bindParam('fback', $fback);
              $sql->execute();
            }
            header("Location:contact.php");
?>
