<?php
/**
*@package pXP
*@file gen-ACTDescuento.php
*@author  (admin)
*@date 15-11-2025 06:41:25
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTDescuento extends ACTbase{    
			
	function listarDescuento(){
		$this->objParam->defecto('ordenacion','id_descuento');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODDescuento','listarDescuento');
		} else{
			$this->objFunc=$this->create('MODDescuento');
			
			$this->res=$this->objFunc->listarDescuento($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarDescuento(){
		$this->objFunc=$this->create('MODDescuento');	
		if($this->objParam->insertar('id_descuento')){
			$this->res=$this->objFunc->insertarDescuento($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarDescuento($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarDescuento(){
			$this->objFunc=$this->create('MODDescuento');	
		$this->res=$this->objFunc->eliminarDescuento($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>