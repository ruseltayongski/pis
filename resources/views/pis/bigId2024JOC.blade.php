<html>
<head>
    <style type="text/css">
        /* @font-face {
            font-family: 'BarlowFont';
            src:url('fonts/BarlowSemiCondensed-Bold.ttf')format('truetype');
            font-style: BarlowSemiCondensed;
            font-weight: bold;
              font-style: normal; public\fonts\BarlowSemiCondensed-BoldItalic.ttf
        } */
        @font-face {
            font-family: 'BarlowFont';
            src: url('fonts/BarlowSemiCondensed-Italic.ttf') format('truetype');
            font-style: normal; /* Font style should be normal */
            font-weight: bold;
        }

        html{
            margin-top:15%; 
            margin-bottom: 15%;
            margin-right: 15.9%;
            margin-left: 14%;
        }
        .id_template
        {
            z-index:1;
            position: absolute;
            width: 717px;
            height: 528px;
            border: 1px solid black;
     
        }
        .picture1
        {
            position:absolute;
            left:8.5%;
            margin-top: 105px;
            z-index:-1;
            width: 225px;
            height: 227px;
        }
        .picture2
        {
            position:absolute;
            right:17%;
            margin-top: 105px;
            z-index:-1;
            width: 225px;
            height: 227px;
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
            /* font-family: 'myFirstFont', sans-serif; */
            font-family: 'BarlowFont', sans-serif;
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
        .name3 {
            position:absolute;
            top:{{ $nameSize['top'] -1 }}%; 
            left: -10px; 
            margin-top: 15px;
            color: #275949;
            font-family: 'BarlowFont', Arial;
            font-size: {{ $nameSize['font'] }}pt;
            height: 10px;
            width: 395px;
            text-align: center;
            z-index:1;
        }
        .name4
        {
            left: 340px;
            position:absolute;
            top:{{ $nameSize['top']-1 }}%;
            margin-top: 15px;
            color: #275949;
            font-family: 'BarlowFont', Arial;
            font-size: {{ $nameSize['font'] }}pt;
            height: 10px;
            width: 395px;
            text-align: center;
            z-index:1;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Two columns each taking equal space */
            grid-gap: 10px; /* Gap between grid items */
        }


        .divisionRelative {
            position: relative;
            top: 397px;
            left: 10px;
            z-index:1;
            height: 58px;
            width: 338px;
            padding-left: 10px;
            padding-right: 10px;
        }

        

        .division1
        {
            position:absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #275949;
            font-size: {{ $division['font'] }}pt;
            font-style: normal;
            font-variant: normal;
            width: 338px;
            text-align: center;
        }


        .division2
        {
            position:absolute;
            left:{{ (int)$division['left']+48.5 }}%;
            top:{{ (int)$division['top'] -1 }}%;
            z-index:1;
            height: 40px;
            color: #275949;
            font-size: {{ $division['font'] }}pt;
            font-style: normal;
            font-variant: normal;
            margin-top: 25px;
            text-align: center;

            
        }
        
        .designation1 {
            top: 330px;
            height: 10px;
            left: -11px; 
            width: 395px;
            margin-top: 50px;
            color: #275949;
            position: absolute;
            text-align: center;
            z-index:1;
            font-size: 13pt;
            padding-top: 10px;
        }

        .designation2 {
            left: 340px;
            top: 330px;
            height: 10px;
            width: 395px;
            margin-top: 50px;
            color: #275949;
            position: absolute;
            z-index:1;
            text-align: center;
            font-size: 13pt;
            padding-top: 10px;
        }
        .userid1 {
            top: 325px;
            height: 10px;
            left : -7px;
            width: 395px;
            margin-top: 160px;
            color: #275949;
            z-index:1;
            position: absolute;
            text-align: center;
            font-size: 12pt;
            padding-top: 10px;
        }
        .userid2 {
            left: 345px;
            top: 325px;
            height: 10px;
            width: 395px;
            margin-top: 160px;
            color: #275949;
            z-index:1;
            position: absolute;
            text-align: center;
            font-size: 12pt;
            padding-top: 10px;
        }
    </style>
</head>
<body>
<img src="{{ realpath(__DIR__ . '/../../..').'/public/img/ARTA_ID_2024_JO_CON.png' }}" class="id_template">
 <img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/picture'.'/'.$user->picture }}" class="picture1" />
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/picture'.'/'.$user->picture }}" class="picture2" />

<!-- <img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/signature'.'/'.$user->signature }}" class="signature1" />
<img src="{{ realpath(__DIR__ . '/../../..').'/public/upload_picture/signature'.'/'.$user->signature }}" class="signature2" /> -->


<div class="name3" style="font-family: 'Barlow SemiCondensed-ExtraBold', sans-serif; font-style: bold;">
    <div class="name1_scale">
    {{
        implode('-', array_map(function($part) {
            return ucwords(mb_strtolower(str_replace('_', ' ', $part), 'UTF-8'));
        }, explode('-', $name)))
    }}
    </div>
</div>


<!--  IF NAME PROBLEM
<div class="name3" style="font-family: 'Barlow SemiCondensed-ExtraBold', sans-serif; font-style: bold;">
    <div class="name1_scale">
        @if ($user->userid == 3818)
            Rey Allan M. Tamo-o
        @else
            {{
                implode('-', array_map(function($part) {
                    return ucwords(mb_strtolower(str_replace('_', ' ', $part), 'UTF-8'));
                }, explode('-', $name)))
            }}
        @endif
    </div>
</div> -->


<div class="name4" style="font-family: 'Barlow SemiCondensed-ExtraBold', sans-serif; font-style: bold; ">
    <div class="name2_scale">
   {{
        implode('-', array_map(function($part) {
            return ucwords(mb_strtolower(str_replace('_', ' ', $part), 'UTF-8'));
        }, explode('-', $name)))
    }}
    </div>
</div>

 <!--
<div class="name2">
    <div class="name2_scale">
        {{ strtoupper($name) }}
    </div>
</div>
-->
<div class="divisionRelative">
    <div class="division1" style="font-family: 'Barlow SemiCondensed-Bold', sans-serif; font-style: bold; ">
        {{ $division['desc'] }}
    </div>
</div>


<div class="division2" style="font-family: 'Barlow SemiCondensed-Bold', sans-serif; font-style: bold; ">
    {{ $division['desc'] }}
</div>

<div class="designation1" style="font-family: 'Barlow SemiCondensed-Bold', sans-serif; font-style: bold; ">
    {{ $designation }}
</div>
<div class="designation2" style="font-family: 'Barlow SemiCondensed-Bold', sans-serif; font-style: bold; ">
    {{ $designation }}
</div> 

<div class="userid1" style="font-family: 'Barlow SemiCondensed-Bold', sans-serif; font-style: bold; ">
@if($user->created_at != null) 
    ID No.: {{$user->created_at->format('Y')}}-{{$user->userid}}
    @else
    ID No.: 0000-{{$user->userid}}
@endif
</div>
<div class="userid2" style="font-family: 'Barlow SemiCondensed-Bold', sans-serif; font-style: bold; ">
@if($user->created_at != null) 
    ID No.: {{$user->created_at->format('Y')}}-{{$user->userid}}
    @else
    ID No.: 0000-{{$user->userid}}
@endif
</div> 
</body>
</html>
