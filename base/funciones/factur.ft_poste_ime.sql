CREATE OR REPLACE FUNCTION "factur"."ft_poste_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Sistema de Lecturacion y Facturacion
 FUNCION: 		factur.ft_poste_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tposte'
 AUTOR: 		 (admin)
 FECHA:	        21-08-2025 02:52:35
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:
#ISSUE				FECHA				AUTOR				DESCRIPCION
 #0				21-08-2025 02:52:35								Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'factur.tposte'	
 #
 ***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_poste	integer;
			    
BEGIN

    v_nombre_funcion = 'factur.ft_poste_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'FACTUR_POSTE_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:35
	***********************************/

	if(p_transaccion='FACTUR_POSTE_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into factur.tposte(
			estructura_mt,
			estado_reg,
			id_usr_reg,
			id_lugar,
			id_centro_transformacion,
			dist_postante,
			tipo,
			codigo_poste,
			id_usr_mod,
			id_trafo,
			estructura_bt,
			fecha_reg,
			fecha_mod
          	) values(
			v_parametros.estructura_mt,
			'activo',
			v_parametros.id_usr_reg,
			v_parametros.id_lugar,
			v_parametros.id_centro_transformacion,
			v_parametros.dist_postante,
			v_parametros.tipo,
			v_parametros.codigo_poste,
			v_parametros.id_usr_mod,
			v_parametros.id_trafo,
			v_parametros.estructura_bt,
			now(),
			null
							
			
			
			)RETURNING id_poste into v_id_poste;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Poste almacenado(a) con exito (id_poste'||v_id_poste||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_poste',v_id_poste::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_POSTE_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:35
	***********************************/

	elsif(p_transaccion='FACTUR_POSTE_MOD')then

		begin
			--Sentencia de la modificacion
			update factur.tposte set
			estructura_mt = v_parametros.estructura_mt,
			id_usr_reg = v_parametros.id_usr_reg,
			id_lugar = v_parametros.id_lugar,
			id_centro_transformacion = v_parametros.id_centro_transformacion,
			dist_postante = v_parametros.dist_postante,
			tipo = v_parametros.tipo,
			codigo_poste = v_parametros.codigo_poste,
			id_usr_mod = v_parametros.id_usr_mod,
			id_trafo = v_parametros.id_trafo,
			estructura_bt = v_parametros.estructura_bt,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai
			where id_poste=v_parametros.id_poste;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Poste modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_poste',v_parametros.id_poste::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'FACTUR_POSTE_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		21-08-2025 02:52:35
	***********************************/

	elsif(p_transaccion='FACTUR_POSTE_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from factur.tposte
            where id_poste=v_parametros.id_poste;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Poste eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_poste',v_parametros.id_poste::varchar);
              
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
ALTER FUNCTION "factur"."ft_poste_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
