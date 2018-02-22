
<?php
class M_Freezer extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function lstFreezer(){
		$sql="SELECT g.id, g.nome, f.qtde, f.data
		FROM freezer f
		JOIN geladinhos g ON g.id = f.id_geladinho
		ORDER BY nome";
		$query=$this->db->query($sql);
		return $query->result_array();
	}

	public function lstPorIdGeladinho($idGeladinho){
		$sql="SELECT *
		FROM freezer f
		WHERE f.id_geladinho = ".$idGeladinho;
		$query=$this->db->query($sql);
		return $query->first_row();
	}
	
	public function insUpdFreezer($parametros){
		$valor = $chave = $update = '';
		foreach ($parametros as $key => $value) {
            $chave .= ", ".$key;
            $valor .= ", '".$value."'";
            $update.= ", $key = VALUES($key)";
        }

        $sql = "INSERT INTO freezer (" . substr($chave, 1) . ") 
                VALUES (" . substr($valor, 1) . ")
                ON DUPLICATE KEY UPDATE ".
                substr($update, 1);
        $this->db->query($sql);
	}
}