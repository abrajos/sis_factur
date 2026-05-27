CREATE OR REPLACE FUNCTION "factur"."ft_origen_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_origen_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.torigen'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 02:52:37
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 02:52:37								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.torigen'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_origen	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_origen_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_ORIGEN_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:37
	***********************************/

	if(p_transaccion='FACTUR_ORIGEN_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.torigen(
			fk_id_origen,
			tipo,
			estado,
			id_usr_reg,
			codigo,
			id_usr_mod,
			descripcion_origen,
			fecha_reg,
			fecha_mod
          	) values(
			v_parametros.fk_id_origen,
			v_parametros.tipo,
			v_parametros.estado,
			v_parametros.id_usr_reg,
			v_parametros.codigo,
			v_parametros.id_usr_mod,
			v_parametros.descripcion_origen,
			now(),
			null
							
			
			
			)RETURNING id_origen into v_id_origen;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Origen almacenado(a) con exito (id_origen'||v_id_origen||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_origen',v_id_origen::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_ORIGEN_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:37
	***********************************/

	elsif(p_transaccion='FACTUR_ORIGEN_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.torigen set
			fk_id_origen = v_parametros.fk_id_origen,
			tipo = v_parametros.tipo,
			estado = v_parametros.estado,
			id_usr_reg = v_parametros.id_usr_reg,
			codigo = v_parametros.codigo,
			id_usr_mod = v_parametros.id_usr_mod,
			descripcion_origen = v_parametros.descripcion_origen,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_origen=v_parametros.id_origen;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Origen modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_origen',v_parametros.id_origen::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_ORIGEN_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:37
	***********************************/

	elsif(p_transaccion='FACTUR_ORIGEN_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.torigen
            where id_origen=v_parametros.id_origen;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Origen eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_origen',v_parametros.id_origen::varchar);
              
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
ALTER FUNCTION "factur"."ft_origen_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
