<?php
/**
*@package pXP
*@file gen-MODLecIrregular.php
*@author  (admin)
*@date 21-08-2025 03:16:39
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODLecIrregular extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarLecIrregular(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_lec_irregular_sel';
		$this->transaccion='FACTUR_LEC_IRR_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_lec_irre','int4');
		$this->captura('id_cod_irre','int4');
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
			
	function insertarLecIrregular(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_irregular_ime';
		$this->transaccion='FACTUR_LEC_IRR_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cod_irre','id_cod_irre','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_lectura','id_lectura','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarLecIrregular(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_irregular_ime';
		$this->transaccion='FACTUR_LEC_IRR_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lec_irre','id_lec_irre','int4');
		$this->setParametro('id_cod_irre','id_cod_irre','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_lectura','id_lectura','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarLecIrregular(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lec_irregular_ime';
		$this->transaccion='FACTUR_LEC_IRR_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lec_irre','id_lec_irre','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>