<?php
/**
*@package pXP
*@file gen-ACTFecha.php
*@author  (admin)
*@date 21-08-2025 03:20:04
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTFecha extends ACTbase{    
			
	function listarFecha(){
		$this->objParam->defecto('ordenacion','id_fecha');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODFecha','listarFecha');
		} else{
			$this->objFunc=$this->create('MODFecha');
			
			$this->res=$this->objFunc->listarFecha($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarFecha(){
		$this->objFunc=$this->create('MODFecha');	
		if($this->objParam->insertar('id_fecha')){
			$this->res=$this->objFunc->insertarFecha($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarFecha($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarFecha(){
			$this->objFunc=$this->create('MODFecha');	
		$this->res=$this->objFunc->eliminarFecha($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>