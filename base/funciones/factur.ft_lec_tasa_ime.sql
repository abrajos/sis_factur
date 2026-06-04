CREATE OR REPLACE FUNCTION "factur"."ft_lec_tasa_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_lec_tasa_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_tasa'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:15:32
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:15:32								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_tasa'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_lectasa	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_lec_tasa_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_TAS_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:15:32
	***********************************/

	if(p_transaccion='FACTUR_LEC_TAS_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tlec_tasa(
			estado_reg,
			tasa_importe,
			id_tasa,
			tasa_porcen,
			id_lectura,
			usuario_ai,
			fecha_reg,
			id_usuario_reg,
			id_usuario_ai,
			id_usuario_mod,
			fecha_mod
          	) values(
			'activo',
			v_parametros.tasa_importe,
			v_parametros.id_tasa,
			v_parametros.tasa_porcen,
			v_parametros.id_lectura,
			v_parametros._nombre_usuario_ai,
			now(),
			p_id_usuario,
			v_parametros._id_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_lectasa into v_id_lectasa;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Tasa almacenado(a) con exito (id_lectasa'||v_id_lectasa||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lectasa',v_id_lectasa::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_TAS_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:15:32
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_TAS_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tlec_tasa set
			tasa_importe = v_parametros.tasa_importe,
			id_tasa = v_parametros.id_tasa,
			tasa_porcen = v_parametros.tasa_porcen,
			id_lectura = v_parametros.id_lectura,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_lectasa=v_parametros.id_lectasa;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Tasa modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lectasa',v_parametros.id_lectasa::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_TAS_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:15:32
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_TAS_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tlec_tasa
            where id_lectasa=v_parametros.id_lectasa;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Tasa eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lectasa',v_parametros.id_lectasa::varchar);
              
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
ALTER FUNCTION "factur"."ft_lec_tasa_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
