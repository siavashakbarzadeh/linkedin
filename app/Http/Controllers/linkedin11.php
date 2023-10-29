<?php

namespace App\Http\Controllers;

class linkedin11
{

}
class YourClassName {

    private $filename;

    public function write_to_file($button, $jobID, $browserTitle, $result) {
        $re_extract = function($text, $pattern) {
            if (preg_match($pattern, $text, $matches)) {
                return $matches[1];
            }
            return null;
        };

        $timestamp = date('Y-m-d H:i:s');
        $attempted = ($button !== false);

        $browserTitleParts = explode(' | ', $browserTitle);
        $job = $re_extract($browserTitleParts[0], "/\(?\\d?\)?\s?(\w.*)/");
        $company = $re_extract($browserTitleParts[1], "/(\w.*)/");

        $toWrite = [$timestamp, $jobID, $job, $company, $attempted, $result];

        $file = fopen($this->filename, 'a');
        fputcsv($file, $toWrite);
        fclose($file);
    }

    // ... [rest of your class code]
}
