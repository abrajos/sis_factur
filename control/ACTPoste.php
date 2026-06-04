<?php
/**
*@package pXP
*@file gen-ACTPoste.php
*@author  (admin)
*@date 21-08-2025 02:52:35
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTPoste extends ACTbase{    
			
	function listarPoste(){
		$this->objParam->defecto('ordenacion','id_poste');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODPoste','listarPoste');
		} else{
			$this->objFunc=$this->create('MODPoste');
			
			$this->res=$this->objFunc->listarPoste($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarPoste(){
		$this->objFunc=$this->create('MODPoste');	
		if($this->objParam->insertar('id_poste')){
			$this->res=$this->objFunc->insertarPoste($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarPoste($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarPoste(){
			$this->objFunc=$this->create('MODPoste');	
		$this->res=$this->objFunc->eliminarPoste($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>