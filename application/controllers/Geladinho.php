<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geladinho extends MY_Controller {

	public function todos()
	{

		$data_header = $data_view = $data_footer = [];
		$data_header['title'] = 'Todos os Geladinhos';

		$this->load->model('Geladinhos');
        $data_view['lstGeladinhos'] = $this->Geladinhos->lstGeladinhos();

		$this->load->view('template/cabecalho', $data_header);
		$this->load->view('geladinhos_todos', $data_view);
		$this->load->view('template/rodape', $data_footer);
	}

	public function cadastrar()
	{
		$data_header = $data_view = $data_footer = [];
		
		$data_header['title'] = $data_view['title'] = 'Cadastrar Geladinho';

		$data_view['nome'] = '';
		$data_view['id'] = '';


		$this->load->view('template/cabecalho', $data_header);
		$this->load->view('geladinhos_cadastrarEditar', $data_view);
		$this->load->view('template/rodape', $data_footer);
	}

	public function editar($id)
	{
		$data_header = $data_view = $data_footer = [];

		$data_header['title'] = $data_view['title'] = 'Editar Geladinho';

		$this->load->model('Geladinhos');
		$obj = $this->Geladinhos->lstPorId($id);
		$data_view['nome'] = $obj->nome;
		$data_view['id'] = $obj->id;

		$this->load->view('template/cabecalho', $data_header);
		$this->load->view('geladinhos_cadastrarEditar', $data_view);
		$this->load->view('template/rodape', $data_footer);
	}

	public function cadastrarEditarValidar(){
		$this->form_validation->set_rules('nome', 'Nome do Sabor', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo alertDiv('warning', 'Atenção!', validation_errors());
            // post('metodo') == 'incluir' ? $this->incluir() : $this->editar(post('id'));
        }else{

        
            $campos['id'] = post('id');
            $campos['nome'] = post('nome');
            
            $this->load->model('Geladinhos');
            $this->Geladinhos->insUpdGeladinho($campos);

            echo '<script>alert("Operação efetuada com sucesso!");</script>';
            redirecionar('geladinho/todos');
        }
	}
}
