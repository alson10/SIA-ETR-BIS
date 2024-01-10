
<style>
    body {
        width: 21.59cm;
        font-family:Arial, Helvetica, sans-serif;
        /* 8.5in */
    }
    .text-center{
        text-align: center;
    }
    .container{
        margin-top: 10px;
    }
    .service{
        text-transform: uppercase;
    }
    .content{
        padding: 20px 50px 0px 50px;
        text-align: justify;
    }
    .info{
        padding: 0px 50px 20px 50px;
        text-align: justify;
    }
    .row{
        padding: 0px 50px 0px 50px;
    }
    .captain{
        padding-right: 50px;
        text-align: right;
    }
    .column {
      float: left;
      width: 33.33%;
    }
    .row::after {
      content: "";
      clear: both;
      display: table;
    }
    .column {
      text-align: center;
    }
</style>
@foreach ($services as $service)
    @if ($service->service_name == 'Certificate of Indigency')
    <div class="container">
       
     
        {{-- <a href="{{ asset('pdf/') }}" target="_blank">Download PDF</a> --}}
        {{-- <img src="{{ asset('assets/qrcode.png') }}" alt="QR Code" id="qrcode"> --}}
        <div class="row">
            <form action="{{route('certificate.indigency')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <center><img src="{{ asset('assets/stamaria.png') }}" style="width:150px;"> </center><br>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            Republic of the Philippines <br>
                            Province of Pangasinan <br>
                            Municipality of Santa Maria <br>
                            <b>Barangay San Mariano </b><br><br>
                        
        
                            <h3 class="text-center"> OFFICE OF THE BARANGAY COUNCIL </h3><br>
                            @foreach ($services as $service)
                                <h2 class="service">{{ $service->service_name }}</h2><br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <br><br>
                <b>TO WHOM IT MAY CONCERN:</b>
                @foreach ($users as $user)
                    @foreach ($requests as $request)
                    <div class="content">
                        <p>
                            &emsp13;&emsp13;&emsp13;
                            This is to certify that <b>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</b>  of legal age, is a bonafide resident of Barangay San Mariano, Santa Maria, Pangasinan. The said person is of good moral character and an active member of the community. He/she is one of those who belong to a low-income family. <br><br>
                        
                            &emsp13;&emsp13;&emsp13;
                            This certification is being issued upon the request of the above-named person for <b>{{ $request->purpose }}</b>. <br><br>
                        
                            &emsp13;&emsp13;&emsp13;
                            Given this {{ $currentDate->format('jS') }} day of {{ $currentDate->format('F Y') }} at Barangay San Mariano, Santa Maria, Pangasinan.
                        </p> <br><br>
                    </div>
                    
                    @endforeach
                @endforeach
                @foreach ($officials as $official)
                <div class="captain">
                    <h3>{{ $official->firstname }} {{ $official->middlename }} {{ $official->lastname }}</h3>
                    <p>Punong Barangay</p>
                </div><br>
                @endforeach
            </form>
        </div>
        {!! DNS2D::getBarcodeHTML($user->user_code, 'QRCODE') !!}
    </div>
    @endif
    @if ($service->service_name == 'Barangay Clearance')
    <div class="container">
        <div class="row">
            <form action="{{route('certificate.indigency')}}" method="post">
                @csrf
                <center><img src="{{ asset('assets/stamaria.png') }}" style="width:100px;"> </center><br>
                <div class="text-center">
                    Republic of the Philippines <br>
                    Province of Pangasinan <br>
                    Municipality of Santa Maria <br>
                    <b>Barangay San Mariano </b><br><br>
                

                    <h3 class="text-center"> OFFICE OF THE BARANGAY COUNCIL </h3><br>
                    @foreach ($services as $service)
                        <h2 class="service">{{ $service->service_name }} CERTIFICATION</h2><br>
                    @endforeach
                    <div class="captain">
                        Date: {{ $currentDate->format('F j, Y') }}
                    </div>
                </div>
                @foreach ($users as $user)
                    @foreach ($requests as $request)
                    <div class="content">
                        <p>
                            This is to certify that the person whose on the photo, signature and thumbprint appear here is a bona fide resident of this barangay. He/She is of good moral character, a law abiding citizen, and has no derogatory record on file as of this date.
                        </p> <br>
                    </div>
                    @endforeach
                @endforeach
                @foreach ($users as $user)
                <div class="info">
                    Full Name: {{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}<br>
                    Address: San Carlos City, Pangasinan<br>
                    Place of Birth: San Carlos City, Pangasinan<br>
                    Date of Birth: {{ \Carbon\Carbon::parse($user->birthdate)->format('F j, Y') }} <br>
                    Gender: {{ $user->gender }}<br>
                    Civil Status: Signal Dad<br>
                    @foreach ($requests as $request)
                        Purpose: {{ $request->purpose }}
                    @endforeach
                </div>
                @endforeach
                <div class="row">
                    <div class="column">
                    <div class="container-sm" style="border: 1px solid black; padding: 60px; margin: 5px;"> </div>
                      <p>2x2 Picture</p>
                    </div>
                    <div class="column">
                        <div class="container-sm" style="border: 1px solid black; padding: 60px; margin: 5px;"></div>
                      <p>Right Thumbmark</p>
                    </div>
                    <div class="column">
                    <div class="container-sm" style="border-bottom: 1px solid black; padding: 60px; margin: 5px;" ></div>
                      <p>Signature</p>
                    </div>
                  </div><br><br>

                @foreach ($officials as $official)
                <div class="text-center">
                    <h3>{{ $official->firstname }} {{ $official->middlename }} {{ $official->lastname }}</h3>
                    <p>Punong Barangay</p>
                </div><br>
                @endforeach
                {!! DNS2D::getBarcodeHTML($user->user_code, 'QRCODE') !!}
                <p> <i>Not Valid Without <br> Barangay Official Seal </i></p>
            </form>
        </div>
    </div>
    @endif
    @endforeach
<script>
    window.print(); 
</script>

