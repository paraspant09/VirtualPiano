<?php
      require 'config.php';
      $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

      if(isset($_SESSION['username']))
      {
        /*All database work */
        try {
            $con=new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            try{
            $checkTable=$con->query("SELECT 1 FROM Records LIMIT 1");
            }
            catch(Exception $e)
            {
              echo "<script>alert('No table is created yet please save records.')</script>";
              goto end;
            }
            $username=$_SESSION['username'];

            $q="SELECT name,record FROM Records WHERE username='$username'";
            $result=$con->query($q);
            $ct=0;
            while($assoc=$result->fetch(PDO::FETCH_ASSOC)){
              $ct++;
              $name=$assoc['name'];
              $record=$assoc['record'];
              echo "<script> PlaySetUp('$name',$record) </script>";
            }
            if(!$ct)
            {
              echo "<script> alert('Save records to play.') </script>";
            }
      end:  }
        catch (PDOException $e) {
          $message=$e->getMessage();
          echo "<script> alert(\"$message\") </script>";
        }
        finally{
          $con=NULL;
        }
      }
      elseif (isset($_POST["PlayRecord"])) {
        echo "<script> alert('Login to play records.') </script>";
      }
 ?>
