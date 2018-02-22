<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Freezer extends MY_Controller {

	public function index()
	{
		if(!$this->session->userdata('logado')){
			header('Location:acesso');
		}

		$data_header = $data_view = $data_footer = [];
		$data_header['title'] = 'Freezer';

		$this->load->model('Geladinhos');
        $data_view['lstGeladinhos'] = $this->Geladinhos->lstGeladinhos();

		$this->load->model('M_Freezer');
        $data_view['lstFreezer'] = $this->M_Freezer->lstFreezer();

		$this->load->view('template/cabecalho', $data_header);
		$this->load->view('freezer', $data_view);
		$this->load->view('template/rodape', $data_footer);
	}

	public function operar(){
		$this->form_validation->set_rules('idGeladinho', 'Sabor', 'required');
		$this->form_validation->set_rules('qtde', 'Quantidade', 'required|integer|is_natural_no_zero');
		$this->form_validation->set_rules('acao', 'Ação', 'required');
		$this->form_validation->set_rules('data', 'Data da Operação', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo alertDiv('warning', 'Atenção!', validation_errors());
            // post('metodo') == 'incluir' ? $this->incluir() : $this->editar(post('id'));
        }else{

        	$acao = post('acao');
        	$idGeladinho = post('idGeladinho');
        	$qtde = post('qtde');
        	$data = post('data');

        	$this->load->model('M_Freezer');
        	$objGeladinho = $this->M_Freezer->lstPorIdGeladinho($idGeladinho);

        	$campos = [];

        	if($acao == 1){ //Adicionar ao freezer
	    		if($objGeladinho->id_geladinho > 0){
	    			$campos['qtde'] = $objGeladinho->qtde + $qtde;
	    		}else{
	    			$campos['qtde'] = $qtde;
	    		}
				
				$campos['id_geladinho'] = $idGeladinho;
				$campos['data'] = $data;
				
				try{
					$this->M_Freezer->insUpdFreezer($campos);
					echo '<script>
					alert("Geladinhos adicionados ao freezer com sucesso!");
					window.location.href = "'.base_url('freezer').'";
					</script>';
				}catch(Exception $e){
					echo $e->getMessage();
				}
        	}else{//VENDER
        		if($qtde > $objGeladinho->qtde){
        			echo alertDiv('warning', 'Atenção!', 'O freezer tem apenas '.$objGeladinho->qtde.' geladinhos deste sabor.');
        		}else{
        			$tipo = $acao;
        			$campos['id_geladinho'] = $idGeladinho;
					$campos['qtde'] = $objGeladinho->qtde - $qtde;

					$campo = [];
        		}
        	}
        }
	}
}
