@extends('partials.htmlheaders')

@extends('partials.header')

@section('content')
  @if(isset($teams))
    @foreach($teams as $team)
      <p>{{$team->name}}</p>
      <p>{{$team->description}}</p>
    @endforeach
  @endif
@endsection

@extends('partials.footer')
