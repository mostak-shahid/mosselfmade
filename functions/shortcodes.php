<?php
function admin_shortcodes_page(){
	//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = null )
    add_menu_page( 
        __( 'Theme Short Codes', 'textdomain' ),
        'Short Codes',
        'manage_options',
        'shortcodes',
        'shortcodes_page',
        'dashicons-book-alt',
        3
    ); 
}
add_action( 'admin_menu', 'admin_shortcodes_page' );
function shortcodes_page(){
	?>
<div class="wrap">
    <h1>Theme Short Codes</h1>
    <ol>
        <li>[home-url slug=''] <span class="sdetagils">displays home url</span></li>
        <li>[site-identity class='' container_class=''] <span class="sdetagils">displays site identity according to theme option</span></li>
        <li>[site-name link='0'] <span class="sdetagils">displays site name with/without site url</span></li>
        <li>[copyright-symbol] <span class="sdetagils">displays copyright symbol</span></li>
        <li>[this-year] <span class="sdetagils">displays 4 digit current year</span></li>
        <li>[email class='' display='all' title='0'] <span class="sdetagils">displays email from theme options</span></li>
        <li>[phone class='' display='all' title='0'] <span class="sdetagils">displays phone from theme options</span></li>
    </ol>
</div>
<?php
}
function home_url_func( $atts = array(), $content = '' ) {
	$atts = shortcode_atts( array(
		'slug' => '',
	), $atts, 'home-url' );

	return home_url( $atts['slug'] );
}
add_shortcode( 'home-url', 'home_url_func' );
function site_identity_func( $atts = array(), $content = null ) {
	global $forclient_options;
	$logo_option = (carbon_get_theme_option( 'mos-logo-show' ))?carbon_get_theme_option( 'mos-logo-show' ):'title';
	$html = '';
	$atts = shortcode_atts( array(
		'class' => '',
		'container_class' => ''
	), $atts, 'site-identity' ); 
    ob_start(); ?>
<div class="logo-wrapper <?php echo $atts['container_class']?>">
    <?php if($logo_option == 'logo') : ?>
    <a class="logo <?php echo $atts['class']?>" href="<?php echo home_url()?>">
        <?php if(carbon_get_theme_option( 'mos-logo' )) : ?>
        <?php echo wp_get_attachment_image( carbon_get_theme_option( 'mos-logo' ), 'full', "", array( "class" => "img-responsive img-fluid" ) );  ?>
        <?php else : ?>
        <img class="img-responsive img-fluid" src="<?php echo get_template_directory_uri(). '/images/logo.png'?>" alt="<?php echo get_bloginfo('name').' - Logo'?>">
        <?php endif?>
    </a>
    <?php else : ?>
    <div class="<?php echo $atts['class']?>">
        <h1 class="site-title"><a href="<?php echo home_url()?>"><?php echo get_bloginfo('name')?></a></h1>
        <p class="site-description"><?php echo get_bloginfo( 'description' )?></p>
    </div>
    <?php endif;?>
</div>
<?php $html = ob_get_clean();	
	return $html;
}
add_shortcode( 'site-identity', 'site_identity_func' );
function site_name_func( $atts = array(), $content = '' ) {
	$html = '';
	$atts = shortcode_atts( array(
		'link' => 0,
	), $atts, 'site-name' );
    
	if ($atts['link']) $html .=	'<a href="'.esc_url( home_url( '/' ) ).'">';
	$html .= get_bloginfo('name');
	if ($atts['link']) $html .=	'</a>';
	return $html;
}
add_shortcode( 'site-name', 'site_name_func' );
function copyright_symbol_func() {
	return '&copy;';
}
add_shortcode( 'copyright-symbol', 'copyright_symbol_func' );
function this_year_func() {
	return date('Y');
}
add_shortcode( 'this-year', 'this_year_func' );

function email_func($atts = array(), $content = '') {
	$atts = shortcode_atts( array(
        'class' => '',
        'display' => 'all',
		'title' => 0,
	), $atts, 'email' );  
    ob_start();     
    $emails = carbon_get_theme_option( 'mos-contact-email' );  
    if($emails && sizeof($emails)) :
    ?>
<span class="email-wrapper <?php echo $atts['class'] ?>">
    <?php if (!is_numeric($atts['display'])) : ?>
    <?php foreach($emails as $email) :?>
    <span class="email-unit">
        <span class="email-title <?php if(!$atts['title']) echo 'd-none'?>"><?php echo $email['title'] ?></span>
        <span class="email-link"><a href="mailto:<?php echo $email['email'] ?>"><?php echo $email['email'] ?></a></span>
    </span>
    <?php endforeach;?>
    <?php else : ?>
    <span class="email-unit">
        <span class="email-title <?php if(!$atts['title']) echo 'd-none'?>"><?php echo $emails[$atts['display']]['title'] ?></span>
        <span class="email-link"><a href="mailto:<?php echo $emails[$atts['display']]['email'] ?>"><?php echo $emails[$atts['display']]['email'] ?></a></span>
    </span>
    <?php endif ?>
    <?php echo do_shortcode($content) ?>
</span>
<?php endif?>
<?php $html = ob_get_clean();
    return $html;
}
add_shortcode( 'email', 'email_func' );

