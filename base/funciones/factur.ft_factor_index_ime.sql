CREATE OR REPLACE FUNCTION "factur"."ft_factor_index_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_factor_index_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tfactor_index'
 AUTOR: 		 (admin)
 FECHA:	        15-11-2025 03:44:05
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				15-11-2025 03:44:05								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tfactor_index'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_fac_index	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_factor_index_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_facind_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 03:44:05
	***********************************/

	if(p_transaccion='FACTUR_facind_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tfactor_index(
			gestion,
			valor_index,
			periodo,
			valor_index_2,
			estado_reg,
			id_param,
			id_usuario_ai,
			id_usuario_reg,
			fecha_reg,
			usuario_ai,
			id_usuario_mod,
			fecha_mod
          	) values(
			v_parametros.gestion,
			v_parametros.valor_index,
			v_parametros.periodo,
			v_parametros.valor_index_2,
			'activo',
			v_parametros.id_param,
			v_parametros._id_usuario_ai,
			p_id_usuario,
			now(),
			v_parametros._nombre_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_fac_index into v_id_fac_index;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Factor Indexación almacenado(a) con exito (id_fac_index'||v_id_fac_index||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_fac_index',v_id_fac_index::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_facind_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 03:44:05
	***********************************/

	elsif(p_transaccion='FACTUR_facind_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tfactor_index set
			gestion = v_parametros.gestion,
			valor_index = v_parametros.valor_index,
			periodo = v_parametros.periodo,
			valor_index_2 = v_parametros.valor_index_2,
			id_param = v_parametros.id_param,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_fac_index=v_parametros.id_fac_index;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Factor Indexación modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_fac_index',v_parametros.id_fac_index::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_facind_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 03:44:05
	***********************************/

	elsif(p_transaccion='FACTUR_facind_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tfactor_index
            where id_fac_index=v_parametros.id_fac_index;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Factor Indexación eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_fac_index',v_parametros.id_fac_index::varchar);
              
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
ALTER FUNCTION "factur"."ft_factor_index_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
