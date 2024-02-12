<?php 
    include 'ClassDocument.php';

    $content = $_POST['txtAreaEditor'];
    $nameFile = $_POST['nameFile'];
    $author = $_POST['username'];
    $found = false;
    $docs = json_decode(file_get_contents('documentInformations.json'), true);
    
    $documenti = [];
    foreach ($docs as $doc) {
        $documenti[] = new Document($doc['content'], $doc['path'], $doc['author']);
    }

    foreach ($documenti as $documento) {
        if ($documento->path == $nameFile) {
            $documento->content = $content;
            $documento->author = $author;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $documento = new Document($content, $nameFile, $author);
        $documento->path = $nameFile;
        $documenti[] = $documento;
    }

    $docs = [];
    foreach ($documenti as $documento) {
        $docs[] = [
            'content' => $documento->content,
            'path' => $documento->path,
            'author' => $documento->author
        ];
    }

    /*
    foreach($docs as &$doc)
    {
        if(isset($doc['content']) && $doc['path'] == $nameFile)
        {
            $doc['content'] = $content;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $docs[] = [
            'content' => $content,
            'path' => $nameFile
        ];
    }
  */  
    
    file_put_contents('documentInformations.json', json_encode($docs, JSON_PRETTY_PRINT));
    header("Location: documents/".$nameFile);
?>