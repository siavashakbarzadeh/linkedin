<?php

namespace App\Http\Controllers;

class linkedin15
{

}


class YourClassName
{

    private $browser;
    private $wait;
    private $uploads;
    private $log;

    private function is_present($button_locator)
    {
        return count($this->browser->findElements($button_locator[0], $button_locator[1])) > 0;
    }

    public function send_resume()
    {

        $next_locator = WebDriverBy::cssSelector("button[aria-label='Continue to next step']");
        $review_locator = WebDriverBy::cssSelector("button[aria-label='Review your application']");
        $submit_locator = WebDriverBy::cssSelector("button[aria-label='Submit application']");
        $submit_application_locator = WebDriverBy::cssSelector("button[aria-label='Submit application']");
        $error_locator = WebDriverBy::cssSelector("p[data-test-form-element-error-message='true']");
        $upload_locator = WebDriverBy::cssSelector("button[aria-label='DOC, DOCX, PDF formats only (5 MB).']");
        $follow_locator = WebDriverBy::cssSelector("label[for='follow-company-checkbox']");

        $submitted = false;

        try {
            sleep(rand(15, 25) / 10);

            while (true) {

                // Upload Cover Letter if possible
                if ($this->is_present($upload_locator)) {
                    $input_buttons = $this->browser->findElements($upload_locator[0], $upload_locator[1]);

                    foreach ($input_buttons as $input_button) {
                        $parent = $input_button->findElement(WebDriverBy::xpath(".."));
                        $sibling = $parent->findElement(WebDriverBy::xpath("preceding-sibling::*[1]"));
                        $grandparent = $sibling->findElement(WebDriverBy::xpath(".."));

                        foreach ($this->uploads as $key => $value) {
                            if (stripos($sibling->getText(), $key) !== false || stripos($grandparent->getText(), $key) !== false) {
                                $input_button->sendKeys($value);
                            }
                        }
                    }
                    sleep(rand(45, 65) / 10);
                }

                $button = null;
                $buttons = [$next_locator, $review_locator, $follow_locator, $submit_locator, $submit_application_locator];

                foreach ($buttons as $index => $button_locator) {
                    if ($this->is_present($button_locator)) {
                        // Assuming a wait mechanism here like WebDriverWait in Python. Adjust as needed.
                        $button = $this->wait->until(WebDriverExpectedCondition::elementToBeClickable($button_locator));
                    }

                    if ($this->is_present($error_locator)) {
                        foreach ($this->browser->findElements($error_locator[0], $error_locator[1]) as $element) {
                            if (strpos($element->getText(), "Please enter a valid answer") !== false) {
                                $button = null;
                                break;
                            }
                        }
                    }

                    if ($button) {
                        $button->click();
                        sleep(rand(15, 25) / 10);

                        if (in_array($index, [3, 4])) {
                            $submitted = true;
                        }

                        if ($index !== 2) {
                            break;
                        }
                    }
                }

                if ($button === null) {
                    $this->log->info("Could not complete submission");
                    break;
                } elseif ($submitted) {
                    $this->log->info("Application Submitted");
                    break;
                }
            }

            sleep(rand(15, 25) / 10);

        } catch (Exception $e) {
            $this->log->info($e->getMessage());
            $this->log->info("cannot apply to this job");
            throw $e;
        }

        return $submitted;
    }

    // ... [rest of your class code]
}


