<?php
      /*SAVE DATABASE*/
      if(isset($_POST["SaveRecord"])&&isset($_SESSION['username']))
      {
        if (isset($_COOKIE["record"])&&isset($_COOKIE["recordName"])) {
          /*All database work */
          try {
            $con=new PDO('mysql:host=localhost;dbname=VirtualPiano;','root');
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            try{
              $checkTable=$con->query("SELECT 1 FROM Records LIMIT 1");
            }
            catch(Exception $e)
            {
              $q="CREATE TABLE Records(name varchar(50) NOT NULL,record varchar(10000) NOT NULL,username varchar(50) NOT NULL,
              PRIMARY KEY(name,username),FOREIGN KEY(username) REFERENCES Pianoist(username))";
              $con->exec($q);
            }

            $username=$_SESSION['username'];
            $recordName=$_COOKIE['recordName'];
            $record=$_COOKIE['record'];

            $q="SELECT name FROM Records WHERE name='$recordName' AND username='$username'";
            $result=$con->query($q);
            $assoc=$result->fetch();
            if(empty($assoc))
            {
              $q="INSERT INTO Records(name,record,username) VALUES('$recordName','$record','$username')";
              $con->exec($q);
              echo "<script> alert('$recordName named record is saved.') </script>";
              echo "<script>SaveRecordHide()</script>";
            }
            else {
              echo "<script> alert('Record name is similar to previous record.') </script>";
              echo "<script>SaveRecordHide()</script>";
            }
            echo "<script>document.cookie='recordName=;expires=Thu,01 Jan 1970 00:00:00 UTC;'</script>";
            echo "<script>document.cookie='record=;expires=Thu,01 Jan 1970 00:00:00 UTC;'</script>";
          }
          catch (PDOException $e) {
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
          }
          finally{
            $con=NULL;
          }
        }
        echo "<script>LogoutDisplay()</script>";
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
