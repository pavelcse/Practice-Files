<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//first rename this file as "Prime_model.php" and put it on models directory
class Prime_model extends CI_Model {

    public function insert_into_db() {
        $post = $this->input->post();

        $data = array('Branch' => $post['branch'], 'BusinessUnit' => $post['buinessUnit'], 'DeviceType' => $post['deviceType'], 'Brand' => $post['brand'], 'DeviceModel' => $post['deviceModel'], 'SN' => $post['SN'], 'Status' => $post['status'], 'Departmant' => $post['department'], 'UserName' => $post['username'], 'Notes' => $post['notes'], 'ComputerName' => $post['computerName']);
        $this->db->insert('hardware_assets', $data);
        return $this->db->insert_id(); // if using mysql
    }

}
