CREATE OR REPLACE FUNCTION "factur"."ft_tarifa_index_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_tarifa_index_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.ttarifa_index'
 AUTOR: 		 (admin)
 FECHA:	        15-11-2025 04:10:02
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				15-11-2025 04:10:02								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.ttarifa_index'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_tarifa_index	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_tarifa_index_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_tarind_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 04:10:02
	***********************************/

	if(p_transaccion='FACTUR_tarind_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.ttarifa_index(
			id_fac_index,
			id_tarifa,
			gestion,
			importe_index,
			estado_reg,
			periodo,
			id_usuario_ai,
			usuario_ai,
			fecha_reg,
			id_usuario_reg,
			fecha_mod,
			id_usuario_mod
          	) values(
			v_parametros.id_fac_index,
			v_parametros.id_tarifa,
			v_parametros.gestion,
			v_parametros.importe_index,
			'activo',
			v_parametros.periodo,
			v_parametros._id_usuario_ai,
			v_parametros._nombre_usuario_ai,
			now(),
			p_id_usuario,
			null,
			null
							
			
			
			)RETURNING id_tarifa_index into v_id_tarifa_index;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tarifa Index almacenado(a) con exito (id_tarifa_index'||v_id_tarifa_index||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_tarifa_index',v_id_tarifa_index::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_tarind_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 04:10:02
	***********************************/

	elsif(p_transaccion='FACTUR_tarind_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.ttarifa_index set
			id_fac_index = v_parametros.id_fac_index,
			id_tarifa = v_parametros.id_tarifa,
			gestion = v_parametros.gestion,
			importe_index = v_parametros.importe_index,
			periodo = v_parametros.periodo,
			fecha_mod = now(),
			id_usuario_mod = p_id_usuario,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_tarifa_index=v_parametros.id_tarifa_index;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tarifa Index modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_tarifa_index',v_parametros.id_tarifa_index::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_tarind_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 04:10:02
	***********************************/

	elsif(p_transaccion='FACTUR_tarind_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.ttarifa_index
            where id_tarifa_index=v_parametros.id_tarifa_index;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tarifa Index eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_tarifa_index',v_parametros.id_tarifa_index::varchar);
              
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
ALTER FUNCTION "factur"."ft_tarifa_index_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
