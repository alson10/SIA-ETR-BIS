@include('admin.includes.nav_bar', ['active' => 'newsfeed', 'title' => 'Newsfeed'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Annoucement/Activites Management</h5>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('newsfeed.create') }}">
                <button class="btn-add-assets">Create a new content</button>
            </a>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <table id="table">
            <thead>
                <tr>
                    <th>Content</th>
                    <th>Type</th>
                    <th>Date posted</th>
                    <th style="width: 80px;text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsfeed as $item)
                    <tr>
                        <td>{{ Str::limit($item->content, 20) }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->created_at }}</td>

                        <td style="display: flex;align-items:center;justify-content:center">
                            <div class="dropdown">
                                <a href="" class=""
                                    style="color:white;background:forestgreen;padding:5px 10px;border-radius:10px"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="fa-solid fa-gear"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a target="_blank" class="dropdown-item" href="/postview/{{ $item->id }}">View</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('newsfeed.show', [
                                                'id' => $item->id,
                                            ]) }}">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item" onclick='return confirm("Are you sure?")'
                                            href="{{ route('newsfeed.delete', [
                                                'id' => $item->id,
                                            ]) }}">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('admin.includes.footer');
