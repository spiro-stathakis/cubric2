<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>





<div class="col-sm-2 main-menu-span">
			<?php $this->renderPartial('//layouts/_sideBar') ; ?> 
</div><!--/col-->
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block col-sm-10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
<div id="content" class="col-sm-10">
			<?php echo $content ; ?> 
			
</div><!--/row-->



<?php $this->endContent(); ?>