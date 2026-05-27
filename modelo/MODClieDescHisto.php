<?php
/**
*@package pXP
*@file gen-MODClieDescHisto.php
*@author  (admin)
*@date 21-08-2025 03:22:14
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODClieDescHisto extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarClieDescHisto(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_clie_desc_histo_sel';
		$this->transaccion='FACTUR_CLI_DES_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_clie_desc_histo','int4');
		$this->captura('id_usr_elim','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_descuento','int4');
		$this->captura('id_cliente','int8');
		$this->captura('estado','varchar');
		$this->captura('fecha_elim','date');
		$this->captura('id_clie_desc','int8');
		$this->captura('fecha_reg','timestamp');
		$this->captura('usuario_ai','varchar');
		$this->captura('id_usuario_reg','int4');
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
			
	function insertarClieDescHisto(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_clie_desc_histo_ime';
		$this->transaccion='FACTUR_CLI_DES_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_usr_elim','id_usr_elim','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_descuento','id_descuento','int4');
		$this->setParametro('id_cliente','id_cliente','int8');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('fecha_elim','fecha_elim','date');
		$this->setParametro('id_clie_desc','id_clie_desc','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarClieDescHisto(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_clie_desc_histo_ime';
		$this->transaccion='FACTUR_CLI_DES_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_clie_desc_histo','id_clie_desc_histo','int4');
		$this->setParametro('id_usr_elim','id_usr_elim','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_descuento','id_descuento','int4');
		$this->setParametro('id_cliente','id_cliente','int8');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('fecha_elim','fecha_elim','date');
		$this->setParametro('id_clie_desc','id_clie_desc','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarClieDescHisto(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_clie_desc_histo_ime';
		$this->transaccion='FACTUR_CLI_DES_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_clie_desc_histo','id_clie_desc_histo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>