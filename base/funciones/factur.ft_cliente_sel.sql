CREATE OR REPLACE FUNCTION "factur"."ft_cliente_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_cliente_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tcliente'
 AUTOR: 		 (admin)
 FECHA:	        27-08-2025 14:40:07
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				27-08-2025 14:40:07								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.tcliente'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_cliente_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLIENT_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		27-08-2025 14:40:07
	***********************************/

	if(p_transaccion='FACTUR_CLIENT_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						client.id_cliente,
						client.estado_reg,
						client.id_categoria,
						client.id_ruta,
						client.id_param,
						client.nro_cuenta,
						client.nro_cuenta_ant,
						client.cod_ubica,
						client.nombre,
						client.paterno,
						client.materno,
						client.doc_iden,
						client.fecha_naci,
						client.telefono,
						client.celular,
						client.direccion,
						client.descripcion_dire,
						client.nomb_elec,
						client.nombre_factura,
						client.nro_nit,
						client.repre_legal,
						client.docid_legal,
						client.poten_instalada,
						client.poten_contratada,
						client.tension,
						client.cod_transforma,
						client.tipo_medidor,
						client.capacidad,
						client.disyuntor,
						client.relacion_cts1,
						client.relacion_cts2,
						client.relacion_pts1,
						client.relacion_pts2,
						client.importe_garantia,
						client.importe_conex,
						client.marca_med,
						client.nroserie_med,
						client.nro_digitos,
						client.marca_cts,
						client.nroserie_cts,
						client.marca_pts,
						client.nroserie_pts,
						client.marca_medact,
						client.nroserie_medact,
						client.marca_medreac,
						client.nroserie_medreac,
						client.multi_kwh,
						client.multi_kvar,
						client.multi_kw,
						client.nrodig_kwh,
						client.nrodig_kvar,
						client.fecha_hora_instala,
						client.fases_1r,
						client.fases_2s,
						client.fases_3t,
						client.fases_n,
						client.nroserie_med2,
						client.nroserie_cts2,
						client.nroserie_medact2,
						client.nroserie_medreac2,
						client.nro_precinto,
						client.sw_activa,
						client.sw_libre,
						client.sw_bajatemp,
						client.sw_bajadef,
						client.nroserie_pts2,
						client.razon_social,
						client.casada,
						client.id_trafo,
						client.id_lugar,
						client.mes_deuda,
						client.sw_debito_fiscal,
						client.id_ruta_b,
						client.observaciones,
						client.tipo_identificacion,
						client.distancia_trafo,
						client.tipo_suministro,
						client.tipo_medicion,
						client.tipo_consumidor,
						client.id_poste,
						client.dist_poste,
						client.lug_expedido,
						client.id_regional,
						client.coord_x,
						client.coord_y,
						client.coord_z,
						client.id_usuario_reg,
						client.fecha_reg,
						client.id_usuario_ai,
						client.usuario_ai,
						client.id_usuario_mod,
						client.fecha_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.tcliente client
						inner join segu.tusuario usu1 on usu1.id_usuario = client.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = client.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLIENT_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		27-08-2025 14:40:07
	***********************************/

	elsif(p_transaccion='FACTUR_CLIENT_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_cliente)
					    from factur.tcliente client
					    inner join segu.tusuario usu1 on usu1.id_usuario = client.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = client.id_usuario_mod
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
ALTER FUNCTION "factur"."ft_cliente_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
