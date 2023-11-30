@include('admin.includes.nav_bar', ['active' => 'assets', 'title' => 'Assets Management'])

<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h4>Assets Management</h4>
        </div>
        <div class="col-lg-2">
            <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Add asssets</button>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table id="assets_table" class="display">
                <thead>
                    <th>Title</th>
                    <th>Date created</th>
                    <th>Date updated</th>
                    <th width="150" style="text-align: center">Actions</th>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td>{{ $asset['title'] }}</td>

                            <td>{{ $asset['created_at'] }}</td>
                            <td>{{ $asset['updated_at'] }}</td>
                            <td style="text-align: center"><a target="_blank" href="/storage/assets/{{$asset->path}}" class="preview-asset">Preview</a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="addLabel">Add Assets</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('assets.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image-title" class="form-label">Assets title:</label>
                        <input required type="text" name="title" class="form-control" id="image-title"
                            placeholder="Title...">
                    </div>
                    <div class="mb-3">
                        <label for="image-file" class="form-label">Assets File:</label>
                        <input required type="file" name="file" class="form-control" id="image-file">
                    </div>
                    <button type="submit" class="btn-add-assets">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#assets_table').DataTable();
    });
</script>
@include('admin.includes.footer');
