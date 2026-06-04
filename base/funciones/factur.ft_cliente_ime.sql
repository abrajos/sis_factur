CREATE OR REPLACE FUNCTION "factur"."ft_cliente_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_cliente_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tcliente'
 AUTOR: 		 (admin)
 FECHA:	        27-08-2025 14:40:07
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				27-08-2025 14:40:07								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tcliente'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_cliente	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_cliente_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLIENT_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		27-08-2025 14:40:07
	***********************************/

	if(p_transaccion='FACTUR_CLIENT_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tcliente(
			estado_reg,
			id_categoria,
			id_ruta,
			id_param,
			nro_cuenta,
			nro_cuenta_ant,
			cod_ubica,
			nombre,
			paterno,
			materno,
			doc_iden,
			fecha_naci,
			telefono,
			celular,
			direccion,
			descripcion_dire,
			nomb_elec,
			nombre_factura,
			nro_nit,
			repre_legal,
			docid_legal,
			poten_instalada,
			poten_contratada,
			tension,
			cod_transforma,
			tipo_medidor,
			capacidad,
			disyuntor,
			relacion_cts1,
			relacion_cts2,
			relacion_pts1,
			relacion_pts2,
			importe_garantia,
			importe_conex,
			marca_med,
			nroserie_med,
			nro_digitos,
			marca_cts,
			nroserie_cts,
			marca_pts,
			nroserie_pts,
			marca_medact,
			nroserie_medact,
			marca_medreac,
			nroserie_medreac,
			multi_kwh,
			multi_kvar,
			multi_kw,
			nrodig_kwh,
			nrodig_kvar,
			fecha_hora_instala,
			fases_1r,
			fases_2s,
			fases_3t,
			fases_n,
			nroserie_med2,
			nroserie_cts2,
			nroserie_medact2,
			nroserie_medreac2,
			nro_precinto,
			sw_activa,
			sw_libre,
			sw_bajatemp,
			sw_bajadef,
			nroserie_pts2,
			razon_social,
			casada,
			id_trafo,
			id_lugar,
			mes_deuda,
			sw_debito_fiscal,
			id_ruta_b,
			observaciones,
			tipo_identificacion,
			distancia_trafo,
			tipo_suministro,
			tipo_medicion,
			tipo_consumidor,
			id_poste,
			dist_poste,
			lug_expedido,
			id_regional,
			coord_x,
			coord_y,
			coord_z,
			id_usuario_reg,
			fecha_reg,
			id_usuario_ai,
			usuario_ai,
			id_usuario_mod,
			fecha_mod
          	) values(
			'activo',
			v_parametros.id_categoria,
			v_parametros.id_ruta,
			v_parametros.id_param,
			v_parametros.nro_cuenta,
			v_parametros.nro_cuenta_ant,
			v_parametros.cod_ubica,
			v_parametros.nombre,
			v_parametros.paterno,
			v_parametros.materno,
			v_parametros.doc_iden,
			v_parametros.fecha_naci,
			v_parametros.telefono,
			v_parametros.celular,
			v_parametros.direccion,
			v_parametros.descripcion_dire,
			v_parametros.nomb_elec,
			v_parametros.nombre_factura,
			v_parametros.nro_nit,
			v_parametros.repre_legal,
			v_parametros.docid_legal,
			v_parametros.poten_instalada,
			v_parametros.poten_contratada,
			v_parametros.tension,
			v_parametros.cod_transforma,
			v_parametros.tipo_medidor,
			v_parametros.capacidad,
			v_parametros.disyuntor,
			v_parametros.relacion_cts1,
			v_parametros.relacion_cts2,
			v_parametros.relacion_pts1,
			v_parametros.relacion_pts2,
			v_parametros.importe_garantia,
			v_parametros.importe_conex,
			v_parametros.marca_med,
			v_parametros.nroserie_med,
			v_parametros.nro_digitos,
			v_parametros.marca_cts,
			v_parametros.nroserie_cts,
			v_parametros.marca_pts,
			v_parametros.nroserie_pts,
			v_parametros.marca_medact,
			v_parametros.nroserie_medact,
			v_parametros.marca_medreac,
			v_parametros.nroserie_medreac,
			v_parametros.multi_kwh,
			v_parametros.multi_kvar,
			v_parametros.multi_kw,
			v_parametros.nrodig_kwh,
			v_parametros.nrodig_kvar,
			v_parametros.fecha_hora_instala,
			v_parametros.fases_1r,
			v_parametros.fases_2s,
			v_parametros.fases_3t,
			v_parametros.fases_n,
			v_parametros.nroserie_med2,
			v_parametros.nroserie_cts2,
			v_parametros.nroserie_medact2,
			v_parametros.nroserie_medreac2,
			v_parametros.nro_precinto,
			v_parametros.sw_activa,
			v_parametros.sw_libre,
			v_parametros.sw_bajatemp,
			v_parametros.sw_bajadef,
			v_parametros.nroserie_pts2,
			v_parametros.razon_social,
			v_parametros.casada,
			v_parametros.id_trafo,
			v_parametros.id_lugar,
			v_parametros.mes_deuda,
			v_parametros.sw_debito_fiscal,
			v_parametros.id_ruta_b,
			v_parametros.observaciones,
			v_parametros.tipo_identificacion,
			v_parametros.distancia_trafo,
			v_parametros.tipo_suministro,
			v_parametros.tipo_medicion,
			v_parametros.tipo_consumidor,
			v_parametros.id_poste,
			v_parametros.dist_poste,
			v_parametros.lug_expedido,
			v_parametros.id_regional,
			v_parametros.coord_x,
			v_parametros.coord_y,
			v_parametros.coord_z,
			p_id_usuario,
			now(),
			v_parametros._id_usuario_ai,
			v_parametros._nombre_usuario_ai,
			null,
			null
							
			
			
			)RETURNING id_cliente into v_id_cliente;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Cliente almacenado(a) con exito (id_cliente'||v_id_cliente||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_cliente',v_id_cliente::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLIENT_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		27-08-2025 14:40:07
	***********************************/

	elsif(p_transaccion='FACTUR_CLIENT_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tcliente set
			id_categoria = v_parametros.id_categoria,
			id_ruta = v_parametros.id_ruta,
			id_param = v_parametros.id_param,
			nro_cuenta = v_parametros.nro_cuenta,
			nro_cuenta_ant = v_parametros.nro_cuenta_ant,
			cod_ubica = v_parametros.cod_ubica,
			nombre = v_parametros.nombre,
			paterno = v_parametros.paterno,
			materno = v_parametros.materno,
			doc_iden = v_parametros.doc_iden,
			fecha_naci = v_parametros.fecha_naci,
			telefono = v_parametros.telefono,
			celular = v_parametros.celular,
			direccion = v_parametros.direccion,
			descripcion_dire = v_parametros.descripcion_dire,
			nomb_elec = v_parametros.nomb_elec,
			nombre_factura = v_parametros.nombre_factura,
			nro_nit = v_parametros.nro_nit,
			repre_legal = v_parametros.repre_legal,
			docid_legal = v_parametros.docid_legal,
			poten_instalada = v_parametros.poten_instalada,
			poten_contratada = v_parametros.poten_contratada,
			tension = v_parametros.tension,
			cod_transforma = v_parametros.cod_transforma,
			tipo_medidor = v_parametros.tipo_medidor,
			capacidad = v_parametros.capacidad,
			disyuntor = v_parametros.disyuntor,
			relacion_cts1 = v_parametros.relacion_cts1,
			relacion_cts2 = v_parametros.relacion_cts2,
			relacion_pts1 = v_parametros.relacion_pts1,
			relacion_pts2 = v_parametros.relacion_pts2,
			importe_garantia = v_parametros.importe_garantia,
			importe_conex = v_parametros.importe_conex,
			marca_med = v_parametros.marca_med,
			nroserie_med = v_parametros.nroserie_med,
			nro_digitos = v_parametros.nro_digitos,
			marca_cts = v_parametros.marca_cts,
			nroserie_cts = v_parametros.nroserie_cts,
			marca_pts = v_parametros.marca_pts,
			nroserie_pts = v_parametros.nroserie_pts,
			marca_medact = v_parametros.marca_medact,
			nroserie_medact = v_parametros.nroserie_medact,
			marca_medreac = v_parametros.marca_medreac,
			nroserie_medreac = v_parametros.nroserie_medreac,
			multi_kwh = v_parametros.multi_kwh,
			multi_kvar = v_parametros.multi_kvar,
			multi_kw = v_parametros.multi_kw,
			nrodig_kwh = v_parametros.nrodig_kwh,
			nrodig_kvar = v_parametros.nrodig_kvar,
			fecha_hora_instala = v_parametros.fecha_hora_instala,
			fases_1r = v_parametros.fases_1r,
			fases_2s = v_parametros.fases_2s,
			fases_3t = v_parametros.fases_3t,
			fases_n = v_parametros.fases_n,
			nroserie_med2 = v_parametros.nroserie_med2,
			nroserie_cts2 = v_parametros.nroserie_cts2,
			nroserie_medact2 = v_parametros.nroserie_medact2,
			nroserie_medreac2 = v_parametros.nroserie_medreac2,
			nro_precinto = v_parametros.nro_precinto,
			sw_activa = v_parametros.sw_activa,
			sw_libre = v_parametros.sw_libre,
			sw_bajatemp = v_parametros.sw_bajatemp,
			sw_bajadef = v_parametros.sw_bajadef,
			nroserie_pts2 = v_parametros.nroserie_pts2,
			razon_social = v_parametros.razon_social,
			casada = v_parametros.casada,
			id_trafo = v_parametros.id_trafo,
			id_lugar = v_parametros.id_lugar,
			mes_deuda = v_parametros.mes_deuda,
			sw_debito_fiscal = v_parametros.sw_debito_fiscal,
			id_ruta_b = v_parametros.id_ruta_b,
			observaciones = v_parametros.observaciones,
			tipo_identificacion = v_parametros.tipo_identificacion,
			distancia_trafo = v_parametros.distancia_trafo,
			tipo_suministro = v_parametros.tipo_suministro,
			tipo_medicion = v_parametros.tipo_medicion,
			tipo_consumidor = v_parametros.tipo_consumidor,
			id_poste = v_parametros.id_poste,
			dist_poste = v_parametros.dist_poste,
			lug_expedido = v_parametros.lug_expedido,
			id_regional = v_parametros.id_regional,
			coord_x = v_parametros.coord_x,
			coord_y = v_parametros.coord_y,
			coord_z = v_parametros.coord_z,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_cliente=v_parametros.id_cliente;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Cliente modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_cliente',v_parametros.id_cliente::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_CLIENT_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		27-08-2025 14:40:07
	***********************************/

	elsif(p_transaccion='FACTUR_CLIENT_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tcliente
            where id_cliente=v_parametros.id_cliente;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Cliente eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_cliente',v_parametros.id_cliente::varchar);
              
            --Devuelve la respuesta
            return v_resp;

		end;
         
	else
     
    	raise exception 'Transaccion inexistente: %',p_transaccion;

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
ALTER FUNCTION "factur"."ft_cliente_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
