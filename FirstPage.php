<?php session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="Style.css">
    <title>Virtual Piano</title>
  </head>
  <body>
    <div id="navbar">
    	  <header id="heading" onclick="Home()">VIRTUAL PIANO</header>
        <button id="icon" onclick="changeIcon()">&#9776;</button>
    	  <div class="options" id="options">
        		<button type="button" id="Record/Stop" class="pressedNav" onclick="StartRecord()">RECORD</button>

            <form id="playForm" action="FirstPage.php" method="post">
                <button type="submit" id="PLAY" name="PlayRecord" value="Yes" class="pressedNav">PLAY</button>
            </form>

    				<button type="button" id="SIGNUP" class="pressedNav" onclick="AuthStyleSheet('Signup')">SIGN UP</button>
    				<button type="button" id="LOGIN"  class="pressedNav" onclick="AuthStyleSheet('login')">LOGIN</button>
        		<button type="button" id="HELP" class="pressedNav" onclick="Help()">HELP</button>
        </div>
    </div>

    <form action="FirstPage.php" id="DropDownPlay" method="post">
    </form>

    <div id="restbody">

      <form class="FormExtraButtons" id="logoutForm" action="FirstPage.php" method="post">
          <input type="submit" class="ExtraButtons" id="logout" name="Logout" value="logout">
      </form>




      <div id="HelpDoc">
        <article>
          <h4>The site may give a warning message to enable autoplay while playing saved records .For which you
          have to find Autoplay permission allow in settings.
          For mozilla the path is:Privacy & Security>Permissions>Autoplay>Default for all websites>Allow Audio and Video.</h3>

          <h4>You have an option to play piano throuugh keys of keyboard.Follow the image:</h3>
          <img src="KeyboardPianoControls.png" alt="How to play Piano through keyboard Controls">
        </article>
      </div>

      <div id="pianobody">
        <div class="notmid image"></div>
        <div class="mid image"></div>
        <div class="notmid image"></div>
        <div id="keys">

  		  <button type="button" id="C2" onmousedown="Click('C2.mp3')" class="lowerkeys"></button>
          <button type="button" id="C2s" onmousedown="Click('C2s.mp3')" class="upperkeys"></button>
          <button type="button" id="D2" onmousedown="Click('D2.mp3')" class="right lowerkeys"></button>
          <button type="button" id="D2s" onmousedown="Click('D2s.mp3')" class="upperkeys"></button>
          <button type="button" id="E2" onmousedown="Click('E2.mp3')" class="right lowerkeys"></button>
          <button type="button" id="F2" onmousedown="Click('F2.mp3')" class="adjacent lowerkeys"></button>
          <button type="button" id="F2s" onmousedown="Click('F2s.mp3')" class="upperkeys"></button>
          <button type="button" id="G2" onmousedown="Click('G2.mp3')" class="right lowerkeys"></button>
          <button type="button" id="G2s" onmousedown="Click('G2s.mp3')" class="upperkeys"></button>
          <button type="button" id="A2" onmousedown="Click('A2.mp3')" class="right lowerkeys"></button>
          <button type="button" id="A2s" onmousedown="Click('A2s.mp3')" class="upperkeys"></button>
          <button type="button" id="B2" onmousedown="Click('B2.mp3')" class="right lowerkeys"></button>


          <button type="button" id="C3" onmousedown="Click('C3.mp3')" class="adjacent lowerkeys"></button>
          <button type="button" id="C3s" onmousedown="Click('C3s.mp3')" class="upperkeys"></button>
          <button type="button" id="D3" onmousedown="Click('D3.mp3')" class="right lowerkeys"></button>
          <button type="button" id="D3s" onmousedown="Click('D3s.mp3')" class="upperkeys"></button>
          <button type="button" id="E3" onmousedown="Click('E3.mp3')" class="right lowerkeys"></button>
          <button type="button" id="F3" onmousedown="Click('F3.mp3')" class="adjacent lowerkeys"></button>
          <button type="button" id="F3s" onmousedown="Click('F3s.mp3')" class="upperkeys"></button>
          <button type="button" id="G3" onmousedown="Click('G3.mp3')" class="right lowerkeys"></button>
          <button type="button" id="G3s" onmousedown="Click('G3s.mp3')" class="upperkeys"></button>
          <button type="button" id="A3" onmousedown="Click('A3.mp3')" class="right lowerkeys"></button>
          <button type="button" id="A3s" onmousedown="Click('A3s.mp3')" class="upperkeys"></button>
          <button type="button" id="B3" onmousedown="Click('B3.mp3')" class="right lowerkeys"></button>

          <button type="button" id="C4" onmousedown="Click('C4.mp3')" class="adjacent lowerkeys"></button>
          <button type="button" id="C4s" onmousedown="Click('C4s.mp3')" class="upperkeys"></button>
          <button type="button" id="D4" onmousedown="Click('D4.mp3')" class="right lowerkeys"></button>
          <button type="button" id="D4s" onmousedown="Click('D4s.mp3')" class="upperkeys"></button>
          <button type="button" id="E4" onmousedown="Click('E4.mp3')" class="right lowerkeys"></button>
          <button type="button" id="F4" onmousedown="Click('F4.mp3')" class="adjacent lowerkeys"></button>
          <button type="button" id="F4s" onmousedown="Click('F4s.mp3')" class="upperkeys"></button>
          <button type="button" id="G4" onmousedown="Click('G4.mp3')" class="right lowerkeys"></button>
          <button type="button" id="G4s" onmousedown="Click('G4s.mp3')" class="upperkeys"></button>
          <button type="button" id="A4" onmousedown="Click('A4.mp3')" class="right lowerkeys"></button>
          <button type="button" id="A4s" onmousedown="Click('A4s.mp3')" class="upperkeys"></button>
          <button type="button" id="B4" onmousedown="Click('B4.mp3')" class="right lowerkeys"></button>


          <button type="button" id="C5" onmousedown="Click('C5.mp3')" class="adjacent lowerkeys"></button>
          <button type="button" id="C5s" onmousedown="Click('C5s.mp3')" class="upperkeys"></button>
          <button type="button" id="D5" onmousedown="Click('D5.mp3')" class="right lowerkeys"></button>
          <button type="button" id="D5s" onmousedown="Click('D5s.mp3')" class="upperkeys"></button>
          <button type="button" id="E5" onmousedown="Click('E5.mp3')" class="right lowerkeys"></button>
          <button type="button" id="F5" onmousedown="Click('F5.mp3')" class="adjacent lowerkeys"></button>
          <button type="button" id="F5s" onmousedown="Click('F5s.mp3')" class="upperkeys"></button>
          <button type="button" id="G5" onmousedown="Click('G5.mp3')" class="right lowerkeys"></button>
          <button type="button" id="G5s" onmousedown="Click('G5s.mp3')" class="upperkeys"></button>
          <button type="button" id="A5" onmousedown="Click('A5.mp3')" class="right lowerkeys"></button>
          <button type="button" id="A5s" onmousedown="Click('A5s.mp3')" class="upperkeys"></button>
          <button type="button" id="B5" onmousedown="Click('B5.mp3')" class="right lowerkeys"></button>

        </div>
      </div>
      <form class="FormExtraButtons" id="SaveForm" action="FirstPage.php" method="post">
            <input type="submit" class="ExtraButtons" id="SaveRecord" name="SaveRecord" onclick="Prompt()" value="Save">
      </form>
    </div>

    <footer><p>Made By Paras Pant.</p></footer>

    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript">
      function Prompt() {
        let rcord;
        do
        {
          rcord = prompt("Enter name of record file:");
          if(rcord=="")
            alert("Please enter a name.")
          if(rcord==null)
          {
            let check=confirm("Are you sure you don't want to save record.")
            if(check){
              document.cookie='record=;expires=Thu,01 Jan 1970 00:00:00 UTC;';
              return;
            }
          }
        }while(rcord==""||rcord==null);
        document.cookie="recordName="+rcord;
      }
    </script>
    <?php
    if(isset($_COOKIE["record"])&&isset($_COOKIE["recordName"])&&isset($_SESSION['username']))
    {
      echo "<script>SaveRecordDisplay()</script>";
    }

    if(isset($_POST["recordBtn"])&&isset($_SESSION['username']))    //For playing the selected record
    {
      $obj=$_POST['recordBtn'];
      echo "<script>Play('$obj')</script>";
    }

    include 'PlayRecords.php';

    if(isset($_POST["Logout"])&&isset($_SESSION['username']))
    {
      $_SESSION['username']="";
      session_unset();
      session_destroy();

      echo "<script>LogoutHide()</script>";
      echo "<script>SaveRecordHide()</script>";
    }


    include 'SaveRecord.php';

    if(isset($_SESSION['username']))
    {
      echo "<script>LogoutDisplay()</script>";
    }


    include 'Register&Login.php';

     ?>

  </body>
</html>
