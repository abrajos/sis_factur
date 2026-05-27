<?php
/**
*@package pXP
*@file gen-ACTMedidor.php
*@author  (admin)
*@date 21-08-2025 02:52:42
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTMedidor extends ACTbase{    
			
	function listarMedidor(){
		$this->objParam->defecto('ordenacion','id_medidor');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODMedidor','listarMedidor');
		} else{
			$this->objFunc=$this->create('MODMedidor');
			
			$this->res=$this->objFunc->listarMedidor($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarMedidor(){
		$this->objFunc=$this->create('MODMedidor');	
		if($this->objParam->insertar('id_medidor')){
			$this->res=$this->objFunc->insertarMedidor($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarMedidor($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarMedidor(){
			$this->objFunc=$this->create('MODMedidor');	
		$this->res=$this->objFunc->eliminarMedidor($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>