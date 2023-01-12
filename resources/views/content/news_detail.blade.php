@extends('layouts.master')

@section('title', $detail->title)

@section('content')
<news-detail-component :news="{{$detail}}" :related="{{$related}}" :previous_news="{{$previous}}" :next_news="{{$next}}"/>
@endsection