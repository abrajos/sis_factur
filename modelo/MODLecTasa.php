<?php
/**
*@package pXP
*@file gen-MODLecTasa.php
*@author  (admin)
*@date 21-08-2025 03:15:32
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODLecTasa extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarLecTasa(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_lec_tasa_sel';
		$this->transaccion='FACTUR_LEC_TAS_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_lectasa','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('tasa_importe','numeric');
		$this->captura('id_tasa','int4');
		$this->captura('tasa_porcen','numeric');
		$this->captura('id_lectura','int8');
		$this->captura('usuario_ai','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('id_usuario_ai','int4');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarLecTasa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_tasa_ime';
		$this->transaccion='FACTUR_LEC_TAS_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tasa_importe','tasa_importe','numeric');
		$this->setParametro('id_tasa','id_tasa','int4');
		$this->setParametro('tasa_porcen','tasa_porcen','numeric');
		$this->setParametro('id_lectura','id_lectura','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarLecTasa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_tasa_ime';
		$this->transaccion='FACTUR_LEC_TAS_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lectasa','id_lectasa','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tasa_importe','tasa_importe','numeric');
		$this->setParametro('id_tasa','id_tasa','int4');
		$this->setParametro('tasa_porcen','tasa_porcen','numeric');
		$this->setParametro('id_lectura','id_lectura','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarLecTasa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_tasa_ime';
		$this->transaccion='FACTUR_LEC_TAS_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lectasa','id_lectasa','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>