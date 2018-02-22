
<?php
class Usuarios extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	function lstUsuario($senha){
		$sql="SELECT *
		FROM usuarios u
		WHERE u.senha = '".$senha."' and id = 1";
		$query=$this->db->query($sql);
		return $query->result_array();
	}

	public function atualizarSenha($id, $senhaCriptografada){
		$this->db->set('senha', $senhaCriptografada);
		$this->db->where('id', $id);
		$this->db->update('usuarios');
	}
}