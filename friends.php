<?php
    echo "load friends!<br>";
    $name = $_SESSION['user'];
    //echo $name;
    $xml_filename = "friends_".$name.".xml";
    $xml = simplexml_load_file($xml_filename);
    if (!$xml) {
        echo "no such user file!";
        exit("no such user file!");
    }
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
        // echo "<a href=?user=test>";
        $talk_to = "";
        foreach($child->children() as $childv2)
        {
            $talk_to = $childv2;
        }
        $_SESSION['to_who'] = $talk_to;
        echo "<a href=?str_to=$talk_to>";
        echo " ".$talk_to;
        echo "</a>";
        ?>
        </td>
        </tr>
    <?php
    }
    ?>
    </table>
    </html>
<?php
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
?>
