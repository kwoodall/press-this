<?php
/**
 * Press This
 *
 * Plugin Name: Press This Restored
 * Plugin URI:  https://woodalldesign.net
 * Description: A little tool that lets you grab bits of the web and create new posts with ease via a bookmarklet
 * Version:     1.1.0
 * Author:      WordPress Contributors, Woodall Design, LLC
 * Author URI:  https://woodalldesign.net
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: press-this
 * Domain Path: /languages
 */
 /*
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

add_action( 'wp_ajax_press-this-plugin-save-post', 'wp_ajax_press_this_plugin_save_post');
add_action( 'wp_ajax_press-this-plugin-add-category', 'wp_ajax_press_this_plugin_add_category' );
add_action( 'tool_box', 'press_this_tool_box' );

 /**
 * Ajax handler for saving a post from Press This.
 *
 * @since 1.0.0
 */
function wp_ajax_press_this_plugin_save_post() {
	include( plugin_dir_path( __FILE__ ) . 'class-wp-press-this-plugin.php' );
	$wp_press_this = new WP_Press_This_Plugin();
	$wp_press_this->save_post();
}

/**
 * Ajax handler for creating new category from Press This.
 *
 * @since 1.0.0
 */
function wp_ajax_press_this_plugin_add_category() {
	include( plugin_dir_path( __FILE__ ) . 'class-wp-press-this-plugin.php' );
	$wp_press_this = new WP_Press_This_Plugin();
	$wp_press_this->add_category();
}
 	function get_domain()
{
	$str = site_url(); 
$str = preg_replace('#^https?://#', '', rtrim($str,'/'));
return $str;


}


function press_this_tool_box() {
	$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
	if ( current_user_can('edit_posts') ) { ?>
	<script>
  jQuery(document).ready(function($){
  $('.pressthis-js-toggle').click(function(){
    $(this).parent().toggleClass("jtnone");
});
});
   </script> 
   <style>
   .jtnone + div#pressthis-code-wrap {
    display: block !important;
}
   
   
   div#pressthis-code-wrap {
    display: none;
}
   </style>
		<div class="card pressthis">
			<h2><?php _e('Press This', 'press-this') ?></h2>
			<p><?php _e( 'Press This is a little tool that lets you grab bits of the web and create new posts with ease.', 'press-this' ); ?>
				<?php _e( 'It will even allow you to choose from images or videos included on the page and use them in your post.', 'press-this' ); ?>
				<?php _e( 'Use Press This as a quick and lightweight way to highlight another page on the web.', 'press-this' ); ?></p>
