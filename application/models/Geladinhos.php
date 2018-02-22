
<?php
class Geladinhos extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function lstGeladinhos(){
		$sql="SELECT *
		FROM geladinhos g
		ORDER BY nome";
		$query=$this->db->query($sql);
		return $query->result_array();
	}

	public function lstPorId($id){
		$sql="SELECT *
		FROM geladinhos g
		WHERE id = ".$id;
		$query=$this->db->query($sql);
		return $query->first_row();
	}
	
	public function insUpdGeladinho($parametros){
		$valor = $chave = $update = '';
		foreach ($parametros as $key => $value) {
            $chave .= ", ".$key;
            $valor .= ", '".$value."'";
            $update.= ", $key = VALUES($key)";
        }

        $sql = "INSERT INTO geladinhos (" . substr($chave, 1) . ") 
                VALUES (" . substr($valor, 1) . ")
                ON DUPLICATE KEY UPDATE ".
                substr($update, 1);
        $this->db->query($sql);
	}
}