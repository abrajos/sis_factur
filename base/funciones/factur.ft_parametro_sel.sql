CREATE OR REPLACE FUNCTION "factur"."ft_parametro_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_parametro_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tparametro'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 02:52:33
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 02:52:33								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tparametro'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_parametro_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_PARAME_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:33
	***********************************/

	if(p_transaccion='FACTUR_PARAME_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						parame.id_param,
						parame.tasa_interes,
						parame.telefono_sucursal,
						parame.nro_reclamo_03,
						parame.nro_cuenta,
						parame.gestion,
						parame.lugar,
						parame.doc_iden,
						parame.nro_reclamo_02,
						parame.nro_contrato,
						parame.nro_servicio,
						parame.id_fina_regi_prog_proy_acti,
						parame.nro_venta,
						parame.celular_odeco,
						parame.ci_tramite,
						parame.sis_facturacion_cobranza,
						parame.ubicacion_sucursal,
						parame.nro_sucursal_distribucion,
						parame.id_depto_regional,
						parame.nro_tramite,
						parame.id_moneda,
						parame.representante,
						parame.codigo_sistema,
						parame.firma_tramite,
						parame.direccion_sucursal,
						parame.periodo,
						parame.ciudad,
						parame.tiene_caja,
						parame.nro_recibo,
						parame.telefono_odeco,
						parame.cod_empresa,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.tparametro parame
						inner join segu.tusuario usu1 on usu1.id_usuario = parame.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = parame.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_PARAME_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:33
	***********************************/

	elsif(p_transaccion='FACTUR_PARAME_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_param)
					    from factur.tparametro parame
					    inner join segu.tusuario usu1 on usu1.id_usuario = parame.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = parame.id_usuario_mod
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
ALTER FUNCTION "factur"."ft_parametro_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
