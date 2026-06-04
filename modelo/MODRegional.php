<?php
/**
*@package pXP
*@file gen-MODRegional.php
*@author  (admin)
*@date 21-08-2025 03:14:59
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODRegional extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarRegional(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_regional_sel';
		$this->transaccion='FACTUR_REG_ION_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_regional','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('nombre_regional','varchar');
		$this->captura('direccion','varchar');
		$this->captura('estado','numeric');
		$this->captura('sw_debito_fiscal','varchar');
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
			
	function insertarRegional(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_regional_ime';
		$this->transaccion='FACTUR_REG_ION_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre_regional','nombre_regional','varchar');
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('sw_debito_fiscal','sw_debito_fiscal','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarRegional(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_regional_ime';
		$this->transaccion='FACTUR_REG_ION_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_regional','id_regional','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre_regional','nombre_regional','varchar');
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('sw_debito_fiscal','sw_debito_fiscal','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarRegional(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_regional_ime';
		$this->transaccion='FACTUR_REG_ION_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_regional','id_regional','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>