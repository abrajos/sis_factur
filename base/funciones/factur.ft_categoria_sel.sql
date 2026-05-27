CREATE OR REPLACE FUNCTION "factur"."ft_categoria_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_categoria_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tcategoria'
 AUTOR: 		 (admin)
 FECHA:	        28-08-2025 15:33:04
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				28-08-2025 15:33:04								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tcategoria'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_categoria_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_CATEGO_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		28-08-2025 15:33:04
	***********************************/

	if(p_transaccion='FACTUR_CATEGO_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						catego.id_categoria,
						catego.tiempo_factor_consumo,
						catego.id_param,
						catego.estado_reg,
						catego.importe_garantia,
						catego.desc_categoria,
						catego.estado,
						catego.sw_lectura_potencia_contratada,
						catego.sw_industrial,
						catego.id_cuenta,
						catego.id_usuario_reg,
						catego.fecha_reg,
						catego.usuario_ai,
						catego.id_usuario_ai,
						catego.id_usuario_mod,
						catego.fecha_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.tcategoria catego
						inner join segu.tusuario usu1 on usu1.id_usuario = catego.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = catego.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CATEGO_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		28-08-2025 15:33:04
	***********************************/

	elsif(p_transaccion='FACTUR_CATEGO_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_categoria)
					    from factur.tcategoria catego
					    inner join segu.tusuario usu1 on usu1.id_usuario = catego.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = catego.id_usuario_mod
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
ALTER FUNCTION "factur"."ft_categoria_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
