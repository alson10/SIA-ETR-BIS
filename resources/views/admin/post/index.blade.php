@include('admin.includes.nav_bar', ['active' => 'post', 'title' => 'Post Management'])

<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>News Management</h5>
            @if (session('message'))
                <h6 style="margin-top: 20px;color:green">{{ session('message') }}</h6>
            @endif
        </div>
        <div class="col-lg-2">
            <a href="{{ route('create_post') }}">
                <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Create a news</button>
            </a>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table id="posts_table" class="display">
                <thead>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date created</th>
                    <th width="140">Actions</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ Str::limit($post['title'], 50) }}</td>
                            <td>{{ intval($post['status']) === 0 ? 'Unpublished' : 'Published' }}</td>

                            <td>{{ $post['created_at'] }}</td>

                            <td style="display: flex;align-items:center">
                                <a href="/newsview/{{ $post->slug }}" class="preview-post">Preview</a>

                                <div class="dropdown">
                                    <a href="" class="" style="color:#212529" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="fa-solid fa-gear"></i></a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('post.toggle', [
                                                    'id' => $post->id,
                                                ]) }}">{{ intval($post['status']) === 0 ? 'Published' : 'Unpublished' }}</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('form.edit.post', ['id' => $post['id']]) }}">Edit</a>
                                        </li>
                                        <li><a class="dropdown-item" onclick='return confirm("Are you sure?")'
                                                href="{{ route('post.delete', [
                                                    'id' => $post->id,
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
</div>

<script>
    $(document).ready(function() {
        $('#posts_table').DataTable();
    });
</script>
@include('admin.includes.footer');
