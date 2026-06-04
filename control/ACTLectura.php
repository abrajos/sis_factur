<?php
/**
*@package pXP
*@file gen-ACTLectura.php
*@author  (admin)
*@date 21-08-2025 02:52:40
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTLectura extends ACTbase{    
			
	function listarLectura(){
		$this->objParam->defecto('ordenacion','id_lectura');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODLectura','listarLectura');
		} else{
			$this->objFunc=$this->create('MODLectura');
			
			$this->res=$this->objFunc->listarLectura($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarLectura(){
		$this->objFunc=$this->create('MODLectura');	
		if($this->objParam->insertar('id_lectura')){
			$this->res=$this->objFunc->insertarLectura($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarLectura($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarLectura(){
			$this->objFunc=$this->create('MODLectura');	
		$this->res=$this->objFunc->eliminarLectura($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>