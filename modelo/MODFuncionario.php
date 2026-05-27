<?php
/**
*@package pXP
*@file gen-MODFuncionario.php
*@author  (admin)
*@date 21-08-2025 03:19:26
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODFuncionario extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarFuncionario(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_funcionario_sel';
		$this->transaccion='FACTUR_FUNCIO_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_funcionario','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_empleado','int4');
		$this->captura('tipo_funcion','numeric');
		$this->captura('estado','numeric');
		$this->captura('id_param','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_ai','int4');
		$this->captura('usuario_ai','varchar');
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
			
	function insertarFuncionario(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_funcionario_ime';
		$this->transaccion='FACTUR_FUNCIO_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_empleado','id_empleado','int4');
		$this->setParametro('tipo_funcion','tipo_funcion','numeric');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('id_param','id_param','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarFuncionario(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_funcionario_ime';
		$this->transaccion='FACTUR_FUNCIO_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_empleado','id_empleado','int4');
		$this->setParametro('tipo_funcion','tipo_funcion','numeric');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('id_param','id_param','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarFuncionario(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_funcionario_ime';
		$this->transaccion='FACTUR_FUNCIO_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_funcionario','id_funcionario','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>