<!DOCTYPE html>
<html>

    <head>
        <title>History</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            *{
                margin: 0;
                padding: 0;
                font-family: Arial, Helvetica, sans-serif;
            }
            header{
                position: fixed;
                top: 0;
                width: 100%; 
                z-index: 999;
            }

            h1{
                text-align:center;
                font-size: 3vw;
            }
            .form{
                bottom: 0;
                width: 90%;;
                border-radius:20px;
                justify-content: center;
                align-items: center;
                color:black;
                backdrop-filter: blur(10px);
                margin-bottom:100px;
            }
            .background{
                background-position:center;
                background-size: 80%;
                /* background-image: url('../imgs/nebula.jpg'); */
            }
            section{
                min-height: 100vh;
                width:100%;
                display:flex;
                align-items: center;
                justify-content: center;
                text-align:center;
                margin-top:100px;
            }
            .foreach{
                margin:20px;
                align-items:center;
                text-align:left;
            }
            a{
                text-decoration:none;
                color:white;
            }
            .btn{
                padding:10px 15px;
                background-color: black;
                border: none;
                font-weight: bold;
                border-radius:4px;
                margin-bottom:10px;
                cursor:pointer;
            }

            /*navbar*/
            ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #000000de;
            border-top:1px solid #bbb;
            }

            li {
            float: left;
            border-left:1px solid #bbb;
            border-right:1px solid #bbb;
            border-bottom:1px solid #bbb;
            }

            li:last-child {
            border-right: none;
            }

            li a {
            display: block;
            color: white;
            text-align: center;
            padding: 10px 10px;
            text-decoration: none;
            }

            li a:hover:not(.home) {
            background-color:#1d1d1d;
            text-decoration: none;
            transition:500ms;
            }

            .home {
            background-color: #4a93b4;
            }
            
            .home:hover{
            background-color: #45b8cc;
            text-decoration: none;
            transition:500ms;
            }

            .title{
            text-align:center;
            justify-content:center;
            padding-top:10px;
            padding-bottom:10px;
            font-size:60px;
            color:white;
            }

            /*TABELLA*/
            .table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px; 
                border-radius:20px;
            }
            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd; 
            }
            th{ 
                font-weight:bold;
                font-size:20px;
                border-right: 1px solid #ddd;
            }

            
/*-----------------------------SEARCH BAR-----------------------------*/
body{
  text-align:center;
}
.box{
  height: 30px;
  cursor:pointer;
  align-items: center;
  padding: 10px 20px;
  background:transparent ;
  border-radius: 30px;
}

.box:hover input{
  width:400px;
}

.box input{
  width:200px;
  height: 35px;
  border-radius: 10px;
  background-color: #fff;
  outline:none;
  border:none;
  background-color: whitesmoke;
  transition: 800ms;
  padding-left: 10px;
  padding-right: 10px;
}

.buttonSearch{
  color: black;
  background-color: whitesmoke;
  font-weight:bold;
  padding: 9px 11px;
  border-radius:20px;
  text-decoration: none;
  border:none;
  cursor:pointer;
}

            
        </style>
    </head>
    <?php
        if(!isset($_COOKIE['username'])) {
            $showButton = "";
            $showLable = true;
            $showLogout = false;
            $username ="";
        }
        else
        {
            $username = $_COOKIE['username'];
            $showButton = '<button class="iconBtn" style="margin-right:40px;" onclick="openForm()"><i class="fa fa-plus"></i></button>';
            $showLable = false;
            $showLogout = true;
            $response = "<h3>Home Page di $username</h3><br />";
        }
        
    require_once('../DataBase/DB.php');
    $DB = new DB();
    $history = [];
    $sql = "SELECT title, username, content FROM documents";
    $result = $DB->query($sql);

    if ($result->num_rows > 0) {
        while ($doc = $result->fetch_assoc()) {
            $document = [
                "username" => $doc['username'],
                "title" => $doc['title'],
                "content" => $doc['content']
            ];
            $history[] = $document;
        }
    }

    ?>
    <div class ="background">
    <header class="header">
            <div style="background-color: black;"><h1 class="title"><b>History</b></h1></div>
                <ul>
                    <li><a class="home" href="../index.php">Home</a></li>
                    <li><a href="space.php">Space</a></li>
                    <li><a href="IT.php">Computer Sience</a></li>
                    <li><a href="neuro.php">Neurology</a></li>
                    <li style="float:right; display: <?php echo $showLable ? 'block' : 'none'; ?>; "><a href="login.php">Login</a></li>
                    <li style="float:right; display: <?php echo $showLogout ? 'block' : 'none'; ?>;"><a href="unsetCookie.php">Logout</a></li>                
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
            <section>            
                <form class="form">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th style="border-right: none;">Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($history as $h) { ?>
                            
                            <tr>
                                <td><?= $h['title'] ?></td>
                                <td><?= $h['username'] ?></td>
                                <td><?= $h['content'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>        
                <button class ="btn"><a href="space.php">Back</a></button>
                </form>
            </section>
        </body>
    </div>
    
</html>