<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getall_service()
  {
  $this->db->where('service_aktif','ya');
  $query  = $this->db->get('service');
  return $query;
}

function get_join($where)
{
  $sql = "SELECT
                auth.auth_username,
                auth.auth_level,
                service.service_email,
                service.service_aktif
          FROM
                trans
          LEFT JOIN auth ON auth.auth_id = trans.trans_auth
          LEFT JOIN service ON service.service_id = trans.trans_service
          WHERE service_email=$where
          LIMIT 1";
  return $this->db->query($sql);
}

  function get_where($data,$table)
  {
  return $this->db->where($data)
                  ->get($table);
  }

function simpan_daftar($table,$query)
{
  return $this->db->insert($table,$query);
}

function cek_email($email)
{
  $this->db->where('service_email',$email);
  $query  = $this->db->get('service');
  if ($query->num_rows()>0) {
    return true;
  }
}

function cek_username($username)
{
  $this->db->where('auth_username',$username);
  $query  = $this->db->get('auth');
  if ($query->num_rows()>0) {
    return true;
  }
}

function cek_token($token)
{
  $this->db->where('service_token',$token)
            ->limit(1);
  $query  = $this->db->get('service');
  return $query;
}

function get_update($data,$token)
	{
		return $this->db
				->where('service_token', $token)
				->update('service',array('service_aktif' =>$data));
	}

}//end model
