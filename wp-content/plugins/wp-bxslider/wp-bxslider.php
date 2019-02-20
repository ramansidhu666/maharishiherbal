<?php
/*  
Plugin Name: wp-bxslider
Plugin URI: http://www.andrewfriedl.com
Description: Create stunning jQuery sliders, tickers and faders with this easy to use plugin.
Version: 1.0.1
Author: Andrew Friedl
Author URI: http://www.AndrewFriedl.com
License: GPL2
*/

/*
** [wpbxslider]
** [wpbxslider 
**	id 
**	mode
**	controls
**	speed 
** 	easing 
**	pager 
**	pagertype 
**	pagershortsep 
**	pagerlocation 
**	pagerselector
**	nexttext 
**	nextimage 
**	prevtext 
**	previmage 
**	pause 
**	auto 
**	autodelay
**	autodirection 
**	autohover 
**	autostart 
**	autocontrols 
**	autocontrolsselector 
**	ticker 
**	tickercontrols 
**	tickerhover 
**	starttext 
**	stoptext 
**	wrapperclass
**	]
*/
class CWPBXSlider {
	var $scripts = array();
	var $prefix = 'wpbxs_';

	// method to handle the shortcode
	function do_shortcode($attr, $c=NULL) {
		extract(shortcode_atts(array('id' => 'myslider',
			'mode'       => 'horizontal',	// horizontal {vertical, fade}
			'controls'   => 'true',			// true {false}
			'speed'      => '500',			// numeric milliseconds
			'easing'     => 'swing',		// jQuery easing values
			'pager'      => 'true',			// true {false}
			'pagertype'  => 'full',			// full {short}
			'pagershortsep' => ' / ',		// if the pager is short
			'pagerlocation'  => 'bottom',	// bottom {top}
			'pagerselector'  => 'true',
			'pageractiveclass' => 'pager-active',
			'nexttext'   => '',
			'nextimage'  => '',
			'nextselector'  => '',
			'prevtext'   => '',
			'previmage'  => '',
			'prevselector'  => '',
			'pause'      => '3500',
			'infiniteloop'=> 'true',
			'hidecontrolonend'=> 'false',
			'auto'       => 'true',
			'autodelay'       => '0',
			'autodirection'   => 'next',
			'autohover'       => 'true',
			'autocontrols'    => 'false',
			'autostart'    => 'false',
			'autocontrolsselector' => '',
			'ticker'          => 'false',
			'tickerdirection' => 'next',
			'tickercontrols'  => 'true',
			'tickerhover'     => 'false',
			'tickerspeed'     => '1000',
			'stoptext'        => 'Stop',
			'starttext'       => 'Start',
			'startingslide'   => '0',
			'displayslideqty' => '1',
			'moveslideqty'    => '1',
			'randomstart'     => 'false',
			'lastselector'    => '',
			'firstselector'   => '',
			'wrapperclass'    => 'bx-wrapper' ), $attr)
			);
			
		// create the jquery script that is required to execute this script
		$o = "jQuery('#".$id."')";
		$o .= '.bxSlider({';
		$o .= "mode:'".$mode."',";
		if (strcmp($ticker,'true')==0) {
			$o .=  "ticker:true,";
			$o .=  "tickerSpeed:".$tickerspeed.",";
			$o .=  "tickerControls:".$tickercontrols.",";
			$o .=  "tickerDirection:'".$tickerdirection."',";
			$o .=  "tickerHover:".$tickerhover.",";
		}
		else {
			$o .= "speed:".$speed.",";
			$o .= "pause:".$pause.",";
			$o .= "pager:".$pager.",";
			if (strcmp($pager,'true')==0) {
				$o .= "pagerType:'".$pagertype."',";
				$o .= "pagerShortSeperator:'".$pagershortsep."',";
				$o .= "pagerLocation:'".$pagerlocation."',";
				$o .= "pagerActiveClass:'".$pageractiveclass."',";
				$o .= "pagerSelector:'".$pagerselector."',";
			}
			$o .= "controls:" . strtolower($controls) . ",";
			if ( strcmp($controls,'true') == 0 ) {
				$o .= "stopText:'" . $stoptext . "',";
				$o .= "startText:'" . $starttext . "',";
				if (strlen($nexttext)>0 && strcasecmp($nexttext,'null')!=0)
					$o .= "nextText:'" . $nexttext . "',";
				if (strlen($nextimage)>0 && strcasecmp($nextimage,'null')!=0)
					$o .= "nextImage:'" . $nextimage . "',";
				if (strlen($prevtext)>0 && strcasecmp($prevtext,'null')!=0)
					$o .= "prevText:'" . $prevtext . "',";
				if (strlen($previmage)>0 && strcasecmp($previmage,'null')!=0)
					$o .= "prevImage:'" . $previmage . "',";
				if (strlen($autocontrolsselector)>0 && strcasecmp($autocontrolsselector,'null')!=0)
					$o .= "autoControlsSelector:'".$autocontrolsselector."',";
			}
			if (strlen($prevselector)>0 && strcasecmp($prevselector,'null')!=0)
				$o .= "prevSelector:'".$prevselector."',";
			if (strlen($nextselector)>0 && strcasecmp($nextselector,'null')!=0)
				$o .= "nextSelector:'".$nextselector."',";
			if (strlen($easing)>0)
				$o .= "easing:'".$easing."',";
			$o .=  "infiniteLoop:" . $infiniteloop . ",";
			$o .=  "hideControlOnEnd:" . $hidecontrolonend . ",";
			$o .=  "auto:" . $auto . ",";
			$o .=  "autoDelay:" . $autodelay . ",";
			$o .=  "autoDirection:'" . $autodirection . "',";
			$o .=  "autoHover:" . $autohover . ",";
			$o .=  "autoControls:" . $autocontrols . ",";
			$o .=  "wrapperClass:'".$wrapperclass."',";
			$o .=  "startingSlide:".$startingslide.",";
			$o .=  "displaySlideQty:".$displayslideqty.",";
			$o .=  "moveSlideQty:".$moveslideqty.",";
			$o .=  "randomStart:".$randomstart."";
		}
		$o .=  '});';
		
		$fnp = null;
		$fnn = null;
		
		if (strlen($prevselector)>0 && strcasecmp($prevselector,'null')!=0)
			$fnp = "jQuery('".$prevselector."').click(function(){".$prefix.$id.'.goToPreviousSlide();return false;});';
		if (strlen($nextselector)>0 && strcasecmp($nextselector,'null')!=0)
			$fnn = "jQuery('".$nextselector."').click(function(){".$prefix.$id.'.goToNextSlide();return false;});';
		
		// push this script onto the scripts stack
		array_push($this->scripts,array($prefix.$id,$o,$fnp,$fnn));
		
		// return some indication we've processed a script
		return '<!-- wp-bxslider('.count($this->scripts).') -->';
	}
	
