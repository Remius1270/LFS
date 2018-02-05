@extends('partials.header')

@section('content')

@if(isset($teams))
<body>
  @if(isset($scrim) && $scrim == 'true')
    <p>scrim saved</p>
  @elseif(isset($scrim) && $scrim != 'true')
    <p>error occured during scrim request</p>
  @endif
  <table id="teams" class="display" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Logo</th>
        <th>Name</th>
        <th>Elo</th>
        <th>Jours</th>
        <th>Heures</th>
        <th>Scrim</th>
      </tr>
    </thead>
    <tbody>
      @foreach($teams as $team)
      <tr>
        @if(!empty($team->logo_url))
        <td class='table-content'><img src='{{$team->logo_url}}' width='70px'></td>
        @else
        <td class='table-content'><img src='http://www.geekgirlauthority.com/wp-content/uploads/2016/08/mercy-theatrical-wide.jpg' width='70px'></td>
        @endif
        <td class='table-content'>{{$team->name}}</td>
        <td class='table-content'>{{$team->elo}}</td>
        <td class='table-content'>
          @foreach( explode(",",$team->disp_days) as $day)
            <button class='btn btn-outline-primary'>
              {{$day}}
            </button>
          @endforeach
        </td>
        <td class='table-content'>
          @foreach( explode(",",$team->disp_hours) as $hour )
            <button class='btn btn-outline-primary'>
              {{$hour}}
            </button>
          @endforeach
        </td>
        <td class='table-content'><a href='./datepick/{{$team->id}}' class='btn btn-primary'>Scrim</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
@endif
@endsection

@extends('partials.footer')
