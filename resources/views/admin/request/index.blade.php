@include('admin.includes.nav_bar', ['active' => 'requests', 'title' => 'Request List'])

<div class="container">
    <h4>Request Management</h4>
    <br>
    <div class="row">
        <div class="col-12">
            <table id="request_table" class="display">
                <thead>
                    <th>Name</th>
                    <th>Request</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                    {{-- <th>Type</th>
                        <th>Date created</th>
                        <th width="140">Actions</th> --}}
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr @if ($request_id == $request->id) style="background:rgba(0,0,0,.05)" @endif>
                            <td>{{ $request->name }}</td>
                            <td>{{ $request->service_name }}</td>
                            <td>{{ $request->purpose }}</td>
                            <td>
                                @switch(intval($request->status ))
                                    @case(0)
                                        {{ 'Requested' }}
                                    @break

                                    @case(1)
                                        {{ 'Processing' }}
                                    @break

                                    @case(2)
                                        {{ 'Ready to pick up' }}
                                    @break

                                    @case(3)
                                        {{ 'Completed' }}
                                    @break

                                    @case(4)
                                        {{ 'Canceled' }}
                                    @break

                                    @default
                                @endswitch
                            </td>
                            <td>{{ $request->created_at }}</td>
                            {{-- <pre>
                                {{
                                    print_r($request);
                                }}
                            </pre> --}}

                            <td style="display: flex;align-items:center">
                                {{-- <a href="" class="preview-post">More details</a> --}}

                                <div class="dropdown">
                                    <a href="" class="" style="color:#212529" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-gear"
                                            class="rotate"></i></a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="/chatify/{{$request->owner_id}}">
                                                Message</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.createNotifaction', ['user_id' => $request->owner_id, 'request_id' => $request->id, 'status' => 1]) }}">Notify
                                                Processing</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.createNotifaction', ['user_id' => $request->owner_id, 'request_id' => $request->id, 'status' => 2]) }}">Notify
                                                Ready to pickup</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.createNotifaction', ['user_id' => $request->owner_id, 'request_id' => $request->id, 'status' => 3]) }}">Set
                                                to already pick up</a></li>
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
</div>
<script>
    $(document).ready(function() {
        $('#request_table').DataTable();
    });
</script>
@include('admin.includes.footer');
