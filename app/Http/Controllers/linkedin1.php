<?php

namespace App\Http\Controllers;

class linkedin1
{

}
function setupLogger() {
    $dt = date("m_d_y H_i_s");

    if (!is_dir('./logs')) {
        mkdir('./logs');
    }

    // TODO need to check if there is a log dir available or not
    $logFile = './logs/' . $dt . 'applyJobs.log';
    $logHandle = fopen($logFile, 'w');

    // In PHP, there's no direct equivalent of Python's logging module.
    // Instead, you can write your own logging functions or use a library like Monolog.
    // Here, I'll demonstrate a simple logging mechanism using PHP's built-in functions.

    $logEntry = function($message, $level = 'INFO') use ($logHandle) {
        $timestamp = date("d-b-y H:i:s");
        $formattedMessage = "$timestamp::$level::$message\n";
        fwrite($logHandle, $formattedMessage);

        // Also display the log on the console (similar to StreamHandler in Python)
        echo $formattedMessage;
    };

    // You can use the $logEntry function to log messages. Example:
    // $logEntry('This is a log message', 'DEBUG');

    // Close the log file handle when done
    // fclose($logHandle);
}

setupLogger();
