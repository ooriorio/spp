<?php
class kelas extends CI_Controller{
	public function __construct(){
	parent::__construct();
	$this->load->model('M_Kelas');
	}
	public function index(){
        if($this->session->userdata('login')!= TRUE){
            redirect('login');
        }

        $data['title'] = "Data Kelas";
        $data['kelas'] = $this->M_Kelas->data_kelas();
        $this->template->load_admin('index','kelas',$data);
    }

    public function tambah(){
        if($this->session->userdata('login')!= TRUE){
            redirect('login');
        }

        $data['title'] = "Data kelas";
        $data['subtitle'] = "Tambah Data kelas";
        $this->template->load_admin('index','kelas_tambah',$data);
    }

    public function simpan(){
        if($this->session->userdata('login')!= TRUE){
            redirect('login');
        }

        $this->M_Kelas->simpan();
        redirect('kelas');
    }
     public function ubah(){
       if($this->session->userdata('login')!= TRUE){
         redirect('login');
    }

      $data['title'] = "Data Kelas";
      $data['subtitle'] = "Edit Data Kelas";
      $id = $this->uri->segment(3);
      $data['kelas'] = $this->M_Kelas->update($id);
      $this->template->load_admin('index','kelas_ubah',$data);
    }

    public function update(){
      if ($this->session->userdata('login') != true) {
      redirect('login');
      }
      $this->M_Kelas->update();
      redirect('kelas');
    }

    public function hapus(){
        if($this->session->userdata('login')!=TRUE){
            redirect('login');
        }
         $id = $this->uri->segment(3);
      $this->M_Kelas->hapus_data_kelas($id);
      redirect('kelas');
    }

    public function pdf(){
      $this->load->library('dompdf_gen');

      $data['kelas'] = $this->M_Kelas->data_kelas()->result();

      $this->load->view('kelas_pdf',$data);

      $paper_size = 'A4';
      $orientation = 'landscape';
      $html = $this->output->get_output();
      $this->dompdf->set_paper($paper_size, $orientation);

      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("laporan_kelas.pdf", array('Attachment' =>0));
    }
}
