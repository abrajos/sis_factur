<?php
/**
*@package pXP
*@file gen-MODTarifaIndex.php
*@author  (admin)
*@date 15-11-2025 04:10:02
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTarifaIndex extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTarifaIndex(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_tarifa_index_sel';
		$this->transaccion='FACTUR_tarind_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tarifa_index','int4');
		$this->captura('id_fac_index','int4');
		$this->captura('id_tarifa','int4');
		$this->captura('gestion','int4');
		$this->captura('importe_index','numeric');
		$this->captura('estado_reg','varchar');
		$this->captura('periodo','int4');
		$this->captura('id_usuario_ai','int4');
		$this->captura('usuario_ai','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_categoria','varchar');
		$this->captura('desc_tarifa','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarTarifaIndex(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tarifa_index_ime';
		$this->transaccion='FACTUR_tarind_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_fac_index','id_fac_index','int4');
		$this->setParametro('id_tarifa','id_tarifa','int4');
		$this->setParametro('gestion','gestion','int4');
		$this->setParametro('importe_index','importe_index','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('periodo','periodo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTarifaIndex(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tarifa_index_ime';
		$this->transaccion='FACTUR_tarind_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tarifa_index','id_tarifa_index','int4');
		$this->setParametro('id_fac_index','id_fac_index','int4');
		$this->setParametro('id_tarifa','id_tarifa','int4');
		$this->setParametro('gestion','gestion','int4');
		$this->setParametro('importe_index','importe_index','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('periodo','periodo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTarifaIndex(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tarifa_index_ime';
		$this->transaccion='FACTUR_tarind_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tarifa_index','id_tarifa_index','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
		
	function indexarTarifas(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tarifa_index_ime';
		$this->transaccion='FACTUR_indtar_pro';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_fac_index','id_fac_index','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}

}
?>