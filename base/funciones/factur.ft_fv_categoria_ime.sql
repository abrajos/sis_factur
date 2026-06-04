CREATE OR REPLACE FUNCTION "factur"."ft_fv_categoria_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_fv_categoria_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tfv_categoria'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 02:50:53
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 02:50:53								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tfv_categoria'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_categoria	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_fv_categoria_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_categ_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:50:53
	***********************************/

	if(p_transaccion='FACTUR_categ_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tfv_categoria(
			sw_industrial,
			id_param,
			importe_garantia,
			desc_categoria,
			sw_lectura_potencia_contratada,
			tiempo_factor_consumo,
			estado,
			id_cuenta
          	) values(
			v_parametros.sw_industrial,
			v_parametros.id_param,
			v_parametros.importe_garantia,
			v_parametros.desc_categoria,
			v_parametros.sw_lectura_potencia_contratada,
			v_parametros.tiempo_factor_consumo,
			v_parametros.estado,
			v_parametros.id_cuenta
							
			
			
			)RETURNING id_categoria into v_id_categoria;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Categoria almacenado(a) con exito (id_categoria'||v_id_categoria||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_categoria',v_id_categoria::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_categ_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:50:53
	***********************************/

	elsif(p_transaccion='FACTUR_categ_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tfv_categoria set
			sw_industrial = v_parametros.sw_industrial,
			id_param = v_parametros.id_param,
			importe_garantia = v_parametros.importe_garantia,
			desc_categoria = v_parametros.desc_categoria,
			sw_lectura_potencia_contratada = v_parametros.sw_lectura_potencia_contratada,
			tiempo_factor_consumo = v_parametros.tiempo_factor_consumo,
			estado = v_parametros.estado,
			id_cuenta = v_parametros.id_cuenta,
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_categoria=v_parametros.id_categoria;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Categoria modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_categoria',v_parametros.id_categoria::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_categ_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:50:53
	***********************************/

	elsif(p_transaccion='FACTUR_categ_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tfv_categoria
            where id_categoria=v_parametros.id_categoria;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Categoria eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_categoria',v_parametros.id_categoria::varchar);
              
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
ALTER FUNCTION "factur"."ft_fv_categoria_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
