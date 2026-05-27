CREATE OR REPLACE FUNCTION "factur"."ft_parametro_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_parametro_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tparametro'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 02:52:33
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 02:52:33								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tparametro'	
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
 	#FECHA:		21-08-2025 02:52:33
	***********************************/

	if(p_transaccion='FACTUR_PARAME_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tparametro(
			tasa_interes,
			telefono_sucursal,
			nro_reclamo_03,
			nro_cuenta,
			gestion,
			lugar,
			doc_iden,
			nro_reclamo_02,
			nro_contrato,
			nro_servicio,
			id_fina_regi_prog_proy_acti,
			nro_venta,
			celular_odeco,
			ci_tramite,
			sis_facturacion_cobranza,
			ubicacion_sucursal,
			nro_sucursal_distribucion,
			id_depto_regional,
			nro_tramite,
			id_moneda,
			representante,
			codigo_sistema,
			firma_tramite,
			direccion_sucursal,
			periodo,
			ciudad,
			tiene_caja,
			nro_recibo,
			telefono_odeco,
			cod_empresa
          	) values(
			v_parametros.tasa_interes,
			v_parametros.telefono_sucursal,
			v_parametros.nro_reclamo_03,
			v_parametros.nro_cuenta,
			v_parametros.gestion,
			v_parametros.lugar,
			v_parametros.doc_iden,
			v_parametros.nro_reclamo_02,
			v_parametros.nro_contrato,
			v_parametros.nro_servicio,
			v_parametros.id_fina_regi_prog_proy_acti,
			v_parametros.nro_venta,
			v_parametros.celular_odeco,
			v_parametros.ci_tramite,
			v_parametros.sis_facturacion_cobranza,
			v_parametros.ubicacion_sucursal,
			v_parametros.nro_sucursal_distribucion,
			v_parametros.id_depto_regional,
			v_parametros.nro_tramite,
			v_parametros.id_moneda,
			v_parametros.representante,
			v_parametros.codigo_sistema,
			v_parametros.firma_tramite,
			v_parametros.direccion_sucursal,
			v_parametros.periodo,
			v_parametros.ciudad,
			v_parametros.tiene_caja,
			v_parametros.nro_recibo,
			v_parametros.telefono_odeco,
			v_parametros.cod_empresa
							
			
			
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
 	#FECHA:		21-08-2025 02:52:33
	***********************************/

	elsif(p_transaccion='FACTUR_PARAME_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tparametro set
			tasa_interes = v_parametros.tasa_interes,
			telefono_sucursal = v_parametros.telefono_sucursal,
			nro_reclamo_03 = v_parametros.nro_reclamo_03,
			nro_cuenta = v_parametros.nro_cuenta,
			gestion = v_parametros.gestion,
			lugar = v_parametros.lugar,
			doc_iden = v_parametros.doc_iden,
			nro_reclamo_02 = v_parametros.nro_reclamo_02,
			nro_contrato = v_parametros.nro_contrato,
			nro_servicio = v_parametros.nro_servicio,
			id_fina_regi_prog_proy_acti = v_parametros.id_fina_regi_prog_proy_acti,
			nro_venta = v_parametros.nro_venta,
			celular_odeco = v_parametros.celular_odeco,
			ci_tramite = v_parametros.ci_tramite,
			sis_facturacion_cobranza = v_parametros.sis_facturacion_cobranza,
			ubicacion_sucursal = v_parametros.ubicacion_sucursal,
			nro_sucursal_distribucion = v_parametros.nro_sucursal_distribucion,
			id_depto_regional = v_parametros.id_depto_regional,
			nro_tramite = v_parametros.nro_tramite,
			id_moneda = v_parametros.id_moneda,
			representante = v_parametros.representante,
			codigo_sistema = v_parametros.codigo_sistema,
			firma_tramite = v_parametros.firma_tramite,
			direccion_sucursal = v_parametros.direccion_sucursal,
			periodo = v_parametros.periodo,
			ciudad = v_parametros.ciudad,
			tiene_caja = v_parametros.tiene_caja,
			nro_recibo = v_parametros.nro_recibo,
			telefono_odeco = v_parametros.telefono_odeco,
			cod_empresa = v_parametros.cod_empresa,
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
 	#FECHA:		21-08-2025 02:52:33
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
