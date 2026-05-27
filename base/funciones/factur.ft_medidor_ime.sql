CREATE OR REPLACE FUNCTION "factur"."ft_medidor_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_medidor_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tmedidor'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 02:52:42
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 02:52:42								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tmedidor'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_medidor	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_medidor_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_MEDIDO_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:42
	***********************************/

	if(p_transaccion='FACTUR_MEDIDO_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tmedidor(
			sw_instalado,
			sw_pertenece,
			id_param,
			marca,
			capacidad,
			tipo_medidor,
			costo,
			nro_digitos,
			nro_serie,
			id_nro_tramite
          	) values(
			v_parametros.sw_instalado,
			v_parametros.sw_pertenece,
			v_parametros.id_param,
			v_parametros.marca,
			v_parametros.capacidad,
			v_parametros.tipo_medidor,
			v_parametros.costo,
			v_parametros.nro_digitos,
			v_parametros.nro_serie,
			v_parametros.id_nro_tramite
							
			
			
			)RETURNING id_medidor into v_id_medidor;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Medidor almacenado(a) con exito (id_medidor'||v_id_medidor||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_medidor',v_id_medidor::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_MEDIDO_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:42
	***********************************/

	elsif(p_transaccion='FACTUR_MEDIDO_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tmedidor set
			sw_instalado = v_parametros.sw_instalado,
			sw_pertenece = v_parametros.sw_pertenece,
			id_param = v_parametros.id_param,
			marca = v_parametros.marca,
			capacidad = v_parametros.capacidad,
			tipo_medidor = v_parametros.tipo_medidor,
			costo = v_parametros.costo,
			nro_digitos = v_parametros.nro_digitos,
			nro_serie = v_parametros.nro_serie,
			id_nro_tramite = v_parametros.id_nro_tramite,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_medidor=v_parametros.id_medidor;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Medidor modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_medidor',v_parametros.id_medidor::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_MEDIDO_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:42
	***********************************/

	elsif(p_transaccion='FACTUR_MEDIDO_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tmedidor
            where id_medidor=v_parametros.id_medidor;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Medidor eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_medidor',v_parametros.id_medidor::varchar);
              
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
ALTER FUNCTION "factur"."ft_medidor_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
