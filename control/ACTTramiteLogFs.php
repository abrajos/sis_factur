<?php
/**
*@package pXP
*@file gen-ACTTramiteLogFs.php
*@author  (admin)
*@date 21-08-2025 03:12:58
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTramiteLogFs extends ACTbase{    
			
	function listarTramiteLogFs(){
		$this->objParam->defecto('ordenacion','id_log_fs');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODTramiteLogFs','listarTramiteLogFs');
		} else{
			$this->objFunc=$this->create('MODTramiteLogFs');
			
			$this->res=$this->objFunc->listarTramiteLogFs($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarTramiteLogFs(){
		$this->objFunc=$this->create('MODTramiteLogFs');	
		if($this->objParam->insertar('id_log_fs')){
			$this->res=$this->objFunc->insertarTramiteLogFs($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTramiteLogFs($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTramiteLogFs(){
			$this->objFunc=$this->create('MODTramiteLogFs');	
		$this->res=$this->objFunc->eliminarTramiteLogFs($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>