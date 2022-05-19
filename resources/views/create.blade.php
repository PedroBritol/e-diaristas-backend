@extends('app')

@section('title', 'Criar Diarista')
    
@section('conteudo')

<h1>Criar Diaristas</h1>
            
        <form action="{{route('diaristas.store')}}" method="POST" enctype="multipart/form-data">

            @include('_form')

        </form>

@endsection