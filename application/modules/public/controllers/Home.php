<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_home');
  }

  function index()
  {
    $data['title']    = "I - SERVICE";
    $data['content']  = "public/content";
    $this->load->view('public/home',$data);
  }

  function get_all_service_json()
  {
    $query = $this->M_home->getall_service();
    $data = array();
    foreach ($query->result() as $row) {
      $kordinat = explode(",", $row->service_kordinat);
      $data [] = array($row->service_id,$row->service_nama,$kordinat[0],$kordinat[1],$row->service_telepon,$row->service_email,$row->service_ket_alamat,$row->service_icon,$row->service_image);
    }
    $json = json_encode($data);
    echo "var locations = $json;";
  }

  function daftar()
  {
      $data['title']    = "I - SERVICE * DAFTAR";
      $data['content']  = "public/daftar";
      $this->load->view('public/home',$data);
  }

  function daftar_aksi()
  {

    if ($this->input->is_ajax_request()) {

    $data = array('success' =>false ,'token'=>"",'tokenn'=>"",'messages'=>array());

    $this->form_validation->set_rules("service_nama", "Nama Tempat Service","trim|required|min_length[5]|max_length[50]|xss_clean");
    $this->form_validation->set_rules("service_tentang", "Tentang","trim|xss_clean");
    $this->form_validation->set_rules("service_telepon","Telepon","trim|required|min_length[5]|max_length[15]|xss_clean");
    $this->form_validation->set_rules("service_email","Email","trim|required|min_length[5]|max_length[100]|valid_email|xss_clean|callback_cek_email");
    $this->form_validation->set_rules("username","Username","trim|required|min_length[5]|max_length[50]|xss_clean|callback_alpha_dash_space|callback_cek_username");
    $this->form_validation->set_rules("password","Password","trim|required|min_length[5]|max_length[50]");
    $this->form_validation->set_rules("konfirmasi_password","Konfirmasi Password","trim|required|matches[password]|xss_clean");
    $this->form_validation->set_rules("service_kordinat","Koardinat","trim|required|xss_clean");
    $this->form_validation->set_rules("service_ket_alamat","Keterangan Alamat","trim|required|min_length[5]|xss_clean");
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run()) {

            //intput post
            $service_nama        = $this->input->post('service_nama');
            $service_tentang     = $this->input->post('service_tentang');
            $service_telepon     = $this->input->post('service_telepon');
            $service_email       = $this->input->post('service_email');
            $username            = $this->input->post('username');
            $konfirmasi_password = md5($this->input->post('konfirmasi_password'));
            $service_kordinat    = $this->input->post('service_kordinat');
            $service_ket_alamat  = $this->input->post('service_ket_alamat');

            $token  = sha1($service_email."".date("Y-m-d H:i:s"));
            $service  = array(  'service_nama'       => $service_nama,
                                'service_tentang'    => $service_tentang,
                                'service_telepon'    => $service_telepon,
                                'service_email'      => $service_email,
                                'service_kordinat'   => $service_kordinat,
                                'service_ket_alamat' => $service_ket_alamat,
                                'service_icon'       => "temp/public/img/property-types/single-family.png",
                                'service_image'      => "temp/public/img/properties/property-03.jpg",
                                'service_token'      => $token,
                                'service_aktif'      => "tidak"
                            );
            $this->M_home->simpan_daftar('service',$service);
            $id_service = $this->db->insert_id();
            //end insert service
            $auth = array( 'auth_username'  => $username,
                            'auth_password' => $konfirmasi_password,
                            'auth_level'    => "user"
                          );
            $this->M_home->simpan_daftar('auth',$auth);
            $id_auth = $this->db->insert_id();
            //end insert auth
            $trans = array(   'trans_service'   => $id_service,
                              'trans_auth'      => $id_auth,
                              );
            $this->M_home->simpan_daftar('trans',$trans);

            $data ['tokenn'] = base64_encode($service_email);
            $data ['token'] = $token;
            $data ['success']=true;
        }else{
          foreach ($_POST as $key => $value) {
            $data['messages'][$key] = form_error($key);
          }
        }
        echo json_encode($data);
      }else {
        $this->error404();
      }//end ajax request
  }

  //call back form_validation
  function alpha_dash_space($username)
  {
    if (!preg_match('/^[a-z A-Z\S]+$/', $username)) {
        $this->form_validation->set_message('alpha_dash_space', '%s hanya bisa di isi huruf');
        return FALSE;
    } else {
        return TRUE;
    }
  }

  function cek_email($email)
  {
    if ($this->M_home->cek_email($email)!=true) {
      return TRUE;
    }else{
      $this->form_validation->set_message('cek_email', '%s sudah ada');
      return FALSE;
    }
  }

  function cek_username($username)
  {
    if ($this->M_home->cek_username($username)!=true) {
      return TRUE;
    }else{
      $this->form_validation->set_message('cek_username', '%s sudah ada');
      return FALSE;
    }
  }
  // end call back form_validation


