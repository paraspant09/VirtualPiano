<?php
      if ($_SERVER['REQUEST_METHOD']=='POST' && !isset($_SESSION['username'])) {
        if (isset($_POST['Signup'])) {
          $username=$_POST['username'];
          $password=$_POST['password'];

          try {
            $con=new PDO('mysql:host=localhost;dbname=VirtualPiano;','root');
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            try{
              $checkTable=$con->query("SELECT 1 FROM Pianoist LIMIT 1");
            }
            catch(Exception $e)
            {
              $q="CREATE TABLE Pianoist(username varchar(50) PRIMARY KEY,password varchar(50) NOT NULL)";
              $con->exec($q);
            }

            $q="SELECT username FROM Pianoist WHERE username='$username'";
            $result=$con->query($q);
            $assoc=$result->fetch();
            if(empty($assoc))
            {
              $q="INSERT INTO Pianoist(username,password) VALUES('$username','$password')";
              $con->exec($q);
              echo "<script> alert('Signed up as $username,Please Login.') </script>";
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
          $username=$_POST['username'];
          $password=$_POST['password'];
          try {
            $con=new PDO('mysql:host=localhost;dbname=VirtualPiano;','root');
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            try{
              $checkTable=$con->query("SELECT 1 FROM Pianoist LIMIT 1");
            }
            catch(Exception $e)
            {
              $q="CREATE TABLE Pianoist(username varchar(50) PRIMARY KEY,password varchar(50) NOT NULL)";
              $con->exec($q);
            }

            $q="SELECT username FROM Pianoist WHERE username='$username' AND password='$password'";
            $result=$con->query($q);
            $assoc=$result->fetch();
            if(!empty($assoc))
            {
                echo "<script> alert('Welcome $username.') </script>";
                $_SESSION['username']=$username;
                echo "<script>LogoutDisplay()</script>";
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
      else if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['username']) && !isset($_POST["PlayRecord"]) && !isset($_POST["SaveRecord"]) && !isset($_POST["recordBtn"])) {
        echo "<script> alert('You are currently logged in,cannot Signup/Login.') </script>";
      }

 ?>
