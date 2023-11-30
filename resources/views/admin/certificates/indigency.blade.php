<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

            {
            width: 100%;
            height: 5px;
            color: #000;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <table style="margin: auto">
            <tbody border="1">
                <tr>
                    <td>
                        <img src="{{ asset('/storage/assets/logo_mangaldan.jpg') }}" height="160" alt=""
                            srcset="" style="margin-right: 100px">
                    </td>
                    <td style="text-align: center">
                        <h4 style="margin: 7px 0;font-weight:400">Republic of the Philippines</h4>
                        <h4 style="margin: 7px 0;font-weight:400">Province of Pangasinan</h4>
                        <h4 style="margin: 7px 0;font-weight:400">Municipality of Mangaldan</h4>
                        <h4 style="margin: 7px 0">BARANGAY ALITAYA</h4>
                    </td>
                    <td>
                        <img src="{{ asset('/storage/assets/logo_alitaya.png') }}" height="160" alt=""
                            srcset="" style="margin-left: 100px">
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <h2 style="text-align: center">OFFICE OF THE PUNONG BARANGAY</h2>
        <h3 style="text-align: center;font-size:35px">{{Str::upper($type)}}</h3>
        <br>
        <br>
        <h3>TO WHOM IT MAY CONCERN:</h3>
        <br>       
        <p style="text-align: justify;text-indent:80px;font-size:28px">{{$r}}</p>
        <p style="text-align: justify;text-indent:80px;font-size:28px">{{$p}}</p>
        <p style="text-align: justify;text-indent:80px;font-size:28px">{{$d}}</p>
        <br>
        <br>
        <br>
        <div style="float: right">
            <p style="text-align: center;font-size:28px">
                ROBERTO BOY M. FRIALDE
            </p>
            <P style="text-align: center;font-size:18px">
                PUNONG BARANGAY
            </P>
        </div>
    </div>
</body>
</html>
