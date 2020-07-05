<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="/assets/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
            <div class="email">john.doe@example.com</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    
                    <li><a href="javascript:void(0);">
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
            <li>
                <a href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="../../pages/typography.html">
                    <i class="material-icons">people_alt</i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">library_books</i>
                    <span>Diary</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="javascript:void(0);" >
                            <span>2018</span>
                        </a> 
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span>2019</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span>2020</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">call_to_action</i>
                    <span>Presbyterian Echo</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="">
                            Upload New Magazine
                        </a>
                    </li>
                    <li>
                        <a href="">
                            See All Magazines
                        </a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">subtitles</i>
                    <span>The Messenger</span>
                </a>
                <ul class="ml-menu">
                    <li class="active">
                        <a href="">
                            Upload New Messenger
                        </a>
                    </li>
                    <li>
                        <a href="">
                            See All Books
                        </a>
                    </li>
                    
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Reports</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../../pages/tables/normal-tables.html">Normal Tables</a>
                    </li>
                    <li>
                        <a href="../../pages/tables/jquery-datatable.html">Jquery Datatables</a>
                    </li>
                    <li>
                        <a href="../../pages/tables/editable-table.html">Editable Tables</a>
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