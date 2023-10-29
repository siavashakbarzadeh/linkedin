<?php

namespace App\Http\Controllers;

class linkedin20
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

// Assertions
if (empty($parameters['positions'])) {
    throw new Exception('Positions list is empty.');
}
if (empty($parameters['locations'])) {
    throw new Exception('Locations list is empty.');
}
if (!isset($parameters['username'])) {
    throw new Exception('Username not provided.');
}
if (!isset($parameters['password'])) {
    throw new Exception('Password not provided.');
}
if (!isset($parameters['phone_number'])) {
    throw new Exception('Phone number not provided.');
}

if (isset($parameters['uploads']) && is_array($parameters['uploads'])) {
    throw new Exception("uploads read from the config file appear to be in list format while should be dict. Try removing '-' from line containing filename & path");
}

// Log info (you need to set up your logger for this)
$logInfo = [];
foreach ($parameters as $key => $value) {
    if (!in_array($key, ['username', 'password'])) {
        $logInfo[$key] = $value;
    }
}
// Assuming you have a logger setup
// logger->info(json_encode($logInfo));

$outputFilename = isset($parameters['output_filename']) ? $parameters['output_filename'][0] : 'output.csv';

$blacklist = $parameters['blacklist'] ?? [];
$blackListTitles = $parameters['blackListTitles'] ?? [];
$uploads = $parameters['uploads'] ?? [];

foreach ($uploads as $key => $value) {
    if ($value === null) {
        throw new Exception("Upload value for key {$key} is null.");
    }
}

$bot = new EasyApplyBot(
    $parameters['username'],
    $parameters['password'],
    $parameters['phone_number'],
    $uploads,
    $outputFilename,
    $blacklist,
    $blackListTitles
);

$locations = array_filter($parameters['locations']);
$positions = array_filter($parameters['positions']);
$bot->start_apply($positions, $locations);


