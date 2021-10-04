<?php
//session_start();

//if ((!isset($_SESSION['usexea']) ||  !isset($_SESSION['pssexea']) || $_SESSION['proyecto'] != 'exea')) {
  //header('location:../exea/entrando.php');
//}
$capaCargar = NULL;
if (isset($_GET['capa'])){
  $capaCargar = filter_var($_GET['capa'],FILTER_SANITIZE_STRING);
  $capas = Array(
    'idearq_c14' => "CargarCapa('wms','idearq_c14','http://www.idearqueologia.org/idearq/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'idearq_cprl' => "CargarCapa('wms','idearq_cprl', 'http://www.idearqueologia.org/idearq/wms?', 'menuCarga', '','undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'idearq_dimp' => "CargarCapa('wms','idearq_dimp', 'http://www.idearqueologia.org/idearq/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'US.socialService'=> "CargarCapa('wms','US.socialService','http://www.sigmayores.csic.es/ArcGIS/services/Rec-Sociales/MapServer/WMSServer?','menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'US.housing'=> "CargarCapa('wms','US.housing','http://www.sigmayores.csic.es/ArcGIS/services/Rec-Sociales/MapServer/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'US.specializedAdministrationOffice'=> "CargarCapa('wms','US.specializedAdministrationOffice','http://www.sigmayores.csic.es/ArcGIS/services/Rec-Sociales/MapServer/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'US.specializedServiceOfSocialProtection'=> "CargarCapa('wms','US.specializedServiceOfSocialProtection','http://www.sigmayores.csic.es/ArcGIS/services/Rec-Sociales/MapServer/WMSServer?','menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'US.specializedMedicalService'=> "CargarCapa('wms','US.specializedMedicalService','http://www.sigmayores.csic.es/ArcGIS/services/Rec-Sanitarios/MapServer/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'US.generalMedicalService'=> "CargarCapa('wms','US.generalMedicalService','http://www.sigmayores.csic.es/ArcGIS/services/Rec-Sanitarios/MapServer/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'US.hospitalService'=> "CargarCapa('wms','US.generalMedicalService','http://www.sigmayores.csic.es/ArcGIS/services/Rec-Sanitarios/MapServer/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'jaeeduca_artes_oficios' => "CargarCapa('wms','jaeeduca_artes_oficios','http://161.111.47.64:8080/geoserver/jaeeduca/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'jaeeduca_ciencias_naturales_salud' => "CargarCapa('wms','jaeeduca_ciencias_naturales_salud','http://161.111.47.64:8080/geoserver/jaeeduca/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'jaeeduca_humanidades_ciencias_sociales' => "CargarCapa('wms','jaeeduca_humanidades_ciencias_sociales','http://161.111.47.64:8080/geoserver/jaeeduca/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'jaeeduca_lenguas_clasicas' => "CargarCapa('wms','jaeeduca_humanidades_ciencias_sociales','http://161.111.47.64:8080/geoserver/jaeeduca/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'jaeeduca_lenguas_vivas' => "CargarCapa('wms','jaeeduca_humanidades_ciencias_sociales','http://161.111.47.64:8080/geoserver/jaeeduca/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'gira1927' => "CargarCapa('wms','gira1927','http://161.111.47.64:8080/geoserver/investigacionendanza/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'gira1928' => "CargarCapa('wms','gira1928','http://161.111.47.64:8080/geoserver/investigacionendanza/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'gira1929' => "CargarCapa('wms','gira1929','http://161.111.47.64:8080/geoserver/investigacionendanza/wms?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_barrios' => "CargarCapa('wms','5','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_distritos' => "CargarCapa('wms','4','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_Declesiastica' => "CargarCapa('wms','3','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_Durbana' => "CargarCapa('wms','2','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_municipios' => "CargarCapa('wms','1','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_rios' => "CargarCapa('wms','7','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_canales' => "CargarCapa('wms','8','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_monumentos' => "CargarCapa('wms','20','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_interes' => "CargarCapa('wms','19','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_proyectos' => "CargarCapa('wms','18','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_vias' => "CargarCapa('wms','17','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_edificios' => "CargarCapa('wms','16','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_parques' => "CargarCapa('wms','15','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_manzanas' => "CargarCapa('wms','14','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_carreteras' => "CargarCapa('wms','12','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_ferrocarril' => "CargarCapa('wms','11','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'hisdimad_tranvia' => "CargarCapa('wms','10','http://idehistoricamadrid.org/USIG/services/WMS_Facundo/mapserver/WMSServer?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)",
    'red_transp_madrid1900'=> "CargarCapa('geojson','car_mad_tra','./datos/madrid/red_transporte.geojson', 'menuCarga', '', 'Red de transporte en Madrid (1900)', 'Red de transporte en Madrid (1900)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",
    'ptos_interes_madrid1900'=> "CargarCapa('geojson','car_mad_pto','./datos/madrid/ptos_interes.geojson', 'menuCarga', '', 'Puntos de interés histórico en Madrid (1900)', 'Puntos de interés histórico en Madrid (1900)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",
    'distritos_barrios_madrid1900'=> "CargarCapa('geojson','car_mad_db0','./datos/madrid/barrios_distritos00.geojson', 'menuCarga', '', 'Distritos y barrios en Madrid (1900)', 'Distritos y barrios en Madrid (1900)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",  
    'valor_suelo_madrid1900'=> "CargarCapa('geojson','car_mad_vsu', './datos/madrid/calles_valor.geojson', 'menuCarga', '', 'Valor del suelo en Madrid (1900)', 'Valor del suelo en Madrid (1900)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",

    'ocupacion_Gredos_1990'=> "CargarCapa('geojson','ant_xxx_o90','./datos/evonatur/ocup_90.geojson', 'menuCarga', '', 'Ocupación del Suelo - Parque Regional de Gredos (1990)', 'Ocupación del Suelo - Parque Regional de Gredos (1990)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",
    
    'ocupacion_Gredos_2000'=> "CargarCapa('geojson','ant_xxx_o00','./datos/evonatur/ocup_00.geojson', 'menuCarga', '', 'Ocupación del Suelo - Parque Regional de Gredos (2000)', 'Ocupación del Suelo - Parque Regional de Gredos (2000)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",
    'ocupacion_Gredos_2006'=> "CargarCapa('geojson','ant_xxx_o06','./datos/evonatur/ocup_06.geojson', 'menuCarga', '', 'Ocupación del Suelo - Parque Regional de Gredos (2006)', 'Ocupación del Suelo - Parque Regional de Gredos (2006)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",
    'ocupacion_Gredos_2012'=> "CargarCapa('geojson','ant_xxx_o12','./datos/evonatur/ocup_12.geojson', 'menuCarga', '', 'Ocupación del Suelo - Parque Regional de Gredos (2012)', 'Ocupación del Suelo - Parque Regional de Gredos (2012)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",
    'muni_DOPs_olivar'=> "CargarCapa('geojson','med_xxx_mun','./datos/extersial/municipios.geojson', 'menuCarga', '', 'Municipios en DOPs olivar', 'Municipios en DOPs olivar', 'vectorial', ['MultiPolygon','transparent','#491600'], 'undefined', 1, 'undefined')",
    'erosion_lam_poten_DOPs'=> "CargarCapa('geojson','med_xxx_ero','./datos/extersial/erosion.geojson', 'menuCarga', '', 'Erosión laminar potencial en DOPs olivar (1990 - 2012)', 'Erosión laminar potencial en DOPs olivar (1990 - 2012)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",
    'almazaras_DOPs_olivar'=> "CargarCapa('geojson','med_xxx_alp','./datos/extersial/almazaras_punto.geojson', 'menuCarga', '', 'Almazaras (localización) en DOPs olivar (1990 - 2012)', 'Almazaras (localización) en DOPs olivar (1990 - 2012)', 'vectorial', ['Point','#fe9929','#8c2d04'], 'undefined', 1, 'undefined')",
    'almazaras_areas_DOPs_olivar'=> "CargarCapa('geojson','med_xxx_alt','./datos/extersial/almazaras_thiessen.geojson', 'menuCarga', '', 'Almazaras (áreas de influencia) en DOPs olivar (1990-2012)', 'Habitats naturales y seminaturales en DOPs olivar (1990-2012)', 'vectorial', ['MultiPolygon','#c7f2a9','#597a43'], 'undefined', 1, 'undefined')",
    'habitat_DOPs_olivar'=> "CargarCapa('geojson','med_xxx_hab','./datos/extersial/habitats.geojson', 'menuCarga', '', 'Habitats naturales y seminaturales en DOPs olivar (1990-2012)', 'Habitats naturales y seminaturales en DOPs olivar (1990-2012))', 'imagen', 'undefined', 'undefined', 1, 'undefined')",
    'tipo_parcel_DOPs_olivar'=> "CargarCapa('geojson','med_xxx_tip','./datos/extersial/tipo_parc.geojson', 'menuCarga', '', 'Tipología de parcelas en DOPs olivar', 'Tipología de parcelas en DOPs olivar (1990-2012)', 'imagen', 'undefined', 'undefined', 1, 'undefined')",

    
    'FacundoMadrid' => "CargarCapa('wmts','FacundoMadrid','http://www.ign.es/wmts/planos?', 'menuCarga', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, undefined)"
    

  );
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Visualizador Imago Orbis</title>

    <link rel="stylesheet" href="./extra/v5.3.0-dist/ol.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-slider.css">
    <link rel="stylesheet" href="css/imago.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <!-- CÃ“DIGO FUENTE -->
    <script type="text/javascript" src="js/fuente/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/fuente/popper.min.js"></script>
    <script type="text/javascript" src="js/fuente/bootstrap.min.js"></script>
    <script type="text/javascript" src="./extra/v5.3.0-dist/ol.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.3/proj4.js"></script>

    <!-- TESELAS VECTORIALES -->
    <script type="text/javascript" src="https://cdn.polyfill.io/v2/polyfill.min.js?features=fetch,Promise"></script>
    <script type="text/javascript" src="js/fuente/olms.js"></script>


    <!-- SHP2GEOJSON -->
    <script type="text/javascript" src="js/fuente/shp2geojson/preview.js"></script>
    <script type="text/javascript" src="js/fuente/shp2geojson/jszip.js"></script>
    <script type="text/javascript" src="js/fuente/shp2geojson/preprocess.js"></script>

    <!-- LISTAS ORDENABLES -->
    <script type="text/javascript" src="js/fuente/sortable.js"></script>

    <!-- GENERADOR DE ARCHIVOS EN EL CLIENTE -->
    <script type="text/javascript" src="js/fuente/FileSaver.js"></script>

    <!-- DESCOMPRESOR DE ARCHIVOS .ZIP -->
    <script type="text/javascript" src="js/fuente/zip/zip.js"></script>

    <!-- SLIDER DE BOOTSTRAP -->
    <script type="text/javascript" src="js/fuente/bootstrap-slider.min.js"></script>

    <!-- JS FUNCIONAMIENTO PETICIONES AL CATÃLOGO -->
    <script type="text/javascript" src="js/fuente/catalogo/jsonix/jsonix.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/OWS_1_0_0.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/DC_1_1.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/DCT.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/w3c-schemas/lib/XLink_1_0.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/CSW_2_0_2.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/Filter_1_1_0.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/GML_3_1_1.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/SMIL_2_0_Language.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/SMIL_2_0.js"></script>
    <!-- ISO Profile -->
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/GML_3_2_1.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/GML_3_2_0.js"></script>
    <!-- NO NECESARIAS
	<script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GCO_20060504.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GMD_20060504.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GTS_20060504.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GSS_20060504.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GSR_20060504.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GMX_20060504.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_SRV_20060504.js"></script>
	-->
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GCO_20070417.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GMD_20070417.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GTS_20070417.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GSS_20070417.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GSR_20070417.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_GMX_20070417.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/ogc-schemas/lib/ISO19139_2_GMI_1_0.js"></script>
    <!-- ISO Profile -->
    <script type="text/javascript" src="js/fuente/catalogo/ows.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/csw.js"></script>
    <script type="text/javascript" src="js/fuente/catalogo/filter.js"></script>
	  <script type="text/javascript" src="js/fuente/catalogo/xmltojson.js"></script>

    <!-- JS FUNCIONAMIENTO MAPA -->
    <script type="text/javascript" src="js/configuracionBasica.js"></script>
    <script type="text/javascript" src="js/arrayTematicas.js"></script>
    <script type="text/javascript" src="js/controlMenus.js"></script>
    <script type="text/javascript" src="js/map.js"></script>
    <script type="text/javascript" src="js/mapaBase.js"></script>
    <script type="text/javascript" src="js/ponerIdioma.js"></script>
    <script type="text/javascript" src="js/leyenda.js"></script>
    <script type="text/javascript" src="js/herramientasMedir.js"></script>
    <script type="text/javascript" src="js/herramientasDibujar.js"></script>

    <script type="text/javascript" src="js/wms/anadirWMS.js"></script>
    <script type="text/javascript" src="js/wms/anadirWMTS.js"></script>

    <script type="text/javascript" src="js/geojson/anadirGeojsonExterno.js"></script>
    <script type="text/javascript" src="js/geojson/anadirGeojsonPropio.js"></script>

    <script type="text/javascript" src="js/otrosFormatos/anadirKML.js"></script>
    <script type="text/javascript" src="js/otrosFormatos/anadirGPX.js"></script>

    <script type="text/javascript" src="js/popup.js"></script>

    <script type="text/javascript" src="js/menuLateral/busquedaEnCatalogo.js"></script>
    <script type="text/javascript" src="js/menuLateral/cargaURLExterna.js"></script>
    <script type="text/javascript" src="js/menuLateral/cargaArchivoExterno.js"></script>
    <script type="text/javascript" src="js/menuLateral/menuTematicas.js"></script>
    <script type="text/javascript" src="js/menuLateral/menuGestionCapas.js"></script>
    <script type="text/javascript" src="js/menuLateral/controlMenuLateral.js"></script>
    <script type="text/javascript" src="js/menuLateral/cargarCapa.js"></script>

    <script type="text/javascript" src="js/menuSuperior/arrayNodos.js"></script>
    <script type="text/javascript" src="js/menuSuperior/menuNodos.js"></script>

    <script type="text/javascript" src="js/contexto/controlContexto.js"></script>
    <script type="text/javascript" src="js/contexto/generarContexto.js"></script>
    <script type="text/javascript" src="js/contexto/cargarContexto.js"></script>
  </head>
  <body onload="CrearMapa('blue_sea_usig');IniciarBarraLateral();CargarTematicas('');CargarNodos('');CrearMenuGestionCapas();GetRecords();ActivarListenerArchivosExternos();ActivarListenerCargarContexto();CrearLeyendaVacia();PonerIdioma('');
    <?php if ($capaCargar){echo $capas[$capaCargar];} ?>
    ">
    <header class="w-100">
      <!-- Barra superior -->
      <nav class="navbar p-0 m-0 navbar-expand-0">
        <img id="logoImago" class="img-fluid p-1 m-0"  title="Imago Orbis" style="height:53px;width:53px;margin:0em!important;" src="img/imago_color.png" alt="Imago Orbis"></img>
         <!-- <img id="logoImago" class="img-fluid p-1 m-0"  onclick="window.open('http://usig-proyectos.cchs.csic.es/IMAGOORBIS/')" title="Imago Orbis" style="height:53px;width:53px;margin:0em!important;" src="img/imago_color.png" alt="Imago Orbis"></img>-->
        <a class="nav-link m-0 p-0" href="#">
          <h1 id="txtVisualizador" class="p-1 px-2 m-0"></h1>
        </a>
        <a id="abrirMenuNodos" class="nav-link p-0 m-0" href="#" onclick="MostrarMenuNodos();OcultarMenuLat();"><i class="fas fa-caret-down"></i></a>
        <a id="cerrarMenuNodos" class="nav-link p-0 m-0" href="#" onclick="OcultarMenuNodos()"><i class="fas fa-caret-up"></i></a>
        <a class="navbar-brand ml-auto m-0 p-0" href="#">
    			<div class="row ml-auto justify-content-end mr-1 mt-1">
            <button id="botonCatalogo" type="button" class="btn btn_menu btn_catalogo m-0 p-0" onclick="window.open('http://161.111.72.7:8080/geonetwork/srv/spa/catalog.search#/home')"><p class="m-0 p-0 px-1" id="txtImagoIcono"></p></button>
    			</div>
          <div class="row ml-auto justify-content-end mr-1 mb-1">
            <button id="botonIdioma" type="button" class="btn btn_menu btn_idioma m-0 p-0" onclick="CambiarIdioma('en');"><p id="en_es" class="m-0 p-0 px-1">EN</p></button>
          </div>
        </a>
      </nav>
    </header>
    <main>
      <!-- MenÃº superior de nodos -->
      <div id="menuNodos" class="container-fluid p-0 m-0">
        <div class="row row_menu_nodos justify-content-left w-100 m-0 p-0">
          <div class="col-auto m-0 p-0">
            <div id="espNodos" class="card-deck m-0 p-0">
            </div>
          </div>
        </div>
      </div>

      <!-- Elemento mapa -->
      <div id="map" class="map">
      </div>

      <!-- Popup -->
      <div id="popup">
        <div id="acordeonPopup">
        </div>
        <div id="botonCerrarPopup" class="cierra_popup" onclick="CerrarPopup()">X</div>
      </div>

      <!-- Control de escala -->
      <div class="posicion_escala justify-content-left">
        <span id="escalaLineal"></span>
      </div>

      <!-- Control de coordenadas del mouse -->
      <div class="posicion_mouse justify-content-left">
        <span class="m-0 p-0" id="posicionMouse"></span>
      </div>

      <!-- Control de buscador de lugares -->
      <div id="barraLocalizar" class="input-group m-0 p-0 buscador_lugares">
        <input name="localizar" class="form-control" id="localizar" placeholder="Centrar mapa en..." onFocus="this.value=''" oninput="Localiza(CrearResultado);">
        <div class="input-group-prepend">
          <div class="input-group-text plus_localizar" id="btnLocalizar" onclick="Localiza(CrearResultado);"><i class="fas fa-map-signs"></i></div>
        </div>
        <div id="tablaLugares"></div>
      </div>

      <!-- Controles y menÃº de contexto -->
      <div class="ol-control boton_menu_contexto">
        <button id="btnAbrirMenuContexto" class="m-0 p-1" onclick="AbrirMenuContexto();CerrarMenuMedir();CerrarMenuDibujar();"><i class="fas fa-hdd"></i></button>
        <button id="btnCerrarMenuContexto" class="m-0 p-1 cerrar" onclick="CerrarMenuContexto();" style="display:none;"><i class="fas fa-hdd"></i></button>
      </div>
      <div id="menuContexto" class="row m-0 p-0" style="display:none;">
        <button id="btnGuardarContexto" class="m-0 p-1 div_opcion_menu_contexto" onclick="GenerarContexto();"></button>
        <button id="btnCargarContexto" class="m-0 p-1 div_opcion_menu_contexto">
        <input type="file" class="custom-file-input icono_seleccionar_archivo" id="selectorContexto" name="files[]" multiple/></button>
      </div>

      <!-- Controles y menÃº de herramientas de mediciÃ³n -->
      <div class="ol-control boton_menu_medir">
        <button id="btnAbrirMenuMedir" class="m-0 p-1" onclick="AbrirMenuMedir();CerrarMenuContexto();CerrarMenuDibujar();"><i class="fas fa-ruler-combined"></i></button>
        <button id="btnCerrarMenuMedir" class="m-0 p-1 cerrar" onclick="CerrarMenuMedir();" style="display:none;"><i class="fas fa-ruler-combined"></i></button>
      </div>
      <div id="menuMedir" class="row m-0 p-0" style="display:none;">
        <button id="btnMedirDistancia" class="m-0 p-1 div_opcion_menu_medir" onclick="HabilitarMedicion('distancia');"><i class="fas fa-minus"></i></button>
        <button id="btnMedirSuperficie" class="m-0 p-1 div_opcion_menu_medir" onclick="HabilitarMedicion('area');"><i class="fas fa-draw-polygon"></i></button>
        <button id="btnBorrarMedida" class="m-0 p-1 div_opcion_menu_medir" onclick="BorrarMedicion();"><i class="fas fa-trash-alt"></i></button>
      </div>

      <!-- Controles y menÃº de herramientas de dibujo -->
      <div class="ol-control boton_menu_dibujar">
        <button id="btnAbrirMenuDibujar" class="m-0 p-1" onclick="AbrirMenuDibujar();CerrarMenuContexto();CerrarMenuMedir();"><i class="fas fa-drafting-compass"></i></button>
        <button id="btnCerrarMenuDibujar" class="m-0 p-1 cerrar" onclick="CerrarMenuDibujar();" style="display:none;"><i class="fas fa-drafting-compass"></i></button>
      </div>
      <div id="menuDibujar" class="row m-0 p-0" style="display:none;">
        <button id="btnDibujarPoint" class="m-0 p-1 div_opcion_menu_dibujar" onclick="HabilitarDibujo('Point');"><i class="fas fa-circle"></i></button>
        <button id="btnDibujarLineString" class="m-0 p-1 div_opcion_menu_dibujar" onclick="HabilitarDibujo('LineString');"><i class="fas fa-minus"></i></button>
        <button id="btnDibujarPolygon" class="m-0 p-1 div_opcion_menu_dibujar" onclick="HabilitarDibujo('Polygon');"><i class="fas fa-draw-polygon"></i></button>
        <button id="btnDibujarAnotacion" class="m-0 p-1 div_opcion_menu_dibujar" onclick="HabilitarDibujo('Anotacion');"><i class="far fa-comment-alt"></i></button>
        <button id="btnDibujarNada" class="m-0 p-1 div_opcion_menu_dibujar" onclick="HabilitarDibujo('None');"><i class="fas fa-times"></i></button>
        <button id="btnBorrarDibujoFeature" class="m-0 p-1 div_opcion_menu_dibujar" onclick=""><i class="fas fa-eraser"></i></button>
        <button id="btnBorrarDibujoCompleto" class="m-0 p-1 div_opcion_menu_dibujar" onclick="BorrarDibujoCompleto();"><i class="fas fa-trash-alt"></i></button>
        <button id="btnDescargarDibujo" class="m-0 p-1 div_opcion_menu_dibujar" onclick="DescargarDibujo();"><i class="fas fa-file-download"></i></button>
      </div>

      <!-- Control y menÃº de cambio de mapa base -->
      <div class="ol-control boton_cambio_base">
         <button id="btnAbrirMapaBase" class="m-0 p-1" onclick="AbrirMenuMapaBase();" title=""><i class="fas fa-th-large"></i></button>
         <button id="btnCerrarMapaBase" class="m-0 p-1 cerrar" onclick="CerrarMenuMapaBase();" style="display:none;"  title=""><i class="fas -large"></i></button>
      </div>
      <div id="menuMapaBase" class="row m-0 p-0 div_cambio_mapa_base" style="display:none;">

        <div id="baseVTuSIG_BlueBaseMap" class=" m-0 p-0 mapa_base_i mapa_base_VTusig_bluebasemap" onclick="CambioMapaBase('blue_sea_usig');" title="Vector Tiles uSIG BlueBaseMap"></div>
        <div id="baseVTusig_light" class=" m-0 p-0 mapa_base_i mapa_base_VTusig_light" onclick="CambioMapaBase('vector_tiles_usig_light');" title="Vector Tiles uSIG light"></div>
        <div id="baseVTusig_dark" class=" m-0 p-0 mapa_base_i mapa_base_VTusig_dark" onclick="CambioMapaBase('vector_tiles_usig_dark');" title="Vector Tiles uSIG dark"></div>
        <div id="baseVTuSIG_OceanBaseMap" class=" m-0 p-0 mapa_base_i mapa_base_VTusig_oceanbasemap" onclick="CambioMapaBase('vector_tiles_usig_oceanbasemap');" title="Vector Tiles uSIG OceanBaseMap"></div>
          <!--<div id="baseOSM" class=" m-0 p-0 mapa_base_i mapa_base_osm" onclick="CambioMapaBase('osm_base_map');" title="Open Street Maps"></div>-->
        <div id="baseEsriWI" class=" m-0 p-0 mapa_base_i mapa_base_esri_wi" onclick="CambioMapaBase('esri_world_imagery');" title="Esri World Imagery"></div>
        <div id="baseEsriOB" class=" m-0 p-0 mapa_base_i mapa_base_esri_ob" onclick="CambioMapaBase('esri_ocean_basemap');" title="Esri Ocean Basemap"></div>
        <!--<div id="baseEsriWSR" class=" m-0 p-0 mapa_base_i mapa_base_esri_wsr" onclick="CambioMapaBase('esri_world_shaded_relief');" title="Esri World Shaded Relief"></div>-->
        <div id="baseIGN" class=" m-0 p-0 mapa_base_i mapa_base_wmts_ign" onclick="CambioMapaBase('mapa_base_ign');" title="Mapa Base IGN"></div>
        <div id="baseAWMC" class=" m-0 p-0 mapa_base_i mapa_base_wmts_awmc" onclick="CambioMapaBase('mapa_base_awmc');" title="Mapa base Mundo Antiguo"></div>
      </div>
      <!-- Control de leyenda -->
      <div id="leyendaCapas" class="container p-0 m-0">
      </div>
      <div id="divBotonLeyenda" class="ol-control">
        <button id="btnAbrirLeyenda" class="m-0 p-1" onclick="AbrirLeyenda();" title=""><i class="fas fa-th-list"></i></button>
      </div>

      <!-- Contenedor del menÃº lateral izquierdo (sidebar) -->
      <div id="contenedorSidebar">
        <div id="sidebar" class="sidebar container-fluid m-0 p-1">
          <div id="accordion">
            <div class="card card_boton_menu_lateral">
              <div class="card-header boton_menu_lateral" id="botonGestion">
                <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsableGestion" aria-expanded="true" aria-controls="colapsableGestion" onclick="cambiarIconoBoton('gestion');">
                  <div class="row justify-content-between">
                    <i class="fas fa-bars"></i>
                    <span id="txtMenuGestion" class="p-0 m-0 d-none d-sm-block"></span>
                    <span id="txtMenuGestionCorto" class="p-0 m-0 d-sm-none d-md-none d-lg-none d-xl-none"></span>
                    <i id="iconoMenuGestion" class="fas fa-angle-down"></i>
                  </div>
                </button>
              </h5>
            </div>
            <div id="colapsableGestion" class="collapse" aria-labelledby="botonGestion" data-parent="#accordion">
              <div id="espMenuGestionCapas" class="row m-0 p-0">
                <!-- Se carga contenido con la funciÃ³n GestionCapas() -->
              </div>
              <ul id="tablaGestion" class="list-group my-1">
              </ul>
            </div>
          </div>
          <div class="card card_boton_menu_lateral">
            <div class="card-header boton_menu_lateral" id="botonTematicas">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsableTematicas" aria-expanded="true" aria-controls="colapsableTematicas" onclick="cambiarIconoBoton('tematicas');">
                  <div class="row justify-content-between">
                    <i class='fas fa-th'></i>
                    <span id="txtSeleccionarTematicas" class="p-0 m-0 d-none d-sm-block"></span>
                    <span id="txtSeleccionarTematicasCorto" class="p-0 m-0 d-sm-none d-md-none d-lg-none d-xl-none"></span>
                    <i id="iconoMenuTematicas" class="fas fa-angle-up"></i>
                  </div>
                </button>
              </h5>
            </div>
            <div id="colapsableTematicas" class="collapse show" aria-labelledby="botonTematicas" data-parent="#accordion">
              <div id="espMenuTematicas">
                <!-- Se carga contenido con la funciÃ³n CargarTematicas() -->
              </div>
            </div>
          </div>
          <div class="card card_boton_menu_lateral">
            <div class="card-header boton_menu_lateral" id="botonBusqueda">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsableBusqueda" aria-expanded="true" aria-controls="colapsableBusqueda"  onclick="cambiarIconoBoton('busqueda');">
                  <div class="row justify-content-between">
                    <i class="fas fa-search"></i>
                    <span id="txtMenuBusqueda" class="p-0 m-0 d-none d-sm-block"></span>
                    <span id="txtMenuBusquedaCorto" class="p-0 m-0 d-sm-none d-md-none d-lg-none d-xl-none"></span>
                    <i id="iconoMenuBusqueda" class="fas fa-angle-down"></i>
                  </div>
                </button>
              </h5>
            </div>
            <div id="colapsableBusqueda" class="collapse" aria-labelledby="botonBusqueda" data-parent="#accordion">
              <div id="espMenuBusqueda" class="row m-1 p-0">
                <ul class="nav nav-tabs w-100 m-0 justify-content-center" id="tabMenuBusqueda" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="tabCatalogo" data-toggle="tab" role="tab" href="#espCatalogo" aria-selected="true">
                      <h6 id="txtTabCatalogo" class="p-0 m-0"></h6>    <!-- original h5-->
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tabFichero" data-toggle="tab" role="tab" href="#espFichero" aria-selected="false">
                      <h6 id="txtTabFichero" class="p-0 m-0"></h6>    <!-- original h5-->
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tabURL" data-toggle="tab" role="tab" href="#espURL" aria-selected="false">
                      <h6 id="txtTabURLServicio" class="p-0 m-0"></h6>    <!-- original h5-->
                    </a>
                  </li>
                </ul>
                <div class="tab-content w-100 m-1" id="espCarga">
                  <div class="tab-pane fade show active" id="espCatalogo" role="tabpanel" aria-labelledby="tabCatalogo">
                    <div class="form-group">
                      <select class="form-control w-100" id="selCatalogo">
                        <option value=""></option>
                      </select>
                      <div id="espBusquedaCatalogo">
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="espFichero" role="tabpanel" aria-labelledby="tabFichero">
                    <div class="input-group m-0 p-0" id="selectorArchivos"><!-- id aÃ±adido nhj-->
                      <input type="file" class="custom-file-input" id="selectorArchivos" name="files[]" multiple/><!--id aÃ±adido nhj -->
                      <label id="txtSeleccionarArchivo" class="custom-file-label txt_seleccionar_archivo_es" style="text-align:start"></label>
                    </div>
                    <div id="zonaArrastrar" class="m-0 mt-3">
                      <p id="txtArrastreArchivos"></p>
                      <div class="row justify-content-center">
                        <img class="img-fluid m-1" src="img/geojson_color.png" style="height:3.0em;"></img>
                        <img class="img-fluid m-1" src="img/shape_color.png" style="height:3.0em;"></img>
                        <img class="img-fluid m-1" src="img/kml_color.png" style="height:3.0em;"></img>
                        <img class="img-fluid m-1" src="img/kmz_color.png" style="height:3.0em;"></img>
                        <img class="img-fluid m-1" src="img/gpx_color.png" style="height:3.0em;"></img>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="espURL" role="tabpanel" aria-labelledby="tabURL">
                    <div class="input-group m-0 p-0">
                        <input name="cargar ruta" class="form-control" id="cargarURL" placeholder="DirecciÃ³n url del servicio" onFocus="this.value='';VaciarListaCapas()">
                        <div class="input-group-prepend">
                          <div class="input-group-text plus_cargarURL" onclick="CargarURLServicio(cargarURL.value)"><i class="fas fa-plus"></i></div>
                        </div>
                      </div>
                      <div id="espBusquedaURLExterna">
                        <p class="m-2 p-0" id="txtEjemploServicio"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="button" id="abrirCerrarMenuLateral">
          <a class="nav-link p-2 m-0" id="cerrarMenulateral" title="Cerrar" href="#" onclick="OcultarMenuLat();"><i class="fas fa-caret-left" style="vertical-align:middle;"></i></a>
        </div>
      </div>
    </main>

    <!-- Pie de pÃ¡gina -->
    <footer class="w-100">
      <div class="container-fluid">
        <div class="row justify-content-between">
          <div class="col-3">
            <div class="row justify-content-start">
              <div class="col-12 m-0 p-0">
                <a href="http://www.csic.es/" target="_blank" class="mx-2 p-0"><img src="img/csic_gris.png" class="my-0" alt="CSIC" title="CSIC" style="height:2.6em;"></img></a>
                <a href="http://cchs.csic.es/" target="_blank" class="mx-1 p-0"><img src="img/cchs_gris.png" class="my-1" alt="CCHS" title="CCHS" style="height:1.6em;"></img></a>
                <a href="http://unidadsig.cchs.csic.es/sig/" target="_blank" class="mx-2 p-0"><img src="img/usig_gris.png" class="my-1" alt="uSIG" title="uSIG" style="height:1.6em;"></img></a>
              </div>
            </div>
          </div>
          <div class="col-6 align-self-center">
            <div class="row justify-content-center">
              <div class="col-12 m-0 p-0 ">
               <p class="m-0 p-0 d-none d-sm-none d-md-none d-lg-block link_pie_CSIC text-center">C/Albasanz, 26-28. Madrid 28037 (España)| <a href="http://unidadsig.cchs.csic.es/sig/" target="_blank" > Desarrollo USIGyHD. Versión beta | </a><a href="./Doc_Legal/Aviso Legal.pdf" target="_blank" >Aviso legal |</a> <a href="https://www.csic.es/" target="_blank">2021 © CSIC.</a> </p>
                <p class="m-0 p-0 d-none d-sm-block d-md-block d-lg-none d-xl-none link_pie_CSIC text-center"><a href="http://unidadsig.cchs.csic.es/sig/" target="_blank" > Desarrollo USIGyHD. Versión beta |</a><a href="./Doc_Legal/Aviso Legal.pdf" target="_blank" >Aviso legal |</a> <a href="https://www.csic.es/" target="_blank">2021 © CSIC.</a> </p>
                <p class="m-0 p-0 d-sm-none d-md-none d-lg-none d-xl-none link_pie_CSIC text-center"><a href="http://unidadsig.cchs.csic.es/sig/" target="_blank" > Desarrollo USIGyHD. Versión beta |</a><a href="./Doc_Legal/Aviso Legal.pdf" target="_blank" >Aviso legal |</a> <a href="https://www.csic.es/" target="_blank">2021 © CSIC.</a> </p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="row justify-content-end">
              <div class="col-auto m-0 p-0">
                <button id="btnCompartir" class="btn boton_transparente ml-auto m-0 mx-2 my-1 p-0" title="" onclick="window.open('https://twitter.com/uSIG_CCHS_CSIC')">
                  <i class="fab fa-twitter"></i>
                </button>
                <button id="btnGithub" class="btn boton_transparente ml-auto m-0 mx-2 my-1 p-0" title="" onclick="window.open('https://github.com/usig-cchs-csic')">
                  <i class="fab fa-github"></i>
                </button>
                <button id="btnCC_BY_SA" class="btn boton_transparente ml-auto mx-2 my-0 p-0" title="" onclick="">
                  <img class="img-fluid" src="img/by-nc-sa.svg" style="height:1.9em;"></img>
                </button>
                <!--<button class="btn boton_transparente ml-auto mx-2 my-1 p-0" title="CC" onclick="">
                  <i class="fab fa-creative-commons"></i>
                </button>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
