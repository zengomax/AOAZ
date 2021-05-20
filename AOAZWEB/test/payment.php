<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//esto copiarlo en todas las de usuario.
if(!isset($_SESSION["rol"])||$_SESSION["rol"]== null||$_SESSION["rol"]!= 'usuario'){
  echo "<html> <marquee><h1>You don't have permission to load this page.<h1></marquee><html>";
  die();
}
 ?>





   

<html xmlns="&lt;a href='https://www.w3.org/1999/xhtml">
  <head>
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
      body {
        margin: 0;
        font: 12px/16px Arial, sans-serif;
        background: #FFB133;
      }
      .navbar-customclass .navbar-nav .nav-link{
            color:#ff8c00;
          }
      a {
        text-decoration: none;
        color: #006699;
        font: 14px/16px Arial, sans-serif;
      }
      a img {
        border: 0;
      }
     
      p {
        margin: 1px 0 8px 0;
        font: 12px/16px Arial, sans-serif;
      }
      table {
        border-collapse: collapse;
      }
      td {
        vertical-align: top;
        font-size: 13px;
        line-height: 18px;
        font-family: Arial, sans-serif
      }
  
      #container {
        width: 500px;
        color: #333;
        margin: 0 auto;
      }
     
      #main,
      #header,
      #customerSuggestions,
      #summary,
      #orderDetails,
      #itemDetails,
      #selfService,
      #closing,
      #marketingContent,
      #legalCopy,
      #multOrder,
      #warranty,
      #criticalInfo,
      #orderDetailsHeader {
        width: 500px;
      }
      
  
      #header {
        border-bottom: 1px solid #eaeaea;
        padding-top: 10px;
        padding-left: 0px;
        padding-right: 0px;
        padding-bottom: 10px;
      }
     
      
      #title p {
        font-size: 20px;
        font-family: "arial", "sans-serif";
      }
      #AOAZLogo {
        width: 100px;
        height: 100px;
      }
   
      #greetingSummary {
        width: 100%;
        padding: 0 0 0 0;
        font-size: 14px;
      }
      #greetingSummary .greeting {
        font-size: 18px;
        line-height: 30px;
        color: #cc6600;
      }
      
 
      #criticalInfo {
        border-top: 3px solid #cbcfd4;
        width: 95%;
      }
      #criticalInfo td {
        font-size: 14px;
      }
      #criticalInfo .detailsContent {
        background-color: #efefef;
      }
      
      #criticalInfo p {
        font: 14px Arial, sans-serif;
      }
      #criticalInfo span {
        font-size: 14px;
        color: #666;
      }
      #criticalInfo a {
        text-decoration: none;
        color: #006699;
        font: 14px Arial, sans-serif;
      }
    

  
      #criticalInfo .footer {
        background-color: rgb(256, 256, 256);
        padding: 10px 0px 0px 0px;
      }
      .footer p {
        font: 11px/ 16px Arial, sans-serif;
        color: rgb(51, 51, 51);
      }
      
    
      #costBreakdown {
        width: 50%;
      }
      #costBreakdown td {
        text-align: right;
        line-height: 18px;
        padding: 0 10px 0 0;
      }
      #costBreakdown td td {
        padding-right: unset !important;
      }
     
      #costBreakdown .price {
        font-size: 12px;
        white-space: nowrap;
     
      }
      #costBreakdown .text {
        font-size: 12px;
        text-align: left;
        white-space: nowrap;

      }
      #costBreakdown .total {
        font-size: 14px;
        text-align: left;
        font-weight: bold;
      }
      #costBreakdown #costBreakdownRight {
        width: 100%;
        text-align: right;
        line-height: 18px;
        padding: 0 10px 0 0;
      }
      #costBreakdown #costBreakdownLeft {
        width: 100%;
        text-align: right;
        line-height: 18px;
        padding: 0 10px 0 0;
      }

      #closing {
        padding: 10px 20px 10px 0;
        border-collapse: none;
        border-bottom: 1px solid #eaeaea;
      }
      #closing p {
        margin: 0;
        font-size: 14px;
        padding-bottom: 5px;
      }
      #closing .signature {
        font-size: 14px;
        font-weight: bold;
      }
     
    
      #legalCopy {
        padding-top: 9px;
        margin: 0 0 0 0;
      }
      #legalCopy p {
        font-size: 10px;
        color: #666;
        line-height: 16px;
        padding: 0 0 0px 0px;
        font: 10px;
      }
      #legalCopy a {
        font-size: 10px;
        font: 10px;
      }
      
      .buttonComponent {
        border-collapse: separate;
        text-decoration: none !important;
        line-height: 47px;
        border-radius: 3px;
        border-style: solid;
        border-color: #CBA957;
        border-width: 1px;
        background: #F0C354 linear-gradient(#F7DEA2, #F0C354) repeat scroll 0% 0%;
        background-color: #ffa723;
        white-space: nowrap;
        min-width: 222px;
        min-height: 47px;
      }
      .buttonComponentLink {
        color: rgb(27, 27, 27) !important;
        font: 16px/ 18px Arial, sans-serif !important;
        display: table-cell;
        margin: auto 0;
        vertical-align: middle;
        min-width: 222px;
        height: 47px;
      }
      #datos{

        width:275px;

      }
      
    
    
    </style>
    <style type="text/css" media="print" >
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    #noprint{
        display:none;
      }
    </style>
   
    <title></title>
  </head>
  <body>
    <?php 
    include ("conexion.php");
    $conexion=connectDataBase();



    $dni=$_SESSION['dni'];  
   
   

   

