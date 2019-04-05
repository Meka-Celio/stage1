@extends('template.template')

@foreach($projet as $pro)
@section('title', $pro->projetName)
@foreach($rubrique as $rub)
@section('content')

@endsection
@endforeach
@endforeach