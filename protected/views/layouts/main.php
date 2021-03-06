<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="description" content="VocalEyes: Turning Ideas into Action. An advanced participation and engagement tool. Community Voting" /> 
	<meta name="keywords" content="VocalEyes, community voting, Ideas into Action, Vocal Eyes, LocalEyes, PersonalEyes, The Shire Initiative, vocalise,localise, consultation tool, participation tool, idea management, democracy, consensus building, empowerment" /> 
	<meta name="copyright" content="Copyright (c) 2012 VocalEyes Ltd. All Rights Reserved." />
	<meta name="author" content="VocalEyes Ltd" /> 
	<meta name="robots" content="index,follow" />
	<meta name="resource-type" content="document" /> 
	 
	<?php
	  //$themeBase = Yii::app()->theme->baseUrl;
	  $baseUrl = Yii::app()->baseUrl;
	  // client script 
	  $cs = Yii::app()->getClientScript();
	  
	  $cs->registerPackage('baseJs');
	  $cs->registerPackage('bootstrap3');
	  $cs->registerPackage('perfectum');
	  $cs->registerPackage('font-awesome');
	  
	
	  ?>  
</head>

<body>

<?php $this->renderPartial('//layouts/_navbar'); ?>
<div class="container">
		<div class="row">
			<?php echo $content; ?>
			<p>&nbsp;</p> <p>&nbsp;</p> 
			<p>&nbsp;</p> 
			<p>&nbsp;</p> 
			<p>&nbsp;</p> 
			<p>&nbsp;</p> 
			<p>&nbsp;</p> 
			<p>&nbsp;</p> 
			<p>&nbsp;</p> 
			
		</div><!--/col-->
		<?php $this->renderPartial('//layouts/_footer') ; ?>
</div><!--/row-->




</body>
</html>
