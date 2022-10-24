<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        html {
            margin: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

        <div style="text-align: center">{!! DNS1D::getBarcodeHTML( $code , 'EAN13',2,49) !!}</div>
        <div style="text-align: center; font-size:9pt">{{ $code }}</div>


</body>
</html>
