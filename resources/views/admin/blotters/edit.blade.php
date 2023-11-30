@include('admin.includes.nav_bar', ['active' => 'blotters', 'title' => 'Blotters Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Edit Blotter details</h5>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('blotter.update', [
                'blotter' => $blotter
            ]) }}"
                method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Complinant Name:</label>
                            <input type="text" class="form-control" id="" name="complainant_name"
                                placeholder="Enter complinant name..." value="{{ $blotter->complainant_name }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Respondent Name:</label>
                            <input type="text" class="form-control" id="" name="respondent_name"
                                placeholder="Enter Respondent name..." value="{{ $blotter->respondent_name }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Victims:</label>
                            <textarea class="form-control" id="" cols="30" rows="2" name="victims">{{ $blotter->victims }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Location:</label>
                            <textarea class="form-control" id="" cols="30" rows="2" name="location">{{ $blotter->location }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="term_start">Date and time happened:</label>
                            <input type="datetime-local" class="form-control" value="{{ $blotter->date }}"
                                id="term_start" name="date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">Type:</label>
                            <select class="form-control" id="" name="type" required>
                                <option value="" selected disabled>Select a blotter type</option>
                                <option value="Incident" {{ $blotter->type == 'Incident' ? 'selected' : '' }}>Incident
                                </option>
                                <option value="Amicable" {{ $blotter->type == 'Amicable' ? 'selected' : '' }}>Amicable
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="">About the blotter:</label>
                            <textarea class="form-control" id="" cols="30" rows="3" name="about">{{ $blotter->about }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-6 col-12 col-sm-12">
                        <button type="submit" class="btn btn-success w-100">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('admin.includes.footer');
