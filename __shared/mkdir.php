<?php

function create($item){
    if (isset($item->url)){
        $folderName = str_replace("/","", $item->url);
        mkdir($folderName);
        file_put_contents($folderName."/markdown.md", "");
    }
}

$menuItems = json_decode(file_get_contents("sidenav.json"));

for ($i=0; $i < sizeof ($menuItems); $i++) { 
    $currentItem = $menuItems[$i];
    create($currentItem);

    if (isset($currentItem->children)){
        for ($j=0; $j < sizeof ($currentItem->children); $j++) { 
            $currentChild = $currentItem->children[$j];
            create($currentChild);
        }       
    }
}

?>