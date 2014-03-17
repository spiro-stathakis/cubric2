<?php 

return array(
	 'packages' => array(
		 'bootstrap3'=>array(
			 // pass a baseUrl because we don't need to publish 
			 'baseUrl'=> '/packages/bootstrap',   
			 'css'    => array( 'css/bootstrap.min.css' , 'css/bootstrap-theme.min.css' ),
			 'js'     => array( 'js/bootstrap.min.js' ),
			 'depends'=> array('baseCss','jquery')
			 
		 ),
		 
		 'baseJs'=>array(
		 	'baseUrl'=> '/',
		 	'js'=>array('js/app.js' , 'js/appBoot.js'), 
		 ), 
		 
		 
		 'baseCss'=>array(
		 	'baseUrl'=> '/',
		 	'css'=>array('css/normalize.css'), 
		 ),
		 
		 'gritter'=>array(
		 	'baseUrl'=>'/packages/gritter', 
		 	'css'=>array('jquery.gritter.css'),
		 	'js'=>array('jquery.gritter.min.js'),
		 ), 
		 'perfectum'=>array(
		 	'baseUrl'=>'/packages/perfectum/assets', 
		 	'css'=>array('css/style.min.css'), 
		 	'depends'=> array('baseCss','jquery','bootstrap3')
		 ), 
		 
		 'font-awesome'=>array(
		 	'baseUrl'=>'/packages/font-awesome',
		 	'css'=>array('css/font-awesome.min.css'),
		 ), 
		 
	),
); 
