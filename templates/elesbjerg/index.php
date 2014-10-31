<?php  
/*------------------------------------------------------------------------
# author    Webitall ApS
# copyright Copyright © 2013 webitall. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.webitall.dk
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// load jQuery
JHtml::_('jquery.framework', true, false, false);

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
$doc->addStyleSheet($tpath.'/css/template.css'); 
if ($fontawesome==1) $doc->addStyleSheet($tpath.'/css/font-awesome.min.css');

// JS
if ($bootstrapjs==1) $doc->addScript($tpath.'/js/bootstrap.min.js'); 
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr.js'); 
if ($bootstrapjs==1) $doc->addScript($tpath.'/js/slide.js'); 

// Columns
if ($this->countModules('left') && !$this->countModules('right')){ $leftcol = "3"; $centercol = "9";
}elseif (!$this->countModules('left') && $this->countModules('right')){ $rightcol = "5"; $centercol = "7";
}elseif ($this->countModules('left') && $this->countModules('right')){ $leftcol = "3"; $rightcol = "3"; $centercol = "6";
}elseif (!$this->countModules('left') && !$this->countModules('right')){ $centercol = "12"; }

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <jdoc:include type="head" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72.png"> 
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png">
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'> 

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

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="<?php echo $tpath; ?>/images/logo.png"></a>
        </div>
        <div class="collapse navbar-collapse"> 
          <ul class="nav navbar-nav navbar-right">
          	<jdoc:include type="modules" name="topmenu" />
             <jdoc:include type="modules" name="search-top" />
           </ul>
          <jdoc:include type="modules" name="search-mobile" />
         </div>
      </div>
    </div>
    
    
    <div class="wrapper">
    
		<?php if ($menu->getActive() != $menu->getDefault()): ?>
	      <div class="subheader">
	        <div class="container">
	          <div class="row">
	            <div class="col-sm-5">
	              <h1><?php echo $pagetitle = $doc->getTitle(); ?> </h1> 
	            </div>
	            <div class="col-sm-7">
	            		<jdoc:include type="modules" name="breadcrumbs" />
	            </div>
	          </div>
	        </div>
	      </div>
      
      
	      <div class="container">	
		
				<div class="row"> 
					<?php if ($this->countModules('left')): ?>
						<div class="col-md-<? echo $leftcol; ?>">
							<jdoc:include type="modules" name="left" style="extended" />
			    		</div>
			    	<?php endif; ?>
			    	
			    	<div class="col-md-<? echo $centercol; ?>">
			    		<?php //if(count($app->getMessageQueue())):?>
				    		<jdoc:include type="message" />
						<?php //endif; ?>
						
			    		<jdoc:include type="component" /> 
			    		
			    		<div class="row">
			    			<div class="<?php if($this->countModules('component-right')): ?>col-md-7<?php else: ?>col-md-12<?php endif; ?>">
					    		<jdoc:include type="modules" name="component" style="extended" />
				    		</div>
				    		<?php if($this->countModules('component-right')): ?>
				    		<div class="col-md-5">
						    	<jdoc:include type="modules" name="component-right" style="extended" />				    		
				    		</div>
				    		<?php endif; ?>
			    		</div>
			    	</div>
			    	
					<?php if ($this->countModules('right')): ?>
						<div class="col-md-<? echo $rightcol; ?>">
							<jdoc:include type="modules" name="right" style="extended" />
			    		</div>
			    	<?php endif; ?>	
				</div>
	        
	      </div>
	      <?php endif; ?>

	      <?php if ($menu->getActive() == $menu->getDefault()): ?>	      
	      <div id="slider">
		      
		      
		      <div id="slide" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#slide" data-slide-to="0" class="active"></li>
				    <li data-target="#slide" data-slide-to="1"></li>
				  </ol>
				
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				    <div class="item active">
				      <a href="http://www.webitall.dk/produkter/webudvikling/mobil-design/"><img src="<?php echo $tpath; ?>/images/responsive.jpg" class="img-responsive" /></a>
				      <div class="carousel-caption">
				       <div class="caption-header">Virker dit website på mobile enheder?</div>
				       
				       <div class="caption-content hidden-xs">
				       Flere og flere besøg kommer fra mobile enheder, såsom smartphones og tablets. Du skal du som webshop eller website-ejer være opmærksom på. Det er derfor en rigtig god idé at optimere din webshop eller website til de nye trends. 
				       </div>
				       
				       <div class="caption-button hidden-xs">
					       <a href="http://www.webitall.dk/produkter/webudvikling/mobil-design/" class="btn btn-transparent btn-lg">Læs mere om Mobilt Webdesign</a>
				       </div>
				       
				      </div>
				    </div>
				    <div class="item">
				      <a href="http://www.webitall.dk/produkter/markedsforing/sogemaskineoptimering/"><img src="<?php echo $tpath; ?>/images/google.jpg" class="img-responsive" /></a>
				      <div class="carousel-caption">
				       <div class="caption-header">Kan du blive fundet på Google?</div>
				       
				       <div class="caption-content hidden-xs">
					    Du kender det sikkert fra dig selv, ofte starter en købsproces med en søgning på Google. Det er derfor vigtigt at være tilstede i toppen af Googles organiske søgeresultater. Meget kan du gøre selv, men ofte kan det hele virke meget uoverskueligt. 
				       </div>
				       
				       <div class="caption-button hidden-xs">
					       <a href="http://www.webitall.dk/produkter/markedsforing/sogemaskineoptimering/" class="btn btn-transparent btn-lg">Læs mere om Søgemaskineoptimering</a>
				       </div>
				       
				      </div>
				    </div>
				  </div>
				
				  <!-- Controls -->
				  <a class="left carousel-control hidden-xs" href="#slide" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control hidden-xs" href="#slide" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				  </a>
				</div>
		      
		      
		      
	      </div>
	      
	      <div id="welcome">
		      
		      <jdoc:include type="modules" name="welcome" style="raw" />
		      
		      <div class="call">
		      	<div class="container">
			      <div class="row">
				      
				      <div class="col-md-8 col-md-offset-2">
					      
					      Giv os et ring på <span class="grey">70 26 62 63</span> eller <jdoc:include type="modules" name="front-cta" style="raw" />
					      
				      </div>
				      
			      </div>
			      </div>
		      </div>
		      
	      </div>
	      
	      <div id="products">
		      
		      <div class="container">
		      			
			      <div class="row">
				      
				      <div class="col-md-3 col-sm-3 col-xs-6">
				      	
				      	<a href="http://www.webitall.dk/produkter/hosting/">
				      	<div class="icon">
						  	<span class="fa-stack fa-lg facebook">
							  <i class="fa fa-circle fa-stack-2x"></i>
							  <i class="fa fa-desktop fa-stack-1x fa-inverse"></i>
							</span>	
				      	</div>			      	
				      	<div class="title">Hosting</div>
				      	</a>
				      </div>
				      
				      <div class="col-md-3 col-sm-3 col-xs-6">
					    
					    <a href="http://www.webitall.dk/produkter/markedsforing/">  
				      	<div class="icon">
						  	<span class="fa-stack fa-lg facebook">
							  <i class="fa fa-circle fa-stack-2x"></i>
							  <i class="fa fa-users fa-stack-1x fa-inverse"></i>
							</span>	
				      	</div>			      	
				      	<div class="title">Markedsføring</div>
					    </a> 
					     
					      
				      </div>
				      <div class="col-md-3 col-sm-3 col-xs-6">
					    
					    <a href="http://www.webitall.dk/produkter/webudvikling/">  
				      	<div class="icon">
						  	<span class="fa-stack fa-lg facebook">
							  <i class="fa fa-circle fa-stack-2x"></i>
							  <i class="fa fa-gears fa-stack-1x fa-inverse"></i>
							</span>	
				      	</div>			      	
				      	<div class="title">Webudvikling</div>
					    </a>
					      
				      </div>
				      <div class="col-md-3 col-sm-3 col-xs-6">
					    
					    <a href="http://www.webitall.dk/produkter/e-handel/">  
				      	<div class="icon">
						  	<span class="fa-stack fa-lg facebook">
							  <i class="fa fa-circle fa-stack-2x"></i>
							  <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
							</span>	
				      	</div>			      	
				      	<div class="title">E-handel</div>
					    </a>
					      
				      </div>
				      
			      </div>
		      
		      </div>
		      
	      </div>
	      
	      <?php if ($this->countModules('news or feed')): ?>
	      <div id="feeds">
		      
		      <div class="container">
		      
			      <div class="row">
			      
				      <div class="col-md-6">
				      
				      	<div class="news">
					      	
					      	<jdoc:include type="modules" name="news" />
				      
				      	</div>
				      	
				      </div>
				      
				      <div class="col-md-6">
				      
				      	<div class="feed">
				      	
				      		<jdoc:include type="modules" name="feed" />
				      	
				      	</div>
				      
				      </div>
				      
			      </div>
		      
		      </div>
		      
	      </div>
	      <?php endif; ?>
	      
		  
		  <div id="social">
			  
			  <div class="container">
				  
				  <div class="row">
				  
					  <div class="col-md-12"><h3>Find os online</h3></div>
				  
				  </div>
				  
				  <div class="row">
					  
					  <div class="col-md-2 col-md-offset-3 col-sm-4 col-xs-4">
					  	<a href="https://www.facebook.com/webitall" target="_blank">
					  	<span class="fa-stack fa-lg facebook">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
						</span>
					  	</a>
					  </div>
					  <div class="col-md-2 col-sm-4 col-xs-4">
					  	<a href="https://plus.google.com/u/0/+WebitallDk/" target="_blank">
					  	<span class="fa-stack fa-lg google-plus">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
						</span>
					  	</a>
					  </div>
					  <div class="col-md-2 col-sm-4 col-xs-4">
					  <a href="http://www.linkedin.com/company/webitall-aps" target="_blank">
					  	<span class="fa-stack fa-lg linkedin">
						  <i class="fa fa-circle fa-stack-2x"></i>
						  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
						</span>
					  </a>
					  </div>
					  
				  </div>
				  
			  </div>
			  
		  </div>
		      
	      </div>
	      
	      <?php endif; ?>
	      
    </div>

    <div id="footer">
	    
	    <div class="information">
	    
	    	<div class="container">
		    	
		    	<div class="col-md-6 col-sm-12 col-xs-12">Webitall ApS · Lindevej 8 · 6710 Esbjerg V · 70 26 62 63 · <a href="mailto:home@webitall.dk">home@webitall.dk</a></div>
		    	<div class="col-md-6 col-sm-12 col-xs-12">
			    	
			    	<jdoc:include type="modules" name="footermenu" />
			    	
		    	</div>
		    	
	    	</div>
    	
    	</div>
    		    
    </div>
    
</body>
</html>