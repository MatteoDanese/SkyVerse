
    <!DOCTYPE html>
        <html>
            <head>
                <link rel="stylesheet" href="../../Styles/documentStyles.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/css/froala_editor.pkgd.min.css">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/js/froala_editor.pkgd.min.js"></script>
                <?php
                    $content ="";
                    if(!isset($_COOKIE['username'])) {
                        $showButton = "";
                        $showLable = true;
                        $showLogout = false;
                        $username ="";
                        $showButtonSave = "";
                    }
                    else
                    {
                        $username = $_COOKIE['username'];
                        $showButtonSave = '<button type="submit" class="saveBtn" name="save">SAVE</button>';
                        $showLable = false;
                        $showLogout = true;
                    }
/*                
                    $docs = json_decode(file_get_contents('../documentInformations.json'), true);
                    $presente = false;
                    foreach ($docs as $doc)
                    {
                        if($doc['path'] == basename(__FILE__)){
                            $content = $doc['content'];
                            $presente = true;
                            break;
                        }
                    }
*/
                    require_once('../../DataBase/DB.php');
                    $DB = new DB();
                    
                    $sql = "SELECT content FROM documents WHERE file_name = ?";
                    $params = [basename(__FILE__)];
                    $types = "s";
                    $result = $DB->preparedQuery($sql, $params, $types);
                    
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $content = $row['content'];
                        $content = htmlspecialchars($content);
                    } else {
                        $content = "";
                    }
                    ?>
                <header>
                    <div style="background-color: black;"><h1 class="title"><b>SkyVerse</b></h1></div>
                        <ul>
                            <li><a class="home" href="../../index.php">Home</a></li>
                            <li><a href="../space.php">Space</a></li>
                            <li><a href="../IT.php">Computer Sience</a></li>
                            <li><a href="../neuro.php">Neurology</a></li>
                            <li style="float:right; display: <?php echo $showLable ? 'block' : 'none'; ?>; "><a href="../login.php">Login</a></li>
                            <li style="float:right; display: <?php echo $showLogout ? 'block' : 'none'; ?>;"><a href="../unsetCookie.php">Logout</a></li>                
                        </ul>
                </header>
            </head>
            <body>
                
                <div class="titleDiv">  
                    <br><h1 style="color:black;">Document</h1><br><br>
                </div>
                <section>
                <form action="../documentInformationAdd.php" method="POST">
                    <!-- <textarea class="txtArea" id="txxtArea" autofocus rows="1" onkeydown="addRow(event)"></textarea> -->
                    <div style="align-items:center; max-width:50%px;">
                    <input type="hidden" name ="nameFile" value=<?php echo basename(__FILE__);?>> <!-- nome file -->
                    <input type="hidden" name ="username" value=<?php echo $username?>>
                    <textarea id='editor' name ="txtAreaEditor"><?= $content ?></textarea>
                        <script>
                        new FroalaEditor('#editor', {
                            toolbarButtons: ['bold', 'italic', 'underline', 'insertLink', 'insertImage'],
                            heightMin: 200,
                            heightMax: 400
                        })
                        </script>
                    </div>
                    <br><?php echo $showButtonSave ?>
                    </form>
                </section>
            </body>
        </html>
            