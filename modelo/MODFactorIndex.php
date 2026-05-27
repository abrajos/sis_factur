<?php
/**
*@package pXP
*@file gen-MODFactorIndex.php
*@author  (admin)
*@date 15-11-2025 03:44:05
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODFactorIndex extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarFactorIndex(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_factor_index_sel';
		$this->transaccion='FACTUR_facind_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_fac_index','int4');
		$this->captura('gestion','numeric');
		$this->captura('valor_index','numeric');
		$this->captura('periodo','numeric');
		$this->captura('valor_index_2','numeric');
		$this->captura('estado_reg','varchar');
		$this->captura('id_param','int4');
		$this->captura('id_usuario_ai','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('usuario_ai','varchar');
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
			
	function insertarFactorIndex(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_factor_index_ime';
		$this->transaccion='FACTUR_facind_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('gestion','gestion','numeric');
		$this->setParametro('valor_index','valor_index','numeric');
		$this->setParametro('periodo','periodo','numeric');
		$this->setParametro('valor_index_2','valor_index_2','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_param','id_param','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarFactorIndex(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_factor_index_ime';
		$this->transaccion='FACTUR_facind_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_fac_index','id_fac_index','int4');
		$this->setParametro('gestion','gestion','numeric');
		$this->setParametro('valor_index','valor_index','numeric');
		$this->setParametro('periodo','periodo','numeric');
		$this->setParametro('valor_index_2','valor_index_2','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_param','id_param','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarFactorIndex(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_factor_index_ime';
		$this->transaccion='FACTUR_facind_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_fac_index','id_fac_index','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>