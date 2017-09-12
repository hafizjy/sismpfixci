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
 public function tambah_desknilai(){
  $katnilai=$this->input->post('katnilai');
    $bobot=$this->input->post('bobot');
    $data= array(
      'kategori_nilai'=>$katnilai,
      'bobot'=>$bobot
      );
    $this->load->model('m_data');
    $this->m_data->tambah_data($data,'kategori_nilai');
  $this->load->view('penilaian/penilaian_header');
  $this->load->view('penilaian/kategorinilai');     
  redirect('penilaian/kategorinilai');
}


public function hapus_desknilai($id){
  $this->load->model('M_data');
  $where= array('id_deskripsi'=>$id);
  $table= 'deskripsi_nilai';
  $this->M_data->hapus_data($where,$table);
  redirect('penilaian/deskripsinilai/');
}
public function ajax_list()
    {
        $this->load->model('M_data');
        $data = array();
        $no = $_POST['start'];
        foreach ($kategori_nilai as $person) {
            $no++;
            $row = array();
            $row[] = $person->kategori_nilai;
            $row[] = $person->bobot;
            
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->kategori_nilai->count_all(),
                        "recordsFiltered" => $this->kategori_nilai->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

 public function kategorinilai(){
  $this->load->model('M_data');
  $data['kategori_nilai'] = $this->M_data->getkategorinilai()->result();
  $this->load->view('penilaian/penilaian_header');
  $this->load->view('penilaian/kategorinilai',$data);

}
public function tambah_katnilai(){
  $katnilai=$this->input->post('katnilai');
    $bobot=$this->input->post('bobot');
    $data= array(
      'kategori_nilai'=>$katnilai,
      'bobot'=>$bobot
      );
    $this->load->model('m_data');
    $this->m_data->tambah_data($data,'kategori_nilai');
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