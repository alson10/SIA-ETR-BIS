@include('admin.includes.nav_bar', ['active' => 'requests', 'title' => 'Request List'])
<style>
    .form-control{
        text-align: center;
    }
</style>
<div class="container">
    <div class="row">
        <h5 style="margin-bottom: 20px">Certificates Of Indigency/Clearance:</h5>
        <form action="{{route('certificate.indigency')}}" method="post">
            @csrf
            <div class="text-center">
                <input type="text" value="Republic of the Philippines" class="form-control mx-auto" style="width: 300px;">
                <input type="text" value="Province of Pangasinan" class="form-control mx-auto" style="width: 300px;">
                <input type="text" value="Municipality of Santa Maria" class="form-control mx-auto" style="width: 300px;">
                <input type="text" value="Barangay San Mariano" class="form-control mx-auto" style="width: 200px;">
            </div><br>
            
                
            <input type="text" value="OFFICE OF THE BARANGAY COUNCIL" class="form-control mx-auto" style="width: 500px;"><br>
            @foreach ($services as $service)
                <input type="text" value="{{ $service->service_name }}" class="form-control mx-auto" style="width: 500px;"><br>
            @endforeach
               
            <b>TO WHOM IT MAY CONCERN:</b><br><br>
            @foreach ($users as $user)
                @foreach ($requests as $request)
                
                <textarea name="r" id="" required cols="20" rows="7" class="form-control" style="text-align: justify">
                    This is to certify that {{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}  of legal age, is a bonafide resident of Barangay San Mariano, Santa Maria, Pangasinan. The said person is of good moral character and an active member of the community. She is one of those who belong to a low-income family.
                   
                    This certification is being issued upon the request of the above-named person for {{ $request->purpose }}. 
                  
                    Given this {{ $currentDate->format('jS') }} day of {{ $currentDate->format('F Y') }} at Barangay San Mariano, Santa Maria, Pangasinan.
                </textarea> <br><br>
                @endforeach
            @endforeach
            @foreach ($officials as $official)
            <div class="text-right">
                <input type="text" value="{{ $official->firstname }} {{ $official->middlename }} {{ $official->lastname }}" class="form-control" style="width: 300px;">
                <label for="">Punong Barangay</label>
            </div><br>
            @endforeach
           
            <div class="col-12">
                <button type="submit" style="float: right;margin-top:10px" class="btn btn-success">Generate Certificare</button>
            </div>
        </form>
    </div>
</div>
@include('admin.includes.footer');
