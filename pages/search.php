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
            <div style="background-color: black;"><h1 class="title"><b>Search Results</b></h1></div>
                <ul>
                    <li><a class="home" href="../index.php">Home</a></li>
                    <li><a href="space.php">Space</a></li>
                    <li><a href="IT.php">Computer Sience</a></li>
                    <li><a href="neuro.php">Neurology</a></li>
                    <li style="float:right; display: <?php echo $showLable ? 'block' : 'none'; ?>; "><a href="login.php">Login</a></li>
                    <li style="float:right; display: <?php echo $showLogout ? 'block' : 'none'; ?>;"><a href="unsetCookie.php">Logout</a></li>                
                    <li style="float:right;"><a href="history.php">History</a></li>
                </ul>
                <div class="box">
                    <form action="search.php" method ="POST">
                        <input type="search" name ="searchBar" placeholder="Type something...">
                        <button class ="buttonSearch" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
        </header>
    <body>
<!-- DIV CARDS -->
    <div class="divCards" style ="text-align:left; align-items: left; justify-content:center;margin-top:50px;">
    <table class="tableView">
    <tr>
        <th style="text-align:left; border-bottom:1px solid black;"><h2><b>Results for "<?php echo $_POST['searchBar']; ?>"</b></h2></th>
        <th style="border-bottom:1px solid black;"><h2><b>Author</b></h2></th>
    </tr>
        <?php
            require_once('../DataBase/DB.php');

            $term = $_POST['searchBar'];
            $present = false;

            $DB = new DB();

            $sql= "SELECT id, title, path, username FROM documents WHERE title LIKE ? OR content LIKE ? ";
            $params = ["%$term%", "%$term%"];
            $types = "ss";
            $documents = $DB->preparedQuery($sql, $params, $types);
            
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
                            <td style="text-align:center;">
                                <a href ="'.$document['path'].'"><b>' . $document['username'] . '</b></a>
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