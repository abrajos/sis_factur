<?php
/**
*@package pXP
*@file gen-ACTTasa.php
*@author  (admin)
*@date 15-11-2025 06:32:50
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTasa extends ACTbase{    
			
	function listarTasa(){
		$this->objParam->defecto('ordenacion','id_tasa');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODTasa','listarTasa');
		} else{
			$this->objFunc=$this->create('MODTasa');
			
			$this->res=$this->objFunc->listarTasa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarTasa(){
		$this->objFunc=$this->create('MODTasa');	
		if($this->objParam->insertar('id_tasa')){
			$this->res=$this->objFunc->insertarTasa($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTasa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTasa(){
			$this->objFunc=$this->create('MODTasa');	
		$this->res=$this->objFunc->eliminarTasa($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>