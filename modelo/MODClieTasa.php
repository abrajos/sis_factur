<?php
/**
*@package pXP
*@file gen-MODClieTasa.php
*@author  (admin)
*@date 21-08-2025 03:21:26
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODClieTasa extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarClieTasa(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_clie_tasa_sel';
		$this->transaccion='FACTUR_CLI_TAS_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_clie_tasa','int4');
		$this->captura('id_cliente','int8');
		$this->captura('id_tasa','int4');
		$this->captura('sw_aplica','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_ai','int4');
		$this->captura('usuario_ai','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarClieTasa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_clie_tasa_ime';
		$this->transaccion='FACTUR_CLI_TAS_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cliente','id_cliente','int8');
		$this->setParametro('id_tasa','id_tasa','int4');
		$this->setParametro('sw_aplica','sw_aplica','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarClieTasa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_clie_tasa_ime';
		$this->transaccion='FACTUR_CLI_TAS_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_clie_tasa','id_clie_tasa','int4');
		$this->setParametro('id_cliente','id_cliente','int8');
		$this->setParametro('id_tasa','id_tasa','int4');
		$this->setParametro('sw_aplica','sw_aplica','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarClieTasa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_clie_tasa_ime';
		$this->transaccion='FACTUR_CLI_TAS_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_clie_tasa','id_clie_tasa','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>