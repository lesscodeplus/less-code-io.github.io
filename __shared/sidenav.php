<?php
    function getUrl($url){
        return  $url == null ? "" : "?article=$url";
    }
?>

<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Sidebar
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<div class="col-md-4 col-xl-3">
<hr class="d-md-none my-0">
<aside class="sidebar sidebar-sticky pr-md-4 br-1">
    <ul class="nav nav-sidebar nav-sidebar-hero" data-accordion="true">
    <?php
        $sidenavFile = DOC_LOCATION. "/sidenav.json";
        $sideNavData = json_decode(file_get_contents($sidenavFile));

        for ($i=0; $i < sizeof($sideNavData) ; $i++) { 
            
            $currentItem = $sideNavData[$i];
            $hasChildren = isset($currentItem->children);
        ?>
            <li class="nav-item">
                <?php
                    if ($hasChildren){
                        echo '<a class="nav-link" href="#">' . $currentItem->title . ' <i class="nav-angle rotate"></i></a>';
                        echo '<div class="nav">';
                        $children = $currentItem->children;
                        for ($j=0; $j < sizeof($children); $j++) { 
                            $child = $children[$j];
                            echo '<a class="nav-link" href="' .  getUrl($child->url) .'">'. $child->title . '</a>';
                        }
                        echo '</div>';
                    }else {
                        echo '<a class="nav-link active" href="'. getUrl($currentItem->url) . '">' . $currentItem->title . '</a>';
                    }
                ?>
            </li>
        <?php        
        }
    ?>


    </ul>
</aside>
</div>