<html>
<head>
    <style type="text/css">
        .id_template
        {
            z-index:-1;
            position: absolute;
        }
        .picture1
        {
            position:absolute;
            left:25.6%;
            top:7.8%;
            z-index:-1;
            width: 22.2%;
            height: 160px;
        }
        .picture2
        {
            position:absolute;
            right:2%;
            top:7.8%;
            z-index:-1;
            width: 21.7%;
            height: 160px;
        }
        .signature1
        {
            position:absolute;
            left:25.6%;
            top:24.9%;
            z-index:-1;
            width: 22.1%;
            height: 40px;
        }
        .signature2
        {
            position:absolute;
            right:2.3%;
            top:24.9%;
            z-index:-1;
            width: 22.1%;
            height: 40px;
        }
        .name1
        {
            position:absolute;
            left:2%;
            top:33%;
            z-index:-1;
            height: 40px;
            color: white;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: <?php
                            $name = $user->fname.' '.$user->mname.' '.$user->lname;
                            if( strlen($name) <= 12){
                                echo '30';
                            } else {
                                $fontDiff = strlen($name) - 12;
                                $fontFinal = 30;
                                for($i=1; $i<=$fontDiff; $i++){
                                    $fontFinal -= 1;
                                }
                                if($fontFinal < 18){
                                    echo '18';
                                } else {
                                    echo $fontFinal;
                                }
                                Session::put('fontFinal',$fontFinal);
                            }
                        ?>pt;
            font-style: normal;
            font-variant: normal;
            font-weight: 800;
        }
        .name2
        {
            position:absolute;
            left:52%;
            z-index:-1;
            height: 40px;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: <?php
                            $name = $user->fname.' '.$user->mname.' '.$user->lname;
                            if( strlen($name) <= 12){
                                echo '30';
                            } else {
                                $fontDiff = strlen($name) - 12;
                                $fontFinal = 30;
                                for($i=1; $i<=$fontDiff; $i++){
                                    $fontFinal -= 1;
                                }
                                if($fontFinal < 18){
                                    echo '18';
                                } else {
                                    echo $fontFinal;
                                }
                                Session::put('fontFinal',$fontFinal);
                            }
                        ?>pt;
            font-style: normal;
            top:<?php
                if($fontFinal <= 20){
                    echo '32';
                } else {
                    echo '33';
                }
            ?>%;
            font-variant: normal;
            font-weight: 800;
            color: white;
        }
        .division1
        {
            position:absolute;
            left:2%;
            top:41.3%;
            z-index:-1;
            height: 40px;
            color: white;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: 18pt;
            font-style: normal;
            font-variant: normal;
        }
        .division2
        {
            position:absolute;
            left:52%;
            top:41.3%;
            z-index:-1;
            height: 40px;
            color: white;
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: 18pt;
            font-style: normal;
            font-variant: normal;
        }
    </style>
</head>
<body>
    <img src="{{ asset('public/img/id_template.png') }}" width="100%" height="100%" class="id_template">
    <img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture1" />
    <img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture2" />
    <img src="{{ asset('public/img/signature.jpg') }}" class="signature1" />
    <img src="{{ asset('public/img/signature.jpg') }}" class="signature2" />
    <div class="name1">
        {{ $name }}
    </div>
    <div class="name2">
        {{ $name }}
    </div>
    <div class="division1">
        {{ explode('MSD - ',\PIS\Division::find($user->division_id)->description)[1] }}
    </div>
    <div class="division2">
        Management Support Division
    </div>
</body>
</html>
