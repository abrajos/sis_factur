CREATE OR REPLACE FUNCTION "factur"."ft_tramite_log_fs_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_tramite_log_fs_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.ttramite_log_fs'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:12:58
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:12:58								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.ttramite_log_fs'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_log_fs	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_tramite_log_fs_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_TRA_LOG_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:12:58
	***********************************/

	if(p_transaccion='FACTUR_TRA_LOG_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.ttramite_log_fs(
			fecha_cambio,
			fecha_solicitud_anterior,
			motivo_cambio_fecha,
			estado_reg,
			usuario,
			id_nro_tramite,
			id_usuario_ai,
			usuario_ai,
			fecha_reg,
			id_usuario_reg,
			id_usuario_mod,
			fecha_mod
          	) values(
			v_parametros.fecha_cambio,
			v_parametros.fecha_solicitud_anterior,
			v_parametros.motivo_cambio_fecha,
			'activo',
			v_parametros.usuario,
			v_parametros.id_nro_tramite,
			v_parametros._id_usuario_ai,
			v_parametros._nombre_usuario_ai,
			now(),
			p_id_usuario,
			null,
			null
							
			
			
			)RETURNING id_log_fs into v_id_log_fs;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tramite Log almacenado(a) con exito (id_log_fs'||v_id_log_fs||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_log_fs',v_id_log_fs::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_TRA_LOG_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:12:58
	***********************************/

	elsif(p_transaccion='FACTUR_TRA_LOG_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.ttramite_log_fs set
			fecha_cambio = v_parametros.fecha_cambio,
			fecha_solicitud_anterior = v_parametros.fecha_solicitud_anterior,
			motivo_cambio_fecha = v_parametros.motivo_cambio_fecha,
			usuario = v_parametros.usuario,
			id_nro_tramite = v_parametros.id_nro_tramite,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_log_fs=v_parametros.id_log_fs;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tramite Log modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_log_fs',v_parametros.id_log_fs::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_TRA_LOG_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:12:58
	***********************************/

	elsif(p_transaccion='FACTUR_TRA_LOG_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.ttramite_log_fs
            where id_log_fs=v_parametros.id_log_fs;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tramite Log eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_log_fs',v_parametros.id_log_fs::varchar);
              
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
ALTER FUNCTION "factur"."ft_tramite_log_fs_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
