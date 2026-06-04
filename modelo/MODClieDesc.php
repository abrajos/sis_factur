<?php
/**
*@package pXP
*@file gen-MODClieDesc.php
*@author  (admin)
*@date 21-08-2025 03:22:58
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODClieDesc extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarClieDesc(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_clie_desc_sel';
		$this->transaccion='FACTUR_CLI_DSC_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_clie_desc','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_descuento','int4');
		$this->captura('id_cliente','int8');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('usuario_ai','varchar');
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
			
	function insertarClieDesc(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_clie_desc_ime';
		$this->transaccion='FACTUR_CLI_DSC_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_descuento','id_descuento','int4');
		$this->setParametro('id_cliente','id_cliente','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarClieDesc(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_clie_desc_ime';
		$this->transaccion='FACTUR_CLI_DSC_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_clie_desc','id_clie_desc','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_descuento','id_descuento','int4');
		$this->setParametro('id_cliente','id_cliente','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarClieDesc(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_clie_desc_ime';
		$this->transaccion='FACTUR_CLI_DSC_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_clie_desc','id_clie_desc','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>