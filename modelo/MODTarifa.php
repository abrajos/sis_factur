<?php
/**
*@package pXP
*@file gen-MODTarifa.php
*@author  (admin)
*@date 15-11-2025 01:34:37
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTarifa extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTarifa(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_tarifa_sel';
		$this->transaccion='FACTUR_tarifa_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tarifa','int4');
		$this->captura('sw_potencia','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('importe_tarifa','numeric');
		$this->captura('fecha_vigencia','date');
		$this->captura('valor_ini','int4');
		$this->captura('desc_tarifa','varchar');
		$this->captura('valor_final','int4');
		$this->captura('factor_indexacion','numeric');
		$this->captura('tipo_tarifa','numeric');
		$this->captura('estado','numeric');
		$this->captura('id_categoria','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('usuario_ai','varchar');
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
			
	function insertarTarifa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tarifa_ime';
		$this->transaccion='FACTUR_tarifa_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('sw_potencia','sw_potencia','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('importe_tarifa','importe_tarifa','numeric');
		$this->setParametro('fecha_vigencia','fecha_vigencia','date');
		$this->setParametro('valor_ini','valor_ini','int4');
		$this->setParametro('desc_tarifa','desc_tarifa','varchar');
		$this->setParametro('valor_final','valor_final','int4');
		$this->setParametro('factor_indexacion','factor_indexacion','numeric');
		$this->setParametro('tipo_tarifa','tipo_tarifa','numeric');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('id_categoria','id_categoria','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTarifa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tarifa_ime';
		$this->transaccion='FACTUR_tarifa_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tarifa','id_tarifa','int4');
		$this->setParametro('sw_potencia','sw_potencia','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('importe_tarifa','importe_tarifa','numeric');
		$this->setParametro('fecha_vigencia','fecha_vigencia','date');
		$this->setParametro('valor_ini','valor_ini','int4');
		$this->setParametro('desc_tarifa','desc_tarifa','varchar');
		$this->setParametro('valor_final','valor_final','int4');
		$this->setParametro('factor_indexacion','factor_indexacion','numeric');
		$this->setParametro('tipo_tarifa','tipo_tarifa','numeric');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('id_categoria','id_categoria','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTarifa(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_tarifa_ime';
		$this->transaccion='FACTUR_tarifa_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tarifa','id_tarifa','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>