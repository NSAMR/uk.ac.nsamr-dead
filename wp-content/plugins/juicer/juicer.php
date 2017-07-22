<?php
/**
 * Plugin Name: Juicer
 * Plugin URI: http://www.juicer.io
 * Description: Add and embed a social media feed to your site with a shortcode.
 * Version: 1.8
 * Author: Ryan MacInnes
 * Author URI: http://www.goddamnyouryan.com
 * License: GPLv2 or later
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


add_action( 'wp_enqueue_scripts', 'juicer_scripts', 0 );
function juicer_scripts() {

  wp_enqueue_script('jquery');

  wp_enqueue_script(
    'juicerembed',
    '//assets.juicer.io/embed-no-jquery.js',
    array('jquery'),
    false,
    false
  );

  wp_enqueue_style(
    'juicerstyle',
    '//assets.juicer.io/embed.css'
  );
}

class Juicer_Feed {

  public function render( $args ) {

    $defaults = array(
      'name' => 'error',
    );

    $args = wp_parse_args( $args, $defaults);

    $map_attributes = generate_attributes($args);

    $attributes = join(' ', $map_attributes);

    $output = '<ul class="juicer-feed" data-feed-id="' . $args['name'] . '" ' . $attributes . '>';

    $closing = (array_key_exists('paid', $args)) ? '</ul>' : '<h1 class="referral"><a href="http://www.juicer.io">Powered by Juicer</a></h1></ul>';

    $output = $output . $closing;

    return $output;
  }

}

function generate_attributes( $array ) {
  $attrs = array();

  foreach ( $array as $key => $val ) {
    if ( !empty($val) ) {
      if (strpos($val, 'data-') !== false) {
        array_push($attrs, $val);
      } else {
        array_push($attrs, 'data-' . $key . '="' . $val . '"');
      }
    }
  }

  return $attrs;
}

function juicer_feed( $args ) {
    $feed = new Juicer_Feed();
    echo $feed->render( $args );
}

function juicer_shortcode( $args ) {
  extract( shortcode_atts( array(
      'name'    => 'error',
  ), $args ) );

  $feed = new Juicer_Feed();

  return $feed->render( $args );
}

add_shortcode( 'juicer', 'juicer_shortcode' );
?>
