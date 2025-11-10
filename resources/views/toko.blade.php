<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>{{$toko}}</h1>
    </center>
    @foreach ($data as $toko)
    Nama : {{$toko['nama_barang']}} <br>
    Harga : {{$toko['harga']}} <br>
    jumlah : {{$toko['jumlah']}} <br>
    @php $total = $toko['jumlah'] * $toko['harga'] @endphp
    Total: {{$total}} <br>
    <hr>
    @endforeach

</body>
</html>