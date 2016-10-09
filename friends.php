<?php
    echo "load friends!<br>";
    $name = $_SESSION['user'];
    //echo $name;
    $xml_filename = "friends_".$name.".xml";
    $xml = simplexml_load_file($xml_filename);
    //echo $xml->getName();
    //echo "<br>";
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
    ?>
    </table>
    </html>
