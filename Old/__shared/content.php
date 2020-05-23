<div class="col-md-7 col-xl-8 ml-md-auto py-8 order-first order-md-last">
    <?php
        $folder = isset($_GET["article"]) ? $_GET["article"] : "";
        $filename = DOC_LOCATION. "$folder/markdown.md";

        if (file_exists($filename)){
            $fileContents = file_get_contents($filename);
            $Parsedown = new Parsedown();
            echo $Parsedown->text($fileContents);
        }

    ?>
</div>