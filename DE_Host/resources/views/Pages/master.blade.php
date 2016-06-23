<!DOCTYPE html>
<html>
  <head>
    <title>DE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('scripts_stylesheets')	
  </head>
  <body>
    <div class="appcontainer">
      <div class="leftmenu animated slideInLeft">  
        <div class="profileIMG"><img src="/assets/user/profile.png" id="userprofile">
          <div class="nameholder">Max Diamegio</div>
        </div>
        <div class="navMenu">
          <a href="{!! url('/userprofile') !!}">
            <div id="profile" class="userProfile {{$userprofile}}">
              <div class="icon">
                <img src="/assets/logo/profileicon.svg">
              </div>
              <div class="description">
                <p>User Profile</p>
              </div>
            </div>
          </a>
          <a href="{!! url('/footweardata') !!}">
            <div id="footwear" class="footwearData {{$footweardata}}">
              <div class="icon"><img src="/assets/logo/footwearicon.svg"></div>
              <div class="description">
                <p>Footwear Data</p>
              </div>
            </div>
          </a>
          <a href="{!! url('/datamenu') !!}">
            <div id="dataD3" class="dataAnalysis {{$dataanalysis}}">
              <div class="icon"><img src="/assets/logo/dataicon.svg"></div>
              <div class="description">
                <p>Data Analysis</p>
              </div>
            </div>
          </a>
          <a href="{!! url('/modelling') !!}">
            <div id="model3D" class="modelling {{$modelling}}">
              <div class="icon"><img src="/assets/logo/modelicon.svg"></div>
              <div class="description">
                <p>Modelling</p>
              </div>
            </div>
          </a>
          <a href="{!! url('/message') !!}">
            <div class="messagesection {{$message}}" id="message">
              <div class="icon">
                <img src="/assets/logo/pdficon.svg">
              </div>
              <div class="description">
                <p>Message</p>
              </div>
            </div>
          </a>

          <a href="{!! url('/logout') !!}">
            <div class="logoutsection {{$logout}}" id="logout">
              <div class="icon">
                <img src="/assets/logo/logout.svg">
              </div>
              <div class="description">
                <p>Logout</p>
              </div>
            </div>
          </a>

        </div>
      </div>
      <div class="contentpoll animated slideInUp">
        @yield('content')				   			  	
      </div>
    </div>
  </body>
</html>