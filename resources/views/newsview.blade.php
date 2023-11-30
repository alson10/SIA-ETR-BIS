@include('users.includes.nav_bar', ['active' => 'none', 'title' => 'News'])
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 style="margin: 20px 0 10px 0;font-family:'Times New Roman', Times, serif;font-weight:600">
                {{ $news->title }}
            </h2>
            <h6 style="font-family:'Times New Roman', Times, serif;font-weight:600">
                {{ Helper::timeForHumans($news->date_posted) }}</h6>
            <hr style="margin: 20px 0 ">
            {!! $news->content !!}
            <h6 style="font-size: 17px;margin:20px 0">Add Comment:
            </h6>
            <form action="{{ route('newscomment.store') }}" method="post" id="comments">
                @csrf
                <input type="hidden" name="id" value="{{ $news->id }}">
                <textarea name="comments" class="form-control" id="" cols="30" rows="5"
                    placeholder="Enter your comment here..."></textarea>
                <br>
                <button class="btn btn-success" type="submit" style="float: right;margin:10px 0 20px 0">Add
                    comment</button>
            </form>
            <h6 style="margin: 70px 0 20px 0">Comments:({{ count($comments) }})</h6>
            <div class="" style="margin:20px 0 40px 0;padding:0" id="comment_container">

            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let array = [];
    let limit = 5;
    $(window).scroll(function() {
        if (Math.ceil($(window).scrollTop()) + $(window).height() >= $(document.documentElement).prop(
                "scrollHeight")) {
            limit += 5;
            getComments(limit);
        }
    });
    getComments(limit);
    async function getComments(limit) {
        await $.ajax({
            type: 'POST',
            url: '{{ route('newscomment.comment') }}',
            data: {
                'id': '{{ $news->id }}',
                'limit': limit,
            },
            success: async function(result) {
                console.log(result);
                const comments = JSON.parse(result);
                for (let index = 0; index < comments.length; index++) {
                    if (!array.includes(comments[index]['id'])) {
                        array.push(comments[index]['id']);
                        let interval;
                        await $.post("{{ route('convert.date') }}", {
                                'date': comments[index]['created_at']
                            },
                            function(diff, textStatus, jqXHR) {
                                interval = diff;
                            }
                        );
                        $("#comment_container").append(`
                    <div class="col-12" style="margin-bottom: 20px" id="` + comments[index]['id'] + `" >
                        <div class="comment-card">
                            <div class="header">
                                <img src="/storage/users-avatar/` + comments[index]['relation']['avatar'] + `" alt=""
                                    srcset="">
                                <div>
                                    <h6>` + comments[index]['relation']['name'] + `</h6>
                                    <span>` + interval + `</span>
                                </div>
                            </div>
                            ` + comments[index]['comments'] + `
                        </div>
                    </div>    
                    `);
                    }
                }
            },

        });
    }
</script>
@include('users.includes.footer')
