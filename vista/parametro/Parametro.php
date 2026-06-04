<?php
/**
*@package pXP
*@file gen-Parametro.php
*@author  (admin)
*@date 21-08-2025 02:52:33
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Parametro=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Parametro.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:this.tam_pag}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_param'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'ciudad',
				fieldLabel: 'Sistema',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
				type:'TextField',
				filters:{pfiltro:'parame.ciudad',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'codigo_sistema',
				fieldLabel: 'Código Sistema',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:5
			},
				type:'TextField',
				filters:{pfiltro:'parame.codigo_sistema',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'gestion',
				fieldLabel: 'Gestion',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'parame.gestion',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'periodo',
				fieldLabel: 'Periodo',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'parame.periodo',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config: {
				name: 'id_moneda',
				fieldLabel: 'Moneda',
				allowBlank: false,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_parametros/control/Moneda/listarMoneda',
					id: 'id_moneda',
					root: 'datos',
					sortInfo: {
						field: 'moneda',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_moneda', 'moneda', 'codigo'],
					remoteSort: true,
					baseParams: {par_filtro: 'monpar.moneda#movtip.codigo'}
				}),
				valueField: 'id_moneda',
				displayField: 'moneda',
				gdisplayField: 'moneda',
				hiddenName: 'id_moneda',
				forceSelection: true,
				typeAhead: false,
				triggerAction: 'all',
				lazyRender: true,
				mode: 'remote',
				pageSize: 15,
				queryDelay: 1000,
				anchor: '100%',
				gwidth: 150,
				minChars: 2,
				renderer : function(value, p, record) {
					return String.format('{0}', record.data['moneda']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'monpar.moneda',type: 'string'},
			grid: true,
			form: true
		},

		{
			config:{
				name: 'tasa_interes',
				fieldLabel: 'Tasa de Interés',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:655364
			},
				type:'NumberField',
				filters:{pfiltro:'parame.tasa_interes',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		
		
		{
			config:{
				name: 'representante',
				fieldLabel: 'Representante Sistema',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:70
			},
				type:'TextField',
				filters:{pfiltro:'parame.representante',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		
		{
			config:{
				name: 'doc_iden',
				fieldLabel: 'C.I. Representante',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'parame.doc_iden',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'firma_tramite',
				fieldLabel: 'Responsable Facturación ',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:70
			},
				type:'TextField',
				filters:{pfiltro:'parame.firma_tramite',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'ci_tramite',
				fieldLabel: 'C.I. Responsable',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'parame.ci_tramite',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		{
			config:{
				name: 'celular_odeco',
				fieldLabel: 'celular_odeco',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'parame.celular_odeco',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'telefono_odeco',
				fieldLabel: 'Telefono Odeco',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'parame.telefono_odeco',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		{
			config:{
				name: 'direccion_sucursal',
				fieldLabel: 'Dirección Sucursal',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
				type:'TextField',
				filters:{pfiltro:'parame.direccion_sucursal',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'ubicacion_sucursal',
				fieldLabel: 'Ubicación Sucursal',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
				type:'TextField',
				filters:{pfiltro:'parame.ubicacion_sucursal',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		{
			config:{
				name: 'telefono_sucursal',
				fieldLabel: 'Telefono Sucursal',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'parame.telefono_sucursal',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		
	
	
		{
			config:{
				name: 'tiene_caja',
				fieldLabel: 'Tiene Caja',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:5
			},
				type:'TextField',
				filters:{pfiltro:'parame.tiene_caja',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_cuenta',
				fieldLabel: 'Nro Cuenta',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
				type:'NumberField',
				filters:{pfiltro:'parame.nro_cuenta',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_reclamo_03',
				fieldLabel: 'Nro Reclamo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
				type:'NumberField',
				filters:{pfiltro:'parame.nro_reclamo_03',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_contrato',
				fieldLabel: 'Nro Contrato',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
				type:'NumberField',
				filters:{pfiltro:'parame.nro_contrato',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_servicio',
				fieldLabel: 'Nro Servicio',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
				type:'NumberField',
				filters:{pfiltro:'parame.nro_servicio',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		{
			config:{
				name: 'nro_venta',
				fieldLabel: 'Nro Venta',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
				type:'NumberField',
				filters:{pfiltro:'parame.nro_venta',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_tramite',
				fieldLabel: 'Nro Tramite',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
				type:'NumberField',
				filters:{pfiltro:'parame.nro_tramite',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_recibo',
				fieldLabel: 'Nro Recibo',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
				type:'NumberField',
				filters:{pfiltro:'parame.nro_recibo',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		



		{
			config:{
				name: 'sis_facturacion_cobranza',
				fieldLabel: 'sis_facturacion_cobranza',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'parame.sis_facturacion_cobranza',type:'numeric'},
				id_grupo:1,
				grid:false,
				form:false
		},
		{
			config:{
				name: 'nro_sucursal_distribucion',
				fieldLabel: 'nro_sucursal_distribucion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'parame.nro_sucursal_distribucion',type:'numeric'},
				id_grupo:1,
				grid:false,
				form:false
		},
		{
			config: {
				name: 'id_fina_regi_prog_proy_acti',
				fieldLabel: 'id_fina_regi_prog_proy_acti',
				allowBlank: false,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_/control/Clase/Metodo',
					id: 'id_',
					root: 'datos',
					sortInfo: {
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_', 'nombre', 'codigo'],
					remoteSort: true,
					baseParams: {par_filtro: 'movtip.nombre#movtip.codigo'}
				}),
				valueField: 'id_',
				displayField: 'nombre',
				gdisplayField: 'desc_',
				hiddenName: 'id_fina_regi_prog_proy_acti',
				forceSelection: true,
				typeAhead: false,
				triggerAction: 'all',
				lazyRender: true,
				mode: 'remote',
				pageSize: 15,
				queryDelay: 1000,
				anchor: '100%',
				gwidth: 150,
				minChars: 2,
				renderer : function(value, p, record) {
					return String.format('{0}', record.data['desc_']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'movtip.nombre',type: 'string'},
			grid: false,
			form: false
		},
		{
			config:{
				name: 'nro_reclamo_02',
				fieldLabel: 'nro_reclamo_02',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'parame.nro_reclamo_02',type:'numeric'},
				id_grupo:1,
				grid:false,
				form:false
		},
		{
			config: {
				name: 'id_depto_regional',
				fieldLabel: 'id_depto_regional',
				allowBlank: true,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_/control/Clase/Metodo',
					id: 'id_',
					root: 'datos',
					sortInfo: {
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_', 'nombre', 'codigo'],
					remoteSort: true,
					baseParams: {par_filtro: 'movtip.nombre#movtip.codigo'}
				}),
				valueField: 'id_',
				displayField: 'nombre',
				gdisplayField: 'desc_',
				hiddenName: 'id_depto_regional',
				forceSelection: true,
				typeAhead: false,
				triggerAction: 'all',
				lazyRender: true,
				mode: 'remote',
				pageSize: 15,
				queryDelay: 1000,
				anchor: '100%',
				gwidth: 150,
				minChars: 2,
				renderer : function(value, p, record) {
					return String.format('{0}', record.data['desc_']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'movtip.nombre',type: 'string'},
			grid: false,
			form: false
		},
		{
			config:{
				name: 'lugar',
				fieldLabel: 'lugar',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
				type:'TextField',
				filters:{pfiltro:'parame.lugar',type:'string'},
				id_grupo:1,
				grid:false,
				form:false
		},
		{
			config:{
				name: 'cod_empresa',
				fieldLabel: 'cod_empresa',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1
			},
				type:'TextField',
				filters:{pfiltro:'parame.cod_empresa',type:'string'},
				id_grupo:1,
				grid:false,
				form:false
		}
	],
	tam_pag:50,	
	title:'Parametro',
	ActSave:'../../sis_factur/control/Parametro/insertarParametro',
	ActDel:'../../sis_factur/control/Parametro/eliminarParametro',
	ActList:'../../sis_factur/control/Parametro/listarParametro',
	id_store:'id_param',
	fields: [
		{name:'id_param', type: 'numeric'},
		{name:'tasa_interes', type: 'numeric'},
		{name:'telefono_sucursal', type: 'string'},
		{name:'nro_reclamo_03', type: 'numeric'},
		{name:'nro_cuenta', type: 'numeric'},
		{name:'gestion', type: 'numeric'},
		{name:'lugar', type: 'string'},
		{name:'doc_iden', type: 'string'},
		{name:'nro_reclamo_02', type: 'numeric'},
		{name:'nro_contrato', type: 'numeric'},
		{name:'nro_servicio', type: 'numeric'},
		{name:'id_fina_regi_prog_proy_acti', type: 'numeric'},
		{name:'nro_venta', type: 'numeric'},
		{name:'celular_odeco', type: 'string'},
		{name:'ci_tramite', type: 'string'},
		{name:'sis_facturacion_cobranza', type: 'numeric'},
		{name:'ubicacion_sucursal', type: 'string'},
		{name:'nro_sucursal_distribucion', type: 'numeric'},
		{name:'id_depto_regional', type: 'numeric'},
		{name:'nro_tramite', type: 'numeric'},
		{name:'id_moneda', type: 'numeric'},
		{name:'representante', type: 'string'},
		{name:'codigo_sistema', type: 'string'},
		{name:'firma_tramite', type: 'string'},
		{name:'direccion_sucursal', type: 'string'},
		{name:'periodo', type: 'numeric'},
		{name:'ciudad', type: 'string'},
		{name:'tiene_caja', type: 'string'},
		{name:'nro_recibo', type: 'numeric'},
		{name:'telefono_odeco', type: 'string'},
		{name:'cod_empresa', type: 'string'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_param',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		