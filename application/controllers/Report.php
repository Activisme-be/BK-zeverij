<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * TODO: Implement copyright block.
 */
class Report extends MY_Controller
{
    public function __construct()
    {

    }

    public function view()
    {

    }

    public function delete()
    {

    }

    public function close()
    {
        $reportId = $this->security->xss_clean($this->uri->segment(3));
    }
}
