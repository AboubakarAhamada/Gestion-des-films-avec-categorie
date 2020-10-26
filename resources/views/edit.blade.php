@extends('template')

@section('content')

<div class="card">
    <div class="card-header">
        <p class="card-header-title">Modifier un film</p>
    </div>
    <div class="card-content">
        <div class="content">
            <form action="{{route('films.update',$film->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="field">
                    <label class="label">Titre</label>
                    <div class="control">
                        <input type="text" class="input @error('title') is-danger @enderror" 
                        name="title" id="title" value="{{old('title',$film->title)}}" placeholder="Titre du film">
                    </div>
                    @error('title')
                        <p class="help is-danger">{{$message}}</p> 
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Année de sortie</label>
                    <div class="control">
                    <input type="number" class="input" name="year" min="1900" max="{{date('Y')}}"
                    value="{{old('year',$film->year)}}">
                    </div>
                    @error('year')
                        <p class="help is-danger">{{$message}}</p> 
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                        <textarea class="textarea" name="description" placeholder="Description du film">
                            {{old('description',$film->description)}}
                        </textarea>
                    </div>
                    @error('description')
                        <p class="help is-danger">{{$message}}</p>   
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Enregistrer</button>
                        &nbsp;&nbsp;
                    <a href="{{route('films.index')}}" class="button is-default">Annuler</a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection