@extends('partials.header')

@section('section')
  @if(isset($teams))
    @foreach($teams as $team)
      <p>{{$team->name}}</p>
  @endif
@endsection
