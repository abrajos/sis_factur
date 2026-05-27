<?php
/**
*@package pXP
*@file gen-ACTLecObservaciones.php
*@author  (admin)
*@date 21-08-2025 03:16:06
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTLecObservaciones extends ACTbase{    
			
	function listarLecObservaciones(){
		$this->objParam->defecto('ordenacion','id_lec_observacion');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODLecObservaciones','listarLecObservaciones');
		} else{
			$this->objFunc=$this->create('MODLecObservaciones');
			
			$this->res=$this->objFunc->listarLecObservaciones($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarLecObservaciones(){
		$this->objFunc=$this->create('MODLecObservaciones');	
		if($this->objParam->insertar('id_lec_observacion')){
			$this->res=$this->objFunc->insertarLecObservaciones($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarLecObservaciones($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarLecObservaciones(){
			$this->objFunc=$this->create('MODLecObservaciones');	
		$this->res=$this->objFunc->eliminarLecObservaciones($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>