<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

            <div class="content">
                <div class="title m-b-md">
                    Tracked stocks Form Page
                </div>
        <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Tracked stocks</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                        

                            <div id="msg"  class="alert alert-success">
                                    <strong>Success!</strong> Indicates a successful or positive action.
                                  </div>
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="trakingcode" class="form-horizontal" role="form" method="get" >
                             <input type="hidden" name="_token" value="{{ csrf_token() }}" />        
                           <!-- <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                    </div>--->
                                
                                     <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="tracked_code" type="text" class="form-control" name="tracked_code" placeholder="Tracked Code">
                                        
                                    </div>
                                    <div id="tracked_err" class="alert alert-warning" ></div>
                                    
                                 
                                <div style="margin-top:25px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <a id="btn-traking" href="#" > <button type="button" class="btn btn-success">Submit </button> </a>
                                      

                                    </div>
                                </div>
                                  
                            </form>     

                        </div>                     
                    </div>  
                </div>
        
            </div>
    
            </div>
        </div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>

$(function() {
 document.getElementById("msg").style.display = "none";
 document.getElementById("tracked_err").style.display = "none";
$("a#btn-traking").click(function(event) {
   
    event.preventDefault();
    if(document.getElementById("tracked_code").value=="") 
    {
    document.getElementById("tracked_err").style.display = "inline";
    document.getElementById("tracked_err").innerHTML="Please enter  Traking code";
    return false;
      }
    else{
    document.getElementById("tracked_err").style.display = "none";

    var sumit = $('#trakingcode').serialize();
        alert(sumit);
    $.ajax({
    url : "/trakingcode-info/", // the endpoint
    type : "GET", // http method
    data : $('#trakingcode').serialize(), // data sent with the post request
    
    cache: false,
    // handle a successful response
        success: function( response ) {
              
              document.getElementById("msg").style.display = "block";

             setTimeout(function() {
              window.location.reload(true);
            }, 4000);
            
           }
    
        });

        }
    });

 });

</script>


    </body>
</html>
