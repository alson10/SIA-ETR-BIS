@include('admin.includes.nav_bar', ['active' => 'newsfeed', 'title' => 'Newsfeed'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Create Annoucement/Activites</h5>
            @if (session('message'))
                <h6 style="margin-top: 20px;color:green">{{ session('message') }}</h6>
            @endif
        </div>
        {{-- <div class="col-lg-2">
            <a href="">
                <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Create Post</button>
            </a>
        </div> --}}
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <form action="{{ route('newsfeed.store') }}" method="post" id="add_form" enctype="multipart/form-data">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
            <div class="col-4">
                <div class="mb-3" style="display: flex;align-items:center;">
                    <label for="content" class="form-label" style="margin: 1px 10px 0 0">Type:</label>
                    <select name="type" id="" class="form-control">
                        <option value="Announcement">Announcement</option>
                        <option value="Activities">Activities</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea rows="7" class="form-control" type="text" name="content" id="content"
                    placeholder="Type your content here....."></textarea>
            </div>
            <div class="col-lg-12">
                <div id="imageContainer">
                </div>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Select your images:</label>
                <input type="file" id="fileInput" class="form-control" name="images[]" multiple id="">
            </div>
            <div class="row justify-content-end" style="margin-top: 20px">
                <div class="col-3">
                    <button type="submit" class="btn-add-assets" id="publish_post">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('fileInput').addEventListener('change', handleFileSelection);

    function handleFileSelection() {
        const fileInput = this;
        const selectedFiles = fileInput.files;
        const imageContainer = document.getElementById('imageContainer');

        imageContainer.innerHTML = '';
        for (let i = 0; i < selectedFiles.length; i++) {
            const file = selectedFiles[i];
            const imgElement = document.createElement('img');
            imgElement.classList.add('uploaded-image');
            imgElement.src = URL.createObjectURL(file);
            imageContainer.appendChild(imgElement);
        }
    }
</script>
@include('admin.includes.footer');
