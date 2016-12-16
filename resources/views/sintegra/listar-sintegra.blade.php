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
                <table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>CNPJ</th>
							<th>Usuario</th>
							<th>Resultado JSON</th>
							<th>Ação</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($sintegra as $value)
							<tr>
								<td>{{ $value->id }}</td>
								<td>{{ $value->cnpj }}</td>
								<td>{{ $value->usuario }}</td>
								<td>{{ $value->resultado_json }}</td>
								<td><a class="abreModalDeletarSintegra" data-id='{{ $value->id }}' href="#">Deletar</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>

            </div>
        </div>
    </div>
</div>

<script src="{{ url('js/sintegra/listar-sintegra.js') }}"></script>
		

	