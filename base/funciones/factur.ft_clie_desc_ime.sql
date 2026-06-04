CREATE OR REPLACE FUNCTION "factur"."ft_clie_desc_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_clie_desc_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tclie_desc'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:22:58
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:22:58								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tclie_desc'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_clie_desc	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_clie_desc_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLI_DSC_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:22:58
	***********************************/

	if(p_transaccion='FACTUR_CLI_DSC_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tclie_desc(
			estado_reg,
			id_descuento,
			id_cliente,
			id_usuario_reg,
			fecha_reg,
			usuario_ai,
			id_usuario_ai,
			id_usuario_mod,
			fecha_mod
          	) values(
			'activo',
			v_parametros.id_descuento,
			v_parametros.id_cliente,
			p_id_usuario,
			now(),
			v_parametros._nombre_usuario_ai,
			v_parametros._id_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_clie_desc into v_id_clie_desc;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Cliente Descuento almacenado(a) con exito (id_clie_desc'||v_id_clie_desc||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_clie_desc',v_id_clie_desc::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLI_DSC_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:22:58
	***********************************/

	elsif(p_transaccion='FACTUR_CLI_DSC_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tclie_desc set
			id_descuento = v_parametros.id_descuento,
			id_cliente = v_parametros.id_cliente,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_clie_desc=v_parametros.id_clie_desc;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Cliente Descuento modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_clie_desc',v_parametros.id_clie_desc::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLI_DSC_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:22:58
	***********************************/

	elsif(p_transaccion='FACTUR_CLI_DSC_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tclie_desc
            where id_clie_desc=v_parametros.id_clie_desc;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Cliente Descuento eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_clie_desc',v_parametros.id_clie_desc::varchar);
              
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
ALTER FUNCTION "factur"."ft_clie_desc_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
