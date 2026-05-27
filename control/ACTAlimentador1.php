<?php
/**
*@package pXP
*@file gen-ACTAlimentador.php
*@author  (admin)
*@date 21-08-2025 02:52:08
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTAlimentador extends ACTbase{    
			
	function listarAlimentador(){
		$this->objParam->defecto('ordenacion','id_alimentador');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODAlimentador','listarAlimentador');
		} else{
			$this->objFunc=$this->create('MODAlimentador');
			
			$this->res=$this->objFunc->listarAlimentador($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarAlimentador(){
		$this->objFunc=$this->create('MODAlimentador');	
		if($this->objParam->insertar('id_alimentador')){
			$this->res=$this->objFunc->insertarAlimentador($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarAlimentador($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarAlimentador(){
			$this->objFunc=$this->create('MODAlimentador');	
		$this->res=$this->objFunc->eliminarAlimentador($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>