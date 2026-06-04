<?php
/**
*@package pXP
*@file gen-FvCategoria.php
*@author  (admin)
*@date 21-08-2025 02:50:53
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.FvCategoria=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.FvCategoria.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:this.tam_pag}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_categoria'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'sw_industrial',
				fieldLabel: 'sw_industrial',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:2
			},
				type:'TextField',
				filters:{pfiltro:'categ.sw_industrial',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
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
			grid: true,
			form: true
		},
		{
			config:{
				name: 'importe_garantia',
				fieldLabel: 'importe_garantia',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
				type:'NumberField',
				filters:{pfiltro:'categ.importe_garantia',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'desc_categoria',
				fieldLabel: 'desc_categoria',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
				type:'TextField',
				filters:{pfiltro:'categ.desc_categoria',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'sw_lectura_potencia_contratada',
				fieldLabel: 'sw_lectura_potencia_contratada',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:6
			},
				type:'TextField',
				filters:{pfiltro:'categ.sw_lectura_potencia_contratada',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tiempo_factor_consumo',
				fieldLabel: 'tiempo_factor_consumo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179658
			},
				type:'NumberField',
				filters:{pfiltro:'categ.tiempo_factor_consumo',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'estado',
				fieldLabel: 'estado',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:65536
			},
				type:'NumberField',
				filters:{pfiltro:'categ.estado',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config: {
				name: 'id_cuenta',
				fieldLabel: 'id_cuenta',
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
				hiddenName: 'id_cuenta',
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
		}
	],
	tam_pag:50,	
	title:'Categoria',
	ActSave:'../../sis_factur/control/FvCategoria/insertarFvCategoria',
	ActDel:'../../sis_factur/control/FvCategoria/eliminarFvCategoria',
	ActList:'../../sis_factur/control/FvCategoria/listarFvCategoria',
	id_store:'id_categoria',
	fields: [
		{name:'id_categoria', type: 'numeric'},
		{name:'sw_industrial', type: 'string'},
		{name:'id_param', type: 'numeric'},
		{name:'importe_garantia', type: 'numeric'},
		{name:'desc_categoria', type: 'string'},
		{name:'sw_lectura_potencia_contratada', type: 'string'},
		{name:'tiempo_factor_consumo', type: 'numeric'},
		{name:'estado', type: 'numeric'},
		{name:'id_cuenta', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_categoria',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		