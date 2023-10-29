<?php

namespace App\Http\Controllers;

class linkedin12
{

}
class YourClassName {

    private $browser;
    private $job_page;

    public function get_job_page($jobID) {
        $job = 'https://www.linkedin.com/jobs/view/' . $jobID;
        $this->browser->get($job); // Assuming you have a method or library to navigate to a URL in $this->browser
        $this->job_page = $this->load_page(0.5);
        return $this->job_page;
    }

    private function load_page($sleep = 0) {
        // Your implementation of load_page method goes here.
        sleep($sleep);
        // ... rest of the method
    }

    // ... [rest of your class code]
}
