<?php
/**
*@package pXP
*@file gen-ACTCodigoIreegular.php
*@author  (admin)
*@date 21-08-2025 03:20:40
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTCodigoIreegular extends ACTbase{    
			
	function listarCodigoIreegular(){
		$this->objParam->defecto('ordenacion','id_cod_irre');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODCodigoIreegular','listarCodigoIreegular');
		} else{
			$this->objFunc=$this->create('MODCodigoIreegular');
			
			$this->res=$this->objFunc->listarCodigoIreegular($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarCodigoIreegular(){
		$this->objFunc=$this->create('MODCodigoIreegular');	
		if($this->objParam->insertar('id_cod_irre')){
			$this->res=$this->objFunc->insertarCodigoIreegular($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarCodigoIreegular($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarCodigoIreegular(){
			$this->objFunc=$this->create('MODCodigoIreegular');	
		$this->res=$this->objFunc->eliminarCodigoIreegular($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>