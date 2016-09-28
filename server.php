<?php
    $systemid = 1; // System ID for the shared memory segment
    $mode = "c"; // Access mode
    $permissions = 0755; // Permissions for the shared memory segment
    $size = 1024; // Size, in bytes, of the segment
    $shmid = shmop_open($systemid, $mode, $permissions, $size);
    $memstr = '';
    // $semid=sem_get(0x2,1,0666);
    while(1) {
        sleep(10);
        echo "waitting...\n";
        // sem_acquire($semid);    // acquire the semaphore
        $size = shmop_size($shmid);
        $memstr = shmop_read($shmid, 0, $size);
        echo $memstr;
        // friends list function
        // do sth.
    }
    shmop_delete($shmid);
    shmop_close($shmid);
?>