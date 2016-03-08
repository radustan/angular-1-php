<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** @property Contacts $contacts */

class Angular extends MY_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
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
        $this->load->model('Contacts', 'contacts');
        $data = $this->contacts->getAllArray();
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        echo json_encode($data);
    }

    public function saveContact()
    {
        $params = $this->input->post();
        $this->load->model('Contacts', 'contacts');
        header("Access-Control-Allow-Origin: *");
        $data = $this->contacts->save($params);
        echo $data;
    }

    public function chartData()
    {
        $data = array(
            'title' => 'Population title',
            'categories' => array('1750', '1800', '1850', '1900', '1950', '1999', '2050'),
            'series' => [[
                'name' => 'Asia',
                'data' => [502, 635, 809, 947, 1402, 3634, 5268]
            ], [
                'name' => 'Africa',
                'data' => [106, 107, 111, 133, 221, 767, 1766]
            ], [
                'name' => 'Europe',
                'data' => [163, 203, 276, 408, 547, 729, 628]
            ], [
                'name' => 'America',
                'data' => [18, 31, 54, 156, 339, 818, 1201]
            ], [
                'name' => 'Oceania',
                'data' => [2, 2, 2, 6, 13, 30, 46]
            ]]
        );

        $params = $this->input->get();
        header("Access-Control-Allow-Origin: *");
        if (!empty($params['type']) && array_key_exists($params['type'], $data)) {
            header('Content-Type: text/plain');
            echo json_encode($data[$params['type']]);
        } else {
            echo '';
        }
    }
}
