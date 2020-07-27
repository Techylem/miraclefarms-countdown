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
		add_action('admin_menu', array( $this, 'lmd_register_options_page' ));
		add_action( 'admin_init', array( $this, 'lmd_register_title' ) );
		add_action( 'admin_init', array( $this, 'lmd_register_class' ) );
	}

	public function lmd_enque_styles(){
		wp_enqueue_script( 'custom_js', plugin_dir_url( __FILE__ ) . 'js/script.js' , array( 'jquery' ), '1.0' );
		wp_enqueue_style( 'custom_style', plugin_dir_url( __FILE__ ) . 'css/style.css' );
	}

	public function lmd_register_options_page() {
	  add_options_page('Page Title', 'Coundown Settings', 'manage_options', 'lmd_countdown_settings', array($this, 'lmd_options_page'));
	}

	public function lmd_register_title() {
	   add_option( 'countdown_title', 'This is title my option value.');
	   register_setting( 'lmd_options_count', 'countdown_title' );
	}

	public function lmd_register_class() {
	   add_option( 'countdown_class', 'Add Custom Class.');
	   register_setting( 'lmd_options_class', 'countdown_class' );
	}

	public function lmd_options_page(){
		?>
		<div>
		  <?php screen_icon(); ?>
		  <h2>Add Countdown Settings</h2>
		  <form method="post" action="options.php">
		  <?php settings_fields( 'lmd_options_count' ); ?>
		  <?php settings_fields( 'lmd_options_class' ); ?>
		  <table>
		  <tr valign="top">
		  <th scope="row"><label for="countdown_title">Add Title</label></th>
		  <td><input type="text" id="countdown_title" name="countdown_title" value="<?php echo get_option('countdown_title'); ?>" /></td>
		  </tr>
		  <tr valign="top">
		  	<th scope="row"><label for="countdown_class">Add Custom Class</label></th>
		  	<td><input type="text" id="countdown_class" name="countdown_class" placeholder="Add Custom Class" value="<?php echo get_option('countdown_class'); ?>" /></td>
		  </tr>
		  </table>
		  <?php  submit_button(); ?>
		  </form>
		  </div>
		<?php
	}

	public function lmd_countdown(){
		?>
		<div class="text-center <?php echo get_option('countdown_class'); ?>">
			<span class="h6 pt-1">
				<?php echo get_option('countdown_title'); ?>
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