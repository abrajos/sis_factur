CREATE OR REPLACE FUNCTION "factur"."ft_clie_tasa_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_clie_tasa_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tclie_tasa'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:21:26
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:21:26								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tclie_tasa'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_clie_tasa	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_clie_tasa_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLI_TAS_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:21:26
	***********************************/

	if(p_transaccion='FACTUR_CLI_TAS_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tclie_tasa(
			id_cliente,
			id_tasa,
			sw_aplica,
			estado_reg,
			id_usuario_ai,
			usuario_ai,
			fecha_reg,
			id_usuario_reg,
			fecha_mod,
			id_usuario_mod
          	) values(
			v_parametros.id_cliente,
			v_parametros.id_tasa,
			v_parametros.sw_aplica,
			'activo',
			v_parametros._id_usuario_ai,
			v_parametros._nombre_usuario_ai,
			now(),
			p_id_usuario,
			null,
			null
							
			
			
			)RETURNING id_clie_tasa into v_id_clie_tasa;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Cliente Tasa almacenado(a) con exito (id_clie_tasa'||v_id_clie_tasa||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_clie_tasa',v_id_clie_tasa::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLI_TAS_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:21:26
	***********************************/

	elsif(p_transaccion='FACTUR_CLI_TAS_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tclie_tasa set
			id_cliente = v_parametros.id_cliente,
			id_tasa = v_parametros.id_tasa,
			sw_aplica = v_parametros.sw_aplica,
			fecha_mod = now(),
			id_usuario_mod = p_id_usuario,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_clie_tasa=v_parametros.id_clie_tasa;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Cliente Tasa modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_clie_tasa',v_parametros.id_clie_tasa::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLI_TAS_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:21:26
	***********************************/

	elsif(p_transaccion='FACTUR_CLI_TAS_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tclie_tasa
            where id_clie_tasa=v_parametros.id_clie_tasa;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Cliente Tasa eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_clie_tasa',v_parametros.id_clie_tasa::varchar);
              
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
ALTER FUNCTION "factur"."ft_clie_tasa_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