	// method to insure that bxSlider css is queued into the header
	function do_print_styles() {
		wp_enqueue_style('wpbxslider',get_bloginfo('wpurl').'/wp-content/plugins/wp-bxslider/bxslider/bx_styles/bx_styles.css');
	}
	
	// method to insure that jQuery and bxSlider javascript are queued into the header
	function do_print_scripts() {
		wp_enqueue_script('jquery.easing.1.3',get_bloginfo('wpurl').'/wp-content/plugins/wp-bxslider/bxslider/jquery.easing.1.3.js',array('jquery'));		
		wp_enqueue_script('jquery.bxslider',get_bloginfo('wpurl').'/wp-content/plugins/wp-bxslider/bxslider/jquery.bxSlider.min.js',array('jquery','jquery.easing.1.3'));
	}
	
	// function to be called when the footer wordpress footer is being printed
	function do_footer() {
		if ( is_array($this->scripts) ) {
			echo '<script language="javascript">'."\r\n";
			echo '  jQuery(document).ready(function(){'."\r\n";
			foreach($this->scripts as $idx => $arr) {
				echo '    var '.$arr[0]." = ".$arr[1]."\r\n";
				if ( !is_null($arr[2]) )
					echo '     '.$arr[2]."\r\n";
				if ( !is_null($arr[3]) )
					echo '     '.$arr[3]."\r\n";
			}
			echo '  });'."\r\n".'</script>';
		}
		// dispose of the stored scripts
		$this->scripts = NULL;
	}
	function install() {
		// add event hooks into wordpress
		add_shortcode('wpbxslider',array($this,'do_shortcode'));
		add_action('wp_footer',array($this,'do_footer'));
		add_action('wp_print_styles',array($this,'do_print_styles'));
		add_action('wp_print_scripts',array($this,'do_print_scripts'));
	}
}

// create instance of the plugin and hook into worpress
$WPBXSlider = new CWPBXSlider();
$WPBXSlider->install();
?>