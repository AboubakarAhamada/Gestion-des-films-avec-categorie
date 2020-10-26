@extends('template')

@section('content')

<div class="card">
    <div class="card-header">
    <p class="card-header-title">{{$film->title}}</p>
    </div>
</div>
<div class="card-content">
    <div class="content">
    <p>Année de sortie : {{$film->year}}</p>
    <hr>
    <p>{{$film->description}}</p>
    </div>
</div>
<div class="field">
    <div class="control">
      &nbsp;&nbsp; &nbsp;
    <a href="{{route('films.index')}}" class="button is-primary">Retourner sur la liste</a>
    </div>
</div>
@endsection