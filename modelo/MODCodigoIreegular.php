<?php
/**
*@package pXP
*@file gen-MODCodigoIreegular.php
*@author  (admin)
*@date 21-08-2025 03:20:40
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODCodigoIreegular extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarCodigoIreegular(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_codigo_ireegular_sel';
		$this->transaccion='FACTUR_COD_IRR_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_cod_irre','int4');
		$this->captura('desc_cod_irre','varchar');
		$this->captura('tipo_lectura','numeric');
		$this->captura('id_cod_gescom','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('codigo','varchar');
		$this->captura('condicion_logica','text');
		$this->captura('id_param','int4');
		$this->captura('sw_aviso','varchar');
		$this->captura('descripcion','text');
		$this->captura('estado','numeric');
		$this->captura('usuario_ai','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('id_usuario_ai','int4');
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
			
	function insertarCodigoIreegular(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_codigo_ireegular_ime';
		$this->transaccion='FACTUR_COD_IRR_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('desc_cod_irre','desc_cod_irre','varchar');
		$this->setParametro('tipo_lectura','tipo_lectura','numeric');
		$this->setParametro('id_cod_gescom','id_cod_gescom','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('condicion_logica','condicion_logica','text');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('sw_aviso','sw_aviso','varchar');
		$this->setParametro('descripcion','descripcion','text');
		$this->setParametro('estado','estado','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarCodigoIreegular(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_codigo_ireegular_ime';
		$this->transaccion='FACTUR_COD_IRR_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cod_irre','id_cod_irre','int4');
		$this->setParametro('desc_cod_irre','desc_cod_irre','varchar');
		$this->setParametro('tipo_lectura','tipo_lectura','numeric');
		$this->setParametro('id_cod_gescom','id_cod_gescom','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('condicion_logica','condicion_logica','text');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('sw_aviso','sw_aviso','varchar');
		$this->setParametro('descripcion','descripcion','text');
		$this->setParametro('estado','estado','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarCodigoIreegular(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_codigo_ireegular_ime';
		$this->transaccion='FACTUR_COD_IRR_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cod_irre','id_cod_irre','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>