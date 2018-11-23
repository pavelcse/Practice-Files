<?php

//first rename this file as "Users.php" and put it on controllers directory
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * users controller
 */
class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Prime_model');
    }

    /**
     * index method for get all data from DB
     */
    public function index() {
        $data['title'] = 'Fetch Database Info';

        $this->load->library('pagination');

        $config['base_url'] = site_url('users/index');
        $config['total_rows'] = $this->db->get('users')->num_rows();
        $config['enable_query_strings'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;
        $config['per_page'] = 5;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination no-margin">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['next_link'] = 'Next >';
        $config['prev_link'] = '< Prev';

        if ($this->input->get('page')) {
            $sgm = (int) trim($this->input->get('page'));
            $data['segment'] = $config['per_page'] * ($sgm - 1);
        } else {
            $data['segment'] = 0;
        }

        $this->pagination->initialize($config);


        $query = $this->db->limit($config['per_page'], $data['segment'])->order_by('id', 'desc')->get('users');
        $data['users'] = $query->result_array();
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('users');
        $this->load->view('footer');
    }

    /**
     * method to create new user
     */
    public function create() {
        $this->load->library('form_validation');
        $data = array(
            'title' => 'Create a User',
            'action' => site_url('users/create'),
            'button' => 'Create'
        );
        if ($this->input->post('submit')) {

            $config['upload_path'] = './avatars';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);

            if ($_FILES && $_FILES['avatar']['name']) {
                if (!$this->upload->do_upload('avatar')) {
                    $this->session->set_flashdata('message', $this->upload->display_errors());
                    $this->load->view('header', $data);
                    $this->load->view('menu');
                    $this->load->view('create');
                    $this->load->view('footer');
                    return;
                } else {
                    $avatar = $this->upload->data();
                    $avatar_name = $avatar['file_name'];
                }
            } else {
                echo 'working';
                return;
            }



            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

            $username = $this->input->post('username', TRUE);
            $email = $this->input->post('email', TRUE);
            $about = $this->input->post('about', TRUE);
            $user = array(
                'username' => $username,
                'email' => $email,
                'about' => $about,
                'avatar' => $avatar_name
            );
            if ($this->form_validation->run()) {
                $this->db->insert('users', $user);
                redirect('users');
            } else {
                $this->load->view('header', $data);
                $this->load->view('menu');
                $this->load->view('create');
                $this->load->view('footer');
                return;
            }
        }
        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('create');
        $this->load->view('footer');
    }

    /**
     * method to edit a user
     * @param int $id
     */
    public function edit($id) {
        $this->load->library('form_validation');

        if ($id != '') {
            $user_id = (int) $id;
            $data = array(
                'title' => 'Edit a User',
                'action' => site_url('users/edit') . '/' . $user_id,
                'users' => $this->Prime_model->get_data('users', 'id', $user_id),
                'button' => 'Update'
            );
            if (count($data['users']) < 1) {
                redirect('users');
            }
        }

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            $username = $this->input->post('username', TRUE);
            $email = $this->input->post('email', TRUE);
            $about = $this->input->post('about', TRUE);

            $user = array(
                'username' => $username,
                'email' => $email,
                'about' => $about
            );
            if ($this->form_validation->run()) {
                $this->db->where('id', $user_id)->update('users', $user);
                redirect('users');
            } else {
                $this->load->view('header', $data);
                $this->load->view('menu');
                $this->load->view('create');
                $this->load->view('footer');
                return;
            }
        }


        $this->load->view('header', $data);
        $this->load->view('menu');
        $this->load->view('create');
        $this->load->view('footer');
    }

    /**
     * save user by ajax
     */
    public function save() {
        if ($this->input->is_ajax_request()) {
            $user_id = $this->input->post('user_id');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $data = array(
                'username' => $username,
                'email' => $email
            );

            if (!$this->db->where('id', (int) $user_id)->update('users', $data)) {
                echo 'problem';
            } else {
                $query = $this->db->where('id', (int) $user_id)->get('users');
                $user = $query->row();
                echo $user->username . '|' . $user->email;
            }
        }
    }

    public function delete_user($id) {
        if ($id != '') {
            $this->db->where('id', (int) $id)->delete('users');
            redirect('users');
        }
    }

}
