<?php 
function go($url, $time=0){
    if($time != 0) {
        header("Refresh:$time;url=$url");
    } else {
        header("Location:$url");
    }
}

?>