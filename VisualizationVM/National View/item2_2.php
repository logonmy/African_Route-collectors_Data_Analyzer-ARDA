<html>
    <head>
        <link rel="stylesheet" href="css/select.css">
        <?php
            ini_set('memory_limit', '-1');

            $lastMonthPrefixes_2bytes = array();
            if (file_exists('outputs_Regional_View/2_Number_Origin_ASNs_visibles_in_more_than_1_IXP_in_Region_lastmonth/LastMonth__2bytes_number_visible_ASNs_in_more_than_1_IXP.txt') == 0) {
                $file = fopen('outputs_Regional_View/2_Number_Origin_ASNs_visibles_in_more_than_1_IXP_in_Region_lastmonth/LastMonth__2bytes_number_visible_ASNs_in_more_than_1_IXP.txt', "w");
                fwrite($file, "" . PHP_EOL);
                fclose($file);
            }
            $fileOpen = fopen('outputs_Regional_View/2_Number_Origin_ASNs_visibles_in_more_than_1_IXP_in_Region_lastmonth/LastMonth__2bytes_number_visible_ASNs_in_more_than_1_IXP.txt','r');
            if (!$fileOpen){
                echo 'ERROR: No ha sido posible abrir el archivo Revisa su nombre y sus permisos.'; exit;
            }

            $index = 0; // contador de líneas
            while (!feof($fileOpen)) { // loop hasta que se llegue al final del archivo
                $line = trim(fgets($fileOpen)); // guardamos toda la línea en $line como un string
                $list[$index] = explode(";",$line);
                $fileOpen++; // necesitamos llevar el puntero del archivo a la siguiente línea
                $index++;
            }
            array_shift($list);
          

            $list2 = array();
            for ($j=0; $j < 5; $j++){
                for ($k=0; $k < count($list); $k++){ 
                    if (strcmp($list[$k][0],strval($j+1)) == 0) {
                        $initialDate = explode('  ', $list[$k][3]);
                        $initialDate = $initialDate[0];
                        $endDate = explode('  ', $list[$k][4]);
                        $endDate = $endDate[0];  
                        $list2[$j][0] = "Week ".$list[$k][0]."\n (".trim($initialDate)." to \n".trim($endDate).")";
                        $list2[$j][1] = intval($list[$k][5]);
                        $list2[$j][2] = intval($list[$k][6]);
                    }
                    
                    
                }
            }
            $list = $list2;

            $lastMonthPrefixes_2bytes = $list;

            $lastMonthPrefixes_4bytes = array();
            if (file_exists('outputs_Regional_View/2_Number_Origin_ASNs_visibles_in_more_than_1_IXP_in_Region_lastmonth/LastMonth__4bytes_number_visible_ASNs_in_more_than_1_IXP.txt') == 0) {
                $file = fopen('outputs_Regional_View/2_Number_Origin_ASNs_visibles_in_more_than_1_IXP_in_Region_lastmonth/LastMonth__4bytes_number_visible_ASNs_in_more_than_1_IXP.txt', "w");
                fwrite($file, "" . PHP_EOL);
                fclose($file);
            }
            $fileOpen = fopen('outputs_Regional_View/2_Number_Origin_ASNs_visibles_in_more_than_1_IXP_in_Region_lastmonth/LastMonth__4bytes_number_visible_ASNs_in_more_than_1_IXP.txt','r');
            if (!$fileOpen){
                echo 'ERROR: No ha sido posible abrir el archivo Revisa su nombre y sus permisos.'; exit;
            }

            $index = 0; // contador de líneas
            while (!feof($fileOpen)) { // loop hasta que se llegue al final del archivo
                $line = trim(fgets($fileOpen)); // guardamos toda la línea en $line como un string
                $list[$index] = explode(";",$line);
                $fileOpen++; // necesitamos llevar el puntero del archivo a la siguiente línea
                $index++;
            }
            array_shift($list);
            $list2 = array();
            for ($j=0; $j < 5; $j++){
                for ($k=0; $k < count($list); $k++){ 
                    if (strcmp($list[$k][0],strval($j+1)) == 0) {
                        $initialDate = explode('  ', $list[$k][3]);
                        $initialDate = $initialDate[0];
                        $endDate = explode('  ', $list[$k][4]);
                        $endDate = $endDate[0];  
                        $list2[$j][0] = "Week ".$list[$k][0]."\n (".trim($initialDate)." to \n".trim($endDate).")";
                        $list2[$j][1] = intval($list[$k][5]);
                        $list2[$j][2] = intval($list[$k][6]);
                    }
                    
                    
                }
            }
            $list = $list2;
            $lastMonthPrefixes_4bytes = $list;

            $lastMonthPrefixes = array();
            for ($i=0; $i < count($lastMonthPrefixes_2bytes); $i++) { 
                $lastMonthPrefixes[$i][0] = $lastMonthPrefixes_2bytes[$i][0];
                $lastMonthPrefixes[$i][1] = $lastMonthPrefixes_2bytes[$i][1];
                $lastMonthPrefixes[$i][2] = $lastMonthPrefixes_4bytes[$i][1];
            }
            



            $lastYearPrefixes = array();
            if (file_exists('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_lastyear/LastYear__2and4bytes_number_visible_Origin_ASNs_in_more_than_1_IXP.txt') == 0) {
                $file = fopen('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_lastyear/LastYear__2and4bytes_number_visible_Origin_ASNs_in_more_than_1_IXP.txt', "w");
                fwrite($file, "" . PHP_EOL);
                fclose($file);
            }
            $fileOpen = fopen('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_lastyear/LastYear__2and4bytes_number_visible_Origin_ASNs_in_more_than_1_IXP.txt','r');
            if (!$fileOpen){
                echo 'ERROR: No ha sido posible abrir el archivo'.$listIXP[$i][0].'. Revisa su nombre y sus permisos.'; exit;
            }

           for ($z = 0; $z <= 12; $z++) {
                $months[] = date("m-Y", strtotime( date( 'Y-m-01' )." -$z months"));
            }

            $prueba = array();
            for ($z=0; $z < count($months); $z++) {
                $aux = explode("-",$months[$z]);
                $aux[0] = (string)intval($aux[0]); 
                $prueba[$z] = $aux[0].'-'.$aux[1].';0;0';
            }

            $prueba = array_reverse($prueba);
            $month = intval(date("m"));
            $plantilla = array();
            for ($k=0; $k < 13; $k++) { 
                $plantilla[$k] = explode(";",$prueba[$k]);
            }
            
            $list =  array();
            $index = 0; // contador de líneas
            while (!feof($fileOpen)) { // loop hasta que se llegue al final del archivo
                $line = trim(fgets($fileOpen)); // guardamos toda la línea en $line como un string
                $list[$index] = explode(";",$line);
                $fileOpen++; // necesitamos llevar el puntero del archivo a la siguiente línea
                $index++;
            }

            for ($k=0; $k < count($plantilla); $k++) { 
                for ($j=0; $j < count($list); $j++) { 
                    if (strcmp(trim($plantilla[$k][0]), trim($list[$j][0])) == 0) {
                        $plantilla[$k][1] = intval($list[$j][1]);
                        $plantilla[$k][2] = intval($list[$j][2]);
                    }
                }
            } 
            $lastYearPrefixes = $plantilla;
            

            $multiYearPrefixes = array();
            
            if (file_exists('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_multiyear/MultiYear__2and4bytes_number_visible_Origin_ASNs_in_more_than_1_IXP.txt') == 0) {
                $file = fopen('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_multiyear/MultiYear__2and4bytes_number_visible_Origin_ASNs_in_more_than_1_IXP.txt', "w");
                fwrite($file, "" . PHP_EOL);
                fclose($file);
            }
            $fileOpen = fopen('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_multiyear/MultiYear__2and4bytes_number_visible_Origin_ASNs_in_more_than_1_IXP.txt','r');
            if (!$fileOpen){
                echo 'ERROR: No ha sido posible abrir el archivo'.$listIXP[$i][0].'. Revisa su nombre y sus permisos.'; exit;
            }
            $list =  array();
            $index = 0; // contador de líneas
            while (!feof($fileOpen)) { // loop hasta que se llegue al final del archivo
                $line = trim(fgets($fileOpen)); // guardamos toda la línea en $line como un string
                $list[$index] = explode(";",$line);
                $fileOpen++; // necesitamos llevar el puntero del archivo a la siguiente línea
                $index++;
            }
            array_shift($list);
            $list2 = array();

            for ($j=0; $j < intval(date("Y"))-2004; $j++){
                $anio = trim((string)(intval(date("Y"))-$j));
                for ($k=0; $k < count($list); $k++){ 
                    if (strcmp($list[$k][0],$anio) == 0) {
                        $list2[$j][0] = $list[$k][0];
                        $list2[$j][1] = intval($list[$k][1]);
                        $list2[$j][2] = intval($list[$k][2]);
                    }
                    
                    
                }
            }
            $multiYearPrefixes = array_reverse($list2);
            

    
        ?>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
    
            var lastMonthPrefixes = (<?php echo json_encode($lastMonthPrefixes)?>);
            var lastYearPrefixes = (<?php echo json_encode($lastYearPrefixes)?>);
            var multiYearPrefixes = (<?php echo json_encode($multiYearPrefixes)?>);

            var month = new Array();
            month[0] = "Jan";
            month[1] = "Feb";
            month[2] = "Mar";
            month[3] = "Apr";
            month[4] = "May";
            month[5] = "Jun";
            month[6] = "Jul";
            month[7] = "Aug";
            month[8] = "Sep";
            month[9] = "Oct";
            month[10] = "Nov";
            month[11] = "Dec";

            google.load("visualization", "1", {packages:["corechart"]});
            google.setOnLoadCallback(paint);
            
            for (var i = 0; i < lastYearPrefixes.length; i++) {
                aux = lastYearPrefixes[i][0].split("-");
                aux[0] = month[parseInt(aux[0])-1];
                lastYearPrefixes[i][0] = aux[0]+" "+aux[1]
                lastYearPrefixes[i][1] = parseInt(lastYearPrefixes[i][1]);
                lastYearPrefixes[i][2] = parseInt(lastYearPrefixes[i][2]);
            };

            function paint() {
                drawChart();
            }

            function drawChart() {
                /*.........................*/
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Years');
                data.addColumn('number', '# 2-BYTE ASNs');
                data.addColumn('number', '# 4-BYTE ASNs');

                data.addRows(lastMonthPrefixes);

                var options = {
                    animation:{ duration: 1000,
                                easing: 'out',
                                startup: true},
                    width: 1000,
                    height: 300,
                    hAxis: {
                        title: 'Date thresholds', 
                        textStyle:{fontName: 'Trebuchet MS', fontSize: '10'},
                        titleTextStyle:{fontName: 'Trebuchet MS'}},
                    vAxis: {
                        viewWindow:{ min: 0 },
                        title: 'Number of Origin ASNs',
                        textStyle:{fontName: 'Trebuchet MS'},
                        titleTextStyle:{fontName: 'Trebuchet MS'}},
                    legend: {textStyle:{fontName: 'Trebuchet MS'}},
                    tooltip: {textStyle:{fontName: 'Trebuchet MS'}},
                    colors: ['#53A8FB', '#F1CA3A'],
                };

                var chart = new google.visualization.AreaChart(document.getElementById('originASNs'));
                chart.draw(data, options);

                /*.........................*/
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Years');
                data.addColumn('number', '# 2-BYTE ASNs');
                data.addColumn('number', '# 4-BYTE ASNs');

                data.addRows(lastYearPrefixes);

                var options = {
                    animation:{ duration: 1000,
                                easing: 'out',
                                startup: true},
                    width: 1000,
                    height: 300,
                    hAxis: {
                        title: 'Months', 
                        textStyle:{fontName: 'Trebuchet MS', fontSize: '10'},
                        titleTextStyle:{fontName: 'Trebuchet MS'}},
                    vAxis: {
                        viewWindow:{ min: 0 },
                        title: 'Number of Origin ASNs',
                        textStyle:{fontName: 'Trebuchet MS'},
                        titleTextStyle:{fontName: 'Trebuchet MS'}},
                    legend: {textStyle:{fontName: 'Trebuchet MS'}},
                    tooltip: {textStyle:{fontName: 'Trebuchet MS'}},
                    colors: ['#53A8FB', '#F1CA3A'],
                };

                var chart = new google.visualization.AreaChart(document.getElementById('lastYear'));
                chart.draw(data, options);

                /*.........................*/
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Years');
                data.addColumn('number', '# 2-BYTE ASNs');
                data.addColumn('number', '# 4-BYTE ASNs');

                data.addRows(multiYearPrefixes);

                var options = {
                    animation:{ duration: 1000,
                                easing: 'out',
                                startup: true},
                    width: 1000,
                    height: 300,
                    hAxis: {
                        title: 'Years', 
                        textStyle:{fontName: 'Trebuchet MS', fontSize: '10'},
                        titleTextStyle:{fontName: 'Trebuchet MS'}},
                    vAxis: {
                        viewWindow:{ min: 0 },
                        title: 'Number of Origin ASNs',
                        textStyle:{fontName: 'Trebuchet MS'},
                        titleTextStyle:{fontName: 'Trebuchet MS'}},
                    legend: {textStyle:{fontName: 'Trebuchet MS'}},
                    tooltip: {textStyle:{fontName: 'Trebuchet MS'}},
                    colors: ['#53A8FB', '#F1CA3A'],
                };

                var chart = new google.visualization.AreaChart(document.getElementById('multiYear'));
                chart.draw(data, options);
            }

           $(window).resize(function () {
                resize();
            });

            $(document).ready(function(){
                resize();
            });

            var designWidth = 1100;

            function resize() {
                var w = $(window).width();
                var zoom = parseInt(w / designWidth * 100).toString() + "%";
                $("#content").css("zoom", zoom);
            }

            function descarga1(){    
                downloadURI('outputs_Regional_View/2_Number_Origin_ASNs_visibles_in_more_than_1_IXP_in_Region_lastmonth/LastMonth__2bytes_list_visible_ASNs_in_more_than_1_IXP.txt','Lastmonth_2bytes.txt');
                downloadURI('outputs_Regional_View/2_Number_Origin_ASNs_visibles_in_more_than_1_IXP_in_Region_lastmonth/LastMonth__4bytes_list_visible_ASNs_in_more_than_1_IXP.txt','Lastmonth_4bytes.txt');
            }

            function descarga2(){
                downloadURI('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_lastyear/LastYear__2bytes_list_visible_ASNs_in_more_than_1_IXP.txt','Lastyear_2bytes.txt');
                downloadURI('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_lastyear/LastYear__4bytes_list_visible_ASNs_in_more_than_1_IXP.txt','Lastyear_4bytes.txt');
            }

            function descarga3(){
                downloadURI('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_multiyear/MultiYear__2bytes_list_visible_ASNs_in_more_than_1_IXP.txt','Multiyear_2bytes.txt');
                downloadURI('outputs_Regional_View/2_Number_Origin_ASNs_in_more_than_1_IXP_in_Region_multiyear/MultiYear__4bytes_list_visible_ASNs_in_more_than_1_IXP.txt','Multiyear_4bytes.txt');
            }

            function downloadURI(uri,name) {
                var link = document.createElement("a");
                link.download = name;
                link.href = uri;
                link.click();
            }

        </script>
        <style type="text/css">
            body{
                line-height: 1px;
            }
            #originASNs {
                height:1em
                line-height: 1px;
                margin-left: 50px;
            }
            #multiyear {
                margin-left: 50px;
            }
            #lastyear {
                margin-left: 50px;
            }
            #separador {
                margin-top: 100px;
            }
            #select{
                margin: 10px;
                margin-left: 530px
            }
            #visibleASNs{
                margin-left: 100px;
            }
            #prefixes{
                margin-left: 100px;
            }
            #parrafos{
                margin-left: 200px;
            }

            .titulo{
                font-size: 17px;
                font-family: 'Trebuchet MS';
                font-weight: 400;
                color: #757575;
            } 

            #subtitulo{
                font-size: 14px;
                font-family: 'Trebuchet MS';
                color: #BDBDBD;
            }
            #botonDescarga{
                top: 100px;
                margin-left: 900px;
                font-size: 12px;
                font-family: 'Trebuchet MS'
            }
        </style>

    </head>
    <body>
        <div id="content">
            <div>
                <div id="parrafos">
                    <p class ="titulo" id="titulo1">Number of 2/4 BYTES Origin ASNs visible in one or more IXPs</p>     
                    <p id="subtitulo">Per week over the last month</p>
                </div>
                <div id="originASNs" style="width: 1000px; height: 300px;"></div>
                <div id= "botonDescarga">
                   <img onclick="javascript:descarga1();"id="enlaceDesgarga" src="images/dbutton.png" height="30">
                </div>
            </div>

            <div id="separador"></div>
            <div id="parrafos">
                <p class ="titulo" id="titulo2">Number of 2/4 BYTES Origin ASNs visible in one or more IXPs</p>     
                <p id="subtitulo">Per month over the last year</p>
            </div>
            <div id="lastYear" style="width: 1000px; height: 300px;"></div>
            <div id= "botonDescarga">
                   <img onclick="javascript:descarga2();" id="enlaceDesgarga" src="images/dbutton.png" height="30">
            </div>

            <div id="separador"></div>
            <div id="parrafos">
                <p class ="titulo" id="titulo3">Number of 2/4 BYTES Origin ASNs visible in one ore more IXPs</p>     
                <p id="subtitulo">Per year over the historical Data (2005 up to now)</p>
            </div>
            <div id="multiYear" style="width: 1000px; height: 300px;"></div>
            <div id= "botonDescarga">
                   <img onclick="javascript:descarga3();" id="enlaceDesgarga" src="images/dbutton.png" height="30">
            </div>
        </div>
    </body>
</html>
