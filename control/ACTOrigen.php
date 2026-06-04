<?php
/**
*@package pXP
*@file gen-ACTOrigen.php
*@author  (admin)
*@date 21-08-2025 02:52:37
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTOrigen extends ACTbase{    
			
	function listarOrigen(){
		$this->objParam->defecto('ordenacion','id_origen');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODOrigen','listarOrigen');
		} else{
			$this->objFunc=$this->create('MODOrigen');
			
			$this->res=$this->objFunc->listarOrigen($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarOrigen(){
		$this->objFunc=$this->create('MODOrigen');	
		if($this->objParam->insertar('id_origen')){
			$this->res=$this->objFunc->insertarOrigen($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarOrigen($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarOrigen(){
			$this->objFunc=$this->create('MODOrigen');	
		$this->res=$this->objFunc->eliminarOrigen($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>