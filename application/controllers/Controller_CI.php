<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_CI extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->library('session');	
        $this->load->model('Model_CAT');
		$this->load->helper(array('url','download'));		
		#Ht$PVYsVq5NF^y7Vlrw4
		
	}


	public function index()
	{	
		$this->load->view('index');
	}

	public function login()
	{	
		$pengguna = $this->Model_CAT->syntax("select * from pengguna where username='".$this->input->post('un')."' and pass=md5('".$this->input->post('pass')."') ")->result();

		if(count($pengguna)>0){

			$cek = $this->Model_CAT->syntax("select * from admin where username='".$this->input->post('un')."'")->result();

			if(count($cek)>0){
				$status = 1;
			}

			$cek = $this->Model_CAT->syntax("select * from guru where username='".$this->input->post('un')."'")->result();

			if(count($cek)>0){
				$newdata = array(
				        'username'  => $cek[0]->username,
				        'id'  => $cek[0]->nip,
				        'nama'     => $cek[0]->nama,
				        'logged_as' => "Guru"
				);

				$this->session->set_userdata($newdata);
				$status = 2;
			}

			$cek = $this->Model_CAT->syntax("select * from siswa where username='".$this->input->post('un')."'")->result();

			if(count($cek)>0){
				$ceknew = $this->Model_CAT->syntax("select * from siswa_x_kelas where id_siswa='".$cek[0]->nis."'")->result();
				$newdata = array(
					'username'  => $cek[0]->username,
					'id'  => $cek[0]->nis,
					'nama'     => $cek[0]->nama,
					'kelas'     => $ceknew[0]->id_kelas,
					'logged_as' => "Siswa"
				);
				$this->session->set_userdata($newdata);
				$status = 3;
			}
			

			
			if($status==1){
				redirect("admin");
			}
			elseif($status==2){
				
				redirect("guru");
			}
			else{
				redirect("berandasiswa");
			}
			
		}
		else{
			redirect("");
		}
		
	}

	public function logout()
	{
		session_destroy();
		redirect("");
	}


	public function guru()
	{	
		// $data['pengumuman'] = $this->Model_CAT->syntax("select * from pengumuman p join jadwal j on(p.id_jadwal =j.id) join guru_x_mapel g on (j.guru_x_mapel=g.id) where g.id_guru='".$_SESSION['id']."'")->result();
		$data['jadwal'] = $this->Model_CAT->syntax("select j.*,m.nama,k.nama as kelas,k.keterangan from jadwal j join guru_x_mapel g on(j.guru_x_mapel=g.id) join mapel m on(g.id_mapel = m.id) join kelas k on(j.id_kelas=k.id) where g.id_guru='".$_SESSION['id']."'")->result();
		$this->load->view('guru/guru',$data);
	}

	public function jadwalguru($id)
	{	
		$_SESSION['jadwalguru'] = $id;
		$jadwal = $this->Model_CAT->syntax("select j.*,m.nama from jadwal j join guru_x_mapel g on(j.guru_x_mapel=g.id) join mapel m on(g.id_mapel = m.id) where j.id='".$_SESSION['jadwalguru']."'")->result();
		$_SESSION['namamatpel'] = $jadwal[0]->nama;
		$data['pengumuman'] = $this->Model_CAT->syntax("select p.* from pengumuman p join jadwal j on(p.id_jadwal =j.id) join guru_x_mapel g on (j.guru_x_mapel=g.id) where j.id='".$_SESSION['jadwalguru']."'")->result();
		$this->load->view('guru/jadwalguru',$data);
		
	}

	public function tambahpengumuman()
	{	
		$data=array(
			'id'=>NULL,
			'pengumuman'=>$this->input->post('teks'),
			'id_jadwal'=>$this->input->post('judul'),
			'tanggal'=>date('Y-m-d')
		);
		$this->Model_CAT->input("pengumuman",$data);
		redirect("jadwalguru/".$this->input->post('judul'));
	}

	public function hapuspengumuman($id)
	{	

		$this->Model_CAT->delete("pengumuman","id",$id);
		redirect("jadwalguru/".$_SESSION['jadwalguru']);
	}

	public function ujianguru()
	{	
		$data['ujian'] = $this->Model_CAT->syntax("select * from ujian where id_jadwal='".$_SESSION['jadwalguru']."'")->result();
		$this->load->view('guru/ujianguru',$data);
	}

	public function tambahujian()
	{	
		$data=array(
			'id'=>NULL,
			'keterangan'=>$this->input->post('teks'),
			'tanggal'=>$this->input->post('tanggal'),
			'id_jadwal'=>$_SESSION['jadwalguru']
		);
		$this->Model_CAT->input("ujian",$data);
		redirect("ujianguru");
	}

	public function hapusujian($id)
	{	
		
		$this->Model_CAT->delete("ujian","id",$id);
		redirect("ujianguru");
	}

	public function kuisguru($id)
	{	
		$data['soal'] = $this->Model_CAT->syntax("select * from soal where id_ujian='".$id."'")->result();
		$data['ujian'] = $this->Model_CAT->syntax("select * from ujian where id='".$id."'")->result();
		$jawaban=array();
		$ketjawaban=array();
		foreach($data['soal'] as $row) {
			$temp=array();
			$tempa=array();
			$res = $this->Model_CAT->syntax("select * from jawaban_soal where id_soal='".$row->id."'")->result();
			foreach($res as $rowa) {
				array_push($temp,$rowa->jawaban);
				array_push($tempa,$rowa->nilai);
			}
			array_push($jawaban,$temp);
			array_push($ketjawaban,$tempa);
		}

		$data['jawaban'] = $jawaban;
		$data['jawabana'] = $ketjawaban;
		$this->load->view('guru/kuisguru',$data);
	}

	public function editsoal($id,$ida)
	{	
		$data['soal'] = $this->Model_CAT->syntax("select * from soal where id='".$id."'")->result();
		$jawaban = $this->Model_CAT->syntax("select * from jawaban_soal where id_soal='".$data['soal'][0]->id."'")->result();		
		$data['jawaban'] = $jawaban;
		$data['ujian']=$ida;
		$this->load->view('guru/editsoal',$data);
	}

	public function aksieditsoal()
	{	
		$data['soal'] = $this->Model_CAT->syntax("select * from soal where id='".$this->input->post('id_soal')."'")->result();
		$jawaban = $this->Model_CAT->syntax("select * from jawaban_soal where id_soal='".$data['soal'][0]->id."'")->result();		
		foreach($jawaban as $row){
			if($this->input->post("jawaban")==$row->id){
				$syntax = "update jawaban_soal set jawaban='".$this->input->post($row->id)."',nilai='1' where id='".$row->id."'";
			}
			else{
				$syntax = "update jawaban_soal set jawaban='".$this->input->post($row->id)."',nilai='0' where id='".$row->id."'";
			}
			$this->Model_CAT->syntax($syntax);
			echo $syntax."<br>";
		}
	
		$this->Model_CAT->syntax("update soal set pertanyaan='".$this->input->post('soal')."',level='".$this->input->post('level')."' where id='".$this->input->post('id_soal')."'");
		redirect("kuisguru/".$this->input->post('ujian'));
	}

	public function tambahsoal()
	{	
		$syntax = "insert into soal values(NULL,'".$this->input->post('soal')."','".$this->input->post('level')."','".$this->input->post('ujian')."')";	
		echo $syntax."<br>";
		$this->Model_CAT->syntax($syntax);
		$syntax = "select * from soal where pertanyaan='".$this->input->post('soal')."'";	
		echo $syntax."<br>";
		$ids=$this->Model_CAT->syntax($syntax)->result()[0]->id;
		for($x=0;$x<4;$x++){
			if($this->input->post('jawaban')==($x+1)){
				$syntax = "insert into jawaban_soal values(NULL,'".$this->input->post('j'.$x)."','1','".$ids."')";	
				echo $syntax."<br>";
				$this->Model_CAT->syntax($syntax);
			}
			else{
				$syntax = "insert into jawaban_soal values(NULL,'".$this->input->post('j'.$x)."','0','".$ids."')";	
				echo $syntax."<br>";
				$this->Model_CAT->syntax($syntax);
			}
		}
		//$this->Model_CAT->syntax();
		redirect("kuisguru/".$this->input->post('ujian'));
	}
	
	public function materi()
	{	
		$data['materi'] = $this->Model_CAT->syntax("select * from materi")->result();
		$this->load->view('guru/materi',$data);
	}

	public function tambahmateri()
	{	
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = '0';
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if($this->upload->do_upload('berkas')){
			$temp = $this->upload->data('file_name');
			$syntax="insert into materi values(NULL,'".$this->input->post('judul')."','".$this->input->post('deskripsi')."','".$temp."','".$_SESSION['jadwalguru']."')";
			echo $syntax;
			$this->Model_CAT->syntax($syntax);
		}
		else{
			$syntax="insert into materi values(NULL,'".$this->input->post('judul')."','".$this->input->post('deskripsi')."',NULL,'".$_SESSION['jadwalguru']."')";
			echo $syntax;
			$this->Model_CAT->syntax($syntax);
		}
		// else{
		
		// 	echo "Berhasil";
		// }
		
		
		redirect("materi");
		//$this->load->view('guru/materi',$data);
	}

	public function downloadmateri($id){				
		force_download('upload/'.$id,NULL);
	}

	public function hapusmateri($id)
	{	
		$syntax="delete from materi where id_materi='".$id."'";
		echo $syntax;
		$this->Model_CAT->syntax($syntax);
		redirect("materi");
		//$this->load->view('guru/materi',$data);
	}

	
	public function siswaguru()
	{
		$syntax="SELECT s.* from siswa s join siswa_x_kelas sk on (s.nis=sk.id_siswa) join kelas k on (k.id=sk.id_kelas)";
		$data['siswa'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('guru/siswaguru',$data);
	
	}
	public function scoresiswa($id)
	{
		$syntax="SELECT s.* from siswa s join siswa_x_kelas sk on (s.nis=sk.id_siswa) join kelas k on (k.id=sk.id_kelas) where k.id='".$_SESSION['id']."'";
		$data['siswa'] = $this->Model_CAT->syntax($syntax)->result();
		
		$rekapnilai=array();
		foreach($data['siswa'] as $row){
			$syntax="select * from jawaban_siswa where siswa='".$row->nis."' and id_ujian='".$id."'";	
			$nilaisiswa = $this->Model_CAT->syntax($syntax)->result();
			$nilai=0;
			foreach($nilaisiswa as $row){
				if($row->keterangan==1){
					$nilai+=5;
				}
			}
			$nilai = $nilai/50*100;
			array_push($rekapnilai,$nilai);
		}

		$data['rekapnilai'] = $rekapnilai;
		$this->load->view('guru/scoresiswa',$data);
	}
	public function detailskorsiswa($nis)
	{
		$syntax="SELECT js.*, j.jawaban, s.pertanyaan, s.level from jawaban_siswa js join jawaban_soal j on (js.jawaban_soal = j.id) join soal s on (j.id_soal = s.id) where js.siswa='".$nis."'";
		$nilaisiswa = $this->Model_CAT->syntax($syntax)->result();
		$nilai=0;
		foreach($nilaisiswa as $row){
			if($row->keterangan==1){
				$nilai+=5;
			}
		}
		$data['nilai'] = $nilai/50*100;;
		$data['jawaban'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('guru/detailskorsiswa',$data);
	}
	
	// admin controller /////////////////////////////////////////////////////////////////////////////////////////
	public function admin()
	{

		$syntax="select k.*, th.tahun from kelas k join tahun_ajaran th on (th.id=k.tahun_ajaran)";
		$data['kelas'] = $this->Model_CAT->syntax($syntax)->result();		
		$this->load->view('admin/beranda',$data);
	}
	public function jadwaladmin($id)
	{
		$jadwal=array();
		$hari=array("Senin","Selasa","Rabu","Kamis","Jumat");
		for($x=0;$x<count($hari);$x++){
			$temp=array();
			for($y=1;$y<10;$y++){
				$syntax="select j.jam,m.nama as mapel,r.nama, k.id from jadwal j join guru_x_mapel g on(j.guru_x_mapel=g.id) join guru r on(g.id_guru=r.nip) join mapel m on(g.id_mapel=m.id)join kelas k on(j.id_kelas=k.id) where j.hari='".$hari[$x]."' and j.jam='".$y."' and k.id='".$id."'";
				$res = $this->Model_CAT->syntax($syntax)->result();
				array_push($temp,$res);
			}
			if(count($temp)==0){
				$temp=array("NAN","NAN","NAN");
			}
			array_push($jadwal,$temp);
			
		}
		$data['jadwal'] = $jadwal;
		$data['hari'] = $hari;
		$this->load->view('admin/jadwaladmin',$data);

				
		
	}

	public function guruadmin()
	{
		$syntax="select * from guru";
		$data['guru'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('admin/guruadmin',$data);
	}

	public function tambahguruadmin()
	{

		$this->load->view('admin/tambahguru');
	}

	public function aksitambahguruadmin()
	{
		$syntax="insert into pengguna values('".$this->input->post("i1")."',md5('".$this->input->post("i2")."')	,'Guru')";
		$this->Model_CAT->syntax($syntax);

		$syntax="insert into guru values('".$this->input->post("i3")."','".$this->input->post("i4")."','".$this->input->post("i5")."','".$this->input->post("i6")."','".$this->input->post("i7")."','".$this->input->post("i8")."','".$this->input->post("i1")."')";
		$this->Model_CAT->syntax($syntax);
		redirect("guruadmin");
	}
	public function tambahkelasadmin()
	{
		$syntax="select * from tahun_ajaran";
		$data['tahun_ajaran'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('admin/tambahkelas',$data);
	}

	public function aksitambahkelasadmin()
	{
		$syntax="insert into kelas values(NULL,'".$this->input->post("i1")."','".$this->input->post("i2")."','".$this->input->post("i3")."')";
		$this->Model_CAT->syntax($syntax);

		redirect("admin");
	}

	public function detailguru($id)
	{
		$syntax="select gm.*,g.nama as nama_guru,m.nama as nama_mapel from guru_x_mapel gm join guru g on(gm.id_guru=g.nip) join mapel m on (gm.id_mapel=m.id) where gm.id_guru='".$id."'";
		$data['gurumatpel'] = $this->Model_CAT->syntax($syntax)->result();

		$syntax="select * from guru where nip='".$id."'";
		$data['idguru'] = $this->Model_CAT->syntax($syntax)->result();


		$syntax="select * from mapel";
		$data['mapel'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('admin/detailguruadmin',$data);
	}

	public function aksitambahmatpelguru()
	{
		$id_guru = $this->input->post("guru");
		$id_mapel = $this->input->post("matpel");
		$syntax="insert into guru_x_mapel values(NULL,'".$id_guru."','".$id_mapel."')";
		$this->Model_CAT->syntax($syntax);
		redirect("detailguru/".$id_guru);
	}

	public function aksihapusmatpelguru($id,$ida)
	{
	
		$syntax="delete from guru_x_mapel where id='".$id."'";
		$this->Model_CAT->syntax($syntax);
		redirect("detailguru/".$ida);
	}
	

	public function matpeladmin()
	{
		$syntax="select * from mapel";
		$data['mapel'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('admin/matpeladmin',$data);
	}

	public function aksitambahmatpeladmin()
	{
		$nama = $this->input->post("mapel");
		$syntax="insert into mapel values(NULL,'".$nama."')";
		$this->Model_CAT->syntax($syntax);
		redirect("matpeladmin");
	}

	public function aksieditmatpeladmin()
	{
		$nama = $this->input->post("mapel");
		$id = $this->input->post("id");
		$syntax="update mapel set nama='".$nama."' where id='".$id."'";
		$this->Model_CAT->syntax($syntax);
		redirect("matpeladmin");
	}

	public function hapusmatpeladmin($id)
	{
		$syntax="delete from mapel where id='".$id."'";
		$this->Model_CAT->syntax($syntax);
		redirect("matpeladmin");
	}


	public function siswaadmin()
	{
		$syntax="SELECT * from siswa";
		$data['siswa'] = $this->Model_CAT->syntax($syntax)->result();
		$syntax="select * from kelas";
		$data['kelas'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('admin/siswaadmin',$data);
	}
	public function siswakelasadmin()
	{
		$syntax="SELECT s.* from siswa s  join siswa_x_kelas sk on (s.nis=sk.id_siswa) join kelas k on (k.id=sk.id_kelas) where k.id='".$this->input->post("id_kelas")."'";
		$data['siswa'] = $this->Model_CAT->syntax($syntax)->result();
		$syntax="select * from kelas";
		$data['kelas'] = $this->Model_CAT->syntax($syntax)->result();
		
		$this->load->view('admin/siswaadmin',$data);
	}

	public function detailsiswa($id)
	{

		$syntax="SELECT s.*,p.username,p.pass,k.id_kelas FROM siswa s join pengguna p on(s.username=p.username) join siswa_x_kelas k on(s.nis=k.id_siswa) where s.nis='".$id."'";
		$data['siswa'] = $this->Model_CAT->syntax($syntax)->result();


		$syntax="select * from kelas";
		$data['kelas'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('admin/detailsiswaadmin',$data);
	}

	public function aksieditsiswaadmin()
	{
		$this->input->post("i1");
		$sql="update pengguna set username='".$this->input->post("i6")."'";
		if($this->input->post("i7")!=""){
			$sql.=(",pass=md5('".$this->input->post("i7")."')");
		}
		$sql.=(" where username='".$this->input->post("i6")."'");
		// echo $sql;
		$this->Model_CAT->syntax($sql);
		// echo "<br>";
		$sql="update siswa_x_kelas set id_kelas='".$this->input->post("i5")."' where id_siswa='".$this->input->post("i1")."'";
		// echo $sql;
		$this->Model_CAT->syntax($sql);
		// echo "<br>";
		$sql="update siswa set nama='".$this->input->post("i2")."',tgl_lahir='".$this->input->post("i3")."',jenis_kelamin='".$this->input->post("i4")."' where nis='".$this->input->post("i1")."'";
		// echo $sql;
		$this->Model_CAT->syntax($sql);
		// echo "<br>";
		redirect("siswaadmin");

		
	}

	public function tambahsiswaadmin()
	{
		$syntax="select * from kelas";
		$data['kelas'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('admin/tambahsiswa',$data);
	}

	public function aksitambahsiswaadmin()
	{
		$syntax="insert into pengguna values('".$this->input->post("i1")."',md5('".$this->input->post("i2")."')	,'Siswa')";
		$this->Model_CAT->syntax($syntax);

		$syntax="insert into siswa values('".$this->input->post("i3")."','".$this->input->post("i4")."','".$this->input->post("i5")."','".$this->input->post("i6")."','".$this->input->post("i1")."')";
		$this->Model_CAT->syntax($syntax);

		$syntax="insert into siswa_x_kelas values(NULL,'".$this->input->post("i3")."','".$this->input->post("i7")."')";
		$this->Model_CAT->syntax($syntax);

		redirect("siswaadmin");
	
		
	}
	public function tambahjadwal()
	{
		$syntax="select * from jadwal";
		$data['jadwal'] = $this->Model_CAT->syntax($syntax)->result();
		$syntax="select gm.id, gm.id_guru, gm.id_mapel, g.nama, m.nama as namamapel from guru_x_mapel gm join guru g on(gm.id_guru = g.nip) join mapel m on (gm.id_mapel = m.id)";
		$data['guru_x_mapel'] = $this->Model_CAT->syntax($syntax)->result();
		$syntax="select * from kelas";
		$data['kelas'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('admin/tambahjadwal',$data);
	}
	public function aksitambahjadwaladmin()
	{
		$syntax="insert into jadwal values(NULL,'".$this->input->post("hari")."','".$this->input->post("jam")."','".$this->input->post("i1")."','".$this->input->post("i2")."')";
		$this->Model_CAT->syntax($syntax);

		redirect("admin/tambahjadwal");
	}
	

	// siswa controller /////////////////////////////////////////////////////////////////////////////////////////
	public function berandasiswa()
	{
		$jadwal=array();
		$hari=array("Senin","Selasa","Rabu","Kamis","Jumat");
		for($x=0;$x<count($hari);$x++){
			$temp=array();
			for($y=1;$y<10;$y++){
				$syntax="SELECT j.hari,j.jam,m.nama,g.nama as namaguru FROM jadwal j join kelas k on(j.id_kelas=k.id) join siswa_x_kelas sk on(j.id_kelas=sk.id_kelas) join guru_x_mapel gm on(j.guru_x_mapel=gm.id) join guru g on(gm.id_guru=g.nip) join mapel m on(gm.id_mapel=m.id) where j.hari='".$hari[$x]."' and j.jam='".$y."' and sk.id_siswa='".$_SESSION['id']."'";

				$res = $this->Model_CAT->syntax($syntax)->result();
				array_push($temp,$res);
			}
			if(count($temp)==0){
				$temp=array("NAN","NAN","NAN");
			}
			array_push($jadwal,$temp);
			
		}
		$data['jadwal'] = $jadwal;
		$data['hari'] = $hari;		
		$this->load->view('siswa/siswa',$data);
	}

	public function pengumumansiswa()
	{
		$syntax = "SELECT p.tanggal,p.pengumuman,m.nama FROM pengumuman p join jadwal j on(p.id_jadwal=j.id) join guru_x_mapel gm on(j.guru_x_mapel=gm.id) join mapel m on(gm.id_mapel=m.id) where j.id_kelas='".$_SESSION['kelas']."'";
		$data['pengumuman'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('siswa/pengumuman',$data);
	}
	public function ujiansiswa()
	{
		
		$syntax="SELECT u.id,u.tanggal,u.keterangan,m.nama FROM ujian u join jadwal j on(u.id_jadwal=j.id) join guru_x_mapel gm on(j.guru_x_mapel=gm.id) join mapel m on(gm.id_mapel=m.id) where j.id_kelas='".$_SESSION['kelas']."'";
		$data['ujian'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('siswa/ujian',$data);
	}
	public function ikutiujian($id)
	{
		$syntax="select * from jawaban_siswa where siswa='".$_SESSION['id']."' and id_ujian='".$id."'";
		$temp = $this->Model_CAT->syntax($syntax)->result();
		//echo count($temp);
		$data['nosoal'] = count($temp);
		if(count($temp)>=9){
			redirect("skorujian/".$id);
		}
		if($this->input->post('soal')){
			$syntax="select * from jawaban_soal where id='".$this->input->post('p'.$this->input->post('soal'))."'";
			$ket = $this->Model_CAT->syntax($syntax)->result()[0]->nilai;
			$syntax="insert into jawaban_siswa values(NULL,'".$_SESSION['id']."','".$id."','".$this->input->post('soal')."','".$this->input->post('p'.$this->input->post('soal'))."','".$ket."')";
			$this->Model_CAT->syntax($syntax);
		}
		
		$syntax="select js.*,s.level from jawaban_siswa js join soal s on(js.id_soal=s.id) where js.siswa='".$_SESSION['id']."' and js.id_ujian='".$id."';";
		$temp = $this->Model_CAT->syntax($syntax)->result();
		if(count($temp)==0){
			$level = 2;
			$idnya=0;
		}
		else{
			$indtemp = count($temp)-1;
			if($temp[$indtemp]->keterangan=="1"){
				$level = $temp[$indtemp]->level+1;
				if($level>3){
					$level=3;
				}
				$cond=1;
			}
			if($temp[$indtemp]->keterangan=="0"){
				$level = $temp[$indtemp]->level-1;
				if($level<1){
					$level=1;
				}
				$cond=-1;			
			}		
			$syntax="select js.*,s.level from jawaban_siswa js join soal s on(js.id_soal=s.id) where js.siswa='".$_SESSION['id']."' and js.id_ujian='".$id."' and s.level='".$level."';";
			$idnya = count($this->Model_CAT->syntax($syntax)->result());			
		}

		$syntax="SELECT s.id,s.id_ujian,js.id as idj,js.jawaban,js.nilai,s.pertanyaan,s.level FROM jawaban_soal js join soal s on (js.id_soal=s.id) join ujian u on (s.id_ujian=u.id) where u.id='".$id."' and s.level='".$level."'";
		
		$data['ujian'] = $this->Model_CAT->syntax($syntax)->result();
		if(count($data['ujian'])-($idnya*4)<=0){
			if($level==3 || $level==1){
				redirect("skorujian/".$id);
			}
			else{
				
				$level = $level+$cond;
				
				$syntax="SELECT s.id,s.id_ujian,js.id as idj,js.jawaban,js.nilai,s.pertanyaan,s.level FROM jawaban_soal js join soal s on (js.id_soal=s.id) join ujian u on (s.id_ujian=u.id) where u.id='".$id."' and s.level='".($level)."'";
				$data['ujian'] = $this->Model_CAT->syntax($syntax)->result();
				if(count($data['ujian'])-($idnya*4)<=0){
					if($level==3 or $level==1){
						redirect("skorujian/".$id);
					}
				}
				$syntax="select js.*,s.level from jawaban_siswa js join soal s on(js.id_soal=s.id) where js.siswa='".$_SESSION['id']."' and js.id_ujian='".$id."' and s.level='".$level."';";
				$idnya = count($this->Model_CAT->syntax($syntax)->result());
				if(count($data['ujian'])-($idnya*4)<=0){
					redirect("skorujian/".$id);
				}
			}
		}
		$data['idnya']=$idnya;
		$data['id'] = $id;
		$syntax="select * from jawaban_siswa where siswa='".$_SESSION['id']."' and id_ujian='".$id."'";
		$temp = $this->Model_CAT->syntax($syntax)->result();
		//echo count($temp);
		$data['nosoal'] = count($temp);
		$data['level'] = $level;
		$this->load->view('siswa/ikutiujian',$data);
		
		
	}
	public function skorujian($id)
	{
		$syntax="SELECT js.*, j.jawaban, s.pertanyaan, s.level from jawaban_siswa js join jawaban_soal j on (js.jawaban_soal = j.id) join soal s on (j.id_soal = s.id) where siswa='".$_SESSION['id']."' and js.id_ujian='".$id."' ";
		$nilaisiswa = $this->Model_CAT->syntax($syntax)->result();
		$nilai=0;
		foreach($nilaisiswa as $row){
			if($row->keterangan==1){
				$nilai+=5;
			}
		}
		$data['nilai'] = $nilai/50*100;;
		$data['jawaban'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('siswa/skorujian',$data);
	}
	public function profilsiswa()
	{
		$syntax="select s.*,sk.id_kelas from siswa s join siswa_x_kelas sk on (s.nis = sk.id_siswa) where s.nis='".$_SESSION['id']."'";
		$data['siswa'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('siswa/profilsiswa',$data);
	}
	public function editsiswa($id)
	{	
		$syntax="SELECT s.*,p.username,p.pass,k.id_kelas FROM siswa s join pengguna p on(s.username=p.username) join siswa_x_kelas k on(s.nis=k.id_siswa) where s.nis='".$id."'";
		$data['siswa'] = $this->Model_CAT->syntax($syntax)->result();

		$syntax="select * from kelas";
		$data['kelas'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('siswa/editsiswa',$data);
	}
	
	public function aksieditprofilsiswa()
	{
		$this->input->post("i1");
		$sql="update pengguna set username='".$this->input->post("i6")."'";
		if($this->input->post("i7")!=""){
			$sql.=(",pass=md5('".$this->input->post("i7")."')");
		}
		$sql.=(" where username='".$this->input->post("i6")."'");
		// echo $sql
		
		$this->Model_CAT->syntax($sql);
		// echo "<br>";
		$sql="update siswa set nama='".$this->input->post("i2")."',tgl_lahir='".$this->input->post("i3")."',jenis_kelamin='".$this->input->post("i4")."' where nis='".$this->input->post("i1")."'";
		// echo $sql;
		$this->Model_CAT->syntax($sql);
		redirect("profilsiswa");
		
	}

	public function materisiswa()
	{

		$syntax="SELECT p.judul,p.deskripsi,p.file,m.nama FROM materi p join jadwal j on(p.id_jadwal=j.id) join guru_x_mapel gm on(j.guru_x_mapel=gm.id) join mapel m on(gm.id_mapel=m.id) where j.id_kelas='".$_SESSION['kelas']."'";
		$data['materi'] = $this->Model_CAT->syntax($syntax)->result();
		$this->load->view('siswa/materisiswa',$data);
		
	}
}
