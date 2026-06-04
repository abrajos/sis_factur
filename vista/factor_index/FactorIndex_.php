<?php
/**
*@package pXP
*@file gen-FactorIndex.php
*@author  (admin)
*@date 21-08-2025 02:52:22
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.FactorIndex=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.FactorIndex.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:this.tam_pag}})
	},
			
	Atributos:[
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
				name: 'gestion',
				fieldLabel: 'Gestión',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:262144
			},
				type:'NumberField',
				filters:{pfiltro:'fac_ind.gestion',type:'numeric'},
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
				maxLength:131072
			},
				type:'NumberField',
				filters:{pfiltro:'fac_ind.periodo',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		
		
		{
			config:{
				name: 'valor_index',
				fieldLabel: 'Valor Indexación',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179653
			},
				type:'NumberField',
				filters:{pfiltro:'fac_ind.valor_index',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		},
		{
			config:{
				name: 'valor_index_2',
				fieldLabel: 'Valor Indexación 2',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179653
			},
				type:'NumberField',
				filters:{pfiltro:'fac_ind.valor_index_2',type:'numeric'},
				id_grupo:1,
				grid:true,
				form:true
		}
	],
	tam_pag:50,	
	title:'Factor Indexacion',
	ActSave:'../../sis_factur/control/FactorIndex/insertarFactorIndex',
	ActDel:'../../sis_factur/control/FactorIndex/eliminarFactorIndex',
	ActList:'../../sis_factur/control/FactorIndex/listarFactorIndex',
	id_store:'id_fac_index',
	fields: [
		{name:'id_fac_index', type: 'numeric'},
		{name:'periodo', type: 'numeric'},
		{name:'id_param', type: 'numeric'},
		{name:'gestion', type: 'numeric'},
		{name:'valor_index', type: 'numeric'},
		{name:'valor_index_2', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_fac_index',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		