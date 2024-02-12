<!DOCTYPE html>
<html>
    <head>
        <title>SkyVerse</title>      
        <script src="../script/script.js"></script>

        <link rel="stylesheet" href="../Styles/styleSpace.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <?php
            if(!isset($_COOKIE['username'])) {
                $showButton = "";
                $showLable = true;
                $showLogout = false;
                $username = "";
            }
            else
            {
                $username = $_COOKIE['username'];
                $showButton = '<button type="submit" name ="delete" id ="deletebutton" > <i class="fa fa-trash"></i></button>';
                $showButtonPlus = '<button class="iconBtn" onclick="openForm()"><i class="fa fa-plus"></i></button>';
                $showLable = false;
                $showLogout = true;
            }
        ?>
        </head>
        <header class="header">
            <div style="background-color: black;"><h1 class="title"><b>SkyVerse</b></h1></div>
                <ul>
                    <li><a class="home" href="../index.php">Home</a></li>
                    <li><a href="space.php">Space</a></li>
                    <li><a href="IT.php">Computer Sience</a></li>
                    <li><a href="neuro.php">Neurology</a></li>
                    <li style="float:right; display: <?php echo $showLable ? 'block' : 'none'; ?>; "><a href="login.php">Login</a></li>
                    <li style="float:right; display: <?php echo $showLogout ? 'block' : 'none'; ?>;"><a href="unsetCookie.php">Logout</a></li>                
                    <li style="float:right;"><a href="history.php">History</a></li>
                </ul>
        </header>
    <body>
<!--------------------------- FORM POP-UP ADDCARD ------------------------------>
        <div class="formPopup" id="formPop">
            <form action="addCard.php" method="POST" class="form-container">
                <h1 style="color:black;">New Document</h1>

                <label for="title"><b>Title</b></label>
                <input type="text" placeholder="Enter Title" name="title" style="max-width:90%;" required>
                <input type="hidden" name="user" value=<?= $username?>>
                
                <button type ="submit" id="addCardBtn" class="btn">insert</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>

<!--
        <div class="formPopup2" id="formPop2">
            <form action="deleteEdit.php" class="form-container2" id="formDelete" method ="POST" >
                <h1 style="color:black;">Are you sure?</h1>
                <button type="submit" id="delete" class="btn" onclick="submitForm()"> delete </button>
                <input type="hidden" name="hiddenIndex" id="indexInput" value="">
            </form>
        </div>
-->
<!-- DIV CARDS -->
    <div class="divCards" style ="justify-content:center;margin-top:50px;">
    <table class="tableView">
    <tr>
        <th style="text-align:left; border-bottom:1px solid black;"><h2><b>Documents Space</b></h2></th>
        <th style="border-bottom:1px solid black;">
            <?php echo $showButtonPlus; ?>
        </th>
    </tr>
        <?php
            # $documents = json_decode(file_get_contents('documentSpace.json'), true);

        /*VIEW 1 */
        /*
            if(empty($documents)){
                echo "<h2>Nessuna pubblicazione disponibile, premi il tasto + per pubblicare una</h2>";
            } else {
                foreach ($documents as $index => $document) {
                    echo '<tr>
                        <td>
                            <div class="card">
                                <div class="cardImgContainer">
                                    <img class="cardImg" src="' . $document['image'] . '" style="width:100%">
                                    <div class="imgOverlay">
                                        <h1 style="  text-shadow: 2px 2px 5px #242424;"><b>' . $document['title'] . '</b></h1>
                                    </div>
                                </div>
                                <button type="submit" class="iconBtnCard" name="delete"><i class="fa fa-trash"></i></button>
                                <input type="hidden" name="index" value="' . $index . '">
                                <button class="iconBtnCard" onclick="openFormEdit()" name="edit" style="transform: translate(-130%, 40%);"><i class="fa fa-edit"></i></button>
                            </div>
                       </td> </tr>';
                }
            }

                <div class="formPopup2" id="formPop2">
                    <form action="deleteEdit.php" class="form-container2" id="formDelete_'.$index.'" method = "POST" >
                        <h1 style="color:black;">Are you sure?</h1>
                        <input type="hidden" name="hiddenIndex" id="indexInput" value="'.$index.'">
                        <button type="submit" name="delete" class="btn"> delete </button>
                    </form>
                </div>
        */

            /*VIEW 2*/
            /*
            if(empty($documents)){
                echo "<tr><td><h2>Nessuna pubblicazione disponibile, premi il tasto + per pubblicare una</h2></td></tr>";
            } else {
                    foreach ($documents as $index => $document) {
                        echo '
                            <tr>
                                <td>
                                    <i class="fa fa-file"></i>
                                    <a href ="'.$document['path'].'"><b>' . $document['title'] . '</b></a>
                                </td> 
                                <td style="text-align:center">
                                    <form action="deleteEdit.php" method ="POST">
                                        <input type="hidden" name="index" value="'.$index.'">
                                        '.($username == $document['user'] ? $showButton : '').'
                                    </form>
                                </td>
                            </tr>';
                    }
            }
            */
            require_once('../DataBase/DB.php');
            $DB = new DB();
            $sql = "SELECT id, title, path, username FROM documents";
            $documents = $DB->query($sql); 
            
            if ($documents->num_rows == 0) {
                echo "<tr><td><h2>Nessuna pubblicazione disponibile, premi il tasto + per pubblicare una</h2></td></tr>";
            } else {
                while ($document = $documents->fetch_assoc()) {
                    echo '
                        <tr>
                            <td>
                                <i class="fa fa-file"></i>
                                <a href ="'.$document['path'].'"><b>' . $document['title'] . '</b></a>
                            </td> 
                            <td style="text-align:center">
                                <form action="deleteEdit.php" method ="POST">
                                <input type="hidden" name="nameFile" value="'.basename(__FILE__).'"> 
                                    <input type="hidden" name="index" value="'.$document['id'].'"> 
                                    '.($username == $document['username'] ? $showButton : '').' 
                                </form>
                            </td>
                        </tr>';
                }
            }

        ?>
        </table>
        </div>
    </body>
</html>