<?php 

/**
 * This file is part of the Vwo package.
 * 
 * (c) Marc Witteveen <marc.witteveen@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MarcWitteveen\Vwo;

/**
 * A simple php wrapper for Visual Website Optimizer.
 */
class Vwo {

	/**
	 * Render the JavaScript tag for the Ssynchronous code snippet of Visual Website Optimizer
	 * @param string $accountId The VWO account ID, available on the settings page
	 * @param boolean $enabled If set to true then output the chat widget
	 * @param integer $settingsTolerance Settings tolerance
	 * @param integer $libraryTolerance Library tolerance
	 * @param boolean $useExistingJquery If set to true then jQuery included in the page will be used
	 * @return string The generated HTML code
	 */
	public static function asynchronous($account_id = "", $enabled = false, $settingsTolerance = 2000, $libraryTolerance = 2500, $useExistingJquery = false)
	{
		$output = "<!-- Start VWO Async Smartcode -->\r\n";
		$output .= "<script type='text/javascript'>\r\n";
		$output .= "window._vwo_code = window._vwo_code || (function(){\r\n";
		$output .= sprintf("var account_id=%d,\r\n", $account_id);
		$output .= sprintf("settings_tolerance=%d,\r\n", $settingsTolerance);
		$output .= sprintf("library_tolerance=2500,\r\n", $libraryTolerance);
		$output .= sprintf("use_existing_jquery=%s,\r\n", ($useExistingJquery)?"true":"false");
		$output .= "is_spa=1,\r\n";
		$output .= "hide_element='body',\r\n";
		$output .= "\r\n\r\n";
		$output .= "/* DO NOT EDIT BELOW THIS LINE */\r\n";
		$output .= "f=false,d=document,code={use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){
		window.settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);var a=d.createElement('style'),b=hide_element?hide_element+'{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}':'',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);this.load('https://dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&f='+(+is_spa)+'&r='+Math.random());return settings_timer; }};window._vwo_settings_timer = code.init(); return code; }());\r\n";
		$output .= "</script>\r\n";
		$output .= "<!-- End VWO Async Smartcode -->\r\n";

		if (!empty($accountId) && $enabled) {
			echo $output;
		}
	}

	/**
	 * Render the JavaScript tag for the Synchronous code snippet of Visual Website Optimizer
	 * @param string $accountId The VWO account ID, available on the settings page
	 * @param boolean $enabled If set to true then output the chat widget
	 * @return string The generated HTML code
	 */
	public static function synchronous($accountId = "", $enabled = false) 
	{
		$output = "<!-- Start VWO Smartcode -->\r\n";
		$outpuy .= sprintf("<script src='https://dev.visualwebsiteoptimizer.com/lib/%s.js'></script>\r\n", $accountId);
		$output .= "<!-- End VWO Smartcode -->\r\n";

		if (!empty($accountId) && $enabled) {
			echo $output;
		}
	}
}