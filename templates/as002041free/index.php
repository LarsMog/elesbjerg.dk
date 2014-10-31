<?php

/*******************************************************************************************/
/*
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/*******************************************************************************************/

defined('_JEXEC') or die;
include ('includes/includes.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
  
	<?php
		$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css'); 
		$doc->addStyleSheet('templates/'.$this->template.'/css/style.general.css'); 	
		$doc->addStyleSheet('templates/'.$this->template.'/css/tmpl.default.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/tmpl.modules.css');	
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.1024.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.980.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.768.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.480.css');
		$doc->addStyleSheet('templates/'.$this->template.'/css/media.320.css');				
    ?>
    
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
    <jdoc:include type="head" />

	<?php
		$menu = $app->getMenu();
		$menu_active = $menu->getActive();
		
		$menu_id = 0;
		if (JRequest::getVar('view') != 'form')
		{
			$menu_id = $menu_active->id;
		}

		include 'params.php';	
		
		echo $bodyfont_arr['fontlink'];
		if($hfont_arr['fontlink'] != $bodyfont_arr['fontlink'])
		{
			echo $hfont_arr['fontlink'];
		}
		if(($logo_font_arr['fontlink'] != $hfont_arr['fontlink']) && 
		   ($logo_font_arr['fontlink'] != $bodyfont_arr['fontlink']))
		{
			echo $logo_font_arr['fontlink'];
		}
		if(($slogan_font_arr['fontlink'] != $logo_font_arr['fontlink']) && 
		   ($slogan_font_arr['fontlink'] != $hfont_arr['fontlink']) && 
		   ($slogan_font_arr['fontlink'] != $bodyfont_arr['fontlink']))
		{
			echo $slogan_font_arr['fontlink'];
		}
		
		$doc->addStyleSheet('templates/'.$this->template.'/css/'.$tmpl_style);		
		include 'styles.php';
    ?>

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ext.asmenu.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.custom.css" type="text/css" />
  
</head>

<body class="<?php echo $option . " view-" . $view . " task-" . $task . " itemid-" . $itemid . " body-" . $pageClass;?>">
    <div class="wrapper">

		<!-- HEADER ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->    
	    <div id="header-top-wrapper">
            <div id="top_header">        
                <?php if ($this->countModules('as-position-3')): ?>
                <div id="header-top-row">
                    <div class="container">
                        <div id="top" class="row">
                            <jdoc:include type="modules" name="as-position-3" style="themeHtml5" />
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
             
               
            <div id="header-row">
                <div class="container">
                    <div class="row">
                        <header>
                        	<div id="logo-container">
                                <div id="logo" class="span<?php echo $this->params->get('logo_size'); ?>">
                                    <?php if($logo_type): ?>
                                    <a href="<?php echo $this->baseurl; ?>">
                                        <img src="<?php echo $logo_img;?>" alt="<?php echo $sitename; ?>" />
                                    </a>
                                    <span class="slogan">
                                        <?php // echo $slogan_txt; ?>
                                    </span>
                                    <?php else: ?> 
                                    <div class="logo">
                                        <a href="<?php echo $this->baseurl ?>"><?php echo $logo_txt; ?></a>
                                        <span class="slogan">
                                            <?php echo $slogan_txt; ?>
                                        </span>
                                    </div>
                                    <?php endif; ?>                            
                                </div>
                                <div id="top-icon-menu">
                                    <jdoc:include type="modules" name="as-position-4" style="themeHtml5" />
                                </div>
                            </div>
                            <jdoc:include type="modules" name="as-position-1" style="themeHtml5" />
                        </header>
                        
                    </div>
                </div>
            </div>
        
            <?php if ($this->countModules('as-position-5')): ?>
            <div id="slider-row">
                <div class="container">
                    <div class="row">
                        <jdoc:include type="modules" name="as-position-5" style="themeHtml5" />
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ($this->countModules('as-position-8')): ?>
            <div id="search-row">
                <div class="container">
                    <div class="row">
                    	<div id="search-container">
                        	<jdoc:include type="modules" name="as-position-8" style="themeHtml5" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
		</div>
		
		<div id="custom-content-wrapper">
                            
        <?php if ($this->countModules('as-position-6')): ?>
        <div id="featured-row">
            <div class="container">
                <div class="row">
                    <jdoc:include type="modules" name="as-position-6" style="themeHtml5" />
                </div>
            </div>
        </div>
        <?php endif; ?>
    
    	<?php if ($this->countModules('as-position-2')): ?>
        <div id="breadcrumbs-row">
            <div class="container">
                <div class="row">
                    <jdoc:include type="modules" name="as-position-2" style="themeHtml5" />
                </div>
            </div>
        </div>
        <?php endif; ?>
    
        <?php if ($this->countModules('as-position-7')): ?>
        <div id="header-bottom-row">
            <div class="container">
                <div class="row">
                    <jdoc:include type="modules" name="as-position-7" style="themeHtml5" />
                </div>
            </div>
        </div>
        <?php endif; ?>
		<!-- END OF HEADER ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->        
    
	    <!-- CONTENT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div id="content-row">
            <div class="container">
                <div class="content-inner row">
                
                    <!-- COLUMN LEFT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <?php if(($this->countModules('as-position-10') || $this->countModules('as-position-11')) && 
									($hideByOption) == false && $view !== 'form' && $layout !== 'edit'): ?>
                    <div id="aside-left" class="span<?php echo $aside_left_width; ?>">
                        <aside>
                        	<?php if($this->countModules('as-position-10')): ?>
                        	<div id="aside-row-1-left">
                            	<jdoc:include type="modules" name="as-position-10" style="html5nosize" />
                            </div>
                            <?php endif; ?>
                            <?php if($this->countModules('as-position-11')): ?>
                        	<div id="aside-row-2-left">
                            	<jdoc:include type="modules" name="as-position-11" style="html5nosize" />
                            </div>
                            <?php endif; ?>
                        </aside>
                    </div>
                    <?php endif; ?>
                    <!-- END OF COlUMN LEFT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            
                    <!-- COLUMN MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->                
                    <div id="component" class="span<?php echo $mainContentWidth; ?>">
                
                        <?php if ($this->countModules('as-position-20')): ?>
                        <div id="content-row-1" class="row">
                            <div class="content-row-1">
                                <jdoc:include type="modules" name="as-position-20" style="themeHtml5" />
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->countModules('as-position-21')): ?>
                        <div id="content-row-2" class="row">
                            <div class="content-row-2">
                                <jdoc:include type="modules" name="as-position-21" style="themeHtml5" />
                            </div>
                        </div>
                        <?php endif; ?>
                    
                        <jdoc:include type="message" />
                        <jdoc:include type="component" />
                    
                        <?php if ($this->countModules('as-position-22')): ?>
                        <div id="content-row-3" class="row">
                            <div class="content-row-3">
                                <jdoc:include type="modules" name="as-position-22" style="themeHtml5" />
                            </div>
                        </div>
                        <?php endif; ?>
                        
                    </div>
        			<!-- END OF COLUMN MAIN ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    
			        <!-- COLUMN RIGHT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->                    
                    <?php if (($this->countModules('as-position-15') || $this->countModules('as-position-16')) 
								&& ($hideByOption) == false && $view !== 'form' && $layout !== 'edit'): ?>
                    <div id="aside-right" class="span<?php echo $aside_right_width; ?>">
                        <aside>
                        	<?php if($this->countModules('as-position-15')): ?>
                        	<div id="aside-row-1-right">
                            	<jdoc:include type="modules" name="as-position-15" style="html5nosize" />
                            </div>
                            <?php endif; ?>
                            <?php if($this->countModules('as-position-16')): ?>
                        	<div id="aside-row-2-right">
                            	<jdoc:include type="modules" name="as-position-16" style="html5nosize" />
                            </div>
                            <?php endif; ?>
                        </aside>
                    </div>
                    <?php endif; ?>
                    <!-- END OF COLUMN RIGHT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                </div>
            </div>
        </div>
                
        <?php if ($this->countModules('as-position-23')): ?>
        <div id="content-row-4">
            <div class="container">
                <div class="row">
                    <jdoc:include type="modules" name="as-position-23" style="themeHtml5" />
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if ($this->countModules('as-position-24')): ?>
        <div id="content-row-5">
            <div class="container">
                <div class="row">
                    <jdoc:include type="modules" name="as-position-24" style="themeHtml5" />
                </div>
            </div>
        </div>
        <?php endif; ?>
        
    

        <!-- FOOTER ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div id="footer">
            <div id="copyright-row">
                <div class="container">
                    <div id="trademark">
                        <?php if ($footer_logo_img): ?>
                        <a href="<?php echo $this->baseurl; ?>">
                            <img src="<?php echo $footer_logo_img;?>" alt="<?php echo $sitename; ?>" />
                        </a>
                        <?php else: ?>
                        Copyright &copy; <?php echo date('Y'); ?>: <?php echo $app->getCfg('sitename'); ?>
                        <?php endif; ?>
                    </div>
                    <div id="copyright-menu" class="row">
                        <!-- DO NOT REMOVE OR CHANGE THE CONTENT BELOW, THIS THEME MAY NOT WORK PROPERLY -->
                        
                            <div id="ascopy">
                            <a href="http://www.astemplates.com/" target="_blank">
                                DESIGNED BY:&nbsp;&nbsp;AS DESIGNING
                            </a>
                            </div>
                        
                        <!-- DO NOT REMOVE OR CHANGE THE CONTENT ABOVE, THIS THEME MAY NOT WORK PROPERLY -->
                    </div>                
                </div>
            </div>        
        </div>
    
    </div>
	<!-- END OF FOOTER ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->    
    
    <?php if($this->params->get('feature_totop')): ?>
    <div id="back-top">
    	<a href="#"><span></span><?php echo $this->params->get('feature_totop_text') ?></a>
    </div>
    <?php endif; ?>
    
    <?php if ($this->countModules('modal')): ?>
    <jdoc:include type="modules" name="modal" style="modal" />
    <?php endif; ?>
    
    <?php if ($this->countModules('debug')): ?>
    <jdoc:include type="modules" name="debug" style="none"/>
    <?php endif; ?>
        
    <?php
    $doc->addScript($this->baseurl."/media/jui/js/jquery.min.js");
    $doc->addScript($this->baseurl."/media/jui/js/bootstrap.js");
    
    $noConflict = "jQuery.noConflict()";
    $doc->addScriptDeclaration($noConflict);
    
    $doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/jquery.isotope.min.js');
    $doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/touch.gallery.js');
    $doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/scripts.js');
    ?>

</body>
</html>
