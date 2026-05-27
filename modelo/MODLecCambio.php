<?php
/**
*@package pXP
*@file gen-MODLecCambio.php
*@author  (admin)
*@date 21-08-2025 03:18:24
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODLecCambio extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarLecCambio(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_lec_cambio_sel';
		$this->transaccion='FACTUR_LEC_CAM_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_cambio','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('consumo_cambio','numeric');
		$this->captura('fecha_cambio','timestamp');
		$this->captura('lec_anterior','numeric');
		$this->captura('lec_cambio','numeric');
		$this->captura('id_lectura','int8');
		$this->captura('tipo_cambio','numeric');
		$this->captura('id_usuario_reg','int4');
		$this->captura('usuario_ai','varchar');
		$this->captura('fecha_reg','timestamp');
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
			
	function insertarLecCambio(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_cambio_ime';
		$this->transaccion='FACTUR_LEC_CAM_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('consumo_cambio','consumo_cambio','numeric');
		$this->setParametro('fecha_cambio','fecha_cambio','timestamp');
		$this->setParametro('lec_anterior','lec_anterior','numeric');
		$this->setParametro('lec_cambio','lec_cambio','numeric');
		$this->setParametro('id_lectura','id_lectura','int8');
		$this->setParametro('tipo_cambio','tipo_cambio','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarLecCambio(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_cambio_ime';
		$this->transaccion='FACTUR_LEC_CAM_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cambio','id_cambio','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('consumo_cambio','consumo_cambio','numeric');
		$this->setParametro('fecha_cambio','fecha_cambio','timestamp');
		$this->setParametro('lec_anterior','lec_anterior','numeric');
		$this->setParametro('lec_cambio','lec_cambio','numeric');
		$this->setParametro('id_lectura','id_lectura','int8');
		$this->setParametro('tipo_cambio','tipo_cambio','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarLecCambio(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_cambio_ime';
		$this->transaccion='FACTUR_LEC_CAM_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cambio','id_cambio','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>