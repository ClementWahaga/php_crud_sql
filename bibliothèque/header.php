<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <title>bibliothèque</title>

    <?php
          wp_enqueue_style('style.css');
    ?>
    
    
    <?php wp_head(); 
          
    ?>
    
</head>
<body <?php body_class(); ?>>
 
        <div class="header">
        
            <header class="admin-bar">
                <a href="<?php echo home_url( '/' ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
                </a>
                <div class="menu"><?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) );?></div> 
            </header>
            
        
             
        </div>
      
    
      <?php wp_body_open(); ?>
    
