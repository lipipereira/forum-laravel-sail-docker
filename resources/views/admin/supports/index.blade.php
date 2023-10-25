<h1>Listagem dos supports</h1>

<a href="{{ route('supports.create')}}">Nova duvida?</a>

<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th></th>
        <th>descrição</th>
    </thead>
    <tbody>
        @foreach($supports as $support)
            <tr>
                <td>{{$support['subject']}}</td>
                <td>{{$support['status']}}</td>
                <td>{{$support['body']}}</td>
                <td>
                    <a href="{{ route('supports.show',$support['id'])}}"> Detalhes </a>
                </td>
                <td>
                    <a href="{{ route('supports.edit',$support['id'])}}"> Editar </a>
                </td>
                <td>
                    <form action="{{route('supports.destroy',$support['id'])}}" method="POST">
                        @method('DELETE');
                        @csrf()
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>