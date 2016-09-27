<?php
    $systemid = 1; // System ID for the shared memory segment
    $mode = "c"; // Access mode
    $permissions = 0755; // Permissions for the shared memory segment
    $size = 1024; // Size, in bytes, of the segment
    $shmid = shmop_open($systemid, $mode, $permissions, $size);
    $memstr = '';
    while(1) {
        sleep(10);
        $size = shmop_size($shmid);
        $memstr = $shmop_read($shmid, 0, $size);
    }
?>