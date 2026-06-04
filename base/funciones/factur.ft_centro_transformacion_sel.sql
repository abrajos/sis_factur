CREATE OR REPLACE FUNCTION "factur"."ft_centro_transformacion_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_centro_transformacion_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tcentro_transformacion'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:23:25
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:23:25								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tcentro_transformacion'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_centro_transformacion_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_CEN_TRA_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:23:25
	***********************************/

	if(p_transaccion='FACTUR_CEN_TRA_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						cen_tra.id_centro_tranformacion,
						cen_tra.direccion,
						cen_tra.id_equipo_proteccion,
						cen_tra.tension_primaria,
						cen_tra.caracteristica,
						cen_tra.tipo,
						cen_tra.relacion_cts,
						cen_tra.relacion_pts,
						cen_tra.tipo_propiedad,
						cen_tra.tipo_tension,
						cen_tra.propietario,
						cen_tra.estado_reg,
						cen_tra.tipo_uso,
						cen_tra.tension_secundaria,
						cen_tra.marca,
						cen_tra.codigo_centro,
						cen_tra.potencia,
						cen_tra.nivel_calidad,
						cen_tra.id_lugar,
						cen_tra.nro_serie,
						cen_tra.id_usuario_ai,
						cen_tra.usuario_ai,
						cen_tra.fecha_reg,
						cen_tra.id_usuario_reg,
						cen_tra.id_usuario_mod,
						cen_tra.fecha_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.tcentro_transformacion cen_tra
						inner join segu.tusuario usu1 on usu1.id_usuario = cen_tra.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = cen_tra.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CEN_TRA_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:23:25
	***********************************/

	elsif(p_transaccion='FACTUR_CEN_TRA_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_centro_tranformacion)
					    from factur.tcentro_transformacion cen_tra
					    inner join segu.tusuario usu1 on usu1.id_usuario = cen_tra.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = cen_tra.id_usuario_mod
					    where ';
			
			--Definicion de la respuesta		    
			v_consulta:=v_consulta||v_parametros.filtro;

			--Devuelve la respuesta
			return v_consulta;

		end;
					
	else
					     
		raise exception 'Transaccion inexistente';
					         
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
ALTER FUNCTION "factur"."ft_centro_transformacion_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
