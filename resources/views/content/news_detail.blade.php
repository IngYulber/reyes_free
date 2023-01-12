@extends('layouts.master')

@section('title', $detail->title)

@section('content')
<news-detail-component :news="{{$detail}}"/>
@endsection