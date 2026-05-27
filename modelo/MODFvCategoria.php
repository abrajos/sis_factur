<?php
/**
*@package pXP
*@file gen-MODFvCategoria.php
*@author  (admin)
*@date 21-08-2025 02:50:53
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODFvCategoria extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarFvCategoria(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_fv_categoria_sel';
		$this->transaccion='FACTUR_categ_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_categoria','int4');
		$this->captura('sw_industrial','varchar');
		$this->captura('id_param','int4');
		$this->captura('importe_garantia','numeric');
		$this->captura('desc_categoria','varchar');
		$this->captura('sw_lectura_potencia_contratada','varchar');
		$this->captura('tiempo_factor_consumo','numeric');
		$this->captura('estado','numeric');
		$this->captura('id_cuenta','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarFvCategoria(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_fv_categoria_ime';
		$this->transaccion='FACTUR_categ_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('sw_industrial','sw_industrial','varchar');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('importe_garantia','importe_garantia','numeric');
		$this->setParametro('desc_categoria','desc_categoria','varchar');
		$this->setParametro('sw_lectura_potencia_contratada','sw_lectura_potencia_contratada','varchar');
		$this->setParametro('tiempo_factor_consumo','tiempo_factor_consumo','numeric');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('id_cuenta','id_cuenta','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarFvCategoria(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_fv_categoria_ime';
		$this->transaccion='FACTUR_categ_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_categoria','id_categoria','int4');
		$this->setParametro('sw_industrial','sw_industrial','varchar');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('importe_garantia','importe_garantia','numeric');
		$this->setParametro('desc_categoria','desc_categoria','varchar');
		$this->setParametro('sw_lectura_potencia_contratada','sw_lectura_potencia_contratada','varchar');
		$this->setParametro('tiempo_factor_consumo','tiempo_factor_consumo','numeric');
		$this->setParametro('estado','estado','numeric');
		$this->setParametro('id_cuenta','id_cuenta','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarFvCategoria(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_fv_categoria_ime';
		$this->transaccion='FACTUR_categ_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_categoria','id_categoria','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>