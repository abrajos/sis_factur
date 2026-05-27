CREATE OR REPLACE FUNCTION "factur"."ft_tarifa_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_tarifa_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.ttarifa'
 AUTOR: 		 (admin)
 FECHA:	        15-11-2025 01:34:37
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				15-11-2025 01:34:37								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.ttarifa'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_tarifa_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_tarifa_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 01:34:37
	***********************************/

	if(p_transaccion='FACTUR_tarifa_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						tarifa.id_tarifa,
						tarifa.sw_potencia,
						tarifa.estado_reg,
						tarifa.importe_tarifa,
						tarifa.fecha_vigencia,
						tarifa.valor_ini,
						tarifa.desc_tarifa,
						tarifa.valor_final,
						tarifa.factor_indexacion,
						tarifa.tipo_tarifa,
						tarifa.estado,
						tarifa.id_categoria,
						tarifa.id_usuario_reg,
						tarifa.fecha_reg,
						tarifa.usuario_ai,
						tarifa.id_usuario_ai,
						tarifa.id_usuario_mod,
						tarifa.fecha_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.ttarifa tarifa
						inner join segu.tusuario usu1 on usu1.id_usuario = tarifa.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = tarifa.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_tarifa_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 01:34:37
	***********************************/

	elsif(p_transaccion='FACTUR_tarifa_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_tarifa)
					    from factur.ttarifa tarifa
					    inner join segu.tusuario usu1 on usu1.id_usuario = tarifa.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = tarifa.id_usuario_mod
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
ALTER FUNCTION "factur"."ft_tarifa_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
