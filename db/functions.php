<?php

function pridajPozdrav() {
    $hour = date(format: 'H'); // alebo date_default_timezone_set()

    if ($hour < 12) {
        echo "<h3>Good Morning</h3>";
    } elseif ($hour < 18) {
        echo "<h3>Good Day</h3>";
    } else {
        echo "<h3>Good Evening</h3>";
    }
}