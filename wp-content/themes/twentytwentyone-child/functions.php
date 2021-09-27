<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'my-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'twenty-twenty-one-style','twenty-twenty-one-style','twenty-twenty-one-print-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

function add_custom_script() {
    wp_register_script('custom_script', home_url() . '/wp-content/themes/twentytwentyone-child/custom.js', array( 'jquery' ));
    wp_enqueue_script('custom_script');
}
add_action( 'wp_enqueue_scripts', 'add_custom_script' );
 
add_shortcode( 'r_test', 'foobar_shortcode' );

function foobar_shortcode( $atts, $content ){
   $atts = shortcode_atts( array(
		'title' => 'Title',
	), $atts, 'bartag' );

    
    return  '<div id="myContainer">
        <div class="content">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item mobVer">
                    <div class="iconHome">
                        <i class="bi bi-house-door-fill"></i>
                    </div>
                </li>
                <li class="mobVer">
                    <span><img src="../wp-content/themes/twentytwentyone-child/Left.png" class="left"></span>
                    <span><img src="../wp-content/themes/twentytwentyone-child/Right.png" class="right"></span>
                </li>
                <li class="nav-item" role="presentation">
                  <div class="nav-link active navButtons" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" 
                  type="button" role="tab" aria-controls="info" aria-selected="true" class="inline">Contact Info</div>
                </li>
                <li class="mobVer">
                    <img src="../wp-content/themes/twentytwentyone-child/Left.png" class="left">
                    <img src="../wp-content/themes/twentytwentyone-child/Right.png" class="right">
                </li>
                <li class="nav-item" role="presentation">
                  <div class="nav-link navButtons" id="quantity-tab" data-bs-toggle="tab" data-bs-target="#quantity" 
                  type="button" role="tab" aria-controls="quantity" aria-selected="false">Quantity</div>
                </li>
                <li class="mobVer">
                    <img src="../wp-content/themes/twentytwentyone-child/Left.png" class="left">
                    <img src="../wp-content/themes/twentytwentyone-child/Right.png" class="right">
                </li>
                <li class="nav-item" role="presentation">
                  <div class="nav-link navButtons" id="price-tab" data-bs-toggle="tab" data-bs-target="#price" 
                  type="button" role="tab" aria-controls="price" aria-selected="false">Price</div>
                </li>
                <li class="mobVer">
                    <img src="../wp-content/themes/twentytwentyone-child/Left.png" class="left">
                    <img src="../wp-content/themes/twentytwentyone-child/Right.png" class="right">
                </li>
                <li class="nav-item" role="presentation">
                    <div class="nav-link navButtons" id="done-tab" data-bs-toggle="tab" data-bs-target="#done" 
                    type="button" role="tab" aria-controls="done" aria-selected="true">Done</div>
                  </li>
            </ul>

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
        
                    <form id="firstForm">
                        <h1 class="h1-margin">Contact info</h1>
                    <div class="mb-3 row">
                        <label class="form-label col-form-label">Name</label>
                        <div class="form-field">
                          <input type="text" class="form-control input370" id="validationName" placeholder="If value=empty , email req = error">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-label col-form-label">Email <sup>required</sup></label>
                        <div class="form-field">
                            <input type="email" class="form-control input370" id="exampleInputEmail1" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-label col-form-label">Phone</label>
                        <div class="form-field">
                          <input type="text" class="form-control input370" id="validationPhone">
                        </div>
                    </div>
                    <div class="col-auto buttons">
                        <button class="btn btn-primary">Continue</button>
                    </div>
                    </form>
                    
        
                </div>
                <div class="tab-pane fade" id="quantity" role="tabpanel" aria-labelledby="quantity-tab">
                    
                    <form id="secondForm">
                        <h1 class="h1-margin">Quantity</h1>
                    <div class="mb-3 row">
                        <label class="form-label col-form-label">Quantity <sup>required</sup></label>
                        <div class="form-field">
                          <input type="number" class="form-control input370" id="validationQuantity" max="1000" required>
                        </div>
                    </div>
                    <div class="col-auto buttons" >
                        <button class="btn btn-primary">Continue</button>
                        <button type="button" class="btn btn-light button-back" onclick="back(1)">
                            <i class="bi bi-arrow-left-short"></i>
                            Back
                        </button>
                      </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
                    <h1>Price</h1>
                    <h1 id="donePrice"></h1>
                    <div class="col-auto buttons" >
                        <button type="button" class="btn btn-primary" onclick="nextStep(3)">Send to Email</button>
                        <button type="button" class="btn btn-light button-back" onclick="back(2)">
                        <i class="bi bi-arrow-left-short"></i>
                        Back
                    </button>
                    </div>
                    
                </div>
                <div id="done" class="tab-pane fade"  role="tabpanel" aria-labelledby="done-tab">
                    <h1 class="h1-margin">Done</h1>
                    
                    <div class="col-auto buttons" >
                        <button type="button" class="btn btn-primary" onclick="nextStep(4)">
                            Start again
                            <i class="bi bi-arrow-right-short"></i>
                        </button>
                    </div>
                    
                </div>
              </div>
        </div>
    </div>
    <div>'. $atts["title"] .'</div>
    <div>' . $content .'</div>';
}

add_action("wp_ajax_frontend_action_without_file" , "frontend_action_without_file");
add_action("wp_ajax_nopriv_frontend_action_without_file" , "frontend_action_without_file");

add_filter( 'wp_mail_content_type', 'set_html_content_type' );


function set_html_content_type() {
	return 'text/html';
}

function frontend_action_without_file(){
    echo json_encode($_POST);
    console.log($_POST);
    wp_mail( $_POST['mail'], 'Какая-то тема', 'name:' . $_POST['name'] . '<br>phone:' . $_POST['phone'] . '<br>price:' . $_POST['quantity'], 'sesileou.beget.tech');
    
    wp_die();
}

