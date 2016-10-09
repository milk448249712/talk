<?php
    echo "load friends!<br>";
    $name = $_SESSION['user'];
    //echo $name;
    $xml_filename = "friends_".$name.".xml";
    $xml = simplexml_load_file($xml_filename);
<<<<<<< HEAD
    //echo $xml->getName();
    //echo "<br>";
=======
?>
<html>
<table border="1">
<tr>
<th>Heading</th>
</tr>
<?php
    foreach($xml->children() as $child) {
?>
    <tr>
    <td>
    <?php
    echo $child->attributes()." ";
    echo "<a href=\"\">";
    foreach($child->children() as $childv2)
    {
        echo "$childv2";
    }
    echo "</a>"
    ?>
    </td>
    </tr>
<?php
}
?>
</table>
</html>
<?php
>>>>>>> 3e82ea55e7c3dd36b21d9d933aae2d4da572d403
    //$pal = $xml->addChild("pal");
    //$pal->addAttribute('id', "$i");
    //$pal->addChild("name","frn$i");
?>
    <html>
    <table border="1">
    <tr>
    <th>Heading</th>
    </tr>
    <?php
        foreach($xml->children() as $child) {
    ?>
        <tr>
        <td>
        <?php
        echo $child->attributes()." ";
        echo "<a href=\"\">";
        foreach($child->children() as $childv2)
        {
            echo "$childv2";
        }
        echo "</a>"
        ?>
        </td>
        </tr>
    <?php
    }
<<<<<<< HEAD
    ?>
    </table>
    </html>
=======
    //$pal = $xml->addChild("pal");
    //$pal->addAttribute('id', "$i");
    //$pal->addChild("name","frn$i");
    //$xml->asXML("friends.xml");
    $systemid = 1; // System ID for the shared memory segment
    $mode = "c"; // Access mode
    $permissions = 0755; // Permissions for the shared memory segment
    $size = 1024; // Size, in bytes, of the segment

    $shmid = shmop_open($systemid, $mode, $permissions, $size);
    shmop_write($shmid, "123test", 0);
    echo 'done.';
    while(1) {
        sleep(10);
    }
?>
>>>>>>> 3e82ea55e7c3dd36b21d9d933aae2d4da572d403
