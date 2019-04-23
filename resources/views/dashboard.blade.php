@extends('template.template')

@section('title', 'Dashboard')

@section('content')
<div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
@endsection