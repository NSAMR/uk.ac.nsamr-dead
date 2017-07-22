<?php
/**
 * Weclome Page Class
 *
 * @since       1.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function wpinked_so_admin_page() {
	add_menu_page(
		'Widgets for SiteOrigin',
		__( 'WPinked Widgets', 'wpinked-widgets' ),
		'manage_options',
		'wpinked-widgets',
		'wpinked_so_admin_page_content',
		plugin_dir_url(__FILE__) . 'img/menu-icon.png',
		99
	);

	add_submenu_page(
		'wpinked-widgets',
		'Welcome to Widgets for SiteOrigin',
		__( 'Get Addons', 'wpinked-widgets' ),
		'manage_options',
		'wpinked-widgets',
		'wpinked_so_admin_page_content'
	);

	add_submenu_page(
		'wpinked-widgets',
		'Docs & Support',
		__( 'Docs & Support', 'wpinked-widgets' ),
		'manage_options',
		'wpinked-widgets-docs-support',
		'wpinked_so_admin_page_docs_support'
	);
}
add_action( 'admin_menu', 'wpinked_so_admin_page' );

function wpinked_so_admin_beacon( $screen ) {

	$screen = get_current_screen();
	if ( strpos( $screen->id, 'wpinked-widgets-docs-support') == false ) return;
	$current_user = wp_get_current_user(); ?>

	<script>

	!function(e,o,n){window.HSCW=o,window.HS=n,n.beacon=n.beacon||{};var t=n.beacon;t.userConfig={},t.readyQueue=[],t.config=function(e){this.userConfig=e},t.ready=function(e){this.readyQueue.push(e)},o.config={docs:{enabled:!0,baseUrl:"//wpinked-widgets.helpscoutdocs.com/"},contact:{enabled:!0,formId:"6a408b97-9b94-11e6-91aa-0a5fecc78a4d"}};var r=e.getElementsByTagName("script")[0],c=e.createElement("script");c.type="text/javascript",c.async=!0,c.src="https://djtflbt20bdde.cloudfront.net/",r.parentNode.insertBefore(c,r)}(document,window.HSCW||{},window.HS||{});

	HS.beacon.config( {
		color: '#e40046',
		icon: 'beacon',
		topArticles: true,
		topics: [
			{ val: 'technical-support', label: 'Technical Support' },
			{ val: 'billing', label: 'Billing'},
			{ val: 'feature-request', label: 'Feature Request' },
			{ val: 'customization', label: 'Customization'},
			{ val: 'pre-sale', label: 'Pre-Sale Question' },
			{ val: 'bug', label: 'Bug'},
			{ val: 'other', label: 'Other'}
		],
		attachment: true,
		instructions:'We will be with you as soon as we are able.'
	} );

	HS.beacon.ready( function() {
		HS.beacon.identify( {
			name: '<?php echo $current_user->display_name; ?>',
			email: '<?php echo $current_user->user_email; ?>',
		} );
	} );

	</script>
<?php }
add_action( 'admin_footer', 'wpinked_so_admin_beacon' );

function wpinked_so_admin_page_content() {
?>
	<div class="iw-admin-page">

		<div class="iw-page-header">
			<p class="iw-admin-thank" style="margin-bottom: 75px;">Thank you for installing Widgets for SiteOrigin!</p>

			<h1 class="iw-admin-welcome">Welcome to Widgets for SiteOrigin <?php echo INKED_SO_VER; ?></h1>
			<h2 class="iw-admin-tagline">Modern Widgets for Beautiful Websites</h2>
			<p class="iw-admin-links">
				Show you appreciation with a <a href="https://wordpress.org/support/view/plugin-reviews/widgets-for-siteorigin#postform" class="thankyou" target="_blank" title="Ok, you deserved it">5-star rating</a> |
				Support E-mail : <a href="mailto:team@wpinked.com">team@wpinked.com</a> |
				Refer : <a href="http://widgets-docs.wpinked.com/" target="_blank">Documentation</a> &bull; <a href="http://widgets.wpinked.com/" target="_blank">Demo</a>
			</p>

		</div>

		<div class="iw-page-content">

			<div class="iw-admin-box pro">
				<h2 class="premium-plugin-features">Widgets for SiteOrigin Pro Features</h2>
				<div class="feature">
					<h3 class="feature-title">Blog Enhanced</h3>
					<p class="feature-content">Extending on the blog widget, this widget comes with a set of predesigned article templates. It also comes equipped with AJAX powered navigation.</p>
					<p class="feature-links"><a href="http://widgets.wpinked.com/blog-enhanced-widget/" target="_blank">Demo</a> &bull; <a href="http://widgets-docs.wpinked.com/article/43-blog-enhanced-widget" target="_blank">Documentation</a></p>
				</div>
				<div class="feature">
					<h3 class="feature-title">Blog Slider</h3>
					<p class="feature-content">This widget lets you easily add eye catching post sliders anywhere on your website. It is typically used at the top of pages and goes great in conjunction with the Blog Widget.</p>
					<p class="feature-links"><a href="http://widgets.wpinked.com/blog-slider-widget/" target="_blank">Demo</a> &bull; <a href="http://widgets-docs.wpinked.com/article/44-blog-slider-widget" target="_blank">Documentation</a></p>
				</div>
				<div class="feature">
					<h3 class="feature-title">Charts</h3>
					<p class="feature-content">This widget allows you to visualise your data in a number of different ways. Choose from 6 chart types, each of them animated, fully customisable and engaging.</p>
					<p class="feature-links"><a href="http://widgets.wpinked.com/chart-widget/" target="_blank">Demo</a> &bull; <a href="http://widgets-docs.wpinked.com/article/42-chart-widget" target="_blank">Documentation</a></p>
				</div>
				<div class="row-sep"></div>
				<div class="feature">
					<h3 class="feature-title">Person Slider</h3>
					<p class="feature-content">This widget is perfectly suited to showcase your personnel on About Me or Team Member pages, where you would like to highlight their bio. It brings together text, imagery, social media links and a smooth slider in a cohesive manner.</p>
					<p class="feature-links"><a href="http://widgets.wpinked.com/person-slider-widget/" target="_blank">Demo</a> &bull; <a href="http://widgets-docs.wpinked.com/article/45-person-slider-widget" target="_blank">Documentation</a></p>
				</div>
				<div class="feature">
					<h3 class="feature-title">Testimonial Slider</h3>
					<p class="feature-content">This widget gives you is a great way to encourage trust from your visitors by displaying quotes from your customers. It fits snuggly in your Sales, Pricing or Home pages.</p>
					<p class="feature-links"><a href="http://widgets.wpinked.com/testimonial-slider-widget/" target="_blank">Demo</a> &bull; <a href="http://widgets-docs.wpinked.com/article/46-testimonial-slider-widget" target="_blank">Documentation</a></p>
				</div>
				<div class="feature">
					<h3 class="feature-title">Animations</h3>
					<p class="feature-content">This feature gives you an easy way to animate widgets and rows. Choose from 18 different animation effects.</p>
					<p class="feature-links"><a href="http://widgets.wpinked.com/the-animation-feature/" target="_blank">Demo</a> &bull; <a href="http://widgets-docs.wpinked.com/article/48-animation" target="_blank">Documentation</a></p>
				</div>
				<div class="row-sep"></div>
				<div class="feature">
					<h3 class="feature-title">Page Builder</h3>
					<p class="feature-content">This feature enables the use of the page builder in tabs, accordions and filter accordions.</p>
				</div>
				<div class="feature">
					<h3 class="feature-title">Custom Fonts</h3>
					<p class="feature-content">This feature lets you apply custom fonts to important elements in your widgets. Choose from hundreds of fonts.</p>
				</div>
				<div class="row-sep"></div>
				<div class="buy-pro">
					<a href="https://wpinked.com/downloads/widgets-for-siteorigin-pro/" target="_blank">
						<img src="<?php echo plugin_dir_url(__FILE__); ?>img/get-pro-now.jpg">
					</a>
				</div>
			</div>

		</div>

	</div>

<?php
}

function wpinked_so_admin_page_docs_support() { ?>

	<div class="iw-admin-page docs-support">

		<div class="iw-page-header">

			<h1 class="iw-admin-welcome">Welcome to Documentation and Support</h1>
			<p class="use-beacon">You can use Helpscout's Beacon at the bottom right of this page to quickly and easily browse through the docs or get in touch with us.</p>

		</div>

		<div class="iw-page-content">

			<img src="<?php echo plugin_dir_url(__FILE__); ?>img/helpscout-beacon.png">
			<img src="<?php echo plugin_dir_url(__FILE__); ?>img/helpscout-beacon-docs.png">
			<img src="<?php echo plugin_dir_url(__FILE__); ?>img/helpscout-beacon-message.png">

			<div class="iw-admin-box pro">
				<div class="buy-pro">
					<a href="https://wpinked.com/downloads/widgets-for-siteorigin-pro/" target="_blank">
						<img src="<?php echo plugin_dir_url(__FILE__); ?>img/get-pro-now.jpg">
					</a>
				</div>
			</div>

		</div>

	</div>

<?php
}
