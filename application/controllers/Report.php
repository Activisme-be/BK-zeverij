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
     * Authencated user data session.
     *
     * @return array $user
     */
    public $user = [];

    /**
     * Report Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'blade']);
        $this->load->helper(['url']);

        $this->user = $this->session->userdata('authencated_user');
    }

    /**
     * Show a specific report.
     *
     * @see     GET|HEAD: http://www.domain.tld/report/view/{reportId}
     * @return  Blade view
     */
    public function view()
    {
        $reportId = $this->security->xss_clean($this->uri->segment(3));
        return $this->blade->render('', $data);
    }

    /**
     * Delete an old or invalid report out off the database.
     *
     * @see     GET|HEAD: http://www.domain.tld/report/delete/{reportid}
     * @return  Redirect|Response
     */
    public function delete()
    {
        $reportId = $this->seucrity->xss_clean($this->uri->segment(3));

        if (Reports::find($reportId)->destroy()) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', '');
        }

        return redirect(base_url('/news/backend'));
    }

    /**
     * Close a invalid comment report.
     *
     * @see    GET|HEAD: http://www.domain/tld/report/close/{reportId}
     * @return Redirect|Response
     */
    public function close()
    {
        $reportId = $this->security->xss_clean($this->uri->segment(3));
        $report   = Reports::find($reportId)->reportReaction()->sync([]);

        $this->session->set_flashdata('class', 'alert alert-success');
        $this->session->set_flashdata('message', 'De rapporteer is gesloten.');

        return redirect(base_url('/news/backend'));
    }
}
