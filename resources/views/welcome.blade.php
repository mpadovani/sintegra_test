@include('includes/head')
@include('includes/top')
@include('includes/menu')


<div class="col-md-10">
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Buscar</div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="input-group form">
                    <input id="cnpj" type="text" class="form-control" placeholder="CNPJ...">
                    <span class="input-group-btn">
                        <button id="buscarAPI" class="btn btn-primary" type="button">Buscar</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="content-box-large" id="sintegraAPI" style="display: none;">
        <div class="panel-heading">
            <div class="panel-title">Sintegra API</div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">

                <span id="message"></span>

                <span id="json"></span>

            </div>
        </div>
    </div>


</div>

<script src="{{ url('js/sintegra/sintegra.js') }}"></script>
