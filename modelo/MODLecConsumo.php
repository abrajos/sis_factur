<?php
/**
*@package pXP
*@file gen-MODLecConsumo.php
*@author  (admin)
*@date 21-08-2025 03:17:48
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODLecConsumo extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarLecConsumo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_lec_consumo_sel';
		$this->transaccion='FACTUR_LEC_CON_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_lec_consumo','int4');
		$this->captura('id_cliente','int8');
		$this->captura('consumo5','numeric');
		$this->captura('consumo3','numeric');
		$this->captura('consumo1','numeric');
		$this->captura('consumo2','numeric');
		$this->captura('estado_reg','varchar');
		$this->captura('consumo4','numeric');
		$this->captura('consumo6','numeric');
		$this->captura('id_usuario_ai','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('usuario_ai','varchar');
		$this->captura('fecha_reg','timestamp');
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
			
	function insertarLecConsumo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_consumo_ime';
		$this->transaccion='FACTUR_LEC_CON_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cliente','id_cliente','int8');
		$this->setParametro('consumo5','consumo5','numeric');
		$this->setParametro('consumo3','consumo3','numeric');
		$this->setParametro('consumo1','consumo1','numeric');
		$this->setParametro('consumo2','consumo2','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('consumo4','consumo4','numeric');
		$this->setParametro('consumo6','consumo6','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarLecConsumo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_consumo_ime';
		$this->transaccion='FACTUR_LEC_CON_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lec_consumo','id_lec_consumo','int4');
		$this->setParametro('id_cliente','id_cliente','int8');
		$this->setParametro('consumo5','consumo5','numeric');
		$this->setParametro('consumo3','consumo3','numeric');
		$this->setParametro('consumo1','consumo1','numeric');
		$this->setParametro('consumo2','consumo2','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('consumo4','consumo4','numeric');
		$this->setParametro('consumo6','consumo6','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarLecConsumo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_consumo_ime';
		$this->transaccion='FACTUR_LEC_CON_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lec_consumo','id_lec_consumo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>