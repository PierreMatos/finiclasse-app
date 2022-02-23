<ul class="navbar-nav ml-auto">
    <!-- Notifications: style can be found in dropdown.less -->

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{ Auth::user()->unreadNotifications()->count() }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @forelse($notifications as $notification)
                <div class="dropdown-divider"></div>
                <a href="{{ route($notification->data['link'], $notification->data['id']) }}"
                    class="dropdown-item dropNotification mark-as-read" data-id="{{ $notification->id }}">
                    <i class="{{ $notification->data['icon'] }}"></i> {{ $notification->data['text'] }}
                    <span
                        class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                </a>
            @empty
                <div class="dropdown-divider"></div>
                <div class="dropdown-item" style="text-align: center;">
                    <p>Sem novas notificações</p>
                </div>
            @endforelse
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Ver todas as notificações</a>
        </div>
    </li>

    <div class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('storage/logo.png') }}" class="logoImg brand-image elevation-2" alt="Finiclasse Logo">
        </a>
    </div>
</ul>

@push('page_scripts')
    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('markNotification') }}", {
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id
                }
            });
        }
        $(function() {
            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });
            // $('#mark-all').click(function() {
            //     let request = sendMarkRequest();
            //     request.done(() => {
            //         $('div.alert').remove();
            //     })
            // });
        });
    </script>
@endpush
