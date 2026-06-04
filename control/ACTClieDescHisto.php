<?php
/**
*@package pXP
*@file gen-ACTClieDescHisto.php
*@author  (admin)
*@date 21-08-2025 03:22:14
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTClieDescHisto extends ACTbase{    
			
	function listarClieDescHisto(){
		$this->objParam->defecto('ordenacion','id_clie_desc_histo');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODClieDescHisto','listarClieDescHisto');
		} else{
			$this->objFunc=$this->create('MODClieDescHisto');
			
			$this->res=$this->objFunc->listarClieDescHisto($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarClieDescHisto(){
		$this->objFunc=$this->create('MODClieDescHisto');	
		if($this->objParam->insertar('id_clie_desc_histo')){
			$this->res=$this->objFunc->insertarClieDescHisto($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarClieDescHisto($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarClieDescHisto(){
			$this->objFunc=$this->create('MODClieDescHisto');	
		$this->res=$this->objFunc->eliminarClieDescHisto($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>