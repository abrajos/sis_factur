<?php
/**
*@package pXP
*@file gen-MODLecDesc.php
*@author  (admin)
*@date 21-08-2025 03:17:09
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODLecDesc extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarLecDesc(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_lec_desc_sel';
		$this->transaccion='FACTUR_LEC_DES_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_lec_desc','int4');
		$this->captura('id_lectura','int8');
		$this->captura('desc_porcen','numeric');
		$this->captura('desc_importe','numeric');
		$this->captura('id_descuento','int4');
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
			
	function insertarLecDesc(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_desc_ime';
		$this->transaccion='FACTUR_LEC_DES_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lectura','id_lectura','int8');
		$this->setParametro('desc_porcen','desc_porcen','numeric');
		$this->setParametro('desc_importe','desc_importe','numeric');
		$this->setParametro('id_descuento','id_descuento','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarLecDesc(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_desc_ime';
		$this->transaccion='FACTUR_LEC_DES_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lec_desc','id_lec_desc','int4');
		$this->setParametro('id_lectura','id_lectura','int8');
		$this->setParametro('desc_porcen','desc_porcen','numeric');
		$this->setParametro('desc_importe','desc_importe','numeric');
		$this->setParametro('id_descuento','id_descuento','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarLecDesc(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_desc_ime';
		$this->transaccion='FACTUR_LEC_DES_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lec_desc','id_lec_desc','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>