<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Report Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Report extends MY_Controller
{
    /**
     * Report Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     *
     * @see
     * @return
     */
    public function view()
    {
        $reportId = $this->security->xss_clean($this->uri->segment(3));
    }

    /**
     *
     *
     * @see
     * @return
     */
    public function delete()
    {
        $reportId = $this->seucrity->xss_clean($this->uri->segment(3));

        if (Reports::find($reportId)->destroy()) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', '');
        }
    }

    public function close()
    {
        $reportId = $this->security->xss_clean($this->uri->segment(3));

        if () {
            $this->session->set_flashdata('class', '');
            $this->session->set_flashdata('message', '');
        }

        return redirect(base_url('/news/backend'));
    }
}
