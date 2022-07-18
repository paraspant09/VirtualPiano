<?php
    session_start();
    if(isset($_SESSION['username']))
        header("Location: Dashboard.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <link rel="stylesheet" href="res/css/NewStyle.css">
        <title>Virtual Piano</title>
    </head>
    <body  style="overflow:hidden">
        <div id="navbar">
            <header id="heading">VIRTUAL PIANO</header>            
        </div>

        <!-- <div class="flex-row"> -->
            <div class="flex-col" style="margin:10%">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">
                            <h2>REGISTER</h2>
                            <div class="underline-title"></div>
                        </div>
                        <form method="post" class="form" action="Register&Login.php">
                            <label for="username" style="padding-top:13px">
                                &nbsp;Username
                            </label>
                            <input id="username" class="form-content" type="username" name="username" autocomplete="on" required />
                            <div class="form-border"></div>
                            
                            <label for="password" style="padding-top:22px">&nbsp;Password
                            </label>
                            <input id="password" class="form-content" type="password" name="password" required />
                            <div class="form-border"></div>

                            <label for="fname" style="padding-top:22px">&nbsp;First Name
                            </label>
                            <input id="fname" class="form-content" type="text" name="fname" required />
                            <div class="form-border"></div>
                            
                            <label for="lname" style="padding-top:22px">&nbsp;Last Name
                            </label>
                            <input id="lname" class="form-content" type="text" name="lname" />
                            <div class="form-border"></div>

                            <input class="submit-btn" id="submitBtn" type="submit" name="Signup" value="Signup" />
                            <a href="Login.php" id="signup">Already have an account? Sign-in.</a>
                        </form>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        

    </body>
</html>