<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>



 <div class="tooltip"  style="border: 1px solid #aaa;margin-right: 10px;"> 
                <table> 
                    <tr> 
                        <td>User: </td><td><div class="tooltip-item" id="tooltipUser">&nbsp;</div></td> 
                    </tr> 
                    <tr> 
                        <td>Home: </td><td><div class="tooltip-item"  id="tooltipHome">&nbsp;</div></td> 
                    </tr> 
                    <tr> 
                        <td>Scratch: </td><td><div class="tooltip-item"  id="tooltipScratch">&nbsp;</div></td> 
                    </tr> 
                     
                </table> 
            </div>  

            
             
            	<div  id="chart1"></div> 
                 
             
             

            
            
<script> 

$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [<?php echo $home; ?>];
        var s2 = [<?php echo $scratch ?>];
        
         var ticks = ['sapcm6 ','sapmd5 ','sapmgb ','sapsm7 ','mdntml ','sapsb7 ','saprgw ','saptb2 ','scmcc2 ','sapkds ','c1041263 ','sap8kc ','sapcpa ','sap7ad ','c1210219 ','mdnsf ','sapab6 ','wmdvt2 ','sapkm2 ','sapseg ','saplk1 ','sap2jps ','saprc7 ','sapdj1 ','sap5jw ','sapld4 ','saplb4 ','']; 
        plot1 = $.jqplot('chart1', [s1 , s2], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            //animate: !$.jqplot.use_excanvas,
            stackSeries: true,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true } 
                
            },
            legend: {
            	    show:true,
            	    labels:['Home usage' , 'Scratch usage']
            }, 
            title:{
            	    text: 'Occupancy of CUBRIC storage system (in gigabytes)'    
            } , 
            axes: {
            	    
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: true }
        });
     
        $('#chart1').bind('jqplotDataClick',
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series:'+seriesIndex+', point:'+pointIndex+', data:'+data);
            }
        );
    });
</script> 
