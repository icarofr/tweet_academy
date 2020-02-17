<?php 
session_start();
echo $_SESSION['id_user']; 
// echo $_SESSION['birthdate'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tweet@cademie!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="script.js"></script>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="my_feed.php">Tweet@!</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="my_feed.php">Home</a></li>
          <li><a href="#">Messages</a></li>
          <li><a href="#" onclick="switchTheme()">Theme</a></li>
        </ul>
        <form action="tweetQuery.php" class="navbar-form navbar-right" role="search" method="GET">
          <div class="form-group input-group">
            <input type="text" class="form-control" placeholder="Search.." name="search">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="editProfil.php"><img src="param.png" alt="" name="param" style="width: 30px;"/></a></li>
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container text-center">
    <div class="row">
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default text-left">
              <div class="panel-body">
              <form method ="post" id="comment_form">
                <textarea class="text_content" id="comment_content" contenteditable="true" name="tweet" placeholder="Votre tweet"></textarea>
                <button type="button" class="btn btn-default btn-sm">
                  <span class="glyphicon glyphicon-picture"></span> Photo
                </button>
                <button type="button" name="tweeter" style="float: right" class="btn btn-primary btn-sm">
                  <span class="glyphicon glyphicon-send"></span>
                  Tweet!
                </button>
              </form>
              </div>
            </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-sm-3">
            <div class="well">
              
              <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
            </div>
          </div>
          <div class="col-sm-9">
            <div class="well">
             
              <button class="btn"><span class="glyphicon glyphicon-thumbs-up"></button>
              <button class="btn"><span class="glyphicon glyphicon-retweet"></button>
            </div>
          </div>
        </div>
    <!--<div class="row">
           <div class="col-sm-3">
            <div class="well">
              <p>Bo</p>
              <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
            </div>
          </div>
          <div class="col-sm-9"> -->
            <!-- <div class="well">
              <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="well">
              <p>Jane</p>
              <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
            </div>
          </div>
          <div class="col-sm-9">
            <div class="well">
              <p>Just Forgot that I had to mention #something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="well">
              <p>Anja</p>
              <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
            </div>
          </div>
          <div class="col-sm-9">
            <div class="well">
              <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
            </div>
          </div>
        </div> -->
      </div>
      <div class="col-sm-2 well">
        <p>Trending this week:</p>
        <div class="thumbnail">
          <p><strong>#Bernie<wbr>OrBust</strong></p>
          <p>Thu. 20 February 2020</p>
          <button class="btn btn-primary">Tweet</button>
        </div>
        <div class="thumbnail">
          <p><strong>#Bojack<wbr>Finale</strong></p>
          <p>Sat. 22 February 2020</p>
          <button class="btn btn-primary">Tweet</button>
        </div>
        <div class="thumbnail">
          <p><strong>#WAC<wbr>Rocks</strong></p>
          <p>Sun. 23 February 2020</p>
          <button class="btn btn-primary">Tweet</button>
        </div>
      </div>
    </div>
  </div>
  <footer class="container-fluid text-center">
    <p><span class="glyphicon glyphicon-copyright-mark"></span> Copyright of W@C 2020. Suggestions and complaints <a href="Milton.jpg">here</a>.</p>
  </footer>
</body>

</html>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)