?>


<div  id="noprint">
    <img src="img/banner2.png" width=100% height=35% ></img>
      <nav class="navbar navbar-expand-md navbar-customclass bg-dark ">
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav ">
            <li class="nav-item">
              <a href="indexmember.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="reserva.php" class="nav-link">Make a booking</a>
            </li>
            
          </ul>
          
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo "&nbsp;&nbsp;<img class='rounded-circle' width=50px height=50px; src=".$_SESSION['imagen'].">"?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" >
                
                <a class="dropdown-item" id="profile" href="profile.php">Edit Profile</a>
                <a class="dropdown-item" href="debts.php">Debts</a>
                <a class="dropdown-item" href="managebooking.php">Reservations</a>
                <div style="border-color:#999691" class="dropdown-divider"></div>
                <a class="dropdown-item" id="close" href="logout.php">Log Out &nbsp; <img src="img/exit.png" style="width:20px;height: 17px" /></a>
              </div>
            </li>   
          </ul>
          
          
        </div>
      </nav>
  </div>

  <br/>
  <br/>
<div class="container" style="background-color: white; width:650px">
  

    <table id="container">
      <tbody>
        <tr>
          <td class="frame"><br /><br />
            <table id="main">
              <tbody>
                <tr>
                  <td id="header">
                    <table cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td width="250" id="logo"> <a href="indexmember.php" title="Visit erlete.com"><img id="AOAZLogo"  src="img/ico.png" /></a> </td>
                          <td width="250" id="title" valign="top" align="right" padding-left="10">
                            <p>
                              <font size="4"> Pay Confirmation</font>
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td id="greetingSummary">
                    <p> </p>
                    <div class="greeting">
                      Hello <?php echo $_SESSION['nombre']." ".$_SESSION['apellido'] ?>,
                    </div><br /> Thank you for staying with us.  <p></p>
                  </td>
                </tr>
                <tr>
                  <td style="padding:10px 0 0 0;">
                    <p style="font:18px Arial, sans-serif; color: rgb(204, 102, 0); border-bottom:1px solid #eaeaea;"> Details </p>
                    
                  </td>
                </tr>
                <tr>
                  <td>
                    <table style="width:100%;" id="criticalInfo">
                      <tbody>
                        <tr class="detailsContent">
                          <td style="padding: 11px 40px 20px 18px;">
                            <p> <span>Description:</span> <br /> <b>
                                <div id="datos">
                                  Reason:<br>
                                  <?php echo $_SESSION['motivodeuda'];  ?><br>
                                  Quantity:<?php echo " ".$_SESSION['eurodeuda']."€";  ?><br>


                                </div> 
                              </b> </p> <br />
                           
                          </td>
                          <td style="padding:11px 0px 20px 18px;">
                           <img src="img/success.png" style="width:140px;height: 140px" >
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" class="footer">
                            <p style="font: 11px/ 16px Arial, sans-serif; color: rgb(51, 51, 51);"> </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <table id="container">
      <tbody>
        <tr>
          <td id="closing">
            <p style="font: 16px/ 16px Arial, sans-serif;"> We hope to see you again soon. <p>
          
               
              <b id="noprint">PRINT RECEIPT</b> &nbsp;<img id="noprint"src="img/printer.png"  onclick="window.print();return false;" style="width:20px;height: 17px; " />
        
              <br /><br /> <span class="signature">Erlete.com</span> </p>
          </td>
        </tr>
        
        <tr>
          <td id="legalCopy">
            <p> The payment for your invoice is processed by Erlete Payments, Uni- Eibar. If you need more information,  </p>
            <p> By placing your order, you agree to Erlete.com’s. Privacy Notice and  Conditions of Use . Unless otherwise noted, items sold by Erlete.com are subject to sales tax in select states in accordance with the applicable laws of that state. If your order contains one or more items from a seller other than Erlete.com, it may be subject to state and local sales tax, depending upon the seller's business policies and the location of their operations. Learn more about tax and seller information. </p>
            <p>This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.</p>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <br>
  <br>
    </body>
</html>
