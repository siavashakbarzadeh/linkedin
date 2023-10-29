<?php

namespace App\Http\Controllers;

class linkedin13
{

}
class YourClassName {

    private $browser;

    public function get_easy_apply_button() {
        try {
            $buttons = $this->browser->findElements(By::xpath('//button[contains(@class, "jobs-apply-button")]')); // Assuming you're using a library like Facebook's WebDriver

            $EasyApplyButton = $buttons[0];

        } catch (Exception $e) {
            echo "Exception: " . $e->getMessage();
            $EasyApplyButton = false;
        }

        return $EasyApplyButton;
    }

    // ... [rest of your class code]
}
