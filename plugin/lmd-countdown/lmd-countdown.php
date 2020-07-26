<?php
/*
	Plugin Name: Countdown
	Plugin URI: http://www.google.com
	Author: Aamir Shahzad
	Author URI: http://www.google.com
	Description: You can add Countdown
	Version: 1.0.0
*/
	defined('ABSPATH') or die('Hey you can\t access this file!');

	class LMD_COUNTDOWN{

	public function __construct(){
		add_shortcode('COUNTDOWN', array( $this, 'lmd_countdown' ));
		add_action('wp_enqueue_scripts', array( $this, 'lmd_enque_styles' ));
	}

	public function lmd_enque_styles(){
		wp_enqueue_script( 'custom_js', plugin_dir_url( __FILE__ ) . 'js/script.js' , array( 'jquery' ), '1.0' );
		wp_enqueue_style( 'custom_style', plugin_dir_url( __FILE__ ) . 'css/style.css' );
	}

	public function lmd_countdown(){
		?>
		<div class="text-center">
			<span class="h6 pt-1">
				NEXT HOME DELIVERY CUT OFF
			</span>
			<ul id="countdown">
				<li id="days">
					<div class="number">00</div>
					<div class="label">Days</div>
				</li>
				&nbsp;
				<li id="hours">
					<div class="number">00</div>
					<div class="label">Hours</div>
				</li>
				&nbsp;
				<li id="minutes">
					<div class="number">00</div>
					<div class="label">Minutes</div>
				</li>
				&nbsp;
				<li id="seconds">
					<div class="number">00</div>
					<div class="label">Seconds</div>
				</li>
			</ul>
	</div>
		<?php
	}
}

new LMD_COUNTDOWN();