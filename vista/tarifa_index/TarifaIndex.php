<?php
/**
*@package pXP
*@file gen-TarifaIndex.php
*@author  (admin)
*@date 15-11-2025 04:10:02
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.TarifaIndex=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.TarifaIndex.superclass.constructor.call(this,config);
		this.init();
		//this.load({params:{start:0, limit:this.tam_pag}})
		this.iniciarEventos()
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tarifa_index'
			},
			type:'Field',
			form:true 
		},
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_fac_index'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'desc_categoria',
				fieldLabel: 'Categoria',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
				type:'TextField',
				filters:{pfiltro:'catego.desc_categoria',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config: {
				name: 'id_tarifa',
				fieldLabel: 'Descripción Tarifa',
				allowBlank: false,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_factur/control/Tarifa/listarTarifa',
					id: 'id_tarifa',
					root: 'datos',
					sortInfo: {
						field: 'desc_tarifa',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_tarifa', 'desc_tarifa', 'codigo'],
					remoteSort: true,
					baseParams: {par_filtro: 'tarifa.desc_tarifa#tarifa.codigo'}
				}),
				valueField: 'id_tarifa',
				displayField: 'desc_tarifa',
				gdisplayField: 'desc_tarifa',
				hiddenName: 'id_tarifa',
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
					return String.format('{0}', record.data['desc_tarifa']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'tarifa.desc_tarifa',type: 'string'},
			grid: true,
			form: true
		},
	
		
		{
			config:{
				name: 'importe_index',
				fieldLabel: 'Importe Index',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
				type:'NumberField',
				filters:{pfiltro:'tarind.importe_index',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		{
			config:{
				name: 'gestion',
				fieldLabel: 'Gestión',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'tarind.gestion',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'periodo',
				fieldLabel: 'Periodo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'tarind.periodo',type:'numeric'},
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
				filters:{pfiltro:'tarind.estado_reg',type:'string'},
				id_grupo:1,
				grid:true,
				form:false
		},
		{
			config:{
				name: 'id_usuario_ai',
				fieldLabel: '',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'Field',
				filters:{pfiltro:'tarind.id_usuario_ai',type:'numeric'},
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
				filters:{pfiltro:'tarind.usuario_ai',type:'string'},
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
				filters:{pfiltro:'tarind.fecha_reg',type:'date'},
				id_grupo:1,
				grid:true,
				form:false
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
				name: 'fecha_mod',
				fieldLabel: 'Fecha Modif.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y H:i:s'):''}
			},
				type:'DateField',
				filters:{pfiltro:'tarind.fecha_mod',type:'date'},
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
		}
	],
	tam_pag:50,	
	title:'Tarifa Index',
	ActSave:'../../sis_factur/control/TarifaIndex/insertarTarifaIndex',
	ActDel:'../../sis_factur/control/TarifaIndex/eliminarTarifaIndex',
	ActList:'../../sis_factur/control/TarifaIndex/listarTarifaIndex',
	id_store:'id_tarifa_index',
	fields: [
		{name:'id_tarifa_index', type: 'numeric'},
		{name:'id_fac_index', type: 'numeric'},
		{name:'id_tarifa', type: 'numeric'},
		{name:'gestion', type: 'numeric'},
		{name:'importe_index', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'periodo', type: 'numeric'},
		{name:'id_usuario_ai', type: 'numeric'},
		{name:'usuario_ai', type: 'string'},
		{name:'fecha_reg', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'desc_categoria', type: 'string'},
		{name:'desc_tarifa', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_tarifa_index',
		direction: 'ASC'
	},
	bdel:false,
	bsave:false,
	bedit:false,
	bnew:false,
	iniciarEventos: function(){
		
	},

	preparaMenu: function (tb) {
        // llamada funcion clace padre
        Phx.vista.TarifaIndex.superclass.preparaMenu.call(this, tb)

    },
    onButtonNew: function () {
        Phx.vista.TarifaIndex.superclass.onButtonNew.call(this);
        this.getComponente('id_fac_index').setValue(this.maestro.id_fac_index);
    },
    onReloadPage: function (m) {
        this.maestro = m;
        console.log(this.maestro);

        this.store.baseParams = {id_fac_index: this.maestro.id_fac_index};


        this.load({params: {start: 0, limit: 50}})
    },
	}
)
</script>
		
		