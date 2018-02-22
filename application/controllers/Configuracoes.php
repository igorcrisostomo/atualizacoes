<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends MY_Controller {

	public function alterarSenha()
	{
		if(!$this->session->userdata('logado')){
			redirecionar('acesso/sair');
		}

		$data_header = $data_view = $data_footer = [];
		
		$data_header['title'] = $data_view['title'] = 'Alterar senha';

		$this->load->view('template/cabecalho', $data_header);
		$this->load->view('configuracoes_alterarSenha', $data_view);
		$this->load->view('template/rodape', $data_footer);
	}

	public function alterarSenhaValidar(){
		$this->form_validation->set_rules('senhaAtual', 'Senha atual', 'required|callback_verificarSenhaAtual');
		$this->form_validation->set_rules('novaSenha', 'Nova senha', 'required');
		$this->form_validation->set_rules('confirmarNovaSenha', 'Confirmar nova senha', 'required|matches[novaSenha]');

        if ($this->form_validation->run() == FALSE) {
            echo alertDiv('warning', 'Atenção!', validation_errors());
        }else{
        
            $this->load->model('Usuarios');
            $this->Usuarios->atualizarSenha(1, md5(post('novaSenha')));

            echo '<script>alert("Senha alterada com sucesso!\nVocê será redirecionado para acessar o sistema com a nova senha.");</script>';
            redirecionar('acesso/sair');
        }
	}

	public function verificarSenhaAtual($senhaAtual) {

		$this->load->model('Usuarios');

		if(count($this->Usuarios->lstUsuario(md5($senhaAtual))) > 0){
			return TRUE;
		}

        $this->form_validation->set_message('verificarSenhaAtual', 'Digite a senha atual corretamente.');
        return FALSE;
    }
}