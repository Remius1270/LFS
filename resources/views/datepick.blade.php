@extends('partials.header')

@section('content')

@if(isset($team))
<body>
  <table id="teams" class="display" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Date</th>
        <th>Hours</th>
        <th>Scrim</th>
      </tr>
    </thead>
    <tbody>
      <!-- warning time not set -->
      @foreach(explode(",",$team->disp_days) as $day)
        <tr>
          <td>{{$day}}</td>
          <td>Next available day -> {{date('d-m-Y',strtotime('next '.$day))}}</td>
          @if(Auth::user()->type == "manager")
            <td class='table-content'><a href='./{{$team->id}}/{{date('d-m-Y',strtotime('next '.$day))}}' class='btn btn-primary'>Scrim</a></td>
          @else
            <td>To scrim ask your manager</td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
@endif

@endsection

@extends('partials.footer')
