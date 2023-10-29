<?php

namespace App\Http\Controllers;

class linkedin6
{

}

use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverWait;
use Facebook\WebDriver\Exception\TimeOutException;

class EasyApplyBotController {
    // ... [other class attributes and methods]

    private $browser;

    public function start_linkedin($username, $password) {
        error_log("Logging in.....Please wait :)");

        $this->browser->get("https://www.linkedin.com/login?trk=guest_homepage-basic_nav-header-signin");

        try {
            $user_field = $this->browser->findElement(WebDriverBy::id("username"));
            $pw_field = $this->browser->findElement(WebDriverBy::id("password"));
            $login_button = $this->browser->findElement(WebDriverBy::xpath('//*[@id="organic-div"]/form/div[3]/button'));

            $user_field->sendKeys($username);
            $user_field->sendKeys(WebDriverKeys::TAB);
            sleep(2); // consider replacing with explicit waits
            $pw_field->sendKeys($password);
            sleep(2);
            $login_button->click();
            sleep(3);
        } catch (TimeOutException $e) {
            error_log("TimeoutException! Username/password field or login button not found");
        }
    }
}
