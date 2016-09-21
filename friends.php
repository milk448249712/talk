<?php
    $xml = simplexml_load_file("friends.xml");
    echo $xml->getName();
    echo "\n";
    $i = 0;
    //$pal = $xml->addChild("pal");
    //$pal->addAttribute('id', "$i");
    //$pal->addChild("name","frn$i");
    foreach($xml->children() as $child) {
        echo $child->getName().":".$child->attributes();
        echo "\n";
        foreach($child->children() as $childv2)
        {
            echo $childv2->getName() . ": " . "$childv2\n";
            $i ++;
        }
    }
    $pal = $xml->addChild("pal");
    $pal->addAttribute('id', "$i");
    $pal->addChild("name","frn$i");
    $xml->asXML("friends.xml");
?>