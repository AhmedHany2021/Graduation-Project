        <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script type="text/javascript">
            window.onload = function (){
            var xAxisStripLinesArray = [];
            var yAxisStripLinesArray = [];
            var dps = [];
            var dataPointsArray = [<?php echo implode(',', $ecg->ecg_read) ?>];
            var chart = new CanvasJS.Chart("chartContainer",
            {
                    title:{
            text:"ECG Report"
            },
            subtitles:[{
                 text: "Heart Rate: <?php echo $ecg->heart_rate ?>",
                horizontalAlign: "left"
            }],
            axisY:{
            stripLines:yAxisStripLinesArray,
            gridThickness: 2,
            gridColor:"#DC74A5",
            lineColor:"#DC74A5",
            tickColor:"#DC74A5",
            labelFontColor:"#DC74A5",        
            },
            axisX:{
            stripLines:xAxisStripLinesArray,
            gridThickness: 2,
            gridColor:"#DC74A5",
            lineColor:"#DC74A5",
            tickColor:"#DC74A5",
            labelFontColor:"#DC74A5"
            },
            data: [
            {
            type: "spline",
            color:"black",
            dataPoints: dps
            }
            ]
            });

            addDataPointsAndStripLines();
            chart.render();

            function addDataPointsAndStripLines(){
                    //dataPoints
            for(var i=0; i<dataPointsArray.length;i++){
            dps.push({y: dataPointsArray[i]});
            }
            //StripLines
            for(var i=0;i<3000;i=i+100){
            if(i%1000 !== 0)
              yAxisStripLinesArray.push({value:i,thickness:0.7, color:"#DC74A5"});  
            }
            for(var i=0;i<1400;i=i+20){
            if(i%200 !== 0)
              xAxisStripLinesArray.push({value:i,thickness:0.7, color:"#DC74A5"});  
            }
        }
    };            
   
        </script>
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
