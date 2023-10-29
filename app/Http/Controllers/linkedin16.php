<?php

namespace App\Http\Controllers;

class linkedin16
{

}


use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class YourClassName
{

    private $browser;

    public function load_page($sleep = 1)
    {
        $scroll_page = 0;
        while ($scroll_page < 4000) {
            $this->browser->executeScript("window.scrollTo(0," . $scroll_page . " );");
            $scroll_page += 200;
            sleep($sleep);
        }

        if ($sleep != 1) {
            $this->browser->executeScript("window.scrollTo(0,0);");
            sleep($sleep * 3);
        }

        $pageSource = $this->browser->getPageSource();

        // Assuming you are using the symfony/dom-crawler and symfony/css-selector components for PHP
        $crawler = new \Symfony\Component\DomCrawler\Crawler($pageSource);
        return $crawler;
    }

    // ... [rest of your class code]
}


