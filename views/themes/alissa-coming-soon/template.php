<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $settings['title'] ?></title>

        <!-- CSS -->

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,700'>

         <!-- Bootstrap -->
        <link href="<?php echo wpmmp_css_url( 'public/bootstrap/css/bootstrap.min.css' ) ?>" rel="stylesheet">

        <link href="<?php echo wpmmp_css_url( 'public/bootstrap/css/bootstrap-theme.min.css' ) ?>" rel="stylesheet">
        
        <link href="<?php echo plugins_url( 'assets/css/style.css' , __FILE__ ) ?>" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo plugins_url( 'assets/ico/favicon.ico' , __FILE__ ) ?>">
        

        <?php wp_print_scripts( array( 'jquery' ) ) ?>

        <script>$ = jQuery; cd_date = '<?php echo $cd_date ?>';bg_1 = "<?php echo plugins_url( 'assets/img/backgrounds/1.jpg', __FILE__ ) ?>";bg_2 = "<?php echo plugins_url( 'assets/img/backgrounds/2.jpg', __FILE__ ) ?>";bg_3 = "<?php echo plugins_url( 'assets/img/backgrounds/3.jpg', __FILE__ ) ?>";ajax_url = "<?php echo admin_url( 'admin-ajax.php' ) ?>";</script>

        <script src="<?php echo wpmmp_css_url( 'public/bootstrap/js/bootstrap.min.js' ) ?>"></script>

        <script src="<?php echo plugins_url( 'assets/js/jquery.backstretch.min.js', __FILE__ ) ?>"></script>

        <script src="<?php echo plugins_url( 'assets/js/jquery.countdown.js' , __FILE__ ) ?>"></script>

        <script src="<?php echo plugins_url( 'assets/js/scripts.js', __FILE__ ) ?>"></script>


        <?php do_action( 'wpmmp_head' ) ?>

    </head>

    <body>

        <!-- Header -->
        <div class="container">
            <div class="header row">
                <div class="logo span4">
                    <h1><a href=""><?php echo $theme_settings['logo'] ?></a> <span>.</span></h1>
                </div>
                <div class="call-us span8">
                    <p><?php echo $theme_settings['header_tagline'] ?></p>
                </div>
            </div>
        </div>

        <!-- Coming Soon -->
        <div class="coming-soon">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <h2><?php echo $settings['heading1'] ?></h2>
                            <p><?php echo $settings['heading2'] ?></p>
                            <?php  if ( $settings['countdown_timer'] ): ?>
                            <div class="timer">
                                <div class="days-wrapper">
                                    <span class="days"></span> <br>days
                                </div>
                                <div class="hours-wrapper">
                                    <span class="hours"></span> <br>hours
                                </div>
                                <div class="minutes-wrapper">
                                    <span class="minutes"></span> <br>minutes
                                </div>
                                <div class="seconds-wrapper">
                                    <span class="seconds"></span> <br>seconds
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="container">
            <?php if ( $theme_settings['subscribe_form'] ): ?>
            <div class="row">
                <div class="span12 subscribe">
                    <h3><?php echo $theme_settings['form_heading'] ?></h3>
                    <p><?php echo $theme_settings['form_sub_heading'] ?></p>
                    <form class="form-inline" action="assets/sendmail.php" method="post">
                        <input type="text" name="email" placeholder="<?php echo $theme_settings['form_field_text'] ?>">
                        <button type="submit" class="btn"><?php echo $theme_settings['form_btn_text'] ?></button>
                    </form>
                    <div class="success-message"></div>
                    <div class="error-message"></div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="span12 social">
                    <?php if ( ! empty( $theme_settings['btn_fb'] ) ): ?>
                    <a href="<?php echo $theme_settings['btn_fb'] ?>" class="facebook" rel="tooltip" data-placement="top" data-original-title="Facebook"></a>
                    <?php endif;?>
                    
                    <?php if ( ! empty( $theme_settings['btn_twitter'] ) ): ?>
                    <a href="<?php echo $theme_settings['btn_twitter'] ?>" class="twitter" rel="tooltip" data-placement="top" data-original-title="Twitter"></a>
                    <?php endif;?>
                    
                    <?php if ( ! empty( $theme_settings['btn_dribble'] ) ): ?>
                    <a href="<?php echo $theme_settings['btn_dribble'] ?>" class="dribbble" rel="tooltip" data-placement="top" data-original-title="Dribbble"></a>
                    <?php endif;?>
                    
                    <?php if ( ! empty( $theme_settings['btn_gplus'] ) ): ?>
                    <a href="<?php echo $theme_settings['btn_gplus'] ?>" class="googleplus" rel="tooltip" data-placement="top" data-original-title="Google Plus"></a>
                    <?php endif;?>

                    <?php if ( ! empty( $theme_settings['btn_pin'] ) ): ?>
                    <a href="<?php echo $theme_settings['btn_pin'] ?>" class="pinterest" rel="tooltip" data-placement="top" data-original-title="Pinterest"></a>
                    <?php endif;?>

                    <?php if ( ! empty( $theme_settings['btn_flickr'] ) ): ?>
                    <a href="<?php echo $theme_settings['btn_flickr'] ?>" class="flickr" rel="tooltip" data-placement="top" data-original-title="Flickr"></a>
                    <?php endif;?>

                </div>
            </div>
            <div class="row">
            <div id="content">
              <?php echo wpautop( do_shortcode( $settings['content'] ) ) ?>
            </div>
        </div>
        </div>

    </body>

</html>

