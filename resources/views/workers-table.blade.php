<table class="table mt-4">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Function</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $el)
        <tr>
            <th scope="row">{{ $el->id }}</th>
            <td>{{ $el->first }}</td>
            <td>{{ $el->last }}</td>
            <td>{{ $el->function }}</td>
            <td>
                <i class="far fa-edit"></i>
                <i class="far fa-trash-alt"></i>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
