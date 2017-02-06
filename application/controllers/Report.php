<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * TODO: Implement copyright block.
 */
class Report extends MY_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->library(['blade', 'session']); 
        $this->load->helper(['url']); 

        $this->user = $this->session->userdata() 
    }

    /**
     * View a comment report. 
     * 
     * @see    http://www.domain.tld/report/view/{reportId}
     * @return blade view
     */
    public function view()
    {
        $reportId = $this->security->xss_clean($this->uri->segment(3));
    }

    /** 
     * Delete function for old or unvalid reports.
     * 
     * @see    http://www.domain.tld/report/delete/{reportId}
     * @return Redirect|Response
     */
    public function delete()
    {
        $reportId = $this->security->xss_clean($this->uri->segment(3));

        if (Reports::find($reportId)->delete()) { // The report is deleted
            $this->session->set_flashdata('class', 'alert alert-success'); 
            $this->session->set_flashdata('message', 'De rapportering is verwijderd.');
        }

        return redirect(base_url('/news/backend'));
    }

    /** 
     *
     * @see    http://www.domain.tld/report/close/{reportId}
     * @return Response|Redirect
     */ 
    public function close()
    {
        $reportId = $this->security->xss_clean($this->uri->segment(3));

        return redirect(base_url('/news/backend')); 
    }
}
