<?php 
   session_start();
   if(!isset($_SESSION['User']))
    {
        header('location:index.php');exit();
    }
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>:: HR Management ::</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="css/text_select_button.css"> 
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    

      <link href="../css/font-awesome.css" rel="stylesheet"> 
      <link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />

<link rel="stylesheet" type="text/css" href="../dp/jquery.datetimepicker.css"/>
<script src="../dp/jquery.datetimepicker.full.js"></script>
<?php date_default_timezone_set("Asia/Kolkata"); ?>

      <!--Image Popup-->
<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 20%;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 70%;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
<!-- End image popup -->

      
   </head>
   <body class="size-1140">
      <!-- TOP NAV WITH LOGO -->
      <header>
         <nav>
            <div class="line">
               <div class="s-12 l-5">
                  <h1 style="color: white;">HR <lable style="color: #808B96; font-size: 50%">Management</lable></h1>
               </div>
               <div class="top-nav s-12 l-3 right">
                  <div class="employee-name" style="margin-top: 13%;">
                     <a style="color: white;">User <font color="#808B96">:</font> <?php echo ucfirst($_SESSION['User']['FirstName'])."&nbsp;".ucfirst($_SESSION['User']['LastName']); ?></a> |
                     <a href="../controller/logout.php" style="text-align: right;"> Logout </a>
                  </div>
                                    <!-- <span class="prfil-img">
                                    <img src="image/<?php //echo $_SESSION['User']['ImageName']?>" alt=""> </span> 
                                    <div class="user-name">
                                       <p>Nitin<?php //echo $_SESSION['User']['FirstName']."&nbsp;".$_SESSION['User']['LastName']; ?></p>
                                       <span> niiiii<?php //echo $_SESSION['role']['Name']; ?></span>
                                    </div>
                                    <i class="fa fa-angle-down"></i>
                                    <i class="fa fa-angle-up"></i>
                                    <div class="clearfix"></div>   -->
                                
                  <!-- <p class="nav-text">Custom menu text</p> -->
                  <!-- <ul class="right">
                     <li><a>Home</a></li>
                     <li>
                        <a>Product</a>
                        <ul>
                           <li><a>Product 1</a></li>
                           <li><a>Product 2</a></li>
                           <li>
                              <a>Product 3</a>
                              <ul>
                                 <li><a>Product 3-1</a></li>
                                 <li><a>Product 3-2</a></li>
                                 <li><a>Product 3-3</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a>Company</a>
                        <ul>
                           <li><a>About</a></li>
                           <li><a>Location</a></li>
                        </ul>
                     </li>
                     <li><a>Contact</a></li>
                  </ul> -->
               </div>
            </div>
         </nav>
      </header>
      <!-- ASIDE NAV AND CONTENT -->
      <div class="line">
         <div class="box  margin-bottom">
            <div class="margin">
               <!-- ASIDE NAV 1 -->
               <aside class="s-12 l-2">
                  <div class="aside-nav">
                     <ul>
                        <li><a href="home.php" title="Home">Home</a></li>
                        <li><a href="profile.php" title="Profile">Profile</a></li>
                        <li>
                           <a title="Leave">Leave</a>
                           <ul>
                              <li><a href="applyleave.php">Apply Leave</a></li>
                              <li><a href="leavestatus.php">Status Leave</a></li>
                              <!-- <li>
                                 <a>Product 3</a>
                                 <ul>
                                    <li><a>Product 3-1</a></li>
                                    <li><a>Product 3-2</a></li>
                                    <li><a>Product 3-3</a></li>
                                 </ul>
                              </li> -->
                           </ul>
                        </li>
                        <li>
                           <a>Company</a>
                           <ul>
                              <li><a>About</a></li>
                              <li><a>Location</a></li>
                           </ul>
                        </li>
                        <li><a href="changepassword.php" title="Change Password">Password</a></li>
                        <li><a href="contact.php" title="Contact">Contact Us</a></li>
                     </ul>
                  </div>
               </aside>
               <!-- CONTENT -->