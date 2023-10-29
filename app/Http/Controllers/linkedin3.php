<?php

namespace App\Http\Controllers;

class linkedin3
{

}

function get_appliedIDs($filename) {
    try {
        $rows = array_map('str_getcsv', file($filename));
        $header = array('timestamp', 'jobID', 'job', 'company', 'attempted', 'result');

        // Associative array to hold our data
        $csv = [];
        foreach ($rows as $row) {
            $csv[] = array_combine($header, $row);
        }

        // Filter out records older than 2 days
        $filtered = [];
        $twoDaysAgo = strtotime('-2 days');
        foreach ($csv as $record) {
            $recordTimestamp = strtotime($record['timestamp']);
            if ($recordTimestamp > $twoDaysAgo) {
                $filtered[] = $record;
            }
        }

        // Extract jobIDs
        $jobIDs = [];
        foreach ($filtered as $item) {
            $jobIDs[] = $item['jobID'];
        }

        // Logging
        echo count($jobIDs) . " jobIDs found\n";
        return $jobIDs;

    } catch (Exception $e) {
        // Logging
        echo $e->getMessage() . " jobIDs could not be loaded from CSV " . $filename . "\n";
        return null;
    }
}
