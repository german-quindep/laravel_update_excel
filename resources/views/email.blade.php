<table class="table table-hover">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Secuencial</th>
            <th scope="col">Codigo</th>
            <th scope="col">Bodega</th>
            <th scope="col">Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach (session('products') as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->secuencial }}</td>
                <td>{{ $item->codigo }}</td>
                <td>{{ $item->bodega }}</td>
                <td>{{ $item->cantidad }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
    <h5 class="text-center py-3">Desea enviar este reporte al email?</h5>
    <a href="{{ route('sendEmail') }}" class="btn btn-outline-primary">✉️ Enviar Email</a>
</div>
