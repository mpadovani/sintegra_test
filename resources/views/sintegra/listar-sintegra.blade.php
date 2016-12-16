@include('includes/head')
@include('includes/top')
@include('includes/menu')

@include('includes/confirmModal')

<div class="col-md-10">
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Buscar</div>
        </div>
        <div class="panel-body">
	        <div class="col-md-12">
	        	@include('sintegra/tabelaSintegra')
            </div>
        </div>
    </div>
</div>

<script src="{{ url('js/sintegra/listar-sintegra.js') }}"></script>
		

	