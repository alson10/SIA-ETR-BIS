<div class="news-card">
    <a href="/newsview/{{$data->slug}}" target="_blank">
        <div class="images">
            <img src="{{ $data->thumbnail }}" alt="" srcset="">
        </div>
        <h5>{{ $data->title }}</h5>
        <h6>Date Posted: {{ \Carbon\Carbon::parse($data->date_posted)->diffForHumans() }}</h6>
    </a>
</div>
