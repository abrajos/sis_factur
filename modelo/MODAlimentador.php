<?php
/**
*@package pXP
*@file gen-MODAlimentador.php
*@author  (admin)
*@date 21-08-2025 03:54:38
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODAlimentador extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarAlimentador(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_alimentador_sel';
		$this->transaccion='FACTUR_ALIMEN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_alimentador','int4');
		$this->captura('id_subestacion','int4');
		$this->captura('tension_operacion','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('cod_alimentador','varchar');
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
			
	function insertarAlimentador(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_alimentador_ime';
		$this->transaccion='FACTUR_ALIMEN_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_subestacion','id_subestacion','int4');
		$this->setParametro('tension_operacion','tension_operacion','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('cod_alimentador','cod_alimentador','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarAlimentador(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_alimentador_ime';
		$this->transaccion='FACTUR_ALIMEN_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_alimentador','id_alimentador','int4');
		$this->setParametro('id_subestacion','id_subestacion','int4');
		$this->setParametro('tension_operacion','tension_operacion','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('cod_alimentador','cod_alimentador','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarAlimentador(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_alimentador_ime';
		$this->transaccion='FACTUR_ALIMEN_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_alimentador','id_alimentador','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>