function phone_func($atts = array(), $content = '') {
	$atts = shortcode_atts( array(
        'class' => '',
        'display' => 'all',
		'title' => 0,
	), $atts, 'phone' );  
    ob_start();     
    $phones = carbon_get_theme_option( 'mos-contact-phone' );  
    if($phones && sizeof($phones)) :
    ?>
<span class="phone-wrapper <?php echo $atts['class'] ?>">
    <?php if (!is_numeric($atts['display'])) : ?>
    <?php foreach($phones as $phone) :?>
    <span class="phone-unit">
        <span class="phone-title <?php if(!$atts['title']) echo 'd-none'?>"><?php echo $phone['title'] ?></span>
        <span class="phone-link"><a href="mailto:<?php echo $phone['number'] ?>"><?php echo $phone['number'] ?></a></span>
    </span>
    <?php endforeach;?>
    <?php else : ?>
    <span class="phone-unit">
        <span class="phone-title <?php if(!$atts['title']) echo 'd-none'?>"><?php echo $phones[$atts['display']]['title'] ?></span>
        <span class="phone-link"><a href="mailto:<?php echo $phones[$atts['display']]['number'] ?>"><?php echo $phones[$atts['display']]['number'] ?></a></span>
    </span>
    <?php endif ?>
    <?php echo do_shortcode($content) ?>
</span>
<?php endif?>
<?php $html = ob_get_clean();
    return $html;
}
add_shortcode( 'phone', 'phone_func' );

