<?php
/**
*@package pXP
*@file gen-ACTRuta.php
*@author  (admin)
*@date 15-11-2025 08:14:52
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTRuta extends ACTbase{    
			
	function listarRuta(){
		$this->objParam->defecto('ordenacion','id_ruta');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODRuta','listarRuta');
		} else{
			$this->objFunc=$this->create('MODRuta');
			
			$this->res=$this->objFunc->listarRuta($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarRuta(){
		$this->objFunc=$this->create('MODRuta');	
		if($this->objParam->insertar('id_ruta')){
			$this->res=$this->objFunc->insertarRuta($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarRuta($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarRuta(){
			$this->objFunc=$this->create('MODRuta');	
		$this->res=$this->objFunc->eliminarRuta($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>