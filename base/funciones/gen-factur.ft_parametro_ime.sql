CREATE OR REPLACE FUNCTION "factur"."ft_parametro_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_parametro_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tparametro'
 AUTOR: 		 (admin)
 FECHA:	        06-11-2025 20:26:28
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				06-11-2025 20:26:28								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tparametro'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_param	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_parametro_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_PARAME_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		06-11-2025 20:26:28
	***********************************/

	if(p_transaccion='FACTUR_PARAME_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tparametro(
			nro_servicio,
			sis_facturacion_cobranza,
			telefono_sucursal,
			periodo,
			gestion,
			id_moneda,
			nro_sucursal_distribucion,
			nro_venta,
			nro_cuenta,
			id_depto_regional,
			nro_reclamo_02,
			nro_reclamo_03,
			nro_contrato,
			telefono_odeco,
			celular_odeco,
			ubicacion_sucursal,
			ci_tramite,
			nro_recibo,
			representante,
			estado_reg,
			ciudad,
			codigo_sistema,
			lugar,
			direccion_sucursal,
			tasa_interes,
			cod_empresa,
			id_fina_regi_prog_proy_acti,
			tiene_caja,
			firma_tramite,
			nro_tramite,
			doc_iden,
			id_usuario_ai,
			fecha_reg,
			usuario_ai,
			id_usuario_reg,
			id_usuario_mod,
			fecha_mod
          	) values(
			v_parametros.nro_servicio,
			v_parametros.sis_facturacion_cobranza,
			v_parametros.telefono_sucursal,
			v_parametros.periodo,
			v_parametros.gestion,
			v_parametros.id_moneda,
			v_parametros.nro_sucursal_distribucion,
			v_parametros.nro_venta,
			v_parametros.nro_cuenta,
			v_parametros.id_depto_regional,
			v_parametros.nro_reclamo_02,
			v_parametros.nro_reclamo_03,
			v_parametros.nro_contrato,
			v_parametros.telefono_odeco,
			v_parametros.celular_odeco,
			v_parametros.ubicacion_sucursal,
			v_parametros.ci_tramite,
			v_parametros.nro_recibo,
			v_parametros.representante,
			'activo',
			v_parametros.ciudad,
			v_parametros.codigo_sistema,
			v_parametros.lugar,
			v_parametros.direccion_sucursal,
			v_parametros.tasa_interes,
			v_parametros.cod_empresa,
			v_parametros.id_fina_regi_prog_proy_acti,
			v_parametros.tiene_caja,
			v_parametros.firma_tramite,
			v_parametros.nro_tramite,
			v_parametros.doc_iden,
			v_parametros._id_usuario_ai,
			now(),
			v_parametros._nombre_usuario_ai,
			p_id_usuario,
			null,
			null
							
			
			
			)RETURNING id_param into v_id_param;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Parametro almacenado(a) con exito (id_param'||v_id_param||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_param',v_id_param::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_PARAME_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		06-11-2025 20:26:28
	***********************************/

	elsif(p_transaccion='FACTUR_PARAME_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tparametro set
			nro_servicio = v_parametros.nro_servicio,
			sis_facturacion_cobranza = v_parametros.sis_facturacion_cobranza,
			telefono_sucursal = v_parametros.telefono_sucursal,
			periodo = v_parametros.periodo,
			gestion = v_parametros.gestion,
			id_moneda = v_parametros.id_moneda,
			nro_sucursal_distribucion = v_parametros.nro_sucursal_distribucion,
			nro_venta = v_parametros.nro_venta,
			nro_cuenta = v_parametros.nro_cuenta,
			id_depto_regional = v_parametros.id_depto_regional,
			nro_reclamo_02 = v_parametros.nro_reclamo_02,
			nro_reclamo_03 = v_parametros.nro_reclamo_03,
			nro_contrato = v_parametros.nro_contrato,
			telefono_odeco = v_parametros.telefono_odeco,
			celular_odeco = v_parametros.celular_odeco,
			ubicacion_sucursal = v_parametros.ubicacion_sucursal,
			ci_tramite = v_parametros.ci_tramite,
			nro_recibo = v_parametros.nro_recibo,
			representante = v_parametros.representante,
			ciudad = v_parametros.ciudad,
			codigo_sistema = v_parametros.codigo_sistema,
			lugar = v_parametros.lugar,
			direccion_sucursal = v_parametros.direccion_sucursal,
			tasa_interes = v_parametros.tasa_interes,
			cod_empresa = v_parametros.cod_empresa,
			id_fina_regi_prog_proy_acti = v_parametros.id_fina_regi_prog_proy_acti,
			tiene_caja = v_parametros.tiene_caja,
			firma_tramite = v_parametros.firma_tramite,
			nro_tramite = v_parametros.nro_tramite,
			doc_iden = v_parametros.doc_iden,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_param=v_parametros.id_param;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Parametro modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_param',v_parametros.id_param::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_PARAME_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		06-11-2025 20:26:28
	***********************************/

	elsif(p_transaccion='FACTUR_PARAME_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tparametro
            where id_param=v_parametros.id_param;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Parametro eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_param',v_parametros.id_param::varchar);
              
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
ALTER FUNCTION "factur"."ft_parametro_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
