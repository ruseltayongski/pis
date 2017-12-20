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
            left:3%;
            top:63%;
            z-index:-1;
            height: 40px;
            color: white;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: <?php
                            $name = $user->fname.' '.$user->mname.' '.$user->lname;
                            strlen($name);
                        ?>20pt;
            font-style: normal;
            font-variant: normal;
            font-weight: 800;
        }
        .name2
        {
            position:absolute;
            left:53%;
            z-index:-1;
            height: 40px;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: <?php
                            $name = $user->fname.' '.$user->mname.' '.$user->lname;
                            strlen($name);
                        ?>20pt;
            font-style: normal;
            top:63%;
            font-variant: normal;
            font-weight: 800;
            color: white;
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
    </style>
</head>
<body>
<img src="{{ asset('public/img/id_template.png') }}" class="id_template">
<img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture1" />
<img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture2" />
<img src="{{ asset('public/img/signature.jpg') }}" class="signature1" />
<img src="{{ asset('public/img/signature.jpg') }}" class="signature2" />
<div class="name1">
    {{ strtoupper($name) }}
</div>
<div class="name2">
    {{ strtoupper($name) }}
</div>
<div class="division1">
    {{ explode('MSD - ',\PIS\Division::find($user->division_id)->description)[1] }}
</div>
<div class="division2">
    Management Support Division
</div>
</body>
</html>
