CREATE OR REPLACE FUNCTION "factur"."ft_lectura_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_lectura_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlectura'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 02:52:40
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 02:52:40								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlectura'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_lectura	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_lectura_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_LECTUR_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:40
	***********************************/

	if(p_transaccion='FACTUR_LECTUR_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tlectura(
			id_categoria,
			id_cliente,
			potencia_val,
			fecha_proxmed,
			fecha_proxemi,
			consumo_total,
			nro_digitos,
			lecant_kvar,
			saldo_credito,
			consumo_val,
			tipo_lectura,
			lectura_kwh,
			lecant_kwh,
			periodo_corte,
			conexion_val,
			cod_ubica,
			nrodig_kwh,
			consumo_cambio,
			lectura_kvar,
			importe_dev,
			nro_cuenta,
			reconex_val,
			potencia_contratada,
			restitucion,
			fecha_vence,
			credito_pagado,
			saldo_imp_dev_ap,
			factor_potencia,
			lectura_anterior,
			promedio_val,
			cambio_kvar,
			cantidad_periodo,
			sw_debito_fiscal,
			id_lectura_fk,
			multi_kwh,
			ultima_lectura,
			fecha_anterior,
			nrodig_kvar,
			importe_dev_ap,
			consumo_peri,
			desc_restitucion,
			multi_kw,
			importe_total,
			consumo_anterior,
			gestion_lec,
			sw_potencia_maxima,
			saldo_imp_dev,
			consumo_dev,
			periodo_lec,
			multi_kvar,
			importe_interes,
			lectura_kw,
			lectura_actual,
			fecha_actual
          	) values(
			v_parametros.id_categoria,
			v_parametros.id_cliente,
			v_parametros.potencia_val,
			v_parametros.fecha_proxmed,
			v_parametros.fecha_proxemi,
			v_parametros.consumo_total,
			v_parametros.nro_digitos,
			v_parametros.lecant_kvar,
			v_parametros.saldo_credito,
			v_parametros.consumo_val,
			v_parametros.tipo_lectura,
			v_parametros.lectura_kwh,
			v_parametros.lecant_kwh,
			v_parametros.periodo_corte,
			v_parametros.conexion_val,
			v_parametros.cod_ubica,
			v_parametros.nrodig_kwh,
			v_parametros.consumo_cambio,
			v_parametros.lectura_kvar,
			v_parametros.importe_dev,
			v_parametros.nro_cuenta,
			v_parametros.reconex_val,
			v_parametros.potencia_contratada,
			v_parametros.restitucion,
			v_parametros.fecha_vence,
			v_parametros.credito_pagado,
			v_parametros.saldo_imp_dev_ap,
			v_parametros.factor_potencia,
			v_parametros.lectura_anterior,
			v_parametros.promedio_val,
			v_parametros.cambio_kvar,
			v_parametros.cantidad_periodo,
			v_parametros.sw_debito_fiscal,
			v_parametros.id_lectura_fk,
			v_parametros.multi_kwh,
			v_parametros.ultima_lectura,
			v_parametros.fecha_anterior,
			v_parametros.nrodig_kvar,
			v_parametros.importe_dev_ap,
			v_parametros.consumo_peri,
			v_parametros.desc_restitucion,
			v_parametros.multi_kw,
			v_parametros.importe_total,
			v_parametros.consumo_anterior,
			v_parametros.gestion_lec,
			v_parametros.sw_potencia_maxima,
			v_parametros.saldo_imp_dev,
			v_parametros.consumo_dev,
			v_parametros.periodo_lec,
			v_parametros.multi_kvar,
			v_parametros.importe_interes,
			v_parametros.lectura_kw,
			v_parametros.lectura_actual,
			v_parametros.fecha_actual
							
			
			
			)RETURNING id_lectura into v_id_lectura;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura almacenado(a) con exito (id_lectura'||v_id_lectura||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lectura',v_id_lectura::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LECTUR_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:40
	***********************************/

	elsif(p_transaccion='FACTUR_LECTUR_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tlectura set
			id_categoria = v_parametros.id_categoria,
			id_cliente = v_parametros.id_cliente,
			potencia_val = v_parametros.potencia_val,
			fecha_proxmed = v_parametros.fecha_proxmed,
			fecha_proxemi = v_parametros.fecha_proxemi,
			consumo_total = v_parametros.consumo_total,
			nro_digitos = v_parametros.nro_digitos,
			lecant_kvar = v_parametros.lecant_kvar,
			saldo_credito = v_parametros.saldo_credito,
			consumo_val = v_parametros.consumo_val,
			tipo_lectura = v_parametros.tipo_lectura,
			lectura_kwh = v_parametros.lectura_kwh,
			lecant_kwh = v_parametros.lecant_kwh,
			periodo_corte = v_parametros.periodo_corte,
			conexion_val = v_parametros.conexion_val,
			cod_ubica = v_parametros.cod_ubica,
			nrodig_kwh = v_parametros.nrodig_kwh,
			consumo_cambio = v_parametros.consumo_cambio,
			lectura_kvar = v_parametros.lectura_kvar,
			importe_dev = v_parametros.importe_dev,
			nro_cuenta = v_parametros.nro_cuenta,
			reconex_val = v_parametros.reconex_val,
			potencia_contratada = v_parametros.potencia_contratada,
			restitucion = v_parametros.restitucion,
			fecha_vence = v_parametros.fecha_vence,
			credito_pagado = v_parametros.credito_pagado,
			saldo_imp_dev_ap = v_parametros.saldo_imp_dev_ap,
			factor_potencia = v_parametros.factor_potencia,
			lectura_anterior = v_parametros.lectura_anterior,
			promedio_val = v_parametros.promedio_val,
			cambio_kvar = v_parametros.cambio_kvar,
			cantidad_periodo = v_parametros.cantidad_periodo,
			sw_debito_fiscal = v_parametros.sw_debito_fiscal,
			id_lectura_fk = v_parametros.id_lectura_fk,
			multi_kwh = v_parametros.multi_kwh,
			ultima_lectura = v_parametros.ultima_lectura,
			fecha_anterior = v_parametros.fecha_anterior,
			nrodig_kvar = v_parametros.nrodig_kvar,
			importe_dev_ap = v_parametros.importe_dev_ap,
			consumo_peri = v_parametros.consumo_peri,
			desc_restitucion = v_parametros.desc_restitucion,
			multi_kw = v_parametros.multi_kw,
			importe_total = v_parametros.importe_total,
			consumo_anterior = v_parametros.consumo_anterior,
			gestion_lec = v_parametros.gestion_lec,
			sw_potencia_maxima = v_parametros.sw_potencia_maxima,
			saldo_imp_dev = v_parametros.saldo_imp_dev,
			consumo_dev = v_parametros.consumo_dev,
			periodo_lec = v_parametros.periodo_lec,
			multi_kvar = v_parametros.multi_kvar,
			importe_interes = v_parametros.importe_interes,
			lectura_kw = v_parametros.lectura_kw,
			lectura_actual = v_parametros.lectura_actual,
			fecha_actual = v_parametros.fecha_actual,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_lectura=v_parametros.id_lectura;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lectura',v_parametros.id_lectura::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LECTUR_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:40
	***********************************/

	elsif(p_transaccion='FACTUR_LECTUR_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tlectura
            where id_lectura=v_parametros.id_lectura;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lectura',v_parametros.id_lectura::varchar);
              
            --Devuelve la respuesta
            return v_resp;

		end;
         
	else
     
    	raise exception 'Transaccion inexistente: %',p_transaccion;

	end if;

EXCEPTION
				
	WHEN OTHERS THEN
		v_resp='';
		v_resp = pxp.f_agrega_clave(v_resp,'mensaje',SQLERRM);
		v_resp = pxp.f_agrega_clave(v_resp,'codigo_error',SQLSTATE);
		v_resp = pxp.f_agrega_clave(v_resp,'procedimientos',v_nombre_funcion);
		raise exception '%',v_resp;
				        
END;
$BODY$
LANGUAGE 'plpgsql' VOLATILE
COST 100;
ALTER FUNCTION "factur"."ft_lectura_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
