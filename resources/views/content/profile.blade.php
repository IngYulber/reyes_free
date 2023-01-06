@extends('layouts.master')
@section('title', ucfirst(Auth::user()->username))
@section('content')
    <profile-component :user="{{$user}}"/>
@endsection
