@include('admin.includes.nav_bar', ['active' => 'certificate', 'title' => 'Blotters Management'])
<style>
  #summernote{
    font-family: 'Times New Roman', Times, serif !important;
   }
</style>
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Edit Certificate</h5>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('certificate.store') }}" method="POST">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                <div class="col-12">
                    <div class="mb-3">
                        <label for="image-title" class="form-label">Title:</label>
                        <input type="text" id="title" value="{{ $certificate->title }}" class="form-control"
                            placeholder="Title here...">
                    </div>
                </div>
                <div class="col-12">
                    <label for="image-title" class="form-label">Content:</label>
                    <div id="summernote">
                    </div>
                </div>
                <button type="button" id="save_post" class="btn btn-primary">Save certificate</button>
            </form>
        </div>
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
      
        
        fontNames: ['Times new roman'],
     
        toolbar: [
            ['style', ['style']],
            ['table', ['table']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['font', ['bold', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ],
        addDefaultFonts: false,
        tableResizable: true,

    });
    $('#summernote').summernote('code', '{!! $certificate->content !!}');

    $(document).ready(function() {
        $('.table').css('border', 'none');
    });
</script>

<script>
    $('#save_post').click(async function(e) {
        e.preventDefault();
        await addPost();
    });
    async function addPost() {
        $token = $("#token").val();
        $title = $("#title").val();
        $content = $('#summernote').summernote('code');
        $('#loader').css('display', 'flex');
        await $.ajax({
            type: "POST",
            url: "{{ route('certificate.update') }}",
            data: {
                '_token': $token,
                'id': '{{ $certificate->id }}',
                'title': $title,
                'content': $content,
            },
            success: function(response) {
                // let result = JSON.parse(response);
                alert(response)
                $('#loader').css('display', 'none');
            }
        });
    }
</script>
@include('admin.includes.footer');
