
@include('includes/head')

<body>
<div class="header">
     <div class="container">
        <div class="row">
           <div class="col-md-12">
              <!-- Logo -->
              <div class="logo">
                 <h1><a href="/">Sintegra Test</a></h1>
              </div>
           </div>

        </div>
     </div>
</div>

<div class="row">
<div class="col-md-12">
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Registrar</div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">

                <form method="POST" action="registrar">
                    <fieldset>
                        <div class="form-group">
                            <label>Usuario</label>
                            <input name="usuario" class="form-control" placeholder="Usuario" type="text">
                        </div>

                        <div class="form-group">
                            <label>Senha</label>
                            <input  name="password" class="form-control" placeholder="Password" type="password">
                        </div>

                        <div class="form-group">
                            <label>Confirmar Senha</label>
                            <input name="password_confirmation" class="form-control" placeholder="Password" type="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </fieldset>
 
                </form>


            </div>
        </div>
    </div>
</div>

