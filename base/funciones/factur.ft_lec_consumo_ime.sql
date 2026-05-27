CREATE OR REPLACE FUNCTION "factur"."ft_lec_consumo_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_lec_consumo_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_consumo'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:17:48
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:17:48								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_consumo'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_lec_consumo	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_lec_consumo_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_CON_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:17:48
	***********************************/

	if(p_transaccion='FACTUR_LEC_CON_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tlec_consumo(
			id_cliente,
			consumo5,
			consumo3,
			consumo1,
			consumo2,
			estado_reg,
			consumo4,
			consumo6,
			id_usuario_ai,
			id_usuario_reg,
			usuario_ai,
			fecha_reg,
			fecha_mod,
			id_usuario_mod
          	) values(
			v_parametros.id_cliente,
			v_parametros.consumo5,
			v_parametros.consumo3,
			v_parametros.consumo1,
			v_parametros.consumo2,
			'activo',
			v_parametros.consumo4,
			v_parametros.consumo6,
			v_parametros._id_usuario_ai,
			p_id_usuario,
			v_parametros._nombre_usuario_ai,
			now(),
			null,
			null
							
			
			
			)RETURNING id_lec_consumo into v_id_lec_consumo;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Consumo almacenado(a) con exito (id_lec_consumo'||v_id_lec_consumo||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lec_consumo',v_id_lec_consumo::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_CON_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:17:48
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_CON_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tlec_consumo set
			id_cliente = v_parametros.id_cliente,
			consumo5 = v_parametros.consumo5,
			consumo3 = v_parametros.consumo3,
			consumo1 = v_parametros.consumo1,
			consumo2 = v_parametros.consumo2,
			consumo4 = v_parametros.consumo4,
			consumo6 = v_parametros.consumo6,
			fecha_mod = now(),
			id_usuario_mod = p_id_usuario,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_lec_consumo=v_parametros.id_lec_consumo;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Consumo modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lec_consumo',v_parametros.id_lec_consumo::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_CON_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:17:48
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_CON_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tlec_consumo
            where id_lec_consumo=v_parametros.id_lec_consumo;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Consumo eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lec_consumo',v_parametros.id_lec_consumo::varchar);
              
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
ALTER FUNCTION "factur"."ft_lec_consumo_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
