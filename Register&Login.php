<?php
      session_start();
      require "config.php";
      $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
      if ($_SERVER['REQUEST_METHOD']=='POST' && !isset($_SESSION['username'])) {
        if (isset($_POST['Signup'])) {
          echo "Inside signup";
          $username="'".$_POST['username']."'";
          $password="'".$_POST['password']."'";
          $fname = "'".$_POST['fname']."'";
          $lname = $_POST['lname'];
          $lname = ($lname == "")?"NULL":"'$lname'";

          try {
            $con = new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            try{
              $checkTable=$con->query("SELECT 1 FROM User LIMIT 1");
            }
            catch(Exception $e)
            {
              $q="CREATE TABLE User(
                  username varchar(50) PRIMARY KEY,
                  password varchar(50) NOT NULL,
                  fname varchar(50) NOT NULL,
                  lname varchar(50)
                )";
              $con->exec($q);
            }

            $q="SELECT username FROM User WHERE username=$username";
            $result=$con->query($q);
            $assoc=$result->fetch();
            if(empty($assoc))
            {
              $q="INSERT INTO User(username,password, fname, lname) VALUES($username,$password,$fname,$lname)";
              $con->exec($q);

              session_start();
              $_SESSION['username'] = $_POST['username'];
              header("Location: Dashboard.php");
              // echo "<script> alert('Signed up as $username,Please Login.') </script>";
            }
            else {
              echo "<script> alert('You are already signed up as $username.') </script>";
            }
          }
          catch (PDOException $e) {
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
          }
          finally{
            $con=NULL;
          }
        }
        else if(isset($_POST['login'])){
          echo "inside login";
          $username=$_POST['username'];
          $password=$_POST['password'];

      //     //Console Helper
      //   function debug_to_console($data) {
      //     $output = $data;
      //     if (is_array($output))
      //         $output = implode(',', $output);
      
      //     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
      // }
      // debug_to_console($password);
          try { 
            $con=new PDO($dsn,$db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            try{
              $checkTable=$con->query("SELECT 1 FROM User LIMIT 1");
            }
            catch(Exception $e)
            {
              $q = "CREATE TABLE User(
                username varchar(50) PRIMARY KEY,
                password varchar(50) NOT NULL,
                fname varchar(50) NOT NULL,
                lname varchar(50)
                )";
              $con->exec($q);
            }

            $q="SELECT username FROM User WHERE username='$username' AND password='$password'";
            $result=$con->query($q);
            $assoc=$result->fetch();
            if(!empty($assoc))
            {
                session_start();
                // echo "<script> alert('Welcome $username.') </script>";
                $_SESSION['username'] = $username;
                header("Location: Dashboard.php");
                echo "<script>alert('Logged In');</script>";
                // echo "<script>LogoutDisplay()</script>";
            }
            else {
                echo "<script> alert('No Data Found.') </script>";
            }
          }
          catch (PDOException $e) {
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
          }
          finally{
            $con=NULL;
          }
        }
      }
      else if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['username']) && isset($_POST['Logout'])) {
          $_SESSION['username']="";
          session_unset();
          session_destroy();
          echo "<script>window.location.replace('Login.php')</script>";
      }
      else if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['username']) && !isset($_POST["PlayRecord"]) && !isset($_POST["SaveRecord"]) && !isset($_POST["recordBtn"])) {
        echo "<script> alert('You are currently logged in,cannot Signup/Login.') </script>";
      }
      
 ?>
