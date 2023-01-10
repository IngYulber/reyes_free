@extends('layouts.master')

@section('title', 'Noticias')

@section('content')
    <news-component :recent="{{$recent}}"/>
@endsection
