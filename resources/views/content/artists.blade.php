@extends('layouts.master')

@section('title', 'Artistas')

@section('content')

<artist-component :artists="{{$artists}}"/>
@endsection