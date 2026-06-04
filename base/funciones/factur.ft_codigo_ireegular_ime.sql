CREATE OR REPLACE FUNCTION "factur"."ft_codigo_ireegular_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_codigo_ireegular_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tcodigo_ireegular'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:20:40
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:20:40								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tcodigo_ireegular'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_cod_irre	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_codigo_ireegular_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_COD_IRR_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:20:40
	***********************************/

	if(p_transaccion='FACTUR_COD_IRR_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tcodigo_ireegular(
			desc_cod_irre,
			tipo_lectura,
			id_cod_gescom,
			estado_reg,
			codigo,
			condicion_logica,
			id_param,
			sw_aviso,
			descripcion,
			estado,
			usuario_ai,
			fecha_reg,
			id_usuario_reg,
			id_usuario_ai,
			fecha_mod,
			id_usuario_mod
          	) values(
			v_parametros.desc_cod_irre,
			v_parametros.tipo_lectura,
			v_parametros.id_cod_gescom,
			'activo',
			v_parametros.codigo,
			v_parametros.condicion_logica,
			v_parametros.id_param,
			v_parametros.sw_aviso,
			v_parametros.descripcion,
			v_parametros.estado,
			v_parametros._nombre_usuario_ai,
			now(),
			p_id_usuario,
			v_parametros._id_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_cod_irre into v_id_cod_irre;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Codigo Irregular almacenado(a) con exito (id_cod_irre'||v_id_cod_irre||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_cod_irre',v_id_cod_irre::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_COD_IRR_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:20:40
	***********************************/

	elsif(p_transaccion='FACTUR_COD_IRR_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tcodigo_ireegular set
			desc_cod_irre = v_parametros.desc_cod_irre,
			tipo_lectura = v_parametros.tipo_lectura,
			id_cod_gescom = v_parametros.id_cod_gescom,
			codigo = v_parametros.codigo,
			condicion_logica = v_parametros.condicion_logica,
			id_param = v_parametros.id_param,
			sw_aviso = v_parametros.sw_aviso,
			descripcion = v_parametros.descripcion,
			estado = v_parametros.estado,
			fecha_mod = now(),
			id_usuario_mod = p_id_usuario,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_cod_irre=v_parametros.id_cod_irre;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Codigo Irregular modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_cod_irre',v_parametros.id_cod_irre::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_COD_IRR_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:20:40
	***********************************/

	elsif(p_transaccion='FACTUR_COD_IRR_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tcodigo_ireegular
            where id_cod_irre=v_parametros.id_cod_irre;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Codigo Irregular eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_cod_irre',v_parametros.id_cod_irre::varchar);
              
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
ALTER FUNCTION "factur"."ft_codigo_ireegular_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
