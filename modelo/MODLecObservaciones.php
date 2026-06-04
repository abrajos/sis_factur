<?php
/**
*@package pXP
*@file gen-MODLecObservaciones.php
*@author  (admin)
*@date 21-08-2025 03:16:06
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODLecObservaciones extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarLecObservaciones(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_lec_observaciones_sel';
		$this->transaccion='FACTUR_LEC_OBS_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_lec_observacion','int4');
		$this->captura('observacion','text');
		$this->captura('lecturado','numeric');
		$this->captura('tipo_observacion','numeric');
		$this->captura('estado_reg','varchar');
		$this->captura('id_lectura','int8');
		$this->captura('id_usuario_ai','int4');
		$this->captura('usuario_ai','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
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
			
	function insertarLecObservaciones(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_observaciones_ime';
		$this->transaccion='FACTUR_LEC_OBS_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('observacion','observacion','text');
		$this->setParametro('lecturado','lecturado','numeric');
		$this->setParametro('tipo_observacion','tipo_observacion','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_lectura','id_lectura','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarLecObservaciones(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_observaciones_ime';
		$this->transaccion='FACTUR_LEC_OBS_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lec_observacion','id_lec_observacion','int4');
		$this->setParametro('observacion','observacion','text');
		$this->setParametro('lecturado','lecturado','numeric');
		$this->setParametro('tipo_observacion','tipo_observacion','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_lectura','id_lectura','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarLecObservaciones(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_observaciones_ime';
		$this->transaccion='FACTUR_LEC_OBS_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lec_observacion','id_lec_observacion','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>