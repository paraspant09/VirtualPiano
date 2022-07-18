<?php
    session_start();

    
    if(!isset($_SESSION['username']))
        echo "<script> window.location.replace('Login.php')</script>";
    
    require "config.php";
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    if(($_SERVER['REQUEST_METHOD'] == "GET") && isset($_GET['username']) && isset($_GET['songName'])){
        $recordData = "{}";
        $songOwner = $_GET['username'];
        $songName = $_GET['songName'];
        try{
            $con = new PDO($dsn, $db_user, $db_password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if($songOwner == $_SESSION['username'])
                $q = "SELECT record FROM Records WHERE name='$songName' and username='$songOwner'";
            else
                $q = "SELECT record FROM Records WHERE visibility='public' and name='$songName' and username='$songOwner'";
            $result=$con->query($q);
            $assoc = $result->fetch();
            if(!empty($assoc)){
                $recordData = $assoc['record'];
                if($songOwner != $_SESSION['username'])
                    $con->exec("UPDATE Records SET playCount=playCount+1 where name='$songName' and username='$songOwner'");
            }
            // $ct=0;
            // while($assoc=$result->fetch(PDO::FETCH_ASSOC)){
            //   $ct++;
            //   array_push($records,$assoc);
            // }
        }catch(PDOException $e){
            $message=$e->getMessage();
            // echo "<script> alert(\"$message\") </script>";
        }
        finally{
            $con=NULL;
        }
        echo $recordData;
    }
?>