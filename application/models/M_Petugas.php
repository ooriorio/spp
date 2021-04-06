<?php
class M_Petugas extends CI_Model {
    function data_petugas(){
        $query = $this->db->query("select * from petugas");
        return $query;
    }

    function simpan(){
        $data = array('id_petugas' => $this->input->post('id_petugas'),
                'username' => ($this->input->post('username')),
                'password' => md5($this->input->post('password')),
                'nama_petugas' => $this->input->post('nama_petugas'));
        $insert = $this->db->insert('petugas',$data);
        if($insert > 0){
            $this->session->set_flashdata('suksessimpan','Data Petugas Berhasil Disimpan');
        }else{
            $this->session->set_flashdata('gagalsimpan','Data Petugas Gagal disimpan');
        }
    }
    function data_petugas_by_id($id){
        $query = $this->db->query("select * from petugas where id_petugas = '$id'");
        return $query;
    }
    function update(){
        $where = array('id_petugas'=> $this->input->post('id_petugas'));
        $data1 = array('password' => md5($this->input->post('password')),
        'nama_petugas' => $this->input->post('nama_petugas'),
        'level' => $this->input->post('level'));

        $data2 = array('nama_petugas' => $this->input->post('nama_petugas'),
            'level' => $this->input->post('level'));

        if (empty($this->input->post('password'))){
            $this->db->where($where);
            $query = $this->db->update('petugas',$data2);
        }else{
            $this->db->where($where); 
             $query = $this->db->update('petugas',$data1);  
        }
        if ($query > 0) {
                $this->session->set_flashdata('suksessimpan','Data  Petugas  Berhasil Diperbarui');
    }
   
    function hapus_data_petugas($id){
$query = $this->db->query("delete from petugas where id_petugas = '$id'");
if ($query > 0) {
$this->session->set_flashdata('suksessimpan','Data Petugas Berhasil
Dihapus');
}else{
$this->session->set_flashdata('gagalsimpan','Data Petugas Gagal
Dihapus');
        }
    }
}
public function pdf(){
      $this->load->library('dompdf_gen');

      $data['petugas'] = $this->M_Petugas->data_petugas()->result();

      $this->load->view('laporan_pdf',$data);

      $paper_size = 'A4';
      $orientation = 'landscape';
      $html = $this->output->get_output();
      $this->dompdf->set_paper($paper_size, $orientation);

      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("laporan_petugas.pdf", array('Attachment' =>0));
    }
}