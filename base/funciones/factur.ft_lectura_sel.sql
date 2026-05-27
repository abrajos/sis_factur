CREATE OR REPLACE FUNCTION "factur"."ft_lectura_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_lectura_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tlectura'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 02:52:40
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 02:52:40								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tlectura'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_lectura_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_LECTUR_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:40
	***********************************/

	if(p_transaccion='FACTUR_LECTUR_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						lectur.id_lectura,
						lectur.id_categoria,
						lectur.id_cliente,
						lectur.potencia_val,
						lectur.fecha_proxmed,
						lectur.fecha_proxemi,
						lectur.consumo_total,
						lectur.nro_digitos,
						lectur.lecant_kvar,
						lectur.saldo_credito,
						lectur.consumo_val,
						lectur.tipo_lectura,
						lectur.lectura_kwh,
						lectur.lecant_kwh,
						lectur.periodo_corte,
						lectur.conexion_val,
						lectur.cod_ubica,
						lectur.nrodig_kwh,
						lectur.consumo_cambio,
						lectur.lectura_kvar,
						lectur.importe_dev,
						lectur.nro_cuenta,
						lectur.reconex_val,
						lectur.potencia_contratada,
						lectur.restitucion,
						lectur.fecha_vence,
						lectur.credito_pagado,
						lectur.saldo_imp_dev_ap,
						lectur.factor_potencia,
						lectur.lectura_anterior,
						lectur.promedio_val,
						lectur.cambio_kvar,
						lectur.cantidad_periodo,
						lectur.sw_debito_fiscal,
						lectur.id_lectura_fk,
						lectur.multi_kwh,
						lectur.ultima_lectura,
						lectur.fecha_anterior,
						lectur.nrodig_kvar,
						lectur.importe_dev_ap,
						lectur.consumo_peri,
						lectur.desc_restitucion,
						lectur.multi_kw,
						lectur.importe_total,
						lectur.consumo_anterior,
						lectur.gestion_lec,
						lectur.sw_potencia_maxima,
						lectur.saldo_imp_dev,
						lectur.consumo_dev,
						lectur.periodo_lec,
						lectur.multi_kvar,
						lectur.importe_interes,
						lectur.lectura_kw,
						lectur.lectura_actual,
						lectur.fecha_actual,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.tlectura lectur
						inner join segu.tusuario usu1 on usu1.id_usuario = lectur.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = lectur.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_LECTUR_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:40
	***********************************/

	elsif(p_transaccion='FACTUR_LECTUR_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_lectura)
					    from factur.tlectura lectur
					    inner join segu.tusuario usu1 on usu1.id_usuario = lectur.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = lectur.id_usuario_mod
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
ALTER FUNCTION "factur"."ft_lectura_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
