<!-- Modal for request -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" id="exampleModalLabel">Make your request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.make.request') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="request" class="form-label">Request:</label>
                        <select required class="form-select" name="request" aria-label="Default select example">
                            <option value="">Select request</option>
                            @foreach (Helper::getServices() as $item)
                                <option value="{{ $item->id }}">{{ $item->service_name }}</option>
                            @endforeach

                        </select>
                        @error('request')
                            <div class="form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose:</label>
                        <textarea required class="form-control" placeholder="Enter your purpose here.." id="purpose"
                            value="{{ old('purpose') }}" name="purpose" id="exampleFormControlTextarea1" rows="3"></textarea>

                        @error('purpose')
                            <div class="form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"
                        style="width: 100%;background:var(--btnBg);border:0;padding:10px 0">Make Request</button>
                </form>
            </div>

        </div>
    </div>
</div>

{!! view('components.notifications') !!}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</body>

</html>
