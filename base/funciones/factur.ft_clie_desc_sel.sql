CREATE OR REPLACE FUNCTION "factur"."ft_clie_desc_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_clie_desc_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tclie_desc'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:22:58
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:22:58								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tclie_desc'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_clie_desc_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLI_DSC_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:22:58
	***********************************/

	if(p_transaccion='FACTUR_CLI_DSC_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						cli_dsc.id_clie_desc,
						cli_dsc.estado_reg,
						cli_dsc.id_descuento,
						cli_dsc.id_cliente,
						cli_dsc.id_usuario_reg,
						cli_dsc.fecha_reg,
						cli_dsc.usuario_ai,
						cli_dsc.id_usuario_ai,
						cli_dsc.id_usuario_mod,
						cli_dsc.fecha_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.tclie_desc cli_dsc
						inner join segu.tusuario usu1 on usu1.id_usuario = cli_dsc.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = cli_dsc.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLI_DSC_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:22:58
	***********************************/

	elsif(p_transaccion='FACTUR_CLI_DSC_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_clie_desc)
					    from factur.tclie_desc cli_dsc
					    inner join segu.tusuario usu1 on usu1.id_usuario = cli_dsc.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = cli_dsc.id_usuario_mod
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
ALTER FUNCTION "factur"."ft_clie_desc_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
