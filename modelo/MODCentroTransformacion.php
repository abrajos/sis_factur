<?php
/**
*@package pXP
*@file gen-MODCentroTransformacion.php
*@author  (admin)
*@date 21-08-2025 03:23:25
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODCentroTransformacion extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarCentroTransformacion(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='factur.ft_centro_transformacion_sel';
		$this->transaccion='FACTUR_CEN_TRA_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_centro_tranformacion','int4');
		$this->captura('direccion','varchar');
		$this->captura('id_equipo_proteccion','int4');
		$this->captura('tension_primaria','varchar');
		$this->captura('caracteristica','varchar');
		$this->captura('tipo','varchar');
		$this->captura('relacion_cts','numeric');
		$this->captura('relacion_pts','numeric');
		$this->captura('tipo_propiedad','varchar');
		$this->captura('tipo_tension','varchar');
		$this->captura('propietario','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('tipo_uso','varchar');
		$this->captura('tension_secundaria','varchar');
		$this->captura('marca','varchar');
		$this->captura('codigo_centro','varchar');
		$this->captura('potencia','numeric');
		$this->captura('nivel_calidad','varchar');
		$this->captura('id_lugar','int4');
		$this->captura('nro_serie','varchar');
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
			
	function insertarCentroTransformacion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_centro_transformacion_ime';
		$this->transaccion='FACTUR_CEN_TRA_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('id_equipo_proteccion','id_equipo_proteccion','int4');
		$this->setParametro('tension_primaria','tension_primaria','varchar');
		$this->setParametro('caracteristica','caracteristica','varchar');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('relacion_cts','relacion_cts','numeric');
		$this->setParametro('relacion_pts','relacion_pts','numeric');
		$this->setParametro('tipo_propiedad','tipo_propiedad','varchar');
		$this->setParametro('tipo_tension','tipo_tension','varchar');
		$this->setParametro('propietario','propietario','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tipo_uso','tipo_uso','varchar');
		$this->setParametro('tension_secundaria','tension_secundaria','varchar');
		$this->setParametro('marca','marca','varchar');
		$this->setParametro('codigo_centro','codigo_centro','varchar');
		$this->setParametro('potencia','potencia','numeric');
		$this->setParametro('nivel_calidad','nivel_calidad','varchar');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('nro_serie','nro_serie','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarCentroTransformacion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_centro_transformacion_ime';
		$this->transaccion='FACTUR_CEN_TRA_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_centro_tranformacion','id_centro_tranformacion','int4');
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('id_equipo_proteccion','id_equipo_proteccion','int4');
		$this->setParametro('tension_primaria','tension_primaria','varchar');
		$this->setParametro('caracteristica','caracteristica','varchar');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('relacion_cts','relacion_cts','numeric');
		$this->setParametro('relacion_pts','relacion_pts','numeric');
		$this->setParametro('tipo_propiedad','tipo_propiedad','varchar');
		$this->setParametro('tipo_tension','tipo_tension','varchar');
		$this->setParametro('propietario','propietario','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tipo_uso','tipo_uso','varchar');
		$this->setParametro('tension_secundaria','tension_secundaria','varchar');
		$this->setParametro('marca','marca','varchar');
		$this->setParametro('codigo_centro','codigo_centro','varchar');
		$this->setParametro('potencia','potencia','numeric');
		$this->setParametro('nivel_calidad','nivel_calidad','varchar');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('nro_serie','nro_serie','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarCentroTransformacion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='factur.ft_centro_transformacion_ime';
		$this->transaccion='FACTUR_CEN_TRA_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_centro_tranformacion','id_centro_tranformacion','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>