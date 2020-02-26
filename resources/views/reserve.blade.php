@extends('welcome')

@section('content')
<body>
<!-- <div class="inputForm">
<center>
  Name *: <input type="text" id="Username" required>
  Number of Seats *: <input type="number" id="Numseats" required>
  <br/><br/>
  <button onclick="takeData()">Start Selecting</button>
</center>
</div> -->
  

<div class="seatStructure">
<center>
  
<table id="seatsBlock">
 <p id="notification"></p>
  <tr>
    <td colspan="14"><div class="screen">SCREEN</div></td>
    <br/>
  </tr>
  @if($mappedSeats)
    @if($letters)
        <tr>
        <td> </td>
        @foreach($letters as $letter)
          <td style="">{{$letter}}</td>
        @endforeach
        </tr>
    @endif
    @foreach($mappedSeats as $row => $seats)

      <tr>
      <td>{{$row}}</td>
      @foreach($seats as $seat)
        @if(in_array($seat, $reservedSeats))
        <td><div class="smallBox redBox"></div></td>
        @else
        <td style="width:30px"><input type="checkbox" class="greenBox" value="{{$seat}}"></td>
        @endif
      @endforeach
      </tr>
    @endforeach
  @endif
  
</table>
  
<br/><button onclick="reserve({{$screeningId}})">Confirm Selection</button>
</center>
</div>
<script src="{{ asset('js/reserve.js')}}">
</script>
<br/><br/>
@endsection