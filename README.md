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

**Install WordPress**  
If on our server:
* Use Softaculous installer
* Set the database details to something sensible and write them down

If local:
* Set up AMP stack (MAMP: https://www.mamp.info/en/ or WAMP)
* Create local db
* Open localhost:$port in browser  
* Set up wordpress
* Grab the latest backup using script in github/backup_scripts (you have to add the server's password to this file -- read the commented out section at the top)
* Restore to your local db so you’re working on the current release
* Create empty directory wp-content/plugins (otherwise installing first plugin will fail)

Both cases:
* It would be a good idea to add your public key to .ssh/authorized_keys via the filebrowser (either via SSH or in cPanel)

**Set up WordPress network**  
In network admin dashboard:
* TODO: Network Settings choices

**Install theme and plugins**
In network admin dashboard:
* Upload Scalia theme's zip file (in gDrive) -- this is a parent of the NSAMR theme so needs to be installed first
* Upload NSAMR theme's zip file (in gDrive)
* Activate NSAMR theme in Appearance --> Themes
* Install all plugins it wants, both required and recommended

**Install extra plugins**
In network admin dashboard: Plugins --> Add New (blue button), install and network-activate:
* Under Construction (https://wordpress.org/plugins/under-construction-page/)
* Wordfence Security (https://wordpress.org/plugins/wordfence/)
  * Wordfence --> Options: set to email alerts to it@nsamr.ac.uk
 
**Set up plugins**
In NSAMR site dashboard:
* Plugins --> Under Construction --> Settings
  * --> Main: Activate: on
  * --> Content: Headliine "Coming soon..."
  * --> Content: remove text in "Content" box
  * HTTP 200
  * Administrator  

**Import template data** (TODO: export our own template site)
In NSAMR site dashboard:
* Scalia Import --> Import main demo content (button) (this takes aaaages)

**Set up how we want** (TODO: this is for old theme)
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

## Notes for theme development
**Compile CSS for NSAMR theme**
The NSAMR theme uses Sass and SCSS, so you need to set up automagical compilation of style.css file every time you update any of the files
* Navigate to wp-content/themes/nsamr
* Set up compass: https://code.tutsplus.com/tutorials/a-wordpress-development-process-using-sass-and-compass--cms-21861  
<pre><code>compass config config.rb</code></pre>
* Open config.rb  
  * Set css_dir to “/”  
  * Set sass_dir to “assets/sass”  
  * Set images_dir to “assets/images”  
  * Set javascripts_dir to “assets/js”  
  * (Leave http_path as it is)  
  * Uncomment line 12 (output_style), then recomment after “expanded”  
  * Uncomment line 18 (line_comments)  
* Run compass (compass watch)  
* --> wp-content/themes/nsamr/style.css should be created 


## Misc
Don’t commit compiled files, e.g.
* style.css (wordpress theme file)
* config.rb (from compass)

## TODO
* Do more than password hash
* Salt the WordPress things
* Get SSL cert (?https://letsencrypt.org/getting-started/)

