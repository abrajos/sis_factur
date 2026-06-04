<?php
/**
*@package pXP
*@file gen-Cliente.php
*@author  (admin)
*@date 27-08-2025 14:40:07
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Cliente=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Cliente.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:this.tam_pag}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_cliente'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'nro_cuenta',
				fieldLabel: 'Nro. Cuenta',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'client.nro_cuenta',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_cuenta_ant',
				fieldLabel: 'Nro. Cuenta Ant.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.nro_cuenta_ant',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nombre',
				fieldLabel: 'Nombre',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.nombre',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'paterno',
				fieldLabel: 'Ap. Paterno',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.paterno',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'materno',
				fieldLabel: 'Ap. Materno',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.materno',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'casada',
				fieldLabel: 'Ap. de Casada',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.casada',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'doc_iden',
				fieldLabel: 'C.I.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:15
			},
				type:'TextField',
				filters:{pfiltro:'client.doc_iden',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'razon_social',
				fieldLabel: 'Razon Social',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
				type:'TextField',
				filters:{pfiltro:'client.razon_social',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nombre_factura',
				fieldLabel: 'Nombre Factura',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
				type:'TextField',
				filters:{pfiltro:'client.nombre_factura',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_nit',
				fieldLabel: 'NIT',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:786432
			},
				type:'NumberField',
				filters:{pfiltro:'client.nro_nit',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'repre_legal',
				fieldLabel: 'Representante Legal',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
				type:'TextField',
				filters:{pfiltro:'client.repre_legal',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'docid_legal',
				fieldLabel: 'C.I. Legal',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:15
			},
				type:'TextField',
				filters:{pfiltro:'client.docid_legal',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'estado_reg',
				fieldLabel: 'Estado Reg.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
				type:'TextField',
				filters:{pfiltro:'client.estado_reg',type:'string'},
				id_grupo:1,
				grid:true,
				form:false
		},
		{
			config: {
				name: 'id_categoria',
				fieldLabel: 'Categoria',
				allowBlank: false,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_factur/control/Categoria/listarCategoria',
					id: 'id_categoria',
					root: 'datos',
					sortInfo: {
						field: 'desc_categoria',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_categoria', 'desc_categoria', 'codigo'],
					remoteSort: true,
					baseParams: {par_filtro: 'catego.desc_categoria#catego.codigo'}
				}),
				valueField: 'id_categoria',
				displayField: 'desc_categoria',
				gdisplayField: 'desc_categoria',
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
					return String.format('{0}', record.data['desc_categoria']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'catego.desc_categoria',type: 'string'},
			grid: true,
			form: true
		},
		{
			config: {
				name: 'id_ruta',
				fieldLabel: 'Ruta',
				allowBlank: false,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_factur/control/Ruta/listarRuta',
					id: 'id_ruta',
					root: 'datos',
					sortInfo: {
						field: 'desc_ruta',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_ruta', 'desc_ruta', 'cod_ruta'],
					remoteSort: true,
					baseParams: {par_filtro: 'ruta.desc_ruta#ruta.cod_ruta'}
				}),
				valueField: 'id_ruta',
				displayField: 'desc_ruta',
				gdisplayField: 'desc_ruta',
				hiddenName: 'id_ruta',
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
					return String.format('{0}', record.data['desc_ruta']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'ruta.desc_ruta',type: 'string'},
			grid: true,
			form: true
		},
		{
			config: {
				name: 'id_param',
				fieldLabel: 'id_param',
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
				hiddenName: 'id_param',
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
				name: 'cod_ubica',
				fieldLabel: 'Cod. Ubicación',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.cod_ubica',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		{
			config:{
				name: 'fecha_naci',
				fieldLabel: 'Fecha Nacimiento',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
				type:'DateField',
				filters:{pfiltro:'client.fecha_naci',type:'date'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'telefono',
				fieldLabel: 'Telefono',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'client.telefono',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'celular',
				fieldLabel: 'Celular',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'client.celular',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'direccion',
				fieldLabel: 'Dirección',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:150
			},
				type:'TextField',
				filters:{pfiltro:'client.direccion',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'descripcion_dire',
				fieldLabel: 'Descripción Dirección',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:300
			},
				type:'TextField',
				filters:{pfiltro:'client.descripcion_dire',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
	
		{
			config:{
				name: 'poten_instalada',
				fieldLabel: 'Potencia Instalada',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:524290
			},
				type:'NumberField',
				filters:{pfiltro:'client.poten_instalada',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'poten_contratada',
				fieldLabel: 'Potencia Contratada',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:524290
			},
				type:'NumberField',
				filters:{pfiltro:'client.poten_contratada',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tension',
				fieldLabel: 'Tensión',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.tension',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'cod_transforma',
				fieldLabel: 'Cod. Transformador',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
				type:'TextField',
				filters:{pfiltro:'client.cod_transforma',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tipo_medidor',
				fieldLabel: 'Tipo Medidor',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:65536
			},
				type:'NumberField',
				filters:{pfiltro:'client.tipo_medidor',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'capacidad',
				fieldLabel: 'Capacidad',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.capacidad',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'disyuntor',
				fieldLabel: 'Disyuntor',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'client.disyuntor',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'relacion_cts1',
				fieldLabel: 'CTS1',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'client.relacion_cts1',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'relacion_cts2',
				fieldLabel: 'CTS2',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'client.relacion_cts2',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'relacion_pts1',
				fieldLabel: 'PTS1',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'client.relacion_pts1',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'relacion_pts2',
				fieldLabel: 'PTS2',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'client.relacion_pts2',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'importe_garantia',
				fieldLabel: 'Importe Garantia',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'client.importe_garantia',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'importe_conex',
				fieldLabel: 'Importe Conexión',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:524290
			},
				type:'NumberField',
				filters:{pfiltro:'client.importe_conex',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'marca_med',
				fieldLabel: 'Marca Medidor',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.marca_med',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_med',
				fieldLabel: 'Nro Serie Medidor',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_med',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_digitos',
				fieldLabel: 'Nro Digitos',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'client.nro_digitos',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nomb_elec',
				fieldLabel: 'Nombre Electrico',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
				type:'TextField',
				filters:{pfiltro:'client.nomb_elec',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'marca_cts',
				fieldLabel: 'Marca CTS',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.marca_cts',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_cts',
				fieldLabel: 'Nro Serie CTS',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_cts',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'marca_pts',
				fieldLabel: 'Marca PTS',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.marca_pts',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_pts',
				fieldLabel: 'Nro Serie PTS',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_pts',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'marca_medact',
				fieldLabel: 'Marca Medidor ACT',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.marca_medact',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_medact',
				fieldLabel: 'Nro Serie ACT',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_medact',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'marca_medreac',
				fieldLabel: 'Marca Medidor REACT',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.marca_medreac',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_medreac',
				fieldLabel: 'Nro Serie REACT',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_medreac',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'multi_kwh',
				fieldLabel: 'Multiplicador Kwh',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'client.multi_kwh',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'multi_kvar',
				fieldLabel: 'Multiplicador Kvar',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'client.multi_kvar',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'multi_kw',
				fieldLabel: 'Multiplicador Kw',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'client.multi_kw',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nrodig_kwh',
				fieldLabel: 'Nro Digitos Kwh',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'client.nrodig_kwh',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nrodig_kvar',
				fieldLabel: 'Nro Digito Kvar',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'client.nrodig_kvar',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fecha_hora_instala',
				fieldLabel: 'Fecha Hora Instalada',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y H:i:s'):''}
			},
				type:'DateField',
				filters:{pfiltro:'client.fecha_hora_instala',type:'date'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fases_1r',
				fieldLabel: 'Fases 1r',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.fases_1r',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fases_2s',
				fieldLabel: 'Fases 2s',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.fases_2s',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fases_3t',
				fieldLabel: 'Fases 3t',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.fases_3t',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fases_n',
				fieldLabel: 'Fases N',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.fases_n',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_med2',
				fieldLabel: 'Nro Serie Med 2',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_med2',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_cts2',
				fieldLabel: 'Nro Serie CTS2',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_cts2',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_medact2',
				fieldLabel: 'Nro Serie Med ACT2',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_medact2',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_medreac2',
				fieldLabel: 'Nro Serie Med REAC2',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_medreac2',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nro_precinto',
				fieldLabel: 'Nro Precinto',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
				type:'TextField',
				filters:{pfiltro:'client.nro_precinto',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'sw_activa',
				fieldLabel: 'Sw Activa',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.sw_activa',type:'string'},
				id_grupo:1,
				grid:false,
				form:false
		},
		{
			config:{
				name: 'sw_libre',
				fieldLabel: 'Sw Libre',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.sw_libre',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'sw_bajatemp',
				fieldLabel: 'Baja Temp',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.sw_bajatemp',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'sw_bajadef',
				fieldLabel: 'Baja Definitiva',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.sw_bajadef',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'nroserie_pts2',
				fieldLabel: 'Nro Serie PTS2',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:18
			},
				type:'TextField',
				filters:{pfiltro:'client.nroserie_pts2',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		
		{
			config: {
				name: 'id_trafo',
				fieldLabel: 'Trafo',
				allowBlank: true,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_factur/control/Trafo/listarTrafo',
					id: 'id_trafo',
					root: 'datos',
					sortInfo: {
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_trafo', 'nombre', 'codigo'],
					remoteSort: true,
					baseParams: {par_filtro: 'trafo.nombre#trafo.codigo'}
				}),
				valueField: 'id_trafo',
				displayField: 'nombre',
				gdisplayField: 'nombre',
				hiddenName: 'id_trafo',
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
					return String.format('{0}', record.data['nombre']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'trafo.nombre',type: 'string'},
			grid: true,
			form: true
		},
		{
			config: {
				name: 'id_lugar',
				fieldLabel: 'id_lugar',
				allowBlank: true,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_factur/control/Lugar/listarLugar',
					id: 'id_lugar',
					root: 'datos',
					sortInfo: {
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_lugar', 'nombre', 'codigo'],
					remoteSort: true,
					baseParams: {par_filtro: 'lugar.nombre#lugar.codigo'}
				}),
				valueField: 'id_lugar',
				displayField: 'nombre',
				gdisplayField: 'nombre',
				hiddenName: 'id_lugar',
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
					return String.format('{0}', record.data['nombre']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'lugar.nombre',type: 'string'},
			grid: true,
			form: true
		},
		{
			config:{
				name: 'mes_deuda',
				fieldLabel: 'Mes Deuda',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
				type:'TextField',
				filters:{pfiltro:'client.mes_deuda',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'sw_debito_fiscal',
				fieldLabel: 'Debito Fiscal',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.sw_debito_fiscal',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config: {
				name: 'id_ruta_b',
				fieldLabel: 'id_ruta_b',
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
				hiddenName: 'id_ruta_b',
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
				name: 'observaciones',
				fieldLabel: 'Observaciones',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
				type:'TextField',
				filters:{pfiltro:'client.observaciones',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tipo_identificacion',
				fieldLabel: 'Tipo Identificación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:5
			},
				type:'TextField',
				filters:{pfiltro:'client.tipo_identificacion',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'distancia_trafo',
				fieldLabel: 'Distancia Trafo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'client.distancia_trafo',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tipo_suministro',
				fieldLabel: 'Tipo Suministro',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:5
			},
				type:'TextField',
				filters:{pfiltro:'client.tipo_suministro',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tipo_medicion',
				fieldLabel: 'Tipo Medición',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:5
			},
				type:'TextField',
				filters:{pfiltro:'client.tipo_medicion',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tipo_consumidor',
				fieldLabel: 'Tipo Consumidor',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1
			},
				type:'TextField',
				filters:{pfiltro:'client.tipo_consumidor',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config: {
				name: 'id_poste',
				fieldLabel: 'id_poste',
				allowBlank: true,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_factur/control/Poste/listarPoste',
					id: 'id_poste',
					root: 'datos',
					sortInfo: {
						field: 'codigo_poste',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_poste', 'codigo_poste'],
					remoteSort: true,
					baseParams: {par_filtro: 'poste.codigo_poste'}
				}),
				valueField: 'id_poste',
				displayField: 'codigo_poste',
				gdisplayField: 'codigo_poste',
				hiddenName: 'id_poste',
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
					return String.format('{0}', record.data['codigo_poste']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'poste.codigo_poste',type: 'string'},
			grid: true,
			form: true
		},
		{
			config:{
				name: 'dist_poste',
				fieldLabel: 'Distancia Poste',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
				type:'TextField',
				filters:{pfiltro:'client.dist_poste',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'lug_expedido',
				fieldLabel: 'Lugar Expedido',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'client.lug_expedido',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config: {
				name: 'id_regional',
				fieldLabel: 'id_regional',
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
				hiddenName: 'id_regional',
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
				name: 'coord_x',
				fieldLabel: 'Coordenada X',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1114121
			},
				type:'NumberField',
				filters:{pfiltro:'client.coord_x',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'coord_y',
				fieldLabel: 'Coordenada Y',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1114121
			},
				type:'NumberField',
				filters:{pfiltro:'client.coord_y',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'coord_z',
				fieldLabel: 'Coordenada Z',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1114121
			},
				type:'NumberField',
				filters:{pfiltro:'client.coord_z',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'usr_reg',
				fieldLabel: 'Creado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'Field',
				filters:{pfiltro:'usu1.cuenta',type:'string'},
				id_grupo:1,
				grid:true,
				form:false
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y H:i:s'):''}
			},
				type:'DateField',
				filters:{pfiltro:'client.fecha_reg',type:'date'},
				id_grupo:1,
				grid:true,
				form:false
		},
		{
			config:{
				name: 'id_usuario_ai',
				fieldLabel: 'Fecha creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'Field',
				filters:{pfiltro:'client.id_usuario_ai',type:'numeric'},
				id_grupo:1,
				grid:false,
				form:false
		},
		{
			config:{
				name: 'usuario_ai',
				fieldLabel: 'Funcionaro AI',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:300
			},
				type:'TextField',
				filters:{pfiltro:'client.usuario_ai',type:'string'},
				id_grupo:1,
				grid:true,
				form:false
		},
		{
			config:{
				name: 'usr_mod',
				fieldLabel: 'Modificado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'Field',
				filters:{pfiltro:'usu2.cuenta',type:'string'},
				id_grupo:1,
				grid:true,
				form:false
		},
		{
			config:{
				name: 'fecha_mod',
				fieldLabel: 'Fecha Modif.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y H:i:s'):''}
			},
				type:'DateField',
				filters:{pfiltro:'client.fecha_mod',type:'date'},
				id_grupo:1,
				grid:true,
				form:false
		}
	],
	tam_pag:50,	
	title:'Cliente',
	ActSave:'../../sis_factur/control/Cliente/insertarCliente',
	ActDel:'../../sis_factur/control/Cliente/eliminarCliente',
	ActList:'../../sis_factur/control/Cliente/listarCliente',
	id_store:'id_cliente',
	fields: [
		{name:'id_cliente', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_categoria', type: 'numeric'},
		{name:'id_ruta', type: 'numeric'},
		{name:'id_param', type: 'numeric'},
		{name:'nro_cuenta', type: 'numeric'},
		{name:'nro_cuenta_ant', type: 'string'},
		{name:'cod_ubica', type: 'string'},
		{name:'nombre', type: 'string'},
		{name:'paterno', type: 'string'},
		{name:'materno', type: 'string'},
		{name:'doc_iden', type: 'string'},
		{name:'fecha_naci', type: 'date',dateFormat:'Y-m-d'},
		{name:'telefono', type: 'numeric'},
		{name:'celular', type: 'numeric'},
		{name:'direccion', type: 'string'},
		{name:'descripcion_dire', type: 'string'},
		{name:'nomb_elec', type: 'string'},
		{name:'nombre_factura', type: 'string'},
		{name:'nro_nit', type: 'numeric'},
		{name:'repre_legal', type: 'string'},
		{name:'docid_legal', type: 'string'},
		{name:'poten_instalada', type: 'numeric'},
		{name:'poten_contratada', type: 'numeric'},
		{name:'tension', type: 'string'},
		{name:'cod_transforma', type: 'string'},
		{name:'tipo_medidor', type: 'numeric'},
		{name:'capacidad', type: 'string'},
		{name:'disyuntor', type: 'numeric'},
		{name:'relacion_cts1', type: 'numeric'},
		{name:'relacion_cts2', type: 'numeric'},
		{name:'relacion_pts1', type: 'numeric'},
		{name:'relacion_pts2', type: 'numeric'},
		{name:'importe_garantia', type: 'numeric'},
		{name:'importe_conex', type: 'numeric'},
		{name:'marca_med', type: 'string'},
		{name:'nroserie_med', type: 'string'},
		{name:'nro_digitos', type: 'numeric'},
		{name:'marca_cts', type: 'string'},
		{name:'nroserie_cts', type: 'string'},
		{name:'marca_pts', type: 'string'},
		{name:'nroserie_pts', type: 'string'},
		{name:'marca_medact', type: 'string'},
		{name:'nroserie_medact', type: 'string'},
		{name:'marca_medreac', type: 'string'},
		{name:'nroserie_medreac', type: 'string'},
		{name:'multi_kwh', type: 'numeric'},
		{name:'multi_kvar', type: 'numeric'},
		{name:'multi_kw', type: 'numeric'},
		{name:'nrodig_kwh', type: 'numeric'},
		{name:'nrodig_kvar', type: 'numeric'},
		{name:'fecha_hora_instala', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'fases_1r', type: 'string'},
		{name:'fases_2s', type: 'string'},
		{name:'fases_3t', type: 'string'},
		{name:'fases_n', type: 'string'},
		{name:'nroserie_med2', type: 'string'},
		{name:'nroserie_cts2', type: 'string'},
		{name:'nroserie_medact2', type: 'string'},
		{name:'nroserie_medreac2', type: 'string'},
		{name:'nro_precinto', type: 'string'},
		{name:'sw_activa', type: 'string'},
		{name:'sw_libre', type: 'string'},
		{name:'sw_bajatemp', type: 'string'},
		{name:'sw_bajadef', type: 'string'},
		{name:'nroserie_pts2', type: 'string'},
		{name:'razon_social', type: 'string'},
		{name:'casada', type: 'string'},
		{name:'id_trafo', type: 'numeric'},
		{name:'id_lugar', type: 'numeric'},
		{name:'mes_deuda', type: 'string'},
		{name:'sw_debito_fiscal', type: 'string'},
		{name:'id_ruta_b', type: 'numeric'},
		{name:'observaciones', type: 'string'},
		{name:'tipo_identificacion', type: 'string'},
		{name:'distancia_trafo', type: 'numeric'},
		{name:'tipo_suministro', type: 'string'},
		{name:'tipo_medicion', type: 'string'},
		{name:'tipo_consumidor', type: 'string'},
		{name:'id_poste', type: 'numeric'},
		{name:'dist_poste', type: 'string'},
		{name:'lug_expedido', type: 'string'},
		{name:'id_regional', type: 'numeric'},
		{name:'coord_x', type: 'numeric'},
		{name:'coord_y', type: 'numeric'},
		{name:'coord_z', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'id_usuario_ai', type: 'numeric'},
		{name:'usuario_ai', type: 'string'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_cliente',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		