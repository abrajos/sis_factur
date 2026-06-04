<?php
/**
*@package pXP
*@file gen-ACTMarcaMedidor.php
*@author  (admin)
*@date 21-08-2025 03:15:01
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTMarcaMedidor extends ACTbase{    
			
	function listarMarcaMedidor(){
		$this->objParam->defecto('ordenacion','id_marca_medidor');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODMarcaMedidor','listarMarcaMedidor');
		} else{
			$this->objFunc=$this->create('MODMarcaMedidor');
			
			$this->res=$this->objFunc->listarMarcaMedidor($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarMarcaMedidor(){
		$this->objFunc=$this->create('MODMarcaMedidor');	
		if($this->objParam->insertar('id_marca_medidor')){
			$this->res=$this->objFunc->insertarMarcaMedidor($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarMarcaMedidor($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarMarcaMedidor(){
			$this->objFunc=$this->create('MODMarcaMedidor');	
		$this->res=$this->objFunc->eliminarMarcaMedidor($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>