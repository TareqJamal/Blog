<aside class="app-side fixed" id="app-side">

    <!-- BEGIN .side-content -->
    <div class="side-content ">

        <!-- BEGIN .user actions -->
        <ul class="user-actions">
            <li class="quick-links">Quick Links</li>
            <li>
                <a href="tasks.html" data-toggle="tooltip" data-placement="top" title="Tasks">
                    <i class="icon-assignment_turned_in"></i>
                </a>
            </li>
            <li>
                <a href="chat.html" data-toggle="tooltip" data-placement="top" title="Chat">
                    <i class="icon-rate_review"></i>
                </a>
            </li>
            <li>
                <a href="index2.html" data-toggle="tooltip" data-placement="top" title="Analytics">
                    <i class="icon-chart-line"></i>
                </a>
            </li>
            <li>
                <a href="custom-tables.html" data-toggle="tooltip" data-placement="top" title="Custom Tables">
                    <i class="icon-border_all"></i>
                </a>
            </li>
            <li>
                <a href="cards.html" class="orange" data-toggle="tooltip" data-placement="top" title="Custom Cards">
                    <i class="icon-book3"></i>
                </a>
            </li>
            <li>
                <a href="secure.html" class="orange" data-toggle="tooltip" data-placement="top" title="Account Status">
                    <i class="icon-verified_user"></i>
                </a>
            </li>
        </ul>
        <!-- END .user actions -->

        <!-- Nav scroll start -->
        <div class="sidebarNavScroll">

            <!-- BEGIN .side-nav -->
            <nav class="side-nav">

                <!-- BEGIN: side-nav-content -->
                <ul class="unifyMenu" id="unifyMenu">
                    <li class="selected">
                        <a href="{{route('getDashboard')}}">
                            <span class="has-icon">
                                <i class="icon-laptop_windows"></i>
                            </span>
                            <span class="nav-title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-assignment"></i>
                            </span>
                            <span class="nav-title">Posts</span>
                            <span class="badge">7</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='{{route('posts.index')}}'>All Posts</a>
                            </li>
                            <li>
                                <a href='{{route('posts.create')}}'>Add Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-message2"></i>
                            </span>
                            <span class="nav-title"> Main Categories</span>
                            <span class="badge">{{\App\Models\Category::where('parent_id',null)->count()}}</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='{{route('categories.index')}}'>All Categories</a>
                            </li>
                            <li>
                                <a href='{{route('categories.create')}}'>Add Category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-message2"></i>
                            </span>
                            <span class="nav-title"> Sub Categories</span>
                            <span class="badge">{{\App\Models\Category::where('parent_id','!=' ,null)->count()}}</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='{{route('sub-categories.index')}}'>All Sub Categories</a>
                            </li>
                            <li>
                                <a href='{{route('sub-categories.create')}}'>Add Sub Category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-broken_image"></i>
                            </span>
                            <span class="nav-title">Tags</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='{{route('tags.index')}}'>All Tags</a>
                            </li>
                            <li>
                                <a href='{{route('tags.create')}}'>Add Tag</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('comments.index')}}">
                            <span class="has-icon">
                                <i class="icon-style"></i>
                            </span>
                            <span class="nav-title">Comments</span>
                            <span class="badge orange">20+</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-broken_image"></i>
                            </span>
                            <span class="nav-title">Writers</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='{{route('writers.index')}}'>All Writers</a>
                            </li>
                            <li>
                                <a href='{{route('writers.create')}}'>Add Writer</a>
                            </li>
                        </ul>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-message2"></i>
                            </span>
                        <span class="nav-title">Admins</span>
                        <span class="badge orange">{{\App\Models\User::all()->count()}}</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='{{route('admins.index')}}'>All Admins</a>
                            </li>
                            <li>
                                <a href='{{route('admins.create')}}'>Add Admin</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a href="{{route('website-settings.index')}}">
                            <span class="has-icon">
                                <i class="icon-style"></i>
                            </span>
                            <span class="nav-title">WebSite Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard-settings.index')}}">
                            <span class="has-icon">
                                <i class="icon-style"></i>
                            </span>
                            <span class="nav-title">Dashboard Setting</span>
                        </a>
                    </li>



                </ul>
                <!-- END: side-nav-content -->

            </nav>
            <!-- END: .side-nav -->

            <!-- Sidebar widgets start -->
            <div class="sidebar-widget">
                <ul class="contributions">
                    <li>
                        <p>Elite Template <span>$9180</span></p>
                        <div class="progress sm mb-1">
                            <div class="progress-bar bg-orange" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li>
                        <p>New Project <span>$5179</span></p>
                        <div class="progress sm mb-1">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li>
                        <p>Balance <span>$12595</span></p>
                        <div class="progress sm mb-1">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Sidebar widgets end -->

        </div>
        <!-- Nav scroll end -->

    </div>
    <!-- END: .side-content -->

</aside>
