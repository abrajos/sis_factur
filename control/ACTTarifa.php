<?php
/**
*@package pXP
*@file gen-ACTTarifa.php
*@author  (admin)
*@date 15-11-2025 01:34:37
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTarifa extends ACTbase{    
			
	function listarTarifa(){
		$this->objParam->defecto('ordenacion','id_tarifa');

		$this->objParam->defecto('dir_ordenacion','asc');

		if($this->objParam->getParametro('id_categoria')!=''){
			$this->objParam->addFiltro("catego.id_categoria = ".$this->objParam->getParametro('id_categoria'));	
		}

		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODTarifa','listarTarifa');
		} else{
			$this->objFunc=$this->create('MODTarifa');
			
			$this->res=$this->objFunc->listarTarifa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarTarifa(){
		$this->objFunc=$this->create('MODTarifa');	
		if($this->objParam->insertar('id_tarifa')){
			$this->res=$this->objFunc->insertarTarifa($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTarifa($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTarifa(){
			$this->objFunc=$this->create('MODTarifa');	
		$this->res=$this->objFunc->eliminarTarifa($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>