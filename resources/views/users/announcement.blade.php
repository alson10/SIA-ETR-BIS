@include('users.includes.nav_bar', ['active' => 'announcement', 'title' => 'Announcement'])
<div class="container" style="margin-top:20px">
    {{-- <h5 style="margin: 40px 0">Newsfeed</h5> --}}

</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8" id="newsfeed_display">
            <h5 style="margin: 20px 0 40px 0">Announcement</h5>
        </div>
        <div class="col-lg-4">
            <h5 style="margin: 20px 0 40px 0">Latest news</h5>
            <div class="row">
                @foreach ($latest_news as $item)
                    {!! view('users.cards.news_card', ['data' => $item]) !!}
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('users.includes.footer')
<script>
    let limit = 5;
    let array = [];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(window).scroll(function() {
        if (Math.ceil($(window).scrollTop()) + $(window).height() >= $(document.documentElement).prop(
                "scrollHeight")) {
            limit += 5;
            getData(limit);
        }
    });

    getData(limit);
    async function getData(count) {
        await $.ajax({
            type: 'POST',
            url: '{{ route('users.annoucement') }}',
            data: {
                'count': count,
            },
            success: async function(result) {
                const newsfeeds = JSON.parse(result);

                for (let index = 0; index < newsfeeds.length; index++) {
                    const newsfeed = newsfeeds[index];
                    if (!array.includes(newsfeed['id'])) {
                        array.push(newsfeed['id']);

                        let interval;

                        await $.post("{{ route('convert.date') }}", {
                                'date': newsfeed['created_at']
                            },
                            function(diff, textStatus, jqXHR) {
                                interval = diff;
                            }
                        );
                        await $.ajax({
                            type: "POST",
                            url: "{{ route('users.getPostImages') }}",
                            data: {
                                'newsfeed_id': newsfeed['id'],
                            },
                            success: function(response) {
                                const images = JSON.parse(response);

                                let includes = buildeImages(images);

                                $('#newsfeed_display').append(`
        <a href="/postview/` + newsfeed['id'] + `" style="color:#000" target="_blank">
                <div class="post-container" id="` + newsfeed['id'] + `">
                    <div class="post-header">
                        <div class="post-header-info">
                            <h3>Posted by Admin</h3>
                            <p>` + interval + `</p>
                        </div>
                    </div>
                    <pre class="post-content">` + newsfeed['content'] + `</pre>
                    <div class="row" style="row-gap: 25px;">
                        ` + includes + `
                    </div>
                </div></a>`);
                            }
                        });
                    }

                }
            }
        });
    };



    function buildeImages(element) {

        if (element.length == 0) {
            return "";
        }
        if (element.length == 1) {
            return `<div class="col-12 only-one">
                <div class="image-post">
                    <img src="/storage/newsfeeds/` + element[0]['path'] + `"
                        alt="Post Image 1">
                </div>
            </div>
            `;
        }
        if (element.length == 2) {
            return `<div class="col-6">
                <div class="image-post">
                    <img src="/storage/newsfeeds/` + element[0]['path'] + `"
                        alt="Post Image 1">
                </div>
            </div>
            <div class="col-6">
                <div class="image-post">
                    <img src="/storage/newsfeeds/` + element[1]['path'] + `"
                        alt="Post Image 1">
                </div>
            </div>
            `;
        }
        if (element.length == 3) {
            return `<div class="col-6">
    <div class="image-post">
        <img src="/storage/newsfeeds/` + element[0]['path'] + `"
            alt="Post Image 1">
    </div>
</div>
<div class="col-6">
    <div class="image-post">
        <img src="/storage/newsfeeds/` + element[1]['path'] + `"
            alt="Post Image 1">
    </div>
</div>
<div class="col-12">
    <div class="image-post">
        <img src="/storage/newsfeeds/` + element[2]['path'] + `"
            alt="Post Image 1">
    </div>
</div>`;
        }
        if (element.length == 4) {
            return `<div class="col-6">
    <div class="image-post">
        <img src="/storage/newsfeeds/` + element[0]['path'] + `"
            alt="Post Image 1">
    </div>
</div>
<div class="col-6">
    <div class="image-post">
        <img src="/storage/newsfeeds/` + element[1]['path'] + `"
            alt="Post Image 1">
    </div>
</div>
<div class="col-6">
    <div class="image-post">
        <img src="/storage/newsfeeds/` + element[2]['path'] + `"
            alt="Post Image 1">
    </div>
</div><div class="col-6">
    <div class="image-post">
        <img src="/storage/newsfeeds/` + element[3]['path'] + `"
            alt="Post Image 1">
    </div>
</div>`;
        }
        if (element.length > 4) {
            return `
            <div class="row" style="row-gap: 25px;">
    <div class="col-6">
        <div class="image-post">
            <img src="/storage/newsfeeds/` + element[0]['path'] + `" alt="Post Image 1">
        </div>
    </div>
    <div class="col-6">
        <div class="image-post">
            <img src="/storage/newsfeeds/` + element[1]['path'] + `"                alt="Post Image 1">
        </div>
    </div>
    <div class="col-6">
        <div class="image-post">
            <img src="/storage/newsfeeds/` + element[2]['path'] + `"                alt="Post Image 1">
        </div>
    </div>
    <div class="col-6">
        <div class="image-post more-images">
            <img src="/storage/newsfeeds/` + element[3]['path'] + `"                alt="Post Image 1">
                <div>+` + (element.length - 4) + `</div>
        </div>
    </div>
</div>
            `;
        }

    }
</script>
