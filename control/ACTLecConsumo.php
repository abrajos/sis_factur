<?php
/**
*@package pXP
*@file gen-ACTLecConsumo.php
*@author  (admin)
*@date 21-08-2025 03:17:48
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTLecConsumo extends ACTbase{    
			
	function listarLecConsumo(){
		$this->objParam->defecto('ordenacion','id_lec_consumo');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODLecConsumo','listarLecConsumo');
		} else{
			$this->objFunc=$this->create('MODLecConsumo');
			
			$this->res=$this->objFunc->listarLecConsumo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarLecConsumo(){
		$this->objFunc=$this->create('MODLecConsumo');	
		if($this->objParam->insertar('id_lec_consumo')){
			$this->res=$this->objFunc->insertarLecConsumo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarLecConsumo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarLecConsumo(){
			$this->objFunc=$this->create('MODLecConsumo');	
		$this->res=$this->objFunc->eliminarLecConsumo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>