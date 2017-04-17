@extends('app')

@section('content')
    @foreach($subscribers as $subscriber)
        {{var_dump($subscriber)}}
    @endforeach
@endsection