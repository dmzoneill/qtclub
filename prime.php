<?php 
    print "The following are the prime numbers from 1 to " . 1000000000000 . "<br>";
    for ($counter=100000000000; $counter < 1000000000000; $counter++)
    {
        $test = $counter;
        $prime = 1;
        while ($test-- > 2)
            if (($counter % $test) == 0)
                $prime = 0;
        if ($prime == 1)
            print $counter . " is a prime number <br>";
    }
?>
