CREATE OR REPLACE FUNCTION "factur"."ft_tramite_log_fs_sel"(	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$
/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_tramite_log_fs_sel
 DESCRIPCION:   Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.ttramite_log_fs'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 03:12:58
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 03:12:58								Funcion que devuelve conjuntos de registros de las consultas relacionadas con la tabla 'factur.ttramite_log_fs'	
 #
 ***************************************************************************/

DECLARE

	v_consulta    		varchar;
	v_parametros  		record;
	v_nombre_funcion   	text;
	v_resp				varchar;
			    
BEGIN

	v_nombre_funcion = 'factur.ft_tramite_log_fs_sel';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_TRA_LOG_SEL'
 	#DESCRIPCION:	Consulta de datos
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:12:58
	***********************************/

	if(p_transaccion='FACTUR_TRA_LOG_SEL')then
     				
    	begin
    		--Sentencia de la consulta
			v_consulta:='select
						tra_log.id_log_fs,
						tra_log.fecha_cambio,
						tra_log.fecha_solicitud_anterior,
						tra_log.motivo_cambio_fecha,
						tra_log.estado_reg,
						tra_log.usuario,
						tra_log.id_nro_tramite,
						tra_log.id_usuario_ai,
						tra_log.usuario_ai,
						tra_log.fecha_reg,
						tra_log.id_usuario_reg,
						tra_log.id_usuario_mod,
						tra_log.fecha_mod,
						usu1.cuenta as usr_reg,
						usu2.cuenta as usr_mod	
						from factur.ttramite_log_fs tra_log
						inner join segu.tusuario usu1 on usu1.id_usuario = tra_log.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = tra_log.id_usuario_mod
				        where  ';
			
			--Definicion de la respuesta
			v_consulta:=v_consulta||v_parametros.filtro;
			v_consulta:=v_consulta||' order by ' ||v_parametros.ordenacion|| ' ' || v_parametros.dir_ordenacion || ' limit ' || v_parametros.cantidad || ' offset ' || v_parametros.puntero;

			--Devuelve la respuesta
			return v_consulta;
						
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_TRA_LOG_CONT'
 	#DESCRIPCION:	Conteo de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 03:12:58
	***********************************/

	elsif(p_transaccion='FACTUR_TRA_LOG_CONT')then

		begin
			--Sentencia de la consulta de conteo de registros
			v_consulta:='select count(id_log_fs)
					    from factur.ttramite_log_fs tra_log
					    inner join segu.tusuario usu1 on usu1.id_usuario = tra_log.id_usuario_reg
						left join segu.tusuario usu2 on usu2.id_usuario = tra_log.id_usuario_mod
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
ALTER FUNCTION "factur"."ft_tramite_log_fs_sel"(integer, integer, character varying, character varying) OWNER TO postgres;
