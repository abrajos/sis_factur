CREATE OR REPLACE FUNCTION "factur"."ft_marca_medidor_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_marca_medidor_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tmarca_medidor'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:15:01
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:15:01								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tmarca_medidor'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_marca_medidor	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_marca_medidor_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_MAR_MED_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:15:01
	***********************************/

	if(p_transaccion='FACTUR_MAR_MED_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tmarca_medidor(
			denominacion,
			industria,
			estado_reg,
			id_usuario_ai,
			id_usuario_reg,
			usuario_ai,
			fecha_reg,
			fecha_mod,
			id_usuario_mod
          	) values(
			v_parametros.denominacion,
			v_parametros.industria,
			'activo',
			v_parametros._id_usuario_ai,
			p_id_usuario,
			v_parametros._nombre_usuario_ai,
			now(),
			null,
			null
							
			
			
			)RETURNING id_marca_medidor into v_id_marca_medidor;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Marca Medidor almacenado(a) con exito (id_marca_medidor'||v_id_marca_medidor||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_marca_medidor',v_id_marca_medidor::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_MAR_MED_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:15:01
	***********************************/

	elsif(p_transaccion='FACTUR_MAR_MED_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tmarca_medidor set
			denominacion = v_parametros.denominacion,
			industria = v_parametros.industria,
			fecha_mod = now(),
			id_usuario_mod = p_id_usuario,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_marca_medidor=v_parametros.id_marca_medidor;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Marca Medidor modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_marca_medidor',v_parametros.id_marca_medidor::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_MAR_MED_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:15:01
	***********************************/

	elsif(p_transaccion='FACTUR_MAR_MED_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tmarca_medidor
            where id_marca_medidor=v_parametros.id_marca_medidor;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Marca Medidor eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_marca_medidor',v_parametros.id_marca_medidor::varchar);
              
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
ALTER FUNCTION "factur"."ft_marca_medidor_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
