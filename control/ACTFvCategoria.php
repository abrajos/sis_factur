<?php
/**
*@package pXP
*@file gen-ACTFvCategoria.php
*@author  (admin)
*@date 21-08-2025 02:50:53
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTFvCategoria extends ACTbase{    
			
	function listarFvCategoria(){
		$this->objParam->defecto('ordenacion','id_categoria');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODFvCategoria','listarFvCategoria');
		} else{
			$this->objFunc=$this->create('MODFvCategoria');
			
			$this->res=$this->objFunc->listarFvCategoria($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarFvCategoria(){
		$this->objFunc=$this->create('MODFvCategoria');	
		if($this->objParam->insertar('id_categoria')){
			$this->res=$this->objFunc->insertarFvCategoria($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarFvCategoria($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarFvCategoria(){
			$this->objFunc=$this->create('MODFvCategoria');	
		$this->res=$this->objFunc->eliminarFvCategoria($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>