<?php
/**
*@package pXP
*@file gen-ACTLecIrregular.php
*@author  (admin)
*@date 21-08-2025 03:16:39
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTLecIrregular extends ACTbase{    
			
	function listarLecIrregular(){
		$this->objParam->defecto('ordenacion','id_lec_irre');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODLecIrregular','listarLecIrregular');
		} else{
			$this->objFunc=$this->create('MODLecIrregular');
			
			$this->res=$this->objFunc->listarLecIrregular($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarLecIrregular(){
		$this->objFunc=$this->create('MODLecIrregular');	
		if($this->objParam->insertar('id_lec_irre')){
			$this->res=$this->objFunc->insertarLecIrregular($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarLecIrregular($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarLecIrregular(){
			$this->objFunc=$this->create('MODLecIrregular');	
		$this->res=$this->objFunc->eliminarLecIrregular($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>