function signup_form_func( $atts = array(), $content = null ) {
	global $forclient_options;
	$logo_option = (carbon_get_theme_option( 'mos-logo-show' ))?carbon_get_theme_option( 'mos-logo-show' ):'title';
	$html = '';
	$atts = shortcode_atts( array(
		'class' => '',
	), $atts, 'signup-form' ); 
    ob_start(); ?>
<div class="signup-form-wrapper <?php echo $atts['class']?>">
    <form class="stepper-form" id="example-advanced-form" action="" method="post">
        <h3 class="step-title d-none">Required</h3>
        <fieldset class="step-1">
            <h4 class="text-center mb-30">Lets start with your email address and name</h4>
            <div class="form-group mb-20">
                <input id="full_name" name="full_name" type="text" class="mos-form-validate form-control" placeholder="Enter your full name" required>
            </div>
            <div class="form-group mb-20">
                <input id="user_email" name="user_email" type="text" class="mos-form-validate form-control" placeholder="Enter your email address" required>
            </div>
            <div class="form-group mb-20">
                <input id="password" name="password" type="password" class="mos-form-validate form-control" placeholder="Type your password" required>
            </div>
            <div class="form-group mb-20">
                <input id="confirm" name="confirm" type="password" class="mos-form-validate form-control" placeholder="Re-type your password" required>
            </div>
            <div class="form-group tml-field-wrap tml-rememberme-wrap mb-20">
                <input name="marketing-email" type="checkbox" value="yes" id="marketing-email" class="tml-checkbox">
                <label class="tml-label" for="marketing-email">I would like to recieve occasional marketing emails from selfmade and its partners</label>
            </div>
        </fieldset>

        <h3 class="step-title d-none">Additional</h3>
        <fieldset class="step-2">
            <h4 class="text-center mb-30">Add few more information about you</h4>
            <div class="form-group mb-20">            
                <select id="biz-journey" name="biz-journey" class="mos-form-validate form-select" aria-label="Where are you in your biz journey?" required>
                    <option selected>Where are you in your biz journey?</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>            
            </div>
            <div class="form-group mb-20">            
                <select id="your-industry" name="your-industry" class="mos-form-validate form-select" aria-label="What is your industry?" required>
                    <option selected>What is your industry?</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>            
            </div>
            <div class="form-group mb-20">            
                <select id="your-interest" name="your-interest" class="mos-form-validate form-select" aria-label="What top 3 topics are you interested in?" required>
                    <option selected>What top 3 topics are you interested in?</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>            
            </div>
            <div class="form-group tml-field-wrap tml-rememberme-wrap mb-20">
                <input id="privacy-policy" name="privacy-policy" type="checkbox" value="yes" class="tml-checkbox">
                <label class="tml-label" for="privacy-policy"><span>I agree to Selfmade’s <a href="#">Privacy policy</a> and <a href="#">Terms of Use</a></span></label>
            </div>
        </fieldset>

        <h3 class="step-title d-none">Pricing</h3>
        <fieldset class="step-3">
            <h4 class="text-center mb-15 fs-36">Select your pricing plan</h4>
            <p class="text-center fs-14 mb-30">2 months free with a Yearly Plan</p>
            
            <div class="bd-example">
                <ul class="nav justify-content-center mb-50">
                    <li class="nav-item">
                        <a class="nav-link rounded-pill" aria-current="page" href="#" id="pills-yearly-tab" data-bs-toggle="pill" data-bs-target="#pills-yearly" type="button" role="tab" aria-controls="pills-yearly" aria-selected="true">Yearly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-pill" href="#" id="pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-monthly" type="button" role="tab" aria-controls="pills-monthly" aria-selected="false">Monthly</a>
                    </li>
                </ul>
                <div class="tab-content mb-4" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab" tabindex="0">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="pricing-form-check">
                                    <input name="pricing" class="mos-form-check-input" type="radio" value="yearly-launch" id="yearly-launch">
                                    <label class="form-check-label" for="yearly-launch">
                                        <div class="pricing-table pricing-table-1 smooth">
                                            <div class="pricing-table-heading">
                                                <h4><span class="title">Launch</span></h4>
                                            </div>
                                            <div class="pricing-table-promotion">Save 20% yearly</div>
                                            <div class="pricing-table-intro">
                                                <div class="price mb-20">
                                                    <span class="fs-48">$39</span>
                                                    <span>Per month</span>
                                                </div>
                                                <div class="desc mb-20">On-demand content to go at your own pace. new materials released each month.</div>
                                                <div class="details">
                                                    <p><strong>Key Features</strong></p>
                                                    <ul class="mb-30">
                                                        <li>Live CEO Q&amp;As</li>
                                                        <li>Business Video Library</li>
                                                        <li>Online Community</li>
                                                        <li>How-To Courses &amp; Homework</li>
                                                        <li>Templates &amp; Downloads</li>
                                                        <li>Member-exclusive perks</li>
                                                        <li class="not-incluided">Weekly Live, Group Business Coaching</li>
                                                        <li class="not-incluided">Two 1:1 Mentorship Sessions per month</li>
                                                    </ul>
                                                </div> 
                                                <div class="pricing-table-btn">
                                                    <span>Sign up for free</span>
                                                </div>                                               
                                            </div>
                                        </div>
                                    </label>
                                </div>                                
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="pricing-form-check">
                                    <input name="pricing" class="mos-form-check-input" type="radio" value="yearly-grow" id="yearly-grow">
                                    <label class="form-check-label" for="yearly-grow">
                                        <div class="pricing-table pricing-table-2 smooth">
                                            <div class="pricing-table-heading">
                                                <h4><span class="title">Grow</span><small>Most popular</small></h4>
                                            </div>
                                            <div class="pricing-table-promotion">Save 20% yearly</div>
                                            <div class="pricing-table-intro">
                                                <div class="price mb-20">
                                                    <span class="fs-48">$129</span>
                                                    <span>Per month</span>
                                                </div>
                                                <div class="desc mb-20">On-demand content to go at your own pace. new materials released each month.</div>
                                                <div class="details">
                                                    <p><strong>Key Features</strong></p>
                                                    <ul class="mb-30">
                                                        <li>Live CEO Q&amp;As</li>
                                                        <li>Business Video Library</li>
                                                        <li>Online Community</li>
                                                        <li>How-To Courses &amp; Homework</li>
                                                        <li>Templates &amp; Downloads</li>
                                                        <li>Member-exclusive perks</li>
                                                        <li>Weekly Live, Group Business Coaching</li>
                                                        <li class="not-incluided">Two 1:1 Mentorship Sessions per month</li>
                                                    </ul>
                                                </div> 
                                                <div class="pricing-table-btn">
                                                    <span>Sign up for free</span>
                                                </div>                                               
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="pricing-form-check">
                                    <input name="pricing" class="mos-form-check-input" type="radio" value="yearly-scale" id="yearly-scale">
                                    <label class="form-check-label" for="yearly-scale">
                                        <div class="pricing-table pricing-table-3 smooth">
                                            <div class="pricing-table-heading">
                                                <h4><span class="title">Scale</span></h4>
                                            </div>
                                            <div class="pricing-table-promotion">Save 20% yearly</div>
                                            <div class="pricing-table-intro">
                                                <div class="price mb-20">
                                                    <span class="fs-48">$179</span>
                                                    <span>Per month</span>
                                                </div>
                                                <div class="desc mb-20">On-demand content to go at your own pace. new materials released each month.</div>
                                                <div class="details">
                                                    <p><strong>Key Features</strong></p>
                                                    <ul class="mb-30">
                                                        <li>Live CEO Q&amp;As</li>
                                                        <li>Business Video Library</li>
                                                        <li>Online Community</li>
                                                        <li>How-To Courses &amp; Homework</li>
                                                        <li>Templates &amp; Downloads</li>
                                                        <li>Member-exclusive perks</li>
                                                        <li>Weekly Live, Group Business Coaching</li>
                                                        <li>Two 1:1 Mentorship Sessions per month</li>
                                                    </ul>
                                                </div> 
                                                <div class="pricing-table-btn">
                                                    <span>Sign up for free</span>
                                                </div>                                               
                                            </div>
                                        </div>                                        
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab" tabindex="0">                        
                        <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="pricing-form-check">
                                    <input name="pricing" class="mos-form-check-input" type="radio" value="monthly-launch" id="monthly-launch">
                                    <label class="form-check-label" for="monthly-launch">
                                        <div class="pricing-table pricing-table-1 smooth">
                                            <div class="pricing-table-heading">
                                                <h4><span class="title">Launch</span></h4>
                                            </div>
                                            <div class="pricing-table-promotion">Save 20% yearly</div>
                                            <div class="pricing-table-intro">
                                                <div class="price mb-20">
                                                    <span class="fs-48">$49</span>
                                                    <span>Per month</span>
                                                </div>
                                                <div class="desc mb-20">On-demand content to go at your own pace. new materials released each month.</div>
                                                <div class="details">
                                                    <p><strong>Key Features</strong></p>
                                                    <ul class="mb-30">
                                                        <li>Live CEO Q&amp;As</li>
                                                        <li>Business Video Library</li>
                                                        <li>Online Community</li>
                                                        <li>How-To Courses &amp; Homework</li>
                                                        <li>Templates &amp; Downloads</li>
                                                        <li>Member-exclusive perks</li>
                                                        <li class="not-incluided">Weekly Live, Group Business Coaching</li>
                                                        <li class="not-incluided">Two 1:1 Mentorship Sessions per month</li>
                                                    </ul>
                                                </div> 
                                                <div class="pricing-table-btn">
                                                    <span>Sign up for free</span>
                                                </div>                                               
                                            </div>
                                        </div>
                                    </label>
                                </div>                                
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="pricing-form-check">
                                    <input name="pricing" class="mos-form-check-input" type="radio" value="monthly-grow" id="monthly-grow">
                                    <label class="form-check-label" for="monthly-grow">
                                        <div class="pricing-table pricing-table-2 smooth">
                                            <div class="pricing-table-heading">
                                                <h4><span class="title">Grow</span><small>Most popular</small></h4>
                                            </div>
                                            <div class="pricing-table-promotion">Save 20% yearly</div>
                                            <div class="pricing-table-intro">
                                                <div class="price mb-20">
                                                    <span class="fs-48">$139</span>
                                                    <span>Per month</span>
                                                </div>
                                                <div class="desc mb-20">On-demand content to go at your own pace. new materials released each month.</div>
                                                <div class="details">
                                                    <p><strong>Key Features</strong></p>
                                                    <ul class="mb-30">
                                                        <li>Live CEO Q&amp;As</li>
                                                        <li>Business Video Library</li>
                                                        <li>Online Community</li>
                                                        <li>How-To Courses &amp; Homework</li>
                                                        <li>Templates &amp; Downloads</li>
                                                        <li>Member-exclusive perks</li>
                                                        <li>Weekly Live, Group Business Coaching</li>
                                                        <li class="not-incluided">Two 1:1 Mentorship Sessions per month</li>
                                                    </ul>
                                                </div> 
                                                <div class="pricing-table-btn">
                                                    <span>Sign up for free</span>
                                                </div>                                               
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="pricing-form-check">
                                    <input name="pricing" class="mos-form-check-input" type="radio" value="monthly-scale" id="monthly-scale">
                                    <label class="form-check-label" for="monthly-scale">
                                        <div class="pricing-table pricing-table-3 smooth">
                                            <div class="pricing-table-heading">
                                                <h4><span class="title">Scale</span></h4>
                                            </div>
                                            <div class="pricing-table-promotion">Save 20% yearly</div>
                                            <div class="pricing-table-intro">
                                                <div class="price mb-20">
                                                    <span class="fs-48">$189</span>
                                                    <span>Per month</span>
                                                </div>
                                                <div class="desc mb-20">On-demand content to go at your own pace. new materials released each month.</div>
                                                <div class="details">
                                                    <p><strong>Key Features</strong></p>
                                                    <ul class="mb-30">
                                                        <li>Live CEO Q&amp;As</li>
                                                        <li>Business Video Library</li>
                                                        <li>Online Community</li>
                                                        <li>How-To Courses &amp; Homework</li>
                                                        <li>Templates &amp; Downloads</li>
                                                        <li>Member-exclusive perks</li>
                                                        <li>Weekly Live, Group Business Coaching</li>
                                                        <li>Two 1:1 Mentorship Sessions per month</li>
                                                    </ul>
                                                </div> 
                                                <div class="pricing-table-btn">
                                                    <span>Sign up for free</span>
                                                </div>                                               
                                            </div>
                                        </div>                                        
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </fieldset>

        <h3 class="step-title d-none">Finish</h3>
        <fieldset class="step-4">
            <h4 class="text-center mb-50 fs-36">Do your payment and keep with us</h4>
            <div class="bg-white border-radius-16 p-40 overflow-hidden">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wrapper">
                            <div class="finish-tag mb-20">Subscribe to Grow membership</div>
                            <h2 class="finish-price mb-10">$139.00</h2>
                            <p class="period mb-15">Per month</p>
                            <p class="fs-14 mb-20">Get unstuck and supported in live, interactive sessions with our seasoned coaches.</p>
                            <h4 class="finish-title mb-10">Grow membership</h4>
                            <p class="fs-14 mb-20">Billed monthly</p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter promo code" aria-label="Enter promo code" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Apply</button>
                            </div>
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end">$139.00</td>
                                    </tr>
                                    <tr>
                                        <td>Promo code discount</td>
                                        <td class="text-end">$00.00</td>
                                    </tr>
                                    <tr>
                                        <td>Total due today</td>
                                        <td class="text-end">$00.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrapper">
                            <div class="form-title d-flex justify-content-center align-items-center gap-2 ">
                                <img src="<?php echo get_template_directory_uri() ?>/images/strip.png" alt="" width="40" height="27">
                                <span>Pay with stripe</span>
                            </div>
                            <div class="seperate"></div>
                            <div class="payment-form">
                                <div class="form-group mb-20">
                                    <input id="card_full_name" name="card_full_name" type="text" class="mos-form-validate form-control" placeholder="Enter your full name" required>
                                </div>
                                <div class="form-group mb-20">
                                    <input id="card_number" name="card_number" type="text" data-inputmask="'mask': '9999 9999 9999 9999'" class="mos-form-validate form-control" placeholder="Card number" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-20">
                                            <input id="card_exp" name="card_exp" type="text" data-inputmask="'mask': '99/9999'" class="mos-form-validate form-control" placeholder="MM/YYYY" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-20">
                                            <input id="card_cvc" name="card_cvc" type="text" data-inputmask="'mask': '999'" class="mos-form-validate form-control" placeholder="CVC" required>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="form-group mb-20">
                                    <input id="card_country" name="card_country" type="text" class="mos-form-validate form-control" placeholder="Country" required>
                                </div>
                                <div class="form-group mb-20">
                                    <input id="card_zip_code" name="card_zip_code" type="text" class="mos-form-validate form-control" placeholder="Zip code" required>
                                </div>
                                <div class="form-group">
                                    <button class="registration-complete" type="button">Subscribe</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
    <div class="signup-completed text-center" style="display: none">
        <img class="img-fluid mb-50" src="<?php echo get_template_directory_uri() ?>/images/sign-up-confirm.png" alt="">
        <h3 class="mb-20">Welcome to Selfmade! please verify your email.</h3>
        <p class="fs-16 mb-0">Get unstuck and supported in live, interactive sessions with our seasoned coaches If you haven’t received an email from us after five minutes, <a class="d-inline-block" href="#">click here to resend</a></p>        
    </div>

</div>
<?php $html = ob_get_clean();	
	return $html;
}
add_shortcode( 'signup-form', 'signup_form_func' );