CREATE OR REPLACE FUNCTION "factur"."ft_fecha_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_fecha_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tfecha'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:20:04
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:20:04								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tfecha'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_fecha	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_fecha_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_FECHA_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:20:04
	***********************************/

	if(p_transaccion='FACTUR_FECHA_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tfecha(
			id_param,
			tipo_fecha,
			desc_fecha,
			fecha,
			estado_reg,
			id_usuario_ai,
			id_usuario_reg,
			fecha_reg,
			usuario_ai,
			fecha_mod,
			id_usuario_mod
          	) values(
			v_parametros.id_param,
			v_parametros.tipo_fecha,
			v_parametros.desc_fecha,
			v_parametros.fecha,
			'activo',
			v_parametros._id_usuario_ai,
			p_id_usuario,
			now(),
			v_parametros._nombre_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_fecha into v_id_fecha;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Fecha almacenado(a) con exito (id_fecha'||v_id_fecha||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_fecha',v_id_fecha::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_FECHA_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:20:04
	***********************************/

	elsif(p_transaccion='FACTUR_FECHA_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tfecha set
			id_param = v_parametros.id_param,
			tipo_fecha = v_parametros.tipo_fecha,
			desc_fecha = v_parametros.desc_fecha,
			fecha = v_parametros.fecha,
			fecha_mod = now(),
			id_usuario_mod = p_id_usuario,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_fecha=v_parametros.id_fecha;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Fecha modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_fecha',v_parametros.id_fecha::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_FECHA_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:20:04
	***********************************/

	elsif(p_transaccion='FACTUR_FECHA_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tfecha
            where id_fecha=v_parametros.id_fecha;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Fecha eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_fecha',v_parametros.id_fecha::varchar);
              
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
ALTER FUNCTION "factur"."ft_fecha_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
