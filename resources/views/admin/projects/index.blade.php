@extends('layouts.admin')

@section('content')
    <h1>Elenco progetti</h1>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td >{{ $project->title }}</td>
                    <td><a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {{ $projects->links() }}
@endsection
