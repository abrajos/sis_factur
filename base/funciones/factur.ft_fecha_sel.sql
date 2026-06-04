CREATE OR REPLACE FUNCTION "factur"."ft_fecha_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_fecha_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tfecha'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:20:04
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:20:04								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tfecha'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_fecha_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_FECHA_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:20:04
	***********************************/

	if(p_transaccion='FACTUR_FECHA_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						fecha.id_fecha,
						fecha.id_param,
						fecha.tipo_fecha,
						fecha.desc_fecha,
						fecha.fecha,
						fecha.estado_reg,
						fecha.id_usuario_ai,
						fecha.id_usuario_reg,
						fecha.fecha_reg,
						fecha.usuario_ai,
						fecha.fecha_mod,
						fecha.id_usuario_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.tfecha fecha
						inner join segu.tusuario usu1 on usu1.id_usuario = fecha.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = fecha.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_FECHA_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:20:04
	***********************************/

	elsif(p_transaccion='FACTUR_FECHA_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_fecha)
					    from factur.tfecha fecha
					    inner join segu.tusuario usu1 on usu1.id_usuario = fecha.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = fecha.id_usuario_mod
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
ALTER FUNCTION "factur"."ft_fecha_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
