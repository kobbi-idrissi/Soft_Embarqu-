

<!DOCTYPE html>
<html lang="en">
<head>
<title>detection des mouvements respiratoires</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/button green.css" rel="stylesheet"> 
<link href="css/favorite styled.css" rel="stylesheet" />
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!--//fonts-->


</head>
<body>
<!-- header -->
<div class="banner-top">
      <div class="social-bnr-agileits">
        <ul class="social-icons3">
                <li><a href="https://www.facebook.com/" class="fa fa-facebook icon-border facebook"> </a></li>
                <li><a href="https://twitter.com/" class="fa fa-twitter icon-border twitter"> </a></li>
                <li><a href="https://plus.google.com/u/0/" class="fa fa-google-plus icon-border googleplus"> </a></li> 
              </ul>
      </div>
      <div class="contact-bnr-w3-agile">
        <ul>
          <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">INFO@CORONA.COM</a></li>
          <li><i class="fa fa-phone" aria-hidden="true"></i>+212 63347800</li>  
          <li class="s-bar">
            <div class="search">
              <input class="search_box" type="checkbox" id="search_box">
              <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
              <div class="search_form">
                <form action="#" method="post">
                  <input type="search" name="Search" placeholder=" " required=" " />
                  <input type="submit" value="Search">
                </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  <div class="w3_navigation">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="navbar-header navbar-left">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <nav class="menu menu--iris">
            <ul class="nav navbar-nav menu__list">
              
              <li class="menu__item menu"><a href="http://10.42.0.207/home.php" class="menu__link scroll">Home</a></li>
              
              <li class="menu__item"><a href="http://10.42.0.207/température.php" class="menu__link scroll">température</a></li>
              
              <li class="menu__item menu"><a href="http://10.42.0.207/distance.php" class="menu__link scroll">distance</a></li>
              <li class="menu__item menu"><a href="http://10.42.0.207/buzzer.php" class="menu__link  scroll">Appel malade</a></li>
               <li class="menu__item menu__item--current"><a href="http://10.42.0.207/mouvement_resp.php" class="menu__link">movment respiratoire</a></li>
               
              <li class="menu__item"><a href="http://10.42.0.207/graphe.php" class="menu__link scroll">graphe</a></li>
              <li class="menu__item"><a href="https://www.who.int/fr/emergencies/diseases/novel-coronavirus-2019" class="menu__link scroll">info supp</a></li>
              
            </ul>
          </nav>
        </div>

    </div>
  </div>


  <div class="about-wthree" id="about">
      <div class="container">
           <div class="ab-w3l-spa">
                            <h3 class="title-w3-agileits title-black-wthree">détection des mouvements respiratoires </h3> loursq'il va dépasser 30sec sans mouvement ,une alarme va déclencher

               <p class="about-para-w3ls"></p>
               <img src="image/respiration.png" ><!--class="img-responsive" alt="Hair Salon"-->
                    <div class="w3l-slider-img">
                      <img src="image/bebe.png" class="img-responsive" alt="Hair Salon">
                    </div>
                                     
              </div>
    <?php
      
        exec("c-bin/pirsensor");
      
     ?>

     
  </body>
</html>
