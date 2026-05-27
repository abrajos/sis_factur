<?php
/**
*@package pXP
*@file gen-ACTClieTasa.php
*@author  (admin)
*@date 21-08-2025 03:21:26
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTClieTasa extends ACTbase{    
			
	function listarClieTasa(){
		$this->objParam->defecto('ordenacion','id_clie_tasa');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODClieTasa','listarClieTasa');
		} else{
			$this->objFunc=$this->create('MODClieTasa');
			
			$this->res=$this->objFunc->listarClieTasa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarClieTasa(){
		$this->objFunc=$this->create('MODClieTasa');	
		if($this->objParam->insertar('id_clie_tasa')){
			$this->res=$this->objFunc->insertarClieTasa($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarClieTasa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarClieTasa(){
			$this->objFunc=$this->create('MODClieTasa');	
		$this->res=$this->objFunc->eliminarClieTasa($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>