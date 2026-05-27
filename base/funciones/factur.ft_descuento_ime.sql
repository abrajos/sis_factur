CREATE OR REPLACE FUNCTION "factur"."ft_descuento_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_descuento_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tdescuento'
 AUTOR: 		 (admin)
 FECHA:	        15-11-2025 06:41:25
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				15-11-2025 06:41:25								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tdescuento'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_descuento	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_descuento_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_descue_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 06:41:25
	***********************************/

	if(p_transaccion='FACTUR_descue_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tdescuento(
			porcentaje,
			desc_descuento,
			estado_reg,
			consumo,
			sw_general,
			id_param,
			sw_maximo,
			id_usuario_ai,
			id_usuario_reg,
			usuario_ai,
			fecha_reg,
			id_usuario_mod,
			fecha_mod
          	) values(
			v_parametros.porcentaje,
			v_parametros.desc_descuento,
			'activo',
			v_parametros.consumo,
			v_parametros.sw_general,
			v_parametros.id_param,
			v_parametros.sw_maximo,
			v_parametros._id_usuario_ai,
			p_id_usuario,
			v_parametros._nombre_usuario_ai,
			now(),
			null,
			null
							
			
			
			)RETURNING id_descuento into v_id_descuento;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Descuentos almacenado(a) con exito (id_descuento'||v_id_descuento||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_descuento',v_id_descuento::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_descue_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 06:41:25
	***********************************/

	elsif(p_transaccion='FACTUR_descue_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tdescuento set
			porcentaje = v_parametros.porcentaje,
			desc_descuento = v_parametros.desc_descuento,
			consumo = v_parametros.consumo,
			sw_general = v_parametros.sw_general,
			id_param = v_parametros.id_param,
			sw_maximo = v_parametros.sw_maximo,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_descuento=v_parametros.id_descuento;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Descuentos modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_descuento',v_parametros.id_descuento::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_descue_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 06:41:25
	***********************************/

	elsif(p_transaccion='FACTUR_descue_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tdescuento
            where id_descuento=v_parametros.id_descuento;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Descuentos eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_descuento',v_parametros.id_descuento::varchar);
              
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
ALTER FUNCTION "factur"."ft_descuento_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
