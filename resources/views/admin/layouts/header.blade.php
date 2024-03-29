<!-- Top Header
            ==========================================-->
<div class="top-header">
    <div class="toggle-icon" data-toggle="tooltip" data-placement="right" title="Toggle Menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul class="top-header-links">
        <li>
            <button type="button" class="dropdown-toggle" data-toggle="dropdown" data-display="static"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
                <div class="count">{{ \App\Models\Subscriber::count() }}</div>
            </button>
            <div class="dropdown-menu">
                @foreach (\App\Models\Subscriber::take(5)->orderBy('id', 'desc')->get()
    as $subscriber)
                    <div class="item-list">
                        <img src="{{ $subscriber->getAvatar() }}">
                        <div class="item-content">
                            {{ $subscriber->email }}
                            <span>
                                <i class="fa fa-clock"></i> {{ $subscriber->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    <!--End Item List-->
                @endforeach
                <div class="drop-footer">
                    <a href="{{ route('admin.subscribers') }}">view all</a>
                </div>
            </div>
            <!--End Dropdown Menu-->
        </li>
        <!--End Li-->
        <li>
            <button type="button" class="dropdown-toggle" data-toggle="dropdown" data-display="static"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope"></i>
                <div class="count">{{ \App\Models\Message::count() }}</div>
            </button>
            <div class="dropdown-menu">
                @foreach (\App\Models\Message::take(5)->orderBy('id', 'desc')->get()
    as $message)
                    <div class="item-list">
                        <a href="{{ route('admin.messages.single', ['id' => $message->id]) }}">
                            <img src="{{ $message->getAvatar() }}">
                            <div class="item-content">
                                {{ $message->subject }}
                                <span>
                                    <i class="fa fa-clock"></i> {{ $message->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </a>
                    </div>
                    <!--End Item List-->
                @endforeach
                <div class="drop-footer">
                    <a href="{{ route('admin.messages') }}">view all</a>
                </div>
            </div>
            <!--End Dropdown Menu-->
        </li>
        <!--End Li-->
        <li>
            <button type="button" class="dropdown-toggle" data-toggle="dropdown" data-display="static"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('public/admin-assets/images/user-1.png') }}">
                <span>{{ auth()->guard('admins')->user()->name }}</span>
            </button>
            <div class="dropdown-menu">
                <ul>
                    <li>
                        <a href="{{ route('admin.profile') }}">
                            <i class="fa fa-user"></i>
                            profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.logout') }}">
                            <i class="fa fa-power-off"></i>
                            logout
                        </a>
                    </li>
                </ul>
            </div>
            <!--End Dropdown Menu-->
        </li>
        <!--End Li-->
    </ul>
</div>
<!--End Top Header-->
