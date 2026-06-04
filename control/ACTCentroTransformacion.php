<?php
/**
*@package pXP
*@file gen-ACTCentroTransformacion.php
*@author  (admin)
*@date 21-08-2025 03:23:25
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTCentroTransformacion extends ACTbase{    
			
	function listarCentroTransformacion(){
		$this->objParam->defecto('ordenacion','id_centro_tranformacion');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODCentroTransformacion','listarCentroTransformacion');
		} else{
			$this->objFunc=$this->create('MODCentroTransformacion');
			
			$this->res=$this->objFunc->listarCentroTransformacion($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarCentroTransformacion(){
		$this->objFunc=$this->create('MODCentroTransformacion');	
		if($this->objParam->insertar('id_centro_tranformacion')){
			$this->res=$this->objFunc->insertarCentroTransformacion($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarCentroTransformacion($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarCentroTransformacion(){
			$this->objFunc=$this->create('MODCentroTransformacion');	
		$this->res=$this->objFunc->eliminarCentroTransformacion($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>