<?php

    $index = $_POST['index'];

    $docs = json_decode(file_get_contents('documentSpace.json'), true);


    if(isset($docs[$index])){
        if(isset($_POST['delete'])){
            unset($docs[$index]);
        } elseif (isset($_POST['edit']))
        {
            $title = $_POST['titleEdited'];
            $ingredienti = $_POST['ingredientiEdited'];
            $istructions = $_POST['istructionsEdited'];

            $doc = [
                'title' => $title,
                'ingredients' => $ingredienti,
                'istructions' => $istructions
            ];

            $docs[$index] = $doc;
        }
        file_put_contents('documentSpace.json', json_encode($docs));
        header("Location: space.php");
        exit();
    }

    /*
    if(isset($docs[$index])){
        if(isset($_POST['delete'])){
        unset($docs[$index]);
        echo "eliminato ".$index;
        }
    }
    */
    //header("Location: space.php");

?>