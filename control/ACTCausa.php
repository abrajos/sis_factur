<?php
/**
*@package pXP
*@file gen-ACTCausa.php
*@author  (admin)
*@date 21-08-2025 02:52:29
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTCausa extends ACTbase{    
			
	function listarCausa(){
		$this->objParam->defecto('ordenacion','id_causa');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODCausa','listarCausa');
		} else{
			$this->objFunc=$this->create('MODCausa');
			
			$this->res=$this->objFunc->listarCausa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarCausa(){
		$this->objFunc=$this->create('MODCausa');	
		if($this->objParam->insertar('id_causa')){
			$this->res=$this->objFunc->insertarCausa($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarCausa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarCausa(){
			$this->objFunc=$this->create('MODCausa');	
		$this->res=$this->objFunc->eliminarCausa($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>