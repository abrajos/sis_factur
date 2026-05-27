<?php
/**
*@package pXP
*@file gen-MODDescuento.php
*@author  (admin)
*@date 15-11-2025 06:41:25
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODDescuento extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarDescuento(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_descuento_sel';
		$this->transaccion='FACTUR_descue_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_descuento','int4');
		$this->captura('porcentaje','numeric');
		$this->captura('desc_descuento','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('consumo','numeric');
		$this->captura('sw_general','varchar');
		$this->captura('id_param','int4');
		$this->captura('sw_maximo','varchar');
		$this->captura('id_usuario_ai','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('usuario_ai','varchar');
		$this->captura('fecha_reg','timestamp');
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
			
	function insertarDescuento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_descuento_ime';
		$this->transaccion='FACTUR_descue_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('porcentaje','porcentaje','numeric');
		$this->setParametro('desc_descuento','desc_descuento','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('consumo','consumo','numeric');
		$this->setParametro('sw_general','sw_general','varchar');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('sw_maximo','sw_maximo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarDescuento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_descuento_ime';
		$this->transaccion='FACTUR_descue_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_descuento','id_descuento','int4');
		$this->setParametro('porcentaje','porcentaje','numeric');
		$this->setParametro('desc_descuento','desc_descuento','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('consumo','consumo','numeric');
		$this->setParametro('sw_general','sw_general','varchar');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('sw_maximo','sw_maximo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarDescuento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_descuento_ime';
		$this->transaccion='FACTUR_descue_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_descuento','id_descuento','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>