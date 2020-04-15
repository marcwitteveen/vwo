# vwo
This class provides some simple PHP helper function for implementing Visual Website Optimizer within your website.

## Getting Started
You can install this package using Composer by adding this line to your composer.json ```require``` statement.
```json
"marcwitteveen/vwo": "dev-master"
```

And then run from terminal:
```Bash
sudo composer update
```

## Code Sample
```php
use MarcWitteveen\Vwo\Vwo;

Vwo::asynchronous("xxxxxx", true, $2000, 2500, false);

/* This will render the following code:
<!-- Start VWO Async Smartcode -->
<script type='text/javascript'>
window._vwo_code = window._vwo_code || (function(){
var account_id=xxxxxx,
settings_tolerance=2000,
library_tolerance=2500,
use_existing_jquery=false,
is_spa=1,
hide_element='body',

f=false,d=document,code={use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){
window.settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);var a=d.createElement('style'),b=hide_element?hide_element+'{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}':'',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);this.load('https://dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&f='+(+is_spa)+'&r='+Math.random());return settings_timer; }};window._vwo_settings_timer = code.init(); return code; }());
</script>
<!-- End VWO Async Smartcode -->
*/
```

## Methods:

- ```Vwo::asynchronous($account_id = "", $enabled = false, $settingsTolerance = 2000, $libraryTolerance = 2500, $useExistingJquery = false)```
## ```asynchronous``` Method

#### Description
Renders a asynchronous javascript code snippet, the call needs to be placed as high as possible before the </head> tag.

- ```Vwo::synchronous($accountId = "", $enabled = false)```
## ```synchronous``` Method

#### Description
Renders a synchronous javascript code snippet, the call needs to be placed as high as possible before the </head> tag.