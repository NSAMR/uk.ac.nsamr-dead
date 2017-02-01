# nsamr.ac.uk
This is the git repo for the main website of the National Student Association of Medical Research.

## Licence
Software written by NSAMR is released under the GNU General Public License version 3, as is its parent OJS3. The GNU GPLv3 license allows reuse and redistribution of software in whole or in part, but requires that anyone who distributes code or a derivative work must make the source available under the same terms. The text of the GNU GPLv3 license can be viewed here: https://www.gnu.org/licenses/gpl-3.0.en.html

The website is built using WordPress, which is released under the GNU GPL version 2 (or later) https://wordpress.org/about/gpl/ .

## Design
All images are either original to NSAMR, or are CC-BY licensed.

The "NSAMR" theme is a child theme of theme "Assan", which can be purchased commercially, and for which the PHP code is released under the GNU GPL version 2 (or later).

## Ongoing development
Pull requests to any of our software are welcomed and appreciated.

## Technologies
Backend:
* WordPress
* AMP stack

Functionality:
 * PHP / JS / jQuery  

Design:
  * CSS / Bootstrap: http://getbootstrap.com/
  * Sass / Compass http://sass-lang.com/ http://compass-style.org/
    * Code style guide: https://css-tricks.com/sass-style-guide/  
    * SMACSS Base Style Rules (https://smacss.com/)
  * FontAwesome

## Step by step notes for setting up the site on any machine
**Clone nsamr.ac.uk repo**

**Set up WordPress**  
If local:
* Set up AMP stack (MAMP: https://www.mamp.info/en/ or WAMP)
* Create local db
* Open localhost:$port in browser  
* Set up wordpress

If on remote machine:
* If there isn’t a database already, create a new one, or ask for one from service provider
* If there is, make sure you have the details (host, db name, username, password)
* Open root folder in browser
* Set up wordpress with db details from step above

**Get latest version of database**
* Grab the latest backup using script in github/backup_scripts (server password required for SSH)
* Restore to your local db so you’re working on the current release

**Set up to install plugins**
* Create empty directory wp-content/plugins (otherwise installing first plugin will fail)
* Install and activate plugin “WP Install Profiles”

**Plugins --> Bulk install plugins**
* Import plugin profiles from magic online thing (TODO: remember the name of this)  
  * Username: nsamr  
  * Install list “dev”  
  * Install list “plugins to use” (just underconstruction and wordfence for now)  

**Set up important initial plugins**  
underconstruction
* Activate: on
* HTTP 200
* Administrator  
WordFence

**Set up Assan theme** (parent of NSAMR theme, so must be installed first)
* Activate Assan theme
* Install and activate required plugins requested by Assan

**Import template data from Assan theme** (TODO: export our own template site)
* Tools --> Import --> Install WordPress
* Set user to “assan” (so can delete later…)
* Check box for Download and import file attachments

**Compile CSS for NSAMR theme**  
* Navigate to wp-content/themes/nsamr
* Set up compass: https://code.tutsplus.com/tutorials/a-wordpress-development-process-using-sass-and-compass--cms-21861  
<pre><code>compass config config.rb</code></pre>
*	Open config.rb  
  * Set css_dir to “/”  
  * Set sass_dir to “assets/sass”  
  * Set images_dir to “assets/images”  
  * Set javascripts_dir to “assets/js”  
  * (Leave http_path as it is)  
  * Uncomment line 12 (output_style), then recomment after “expanded”  
  * Uncomment line 18 (line_comments)  
* Run compass (compass watch)  
* --> wp-content/themes/nsamr/style.css should be created  

**Activate NSAMR theme in browser**

**Set up how we want**
* Set  logo  
	 * Logo-long-80-168.png  
* Set site icon  
  * logo-square-1000.png  
* Create main menu   
  * Remove Revolution pages -- broken (thanks Assan)  
* Create right header top widget  
* Social share (“Crazy Share Buttons”)  
* Set home to static page  
  * Settings → Reading  
* Set to Home Carousel possibly  

**PLAY!**

**Deactivate underconstruction when ready to launch**

**Revel in own brilliance**


## Misc
Don’t commit compiled files, e.g.
* style.css (wordpress theme file)
* config.rb (from compass)

## TODO
* Do more than password hash
* Salt the WordPress things
* Get SSL cert (?https://letsencrypt.org/getting-started/)

