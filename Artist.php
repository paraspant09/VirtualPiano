<?php
    session_start();
    if(!isset($_SESSION['username']))
        echo "<script> window.location.replace('Login.php')</script>";


    if($_SERVER['REQUEST_METHOD'] != "GET" || !isset($_GET['username'])){
        echo "<script> window.location.replace('Dashboard.php')</script>";
    }
    require "fetcher.php";
    $artist_username = $_GET['username'];
    $userRecord = userFetcher($artist_username);
    if(empty($userRecord))
        exit("Unable to fetch Artist");
    $tracks = fetchUserPublicTracks($artist_username);
    
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="stylesheet" href="res/css/NewStyle.css">
        <title>Virtual Piano</title>
        <script src="player.js"></script>
        <script>
            function changeIcon(){
                let icon=document.getElementById("icon").innerHTML;
                if(icon == "✖"){
                    document.getElementById("icon").innerHTML="&#9776;";

                    document.getElementById("options").style.height="0%";
                    document.getElementById("options").style.opacity="0";
                    document.getElementById("options").style.pointerEvents="none";

                    document.getElementById("restbody").style.position="static";
                    document.getElementById("restbody").style.zIndex="0";
                }
                else{
                    document.getElementById("icon").innerHTML="&#10006";

                    document.getElementById("options").style.height="100%";
                    document.getElementById("options").style.opacity="1";
                    document.getElementById("options").style.pointerEvents="all";

                    document.getElementById("restbody").style.position="relative";
                    document.getElementById("restbody").style.zIndex="-1";
                    document.getElementById("DropDownPlay").style.display="none";
                }
            }
            window.matchMedia("(min-width: 955px)").addListener(()=>{		//remove inline styles made by clicking icon in small window or calling changeIcon()
	            document.getElementById("restbody").removeAttribute("style");
	            document.getElementById("options").removeAttribute("style");
            });

        </script>
    </head>
    <body style="overflow:hidden">
        <div id="navbar">
            <header id="heading2" onclick="Home()">VIRTUAL PIANO</header>
            <button id="icon" onclick="changeIcon()">&#9776;</button>
            <div class="options" id="options">
                <a class="pressedNav" href="Dashboard.php">DASHBOARD</a>
                <a class="pressedNav" href="Search.php"> SEARCH </a>
                <a class="pressedNav" href="Compose.php">COMPOSE</a>
                <form id="playForm" action="Register&Login.php" method="post">
                    <button type="submit" name="Logout" value="Logout" class="pressedNav">LOGOUT</button>
                </form>
            </div>
        </div>
        <div id="restbody">
            <div class="flex-row">
                <div class="flex-col card highlights" style="width:50%;padding:0px">
                    <div class="card-title">
                        <h4 style="color:antiquewhite">Artist Name: <?php echo $userRecord['fname'].' '.$userRecord['lname'] ?></h4>
                    </div>
                </div>
            </div>
            <div class="flex-row">
                <div class="flex-col" style="width:60%; height:300px">
                    <div class="card highlights">
                            <div class="card-title highlights-title">
                                <h2 style="color:antiquewhite">Songs</h2>
                                <div class="underline-title"></div>
                            </div>
                            
                            <?php
                                if(isset($tracks)){
                                    if(sizeof($tracks) == 0)
                                        echo "<p>No tracks made by this user</p>";
                                    else{
                                        echo "<div class='highlights-list-header'>";
                                        echo "<p style='width:50%'><b>Name</b></p>";
                                        echo "<p style='width:25%'><b>Plays</b></p>";
                                        echo "<p style='width:25%'><b>Created</b></p>";
                                        echo "</div>";
                                        echo "<div class='scrollable-list'>";
                                        foreach($tracks as $track){
                                            $trackName = $track['name'];
                                            $playCount = $track['playCount'];
                                            $creat_time = strtotime($track['creation_date']);

                                            $creatDate = date('d-m-Y',$creat_time);
                                            echo "<button type='button' class='highlights-list-item' onclick=\"fetchAndPlaySong('$artist_username', '$trackName')\">";
                                            echo "<p style='width:50%'><i>$trackName</i></p>";
                                            echo "<p style='width:25%'>$playCount</p>";
                                            echo "<p style='width:25%'>$creatDate</p>";
                                            echo "</button>";
                                        }
                                        echo "</div>";
                                        
                                    }
                                }

                            
                                
                            ?>
                            
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>