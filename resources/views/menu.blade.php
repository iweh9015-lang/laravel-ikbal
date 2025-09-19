<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misterius</title>
</head>
<body>
    <fieldset>
    <center><h1>{{$resto}}</h1></center>
    @foreach  ($data as $makanan)
        Nama : {{$makanan['nama_makanan']}} <br>
        Harga : {{$makanan['harga']}} <br>
        jumlah : {{$makanan['jumlah']}} <br>
        @php $total =  $makanan['jumlah'] * $makanan['harga'] @endphp
        Total: {{$total}} <br>
        <hr>
    @endforeach
    </fieldset>
    <a href="/">Kembali ke menu utama</a>
</body>
</html>