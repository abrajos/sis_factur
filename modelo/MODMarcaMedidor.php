<?php
/**
*@package pXP
*@file gen-MODMarcaMedidor.php
*@author  (admin)
*@date 21-08-2025 03:15:01
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODMarcaMedidor extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarMarcaMedidor(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_marca_medidor_sel';
		$this->transaccion='FACTUR_MAR_MED_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_marca_medidor','int4');
		$this->captura('denominacion','varchar');
		$this->captura('industria','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_ai','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('usuario_ai','varchar');
		$this->captura('fecha_reg','timestamp');
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
			
	function insertarMarcaMedidor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_marca_medidor_ime';
		$this->transaccion='FACTUR_MAR_MED_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('denominacion','denominacion','varchar');
		$this->setParametro('industria','industria','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarMarcaMedidor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_marca_medidor_ime';
		$this->transaccion='FACTUR_MAR_MED_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_marca_medidor','id_marca_medidor','int4');
		$this->setParametro('denominacion','denominacion','varchar');
		$this->setParametro('industria','industria','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarMarcaMedidor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_marca_medidor_ime';
		$this->transaccion='FACTUR_MAR_MED_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_marca_medidor','id_marca_medidor','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>