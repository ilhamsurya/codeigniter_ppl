<?php namespace App\Models;

use CodeIgniter\Model;

	class m_mahasiswa extends Model{

		protected $table = 'mahasiswa';
		protected $primaryKey='id_mahasiswa';
		protected $allowedFields = ['nim', 'nama', 'umur', 'foto', 'tinggi'];
    	public $nim;
    	public $nama;
    	public $umur;
        public $foto;


        
        public function getMahasiswa($id = false)
        {
            if($id === false){
                $db = \Config\Database::connect();
                $sql = 'SELECT nim,nama,umur,tinggi  FROM '.$this->table;
                $query = $db->query($sql);
                $results = $query->getResult();
                return $results;
            }else{
                return $this->getWhere(['nim' => $id]);
            }   
        }

        

        public function saveMahasiswa($data)
        {
            $builder = $this->db->table($this->table);
            return $builder->insert($data);
        }
    
        public function editMahasiswa($data,$id)
        {
            return $this->db->table($this->table)->update($data, ['nim' => $id]);
        }
        public function getGrafik()
        {
        $query = $this->db->query("SELECT nim,nama,umur,tinggi FROM  mahasiswa");
        $hasil = [];
        if(!empty($query)){
        foreach($query->getResultArray() as $data) {
        $hasil[] = $data;
        }
        }
        return $hasil;
        }
     
        public function deleteMahasiswa($id)
        {
            $builder = $this->db->table($this->table);
            return $builder->delete(['nim' => $id]);
        } 
    
        public function searchnama($nama){
            $db = \Config\Database::connect();
            $sql = "SELECT nim,nama,umur  FROM ".$this->table." WHERE nama LIKE '%$nama%' ";
            $query = $db->query($sql);
            $results = $query->getResult();
            return $results;
        }
	}