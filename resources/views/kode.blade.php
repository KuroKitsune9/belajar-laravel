<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if($a && $b)
        Barang : {{ $a }}
        Kode Promo : {{ $b }}
    @elseif($a)
        Barang : {{ $a }}
    @else
        Semua barang Promo
    @endif
</body>

</html>