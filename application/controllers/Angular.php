<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** @property Contacts $contacts */

class Angular extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->template->load();
    }

    public function getContacts()
    {
        $this->load->model('Contacts','contacts');
        $data = $this->contacts->getAllArray();
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        echo json_encode($data);
    }

    public function saveContact()
    {
        $params = $this->input->post();
        $this->load->model('Contacts','contacts');
        $data = $this->contacts->save($params);
        echo $data;
    }
}
