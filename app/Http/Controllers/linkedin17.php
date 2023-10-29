<?php

namespace App\Http\Controllers;

class linkedin17
{

}


function avoid_lock()
{
    // Get the current mouse position
    $position = shell_exec("xdotool getmouselocation");
    preg_match("/x:(\d+) y:(\d+)/", $position, $matches);

    $x = intval($matches[1]);
    $y = intval($matches[2]);

    // Move the mouse to the new position
    shell_exec("xdotool mousemove " . ($x + 200) . " $y");
    sleep(1);
    shell_exec("xdotool mousemove $x $y");
    sleep(0.5);

    // Simulate Ctrl+Escape key press
    shell_exec("xdotool keydown ctrl");
    shell_exec("xdotool key Escape");
    shell_exec("xdotool keyup ctrl");
    sleep(0.5);

    // Simulate Escape key press
    shell_exec("xdotool key Escape");
}


