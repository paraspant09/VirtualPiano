<?php
    session_start();
    if(!isset($_SESSION['username']))
        header("Location: Login.php");

    require "fetcher.php";
    $userRecord = userFetcher($_SESSION['username']);
    $latestTracks = fetchUserRecentTracks($_SESSION['username']);
    $popularTracks = fetchUserPopularTracks($_SESSION['username']);
    

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="stylesheet" href="res/css/NewStyle.css">
        <title>Virtual Piano</title>
        <script src='player.js'></script>
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
            <div class="flex-row" style="text-align:center; margin: 10px 0px 10px 0px">
                <div class="flex-col welcome-note">
                    <h4>Hello <?php echo $userRecord['fname'].' '.$userRecord['lname']?></h4>
                    <div class="underline-title"></div>
                    <a class='submit-btn' style="height:fit-content;padding:10px;margin-top:10px" href="MySongs.php" >All songs</a>
                </div>
            </div>
            <div class="flex-row">
                <div class="flex-col" style="width:45%">
                    <div class="card highlights">
                            <div class="card-title highlights-title">
                                <h2 style="color:antiquewhite">Your Recent Tracks</h2>
                                <div class="underline-title"></div>
                            </div>
                            <?php
                                if(sizeof($latestTracks) == 0)
                                    echo "<p>No tracks yet</p>";
                                else{
                                    
                                    echo "<div class='highlights-list-header'>";
                                    echo "<p style='width:100%'><b>Track Name</b></p>";
                                    echo "</div>";
                                    echo "<div class='scrollable-list'>";
                                    foreach($latestTracks as $trackName){
                                        $artist_username = $_SESSION['username'];
                                        echo "<button type='button' class='highlights-list-item' onclick=\"fetchAndPlaySong('$artist_username', '$trackName')\">";
                                        echo "<p style='width:50%'><i>$trackName</i></p>";
                                        echo "</button>";
                                    }
                                    echo "</div>";
                                }
                            ?>
                    </div>
                </div>
                <div class="flex-col" style="width:45%">
                    <div class="card highlights">
                        <div class="card-title">
                            <h2 style="color:antiquewhite">Your Top Tracks</h2>
                            <div class="underline-title"></div>
                        </div>
                        <?php
                            if(sizeof($popularTracks) == 0)
                                echo "<p>No tracks yet</p>";
                            else{
            
                                echo "<div class='highlights-list-header'>";
                                echo "<p style='width:75%'><b>Name</b></p>";
                                echo "<p style='width:25%'><b>Plays</b></p>";
                                echo "</div>";
                                echo "<div class='scrollable-list'>";
                                foreach($popularTracks as $track){
                                    $trackName = $track['name'];
                                    $playCount = $track['playCount'];
                                    $artist_username = $_SESSION['username'];
                                    echo "<button type='button' class='highlights-list-item' onclick=\"fetchAndPlaySong('$artist_username', '$trackName')\">";
                                    echo "<p style='width:75%'><i>$trackName</i></p>";
                                    echo "<p style='width:25%'>$playCount</p>";
                                    echo "</button>";
                                }
                                echo "</div>";
                                
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>