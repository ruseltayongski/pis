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
            width: 175px;
            height: 177px;
        }
        .picture2
        {
            position:absolute;
            right:1.8%;
            top:14.5%;
            z-index:-1;
            width: 175px;
            height: 177px;
        }
        .signature1
        {
            position:absolute;
            left:25.7%;
            top:47.4%;
            z-index:-1;
            width: 175px;
            height: 45px;
            background-color: rgb(118, 222, 65);
        }
        .signature2
        {
            position:absolute;
            right:1.7%;
            top:47.4%;
            z-index:-1;
            width: 175px;
            height: 45px;
            background-color: rgb(118, 222, 65);
        }
        .name1
        {
            position:absolute;
            top:{{ $nameSize['top']-4 }}%;
            color: #004a07;
            font-family: 'myFirstFont', sans-serif;
            font-size: {{ $nameSize['font'] }}pt;
            height: 10px;
            width: 395px;
            text-align: center;
        }
        .name1_scale {
            transform: scale({{ $nameSize['width'] }},{{ $nameSize['height'] }});
        }
        .name2
        {
            left: 395px;
            position:absolute;
            top:{{ $nameSize['top']-4 }}%;
            color: #004a07;
            font-family: 'myFirstFont', sans-serif;
            font-size: {{ $nameSize['font'] }}pt;
            height: 10px;
            width: 395px;
            text-align: center;
        }
        .name2_scale {
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
            margin-top: 25px;
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
            margin-top: 25px;
        }
        .designation1 {
            top: 367px;
            height: 10px;
            width: 395px;
            position: absolute;
            text-align: center;
            font-size: 18pt;
            padding-top: 10px;
        }
        .designation2 {
            left: 395px;
            top: 367px;
            height: 10px;
            width: 395px;
            position: absolute;
            text-align: center;
            font-size: 18pt;
            padding-top: 10px;
        }
    </style>
</head>
<body>
<img src="{{ realpath(__DIR__ . '/../../..').'/public/img/BIG_ID_15_ARTA.jpg' }}" class="id_template">
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/picture'.'/'.$user->picture }}" class="picture1" />
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/picture'.'/'.$user->picture }}" class="picture2" />
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/signature'.'/'.$user->signature }}" class="signature1" />
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/signature'.'/'.$user->signature }}" class="signature2" />
<div class="name1">
    <div class="name1_scale">
        {{ strtoupper($name) }}
    </div>
</div>
<div class="name2">
    <div class="name2_scale">
        {{ strtoupper($name) }}
    </div>
</div>
<div class="division1">
    {{ $division['desc'] }}
</div>
<div class="division2">
    {{ $division['desc'] }}
</div>
<div class="designation1">
    {{ $designation }}
</div>
<div class="designation2">
    {{ $designation }}
</div>

</body>
</html>
