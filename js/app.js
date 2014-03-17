$.app = {
    page:undefined,
    mc:undefined, 
    lat:undefined, 
    lon:undefined, 
    init:function () 
    {
    	if ($.app.page !== undefined) 
        {
        	
            if (!$.app.page.delayed) // Flag, in case you don't need to load file on start
                $.app.page.init.call($.app.page);
        }
		
		$(window).resize(function () {
			if ($('#home-info, #home-search, #home-dashboard').is(":hidden"))
        		$('a').tooltip();
		}).resize();

    },
    
    inString:function (str,substr,start)
    {    
    	    var oStr = new String(str);
    	    return oStr.indexOf(substr,start);
    }, 
    
    geoSuccess:function(position)
    {    
    	    		
    	  
    },
    
    geoError:function() 
    {
    	    alert('Geo location failure');
    },
   
    geoLocate:function()
    {
    	    if (navigator.geolocation) 
    	    {
    	    	    navigator.geolocation.getCurrentPosition(this.geoSuccess, this.geoError);	  
    	    }
    } 
   
   
    
    
    
};
