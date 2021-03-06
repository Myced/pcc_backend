<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="/assets/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" 
                aria-expanded="false">
                {{ auth()->user()->name }}
            </div>
            <div class="email">{{ auth()->user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    
                    <li>
                        <form class="" action="{{ route('logout') }}"
                            method="post" style="display: none;"
                            id="logout">
                            @csrf

                        </form>

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout').submit();">
                            
                        <i class="material-icons">input</i>Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{  Request::route()->named('home') ? 'active' : '' }}" >
                <a href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="{{  Request::route()->named('users') || Request::is('users/*') ? 'active' : '' }}">
                <a href="{{ route('users') }}">
                    <i class="material-icons">people_alt</i>
                    <span>Users</span>
                </a>
            </li>

            <li class="{{  Request::route()->named('diary') || Request::is('diary/*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">library_books</i>
                    <span>Diary</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{  Request::route()->named('diary.manage.years') ? 'active' : '' }}">
                        <a href="{{ route("diary.manage.years") }}" >
                            <span>Manage Diary Years</span>
                        </a> 
                    </li>

                    @foreach (\App\DiaryYear::all() as $diaryYear)
                        <li class="{{ 
                                Request::is('diary/manage/detail/' . $diaryYear->year) 
                                ? 'active'
                                : ''
                                }}">
                            <a href="{{ route('diary.detail', ['year' => $diaryYear->year]) }}" >
                                <span>
                                    {{ $diaryYear->year }}
                                </span>
                            </a> 
                        </li>
                    @endforeach

                </ul>
            </li>

            <li class="{{  Request::is('echos') || Request::is('echos/*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">call_to_action</i>
                    <span>Presbyterian Echo</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{  Request::route()->named('echo.create') ? 'active' : '' }}">
                        <a href="{{ route('echo.create') }}">
                            Upload New Magazine
                        </a>
                    </li>
                    <li class="{{  Request::route()->named('echos') ? 'active' : '' }}">
                        <a href="{{ route('echos') }}">
                            See All Magazines
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{  Request::is('messengers') || Request::is('messengers/*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">subtitles</i>
                    <span>The Messenger</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{  Request::route()->named('messenger.create') ? 'active' : '' }}">
                        <a href="{{ route('messenger.create') }}">
                            Upload New Messenger
                        </a>
                    </li>
                    <li class="{{  Request::route()->named('messengers') ? 'active' : '' }}">
                        <a href="{{ route('messengers') }}">
                            See All Books
                        </a>
                    </li>
                    
                </ul>
            </li>

            <li class="{{  Request::is('reports') || Request::is('reports/*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Reports</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{  Request::route()->named('reports.purchases') ? 'active' : '' }}">
                        <a href="{{ route("reports.purchases") }}">Purchases</a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; {{ date("Y") }} <a href="javascript:void(0);">Pefscom Systems</a>.
        </div>
        <div class="version">
            <b>Version: </b> {{ config("app.version") }}
        </div>
    </div>
    <!-- #Footer -->
</aside>