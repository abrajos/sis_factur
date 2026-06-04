CREATE OR REPLACE FUNCTION "factur"."ft_regional_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_regional_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tregional'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:14:59
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:14:59								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tregional'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_regional	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_regional_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_REG_ION_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:14:59
	***********************************/

	if(p_transaccion='FACTUR_REG_ION_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tregional(
			estado_reg,
			nombre_regional,
			direccion,
			estado,
			sw_debito_fiscal,
			id_usuario_reg,
			fecha_reg,
			id_usuario_ai,
			usuario_ai,
			id_usuario_mod,
			fecha_mod
          	) values(
			'activo',
			v_parametros.nombre_regional,
			v_parametros.direccion,
			v_parametros.estado,
			v_parametros.sw_debito_fiscal,
			p_id_usuario,
			now(),
			v_parametros._id_usuario_ai,
			v_parametros._nombre_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_regional into v_id_regional;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Regional almacenado(a) con exito (id_regional'||v_id_regional||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_regional',v_id_regional::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_REG_ION_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:14:59
	***********************************/

	elsif(p_transaccion='FACTUR_REG_ION_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tregional set
			nombre_regional = v_parametros.nombre_regional,
			direccion = v_parametros.direccion,
			estado = v_parametros.estado,
			sw_debito_fiscal = v_parametros.sw_debito_fiscal,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_regional=v_parametros.id_regional;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Regional modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_regional',v_parametros.id_regional::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_REG_ION_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:14:59
	***********************************/

	elsif(p_transaccion='FACTUR_REG_ION_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tregional
            where id_regional=v_parametros.id_regional;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Regional eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_regional',v_parametros.id_regional::varchar);
              
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
ALTER FUNCTION "factur"."ft_regional_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
