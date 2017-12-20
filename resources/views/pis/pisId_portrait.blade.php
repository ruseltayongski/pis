<html>
    <head>
        <style type="text/css">
            html{
                margin: 0;
            }
            .template{
                margin-top:5%;
                margin-bottom: 2%;
                margin-right: 2%;
                margin-left: 2%;
            }
            .id_template1
            {
                z-index:-1;
                position: absolute;
                width: 100%;
                height: 480px;
            }
            .id_template2
            {
                z-index:-1;
                position: absolute;
                width: 100%;
                height: 480px;
                top:50%;
            }
            .picture1_1
            {
                position:absolute;
                left:27.6%;
                top:7.9%;
                z-index:-1;
                width: 22.2%;
                height: 170px;
            }
            .picture2_1
            {
                position:absolute;
                right:4.1%;
                top:7.9%;
                z-index:-1;
                width: 22.2%;
                height: 170px;
            }
            .picture1_2
            {
                position:absolute;
                left:27.6%;
                top:57.5%;
                z-index:-1;
                width: 22.2%;
                height: 170px;
            }
            .picture2_2
            {
                position:absolute;
                right:4.1%;
                top:57.5%;
                z-index:-1;
                width: 22.2%;
                height: 170px;
            }
            .signature1_1
            {
                position:absolute;
                left:27.6%;
                top:25.8%;
                z-index:-1;
                width: 22.2%;
                height: 40px;
            }
            .signature2_1
            {
                position:absolute;
                right:4.3%;
                top:25.8%;
                z-index:-1;
                width: 22.2%;
                height: 40px;
            }
            .signature1_2
            {
                position:absolute;
                left:27.6%;
                top:74.5%;
                z-index:-1;
                width: 22.2%;
                height: 40px;
            }
            .signature2_2
            {
                position:absolute;
                right:4.3%;
                top:74.5%;
                z-index:-1;
                width: 22.2%;
                height: 40px;
            }
            .name1_1
            {
                position:absolute;
                left:3%;
                top:35%;
                z-index:-1;
                height: 40px;
                color: white;
                font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
                font-size: 20pt;
                font-style: normal;
                font-variant: normal;
                font-weight: 800;
            }
            .name2_1
            {
                position:absolute;
                left:53%;
                z-index:-1;
                height: 40px;
                font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
                font-size: 20pt;
                font-style: normal;
                top:35%;
                font-variant: normal;
                font-weight: 800;
                color: white;
            }

            .name1_2
            {
                position:absolute;
                left:3%;
                top:83%;
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
            .name2_2
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
                top:83%;
                font-variant: normal;
                font-weight: 800;
                color: white;
            }
            .division1_1
            {
                position:absolute;
                left:3%;
                top:42.8%;
                z-index:-1;
                height: 40px;
                color: white;
                font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
                font-size: 19pt;
                font-style: normal;
                font-variant: normal;
            }
            .division2_1
            {
                position:absolute;
                left:53%;
                top:42.8%;
                z-index:-1;
                height: 40px;
                color: white;
                font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
                font-size: 19pt;
                font-style: normal;
                font-variant: normal;
            }
            .division1_2
            {
                position:absolute;
                left:3%;
                top:90.4%;
                z-index:-1;
                height: 40px;
                color: white;
                font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
                font-size: 19pt;
                font-style: normal;
                font-variant: normal;
            }
            .division2_2
            {
                position:absolute;
                left:53%;
                top:90.4%;
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
        <div class="template">
            <img src="{{ asset('public/img/id_template.png') }}" class="id_template1">
            <img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture1_1" />
            <img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture2_1" />
            <img src="{{ asset('public/img/signature.jpg') }}" class="signature1_1" />
            <img src="{{ asset('public/img/signature.jpg') }}" class="signature2_1" />
            <div class="name1_1">
                {{ strtoupper($name) }}
            </div>
            <div class="name2_1">
                {{ strtoupper($name) }}
            </div>
            <div class="division1_1">
                {{ explode('MSD - ',\PIS\Division::find($user->division_id)->description)[1] }}
            </div>
            <div class="division2_1">
                {{ explode('MSD - ',\PIS\Division::find($user->division_id)->description)[1] }}
            </div>
        </div>

        <div class="template">
            <img src="{{ asset('public/img/id_template.png') }}" class="id_template2">
            <img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture1_2" />
            <img src="{{ asset('public/upload_picture/picture').'/'.$user->picture }}" class="picture2_2" />
            <img src="{{ asset('public/img/signature.jpg') }}" class="signature1_2" />
            <img src="{{ asset('public/img/signature.jpg') }}" class="signature2_2" />
            <div class="name1_2">
                {{ strtoupper($name) }}
            </div>
            <div class="name2_2">
                {{ strtoupper($name) }}
            </div>
            <div class="division1_2">
                {{ explode('MSD - ',\PIS\Division::find($user->division_id)->description)[1] }}
            </div>
            <div class="division2_2">
                {{ explode('MSD - ',\PIS\Division::find($user->division_id)->description)[1] }}
            </div>
        </div>
    </body>

</html>