//send email
  function send_email($token="",$email="")
  {
    if($this->input->is_ajax_request()){

           $email  = $this->input->post('email');
           $token = $this->input->post('token');


            $decode_tokenn  = base64_decode($email);
            $decode_token = $token;
            $this->load->library('email');
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "mpampam5@gmail.com"; // isi dengan email kamu
            $config['smtp_pass']= "2wsx.lo9"; // isi dengan password kamu
            $config['crlf']="\r\n";
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email

                $this->email->initialize($config);
                //konfigurasi pengiriman
                $this->email->from($config['smtp_user']);
                $this->email->to($decode_tokenn);
                $this->email->subject("Verifikasi Akun");
                $this->email->message(
                 "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
                  site_url("kode/verifikasi/$decode_token")
                );

            if($this->email->send())
            {
              $pesan['pesan']="Email verifikasi telah di kirim ke <b>$decode_tokenn</b>";
            }else{
              $pesan['pesan']= "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email. silahkan hubungi admin";
            }
            echo json_encode($pesan);
          }else{
            $this->error404();
          }//end input ajax request
}
//end send email
//verif email
function verifikasi($token)
{
  $query  = $this->M_home->cek_token($token);
      if ($query->num_rows()>0) {
         $this->M_home->get_update('ya',$token);
         $data['title']    = "Info Verifikasi";
         $data['pesan']    = 'Akun sudah aktif, Silahkan <a class="label label-info" href="#" role="button"><span class="fa fa-lock"></span> Login</a> untuk mengubah informasi mengenai tempat anda.';
         $data['content']  = "public/email_verifikasi";
         $this->load->view('public/home',$data);
      }else {
        $this->error404();
      }

}
//end verif email

//lupa password
function lupapassword()
{
  if ($this->input->is_ajax_request()) {
      $data = array('success' =>false,'messages'=>array());
      $this->form_validation->set_rules("email","Email","required|trim|xss_clean|valid_email|callback_cek_email_forgot");
      $this->form_validation->set_error_delimiters('<label class="text-danger">','</label>');
      if ($this->form_validation->run()) {
        $email = $this->input->post('email');
        //$row = $this->M_home->get_where($query,'service');
        $token  = sha1($email."".date("Y-m-d H:i:s"));
              $this->M_home->get_update('ya',$token);
              $row = $this->M_home->get_join($email)->row();
              $username = $row->auth_username;

              $this->load->library('email');
              $config = array();
              $config['charset'] = 'utf-8';
              $config['useragent'] = 'Codeigniter';
              $config['protocol']= "smtp";
              $config['mailtype']= "html";
              $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
              $config['smtp_port']= "465";
              $config['smtp_timeout']= "400";
              $config['smtp_user']= "mpampam5@gmail.com"; // isi dengan email kamu
              $config['smtp_pass']= "2wsx.lo9"; // isi dengan password kamu
              $config['crlf']="\r\n";
              $config['newline']="\r\n";
              $config['wordwrap'] = TRUE;
              //memanggil library email dan set konfigurasi untuk pengiriman email

                  $this->email->initialize($config);
                  //konfigurasi pengiriman
                  $this->email->from($config['smtp_user']);
                  $this->email->to($email);
                  $this->email->subject("Konfigurasi lupa password");
                  $this->email->message(
                   "Username anda <b>$username</b><br>klik link di bawah untuk mereset password anda!<br>".
                    site_url("kode/verifikasi/$token")
                  );

              if($this->email->send())
              {
                $data['pesan']="Email verifikasi telah di kirim ke <b>$decode_tokenn</b>";
              }else{
                $data['pesan']= "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email. silahkan hubungi admin";
              }
        $data ['success']=true;

      }else {
        foreach ($_POST as $key => $value) {
          $data['messages'][$key] = form_error($key);
        }
      }
      echo json_encode($data);
  }else {
      $data['title']    = "Lupa password";
      $data['content']  = "public/lupapassword";
      $this->load->view('public/home',$data);
  }
  //end ajax request
}
//end lupa password
//function cek_email_forgot
function cek_email_forgot($email)
{
  if ($this->M_home->cek_email($email)==true) {
    return TRUE;
  }else{
    $this->form_validation->set_message('cek_email_forgot', '%s tidak di temukan,silahkan melakukan pendaftaran');
    return FALSE;
  }
}
//end cek_email_forgot

function test()
{

  echo "string";
  // $email  = $this->input->post('email');
  // $token = $this->input->post('token');
  //
  // $json = array('email' =>$email ,'token' =>$token);
  // echo json_encode($json);
}

function error404()
{
  $data['title']    = "error404 Notfound";
  $data['content']  = "public/error404";
  $this->load->view('public/home',$data);
}






}//end controller
