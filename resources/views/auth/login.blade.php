<!DOCTYPE html>
<html>
  <head>
    <title>Sintegra Test Log-In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">

    <div class="page-content container" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4 ">
                <div class="login-wrapper">
                    <div class="box">
                        <div class="content-wrap">
                            <h6>Seja bem vindo, Sintegra Test</h6>
                          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                <input name="username" class="form-control" type="text" placeholder="Login">
                                <input name="password" class="form-control" type="password" placeholder="Senha">
                                <div class="action">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary">Login</a>
                                </div>     
                          </form>           
                        </div>
                    </div>              
                    <div class="col-md-4 col-md-offset-4 ">
                        <h4><a href="registrar">Clique aqui para registrar</a></h4>         
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>