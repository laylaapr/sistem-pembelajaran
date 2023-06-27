<?php
    class Model_CAT extends CI_Model{
        function show($pk){
            return $this->db->get($pk);
        }

        function gettable($table){
            return $this->db->get($table)->result();
        }
        function syntax($query){
            return $this->db->query($query);
        }

        public function input($table,$data){
			$this->db->insert($table,$data);
		}
		public function delete($table,$column,$id){
			$this->db->where($column, $id);
			$this->db->delete($table); 
		}

		public function update($table,$column,$id,$data){
			$this->db->where($column, $id);
			$this->db->update($table, $data); 
		}




    }
?>