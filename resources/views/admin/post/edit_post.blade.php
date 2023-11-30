@include('admin.includes.nav_bar', ['active' => 'post', 'title' => 'Edit post'])

<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-12">
            <h5>Edit News</h5>
        </div>

    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <form action="" method="post" id="add_form">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input value="{{ $data['title'] }}" required type="text" name="title" class="form-control"
                            id="title" placeholder="Title..." />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail:</label>
                        <input value="{{ $data['thumbnail'] }}" required type="text" name="thumbnail"
                            class="form-control" id="thumbnail" placeholder="Paste your thumbnail link here....." />
                    </div>
                </div>
               
            </div>
            <div class="col-12">
                <label for="image-title" class="form-label">Content:</label>
                <div id="summernote" style="background-color:red">
                </div>
            </div>
            <div class="row justify-content-end" style="margin-top: 20px">
                <div class="col-3">
                    <button class="btn-add-assets btn-save-post" id="save_post">Save post</button>
                </div>
                @if (strval($data['status']) == '0')
                    <div class="col-3">
                        <button class="btn-add-assets" id="publish_post">Publish post</button>
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $("iframe").width("100%");
    });
    const fontList = [];
    for (let index = 0; index <= 149; index++) {
        fontList[index] = (index + 1).toString();
    }
    $('#summernote').summernote({
        blockquoteBreakingLevel: 2,
        disableDragAndDrop: true,
        placeholder: 'Type news content here...',
        tabsize: 2,
        height: 500,
        fontSizes: fontList,
        toolbar: [
            ['style', ['style']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['height', ['height']]
        ]
    });
    $('#summernote').summernote('code', `<?php echo $data['content']; ?>`);
</script>

<script>
    $('#save_post').click(async function(e) {
        e.preventDefault();
        editData("{{ $data['status'] }}");
    });
    $('#publish_post').click(async function(e) {
        e.preventDefault();
        editData("1");
    });
    async function editData(status) {
        $token = $("#token").val();
        $title = $("#title").val();
        $thumbnail = $("#thumbnail").val();
        $type = $("#type").val();
        $content = $('#summernote').summernote('code');
        $('#loader').css('display', 'flex');
        await $.ajax({
            type: "post",
            url: "{{ route('update.post') }}",
            data: {
                '_token': $token,
                'id': "{{ $data['id'] }}",
                'title': $title,
                'thumbnail': $thumbnail,
                'type': $type,
                'content': $content,
                'status': status,
            },
            success: function(response) {

                let result = JSON.parse(response);
                if (result['status'] === 200) {
                    location.href = "{{ route('post') }}";
                } else {
                    $('#loader').css('display', 'none');
                }

            }
        });
    }
</script>
@include('admin.includes.footer');
