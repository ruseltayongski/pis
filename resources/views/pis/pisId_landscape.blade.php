<html>
<head>
    <style type="text/css">
        html{
            margin-top:15%;
            margin-bottom: 15%;
            margin-right: 15.9%;
            margin-left: 14%;
        }
        .id_template
        {
            z-index:-1;
            position: absolute;
            width: 790px;
            height: 500px;
        }
        .picture1
        {
            position:absolute;
            left:25.7%;
            top:14.5%;
            z-index:-1;
            width: 22.3%;
            height: 178px;
        }
        .picture2
        {
            position:absolute;
            right:1.9%;
            top:14.5%;
            z-index:-1;
            width: 22%;
            height: 178px;
        }
        .signature1
        {
            position:absolute;
            left:25.7%;
            top:47.5%;
            z-index:-1;
            width: 174px;
            height: 45px;
            background-color: rgb(206, 232, 1);
        }
        .signature2
        {
            position:absolute;
            right:1.9%;
            top:47.5%;
            z-index:-1;
            width: 174px;
            height: 45px;
            background-color: rgb(206, 232, 1);
        }
        .name1
        {
            position:absolute;
            left:{{ $nameSize['left'] }}%;
            top:{{ $nameSize['top'] }}%;
            z-index:-1;
            color: white;
            font-family: 'myFirstFont', sans-serif;
            font-size: {{ $nameSize['font'] }}pt;
            transform: scale({{ $nameSize['width'] }},{{ $nameSize['height'] }});
        }
        .name2
        {
            position:absolute;
            left: {{ (int)$nameSize['left']+50.5 }}%;
            top:{{ $nameSize['top'] }}%;
            z-index:-1;
            color: white;
            font-family: 'myFirstFont', sans-serif;
            font-size: {{ $nameSize['font'] }}pt;
            transform: scale({{ $nameSize['width'] }},{{ $nameSize['height'] }});
        }
        .division1
        {
            position:absolute;
            left:{{ $division['left'] }}%;
            top:{{ $division['top'] }}%;
            z-index:-1;
            height: 40px;
            color: white;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: {{ $division['font'] }}pt;
            font-style: normal;
            font-variant: normal;
        }
        .division2
        {
            position:absolute;
            left:{{ (int)$division['left']+50 }}%;
            top:{{ $division['top'] }}%;
            z-index:-1;
            height: 40px;
            color: white;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: {{ $division['font'] }}pt;
            font-style: normal;
            font-variant: normal;
        }
    </style>
</head>
<body>
<img src="{{ realpath(__DIR__ . '/../../..').'/public/img/id_template2019.png' }}" class="id_template">
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/picture'.'/'.$user->picture }}" class="picture1" />
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/picture'.'/'.$user->picture }}" class="picture2" />
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/signature'.'/'.$user->signature }}" class="signature1" />
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/signature'.'/'.$user->signature }}" class="signature2" />
<div class="name1">
    {{ strtoupper($name) }}
</div>
<div class="name2">
    {{ strtoupper($name) }}
</div>
<div class="division1">
    {{ $division['desc'] }}
</div>
<div class="division2">
    {{ $division['desc'] }}
</div>

</body>
</html>
