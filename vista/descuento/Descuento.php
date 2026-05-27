<?php
/**
*@package pXP
*@file gen-Descuento.php
*@author  (admin)
*@date 15-11-2025 06:41:25
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Descuento=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Descuento.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:this.tam_pag}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_descuento'
			},
			type:'Field',
			form:true 
		},
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
				name: 'desc_descuento',
				fieldLabel: 'Descripción Descuento',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
				type:'TextField',
				filters:{pfiltro:'descue.desc_descuento',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'porcentaje',
				fieldLabel: 'Porcentaje',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:655364
			},
				type:'NumberField',
				filters:{pfiltro:'descue.porcentaje',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		
		{
			config:{
				name: 'consumo',
				fieldLabel: 'Consumo (KW)',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179648
			},
				type:'NumberField',
				filters:{pfiltro:'descue.consumo',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'sw_general',
				fieldLabel: 'General',
				allowBlank: false,
				emptyText:'........',
				 typeAhead: true,
			    triggerAction: 'all',
			    lazyRender:true,
			    mode: 'local',
				store : new Ext.data.ArrayStore({
					id:0,
					fields : ['ID', 'valor'],
					data : [ ['no', 'NO'], ['si', 'SI']]
				}),
				valueField : 'ID',
				displayField : 'valor'
			},
				type:'ComboBox',
				filters:{pfiltro:'descue.sw_general',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		{
			config:{
				name: 'sw_maximo',
				fieldLabel: 'Maximo',
				allowBlank: false,
				emptyText:'........',
				 typeAhead: true,
			    triggerAction: 'all',
			    lazyRender:true,
			    mode: 'local',
				store : new Ext.data.ArrayStore({
					id:0,
					fields : ['ID', 'valor'],
					data : [ ['no', 'NO'], ['si', 'SI']]
				}),
				valueField : 'ID',
				displayField : 'valor'
			},
				type:'ComboBox',
				filters:{pfiltro:'descue.sw_maximo',type:'string'},
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
				filters:{pfiltro:'descue.estado_reg',type:'string'},
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
				filters:{pfiltro:'descue.id_usuario_ai',type:'numeric'},
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
				name: 'usuario_ai',
				fieldLabel: 'Funcionaro AI',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:300
			},
				type:'TextField',
				filters:{pfiltro:'descue.usuario_ai',type:'string'},
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
				filters:{pfiltro:'descue.fecha_reg',type:'date'},
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
				filters:{pfiltro:'descue.fecha_mod',type:'date'},
				id_grupo:1,
				grid:true,
				form:false
		}
	],
	tam_pag:50,	
	title:'Descuentos',
	ActSave:'../../sis_factur/control/Descuento/insertarDescuento',
	ActDel:'../../sis_factur/control/Descuento/eliminarDescuento',
	ActList:'../../sis_factur/control/Descuento/listarDescuento',
	id_store:'id_descuento',
	fields: [
		{name:'id_descuento', type: 'numeric'},
		{name:'porcentaje', type: 'numeric'},
		{name:'desc_descuento', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'consumo', type: 'numeric'},
		{name:'sw_general', type: 'string'},
		{name:'id_param', type: 'numeric'},
		{name:'sw_maximo', type: 'string'},
		{name:'id_usuario_ai', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'usuario_ai', type: 'string'},
		{name:'fecha_reg', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_descuento',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		