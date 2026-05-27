<?php
/**
*@package pXP
*@file gen-MODCliente.php
*@author  (admin)
*@date 27-08-2025 14:40:07
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODCliente extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarCliente(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_cliente_sel';
		$this->transaccion='FACTUR_CLIENT_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_cliente','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_categoria','int4');
		$this->captura('id_ruta','int4');
		$this->captura('id_param','int4');
		$this->captura('nro_cuenta','int4');
		$this->captura('nro_cuenta_ant','varchar');
		$this->captura('cod_ubica','varchar');
		$this->captura('nombre','varchar');
		$this->captura('paterno','varchar');
		$this->captura('materno','varchar');
		$this->captura('doc_iden','varchar');
		$this->captura('fecha_naci','date');
		$this->captura('telefono','int4');
		$this->captura('celular','int4');
		$this->captura('direccion','varchar');
		$this->captura('descripcion_dire','varchar');
		$this->captura('nomb_elec','varchar');
		$this->captura('nombre_factura','varchar');
		$this->captura('nro_nit','numeric');
		$this->captura('repre_legal','varchar');
		$this->captura('docid_legal','varchar');
		$this->captura('poten_instalada','numeric');
		$this->captura('poten_contratada','numeric');
		$this->captura('tension','varchar');
		$this->captura('cod_transforma','varchar');
		$this->captura('tipo_medidor','numeric');
		$this->captura('capacidad','varchar');
		$this->captura('disyuntor','int4');
		$this->captura('relacion_cts1','numeric');
		$this->captura('relacion_cts2','numeric');
		$this->captura('relacion_pts1','numeric');
		$this->captura('relacion_pts2','numeric');
		$this->captura('importe_garantia','numeric');
		$this->captura('importe_conex','numeric');
		$this->captura('marca_med','varchar');
		$this->captura('nroserie_med','varchar');
		$this->captura('nro_digitos','int4');
		$this->captura('marca_cts','varchar');
		$this->captura('nroserie_cts','varchar');
		$this->captura('marca_pts','varchar');
		$this->captura('nroserie_pts','varchar');
		$this->captura('marca_medact','varchar');
		$this->captura('nroserie_medact','varchar');
		$this->captura('marca_medreac','varchar');
		$this->captura('nroserie_medreac','varchar');
		$this->captura('multi_kwh','numeric');
		$this->captura('multi_kvar','numeric');
		$this->captura('multi_kw','numeric');
		$this->captura('nrodig_kwh','int4');
		$this->captura('nrodig_kvar','int4');
		$this->captura('fecha_hora_instala','timestamp');
		$this->captura('fases_1r','varchar');
		$this->captura('fases_2s','varchar');
		$this->captura('fases_3t','varchar');
		$this->captura('fases_n','varchar');
		$this->captura('nroserie_med2','varchar');
		$this->captura('nroserie_cts2','varchar');
		$this->captura('nroserie_medact2','varchar');
		$this->captura('nroserie_medreac2','varchar');
		$this->captura('nro_precinto','varchar');
		$this->captura('sw_activa','varchar');
		$this->captura('sw_libre','varchar');
		$this->captura('sw_bajatemp','varchar');
		$this->captura('sw_bajadef','varchar');
		$this->captura('nroserie_pts2','varchar');
		$this->captura('razon_social','varchar');
		$this->captura('casada','varchar');
		$this->captura('id_trafo','int4');
		$this->captura('id_lugar','int4');
		$this->captura('mes_deuda','varchar');
		$this->captura('sw_debito_fiscal','varchar');
		$this->captura('id_ruta_b','int4');
		$this->captura('observaciones','text');
		$this->captura('tipo_identificacion','varchar');
		$this->captura('distancia_trafo','numeric');
		$this->captura('tipo_suministro','varchar');
		$this->captura('tipo_medicion','varchar');
		$this->captura('tipo_consumidor','varchar');
		$this->captura('id_poste','int4');
		$this->captura('dist_poste','float8');
		$this->captura('lug_expedido','varchar');
		$this->captura('id_regional','int4');
		$this->captura('coord_x','numeric');
		$this->captura('coord_y','numeric');
		$this->captura('coord_z','numeric');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_ai','int4');
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
			
	function insertarCliente(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_cliente_ime';
		$this->transaccion='FACTUR_CLIENT_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_categoria','id_categoria','int4');
		$this->setParametro('id_ruta','id_ruta','int4');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('nro_cuenta','nro_cuenta','int4');
		$this->setParametro('nro_cuenta_ant','nro_cuenta_ant','varchar');
		$this->setParametro('cod_ubica','cod_ubica','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('paterno','paterno','varchar');
		$this->setParametro('materno','materno','varchar');
		$this->setParametro('doc_iden','doc_iden','varchar');
		$this->setParametro('fecha_naci','fecha_naci','date');
		$this->setParametro('telefono','telefono','int4');
		$this->setParametro('celular','celular','int4');
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('descripcion_dire','descripcion_dire','varchar');
		$this->setParametro('nomb_elec','nomb_elec','varchar');
		$this->setParametro('nombre_factura','nombre_factura','varchar');
		$this->setParametro('nro_nit','nro_nit','numeric');
		$this->setParametro('repre_legal','repre_legal','varchar');
		$this->setParametro('docid_legal','docid_legal','varchar');
		$this->setParametro('poten_instalada','poten_instalada','numeric');
		$this->setParametro('poten_contratada','poten_contratada','numeric');
		$this->setParametro('tension','tension','varchar');
		$this->setParametro('cod_transforma','cod_transforma','varchar');
		$this->setParametro('tipo_medidor','tipo_medidor','numeric');
		$this->setParametro('capacidad','capacidad','varchar');
		$this->setParametro('disyuntor','disyuntor','int4');
		$this->setParametro('relacion_cts1','relacion_cts1','numeric');
		$this->setParametro('relacion_cts2','relacion_cts2','numeric');
		$this->setParametro('relacion_pts1','relacion_pts1','numeric');
		$this->setParametro('relacion_pts2','relacion_pts2','numeric');
		$this->setParametro('importe_garantia','importe_garantia','numeric');
		$this->setParametro('importe_conex','importe_conex','numeric');
		$this->setParametro('marca_med','marca_med','varchar');
		$this->setParametro('nroserie_med','nroserie_med','varchar');
		$this->setParametro('nro_digitos','nro_digitos','int4');
		$this->setParametro('marca_cts','marca_cts','varchar');
		$this->setParametro('nroserie_cts','nroserie_cts','varchar');
		$this->setParametro('marca_pts','marca_pts','varchar');
		$this->setParametro('nroserie_pts','nroserie_pts','varchar');
		$this->setParametro('marca_medact','marca_medact','varchar');
		$this->setParametro('nroserie_medact','nroserie_medact','varchar');
		$this->setParametro('marca_medreac','marca_medreac','varchar');
		$this->setParametro('nroserie_medreac','nroserie_medreac','varchar');
		$this->setParametro('multi_kwh','multi_kwh','numeric');
		$this->setParametro('multi_kvar','multi_kvar','numeric');
		$this->setParametro('multi_kw','multi_kw','numeric');
		$this->setParametro('nrodig_kwh','nrodig_kwh','int4');
		$this->setParametro('nrodig_kvar','nrodig_kvar','int4');
		$this->setParametro('fecha_hora_instala','fecha_hora_instala','timestamp');
		$this->setParametro('fases_1r','fases_1r','varchar');
		$this->setParametro('fases_2s','fases_2s','varchar');
		$this->setParametro('fases_3t','fases_3t','varchar');
		$this->setParametro('fases_n','fases_n','varchar');
		$this->setParametro('nroserie_med2','nroserie_med2','varchar');
		$this->setParametro('nroserie_cts2','nroserie_cts2','varchar');
		$this->setParametro('nroserie_medact2','nroserie_medact2','varchar');
		$this->setParametro('nroserie_medreac2','nroserie_medreac2','varchar');
		$this->setParametro('nro_precinto','nro_precinto','varchar');
		$this->setParametro('sw_activa','sw_activa','varchar');
		$this->setParametro('sw_libre','sw_libre','varchar');
		$this->setParametro('sw_bajatemp','sw_bajatemp','varchar');
		$this->setParametro('sw_bajadef','sw_bajadef','varchar');
		$this->setParametro('nroserie_pts2','nroserie_pts2','varchar');
		$this->setParametro('razon_social','razon_social','varchar');
		$this->setParametro('casada','casada','varchar');
		$this->setParametro('id_trafo','id_trafo','int4');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('mes_deuda','mes_deuda','varchar');
		$this->setParametro('sw_debito_fiscal','sw_debito_fiscal','varchar');
		$this->setParametro('id_ruta_b','id_ruta_b','int4');
		$this->setParametro('observaciones','observaciones','text');
		$this->setParametro('tipo_identificacion','tipo_identificacion','varchar');
		$this->setParametro('distancia_trafo','distancia_trafo','numeric');
		$this->setParametro('tipo_suministro','tipo_suministro','varchar');
		$this->setParametro('tipo_medicion','tipo_medicion','varchar');
		$this->setParametro('tipo_consumidor','tipo_consumidor','varchar');
		$this->setParametro('id_poste','id_poste','int4');
		$this->setParametro('dist_poste','dist_poste','float8');
		$this->setParametro('lug_expedido','lug_expedido','varchar');
		$this->setParametro('id_regional','id_regional','int4');
		$this->setParametro('coord_x','coord_x','numeric');
		$this->setParametro('coord_y','coord_y','numeric');
		$this->setParametro('coord_z','coord_z','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarCliente(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_cliente_ime';
		$this->transaccion='FACTUR_CLIENT_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cliente','id_cliente','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_categoria','id_categoria','int4');
		$this->setParametro('id_ruta','id_ruta','int4');
		$this->setParametro('id_param','id_param','int4');
		$this->setParametro('nro_cuenta','nro_cuenta','int4');
		$this->setParametro('nro_cuenta_ant','nro_cuenta_ant','varchar');
		$this->setParametro('cod_ubica','cod_ubica','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('paterno','paterno','varchar');
		$this->setParametro('materno','materno','varchar');
		$this->setParametro('doc_iden','doc_iden','varchar');
		$this->setParametro('fecha_naci','fecha_naci','date');
		$this->setParametro('telefono','telefono','int4');
		$this->setParametro('celular','celular','int4');
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('descripcion_dire','descripcion_dire','varchar');
		$this->setParametro('nomb_elec','nomb_elec','varchar');
		$this->setParametro('nombre_factura','nombre_factura','varchar');
		$this->setParametro('nro_nit','nro_nit','numeric');
		$this->setParametro('repre_legal','repre_legal','varchar');
		$this->setParametro('docid_legal','docid_legal','varchar');
		$this->setParametro('poten_instalada','poten_instalada','numeric');
		$this->setParametro('poten_contratada','poten_contratada','numeric');
		$this->setParametro('tension','tension','varchar');
		$this->setParametro('cod_transforma','cod_transforma','varchar');
		$this->setParametro('tipo_medidor','tipo_medidor','numeric');
		$this->setParametro('capacidad','capacidad','varchar');
		$this->setParametro('disyuntor','disyuntor','int4');
		$this->setParametro('relacion_cts1','relacion_cts1','numeric');
		$this->setParametro('relacion_cts2','relacion_cts2','numeric');
		$this->setParametro('relacion_pts1','relacion_pts1','numeric');
		$this->setParametro('relacion_pts2','relacion_pts2','numeric');
		$this->setParametro('importe_garantia','importe_garantia','numeric');
		$this->setParametro('importe_conex','importe_conex','numeric');
		$this->setParametro('marca_med','marca_med','varchar');
		$this->setParametro('nroserie_med','nroserie_med','varchar');
		$this->setParametro('nro_digitos','nro_digitos','int4');
		$this->setParametro('marca_cts','marca_cts','varchar');
		$this->setParametro('nroserie_cts','nroserie_cts','varchar');
		$this->setParametro('marca_pts','marca_pts','varchar');
		$this->setParametro('nroserie_pts','nroserie_pts','varchar');
		$this->setParametro('marca_medact','marca_medact','varchar');
		$this->setParametro('nroserie_medact','nroserie_medact','varchar');
		$this->setParametro('marca_medreac','marca_medreac','varchar');
		$this->setParametro('nroserie_medreac','nroserie_medreac','varchar');
		$this->setParametro('multi_kwh','multi_kwh','numeric');
		$this->setParametro('multi_kvar','multi_kvar','numeric');
		$this->setParametro('multi_kw','multi_kw','numeric');
		$this->setParametro('nrodig_kwh','nrodig_kwh','int4');
		$this->setParametro('nrodig_kvar','nrodig_kvar','int4');
		$this->setParametro('fecha_hora_instala','fecha_hora_instala','timestamp');
		$this->setParametro('fases_1r','fases_1r','varchar');
		$this->setParametro('fases_2s','fases_2s','varchar');
		$this->setParametro('fases_3t','fases_3t','varchar');
		$this->setParametro('fases_n','fases_n','varchar');
		$this->setParametro('nroserie_med2','nroserie_med2','varchar');
		$this->setParametro('nroserie_cts2','nroserie_cts2','varchar');
		$this->setParametro('nroserie_medact2','nroserie_medact2','varchar');
		$this->setParametro('nroserie_medreac2','nroserie_medreac2','varchar');
		$this->setParametro('nro_precinto','nro_precinto','varchar');
		$this->setParametro('sw_activa','sw_activa','varchar');
		$this->setParametro('sw_libre','sw_libre','varchar');
		$this->setParametro('sw_bajatemp','sw_bajatemp','varchar');
		$this->setParametro('sw_bajadef','sw_bajadef','varchar');
		$this->setParametro('nroserie_pts2','nroserie_pts2','varchar');
		$this->setParametro('razon_social','razon_social','varchar');
		$this->setParametro('casada','casada','varchar');
		$this->setParametro('id_trafo','id_trafo','int4');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('mes_deuda','mes_deuda','varchar');
		$this->setParametro('sw_debito_fiscal','sw_debito_fiscal','varchar');
		$this->setParametro('id_ruta_b','id_ruta_b','int4');
		$this->setParametro('observaciones','observaciones','text');
		$this->setParametro('tipo_identificacion','tipo_identificacion','varchar');
		$this->setParametro('distancia_trafo','distancia_trafo','numeric');
		$this->setParametro('tipo_suministro','tipo_suministro','varchar');
		$this->setParametro('tipo_medicion','tipo_medicion','varchar');
		$this->setParametro('tipo_consumidor','tipo_consumidor','varchar');
		$this->setParametro('id_poste','id_poste','int4');
		$this->setParametro('dist_poste','dist_poste','float8');
		$this->setParametro('lug_expedido','lug_expedido','varchar');
		$this->setParametro('id_regional','id_regional','int4');
		$this->setParametro('coord_x','coord_x','numeric');
		$this->setParametro('coord_y','coord_y','numeric');
		$this->setParametro('coord_z','coord_z','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarCliente(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_cliente_ime';
		$this->transaccion='FACTUR_CLIENT_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cliente','id_cliente','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>