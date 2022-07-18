<?php
    session_start();
    if(!isset($_SESSION['username']))
        header("Location: Login.php");

    require "fetcher.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="stylesheet" href="res/css/NewStyle.css">
        <script src="player.js"></script>
        <title>Virtual Piano</title>
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
            <form method="GET" action="Search.php" class="flex-row w-100" style="text-align:center; margin: 10px 0px 10px 0px">
                <div class=flex-items>
                    <input class="searchbox" type="text" name="searchKey" id="searchKey" placeholder="Enter song name or artist name/username">
                    <button class="search-btn" type="submit" id="search">Search</button> 
                </div>
            </form>
            <div class="flex-row">
                <div class="flex-col" style="width:45%">
                    <div class="card highlights">
                            <div class="card-title highlights-title">
                                <h2 style="color:antiquewhite">Songs</h2>
                                <div class="underline-title"></div>
                            </div>
                            <?php
                                if(isset($_GET["searchKey"])){
                                    $tracks = fetchSearchTracks($_GET["searchKey"]);
                                    $artists = fetchSearchArtists($_GET["searchKey"]);
                                }
                                if(isset($tracks)){
                                    if(sizeof($tracks) == 0)
                                        echo "<p>Couldn't find any matching tracks</p>";
                                    else{
                                        echo "<div class='highlights-list-header'>";
                                        echo "<p style='width:50%'><b>Track Name</b></p>";
                                        echo "<p style='width:50%'><b>Artist</b></p>";
                                        echo "</div>";
                                        echo "<div class='scrollable-list'>";
                                        foreach($tracks as $track){
                                            $trackName = $track['name'];
                                            $username = $track['username'];
                                          
                                            echo "<button type='button' class='highlights-list-item' onclick=\"fetchAndPlaySong('$username', '$trackName')\">";
                                            echo "<p style='width:50%'><i>$trackName</i></p>";
                                            echo "<p style='width:25%'>$username</p>";
                                            echo "</button>";
                                        }
                                        echo "</div>";
                                    }
                                }
                            ?>
                    </div>
                </div>
                <div class="flex-col" style="width:45%">
                    <div class="card highlights">
                        <div class="card-title">
                            <h2 style="color:antiquewhite">Artists</h2>
                            <div class="underline-title"></div>
                        </div>
                        <?php
                        if(isset($artists)){
                            if(sizeof($artists) == 0)
                                echo "<p>Couldn't find any matching artists</p>";
                            else{
                            
                                echo "<form method='GET' action='Artist.php' style='width:100%'>";
                                echo "<li class='highlights-list-header'>";
                                echo "<p style='width:50%'><b>Username</b></p>";
                                echo "<p style='width:50%'><b>Full Name</b></p>";
                                echo "</li>";
                                echo "<ul class='scrollable-list'>";
                                foreach($artists as $artist){
                                    $username = $artist['username'];
                                    $fullname = $artist['fullname'];
                                    echo "<button type='submit' name='username' value='$username' class='highlights-list-item'>";
                                    echo "<p style='width:50%'><i>$username</i></p>";
                                    echo "<p style='width:50%'>$fullname</p>";
                                    echo "</button>";
                                }
                                echo "</ul>";
                                echo "</form>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>