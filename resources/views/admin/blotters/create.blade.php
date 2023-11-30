@include('admin.includes.nav_bar', ['active' => 'blotters', 'title' => 'Blotters Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Create Blotter</h5>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('blotter.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Complinant Name:</label>
                            <input type="text" class="form-control" id="" name="complainant_name"
                                placeholder="Enter complinant name..." required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Respondent Name:</label>
                            <input type="text" class="form-control" id="" name="respondent_name"
                                placeholder="Enter Respondent name..." required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Victims:</label>
                            <textarea class="form-control" id="" cols="30" rows="2" name="victims"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Location:</label>
                            <textarea class="form-control" id="" cols="30" rows="2" name="location"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="term_start">Date and time happened:</label>
                            <input type="datetime-local" class="form-control" id="term_start" name="date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Type:</label>
                            <select class="form-control" id="" name="type" required>
                                <option value="" selected disabled>Select a blotter type</option>
                                <option value="Incident">Incident</option>
                                <option value="Amicable">Amicable</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="">About the blotter:</label>
                            <textarea class="form-control" id="" cols="30" rows="3" name="about"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@include('admin.includes.footer');
