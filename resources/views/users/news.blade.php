@include('users.includes.nav_bar', ['active' => 'news', 'title' => 'News page'])
<div class="container" style="margin-top:20px">
</div>
<div class="container">
    <div class="row">
        <h5 style="margin: 20px 0 40px 0">News</h5>
        @foreach ($news as $item)
            <div class="col-lg-4">
                {!! view('users.cards.news_card', ['data' => $item]) !!}
            </div>
        @endforeach
    </div>
</div>
@include('users.includes.footer')
