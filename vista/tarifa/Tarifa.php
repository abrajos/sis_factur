<?php
/**
*@package pXP
*@file gen-Tarifa.php
*@author  (admin)
*@date 15-11-2025 01:34:37
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Tarifa=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Tarifa.superclass.constructor.call(this,config);
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
					name: 'id_tarifa'
			},
			type:'Field',
			form:true 
		},
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
				name: 'desc_tarifa',
				fieldLabel: 'Descripción Tarifa',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
				type:'TextField',
				filters:{pfiltro:'tarifa.desc_tarifa',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'valor_ini',
				fieldLabel: 'Valor Inicial',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'tarifa.valor_ini',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		{
			config:{
				name: 'valor_final',
				fieldLabel: 'Valor Final',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'NumberField',
				filters:{pfiltro:'tarifa.valor_final',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'importe_tarifa',
				fieldLabel: 'Importe Tarifa',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179651
			},
				type:'NumberField',
				filters:{pfiltro:'tarifa.importe_tarifa',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'sw_potencia',
				fieldLabel: 'Tarifa por Potencia',
				allowBlank: false,
				emptyText:'......',
				 typeAhead: true,
			    triggerAction: 'all',
			    lazyRender:true,
			    mode: 'local',
				store : new Ext.data.ArrayStore({
					id:0,
					fields : ['ID', 'valor'],
					data : [['si', 'SI'], ['no', 'NO']]
				}),
				valueField : 'ID',
				displayField : 'valor'
			},
				type:'ComboBox',
				filters:{pfiltro:'tarifa.sw_potencia',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tipo_tarifa',
				fieldLabel: 'Tipo Tarifa',
				allowBlank: false,
				emptyText:'Tipo...',
				 typeAhead: true,
			    triggerAction: 'all',
			    lazyRender:true,
			    mode: 'local',
				store : new Ext.data.ArrayStore({
					id:0,
					fields : ['ID', 'valor'],
					data : [['1', 'Importe Fijo'], ['2', 'Importe Escala']]
				}),
				valueField : 'ID',
				displayField : 'valor'
			},
				type:'ComboBox',
				filters:{pfiltro:'tarifa.tipo_tarifa',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'fecha_vigencia',
				fieldLabel: 'Fecha Vigencia',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
				type:'DateField',
				filters:{pfiltro:'tarifa.fecha_vigencia',type:'date'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		{
			config:{
				name: 'factor_indexacion',
				fieldLabel: 'Factor Indexación',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:65536
			},
				type:'NumberField',
				filters:{pfiltro:'tarifa.factor_indexacion',type:'numeric'},
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
				filters:{pfiltro:'tarifa.estado_reg',type:'string'},
				id_grupo:1,
				grid:true,
				form:false
		},
		{
			config:{
				name: 'estado',
				fieldLabel: 'estado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:65536
			},
				type:'NumberField',
				filters:{pfiltro:'tarifa.estado',type:'numeric'},
				id_grupo:1,
				grid:false,
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
				name: 'fecha_reg',
				fieldLabel: 'Fecha creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
							format: 'd/m/Y', 
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y H:i:s'):''}
			},
				type:'DateField',
				filters:{pfiltro:'tarifa.fecha_reg',type:'date'},
				id_grupo:1,
				grid:true,
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
				filters:{pfiltro:'tarifa.usuario_ai',type:'string'},
				id_grupo:1,
				grid:true,
				form:false
		},
		{
			config:{
				name: 'id_usuario_ai',
				fieldLabel: 'Funcionaro AI',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'Field',
				filters:{pfiltro:'tarifa.id_usuario_ai',type:'numeric'},
				id_grupo:1,
				grid:false,
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
				filters:{pfiltro:'tarifa.fecha_mod',type:'date'},
				id_grupo:1,
				grid:true,
				form:false
		}
	],
	tam_pag:50,	
	title:'Tarifa',
	ActSave:'../../sis_factur/control/Tarifa/insertarTarifa',
	ActDel:'../../sis_factur/control/Tarifa/eliminarTarifa',
	ActList:'../../sis_factur/control/Tarifa/listarTarifa',
	id_store:'id_tarifa',
	fields: [
		{name:'id_tarifa', type: 'numeric'},
		{name:'sw_potencia', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'importe_tarifa', type: 'numeric'},
		{name:'fecha_vigencia', type: 'date',dateFormat:'Y-m-d'},
		{name:'valor_ini', type: 'numeric'},
		{name:'desc_tarifa', type: 'string'},
		{name:'valor_final', type: 'numeric'},
		{name:'factor_indexacion', type: 'numeric'},
		{name:'tipo_tarifa', type: 'numeric'},
		{name:'estado', type: 'numeric'},
		{name:'id_categoria', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'usuario_ai', type: 'string'},
		{name:'id_usuario_ai', type: 'numeric'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_tarifa',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,

	iniciarEventos: function(){
		
	},

	preparaMenu: function (tb) {
        // llamada funcion clace padre
        Phx.vista.Tarifa.superclass.preparaMenu.call(this, tb)

    },
    onButtonNew: function () {
        Phx.vista.Tarifa.superclass.onButtonNew.call(this);
        this.getComponente('id_categoria').setValue(this.maestro.id_categoria);
    },
    onReloadPage: function (m) {
        this.maestro = m;
        console.log(this.maestro);

        this.store.baseParams = {id_categoria: this.maestro.id_categoria};


        this.load({params: {start: 0, limit: 50}})
    },

	}
)
</script>
		
		