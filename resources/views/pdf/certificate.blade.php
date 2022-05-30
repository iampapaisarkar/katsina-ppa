<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Certificate -  {{$certificationNO}}</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style type="text/css">
        body{
                font-family: Arial;
        }
        @page { 
            size: 570pt 800pt; 
            padding: 0;
            margin: 0;
            font-family: serif;
        }
        .head1{
            text-align: center;
            margin-top: 20px;
            font-size: 30px;
            color: #000;
        }
        .head2{
            text-align: center;
            margin-top: 0;
            font-size: 30px;
            color: #000;
        }
        .date{
            position: absolute;
            right: 200px;
            top: 210px;
            font-size: 20px;
        }
        .datetime{
            position: absolute;
            right: 90px;
            top: 210px;
            font-size: 20px;
        }
        .title1{
            text-align: center;
            margin-top: 215px;
            font-size: 30px;
            color: #6e6e6e;
        }
        .title3{
            text-align: center;
            margin-top: 10px;
            font-size: 20px;
            color: #6e6e6e;
        }
        .title4{
            text-align: center;
            margin-top: 20px;
            font-size: 50px;
            color: #0c6606;   
        }
        .title5{
            text-align: center;
            margin-top: 10px;
            font-size: 30px;
            color: #6e6e6e;   
        }
        .title11{
            text-align: center;
            margin-top: 10px;
            font-size: 20px;
            color: #000;  
        }
        .title12{
            text-align: center;
            margin-top: 10px;
            font-size: 40px;
            color: #000;  
        }
        .title6{
            text-align: center;
            margin-top: 50px;
            font-size: 50px;
            color: red;  
        }
        .title8{
            text-align: center;
            margin-top: 130px;
            font-size: 30px;
            font-weight: bold;
            color: #545454;  
        }
        .title9{
            text-align: center;
            margin-top: 0;
            font-size: 20px;
            font-weight: bold;
            color: #545454;  
        }
        .title10{
            text-align: center;
            margin-top: 0;
            font-size: 20px;
            color: #545454;  
        }
    </style>
<body style="background-image: url({{$background}}); width: 100%; height: 100%; background-size: cover;"">
<div style="padding-top: 0;padding-left: 70px;padding-right: 70px;">

    <div class="head1">KATSINA STATE</div>
    <div class="head2">Bureau of Public Procurement</div>

    <div class="date">Date:</div>
    <div class="datetime">{{$data->updated_at->format('d/m/Y')}}</div>

    <div class="title1">CERTIFICATION <br> OF REGISTRATION</div>
    <div class="title3">THIS IS TO CERTIFY</div>
    <div class="title4">{{$data->company_details->company_name}}</div>
    <div class="title5">ORGANIZATION TYPE</div>
    <div class="title11">{{$data->company_details->organization_type->title}}</div>
    <div class="title12">{{$data->company_details->core_competence->title}}</div>
    <div class="title6">{{$certificationNO}}</div>
    
    <div class="title8">Director General</div>

    <div class="title9">Katsina State</div>
    <div class="title10">bureau of public procurement</div>

</div>

</body>
</html>
