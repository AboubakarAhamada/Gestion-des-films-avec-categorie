@extends('template')

@section('content')

@if (session()->has('info'))
<div class="notification is-success">
    {{session('info')}}
</div>
    
@endif
<div class="card">
    <div class="card-header">
     <p class="card-header-title">Films</p>
    <a class="button is-info" href="{{route('films.create')}}">Créer un film</a>
    </div>
    <div class="card-content">
        <div class="content">
        <table class="table is-hoverable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr>
                        <td>{{$film->id}}</td>
                        <td><strong>{{$film->title}}</strong></td>
                        <td> <a class="button is-primary" 
                            href="{{route('films.show',$film->id)}}">Voir</a> 
                        </td>
                        <td><a class="button is-warning" 
                        href="{{route('films.edit',$film->id)}}">Modifier</a>
                        </td>
                    <td> <form action="{{route('films.destroy',$film->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="button is-danger">Supprimer</button>
                    </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div>
        <footer class="card-footer">
            {{--$films->links()}--}
        </footer>
    </div>
    
    </div>
</div>

@endsection