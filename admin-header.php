<?php
if(isset($_GET['n'])) {
    $name = $_GET['n'];
}
?>
<header class="p-3 shadow">
    <h2 class="text-dashboard text-capitalize" style="color: #FE7731;">Dashboard | <?php 
    if(isset($name)){
        echo $name;
    } 

    ?> </h2>
</header>