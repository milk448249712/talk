<?php
    $xml = simplexml_load_file("F:\\miracle\\talk\\friends_unnkai.xml");
    echo 'xml:'.$xml;
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