<!DOCTYPE html>
<html>
<!--------------------------- COOKIE ------------------------------>
    <?php

    if(!isset($_COOKIE['username'])) {
        $showButton = "";
        $showLable = true;
        $showLogout = false;
    }
    else
    {
        $username = $_COOKIE['username'];
        $showButton = '<button class="iconBtn" style="margin-right:40px;" onclick="openForm()"><i class="fa fa-plus"></i></button>';
        $showLable = false;
        $showLogout = true;
        $response = "<h3>Home Page di $username</h3><br />";
    }

/*--------------------------- SESSION ------------------------------
        session_start();
        if(!isset($_SESSION['username']))
        {
            $showButton = false;
            $showLable = true;
            //header("Location: login.php");
        }
        else
        {
            $showButton = true;
            $showLable = false;
            $response = "<h3>Bentornato ".$_SESSION['username'].", ecco le tue ricette</h3><br />";
        }
        */
    ?>

<!--------------------------- HEADER ------------------------------>
    <head>
        <script src="script/script.js"></script>
        <link rel="stylesheet" href="Styles/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>
        <title>SkyVerse</title>      
        <script> function redirect(){ window.location.href = "pages/login.php"; } </script>  
    </head>
    <header class="header">
        <div style="background-color: black;"><h1 class="title"><b>SkyVerse</b></h1></div>
            <ul>
                <li><a class="home" href="index.php">Home</a></li>
                <li><a href="pages/space.php">Space</a></li>
                <li><a href="pages/IT.php">Computer Sience</a></li>
                <li><a href="pages/neuro.php">Neurology</a></li>
                <li style="float:right; display: <?php echo $showLable ? 'block' : 'none'; ?>; "><a href="pages/login.php">Login</a></li>
                <li style="float:right; display: <?php echo $showLogout ? 'block' : 'none'; ?>;"><a href="pages/unsetCookie.php">Logout</a></li>                
            </ul>
    </header>
    <body style="text-align:center;">

<!--
            <div style="text-align:right; justify-content:right;"> 
                    <button class="loginBtn" onclick="redirect()" style="display: <?php echo $showLable ? 'block' : 'none'; ?>; "><b>Login</b></button>  
                <form action ="unsetCookie.php" method ="POST"  style="display: <?php echo $showLogout ? 'block' : 'none'; ?>;">
                    <button type="submit" class ="btnLogOut"><i class="gg-log-out" style="display: <?php echo $showLogout ? 'block' : 'none'; ?>;"></i></button>
                </form>
            </div>
-->
    
<!--------------------------- SEZIONE ------------------------------>
        <section id="cardSection" style="text-align: center;">
<!--------------------------- FORM POP-UP EDITCARD------------------------------>
            <div class="formPopupEdit" id="formPopupEdit">
                <form action="pages/deleteEdit.php" method="POST" class="form-containerEdit">
                    <h1>Modifica Ricetta</h1>

                    <label for="titleEdit"><b>Titolo</b></label>
                    <input type="text" placeholder="Enter Title" name="titleEdited" required>

                    <label for="ingredientiEdited"><b>Ingredienti</b></label>
                    <input type="text" placeholder="Enter ingredients" name="ingredientiEdited" required>

                    <label for="istructionsEdited"><b>Istruzioni</b></label>
                    <input type="text" placeholder="Enter instructions" name="istructionsEdited" required> 

                    <button type ="submit" id="addCardBtnEdit" class="btn">insert</button>
                    <button type="button" class="btn cancel edit" onclick="closeFormEdit()">Close</button>
                </form>
            </div>

<!---------------------------HOMEPAGE------------------------------>
            <div class="divHomePageImg">
                <img class="img" src="imgs/nasa.jpg"  style="width:100%;  height: auto;">
                <div class="overlayText">
                   <?php if(!empty($response)){ /*echo*/ $response; }?> 
                   <p class="bigParagraph">IT and Space </p><br>
                   <p class="bigParagraph">Repository</p><br>
                   <p class ="littleParagraph">Una ricca raccolta di documenti sull'informatica,</p>
                   <p class ="littleParagraph">il tuo go-to repository per risorse e conoscenze nel</p> 
                   <p class ="littleParagraph">mondo della scienza e della tecnologia.</p><br>
                   <button class="getStartedBtn"><h2>GET STARTED</h2></button>
                </div>
            </div>

            <div class ="topicSectionDiv" >
                    <div class="topicGrid">
                        <p class="bigParagraph" style="text-shadow: none; font-size:50px; " >Explore Topics from SkyVerse </p><br>
                        <!-- <?= $showButton ?> BUTTON PLUS -->
                    </div>

<!--------------------------- ADDCARDS MECHANISM ------------------------------>
                <div class="divCards" style ="justify-content:center;margin-top:50px;">
                    <div class="card">
                        <div class="cardImgContainer">
                            <a href="pages/space.php"><img class="cardImg" src="imgs/nebula.jpg" style="width:100%"></a>
                            <div class="imgOverlay">
                                <h1 style="  text-shadow: 2px 2px 5px #242424;"><b>SPACE</b></h1>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="cardImgContainer">
                            <a href="pages/IT.php"><img class="cardImg" src="imgs/info.png" style="width:100%"></a>
                            <div class="imgOverlay">
                                <h1 style="  text-shadow: 2px 2px 5px #242424;"><b>INFORMATION TECHNOLOGY</b></h1>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="cardImgContainer">
                            <a href="pages/neuro.php"><img class="cardImg" src="imgs/sinapsi.jpg" style="width:100%"></a>
                            <div class="imgOverlay">
                                <h1 style="  text-shadow: 2px 2px 5px #242424;"><b>NEUROLOGY</b></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <footer>
        <div class="footer">
            <p>&copy; 2024 | Tutti i diritti riservati.</p>
        </div>
    </footer>
</html>
