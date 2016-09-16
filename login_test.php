<?php
        $name = $_POST["name"];
	$pwd = $_POST["pwd"];
        echo "name:".$name."<br>";   
        echo "pwd:".$pwd."<br>";
        if (1) {
            echo "authorization valid!<br>";
        }
        header("refresh:3; URL='chartroom.php'");
?>
