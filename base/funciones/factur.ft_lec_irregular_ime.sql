CREATE OR REPLACE FUNCTION "factur"."ft_lec_irregular_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_lec_irregular_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_irregular'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:16:39
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:16:39								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tlec_irregular'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_lec_irre	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_lec_irregular_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_IRR_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:16:39
	***********************************/

	if(p_transaccion='FACTUR_LEC_IRR_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tlec_irregular(
			id_cod_irre,
			estado_reg,
			id_lectura,
			id_usuario_ai,
			usuario_ai,
			fecha_reg,
			id_usuario_reg,
			id_usuario_mod,
			fecha_mod
          	) values(
			v_parametros.id_cod_irre,
			'activo',
			v_parametros.id_lectura,
			v_parametros._id_usuario_ai,
			v_parametros._nombre_usuario_ai,
			now(),
			p_id_usuario,
			null,
			null
							
			
			
			)RETURNING id_lec_irre into v_id_lec_irre;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Irregular almacenado(a) con exito (id_lec_irre'||v_id_lec_irre||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lec_irre',v_id_lec_irre::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_IRR_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:16:39
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_IRR_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tlec_irregular set
			id_cod_irre = v_parametros.id_cod_irre,
			id_lectura = v_parametros.id_lectura,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_lec_irre=v_parametros.id_lec_irre;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Irregular modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lec_irre',v_parametros.id_lec_irre::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LEC_IRR_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:16:39
	***********************************/

	elsif(p_transaccion='FACTUR_LEC_IRR_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tlec_irregular
            where id_lec_irre=v_parametros.id_lec_irre;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Lectura Irregular eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_lec_irre',v_parametros.id_lec_irre::varchar);
              
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
ALTER FUNCTION "factur"."ft_lec_irregular_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
