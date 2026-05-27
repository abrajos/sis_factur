<?php
/**
*@package pXP
*@file gen-MODCausa.php
*@author  (admin)
*@date 21-08-2025 02:52:29
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODCausa extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarCausa(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_causa_sel';
		$this->transaccion='FACTUR_CAUSA_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_causa','int4');
		$this->captura('fk_id_causa','int4');
		$this->captura('id_usr_reg','int4');
		$this->captura('id_usr_mod','int4');
		$this->captura('codigo','int4');
		$this->captura('descripcion_causa','varchar');
		$this->captura('tipo','varchar');
		$this->captura('estado','numeric');
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
			
	function insertarCausa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_causa_ime';
		$this->transaccion='FACTUR_CAUSA_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('fk_id_causa','fk_id_causa','int4');
		$this->setParametro('id_usr_reg','id_usr_reg','int4');
		$this->setParametro('id_usr_mod','id_usr_mod','int4');
		$this->setParametro('codigo','codigo','int4');
		$this->setParametro('descripcion_causa','descripcion_causa','varchar');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('estado','estado','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarCausa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_causa_ime';
		$this->transaccion='FACTUR_CAUSA_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_causa','id_causa','int4');
		$this->setParametro('fk_id_causa','fk_id_causa','int4');
		$this->setParametro('id_usr_reg','id_usr_reg','int4');
		$this->setParametro('id_usr_mod','id_usr_mod','int4');
		$this->setParametro('codigo','codigo','int4');
		$this->setParametro('descripcion_causa','descripcion_causa','varchar');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('estado','estado','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarCausa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_causa_ime';
		$this->transaccion='FACTUR_CAUSA_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_causa','id_causa','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>