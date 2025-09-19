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
        <h3>Grading Nilai</h3>
    </center>
    <b>
    Nama : {{$a}} <br>
    Nilai : {{$b}} <br>
    Grade : 
    @if ($b >= 90)
    keterangan : Grade A
    @elseif ($b >= 80)
      Keterangan : Grade B       
    @elseif ($b >= 70)
      Ketarengan : Grade C
    @elseif ($b >= 60)
      Keterangan : Grade D   
    @else
      Keterangan : Grade E
    @endif
    </b>
    </fieldset>

</body>
</html>