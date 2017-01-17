=== Hide My Wordpress ===
Contributors: johndarrel
Tags: hide my wp,hide wp-admin,hide my site,security,wordpress security,tips,apps,wordpress apps,plugin,wordpress plugin,url,admin,login,path,paths,seo
Requires at least: 3.5
Tested up to: 4.7
Stable tag: trunk
Donate link: http://wpplugins.tips/wordpress

Hide My WP it's a security plugin. You can change and hide Wordpress Admin and Login URLs to increases your Wp security against hackers.

== Description ==

Protect your Wordpress site by hiding the fact that you are using Wordpress for your site.

> <strong>Features Included:</strong>
>
> *   Hide Wordpress wp-admin URL and redirect it to 404 page
> *   Hide Wordpress wp-login.php and redirect it to 404 page
> *   Change the wp-admin and wp-login URLs
>
> <strong>Protection against: </strong>
>
> * Brute Force Attacks,
> * SQL Injection Attacks
> * Cross Site Scripting (XSS)

The FREE version does not work for Multisites, Nginx and IIS. Only the Premium version does.

[youtube https://www.youtube.com/watch?v=S-qewJV-oV0]

The admin URL is the most common path that hackers use to break your WordPress site.

If you don't protect yourself, you will end up having a hacked site sooner or later.

This is a free version of the plugin so you can use it for all your blogs without any restrictions.

Note: The plugin requires custom permalinks. Make sure you have it activated at Settings > Permalinks


<strong>Premium features:</strong>

*   Hide WordPress wp-admin URL
*   Hide WordPress wp-login.php
*   Custom admin and login URL
*   Custom wp-includes path
*   Custom wp-content path
*   Random plugins name
*   Random themes name
*   Custom plugins path
*   Custom uploads path
*   Custom authors path
*   Custom comment URL
*   Custom category path
*   Custom tags path
*
*   Hide _wpnonce key in forms
*   Hide wp-image and wp-post classes
*   Hide Emojicons if you don't use them
*   Disable Rest API access
*   Disable Embed scripts
*   Disable WLW Manifest scripts
*
*   Support for Wordpress Multisites
*   Support for Nginx
*   Support for IIS
*   Support for LiteSpeed
*   Support for Apache


> Check out the Premium features: http://wpplugins.tips/wordpress


How to Install and Setup the Hide My WP PRO version
[youtube https://www.youtube.com/watch?v=WEGTGC1iNb0]

== Installation ==
1. Log In as an Admin on your Wordpress blog.
2. In the menu displayed on the left, there is a "Plugins" tab. Click it.
3. Now click "Add New".
4. There, you have the buttons: "Search | Upload | Featured | Popular | Newest". Click "Upload".
5. Upload the hide-my-wp.zip file.
6. After the upload it's finished, click Activate Plugin.

== Screenshots ==
1. Choose the desired level of WordPress security for your site
2. Change the URLs wp-admin and wp-login.php to different URLs
3. Choose to hide the wp-admin and wp-login.php to increase the Wordpress security and hackers will get 404 errors
4. Login to your site with the new login URL
5. You'll be redirect to the new admin URL

== Changelog ==
= 1.1.012 =
* Compatible with WP 4.7
* Fixed memory load alert
* Fixed small bugs

= 1.1.011 =
* Fixed https ajax in http frontend
* Settings are not lost after plugin or theme activation

= 1.1.010 =
* Fixed redirect if the 404 page doesn't exists

= 1.1.009 =
* Changed the Lite options
* Fixed small bugs
* Compatible with the last version of Wordpress
* Compatible with Wordpress 4.6.1

= 1.1.007 =
* Remove all data on plugin deactivate
* Update saved data on user logout
* Don't change the settings unless the user logs out from admin

= 1.1.006 =
* Send URLs and safe parameter by email on important changes
* Fixed small bugs

= 1.1.005 =
* Fixed save_mod_rewrite_rules issue
* Compatible with Wordpress 4.6
* Fixed small bugs for plugin css

= 1.1.003 =
* Fixed issues with Nginx, IIS, and Litespeed servers
* Prevent hiding the wp-admin and wp-login in Lite Mode
* Improved login with the safe parameter


= 1.1.002 =
* Hide the /wp-login path

= 1.1.001 =
* Compatible with Wordpress 4.5
* Main Wordpress security features

== Frequently Asked Questions ==
= Is this plugin working on WP Multisite? =

Yes, this feature is only available on the Hide My WordPress PRO version.
Please visit: http://wpplugins.tips/wordpress

= I forgot the custom login and admin URLs. What now? =

Don't panic. You can still access your site with the secure parameter
http://domainname/wp-login.php?hmw_disable=[your_code]

= Locked out of my site!  I set the plugin, and when I left I can't manage to get in =

If you don't remember the safe parameter from the plugin, and you have Cpanel access, go to root and find wp_config.php,
edit it and remove the line with
define( 'ADMIN_COOKIE_PATH' ....

Rename the plugin directory /wp-content/plugins/hide_my_wp so that the plugins wouldn't hide the wp-admin path
Save it and it should be back from where you left it.
Make sure you remember the secure parameter, and it will be much simpler.

= Is this plugin working if I don't have custom permalinks on my site? =

No. You need to have custom permalinks set on in Settings > Permalinks.
You will get a notification if something is not setup right.


= What to do before I deactivate the plugin? =

It's better to switch to Default mode in Settings > Hide my wp.
If you don't, the plugin will automatically change your site back to the safe URLs, and it will tell you what to do in case you don't have write permission for the config files

_______________________________________________________________________

= Is this Plugin free of charge? =

Yes. The Lite features will always be free
To unlock more features, please visit: http://wpplugins.tips/wordpress

