<?php
class Penilaian extends CI_Controller {


  public function index()
  {
   $this->load->view('penilaian/penilaian_header');
   $this->load->view('penilaian/nilaisiswa');
 }
 public function deskripsinilai(){
   $this->load->model('M_data');
   $data['deskripsi_nilai'] = $this->M_data->getdeskripsinilai()->result();
   $this->load->view('penilaian/penilaian_header');
   $this->load->view('penilaian/deskripsinilai',$data);
 }

public function hapus_desknilai($id){
  $this->load->model('M_data');
  $where= array('id_deskripsi'=>$id);
  $table= 'deskripsi_nilai';
  $this->M_data->hapus_data($where,$table);
  redirect('penilaian/deskripsinilai/13?tab=tab0');
}


 public function kategorinilai(){
  $this->load->model('M_data');
  $data['kategori_nilai'] = $this->M_data->getkategorinilai()->result();
  $this->load->view('penilaian/penilaian_header');
  $this->load->view('penilaian/kategorinilai',$data);

}
public function tambah_katnilai(){
  $this->load->model('M_data');
  $this->M_data->setkategorinilai($data);
  $this->load->view('penilaian/penilaian_header');
  $this->load->view('penilaian/kategorinilai');     
  redirect('penilaian/kategorinilai');
}

public function form_ubahkatnilai($id){
  $this->load->model('M_data');
  $where=array('id_kategorinilai'=>$id);
  $data['kategori_nilai']=$this->M_data->edit_data($where,'kategori_nilai')->result();
  $this->load->view('penilaian/penilaian_header');
  $this->load->view('Penilaian/edit/edit_kategori',$data);
}
public function ubah_katnilai(){

  $this->load->model('M_data');

  $this->load->view('penilaian/penilaian_header');
  $this->load->view('penilaian/edit/edit_kategori');     
  $this->M_data->editkategorinilai($data);
}
public function hapus_katnilai($id){
  $this->load->model('M_data');
  $where= array('id_kategorinilai'=>$id);
  $table= 'kategori_nilai';
  $this->M_data->hapus_data($where,$table);
  redirect('penilaian/kategorinilai');
}

public function jenisNA(){
  $this->load->view('penilaian/penilaian_header');
  $this->load->view('penilaian/jenisnilaiakhir');
}
public function rapor(){
  $this->load->view('penilaian/penilaian_header');
  $this->load->view('penilaian/rapor');
}
}