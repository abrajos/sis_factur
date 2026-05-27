<?php
/**
*@package pXP
*@file gen-ACTFactorIndex.php
*@author  (admin)
*@date 21-08-2025 02:52:22
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTFactorIndex extends ACTbase{    
			
	function listarFactorIndex(){
		$this->objParam->defecto('ordenacion','id_fac_index');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODFactorIndex','listarFactorIndex');
		} else{
			$this->objFunc=$this->create('MODFactorIndex');
			
			$this->res=$this->objFunc->listarFactorIndex($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarFactorIndex(){
		$this->objFunc=$this->create('MODFactorIndex');	
		if($this->objParam->insertar('id_fac_index')){
			$this->res=$this->objFunc->insertarFactorIndex($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarFactorIndex($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarFactorIndex(){
			$this->objFunc=$this->create('MODFactorIndex');	
		$this->res=$this->objFunc->eliminarFactorIndex($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>