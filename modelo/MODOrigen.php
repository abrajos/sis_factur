<?php
/**
*@package pXP
*@file gen-MODOrigen.php
*@author  (admin)
*@date 21-08-2025 02:52:37
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODOrigen extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarOrigen(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_origen_sel';
		$this->transaccion='FACTUR_ORIGEN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_origen','int4');
		$this->captura('fk_id_origen','int4');
		$this->captura('tipo','varchar');
		$this->captura('estado','numeric');
		$this->captura('id_usr_reg','int4');
		$this->captura('codigo','int4');
		$this->captura('id_usr_mod','int4');
		$this->captura('descripcion_origen','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarOrigen(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_origen_ime';
		$this->transaccion='FACTUR_ORIGEN_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('fk_id_origen','fk_id_origen','int4');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('id_usr_reg','id_usr_reg','int4');
		$this->setParametro('codigo','codigo','int4');
		$this->setParametro('id_usr_mod','id_usr_mod','int4');
		$this->setParametro('descripcion_origen','descripcion_origen','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarOrigen(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_origen_ime';
		$this->transaccion='FACTUR_ORIGEN_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_origen','id_origen','int4');
		$this->setParametro('fk_id_origen','fk_id_origen','int4');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('id_usr_reg','id_usr_reg','int4');
		$this->setParametro('codigo','codigo','int4');
		$this->setParametro('id_usr_mod','id_usr_mod','int4');
		$this->setParametro('descripcion_origen','descripcion_origen','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarOrigen(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_origen_ime';
		$this->transaccion='FACTUR_ORIGEN_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_origen','id_origen','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>