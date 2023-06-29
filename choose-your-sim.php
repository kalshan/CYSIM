<?php
/*
Plugin Name: Choose Your SIM
Description: Allows users to select between eSIM and Physical SIM options on the checkout page.
Version: 1.0
Author: Your Name
Author URI: Your Website
*/

// Add your plugin code below this line

// Enqueue CSS file
function choose_your_sim_enqueue_styles() {
    wp_enqueue_style( 'choose-your-sim-styles', plugins_url( '/assets/css/choose-your-sim.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'choose_your_sim_enqueue_styles' );

// Enqueue JS file
function choose_your_sim_enqueue_scripts() {
    wp_enqueue_script( 'choose-your-sim-scripts', plugins_url( '/assets/js/choose-your-sim.js', __FILE__ ), array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'choose_your_sim_enqueue_scripts' );


// Register custom shortcode
function choose_your_sim_shortcode() {
    ob_start();
    ?>
<div  class="choose-your-sim-co col-sm">
<center><h2 style="color:#E21B4D">CHOOSE YOUR SIM TYPE</h2></center> 

    <div class="choose-your-sim-container"  >
    
    <div class="choose-your-sim-box1 esim"></div>
    
       <div class="choose-your-sim-box esim">
            <center><h4 style="color:#012F64">eSIM</h4></center>
            <center><img src="https://www.ezysim.com.au/wp-content/uploads/2023/06/physical-sim-1.png" alt="Snow" style="width:20%"></center>
             <center><p style="color:#012F64;max-width: 220px;">Your eSIM will be up and running today.</p></center> 
        </div> 
        <div class="choose-your-sim-box physical-sim  ">
           <center><h4 style="color:#012F64"> Physical SIM</h4></center>
           <center><img src="https://www.ezysim.com.au/wp-content/uploads/2023/06/esim-2.png" alt="Snow" style="width:20%"></center>
     <center><p style="color:#012F64;max-width: 220px;">Your SIM will take 2-10 days to arrive via Australia</p></center>
  </div><div class="choose-your-sim-box1 esim"></div>
        </div>
        

    <div class="order-summary"></div>
    <div class="payment-gateway"></div>
</div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'choose_your_sim', 'choose_your_sim_shortcode' );

// Display the shortcode on the checkout page
function choose_your_sim_display_shortcode() {
    if (is_checkout()) {
        echo do_shortcode('[choose_your_sim]');
    }
}
add_action( 'woocommerce_before_checkout_form', 'choose_your_sim_display_shortcode' );
