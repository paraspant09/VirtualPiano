<?php
    require "config.php";
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    function userFetcher($username){
        $record = array();
        try{
            global $dsn, $db_user, $db_password;
            $con = new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $q = "SELECT fname,lname FROM User WHERE username='$username'";
            $result=$con->query($q);
            $assoc=$result->fetch();
            $record['fname'] = $assoc['fname'];
            $record['lname'] = $assoc['lname'];
        }catch(PDOException $e){
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
        }
        finally{
            $con=NULL;
        }
        return $record;
    }

    function fetchUserPublicTracks($username){
        $records = array();
        try{
            global $dsn, $db_user, $db_password;
            $con = new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $q = "SELECT * FROM Records WHERE username='$username' and visibility='public' ORDER BY creation_date DESC";
            $result=$con->query($q);
            // $ct=0;
            while($assoc=$result->fetch(PDO::FETCH_ASSOC)){
            //   $ct++;
              array_push($records,$assoc);
            }
            
        }catch(PDOException $e){
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
        }
        finally{
            $con=NULL;
        }
        return $records;
    
    }

    function fetchUserPrivateTracks($username){
        $records = array();
        try{
            global $dsn, $db_user, $db_password;
            $con = new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $q = "SELECT * FROM Records WHERE username='$username' and visibility='private' ORDER BY creation_date DESC";
            $result=$con->query($q);
            // $ct=0;
            while($assoc=$result->fetch(PDO::FETCH_ASSOC)){
            //   $ct++;
              array_push($records,$assoc);
            }
            
        }catch(PDOException $e){
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
        }
        finally{
            $con=NULL;
        }
        return $records;
    
    }
    function fetchUserRecentTracks($username){
        $records = array();
        try{
            global $dsn, $db_user, $db_password;
            $con = new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $q = "SELECT name FROM Records WHERE username='$username' ORDER BY creation_date DESC LIMIT 5";
            $result=$con->query($q);
            $ct=0;
            while($assoc=$result->fetch(PDO::FETCH_ASSOC)){
              $ct++;
              array_push($records,$assoc['name']);
            }
            
        }catch(PDOException $e){
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
        }
        finally{
            $con=NULL;
        }
        return $records;
    }
    function fetchUserPopularTracks($username){
        $records = array();
        try{
            global $dsn, $db_user, $db_password;
            $con = new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $q = "SELECT name,playCount FROM Records WHERE username='$username' ORDER BY playCount DESC LIMIT 5";
            $result=$con->query($q);
            $ct=0;
            while($assoc=$result->fetch(PDO::FETCH_ASSOC)){
              $ct++;
              array_push($records,$assoc);
            }
            
        }catch(PDOException $e){
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
        }
        finally{
            $con=NULL;
        }
        return $records;
    }

    function fetchSearchArtists($keyword){
        $records = array();
        try{
            global $dsn, $db_user, $db_password;
            $con = new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $q = "SELECT username,CONCAT(fname,' ',COALESCE(lname,'')) fullname FROM USER WHERE username like '%$keyword%' OR CONCAT(fname,' ',COALESCE(lname,'')) like '%$keyword%'";
            $result=$con->query($q);
            $ct=0;
            while($assoc=$result->fetch(PDO::FETCH_ASSOC)){
              $ct++;
              array_push($records,$assoc);
            }
            
        }catch(PDOException $e){
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
        }
        finally{
            $con=NULL;
        }
        return $records;
    }

    function fetchSearchTracks($keyword){
        $records = array();
        try{
            global $dsn, $db_user, $db_password;
            $con = new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $q = "SELECT username,name FROM Records WHERE visibility='public' and  name like '%$keyword%'";
            $result=$con->query($q);
            $ct=0;
            while($assoc=$result->fetch(PDO::FETCH_ASSOC)){
              $ct++;
              array_push($records,$assoc);
            }
            
        }catch(PDOException $e){
            $message=$e->getMessage();
            echo "<script> alert(\"$message\") </script>";
        }
        finally{
            $con=NULL;
        }
        return $records;
    }

?>