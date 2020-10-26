@extends('template')

@section('content')

@if (session()->has('info'))
<div class="notification is-success">
    {{session('info')}}
</div>
    
@endif
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Films</p>
        <div class="select">
            <select onchange="window.location.href = this.value">
                <option value="{{ route('films.index') }}" @unless($slug) selected @endunless>Toutes catégories</option>
                @foreach($categories as $category)
                    <option value="{{ route('films.category', $category->slug) }}" {{ $slug == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        &nbsp;&nbsp;
        <a class="button is-info" href="{{ route('films.create') }}">Créer un film</a>
    </header>
    
    <div class="card-content">
        <div class="content">
        <table class="table is-hoverable">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr>
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
            <!--Il faut regler la pagination -->
            {{$films->links()}}
        </footer>
    </div>
    
    </div>
</div>

@endsection