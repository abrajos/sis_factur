<?php
/**
*@package pXP
*@file gen-ACTFuncionario.php
*@author  (admin)
*@date 21-08-2025 03:19:26
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTFuncionario extends ACTbase{    
			
	function listarFuncionario(){
		$this->objParam->defecto('ordenacion','id_funcionario');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODFuncionario','listarFuncionario');
		} else{
			$this->objFunc=$this->create('MODFuncionario');
			
			$this->res=$this->objFunc->listarFuncionario($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarFuncionario(){
		$this->objFunc=$this->create('MODFuncionario');	
		if($this->objParam->insertar('id_funcionario')){
			$this->res=$this->objFunc->insertarFuncionario($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarFuncionario($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarFuncionario(){
			$this->objFunc=$this->create('MODFuncionario');	
		$this->res=$this->objFunc->eliminarFuncionario($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>