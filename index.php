<!DOCTYPE HTML>

<?php session_start(); include("config.php"); include("functions.php"); 
    $dbconnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(mysqli_connect_errno()) {
        echo "Connection Failed:".mysqli_connect_error();
        exit;
    }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Put Content Here">
    <meta name="keywords" content="Put keywords here">
    <meta name="author" content="Put your name here">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Fishbase</title>
    
    <!-- Edit the link below / replace with your chosen google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    
    <!-- Edit the name of your style sheet - 'foo' is not a valid name!! -->
    <link rel="stylesheet" href="theme/l3_data_style.css"> 
        <link rel="stylesheet" href="theme/font-awesome.min.css">
    
</head>
    
<body>
    
    <div class="wrapper">
    

        
        <div class="box banner">
            
    
            <h1>The Great Fishbase</h1>
        </div>    <!-- / banner -->

        <!-- Navigation goes here.  Edit BOTH the file name and the link name -->
        <div class="box nav">
            
            <div class="linkwrapper">
                <div class="commonsearches">
                    <a href="#l">Item</a> | 
                    <a href="#">Item</a> | 
                    <a href="#">Item</a> 
                </div>  <!-- / common searches -->
            
                <div class="topsearch">
                    
                    <!-- Quick Search-->           
                    <form method="post" action="index.php?page=search" enctype="multipart/form-data">

                        <input class="search quicksearch" type="text" name="quick_search" size="40" value="" required placeholder="Quick Search..." />

                        <input class="submit" type="submit" name="find_quick" value="&#xf002;" />

                    </form>     <!-- / quick search -->
                    
                </div>  <!-- / top search -->
                
                <div class="topadmin">
                    <a href="#">Log In</a>
                    
                </div>  <!-- / top admin -->
                
            </div>  <!--- / link wrapper -->
            
        </div>    <!-- / nav -->        
        
        <div class="box main">        
            <div class="main-img-wrapper">
                <img src="images/Topback.svg" alt="" class="main-bg-img">
            </div>
            <?php 
                if(!isset($_REQUEST["page"])) {
                    include("content/home.php");
                }
                else {
                    $page = preg_replace('/[^0-9a-zA-Z]-/', '', $_REQUEST['page']);
                    include("content/$page.php");
                }
            ?>
        </div>    <!-- / main -->
        

        <div class="box footer">
            CC Daniel Holmes 2025
        </div>    <!-- / footer -->
    
    </div>  <!-- / wrapper  -->
    
</body>        
