CREATE OR REPLACE FUNCTION "factur"."ft_tarifa_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_tarifa_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.ttarifa'
 AUTOR: 		 (admin)
 FECHA:	        15-11-2025 01:34:37
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				15-11-2025 01:34:37								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.ttarifa'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_tarifa	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_tarifa_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_tarifa_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 01:34:37
	***********************************/

	if(p_transaccion='FACTUR_tarifa_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.ttarifa(
			sw_potencia,
			estado_reg,
			importe_tarifa,
			fecha_vigencia,
			valor_ini,
			desc_tarifa,
			valor_final,
			factor_indexacion,
			tipo_tarifa,
			estado,
			id_categoria,
			id_usuario_reg,
			fecha_reg,
			usuario_ai,
			id_usuario_ai,
			id_usuario_mod,
			fecha_mod
          	) values(
			v_parametros.sw_potencia,
			'activo',
			v_parametros.importe_tarifa,
			v_parametros.fecha_vigencia,
			v_parametros.valor_ini,
			v_parametros.desc_tarifa,
			v_parametros.valor_final,
			v_parametros.factor_indexacion,
			v_parametros.tipo_tarifa,
			v_parametros.estado,
			v_parametros.id_categoria,
			p_id_usuario,
			now(),
			v_parametros._nombre_usuario_ai,
			v_parametros._id_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_tarifa into v_id_tarifa;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tarifa almacenado(a) con exito (id_tarifa'||v_id_tarifa||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_tarifa',v_id_tarifa::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_tarifa_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 01:34:37
	***********************************/

	elsif(p_transaccion='FACTUR_tarifa_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.ttarifa set
			sw_potencia = v_parametros.sw_potencia,
			importe_tarifa = v_parametros.importe_tarifa,
			fecha_vigencia = v_parametros.fecha_vigencia,
			valor_ini = v_parametros.valor_ini,
			desc_tarifa = v_parametros.desc_tarifa,
			valor_final = v_parametros.valor_final,
			factor_indexacion = v_parametros.factor_indexacion,
			tipo_tarifa = v_parametros.tipo_tarifa,
			estado = v_parametros.estado,
			id_categoria = v_parametros.id_categoria,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_tarifa=v_parametros.id_tarifa;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tarifa modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_tarifa',v_parametros.id_tarifa::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_tarifa_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 01:34:37
	***********************************/

	elsif(p_transaccion='FACTUR_tarifa_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.ttarifa
            where id_tarifa=v_parametros.id_tarifa;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Tarifa eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_tarifa',v_parametros.id_tarifa::varchar);
              
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
ALTER FUNCTION "factur"."ft_tarifa_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
