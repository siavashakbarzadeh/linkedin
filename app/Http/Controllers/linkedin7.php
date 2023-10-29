<?php

namespace App\Http\Controllers;

class linkedin7
{

}
class EasyApplyBotController {
    // ... [other class attributes and methods]

    private $browser;

    public function fill_data() {
        $this->browser->manage()->window()->setSize(1, 1);
        $this->browser->manage()->window()->setPosition(2000, 2000);
    }
}
