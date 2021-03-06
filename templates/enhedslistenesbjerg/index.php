<?php  
/*------------------------------------------------------------------------
# author    Webitall ApS
# copyright Copyright © 2013 webitall. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.webitall.dk
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// Load jQuery
JHtml::_('jquery.framework');

// parameters (template)
$modernizr = $this->params->get('modernizr');
$bootstrapjs = $this->params->get('bootstrapjs');
$bootstrapcss = $this->params->get('bootstrapcss');
$bootstraptheme = $this->params->get('bootstraptheme');
$fontawesome = $this->params->get('fontawesome');

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu(); 
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// CSS
if ($bootstrapcss==1) $doc->addStyleSheet($tpath.'/css/bootstrap.min.css');
if ($bootstraptheme==1) $doc->addStyleSheet($tpath.'/css/bootstrap-theme.min.css');
$doc->addStyleSheet($tpath.'/css/template.css'); 
if ($fontawesome==1) $doc->addStyleSheet($tpath.'/css/font-awesome.min.css');

// JS
if ($bootstrapjs==1) $doc->addScript($tpath.'/js/bootstrap.min.js'); 
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr.js'); 

// Columns
if ($this->countModules('left') && !$this->countModules('right')){ $leftcol = "3"; $centercol = "9";
}elseif (!$this->countModules('left') && $this->countModules('right')){ $rightcol = "3"; $centercol = "9";
}elseif ($this->countModules('left') && $this->countModules('right')){ $leftcol = "3"; $rightcol = "3"; $centercol = "6";
}elseif (!$this->countModules('left') && !$this->countModules('right')){ $centercol = "12"; }

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72.png"> 
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png">
	
	<?php if($this->params->get('ga')): ?> 
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			ga('create', '<?php echo $this->params->get('ga');?>', '<?php echo $this->params->get('gaurl');?>');
			ga('send', 'pageview');
		</script>
	<?php endif; ?> 
  
</head>
	
<body<?php if($pageclass): ?>class="<?php echo $pageclass; ?>"<?php endif; ?>>
	
	<div class="container">
	
			<div class="row">
				
				<jdoc:include type="modules" name="topmenu" style="xhtml" />
				
			</div>
	
	
			<div class="row" id="maincontent"> 
				<?php if ($this->countModules('left') ) : ?>
					<div class="col-md-<? echo $leftcol; ?>">
						
						<jdoc:include type="modules" name="left" style="extended" />
		    		</div>
		    	<?php endif; ?>
		    	
		    	<div class="col-md-<? echo $centercol; ?>">
		    		<?php if(count(JFactory::getApplication()->getMessageQueue())):?>
			    		<jdoc:include type="message" />
					<?php endif; ?>
					<?php if ($this->countModules('top')): ?>
						  <jdoc:include type="modules" name="top" style="xhtml" />
					<?php endif; ?>
		    		<jdoc:include type="component" />
					<?php if ($this->countModules('bottom')): ?>
						  <jdoc:include type="modules" name="bottom" style="xhtml" />
					<?php endif; ?>
		    	</div>
		    	
				<?php if ($this->countModules('right')): ?>
					<div class="col-md-<? echo $rightcol; ?>">
						<jdoc:include type="modules" name="right" style="extended" />
		    		</div>
		    	<?php endif; ?>	
			</div>
			<div class="footer">Enhedslisten Esbjerg, <?php echo date('Y');?>. <a href="/">Kontakt os</a></div>
	</div>
	
<jdoc:include type="modules" name="debug" />

</body>
</html>