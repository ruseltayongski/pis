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
        }
        .signature2
        {
            position:absolute;
            right:2.3%;
            top:46%;
            z-index:-1;
            width: 22.2%;
            height: 40px;
        }
        .name1
        {
            position:absolute;
            left: 8%;
            top:59.4%;
            z-index:-1;
            color: white;
            font-family: 'myFirstFont', sans-serif;
            font-size: {{ $fontSize }}pt;
            transform: scale(1.5,4.2);
        }
        .name2
        {
            position:absolute;
            left:49.3%;
            top:59.5%;
            z-index:-1;
            color: white;
            font-family: 'myFirstFont', sans-serif;
            font-size: {{ $fontSize }}pt;
            transform: scale(.9,4.5);
        }
        .division1
        {
            position:absolute;
            left:3%;
            top:76%;
            z-index:-1;
            height: 40px;
            color: white;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: 19pt;
            font-style: normal;
            font-variant: normal;
        }
        .division2
        {
            position:absolute;
            left:53%;
            top:76%;
            z-index:-1;
            height: 40px;
            color: white;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: 19pt;
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
    {{ $division }}
</div>
<div class="division2">
    {{ $division }}
</div>
</body>
</html>
