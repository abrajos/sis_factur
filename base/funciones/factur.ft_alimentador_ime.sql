CREATE OR REPLACE FUNCTION "factur"."ft_alimentador_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_alimentador_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.talimentador'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:54:38
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:54:38								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.talimentador'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_alimentador	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_alimentador_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_ALIMEN_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:54:38
	***********************************/

	if(p_transaccion='FACTUR_ALIMEN_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.talimentador(
			id_subestacion,
			tension_operacion,
			estado_reg,
			cod_alimentador,
			id_usuario_ai,
			usuario_ai,
			fecha_reg,
			id_usuario_reg,
			id_usuario_mod,
			fecha_mod
          	) values(
			v_parametros.id_subestacion,
			v_parametros.tension_operacion,
			'activo',
			v_parametros.cod_alimentador,
			v_parametros._id_usuario_ai,
			v_parametros._nombre_usuario_ai,
			now(),
			p_id_usuario,
			null,
			null
							
			
			
			)RETURNING id_alimentador into v_id_alimentador;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Alimentador almacenado(a) con exito (id_alimentador'||v_id_alimentador||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_alimentador',v_id_alimentador::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_ALIMEN_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:54:38
	***********************************/

	elsif(p_transaccion='FACTUR_ALIMEN_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.talimentador set
			id_subestacion = v_parametros.id_subestacion,
			tension_operacion = v_parametros.tension_operacion,
			cod_alimentador = v_parametros.cod_alimentador,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_alimentador=v_parametros.id_alimentador;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Alimentador modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_alimentador',v_parametros.id_alimentador::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_ALIMEN_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:54:38
	***********************************/

	elsif(p_transaccion='FACTUR_ALIMEN_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.talimentador
            where id_alimentador=v_parametros.id_alimentador;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Alimentador eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_alimentador',v_parametros.id_alimentador::varchar);
              
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
ALTER FUNCTION "factur"."ft_alimentador_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
