<?php
/**
*@package pXP
*@file gen-MODFecha.php
*@author  (admin)
*@date 21-08-2025 03:20:04
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODFecha extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarFecha(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_fecha_sel';
		$this->transaccion='FACTUR_FECHA_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_fecha','int4');
		$this->captura('id_param','int4');
		$this->captura('tipo_fecha','numeric');
		$this->captura('desc_fecha','varchar');
		$this->captura('fecha','date');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_ai','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('usuario_ai','varchar');
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
			
	function insertarFecha(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_fecha_ime';
		$this->transaccion='FACTUR_FECHA_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('tipo_fecha','tipo_fecha','numeric');
		$this->setParametro('desc_fecha','desc_fecha','varchar');
		$this->setParametro('fecha','fecha','date');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarFecha(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_fecha_ime';
		$this->transaccion='FACTUR_FECHA_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_fecha','id_fecha','int4');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('tipo_fecha','tipo_fecha','numeric');
		$this->setParametro('desc_fecha','desc_fecha','varchar');
		$this->setParametro('fecha','fecha','date');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarFecha(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_fecha_ime';
		$this->transaccion='FACTUR_FECHA_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_fecha','id_fecha','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>