<?php
/**
*@package pXP
*@file gen-ACTLecDesc.php
*@author  (admin)
*@date 21-08-2025 03:17:09
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTLecDesc extends ACTbase{    
			
	function listarLecDesc(){
		$this->objParam->defecto('ordenacion','id_lec_desc');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODLecDesc','listarLecDesc');
		} else{
			$this->objFunc=$this->create('MODLecDesc');
			
			$this->res=$this->objFunc->listarLecDesc($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarLecDesc(){
		$this->objFunc=$this->create('MODLecDesc');	
		if($this->objParam->insertar('id_lec_desc')){
			$this->res=$this->objFunc->insertarLecDesc($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarLecDesc($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarLecDesc(){
			$this->objFunc=$this->create('MODLecDesc');	
		$this->res=$this->objFunc->eliminarLecDesc($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>