<?php
/**
*@package pXP
*@file gen-Lectura.php
*@author  (admin)
*@date 21-08-2025 02:52:40
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Lectura=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Lectura.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:this.tam_pag}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_lectura'
			},
			type:'Field',
			form:true 
		},
		{
			config: {
				name: 'id_categoria',
				fieldLabel: 'id_categoria',
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
				hiddenName: 'id_categoria',
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
			grid: true,
			form: true
		},
		{
			config: {
				name: 'id_cliente',
				fieldLabel: 'id_cliente',
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
				hiddenName: 'id_cliente',
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
			grid: true,
			form: true
		},
		{
			config:{
				name: 'potencia_val',
				fieldLabel: 'potencia_val',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.potencia_val',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fecha_proxmed',
				fieldLabel: 'fecha_proxmed',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
				type:'DateField',
				filters:{pfiltro:'lectur.fecha_proxmed',type:'date'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fecha_proxemi',
				fieldLabel: 'fecha_proxemi',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
				type:'DateField',
				filters:{pfiltro:'lectur.fecha_proxemi',type:'date'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'consumo_total',
				fieldLabel: 'consumo_total',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:655362
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.consumo_total',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_digitos',
				fieldLabel: 'nro_digitos',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.nro_digitos',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'lecant_kvar',
				fieldLabel: 'lecant_kvar',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.lecant_kvar',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'saldo_credito',
				fieldLabel: 'saldo_credito',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.saldo_credito',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'consumo_val',
				fieldLabel: 'consumo_val',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.consumo_val',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tipo_lectura',
				fieldLabel: 'tipo_lectura',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:65536
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.tipo_lectura',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'lectura_kwh',
				fieldLabel: 'lectura_kwh',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.lectura_kwh',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'lecant_kwh',
				fieldLabel: 'lecant_kwh',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.lecant_kwh',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'periodo_corte',
				fieldLabel: 'periodo_corte',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.periodo_corte',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'conexion_val',
				fieldLabel: 'conexion_val',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.conexion_val',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'cod_ubica',
				fieldLabel: 'cod_ubica',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'lectur.cod_ubica',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nrodig_kwh',
				fieldLabel: 'nrodig_kwh',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.nrodig_kwh',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'consumo_cambio',
				fieldLabel: 'consumo_cambio',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:655362
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.consumo_cambio',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'lectura_kvar',
				fieldLabel: 'lectura_kvar',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.lectura_kvar',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'importe_dev',
				fieldLabel: 'importe_dev',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.importe_dev',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_cuenta',
				fieldLabel: 'nro_cuenta',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.nro_cuenta',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'reconex_val',
				fieldLabel: 'reconex_val',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.reconex_val',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'potencia_contratada',
				fieldLabel: 'potencia_contratada',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.potencia_contratada',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'restitucion',
				fieldLabel: 'restitucion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:196610
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.restitucion',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fecha_vence',
				fieldLabel: 'fecha_vence',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
				type:'DateField',
				filters:{pfiltro:'lectur.fecha_vence',type:'date'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'credito_pagado',
				fieldLabel: 'credito_pagado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.credito_pagado',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'saldo_imp_dev_ap',
				fieldLabel: 'saldo_imp_dev_ap',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.saldo_imp_dev_ap',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'factor_potencia',
				fieldLabel: 'factor_potencia',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.factor_potencia',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'lectura_anterior',
				fieldLabel: 'lectura_anterior',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.lectura_anterior',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'promedio_val',
				fieldLabel: 'promedio_val',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.promedio_val',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'cambio_kvar',
				fieldLabel: 'cambio_kvar',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.cambio_kvar',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'cantidad_periodo',
				fieldLabel: 'cantidad_periodo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.cantidad_periodo',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'sw_debito_fiscal',
				fieldLabel: 'sw_debito_fiscal',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'lectur.sw_debito_fiscal',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config: {
				name: 'id_lectura_fk',
				fieldLabel: 'id_lectura_fk',
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
				hiddenName: 'id_lectura_fk',
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
			grid: true,
			form: true
		},
		{
			config:{
				name: 'multi_kwh',
				fieldLabel: 'multi_kwh',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.multi_kwh',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'ultima_lectura',
				fieldLabel: 'ultima_lectura',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.ultima_lectura',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fecha_anterior',
				fieldLabel: 'fecha_anterior',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
				type:'DateField',
				filters:{pfiltro:'lectur.fecha_anterior',type:'date'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nrodig_kvar',
				fieldLabel: 'nrodig_kvar',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.nrodig_kvar',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'importe_dev_ap',
				fieldLabel: 'importe_dev_ap',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.importe_dev_ap',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'consumo_peri',
				fieldLabel: 'consumo_peri',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:655362
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.consumo_peri',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'desc_restitucion',
				fieldLabel: 'desc_restitucion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:150
			},
				type:'TextField',
				filters:{pfiltro:'lectur.desc_restitucion',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'multi_kw',
				fieldLabel: 'multi_kw',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.multi_kw',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'importe_total',
				fieldLabel: 'importe_total',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.importe_total',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'consumo_anterior',
				fieldLabel: 'consumo_anterior',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.consumo_anterior',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'gestion_lec',
				fieldLabel: 'gestion_lec',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:262144
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.gestion_lec',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'sw_potencia_maxima',
				fieldLabel: 'sw_potencia_maxima',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'lectur.sw_potencia_maxima',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'saldo_imp_dev',
				fieldLabel: 'saldo_imp_dev',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.saldo_imp_dev',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'consumo_dev',
				fieldLabel: 'consumo_dev',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.consumo_dev',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'periodo_lec',
				fieldLabel: 'periodo_lec',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:131072
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.periodo_lec',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'multi_kvar',
				fieldLabel: 'multi_kvar',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.multi_kvar',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'importe_interes',
				fieldLabel: 'importe_interes',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.importe_interes',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'lectura_kw',
				fieldLabel: 'lectura_kw',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.lectura_kw',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'lectura_actual',
				fieldLabel: 'lectura_actual',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'lectur.lectura_actual',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fecha_actual',
				fieldLabel: 'fecha_actual',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
				type:'DateField',
				filters:{pfiltro:'lectur.fecha_actual',type:'date'},
				id_grupo:1,
				grid:true,
				form:true
		}
	],
	tam_pag:50,	
	title:'Lectura',
	ActSave:'../../sis_factur/control/Lectura/insertarLectura',
	ActDel:'../../sis_factur/control/Lectura/eliminarLectura',
	ActList:'../../sis_factur/control/Lectura/listarLectura',
	id_store:'id_lectura',
	fields: [
		{name:'id_lectura', type: 'string'},
		{name:'id_categoria', type: 'numeric'},
		{name:'id_cliente', type: 'string'},
		{name:'potencia_val', type: 'numeric'},
		{name:'fecha_proxmed', type: 'date',dateFormat:'Y-m-d'},
		{name:'fecha_proxemi', type: 'date',dateFormat:'Y-m-d'},
		{name:'consumo_total', type: 'numeric'},
		{name:'nro_digitos', type: 'numeric'},
		{name:'lecant_kvar', type: 'numeric'},
		{name:'saldo_credito', type: 'numeric'},
		{name:'consumo_val', type: 'numeric'},
		{name:'tipo_lectura', type: 'numeric'},
		{name:'lectura_kwh', type: 'numeric'},
		{name:'lecant_kwh', type: 'numeric'},
		{name:'periodo_corte', type: 'numeric'},
		{name:'conexion_val', type: 'numeric'},
		{name:'cod_ubica', type: 'string'},
		{name:'nrodig_kwh', type: 'numeric'},
		{name:'consumo_cambio', type: 'numeric'},
		{name:'lectura_kvar', type: 'numeric'},
		{name:'importe_dev', type: 'numeric'},
		{name:'nro_cuenta', type: 'numeric'},
		{name:'reconex_val', type: 'numeric'},
		{name:'potencia_contratada', type: 'numeric'},
		{name:'restitucion', type: 'numeric'},
		{name:'fecha_vence', type: 'date',dateFormat:'Y-m-d'},
		{name:'credito_pagado', type: 'numeric'},
		{name:'saldo_imp_dev_ap', type: 'numeric'},
		{name:'factor_potencia', type: 'numeric'},
		{name:'lectura_anterior', type: 'numeric'},
		{name:'promedio_val', type: 'numeric'},
		{name:'cambio_kvar', type: 'numeric'},
		{name:'cantidad_periodo', type: 'numeric'},
		{name:'sw_debito_fiscal', type: 'string'},
		{name:'id_lectura_fk', type: 'numeric'},
		{name:'multi_kwh', type: 'numeric'},
		{name:'ultima_lectura', type: 'numeric'},
		{name:'fecha_anterior', type: 'date',dateFormat:'Y-m-d'},
		{name:'nrodig_kvar', type: 'numeric'},
		{name:'importe_dev_ap', type: 'numeric'},
		{name:'consumo_peri', type: 'numeric'},
		{name:'desc_restitucion', type: 'string'},
		{name:'multi_kw', type: 'numeric'},
		{name:'importe_total', type: 'numeric'},
		{name:'consumo_anterior', type: 'numeric'},
		{name:'gestion_lec', type: 'numeric'},
		{name:'sw_potencia_maxima', type: 'string'},
		{name:'saldo_imp_dev', type: 'numeric'},
		{name:'consumo_dev', type: 'numeric'},
		{name:'periodo_lec', type: 'numeric'},
		{name:'multi_kvar', type: 'numeric'},
		{name:'importe_interes', type: 'numeric'},
		{name:'lectura_kw', type: 'numeric'},
		{name:'lectura_actual', type: 'numeric'},
		{name:'fecha_actual', type: 'date',dateFormat:'Y-m-d'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_lectura',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		