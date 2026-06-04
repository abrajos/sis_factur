<?php
/**
*@package pXP
*@file gen-MODRuta.php
*@author  (admin)
*@date 15-11-2025 08:14:52
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODRuta extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarRuta(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_ruta_sel';
		$this->transaccion='FACTUR_ruta_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_ruta','int4');
		$this->captura('fecha_proxmed','date');
		$this->captura('id_municipio','int4');
		$this->captura('clientes','int4');
		$this->captura('fecha_lectura','date');
		$this->captura('id_funcionario','int4');
		$this->captura('fecha_anterior','date');
		$this->captura('zona_ruta','numeric');
		$this->captura('id_zona','int4');
		$this->captura('desc_ruta','varchar');
		$this->captura('fecha_proxemi','date');
		$this->captura('id_param','int4');
		$this->captura('cod_ruta','varchar');
		$this->captura('fecha_factura','date');
		$this->captura('fecha_vence','date');
		$this->captura('sw_proceso','varchar');
		$this->captura('sin_lectura','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('maximo_clientes','int4');
		$this->captura('sw_debito_fiscal','varchar');
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
			
	function insertarRuta(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_ruta_ime';
		$this->transaccion='FACTUR_ruta_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('fecha_proxmed','fecha_proxmed','date');
		$this->setParametro('id_municipio','id_municipio','int4');
		$this->setParametro('clientes','clientes','int4');
		$this->setParametro('fecha_lectura','fecha_lectura','date');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('fecha_anterior','fecha_anterior','date');
		$this->setParametro('zona_ruta','zona_ruta','numeric');
		$this->setParametro('id_zona','id_zona','int4');
		$this->setParametro('desc_ruta','desc_ruta','varchar');
		$this->setParametro('fecha_proxemi','fecha_proxemi','date');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('cod_ruta','cod_ruta','varchar');
		$this->setParametro('fecha_factura','fecha_factura','date');
		$this->setParametro('fecha_vence','fecha_vence','date');
		$this->setParametro('sw_proceso','sw_proceso','varchar');
		$this->setParametro('sin_lectura','sin_lectura','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('maximo_clientes','maximo_clientes','int4');
		$this->setParametro('sw_debito_fiscal','sw_debito_fiscal','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarRuta(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_ruta_ime';
		$this->transaccion='FACTUR_ruta_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_ruta','id_ruta','int4');
		$this->setParametro('fecha_proxmed','fecha_proxmed','date');
		$this->setParametro('id_municipio','id_municipio','int4');
		$this->setParametro('clientes','clientes','int4');
		$this->setParametro('fecha_lectura','fecha_lectura','date');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('fecha_anterior','fecha_anterior','date');
		$this->setParametro('zona_ruta','zona_ruta','numeric');
		$this->setParametro('id_zona','id_zona','int4');
		$this->setParametro('desc_ruta','desc_ruta','varchar');
		$this->setParametro('fecha_proxemi','fecha_proxemi','date');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('cod_ruta','cod_ruta','varchar');
		$this->setParametro('fecha_factura','fecha_factura','date');
		$this->setParametro('fecha_vence','fecha_vence','date');
		$this->setParametro('sw_proceso','sw_proceso','varchar');
		$this->setParametro('sin_lectura','sin_lectura','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('maximo_clientes','maximo_clientes','int4');
		$this->setParametro('sw_debito_fiscal','sw_debito_fiscal','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarRuta(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_ruta_ime';
		$this->transaccion='FACTUR_ruta_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_ruta','id_ruta','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>