<p class="pressthis-bookmarklet-wrapper">
			<a class="pressthis-bookmarklet" onclick="return false;" href='javascript:(function(a,b,c,d){function e(a,c){if("undefined"!=typeof c){var d=b.createElement("input");d.name=a,d.value=c,d.type="hidden",p.appendChild(d)}}var f,g,h,i,j,k,l,m,n,o=a.encodeURIComponent,p=b.createElement("form"),q=b.getElementsByTagName("head")[0],r="_press_this_app",s=!0;if(d){if(!c.match(/^https?:/))return void(top.location.href=d);if(d+="&amp;u="+o(c),c.match(/^https:/)&amp;&amp;d.match(/^http:/)&amp;&amp;(s=!1),a.getSelection?h=a.getSelection()+"":b.getSelection?h=b.getSelection()+"":b.selection&amp;&amp;(h=b.selection.createRange().text||""),d+="&amp;buster="+(new Date).getTime(),s||(b.title&amp;&amp;(d+="&amp;t="+o(b.title.substr(0,256))),h&amp;&amp;(d+="&amp;s="+o(h.substr(0,512)))),f=a.outerWidth||b.documentElement.clientWidth||600,g=a.outerHeight||b.documentElement.clientHeight||700,f=f<800||f>5e3?600:.7*f,g=g<800||g>3e3?700:.9*g,!s)return void a.open(d,r,"location,resizable,scrollbars,width="+f+",height="+g);i=q.getElementsByTagName("meta")||[];for(var t=0;t<i.length&amp;&amp;!(t>200);t++){var u=i[t],v=u.getAttribute("name"),w=u.getAttribute("property"),x=u.getAttribute("content");x&amp;&amp;(v?e("_meta["+v+"]",x):w&amp;&amp;e("_meta["+w+"]",x))}j=q.getElementsByTagName("link")||[];for(var y=0;y<j.length&amp;&amp;!(y>=50);y++){var z=j[y],A=z.getAttribute("rel");"canonical"!==A&amp;&amp;"icon"!==A&amp;&amp;"shortlink"!==A||e("_links["+A+"]",z.getAttribute("href"))}b.body.getElementsByClassName&amp;&amp;(k=b.body.getElementsByClassName("hfeed")[0]),k=b.getElementById("content")||k||b.body,l=k.getElementsByTagName("img")||[];for(var B=0;B<l.length&amp;&amp;!(B>=100);B++)n=l[B],n.src.indexOf("avatar")>-1||n.className.indexOf("avatar")>-1||n.width&amp;&amp;n.width<256||n.height&amp;&amp;n.height<128||e("_images[]",n.src);m=b.body.getElementsByTagName("iframe")||[];for(var C=0;C<m.length&amp;&amp;!(C>=50);C++)e("_embeds[]",m[C].src);b.title&amp;&amp;e("t",b.title),h&amp;&amp;e("s",h),p.setAttribute("method","POST"),p.setAttribute("action",d),p.setAttribute("target",r),p.setAttribute("style","display: none;"),a.open("about:blank",r,"location,resizable,scrollbars,width="+f+",height="+g),b.body.appendChild(p),p.submit()}})(window,document,top.location.href,"<?php echo $protocol;?>\/\/<?php echo get_domain(site_url());?>\/wp-admin\/press-this.php?v=8");'><span>Press This</span></a>
			<button type="button" class="button pressthis-js-toggle js-show-pressthis-code-wrap" aria-expanded="true" aria-controls="pressthis-code-wrap">
				<span class="dashicons dashicons-clipboard"></span>
				<span class="screen-reader-text">Copy “Press This” bookmarklet code</span>
			</button>
		</p>
      <div class="hidden js-pressthis-code-wrap clear" id="pressthis-code-wrap"">
			<p id="pressthis-code-desc">
				If you can’t drag the bookmarklet to your bookmarks, copy the following code and create a new bookmark. Paste the code into the new bookmark’s URL field.			</p>
				
			<p>
				<textarea class="js-pressthis-code" rows="5" cols="120" readonly="readonly" aria-labelledby="pressthis-code-desc">javascript:(function(a,b,c,d){function e(a,c){if("undefined"!=typeof c){var d=b.createElement("input");d.name=a,d.value=c,d.type="hidden",p.appendChild(d)}}var f,g,h,i,j,k,l,m,n,o=a.encodeURIComponent,p=b.createElement("form"),q=b.getElementsByTagName("head")[0],r="_press_this_app",s=!0;if(d){if(!c.match(/^https?:/))return void(top.location.href=d);if(d+="&amp;u="+o(c),c.match(/^https:/)&amp;&amp;d.match(/^http:/)&amp;&amp;(s=!1),a.getSelection?h=a.getSelection()+"":b.getSelection?h=b.getSelection()+"":b.selection&amp;&amp;(h=b.selection.createRange().text||""),d+="&amp;buster="+(new Date).getTime(),s||(b.title&amp;&amp;(d+="&amp;t="+o(b.title.substr(0,256))),h&amp;&amp;(d+="&amp;s="+o(h.substr(0,512)))),f=a.outerWidth||b.documentElement.clientWidth||600,g=a.outerHeight||b.documentElement.clientHeight||700,f=f&lt;800||f&gt;5e3?600:.7*f,g=g&lt;800||g&gt;3e3?700:.9*g,!s)return void a.open(d,r,"location,resizable,scrollbars,width="+f+",height="+g);i=q.getElementsByTagName("meta")||[];for(var t=0;t&lt;i.length&amp;&amp;!(t&gt;200);t++){var u=i[t],v=u.getAttribute("name"),w=u.getAttribute("property"),x=u.getAttribute("content");x&amp;&amp;(v?e("_meta["+v+"]",x):w&amp;&amp;e("_meta["+w+"]",x))}j=q.getElementsByTagName("link")||[];for(var y=0;y&lt;j.length&amp;&amp;!(y&gt;=50);y++){var z=j[y],A=z.getAttribute("rel");"canonical"!==A&amp;&amp;"icon"!==A&amp;&amp;"shortlink"!==A||e("_links["+A+"]",z.getAttribute("href"))}b.body.getElementsByClassName&amp;&amp;(k=b.body.getElementsByClassName("hfeed")[0]),k=b.getElementById("content")||k||b.body,l=k.getElementsByTagName("img")||[];for(var B=0;B&lt;l.length&amp;&amp;!(B&gt;=100);B++)n=l[B],n.src.indexOf("avatar")&gt;-1||n.className.indexOf("avatar")&gt;-1||n.width&amp;&amp;n.width&lt;256||n.height&amp;&amp;n.height&lt;128||e("_images[]",n.src);m=b.body.getElementsByTagName("iframe")||[];for(var C=0;C&lt;m.length&amp;&amp;!(C&gt;=50);C++)e("_embeds[]",m[C].src);b.title&amp;&amp;e("t",b.title),h&amp;&amp;e("s",h),p.setAttribute("method","POST"),p.setAttribute("action",d),p.setAttribute("target",r),p.setAttribute("style","display: none;"),a.open("about:blank",r,"location,resizable,scrollbars,width="+f+",height="+g),b.body.appendChild(p),p.submit()}})(window,document,top.location.href,"<?php echo $protocol; ?>\/\/<?php echo get_domain(site_url());?>\/wp-admin\/press-this.php?v=8");</textarea>
			</p>
		</div>
			<p><a href="<?php echo htmlspecialchars( admin_url( 'press-this.php' ) ); ?>"><?php _e( 'Open Press This', 'press-this' ); ?></a>
				<?php 

//echo get_domain($jtsiteurl);
				
				_e( 'then add it to your device&#8217;s bookmarks or home screen.', 'press-this' ); ?></p>
		</div>
	<?php }
}
