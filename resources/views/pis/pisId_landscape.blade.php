<html>
<head>
    <style type="text/css">
        html{
            margin-top:15%;
            margin-bottom: 15%;
            margin-right: 15.9%;
            margin-left: 15.9%;
        }
        .id_template
        {
            z-index:-1;
            position: absolute;
            width: 100%;
            height: 480px;
        }
        .picture1
        {
            position:absolute;
            left:25.6%;
            top:14%;
            z-index:-1;
            width: 22.2%;
            height: 170px;
        }
        .picture2
        {
            position:absolute;
            right:2.1%;
            top:14%;
            z-index:-1;
            width: 22.2%;
            height: 170px;
        }
        .signature1
        {
            position:absolute;
            left:25.6%;
            top:46%;
            z-index:-1;
            width: 22.2%;
            height: 40px;
            background-color: rgb(206, 232, 1);
        }
        .signature2
        {
            position:absolute;
            right:2.3%;
            top:46%;
            z-index:-1;
            width: 22.2%;
            height: 40px;
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
            left: {{ (int)$nameSize['left']+50.3 }}%;
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
        @font-face {
            font-family: myFirstFont;
            src: url({{ asset('public/plugin/font-awesome/fonts/arial.ttf') }}) format("truetype");
        }
    </style>
</head>
<body>
<img src="{{ asset('public/img/id_template.png') }}" class="id_template">
<img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture1" />
<img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture2" />
<img src="{{ asset('public/upload_picture/signature').'/'.$user->signature }}" class="signature1" />
<img src="{{ asset('public/upload_picture/signature').'/'.$user->signature }}" class="signature2" />
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
