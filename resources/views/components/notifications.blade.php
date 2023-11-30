@auth

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Notifications</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="notification_container" style="padding-top:0">

        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#notif_click").click(async function(e) {
            e.preventDefault();
            let html = "";
            $("#notification_container").html("");
            await $.ajax({
                type: 'POST',
                url: '{{ route('get.notifications') }}',
                data: {
                    'type': 1,
                },
                success: async function(data) {
                    let result = JSON.parse(data);
                    console.log(result);



                    for (let index = 0; index < result.length; index++) {
                        const element = result[index];
                        let converted = "";
                        await $.post("{{ route('convert.date') }}", {
                                'date': element['created_at']
                            },
                            function(diff, textStatus, jqXHR) {
                                let seen = parseInt(element['seen']) == 0 ?
                                    'unread' :
                                    'read';

                                html += `
                  <div class="notif-card ` + seen + `">  <a href="` + element['redirect_link'] + `">
                        <div class="notif-content">
                            <i class="fa-solid fa-hourglass-start"></i>
                            <p>` + element['content'] + `</p>
                        </div>
                        <span>` + diff + `</span></a>
                    </div>
                 `;
                            },

                        );

                    }
                    $("#notification_container").html(html);
                },
                error: function(msg) {
                    console.log(msg);
                    var errors = msg.responseJSON;
                }
            });
        });

        setInterval(() => {
            count();
        }, 1000);

        function count() {
            $.ajax({
                type: 'POST',
                url: '{{ route('get.notifications') }}',
                data: {
                    'type': 0,
                },
                success: async function(data) {
                    let result = JSON.parse(data);
                    $('#notif_count').html(result.length);
                },
                error: function(msg) {
                    console.log(msg);
                    var errors = msg.responseJSON;
                }
            });
        }
    </script>
@endauth
<form action="{{ route('logout') }}" method="post" id="logout-form">
    @csrf
</form>
<script>
    $("#logout").click(function(e) {
        $('#logout-form').submit();
    });
</script>
