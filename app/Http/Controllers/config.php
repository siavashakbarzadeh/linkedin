<?php

namespace App\Http\Controllers;

class config
{

}


use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

require 'vendor/autoload.php'; // Assuming you're using Composer

// Read YAML configuration
try {
    $parameters = Yaml::parseFile('config.yaml');
} catch (ParseException $exception) {
    throw new Exception("Unable to parse the YAML string: {$exception->getMessage()}");
}

$username = $parameters['username'] ?? null;
$password = $parameters['password'] ?? null;
$phoneNumber = $parameters['phone_number'] ?? null;
$positions = $parameters['positions'] ?? [];
$locations = $parameters['locations'] ?? [];

$uploads = $parameters['uploads'] ?? [];
$outputFilename = isset($parameters['output_filename']) ? $parameters['output_filename'][0] : 'output.csv';
$blacklist = $parameters['blacklist'] ?? [];
$blackListTitles = $parameters['blackListTitles'] ?? [];

// Print parsed values (for demonstration)
echo "Username: $username\n";
echo "Password: $password\n";
echo "Phone Number: $phoneNumber\n";
echo "Positions: " . implode(", ", $positions) . "\n";
echo "Locations: " . implode(", ", $locations) . "\n";
echo "Uploads: " . json_encode($uploads) . "\n";
echo "Output Filename: $outputFilename\n";
echo "Blacklist: " . implode(", ", $blacklist) . "\n";
echo "Blacklist Titles: " . implode(", ", $blackListTitles) . "\n";


