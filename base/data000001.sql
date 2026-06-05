
/***********************************I-DAT-GEVM-FACTUR-0-05/06/2026*****************************************/
----------------------------------
--COPY LINES TO data.sql FILE  
---------------------------------

select pxp.f_insert_tgui ('SISTEMA DE LECTURACION Y FACTURACION', '', 'FACTUR', 'si', 1, '', 1, '', '', 'FACTUR');
select pxp.f_insert_tgui ('Parametros', 'Parametros del sistema', 'PARAME', 'si', 1, '', 2, '', '', 'FACTUR');
select pxp.f_insert_tgui ('Alimentador', 'Alimentador', 'ALIMEN', 'si', 1, 'sis_factur/vista/alimentador/Alimentador.php', 3, '', 'Alimentador', 'FACTUR');
select pxp.f_insert_tgui ('Categoria', 'Categoria', 'CATEGO', 'si', 1, 'sis_factur/vista/categoria/Categoria.php', 3, '', 'Categoria', 'FACTUR');
select pxp.f_insert_tgui ('Cliente', 'Cliente', 'CLIENTE', 'si', 1, 'sis_factur/vista/cliente/Cliente.php', 3, '', 'Cliente', 'FACTUR');
select pxp.f_insert_tgui ('Parametro', 'Parametros', 'PARFAC', 'si', 2, 'sis_factur/vista/parametro/Parametro.php', 3, '', 'Parametro', 'FACTUR');
select pxp.f_insert_tgui ('Valor Indexación', 'Valor de Indexación', 'FACIND', 'si', 4, 'sis_factur/vista/factor_index/FactorIndex.php', 3, '', 'FactorIndex', 'FACTUR');
select pxp.f_insert_tgui ('Tasa', 'Tasas', 'tasa', 'si', 6, 'sis_factur/vista/tasa/Tasa.php', 3, '', 'Tasa', 'FACTUR');
select pxp.f_insert_tgui ('Descuentos', 'Descuentos', 'descue', 'si', 7, 'sis_factur/vista/descuento/Descuento.php', 3, '', 'Descuento', 'FACTUR');
select pxp.f_insert_tgui ('Irregularidades de Lectura', 'Codigos de Irregularidades de lectura', 'codirr', 'si', 8, 'sis_factur/vista/codigo_ireegular/CodigoIreegular.php', 3, '', 'CodigoIreegular', 'FACTUR');
select pxp.f_insert_tgui ('Rutas', 'Rutas', 'ruta', 'si', 9, 'sis_factur/vista/ruta/Ruta.php', 3, '', 'Ruta', 'FACTUR');
select pxp.f_insert_tgui ('medidor', 'medidor', 'MED', 'si', 2, 'sis_factur/vista/medidor/Medidor.php', 2, '', 'Medidor', 'FACTUR');
select pxp.f_insert_tgui ('fecha', 'fecha', 'FECH', 'si', 3, 'sis_factur/vista/fecha/Fecha.php', 2, '', 'Fecha', 'FACTUR');
select pxp.f_insert_tgui ('centro de transformacion', 'centro de transformacion', 'CDT', 'si', 4, 'sis_factur/vista/centro_transformacion/CentroTransformacion.php', 2, '', 'CentroTransformacion', 'FACTUR');
select pxp.f_insert_tgui ('causa', 'causa', 'CAU', 'si', 5, 'sis_factur/vista/causa/Causa.php', 2, '', 'Causa', 'FACTUR');
select pxp.f_insert_tgui ('funcionario', 'funcionario', 'FUN', 'si', 6, 'sis_factur/vista/funcionario/Funcionario.php', 2, '', 'Funcionario', 'FACTUR');
/***********************************F-DAT-GEVM-FACTUR-0-05/06/2026*****************************************/