CREATE OR REPLACE FUNCTION "factur"."ft_tasa_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_tasa_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.ttasa'
 AUTOR: 		 (admin)
 FECHA:	        15-11-2025 06:32:50
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				15-11-2025 06:32:50								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.ttasa'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_tasa	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_tasa_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_tasa_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 06:32:50
	***********************************/

	if(p_transaccion='FACTUR_tasa_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.ttasa(
			estado_reg,
			desc_tasa,
			tasa_porcen,
			id_param,
			fecha_reg,
			usuario_ai,
			id_usuario_reg,
			id_usuario_ai,
			id_usuario_mod,
			fecha_mod
          	) values(
			'activo',
			v_parametros.desc_tasa,
			v_parametros.tasa_porcen,
			v_parametros.id_param,
			now(),
			v_parametros._nombre_usuario_ai,
			p_id_usuario,
			v_parametros._id_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_tasa into v_id_tasa;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tasa almacenado(a) con exito (id_tasa'||v_id_tasa||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_tasa',v_id_tasa::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_tasa_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 06:32:50
	***********************************/

	elsif(p_transaccion='FACTUR_tasa_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.ttasa set
			desc_tasa = v_parametros.desc_tasa,
			tasa_porcen = v_parametros.tasa_porcen,
			id_param = v_parametros.id_param,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_tasa=v_parametros.id_tasa;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tasa modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_tasa',v_parametros.id_tasa::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_tasa_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 06:32:50
	***********************************/

	elsif(p_transaccion='FACTUR_tasa_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.ttasa
            where id_tasa=v_parametros.id_tasa;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tasa eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_tasa',v_parametros.id_tasa::varchar);
              
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
ALTER FUNCTION "factur"."ft_tasa_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
