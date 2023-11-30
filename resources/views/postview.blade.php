@include('users.includes.nav_bar', ['active' => 'none', 'title' => 'News'])

<style>
    .popup-image {
        cursor: pointer;
    }

    .image-popup {
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 999;
    }

    .image-popup img {
        max-width: 80%;
        max-height: 80%;
        border: 3px solid white;
        border-radius: 5px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h5 style="margin: 20px 0 20px 0">{{ $post->type }}</h5>
            <div class="post-container">
                <div class="post-header">
                    <div class="post-header-info">
                        <h3>Posted by Admin</h3>
                        <p> {{ Helper::timeForHumans($post->created_at) }}</p>
                    </div>
                </div>
                <pre class="post-content">{{ $post->content }}</pre>
            </div>
            <h6 style="font-size: 17px;margin:20px 0">Add Comment:
            </h6>
            <form action="{{ route('newsfeedscomment.store') }}" method="post" id="comments">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
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
            <h5 style="margin: 20px 0 20px 0">Images</h5>
            <div class="lightbox">
                <div class="row">
                    @foreach ($images as $item)
                        <div class="col-lg-12" style="margin-bottom: 10px">
                            <img id="{{ $item->id }}" style="border-radius: 10px" class="popup-image img-fluid"
                                src="/storage/newsfeeds/{{ $item->path }}"
                                data-mdb-img="/storage/newsfeeds/{{ $item->path }}"; alt="aa" srcset="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Get all the images
    const images = document.querySelectorAll('.popup-image');

    // Add click event listener to each image
    images.forEach(image => {
        image.addEventListener('click', () => {
            const imageId = image.id;
            const popup = document.createElement('div');
            popup.classList.add('image-popup');

            const popupImage = document.createElement('img');
            popupImage.src = image.src;

            popup.appendChild(popupImage);
            document.body.appendChild(popup);

            // Close the pop-up when clicked outside the image
            popup.addEventListener('click', () => {
                document.body.removeChild(popup);
            });
        });
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let limit = 5;
    let array = [];
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
            url: '{{ route('newsfeedscomment.comment') }}',
            data: {
                'id': '{{ $post->id }}',
                'limit': limit,
            },
            success: async function(result) {
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
