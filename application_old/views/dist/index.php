<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">

    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/chat/styles/4c6e2083.main.css">
    <script src="<?php echo base_url();?>assets/chat/scripts/vendor/f7f27360.modernizr.js"></script>

    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "b6e7a490-0eea-4599-b7e8-4ba158f1367a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
  </head>
  <body>
    
    <!-- Navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <div class="nav pull-right">
            <b class="logo"><span>Gfinch Technologies</span></b>
          </div>
        </div>
      </div>
    </div>

    <div class="page active" id="page-login">
      <div class="row-fluid banner">
        <div class="container">
          <div class="span12">
            <h2>Pain Clinic Group</h2>
            <h4>This is vedio chat area of pain clinic group....</h4>
            </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row-fluid" id="login-container">
          <div class="span4 offset4">
            <div class="pad-20 center">
              <div class="box">
                <h3>Login Now</h3>
                <input type="text" id="userid" placeholder="Username">
                <br>
                <a href="#" class="btn btn-large btn-inverse" id="login">Log In</a>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>

    <div id="page-caller" class="page">
      <div class="row-fluid">
        <div class="span3 sidebar">
          <h3>Online Contacts</h3>
          <ul id="user-list">
          </ul>
        </div>

        <div class="span9 call-content">
          <div class="row">
            <div class="span12" id="video-container">
              <div class="row" id="video">
                <div class="span12">
                  <video id="self-call-video" src="" autoplay="autoplay" muted="true"></video>
                  <video id="call-video" src="" autoplay="autoplay"></video>
                </div>
              </div>

              <div class="row">
                <div class="span12" id="video-controls">
                  <a href="#" class="btn btn-danger" id="hang-up">Hang Up</a>
                  <span id="time">10:00</span>
                </div>
              </div>

              <div class="row">
                <div class="span12" id="chat-area">
                  <div id="chat-receive-message">
                    Hello, World!
                  </div>
                  <input type="text" id="chat-message" name="message" placeholder="Type to chat">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="answer-modal" class="modal hide">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Incoming Call</h3>
      </div>
      <div class="modal-body">
        <p class="caller">(User) is calling...</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Ignore</button>
        <button class="btn btn-primary">Answer</button>
      </div>
    </div>

    <div id="calling-modal" class="modal hide">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Outgoing Call</h3>
      </div>
      <div class="modal-body">
        <p class="calling">Calling (User)...</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
    </div>

    <script type="text/html" id="user-item-template">
      <li class="user" data-user="<%= id %>">
      <span class="name"><%= name %></span>
      <a href="#" class="btn btn-success" data-user="<%= id %>">Call</a>
      </li>
    </script>

    <script src="<?php echo base_url();?>assets/chat/scripts/5944680d.vendor.js"></script>

    <script src="<?php echo base_url();?>assets/chat/scripts/2ab4bd38.main.js"></script>

    <script src="<?php echo base_url();?>assets/chat/scripts/5c9d2c71.plugins.js"></script>
<!-- PNsEYLaXjMvSUF6uLeshhGMgoQddsl0UruzpWEGeQk6M8GMn2 -->
    <script>
      (function(){
        prettyPrint();
      })();
    </script>


    <script type="text/javascript">
      (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/client:plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
        </script>
      </body>
    </html>