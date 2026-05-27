<?php
/**
*@package pXP
*@file gen-CodigoIreegular.php
*@author  (admin)
*@date 21-08-2025 03:20:40
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.CodigoIreegular=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.CodigoIreegular.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:this.tam_pag}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_cod_irre'
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
				name: 'desc_cod_irre',
				fieldLabel: 'Descripcion Cod Irregular',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
				type:'TextField',
				filters:{pfiltro:'cod_irr.desc_cod_irre',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'tipo_lectura',
				fieldLabel: 'Tipo Lectura',
				allowBlank: false,
				emptyText:'........',
				 typeAhead: true,
			    triggerAction: 'all',
			    lazyRender:true,
			    mode: 'local',
				store : new Ext.data.ArrayStore({
					id:0,
					fields : ['ID', 'valor'],
					data : [['0', 'No lecturado'], ['1', 'Lectura Normal'], ['2', 'Lectura Estimada'], ['3', 'Consumo Estimado'], ['4', 'Compensación'], ['6', 'Iniciar lectura']]
				}),
				valueField : 'ID',
				displayField : 'valor'
			},
				type:'ComboBox',
				filters:{pfiltro:'cod_irr.tipo_lectura',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Codigo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:5
			},
				type:'TextField',
				filters:{pfiltro:'cod_irr.codigo',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config: {
				name: 'id_cod_gescom',
				fieldLabel: 'Cod Gestion Comercial',
				allowBlank: true,
				emptyText: 'Elija una opción...',
				store: new Ext.data.JsonStore({
					url: '../../sis_/control/Clase/Metodo',
					id: 'id_cod_gescom',
					root: 'datos',
					sortInfo: {
						field: 'descripcion',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_cod_gescom', 'descripcion', 'codigo'],
					remoteSort: true,
					baseParams: {par_filtro: 'codges.descripcion#codges.codigo'}
				}),
				valueField: 'id_cod_gescom',
				displayField: 'descripcion',
				gdisplayField: 'descripcion',
				hiddenName: 'id_cod_gescom',
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
					return String.format('{0}', record.data['descripcion']);
				}
			},
			type: 'ComboBox',
			id_grupo: 0,
			filters: {pfiltro: 'codges.descripcion',type: 'string'},
			grid: true,
			form: true
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
				filters:{pfiltro:'cod_irr.estado_reg',type:'string'},
				id_grupo:1,
				grid:true,
				form:false
		},
		
		{
			config:{
				name: 'condicion_logica',
				fieldLabel: 'condicion_logica',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
				type:'TextField',
				filters:{pfiltro:'cod_irr.condicion_logica',type:'string'},
				id_grupo:1,
				grid:false,
				form:false
		},
		
		{
			config:{
				name: 'sw_aviso',
				fieldLabel: 'Emite aviso?',
				allowBlank: false,
				emptyText:'........',
				 typeAhead: true,
			    triggerAction: 'all',
			    lazyRender:true,
			    mode: 'local',
				store : new Ext.data.ArrayStore({
					id:0,
					fields : ['ID', 'valor'],
					data : [['no', 'NO'], ['si', 'SI']]
				}),
				valueField : 'ID',
				displayField : 'valor'
			},
				type:'ComboBox',
				filters:{pfiltro:'cod_irr.sw_aviso',type:'string'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'descripcion',
				fieldLabel: 'descripcion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
				type:'TextField',
				filters:{pfiltro:'cod_irr.descripcion',type:'string'},
				id_grupo:1,
				grid:false,
				form:false
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
				filters:{pfiltro:'cod_irr.estado',type:'numeric'},
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
				filters:{pfiltro:'cod_irr.usuario_ai',type:'string'},
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
				filters:{pfiltro:'cod_irr.fecha_reg',type:'date'},
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
				name: 'id_usuario_ai',
				fieldLabel: 'Creado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
				type:'Field',
				filters:{pfiltro:'cod_irr.id_usuario_ai',type:'numeric'},
				id_grupo:1,
				grid:false,
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
				filters:{pfiltro:'cod_irr.fecha_mod',type:'date'},
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
	title:'Codigo Irregular',
	ActSave:'../../sis_factur/control/CodigoIreegular/insertarCodigoIreegular',
	ActDel:'../../sis_factur/control/CodigoIreegular/eliminarCodigoIreegular',
	ActList:'../../sis_factur/control/CodigoIreegular/listarCodigoIreegular',
	id_store:'id_cod_irre',
	fields: [
		{name:'id_cod_irre', type: 'numeric'},
		{name:'desc_cod_irre', type: 'string'},
		{name:'tipo_lectura', type: 'numeric'},
		{name:'id_cod_gescom', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'condicion_logica', type: 'string'},
		{name:'id_param', type: 'numeric'},
		{name:'sw_aviso', type: 'string'},
		{name:'descripcion', type: 'string'},
		{name:'estado', type: 'numeric'},
		{name:'usuario_ai', type: 'string'},
		{name:'fecha_reg', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'id_usuario_ai', type: 'numeric'},
		{name:'fecha_mod', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_cod_irre',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		