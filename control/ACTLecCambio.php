<?php
/**
*@package pXP
*@file gen-ACTLecCambio.php
*@author  (admin)
*@date 21-08-2025 03:18:24
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTLecCambio extends ACTbase{    
			
	function listarLecCambio(){
		$this->objParam->defecto('ordenacion','id_cambio');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODLecCambio','listarLecCambio');
		} else{
			$this->objFunc=$this->create('MODLecCambio');
			
			$this->res=$this->objFunc->listarLecCambio($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarLecCambio(){
		$this->objFunc=$this->create('MODLecCambio');	
		if($this->objParam->insertar('id_cambio')){
			$this->res=$this->objFunc->insertarLecCambio($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarLecCambio($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarLecCambio(){
			$this->objFunc=$this->create('MODLecCambio');	
		$this->res=$this->objFunc->eliminarLecCambio($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>