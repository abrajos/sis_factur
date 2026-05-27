<?php
/**
*@package pXP
*@file gen-MODTasa.php
*@author  (admin)
*@date 15-11-2025 06:32:50
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTasa extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTasa(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_tasa_sel';
		$this->transaccion='FACTUR_tasa_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tasa','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('desc_tasa','varchar');
		$this->captura('tasa_porcen','numeric');
		$this->captura('id_param','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('usuario_ai','varchar');
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
			
	function insertarTasa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tasa_ime';
		$this->transaccion='FACTUR_tasa_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('desc_tasa','desc_tasa','varchar');
		$this->setParametro('tasa_porcen','tasa_porcen','numeric');
		$this->setParametro('id_param','id_param','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTasa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tasa_ime';
		$this->transaccion='FACTUR_tasa_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tasa','id_tasa','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('desc_tasa','desc_tasa','varchar');
		$this->setParametro('tasa_porcen','tasa_porcen','numeric');
		$this->setParametro('id_param','id_param','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTasa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tasa_ime';
		$this->transaccion='FACTUR_tasa_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tasa','id_tasa','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>