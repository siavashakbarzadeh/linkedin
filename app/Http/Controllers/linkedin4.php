<?php

namespace App\Http\Controllers;

class linkedin4
{

}
use Facebook\WebDriver\Chrome\ChromeOptions;

function browser_options() {
    $options = new ChromeOptions();
    $options->addArguments([
        "--start-maximized",
        "--ignore-certificate-errors",
        "--no-sandbox",
        "--disable-extensions",
        "--disable-blink-features",
        "--disable-blink-features=AutomationControlled"
    ]);

    return $options;
}
