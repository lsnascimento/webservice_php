<?php 

class Model_Cliente extends Model
{
	public function _getAll()
	{
		$sth = odbc_exec($this->objOdbc, "SELECT CLIE, NOME, CGC FROM SIF01D");
		
		while ($data[] = odbc_fetch_array($sth)){

		}

		$this->Close();

		array_pop($data);

		return $data;
	}

	public function getById($codigo)
	{
		$sth = odbc_exec($this->objOdbc, "SELECT CLIE, NOME, CGC FROM SIF01D WHERE CLIE = $codigo");
		
		while ($data[] = odbc_fetch_array($sth)){

		}

		$this->Close();

		array_pop($data);

		return $data;
	}

	public function getByNome($nome)
	{
		$sth = odbc_exec($this->objOdbc, "SELECT CLIE, NOME, CGC FROM SIF01D WHERE NOME LIKE '%$nome%' ORDER BY NOME");
		
		while ($data[] = odbc_fetch_array($sth)){

		}

		$this->Close();

		array_pop($data);

		return $data;
	}

	public function clienteDebug()
	{
		$sth = odbc_exec($this->objOdbc, "SELECT CLIE, NOME, CGC FROM SIF01D WHERE CLIE = 1044");
		
		while ($data[] = odbc_fetch_array($sth)){

		}

		$this->Close();

		array_pop($data);

		return $data;
	}
}