<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * News category Controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   BK-wansmaak
 */
class Category extends MY_Controller
{
	/**
	 * Authencated user data.
	 *
	 * @return array $user
	 */
	public $user = [];

	/**
	 * Category contstructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['blade', 'form_validation', 'session']);
		$this->load->helper(['url']);

		$this->user = $this->session->userdata('authencated_user');
	}

	/**
      * Middleware instance
      *
      * only create if you want to use, not compulsory.
      * or return parent::middleware(); if you want to keep.
      * or return empty array() and no middleware will run.
      *
      * @return array
      */
    protected function middleware()
    {
        // Return the list of middlewares you want to be applied,
        // Here is list of some valid options
        //
        // admin_auth                    // As used below, simplest, will be applied to all
        // someother|except:index,list   // This will be only applied to posts()
        // yet_another_one|only:index    // This will be only applied to index()
        //
        return ['auth'];
    }

    /**
     * Store a new category in the database.
     *
     * @see 	POST: http://www.domain.tld/category/store
     * @return 	Response|Redirect
     */
    public function store()
    {
    	$this->form_validation->set_rules('category', 'Categorie label', 'trim|required');
    	$this->form_validation->set_rules('description', 'Categorie beschrijving', 'trim|required');

    	if ($this->form_validation->run() === false) { // Validation fails
    		$data['title']      = 'Nieuws berichten';
            $data['news']       = Articles::with(['comments', 'author', 'categories'])->get();
            $data['categories'] = NewsCategories::where('module', 'news')->get();

            return $this->blade->render('news/backend', $data);
    	}

    	// No validation errors found. So move on with our logic.

    	//> Input
    	$input['creator_id']  = $this->user['id'];
    	$input['category']    = $this->input->post('category');
    	$input['description'] = $this->input->post('description');
        $input['module']      = 'news';

    	//> MySQL Insert
    	if (NewsCategories::create($this->security->xss_clean($input))) {
    		$this->session->set_flashdata('class', 'alert alert-success');
    		$this->session->set_flashdata('message', 'De Categorie is toegevoegd.');
    	}

    	return redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    /**
     * Search for a specific category in the database.
     *
     * @see 	GET|HEAD: http://www.domain.tld/category/search/{term}
     * @return 	mixed Blade view
     */
    public function search()
    {
    	$this->form_validation->set_rules('term', 'Zoek term', 'trim|required');

      $data['title'] = 'Nieuws management';
      $data['news']  = Articles::with(['comments', 'author', 'categories'])->get();

      if ($this->form_validation->run() === false) { // Fo)rm valodation fails.
          $data['categories'] = NewsCategories::all();
          return redirect($_SERVER['HTTP_REFERER'], 'refresh');
      }

      $term = $this->security->xss_clean($this->input->post('term'));
      $data['categories'] = NewsCategories::where('heading', 'LIKE', '%' . $term . '%')->where('module', 'news')->get();

    	return $this->blade->render('news/backend', $data);
    }

    /**
     * Delete a category in the database - with his relation siblings.
     *
     * @see 	GET|HEAD: http://www.domain.tld/category/destroy/{id}
     * @return 	Response|Redirect
     */
    public function delete()
    {
        $categoryId = $this->security->xss_clean($this->uri->segment(3));
    	//> MYSQL queries

        $MySQL['category'] = NewsCategories::find($categoryId);
        $MySQL['relation'] = $MySQL['category']->articles()->sync([]);

    	//> Needed checksums
    	if ($MySQL['category']->delete() && $MySQL['relation']) { //> The relation siblings and category are deleted.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'The category has been deleted');
    	}

    	return redirect($_SERVER['HTTP_REFERER'] ,'refresh');
    }

}
