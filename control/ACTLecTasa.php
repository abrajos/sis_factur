<?php
/**
*@package pXP
*@file gen-ACTLecTasa.php
*@author  (admin)
*@date 21-08-2025 03:15:32
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTLecTasa extends ACTbase{    
			
	function listarLecTasa(){
		$this->objParam->defecto('ordenacion','id_lectasa');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODLecTasa','listarLecTasa');
		} else{
			$this->objFunc=$this->create('MODLecTasa');
			
			$this->res=$this->objFunc->listarLecTasa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarLecTasa(){
		$this->objFunc=$this->create('MODLecTasa');	
		if($this->objParam->insertar('id_lectasa')){
			$this->res=$this->objFunc->insertarLecTasa($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarLecTasa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarLecTasa(){
			$this->objFunc=$this->create('MODLecTasa');	
		$this->res=$this->objFunc->eliminarLecTasa($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>