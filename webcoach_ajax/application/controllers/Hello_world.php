<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hello_world extends CI_Controller {

    function insert_to_db() {

        $this->load->model('Prime_model');
        if ($this->input->post('save')) {
            $this->add_model->insert_into_db();
            $this->load->view('pages/home'); //loading success view
        }
    }

}
