<?php defined('BASEPATH') OR exit('No Direct script access allowed');

class Items extends CI_Controller
{
    /**
     * Authencated userdata
     *
     * @var array
     */
    public $user = [];

    /**
     * Items constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Create a new item in the database.
     *
     * @see
     * @return
     */
    public function create()
    {
        $this->form_validation->set_rules();
        $this->form_validation->set_rules();
        $this->form_validation->set_rules('inputname', 'fieldlabel', 'trim|required');

        if ($this->form_validation->run() == flpase) { // Form validation fails
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wij konden het item niet toevoegen.');

            return redirect($_SERVER['HTTP_REFERER']);
        }

        // The validation passes so we can move on to our controller logic.

        $sportsmenId = $this->input->post('sportsmen_id'); // Only needed to assign the query.

        // Inputs
        $input['media_url']     = $this->input->post('media');
        $input['point']         = $this->input->post('item_name');
        $input['description']   = $this->input->post('decription');
        $input['status']        = 0;

        // MySQL Handlings.
        $MySQL['insert']   = Points::create($input);
        $MySQL['relation'] = Sportsmen::find($sportsmenId)->items()->attach($$MySQL['insert']->id);

        // Output handling
        if ($MySQL['insert'] && $MySQL['relation']) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw punt is opgeslagen en zal spoedig beoordeeld worden door een admin.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Delete a item.
     *
     * @see
     * @return
     */
    public function delete()
    {

    }
}
