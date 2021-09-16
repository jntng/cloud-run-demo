@extends('layout')

@section('content')

    <example-component :aaa="{{ json_encode($coins) }}"></example-component>
{{--@foreach( $coins as $coin )--}}
{{--<div class="">時間{{  $coin['time'] ?? '' }}</div>--}}
{{--<div class="">最低價格{{  $coin['celling_price_24H'] ?? '' }}</div>--}}
{{--<br>--}}
{{--@endforeach--}}

@endsection
