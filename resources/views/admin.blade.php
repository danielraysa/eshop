@extends('layouts.admin', ['title_page' => 'Dashboard'])
@push('js')
    <script>
    function showTime(){
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        
        var time = h + ":" + m + ":" + s ;
        // document.getElementById("MyClockDisplay").innerText = time;
        // document.getElementById("MyClockDisplay").textContent = time;
        $('#clock').text(time);
        
        setTimeout(showTime, 1000);
        
    }

    showTime();
    </script>
@endpush
@section('content')
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <div class="text-center">
        <div id="clock"></div>
    </div>
@endsection