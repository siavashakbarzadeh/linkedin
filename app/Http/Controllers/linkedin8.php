<?php

namespace App\Http\Controllers;

class linkedin8
{

}

class EasyApplyBotController {
    // ... [other class attributes and methods]

    private $browser;

    public function start_apply($positions, $locations) {
        $start = microtime(true);
        $this->fill_data();

        $combos = [];
        while (count($combos) < count($positions) * count($locations)) {
            $position = $positions[rand(0, count($positions) - 1)];
            $location = $locations[rand(0, count($locations) - 1)];
            $combo = [$position, $location];
            if (!in_array($combo, $combos)) {
                $combos[] = $combo;
                error_log("Applying to {$position}: {$location}");
                $location = "&location=" . $location;
                $this->applications_loop($position, $location);
            }
            if (count($combos) > 500) {
                break;
            }
        }
    }

    private function fill_data() {
        // ... (implementation of fill_data)
    }

    private function applications_loop($position, $location) {
        // ... (implementation of applications_loop)
    }
}
