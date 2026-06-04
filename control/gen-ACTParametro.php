<?php
/**
*@package pXP
*@file gen-ACTParametro.php
*@author  (admin)
*@date 06-11-2025 20:26:28
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTParametro extends ACTbase{    
			
	function listarParametro(){
		$this->objParam->defecto('ordenacion','id_param');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODParametro','listarParametro');
		} else{
			$this->objFunc=$this->create('MODParametro');
			
			$this->res=$this->objFunc->listarParametro($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarParametro(){
		$this->objFunc=$this->create('MODParametro');	
		if($this->objParam->insertar('id_param')){
			$this->res=$this->objFunc->insertarParametro($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarParametro($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarParametro(){
			$this->objFunc=$this->create('MODParametro');	
		$this->res=$this->objFunc->eliminarParametro($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>