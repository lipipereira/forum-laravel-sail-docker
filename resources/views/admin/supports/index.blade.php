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
        @foreach($supports->items() as $support)
            <tr>
                <td>{{$support->subject}}</td>
                <td>{{$support->status}}</td>
                <td>{{$support->body}}</td>
                <td>
                    <a href="{{ route('supports.show',$support->id)}}"> Detalhes </a>
                    <a href="{{ route('supports.edit',$support->id)}}"> Editar </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination
    :paginator="$supports"
    :appends="$filters"/>
