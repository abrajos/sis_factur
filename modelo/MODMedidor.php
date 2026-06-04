<?php
/**
*@package pXP
*@file gen-MODMedidor.php
*@author  (admin)
*@date 21-08-2025 02:52:42
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODMedidor extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarMedidor(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_medidor_sel';
		$this->transaccion='FACTUR_MEDIDO_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_medidor','integer');
		$this->captura('sw_instalado','varchar');
		$this->captura('sw_pertenece','varchar');
		$this->captura('id_param','integer');
		$this->captura('marca','varchar');
		$this->captura('capacidad','varchar');
		$this->captura('tipo_medidor','numeric');
		$this->captura('costo','numeric');
		$this->captura('nro_digitos','int4');
		$this->captura('nro_serie','varchar');
		$this->captura('id_nro_tramite','int8');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarMedidor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_medidor_ime';
		$this->transaccion='FACTUR_MEDIDO_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('sw_instalado','sw_instalado','varchar');
		$this->setParametro('sw_pertenece','sw_pertenece','varchar');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('marca','marca','varchar');
		$this->setParametro('capacidad','capacidad','varchar');
		$this->setParametro('tipo_medidor','tipo_medidor','numeric');
		$this->setParametro('costo','costo','numeric');
		$this->setParametro('nro_digitos','nro_digitos','int4');
		$this->setParametro('nro_serie','nro_serie','varchar');
		$this->setParametro('id_nro_tramite','id_nro_tramite','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarMedidor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_medidor_ime';
		$this->transaccion='FACTUR_MEDIDO_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_medidor','id_medidor','int8');
		$this->setParametro('sw_instalado','sw_instalado','varchar');
		$this->setParametro('sw_pertenece','sw_pertenece','varchar');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('marca','marca','varchar');
		$this->setParametro('capacidad','capacidad','varchar');
		$this->setParametro('tipo_medidor','tipo_medidor','numeric');
		$this->setParametro('costo','costo','numeric');
		$this->setParametro('nro_digitos','nro_digitos','int4');
		$this->setParametro('nro_serie','nro_serie','varchar');
		$this->setParametro('id_nro_tramite','id_nro_tramite','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarMedidor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_medidor_ime';
		$this->transaccion='FACTUR_MEDIDO_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_medidor','id_medidor','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>