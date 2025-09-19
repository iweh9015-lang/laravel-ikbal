<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<fieldset>

<center>
    <h3>Kelulusan Siswa</h3>  
</center>
    <b>
    Nama : {{$a}} <br>
    Mata Pelajaran : {{$b}} <br>
    Nilai : {{$c}} <br>

    @if ($a >= 75)
        Keterangan : Lulus

    @else
        Keterangan : Tidak Lulus
    @endif

    </b>
    </fieldset>
</body>
</html>