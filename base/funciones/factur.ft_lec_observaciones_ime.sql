CREATE OR REPLACE FUNCTION "factur"."ft_lec_observaciones_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_lec_observaciones_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_observaciones'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:16:06
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:16:06								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_observaciones'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_lec_observacion	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_lec_observaciones_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_OBS_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:16:06
	***********************************/

	if(p_transaccion='FACTUR_LEC_OBS_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tlec_observaciones(
			observacion,
			lecturado,
			tipo_observacion,
			estado_reg,
			id_lectura,
			id_usuario_ai,
			usuario_ai,
			fecha_reg,
			id_usuario_reg,
			id_usuario_mod,
			fecha_mod
          	) values(
			v_parametros.observacion,
			v_parametros.lecturado,
			v_parametros.tipo_observacion,
			'activo',
			v_parametros.id_lectura,
			v_parametros._id_usuario_ai,
			v_parametros._nombre_usuario_ai,
			now(),
			p_id_usuario,
			null,
			null
							
			
			
			)RETURNING id_lec_observacion into v_id_lec_observacion;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Observaciones almacenado(a) con exito (id_lec_observacion'||v_id_lec_observacion||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lec_observacion',v_id_lec_observacion::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_OBS_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:16:06
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_OBS_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tlec_observaciones set
			observacion = v_parametros.observacion,
			lecturado = v_parametros.lecturado,
			tipo_observacion = v_parametros.tipo_observacion,
			id_lectura = v_parametros.id_lectura,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_lec_observacion=v_parametros.id_lec_observacion;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Observaciones modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lec_observacion',v_parametros.id_lec_observacion::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_OBS_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:16:06
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_OBS_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tlec_observaciones
            where id_lec_observacion=v_parametros.id_lec_observacion;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Observaciones eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lec_observacion',v_parametros.id_lec_observacion::varchar);
              
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
ALTER FUNCTION "factur"."ft_lec_observaciones_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
