CREATE OR REPLACE FUNCTION "factur"."ft_lec_cambio_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_lec_cambio_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_cambio'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:18:24
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:18:24								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_cambio'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_cambio	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_lec_cambio_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_CAM_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:18:24
	***********************************/

	if(p_transaccion='FACTUR_LEC_CAM_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tlec_cambio(
			estado_reg,
			consumo_cambio,
			fecha_cambio,
			lec_anterior,
			lec_cambio,
			id_lectura,
			tipo_cambio,
			id_usuario_reg,
			usuario_ai,
			fecha_reg,
			id_usuario_ai,
			id_usuario_mod,
			fecha_mod
          	) values(
			'activo',
			v_parametros.consumo_cambio,
			v_parametros.fecha_cambio,
			v_parametros.lec_anterior,
			v_parametros.lec_cambio,
			v_parametros.id_lectura,
			v_parametros.tipo_cambio,
			p_id_usuario,
			v_parametros._nombre_usuario_ai,
			now(),
			v_parametros._id_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_cambio into v_id_cambio;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Cambio almacenado(a) con exito (id_cambio'||v_id_cambio||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_cambio',v_id_cambio::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_CAM_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:18:24
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_CAM_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tlec_cambio set
			consumo_cambio = v_parametros.consumo_cambio,
			fecha_cambio = v_parametros.fecha_cambio,
			lec_anterior = v_parametros.lec_anterior,
			lec_cambio = v_parametros.lec_cambio,
			id_lectura = v_parametros.id_lectura,
			tipo_cambio = v_parametros.tipo_cambio,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_cambio=v_parametros.id_cambio;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Cambio modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_cambio',v_parametros.id_cambio::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_CAM_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:18:24
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_CAM_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tlec_cambio
            where id_cambio=v_parametros.id_cambio;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Cambio eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_cambio',v_parametros.id_cambio::varchar);
              
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
ALTER FUNCTION "factur"."ft_lec_cambio_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
