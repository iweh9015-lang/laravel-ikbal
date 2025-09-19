<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <fieldset disabled="disabled">
       <b>
           @foreach ($data as $a)
           Nama : {{ $a['nama'] }} <br>
           Nilai : {{ $a['nilai'] }} <br>
           @endforeach
           @php
           $rata_rata = $a['nilai'] + $a['nilai'] + $a['nilai'];
           $rata = $rata_rata / 3;
           @endphp
           Nilai Rata-Rata : {{ $rata_rata }}
           <br>
           @if($rata_rata > 75)
           Status : Kelas Lulus
           @elseif($rata_rata < 75) Status : Kelas Remedial
            @else Status Tidak Ada 
            @endif </b>
   </fieldset>

</body>
</html>