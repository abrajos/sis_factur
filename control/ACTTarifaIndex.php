<?php
/**
*@package pXP
*@file gen-ACTTarifaIndex.php
*@author  (admin)
*@date 15-11-2025 04:10:02
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTarifaIndex extends ACTbase{    
			
	function listarTarifaIndex(){
		$this->objParam->defecto('ordenacion','id_tarifa_index');

		$this->objParam->defecto('dir_ordenacion','asc');

		if($this->objParam->getParametro('id_fac_index')!=''){
			$this->objParam->addFiltro("facind.id_fac_index = ".$this->objParam->getParametro('id_fac_index'));	
		}

		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam,$this);
			$this->res = $this->objReporte->generarReporteListado('MODTarifaIndex','listarTarifaIndex');
		} else{
			$this->objFunc=$this->create('MODTarifaIndex');
			
			$this->res=$this->objFunc->listarTarifaIndex($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarTarifaIndex(){
		$this->objFunc=$this->create('MODTarifaIndex');	
		if($this->objParam->insertar('id_tarifa_index')){
			$this->res=$this->objFunc->insertarTarifaIndex($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTarifaIndex($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTarifaIndex(){
			$this->objFunc=$this->create('MODTarifaIndex');	
		$this->res=$this->objFunc->eliminarTarifaIndex($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
		
	function indexarTarifas(){
		$this->objFunc=$this->create('MODTarifaIndex');	
		$this->res=$this->objFunc->indexarTarifas($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
}

?>