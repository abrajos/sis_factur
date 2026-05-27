<?php
/**
*@package pXP
*@file gen-MODLectura.php
*@author  (admin)
*@date 21-08-2025 02:52:40
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODLectura extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarLectura(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_lectura_sel';
		$this->transaccion='FACTUR_LECTUR_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_lectura','int8');
		$this->captura('id_categoria','int4');
		$this->captura('id_cliente','int8');
		$this->captura('potencia_val','numeric');
		$this->captura('fecha_proxmed','date');
		$this->captura('fecha_proxemi','date');
		$this->captura('consumo_total','numeric');
		$this->captura('nro_digitos','int4');
		$this->captura('lecant_kvar','numeric');
		$this->captura('saldo_credito','numeric');
		$this->captura('consumo_val','numeric');
		$this->captura('tipo_lectura','numeric');
		$this->captura('lectura_kwh','numeric');
		$this->captura('lecant_kwh','numeric');
		$this->captura('periodo_corte','int4');
		$this->captura('conexion_val','numeric');
		$this->captura('cod_ubica','varchar');
		$this->captura('nrodig_kwh','int4');
		$this->captura('consumo_cambio','numeric');
		$this->captura('lectura_kvar','numeric');
		$this->captura('importe_dev','numeric');
		$this->captura('nro_cuenta','int4');
		$this->captura('reconex_val','numeric');
		$this->captura('potencia_contratada','numeric');
		$this->captura('restitucion','numeric');
		$this->captura('fecha_vence','date');
		$this->captura('credito_pagado','numeric');
		$this->captura('saldo_imp_dev_ap','numeric');
		$this->captura('factor_potencia','numeric');
		$this->captura('lectura_anterior','numeric');
		$this->captura('promedio_val','numeric');
		$this->captura('cambio_kvar','numeric');
		$this->captura('cantidad_periodo','int4');
		$this->captura('sw_debito_fiscal','varchar');
		$this->captura('id_lectura_fk','int4');
		$this->captura('multi_kwh','numeric');
		$this->captura('ultima_lectura','numeric');
		$this->captura('fecha_anterior','date');
		$this->captura('nrodig_kvar','int4');
		$this->captura('importe_dev_ap','numeric');
		$this->captura('consumo_peri','numeric');
		$this->captura('desc_restitucion','varchar');
		$this->captura('multi_kw','numeric');
		$this->captura('importe_total','numeric');
		$this->captura('consumo_anterior','numeric');
		$this->captura('gestion_lec','numeric');
		$this->captura('sw_potencia_maxima','varchar');
		$this->captura('saldo_imp_dev','numeric');
		$this->captura('consumo_dev','numeric');
		$this->captura('periodo_lec','numeric');
		$this->captura('multi_kvar','numeric');
		$this->captura('importe_interes','numeric');
		$this->captura('lectura_kw','numeric');
		$this->captura('lectura_actual','numeric');
		$this->captura('fecha_actual','date');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarLectura(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lectura_ime';
		$this->transaccion='FACTUR_LECTUR_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_categoria','id_categoria','int4');
		$this->setParametro('id_cliente','id_cliente','int8');
		$this->setParametro('potencia_val','potencia_val','numeric');
		$this->setParametro('fecha_proxmed','fecha_proxmed','date');
		$this->setParametro('fecha_proxemi','fecha_proxemi','date');
		$this->setParametro('consumo_total','consumo_total','numeric');
		$this->setParametro('nro_digitos','nro_digitos','int4');
		$this->setParametro('lecant_kvar','lecant_kvar','numeric');
		$this->setParametro('saldo_credito','saldo_credito','numeric');
		$this->setParametro('consumo_val','consumo_val','numeric');
		$this->setParametro('tipo_lectura','tipo_lectura','numeric');
		$this->setParametro('lectura_kwh','lectura_kwh','numeric');
		$this->setParametro('lecant_kwh','lecant_kwh','numeric');
		$this->setParametro('periodo_corte','periodo_corte','int4');
		$this->setParametro('conexion_val','conexion_val','numeric');
		$this->setParametro('cod_ubica','cod_ubica','varchar');
		$this->setParametro('nrodig_kwh','nrodig_kwh','int4');
		$this->setParametro('consumo_cambio','consumo_cambio','numeric');
		$this->setParametro('lectura_kvar','lectura_kvar','numeric');
		$this->setParametro('importe_dev','importe_dev','numeric');
		$this->setParametro('nro_cuenta','nro_cuenta','int4');
		$this->setParametro('reconex_val','reconex_val','numeric');
		$this->setParametro('potencia_contratada','potencia_contratada','numeric');
		$this->setParametro('restitucion','restitucion','numeric');
		$this->setParametro('fecha_vence','fecha_vence','date');
		$this->setParametro('credito_pagado','credito_pagado','numeric');
		$this->setParametro('saldo_imp_dev_ap','saldo_imp_dev_ap','numeric');
		$this->setParametro('factor_potencia','factor_potencia','numeric');
		$this->setParametro('lectura_anterior','lectura_anterior','numeric');
		$this->setParametro('promedio_val','promedio_val','numeric');
		$this->setParametro('cambio_kvar','cambio_kvar','numeric');
		$this->setParametro('cantidad_periodo','cantidad_periodo','int4');
		$this->setParametro('sw_debito_fiscal','sw_debito_fiscal','varchar');
		$this->setParametro('id_lectura_fk','id_lectura_fk','int4');
		$this->setParametro('multi_kwh','multi_kwh','numeric');
		$this->setParametro('ultima_lectura','ultima_lectura','numeric');
		$this->setParametro('fecha_anterior','fecha_anterior','date');
		$this->setParametro('nrodig_kvar','nrodig_kvar','int4');
		$this->setParametro('importe_dev_ap','importe_dev_ap','numeric');
		$this->setParametro('consumo_peri','consumo_peri','numeric');
		$this->setParametro('desc_restitucion','desc_restitucion','varchar');
		$this->setParametro('multi_kw','multi_kw','numeric');
		$this->setParametro('importe_total','importe_total','numeric');
		$this->setParametro('consumo_anterior','consumo_anterior','numeric');
		$this->setParametro('gestion_lec','gestion_lec','numeric');
		$this->setParametro('sw_potencia_maxima','sw_potencia_maxima','varchar');
		$this->setParametro('saldo_imp_dev','saldo_imp_dev','numeric');
		$this->setParametro('consumo_dev','consumo_dev','numeric');
		$this->setParametro('periodo_lec','periodo_lec','numeric');
		$this->setParametro('multi_kvar','multi_kvar','numeric');
		$this->setParametro('importe_interes','importe_interes','numeric');
		$this->setParametro('lectura_kw','lectura_kw','numeric');
		$this->setParametro('lectura_actual','lectura_actual','numeric');
		$this->setParametro('fecha_actual','fecha_actual','date');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarLectura(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lectura_ime';
		$this->transaccion='FACTUR_LECTUR_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lectura','id_lectura','int8');
		$this->setParametro('id_categoria','id_categoria','int4');
		$this->setParametro('id_cliente','id_cliente','int8');
		$this->setParametro('potencia_val','potencia_val','numeric');
		$this->setParametro('fecha_proxmed','fecha_proxmed','date');
		$this->setParametro('fecha_proxemi','fecha_proxemi','date');
		$this->setParametro('consumo_total','consumo_total','numeric');
		$this->setParametro('nro_digitos','nro_digitos','int4');
		$this->setParametro('lecant_kvar','lecant_kvar','numeric');
		$this->setParametro('saldo_credito','saldo_credito','numeric');
		$this->setParametro('consumo_val','consumo_val','numeric');
		$this->setParametro('tipo_lectura','tipo_lectura','numeric');
		$this->setParametro('lectura_kwh','lectura_kwh','numeric');
		$this->setParametro('lecant_kwh','lecant_kwh','numeric');
		$this->setParametro('periodo_corte','periodo_corte','int4');
		$this->setParametro('conexion_val','conexion_val','numeric');
		$this->setParametro('cod_ubica','cod_ubica','varchar');
		$this->setParametro('nrodig_kwh','nrodig_kwh','int4');
		$this->setParametro('consumo_cambio','consumo_cambio','numeric');
		$this->setParametro('lectura_kvar','lectura_kvar','numeric');
		$this->setParametro('importe_dev','importe_dev','numeric');
		$this->setParametro('nro_cuenta','nro_cuenta','int4');
		$this->setParametro('reconex_val','reconex_val','numeric');
		$this->setParametro('potencia_contratada','potencia_contratada','numeric');
		$this->setParametro('restitucion','restitucion','numeric');
		$this->setParametro('fecha_vence','fecha_vence','date');
		$this->setParametro('credito_pagado','credito_pagado','numeric');
		$this->setParametro('saldo_imp_dev_ap','saldo_imp_dev_ap','numeric');
		$this->setParametro('factor_potencia','factor_potencia','numeric');
		$this->setParametro('lectura_anterior','lectura_anterior','numeric');
		$this->setParametro('promedio_val','promedio_val','numeric');
		$this->setParametro('cambio_kvar','cambio_kvar','numeric');
		$this->setParametro('cantidad_periodo','cantidad_periodo','int4');
		$this->setParametro('sw_debito_fiscal','sw_debito_fiscal','varchar');
		$this->setParametro('id_lectura_fk','id_lectura_fk','int4');
		$this->setParametro('multi_kwh','multi_kwh','numeric');
		$this->setParametro('ultima_lectura','ultima_lectura','numeric');
		$this->setParametro('fecha_anterior','fecha_anterior','date');
		$this->setParametro('nrodig_kvar','nrodig_kvar','int4');
		$this->setParametro('importe_dev_ap','importe_dev_ap','numeric');
		$this->setParametro('consumo_peri','consumo_peri','numeric');
		$this->setParametro('desc_restitucion','desc_restitucion','varchar');
		$this->setParametro('multi_kw','multi_kw','numeric');
		$this->setParametro('importe_total','importe_total','numeric');
		$this->setParametro('consumo_anterior','consumo_anterior','numeric');
		$this->setParametro('gestion_lec','gestion_lec','numeric');
		$this->setParametro('sw_potencia_maxima','sw_potencia_maxima','varchar');
		$this->setParametro('saldo_imp_dev','saldo_imp_dev','numeric');
		$this->setParametro('consumo_dev','consumo_dev','numeric');
		$this->setParametro('periodo_lec','periodo_lec','numeric');
		$this->setParametro('multi_kvar','multi_kvar','numeric');
		$this->setParametro('importe_interes','importe_interes','numeric');
		$this->setParametro('lectura_kw','lectura_kw','numeric');
		$this->setParametro('lectura_actual','lectura_actual','numeric');
		$this->setParametro('fecha_actual','fecha_actual','date');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarLectura(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_lectura_ime';
		$this->transaccion='FACTUR_LECTUR_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_lectura','id_lectura','int8');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>