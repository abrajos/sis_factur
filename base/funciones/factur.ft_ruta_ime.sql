CREATE OR REPLACE FUNCTION "factur"."ft_ruta_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_ruta_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.truta'
 AUTOR: 		 (admin)
 FECHA:	        15-11-2025 08:14:52
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				15-11-2025 08:14:52								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.truta'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_ruta	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_ruta_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_ruta_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 08:14:52
	***********************************/

	if(p_transaccion='FACTUR_ruta_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.truta(
			fecha_proxmed,
			id_municipio,
			clientes,
			fecha_lectura,
			id_funcionario,
			fecha_anterior,
			zona_ruta,
			id_zona,
			desc_ruta,
			fecha_proxemi,
			id_param,
			cod_ruta,
			fecha_factura,
			fecha_vence,
			sw_proceso,
			sin_lectura,
			estado_reg,
			maximo_clientes,
			sw_debito_fiscal,
			id_usuario_ai,
			id_usuario_reg,
			fecha_reg,
			usuario_ai,
			fecha_mod,
			id_usuario_mod
          	) values(
			v_parametros.fecha_proxmed,
			v_parametros.id_municipio,
			v_parametros.clientes,
			v_parametros.fecha_lectura,
			v_parametros.id_funcionario,
			v_parametros.fecha_anterior,
			v_parametros.zona_ruta,
			v_parametros.id_zona,
			v_parametros.desc_ruta,
			v_parametros.fecha_proxemi,
			v_parametros.id_param,
			v_parametros.cod_ruta,
			v_parametros.fecha_factura,
			v_parametros.fecha_vence,
			v_parametros.sw_proceso,
			v_parametros.sin_lectura,
			'activo',
			v_parametros.maximo_clientes,
			v_parametros.sw_debito_fiscal,
			v_parametros._id_usuario_ai,
			p_id_usuario,
			now(),
			v_parametros._nombre_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_ruta into v_id_ruta;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Rutas almacenado(a) con exito (id_ruta'||v_id_ruta||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_ruta',v_id_ruta::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_ruta_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 08:14:52
	***********************************/

	elsif(p_transaccion='FACTUR_ruta_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.truta set
			fecha_proxmed = v_parametros.fecha_proxmed,
			id_municipio = v_parametros.id_municipio,
			clientes = v_parametros.clientes,
			fecha_lectura = v_parametros.fecha_lectura,
			id_funcionario = v_parametros.id_funcionario,
			fecha_anterior = v_parametros.fecha_anterior,
			zona_ruta = v_parametros.zona_ruta,
			id_zona = v_parametros.id_zona,
			desc_ruta = v_parametros.desc_ruta,
			fecha_proxemi = v_parametros.fecha_proxemi,
			id_param = v_parametros.id_param,
			cod_ruta = v_parametros.cod_ruta,
			fecha_factura = v_parametros.fecha_factura,
			fecha_vence = v_parametros.fecha_vence,
			sw_proceso = v_parametros.sw_proceso,
			sin_lectura = v_parametros.sin_lectura,
			maximo_clientes = v_parametros.maximo_clientes,
			sw_debito_fiscal = v_parametros.sw_debito_fiscal,
			fecha_mod = now(),
			id_usuario_mod = p_id_usuario,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_ruta=v_parametros.id_ruta;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Rutas modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_ruta',v_parametros.id_ruta::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_ruta_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 08:14:52
	***********************************/

	elsif(p_transaccion='FACTUR_ruta_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.truta
            where id_ruta=v_parametros.id_ruta;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Rutas eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_ruta',v_parametros.id_ruta::varchar);
              
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
ALTER FUNCTION "factur"."ft_ruta_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
