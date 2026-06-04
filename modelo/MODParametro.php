<?php
/**
*@package pXP
*@file gen-MODParametro.php
*@author  (admin)
*@date 21-08-2025 02:52:33
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODParametro extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarParametro(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_parametro_sel';
		$this->transaccion='FACTUR_PARAME_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_param','int4');
		$this->captura('tasa_interes','numeric');
		$this->captura('telefono_sucursal','varchar');
		$this->captura('nro_reclamo_03','int4');
		$this->captura('nro_cuenta','int4');
		$this->captura('gestion','numeric');
		$this->captura('lugar','varchar');
		$this->captura('doc_iden','varchar');
		$this->captura('nro_reclamo_02','int4');
		$this->captura('nro_contrato','int4');
		$this->captura('nro_servicio','int4');
		$this->captura('id_fina_regi_prog_proy_acti','int4');
		$this->captura('nro_venta','int4');
		$this->captura('celular_odeco','varchar');
		$this->captura('ci_tramite','varchar');
		$this->captura('sis_facturacion_cobranza','int4');
		$this->captura('ubicacion_sucursal','varchar');
		$this->captura('nro_sucursal_distribucion','int4');
		$this->captura('id_depto_regional','int4');
		$this->captura('nro_tramite','int4');
		$this->captura('id_moneda','int4');
		$this->captura('representante','varchar');
		$this->captura('codigo_sistema','varchar');
		$this->captura('firma_tramite','varchar');
		$this->captura('direccion_sucursal','varchar');
		$this->captura('periodo','numeric');
		$this->captura('ciudad','varchar');
		$this->captura('tiene_caja','varchar');
		$this->captura('nro_recibo','int4');
		$this->captura('telefono_odeco','varchar');
		$this->captura('cod_empresa','varchar');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarParametro(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_parametro_ime';
		$this->transaccion='FACTUR_PARAME_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('tasa_interes','tasa_interes','numeric');
		$this->setParametro('telefono_sucursal','telefono_sucursal','varchar');
		$this->setParametro('nro_reclamo_03','nro_reclamo_03','int4');
		$this->setParametro('nro_cuenta','nro_cuenta','int4');
		$this->setParametro('gestion','gestion','numeric');
		$this->setParametro('lugar','lugar','varchar');
		$this->setParametro('doc_iden','doc_iden','varchar');
		$this->setParametro('nro_reclamo_02','nro_reclamo_02','int4');
		$this->setParametro('nro_contrato','nro_contrato','int4');
		$this->setParametro('nro_servicio','nro_servicio','int4');
		$this->setParametro('id_fina_regi_prog_proy_acti','id_fina_regi_prog_proy_acti','int4');
		$this->setParametro('nro_venta','nro_venta','int4');
		$this->setParametro('celular_odeco','celular_odeco','varchar');
		$this->setParametro('ci_tramite','ci_tramite','varchar');
		$this->setParametro('sis_facturacion_cobranza','sis_facturacion_cobranza','int4');
		$this->setParametro('ubicacion_sucursal','ubicacion_sucursal','varchar');
		$this->setParametro('nro_sucursal_distribucion','nro_sucursal_distribucion','int4');
		$this->setParametro('id_depto_regional','id_depto_regional','int4');
		$this->setParametro('nro_tramite','nro_tramite','int4');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('representante','representante','varchar');
		$this->setParametro('codigo_sistema','codigo_sistema','varchar');
		$this->setParametro('firma_tramite','firma_tramite','varchar');
		$this->setParametro('direccion_sucursal','direccion_sucursal','varchar');
		$this->setParametro('periodo','periodo','numeric');
		$this->setParametro('ciudad','ciudad','varchar');
		$this->setParametro('tiene_caja','tiene_caja','varchar');
		$this->setParametro('nro_recibo','nro_recibo','int4');
		$this->setParametro('telefono_odeco','telefono_odeco','varchar');
		$this->setParametro('cod_empresa','cod_empresa','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarParametro(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_parametro_ime';
		$this->transaccion='FACTUR_PARAME_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('tasa_interes','tasa_interes','numeric');
		$this->setParametro('telefono_sucursal','telefono_sucursal','varchar');
		$this->setParametro('nro_reclamo_03','nro_reclamo_03','int4');
		$this->setParametro('nro_cuenta','nro_cuenta','int4');
		$this->setParametro('gestion','gestion','numeric');
		$this->setParametro('lugar','lugar','varchar');
		$this->setParametro('doc_iden','doc_iden','varchar');
		$this->setParametro('nro_reclamo_02','nro_reclamo_02','int4');
		$this->setParametro('nro_contrato','nro_contrato','int4');
		$this->setParametro('nro_servicio','nro_servicio','int4');
		$this->setParametro('id_fina_regi_prog_proy_acti','id_fina_regi_prog_proy_acti','int4');
		$this->setParametro('nro_venta','nro_venta','int4');
		$this->setParametro('celular_odeco','celular_odeco','varchar');
		$this->setParametro('ci_tramite','ci_tramite','varchar');
		$this->setParametro('sis_facturacion_cobranza','sis_facturacion_cobranza','int4');
		$this->setParametro('ubicacion_sucursal','ubicacion_sucursal','varchar');
		$this->setParametro('nro_sucursal_distribucion','nro_sucursal_distribucion','int4');
		$this->setParametro('id_depto_regional','id_depto_regional','int4');
		$this->setParametro('nro_tramite','nro_tramite','int4');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('representante','representante','varchar');
		$this->setParametro('codigo_sistema','codigo_sistema','varchar');
		$this->setParametro('firma_tramite','firma_tramite','varchar');
		$this->setParametro('direccion_sucursal','direccion_sucursal','varchar');
		$this->setParametro('periodo','periodo','numeric');
		$this->setParametro('ciudad','ciudad','varchar');
		$this->setParametro('tiene_caja','tiene_caja','varchar');
		$this->setParametro('nro_recibo','nro_recibo','int4');
		$this->setParametro('telefono_odeco','telefono_odeco','varchar');
		$this->setParametro('cod_empresa','cod_empresa','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarParametro(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_parametro_ime';
		$this->transaccion='FACTUR_PARAME_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_param','id_param','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>