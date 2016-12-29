<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
        $this->isLoggedIn();
        $this->output->delete_cache();
    }
    function isLoggedIn(){
        if($this->session->userdata('loggedin') == false){
            header("location:".base_url('mahasiswa/login'));
        }
    }
    function index(){
        $data['dataDosen'] = $this->Gmodel->rawQuery("select
                                tt_kelas.kd_tt_kelas,
                                tt_matkul.kd_tt_matkul,
                                tm_matkul.matkul,
                                tm_dosen.nama_dosen,
                                tt_matkul.semester,
                                tt_matkul.tahun_ajaran
                                from tt_kelas
                                inner join tt_jadwal on tt_kelas.kd_tt_kelas = tt_jadwal.kd_tt_kelas
                                inner join tt_matkul on tt_matkul.kd_tt_matkul = tt_jadwal.kd_tt_matkul
                                inner join tm_matkul on tm_matkul.kd_matkul = tt_matkul.kd_matkul
                                inner join tm_dosen on tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                inner join tm_mahasiswa on tm_mahasiswa.kd_mahasiswa = tt_kelas.kd_mahasiswa
                                where tm_mahasiswa.nim = '".$this->session->userdata('nim')."';");
        $data['view'] = 'main_html/content/dashboard';
        $this->load->view('main_html/content', $data);
    }
    function getDetailPertanyaan($kd_pertanyaan = null){
        if($kd_pertanyaan != null){
            $data['kd_pertanyaan'] = $kd_pertanyaan;
            $getData = $this->Gmodel->select($data, 'tm_pertanyaan');
            return $getData;
        }else{
            return "false";
        }
    }
    function pertanyaan($kd_tt_matkul = 0, $kd_tt_kelas = 0){
        // $data['dataPertanyaan'] = $this->Gmodel->get('tm_pertanyaan');
        $data['availPertanyaan'] = $this->Gmodel->rawQuery("SELECT * FROM tm_pertanyaan
                                                                                    WHERE kd_pertanyaan NOT IN (SELECT kd_pertanyaan
                                                                                                                                    FROM tt_rating
                                                                                                                                    WHERE kd_mahasiswa_kelas = '".$kd_tt_kelas."'
                                                                                                                                    AND kd_tt_matkul = '".$kd_tt_matkul."')");
        // $dataSelectTTMatkul['kd_tt_matkul'] = $kd_tt_matkul;
        $data['dataKelas'] = $this->Gmodel->rawQuery("SELECT * FROM `tt_matkul`
                                                                                INNER JOIN tm_dosen ON tm_dosen.kd_dosen = tt_matkul.kd_dosen
                                                                                INNER JOIN tm_matkul ON tm_matkul.kd_matkul = tt_matkul.kd_matkul
                                                                                WHERE `kd_tt_matkul` = ".$kd_tt_matkul." ");
        $data['view'] = 'main_html/content/pertanyaan';
        $this->load->view('main_html/content', $data);
    }
    function jawab($kd_tt_matkul = 0, $kd_tt_kelas = 0, $kd_pertanyaan = 0){

    }
    function testReturn(){
        print_r($this->checkPertanyaan('1', array(1,2,3,4,5), '356a192b7913b04c54574d18c28d46e6395428ab'));
    }
    function checkPertanyaan($kd_tt_matkul, $data_pertanyaan = null, $kd_mahasiswa_kelas = null){
        // $data['kd_pertanyaan'] = $kd_pertanyaan;
        $data['kd_mahasiswa_kelas'] = $this->getKdMahasiswa($kd_mahasiswa_kelas);
        $data['kd_tt_matkul'] = $kd_tt_matkul;
        $getData = $this->Gmodel->haveIn('kd_pertanyaan', $data_pertanyaan, $data, 'tt_ratin');
        if($getData->num_rows() > 0){
            echo "true";
        }else{
            echo "false";
        }
    }
    function checkRating($kd_pertanyaan = null, $kd_mahasiswa_kelas = null){
        if($kd_pertanyaan != null && $kd_mahasiswa_kelas != null){
            $data['kd_pertanyaan'] = $kd_pertanyaan;
            $data['kd_mahasiswa_kelas'] = $this->getKdMahasiswa($kd_mahasiswa_kelas);
            $getData = $this->Gmodel->select($data, 'tt_rating');
            if($getData->num_rows() > 0){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo 'false';
        }
    }
    function getKdMahasiswa($kd_mahasiswa){
        $data['sha1(kd_mahasiswa)'] = $kd_mahasiswa;
        $selectData = $this->Gmodel->select($data, 'tm_mahasiswa');
        return $selectData->row()->kd_mahasiswa;
    }
    function giveRating($kd_tt_matkul = null, $kd_mahasiswa_kelas = null, $nilai = null, $kd_pertanyaan = null){
        if($kd_tt_matkul != null && $kd_mahasiswa_kelas != null && $nilai != null && $kd_pertanyaan !=null){
            $data['kd_tt_matkul'] = $kd_tt_matkul;
            $data['kd_mahasiswa_kelas'] = $this->getKdMahasiswa($kd_mahasiswa_kelas);
            $data['kd_pertanyaan'] = $kd_pertanyaan;
            $data['nilai'] = $nilai;

            $insertData = $this->Gmodel->insert($data, 'tt_rating');
            if($insertData){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
    }
    function logout(){
        $this->session->sess_destroy();
        header('location:'.base_url('mahasiswa/login'));
    }
}