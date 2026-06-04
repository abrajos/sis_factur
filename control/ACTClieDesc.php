<?php
/**
*@package pXP
*@file gen-ACTClieDesc.php
*@author  (admin)
*@date 21-08-2025 03:22:58
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTClieDesc extends ACTbase{    
			
	function listarClieDesc(){
		$this->objParam->defecto('ordenacion','id_clie_desc');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODClieDesc','listarClieDesc');
		} else{
			$this->objFunc=$this->create('MODClieDesc');
			
			$this->res=$this->objFunc->listarClieDesc($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarClieDesc(){
		$this->objFunc=$this->create('MODClieDesc');	
		if($this->objParam->insertar('id_clie_desc')){
			$this->res=$this->objFunc->insertarClieDesc($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarClieDesc($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarClieDesc(){
			$this->objFunc=$this->create('MODClieDesc');	
		$this->res=$this->objFunc->eliminarClieDesc($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>