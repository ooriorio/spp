<?php
class Transaksi extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Transaksi');
    }

    public function index(){
        if($this->session->userdata('login')!= TRUE){
            redirect('login');
        }

        $data['title'] = "Data Transaksi";
        $data['transaksi'] = $this->M_Transaksi->data_transaksi();
        $this->template->load_admin('index','transaksi',$data);
    }

    public function tambah(){
        if($this->session->userdata('login')!= TRUE){
        redirect('login');
        }

        $data['title'] = "Data Transaksi";
        $data['subtitle'] = "Tambah Data Transaksi";
        $this->template->load_admin('index','transaksi_tambah',$data);
    }

    public function simpan(){
        if($this->session->userdata('login')!= TRUE){
        redirect('login');
        }

        $this->M_Transaksi->simpan();
        redirect('transaksi');
    }
public function ubah(){
       if($this->session->userdata('login')!= TRUE){
         redirect('login');
    }

      $data['title'] = "Transaksi";
      $data['subtitle'] = "Edit Data Transaksi";
      $id = $this->uri->segment(3);
      $data['pembayaran'] = $this->M_Pembayaran->data_pembayaran_by_id($id);
      $this->template->load_admin('index','transaksi_ubah',$data);
    }

    public function update(){
      if ($this->session->userdata('login') != true) {
      redirect('login');
      }
      $this->M_Pembayaran->update();
      redirect('transaksi');
    }

    public function hapus(){
      if($this->session->userdata('login')!= TRUE){
      redirect('login');
      }
      $id = $this->uri->segment(3);
      $this->M_Transaksi->hapus_data_pembayaran($id);
      redirect('transaksi');
    }
    public function pdf(){
      $this->load->library('dompdf_gen');

      $data['transaksi'] = $this->M_Transaksi->data_transaksi()->result();

      $this->load->view('pembayaran_pdf',$data);

      $paper_size = 'A4';
      $orientation = 'landscape';
      $html = $this->output->get_output();
      $this->dompdf->set_paper($paper_size, $orientation);

      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("laporan_pembayaran.pdf", array('Attachment' =>0));
    }
}
