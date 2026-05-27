<?php
/**
*@package pXP
*@file gen-MODPoste.php
*@author  (admin)
*@date 21-08-2025 02:52:35
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODPoste extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarPoste(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_poste_sel';
		$this->transaccion='FACTUR_POSTE_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_poste','int4');
		$this->captura('estructura_mt','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usr_reg','int4');
		$this->captura('id_lugar','int4');
		$this->captura('id_centro_transformacion','int4');
		$this->captura('dist_postante','float8');
		$this->captura('tipo','varchar');
		$this->captura('codigo_poste','varchar');
		$this->captura('id_usr_mod','int4');
		$this->captura('id_trafo','int4');
		$this->captura('estructura_bt','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarPoste(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_poste_ime';
		$this->transaccion='FACTUR_POSTE_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estructura_mt','estructura_mt','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_usr_reg','id_usr_reg','int4');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('id_centro_transformacion','id_centro_transformacion','int4');
		$this->setParametro('dist_postante','dist_postante','float8');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('codigo_poste','codigo_poste','varchar');
		$this->setParametro('id_usr_mod','id_usr_mod','int4');
		$this->setParametro('id_trafo','id_trafo','int4');
		$this->setParametro('estructura_bt','estructura_bt','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarPoste(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_poste_ime';
		$this->transaccion='FACTUR_POSTE_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_poste','id_poste','int4');
		$this->setParametro('estructura_mt','estructura_mt','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_usr_reg','id_usr_reg','int4');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('id_centro_transformacion','id_centro_transformacion','int4');
		$this->setParametro('dist_postante','dist_postante','float8');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('codigo_poste','codigo_poste','varchar');
		$this->setParametro('id_usr_mod','id_usr_mod','int4');
		$this->setParametro('id_trafo','id_trafo','int4');
		$this->setParametro('estructura_bt','estructura_bt','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarPoste(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_poste_ime';
		$this->transaccion='FACTUR_POSTE_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_poste','id_poste','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>