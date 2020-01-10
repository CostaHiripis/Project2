<?php
    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
    
        exit();
    }
	session_destroy();
	Redirect('index.php?page=login', false);
?>