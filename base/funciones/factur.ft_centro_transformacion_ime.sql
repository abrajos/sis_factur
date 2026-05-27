CREATE OR REPLACE FUNCTION "factur"."ft_centro_transformacion_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_centro_transformacion_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tcentro_transformacion'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:23:25
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:23:25								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tcentro_transformacion'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_centro_tranformacion	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_centro_transformacion_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_CEN_TRA_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:23:25
	***********************************/

	if(p_transaccion='FACTUR_CEN_TRA_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tcentro_transformacion(
			direccion,
			id_equipo_proteccion,
			tension_primaria,
			caracteristica,
			tipo,
			relacion_cts,
			relacion_pts,
			tipo_propiedad,
			tipo_tension,
			propietario,
			estado_reg,
			tipo_uso,
			tension_secundaria,
			marca,
			codigo_centro,
			potencia,
			nivel_calidad,
			id_lugar,
			nro_serie,
			id_usuario_ai,
			usuario_ai,
			fecha_reg,
			id_usuario_reg,
			id_usuario_mod,
			fecha_mod
          	) values(
			v_parametros.direccion,
			v_parametros.id_equipo_proteccion,
			v_parametros.tension_primaria,
			v_parametros.caracteristica,
			v_parametros.tipo,
			v_parametros.relacion_cts,
			v_parametros.relacion_pts,
			v_parametros.tipo_propiedad,
			v_parametros.tipo_tension,
			v_parametros.propietario,
			'activo',
			v_parametros.tipo_uso,
			v_parametros.tension_secundaria,
			v_parametros.marca,
			v_parametros.codigo_centro,
			v_parametros.potencia,
			v_parametros.nivel_calidad,
			v_parametros.id_lugar,
			v_parametros.nro_serie,
			v_parametros._id_usuario_ai,
			v_parametros._nombre_usuario_ai,
			now(),
			p_id_usuario,
			null,
			null
							
			
			
			)RETURNING id_centro_tranformacion into v_id_centro_tranformacion;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Centro Transformacion almacenado(a) con exito (id_centro_tranformacion'||v_id_centro_tranformacion||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_centro_tranformacion',v_id_centro_tranformacion::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CEN_TRA_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:23:25
	***********************************/

	elsif(p_transaccion='FACTUR_CEN_TRA_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tcentro_transformacion set
			direccion = v_parametros.direccion,
			id_equipo_proteccion = v_parametros.id_equipo_proteccion,
			tension_primaria = v_parametros.tension_primaria,
			caracteristica = v_parametros.caracteristica,
			tipo = v_parametros.tipo,
			relacion_cts = v_parametros.relacion_cts,
			relacion_pts = v_parametros.relacion_pts,
			tipo_propiedad = v_parametros.tipo_propiedad,
			tipo_tension = v_parametros.tipo_tension,
			propietario = v_parametros.propietario,
			tipo_uso = v_parametros.tipo_uso,
			tension_secundaria = v_parametros.tension_secundaria,
			marca = v_parametros.marca,
			codigo_centro = v_parametros.codigo_centro,
			potencia = v_parametros.potencia,
			nivel_calidad = v_parametros.nivel_calidad,
			id_lugar = v_parametros.id_lugar,
			nro_serie = v_parametros.nro_serie,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_centro_tranformacion=v_parametros.id_centro_tranformacion;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Centro Transformacion modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_centro_tranformacion',v_parametros.id_centro_tranformacion::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CEN_TRA_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:23:25
	***********************************/

	elsif(p_transaccion='FACTUR_CEN_TRA_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tcentro_transformacion
            where id_centro_tranformacion=v_parametros.id_centro_tranformacion;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Centro Transformacion eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_centro_tranformacion',v_parametros.id_centro_tranformacion::varchar);
              
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
ALTER FUNCTION "factur"."ft_centro_transformacion_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
