<?php

header('Content-Type: application/json');

class Cliente extends Controller
{
	public function __construct()
	{
		$this->loadModel('Cliente' , 'cliente');
	}

	public function main()
	{
		echo json_encode( array('retorno' => 0, 'msg' => 'Não foi possível realizar a consulta, url não informada.') );
	}

	public function __all()
	{
		$dados = $this->cliente->_getAll();
		var_dump($_SERVER['HTTP_HOST']);
		if(empty($dados)){
			echo json_encode( array('retorno' => 0 , 'msg' => 'Cliente não encontrado!') );
		}else{
			echo json_encode( array('retorno' => 1 , 'msg' => 'Cliente encontrado!' , 'dados' => $dados) );
		}		
	}

	public function codigo($codigos)
	{
		$dados = $this->cliente->getById($codigos['cliente']);

		if(empty($dados)){
			echo json_encode( array('retorno' => 0 , 'msg' => 'Cliente não encontrado!') );
		}else{
			echo json_encode( array('retorno' => 1 , 'msg' => 'Cliente encontrado!' , 'dados' => $dados) );
		}
	}

	public function nome($nome)
	{
		$dados = $this->cliente->getByNome($nome['cliente']);

		if(empty($dados)){
			echo json_encode( array('retorno' => 0 , 'msg' => 'Cliente não encontrado!') );
		}else{
			echo json_encode( array('retorno' => 1 , 'msg' => 'Cliente encontrado!' , 'dados' => $dados) );
		}
	} 

	public function clienteDebug()
	{
		$dados = $this->cliente->clienteDebug();

		if(empty($dados)){
			echo json_encode( array('retorno' => 0 , 'msg' => 'Cliente não encontrado!') );
		}else{
			echo json_encode( array('retorno' => 1 , 'msg' => 'Cliente encontrado!' , 'dados' => $dados) );
		}
	}
}