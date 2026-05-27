<?php
/**
*@package pXP
*@file gen-FactorIndex.php
*@author  (admin)
*@date 15-11-2025 03:44:05
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
		this.load({params:{start:0, limit:this.tam_pag}});

		this.addButton('btnLlamar',{text: 'Indexar Tarifas',iconCls: 'bchecklist',disabled: false,handler: this.indexarTarifas,tooltip: '<b>Indexar Tarifas</b><br/>Indexa las tarifas para el periodo'});
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
				filters:{pfiltro:'facind.estado_reg',type:'string'},
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
				filters:{pfiltro:'facind.id_usuario_ai',type:'numeric'},
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
				filters:{pfiltro:'facind.fecha_reg',type:'date'},
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
				filters:{pfiltro:'facind.usuario_ai',type:'string'},
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
				filters:{pfiltro:'facind.fecha_mod',type:'date'},
				id_grupo:1,
				grid:true,
				form:false
		}
	],
	tam_pag:50,	
	title:'Factor Indexación',
	ActSave:'../../sis_factur/control/FactorIndex/insertarFactorIndex',
	ActDel:'../../sis_factur/control/FactorIndex/eliminarFactorIndex',
	ActList:'../../sis_factur/control/FactorIndex/listarFactorIndex',
	id_store:'id_fac_index',
	fields: [
		{name:'id_fac_index', type: 'numeric'},
		{name:'gestion', type: 'numeric'},
		{name:'valor_index', type: 'numeric'},
		{name:'periodo', type: 'numeric'},
		{name:'valor_index_2', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_param', type: 'numeric'},
		{name:'id_usuario_ai', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'usuario_ai', type: 'string'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_fac_index',
		direction: 'ASC'
	},
	bdel:true,
	bsave:false,
	south:{
        url:'../../../sis_factur/vista/tarifa_index/TarifaIndex.php',
        title:'Tarifa Index',
        width:'90%',
        cls:'TarifaIndex'
   },

   indexarTarifas : function () {
   		//AJAX tiene q revisar revisar si hay una ficha para llamar, si hay una ficha anterior en atencion por el mismo usuario o si no hay fichas para atender
   		//si no hay fichas para atender lanzar alerta
   		//si ya hay una ficha en atencion para el usuario devovler esa ficha
   		//Si hay una nueva ficha para atender, cambiar el estado de la ficha, asignarla al usuario y devolver al ficha
   		
		var rec = this.sm.getSelected();
		var data = rec.data;
		if (data) {
			Phx.CP.loadingShow();
   			Ext.Ajax.request({
				url: '../../sis_factur/control/TarifaIndex/indexarTarifas',
			  	params:{
			  		id_fac_index: data.id_fac_index
			      },
			      success:this.successRep,
			      failure: this.conexionFailure,
			      timeout:this.timeout,
			      scope:this
			});
   		//Cargar el formulario con los datos de la ficha devuelta en el ajax
		}




   },
   successRep:function(resp){
        Phx.CP.loadingHide();
        var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
        var datos = {datos:reg.datos[0]};
        this.onButtonAct();
        
	},
	}
)
</script>
		
		