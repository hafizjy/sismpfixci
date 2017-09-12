<?php
class M_data extends CI_Model{
	function tambah_data($data,$table){
			$this->db->insert($table,$data);	
	}
	function edit_data($where,$table){
		
		return $this->db->get_where($table,$where);	
		
	}
	function getdeskripsinilai(){
		return $this->db->query("SELECT * FROM deskripsi_nilai");
	}

	function getkategorinilai(){
		return $this->db->query("SELECT * FROM kategori_nilai");
	}
	function setkategorinilai(){
		
		$katnilai=$this->input->post('katnilai');
		$bobot=$this->input->post('bobot');
		$data= array(
			'kategori_nilai'=>$katnilai,
			'bobot'=>$bobot
			);

		$this->db->insert('kategori_nilai',$data);
	}
	function editkategorinilai(){
		
		$id_kat=$this->input->post('id');
		$katnilai=$this->input->post('katnilai');
		$bobot=$this->input->post('bobot');
		
		$data= array(
			'kategori_nilai'=>$katnilai,
			'bobot'=>$bobot
			);
		$where= array('id_kategorinilai'=>$id_kat);
		$this->db->where($where);
		$this->db->update('kategori_nilai',$data);
	}
	
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	
}
?>