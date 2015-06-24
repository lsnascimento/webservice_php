<?php

header('Content-Type: application/json');

class Index
{
	private $data = array();
	private $classe;
	private $metodo;
	private $args;

	public function __construct($classe, $metodo = 'main', $args = array())
	{
		$classe = $classe;
		$this->classe = new $classe;
		$this->metodo = $metodo;
		$this->args   = $args;

		$input = file_get_contents('php://input');
		
		if( (isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] == 'application/json') || (isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] == 'application/json;charset=UTF-8') ){
			$data = json_decode($input, true);
		}else{
			parse_str($input, $data);
		}
		
		$this->data = $data;
	}

	private function _getId()
	{
		return isset($this->args[0]) && is_numeric($this->args[0]) ? (int) $this->args[0] : null;
	}

	public function _get()
	{
		$controlador = $this->classe;
		$metodo = $this->metodo;
		$args = $this->_getId();

		if($args){
			$controlador->$metodo($args);
		}else{
			$controlador->$metodo();
		}
	}

	public function _post()
	{
		$controlador = $this->classe;
		$metodo = $this->metodo;

		if (!empty($this->data)) {
			$controlador->$metodo($this->data);
		}else{
			http_response_code(406);
			echo json_encode( array('error' => array('msg' => 'Falta parâmetros')) );
		}
	}

	public function _put()
	{
		echo 'PUT INDEX';
	}

	public function _delete()
	{
		echo 'DELETE INDEX';
	}
}