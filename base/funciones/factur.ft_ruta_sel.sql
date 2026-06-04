CREATE OR REPLACE FUNCTION "factur"."ft_ruta_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_ruta_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.truta'
 AUTOR: 		 (admin)
 FECHA:	        15-11-2025 08:14:52
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				15-11-2025 08:14:52								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.truta'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_ruta_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_ruta_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 08:14:52
	***********************************/

	if(p_transaccion='FACTUR_ruta_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						ruta.id_ruta,
						ruta.fecha_proxmed,
						ruta.id_municipio,
						ruta.clientes,
						ruta.fecha_lectura,
						ruta.id_funcionario,
						ruta.fecha_anterior,
						ruta.zona_ruta,
						ruta.id_zona,
						ruta.desc_ruta,
						ruta.fecha_proxemi,
						ruta.id_param,
						ruta.cod_ruta,
						ruta.fecha_factura,
						ruta.fecha_vence,
						ruta.sw_proceso,
						ruta.sin_lectura,
						ruta.estado_reg,
						ruta.maximo_clientes,
						ruta.sw_debito_fiscal,
						ruta.id_usuario_ai,
						ruta.id_usuario_reg,
						ruta.fecha_reg,
						ruta.usuario_ai,
						ruta.fecha_mod,
						ruta.id_usuario_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.truta ruta
						inner join segu.tusuario usu1 on usu1.id_usuario = ruta.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = ruta.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_ruta_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		15-11-2025 08:14:52
	***********************************/

	elsif(p_transaccion='FACTUR_ruta_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_ruta)
					    from factur.truta ruta
					    inner join segu.tusuario usu1 on usu1.id_usuario = ruta.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = ruta.id_usuario_mod
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
ALTER FUNCTION "factur"."ft_ruta_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
