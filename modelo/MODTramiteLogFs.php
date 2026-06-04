<?php
/**
*@package pXP
*@file gen-MODTramiteLogFs.php
*@author  (admin)
*@date 21-08-2025 03:12:58
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTramiteLogFs extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTramiteLogFs(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_tramite_log_fs_sel';
		$this->transaccion='FACTUR_TRA_LOG_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_log_fs','int4');
		$this->captura('fecha_cambio','timestamp');
		$this->captura('fecha_solicitud_anterior','timestamp');
		$this->captura('motivo_cambio_fecha','text');
		$this->captura('estado_reg','varchar');
		$this->captura('usuario','varchar');
		$this->captura('id_nro_tramite','int8');
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
			
	function insertarTramiteLogFs(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tramite_log_fs_ime';
		$this->transaccion='FACTUR_TRA_LOG_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('fecha_cambio','fecha_cambio','timestamp');
		$this->setParametro('fecha_solicitud_anterior','fecha_solicitud_anterior','timestamp');
		$this->setParametro('motivo_cambio_fecha','motivo_cambio_fecha','text');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('usuario','usuario','varchar');
		$this->setParametro('id_nro_tramite','id_nro_tramite','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTramiteLogFs(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tramite_log_fs_ime';
		$this->transaccion='FACTUR_TRA_LOG_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_log_fs','id_log_fs','int4');
		$this->setParametro('fecha_cambio','fecha_cambio','timestamp');
		$this->setParametro('fecha_solicitud_anterior','fecha_solicitud_anterior','timestamp');
		$this->setParametro('motivo_cambio_fecha','motivo_cambio_fecha','text');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('usuario','usuario','varchar');
		$this->setParametro('id_nro_tramite','id_nro_tramite','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTramiteLogFs(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tramite_log_fs_ime';
		$this->transaccion='FACTUR_TRA_LOG_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_log_fs','id_log_fs','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>