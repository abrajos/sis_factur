CREATE OR REPLACE FUNCTION "factur"."ft_causa_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_causa_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tcausa'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 02:52:29
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 02:52:29								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tcausa'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_causa	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_causa_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_CAUSA_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:29
	***********************************/

	if(p_transaccion='FACTUR_CAUSA_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tcausa(
			fk_id_causa,
			id_usr_reg,
			id_usr_mod,
			codigo,
			descripcion_causa,
			tipo,
			estado,
			fecha_reg,
			fecha_mod
          	) values(
			v_parametros.fk_id_causa,
			v_parametros.id_usr_reg,
			v_parametros.id_usr_mod,
			v_parametros.codigo,
			v_parametros.descripcion_causa,
			v_parametros.tipo,
			v_parametros.estado,
			now(),
			null
							
			
			
			)RETURNING id_causa into v_id_causa;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Causa almacenado(a) con exito (id_causa'||v_id_causa||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_causa',v_id_causa::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CAUSA_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:29
	***********************************/

	elsif(p_transaccion='FACTUR_CAUSA_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tcausa set
			fk_id_causa = v_parametros.fk_id_causa,
			id_usr_reg = v_parametros.id_usr_reg,
			id_usr_mod = v_parametros.id_usr_mod,
			codigo = v_parametros.codigo,
			descripcion_causa = v_parametros.descripcion_causa,
			tipo = v_parametros.tipo,
			estado = v_parametros.estado,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_causa=v_parametros.id_causa;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Causa modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_causa',v_parametros.id_causa::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CAUSA_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:29
	***********************************/

	elsif(p_transaccion='FACTUR_CAUSA_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tcausa
            where id_causa=v_parametros.id_causa;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Causa eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_causa',v_parametros.id_causa::varchar);
              
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
ALTER FUNCTION "factur"."ft_causa_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
