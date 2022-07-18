<?php
      session_start();
      if(!isset($_SESSION['username']))
          echo "<script>window.location.replace('Login.php')</script>";

      require 'config.php';
      $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

      /*SAVE DATABASE*/
      if(isset($_POST["SaveRecord"])&&isset($_SESSION['username']))
      {
        if (isset($_COOKIE["record"])&&isset($_POST["recordName"])&&isset($_POST["visibility"])) {
          /*All database work */
          try {
            $con=new PDO($dsn,$db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            try{
              $checkTable=$con->query("SELECT 1 FROM Records LIMIT 1");
            }
            catch(Exception $e)
            {
              $q = "CREATE TABLE Records(
                name varchar(50) NOT NULL,
                record varchar(10000) NOT NULL,
                username varchar(50) NOT NULL,
                creation_date DATETIME,
                playCount int default 0,
                visibility varchar(7) CHECK( visibility in ('private','public')),
                PRIMARY KEY(name,username),FOREIGN KEY(username) REFERENCES User(username)
                )";
              $con->exec($q);
            }

            $username=$_SESSION['username'];
            $recordName=$_POST['recordName'];
            $record=$_COOKIE['record'];
            $visibility = $_POST['visibility'];
            $date = date("Y/m/d h:i:s");

            $q="SELECT name FROM Records WHERE name='$recordName' AND username='$username'";
            $result=$con->query($q);
            $assoc=$result->fetch();
            if(empty($assoc))
            {
              $q="INSERT INTO Records(name,record,username,visibility,creation_date) VALUES('$recordName','$record','$username', '$visibility', '$date')";
              $con->exec($q);
              echo "<script> alert('$recordName named record is saved.') </script>";
            }
            else {
              echo "<script> alert('Record name is similar to previous record.') </script>";
            }
            echo "<script>document.cookie='record=;expires=Thu,01 Jan 1970 00:00:00 UTC;'</script>";
            echo "<script> window.location.replace('Compose.php')</script>";

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
      else if(isset($_POST["SaveRecord"]))
      {
        if(isset($_COOKIE['recordName'])){
          echo "<script>alert('Please login to save records.')</script>";
          echo "<script>document.cookie='recordName=;expires=Thu,01 Jan 1970 00:00:00 UTC;'</script>";
        }
      }

      if(!isset($_SESSION['username'])){
        if(isset($_COOKIE['record'])){
          echo "<script>document.cookie='record=;expires=Thu,01 Jan 1970 00:00:00 UTC;'</script>";
        }
        if(isset($_COOKIE['recordName'])){
          echo "<script>document.cookie='recordName=;expires=Thu,01 Jan 1970 00:00:00 UTC;'</script>";
        }
      }
 ?>
