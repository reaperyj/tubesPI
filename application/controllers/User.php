<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
  }

  public function index()
  {
    if($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 0)
    {
      $this->load->view('user/templates/header.php');
      $this->load->view('user/index');
      $this->load->view('user/templates/footer.php');
    }else {
      $this->load->view('login/login');
    }
  }

  public function token_generate()
  {
    return $tokens = md5(uniqid(rand(), true));
  }

  private function hash_password($password)
  {
    return password_hash($password,PASSWORD_DEFAULT);
  }

  public function setting()
  {
      $data['token_generate'] = $this->token_generate();
      $this->session->set_userdata($data);

      $this->load->view('user/templates/header.php');
      $this->load->view('user/setting',$data);
      $this->load->view('user/templates/footer.php');
  }

  public function proses_new_password()
  {
    $this->form_validation->set_rules('new_password','New Password','required');
    $this->form_validation->set_rules('confirm_new_password','Confirm New Password','required|matches[new_password]');

    if($this->form_validation->run() == TRUE)
    {
      if($this->session->userdata('token_generate') === $this->input->post('token'))
      {
        $username = $this->input->post('username');
        $new_password = $this->input->post('new_password');

        $data = array(
            'password' => $this->hash_password($new_password)
        );

        $where = array(
            'id' =>$this->session->userdata('id')
        );

        $this->M_user->update_password('user',$where,$data);

        $this->session->set_flashdata('msg_berhasil','Password Telah Diganti');
        redirect(base_url('user/setting'));
      }
    }else {
      $this->load->view('user/setting');
    }
  }

  public function signout()
  {
      session_destroy();
      redirect(base_url());
  }

  public function form_barangmasuk()
  {
    $data['list_satuan'] = $this->M_user->select('tb_satuan');
    $data['avatar'] = $this->M_user->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->load->view('user/tabel/tabel_barangmasuk',$data);
  }


  public function form_permintaan_barang()
  {
    $this->form_validation->set_rules('falkutas','falkutas','required');
    $this->form_validation->set_rules('kode_barang','Kode Barang','required');
    $this->form_validation->set_rules('nama_barang','Nama Barang','required');
    $this->form_validation->set_rules('jumlah','Jumlah','required');

    if($this->form_validation->run() == TRUE)
    {
      
      $tanggal      = $this->input->post('tanggal',TRUE);
      $falkutas      = $this->input->post('falkutas',TRUE);
      $kode_barang  = $this->input->post('kode_barang',TRUE);
      $nama_barang  = $this->input->post('nama_barang',TRUE);
      $satuan       = $this->input->post('satuan',TRUE);
      $jumlah       = $this->input->post('jumlah',TRUE);

      $data = array(
            'tanggal'      => $tanggal,
            'falkutas'      => $falkutas,
            'kode_barang'  => $kode_barang,
            'nama_barang'  => $nama_barang,
            'satuan'       => $satuan,
            'jumlah'       => $jumlah
      );
      $this->M_user->insert('tb_permintaan_barang',$data);

      $this->session->set_flashdata('msg_berhasil','Data Barang Berhasil dikirim');
      redirect(base_url('user/index'));
    }else {
      $data['list_satuan'] = $this->M_user->select('tb_satuan');
      $this->load->view('user/tabel/tabel_barangmasuk',$data);
    }
  }

  public function form_user()
  {
    $data['list_satuan'] = $this->M_user->select('tb_satuan');
    $data['token_generate'] = $this->token_generate();
    $data['avatar'] = $this->M_user->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'));
    $this->session->set_userdata($data);
    $this->load->view('user/tabel/tabel_barangmasuk',$data);
  }

  ####################################
        // DATA BARANG MASUK
  ####################################

  public function tabel_barangmasuk()
  {
    $this->load->view('user/templates/header.php');
    $data['list_data'] = $this->M_user->select('tb_barang_masuk');
    $this->load->view('user/tabel/tabel_barangmasuk',$data);
    $this->load->view('user/templates/footer.php');
  }

  public function tabel_form_permintaan()
  {
    $this->load->view('user/templates/header.php');
    $data['list_data'] = $this->M_user->select('tb_permintaan_barang');
    $this->load->view('user/tabel/form_permintaan',$data);
    $this->load->view('user/templates/footer.php');
  }



  ####################################
        // DATA BARANG KELUAR
  ####################################

  public function tabel_barangkeluar()
  {
    $this->load->view('user/templates/header.php');
    $data['list_data'] = $this->M_user->select('tb_barang_keluar');
    $this->load->view('user/tabel/tabel_barangkeluar',$data);
    $this->load->view('user/templates/footer.php');
  }

  // public function tabel_barangmasuk1()
  // {
  //   $data = array(
  //             'list_data' => $this->M_user->select('tb_permintaan_barang'),
  //             // 'avatar'    => $this->M_user->get_data_gambar('tb_upload_gambar_user',$this->session->userdata('name'))
  //           );
  //   $this->load->view('user/tabel/tabel_barangmasuk',$data);
  // }



}

?>
