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
                                <a href='contact3.html'>All Posts</a>
                            </li>
                            <li>
                                <a href='contact4.html'>Create Post</a>
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
                                <a href='{{route('categories.create')}}'>Create Category</a>
                            </li>
                        </ul>
                    </li> <li>
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
                                <a href='{{route('sub-categories.create')}}'>Create Sub Category</a>
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
                                <a href='contact3.html'>All Tags</a>
                            </li>
                            <li>
                                <a href='contact4.html'>Create Tags</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html">
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
                                <i class="icon-view_day"></i>
                            </span>
                            <span class="nav-title">Forms</span>
                            <span class="lbl"></span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='contact3.html'>Contact Form #3</a>
                            </li>
                            <li>
                                <a href='contact4.html'>Contact Form #4</a>
                            </li>
                            <li>
                                <a href='subscribe-form.html'>Subscribe Form</a>
                            </li>
                            <li>
                                <a href='checkout-form.html'>Checkout Form</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="custom-tables.html">
											<span class="has-icon">
												<i class="icon-view_week"></i>
											</span>
                            <span class="nav-title">Custom Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
											<span class="has-icon">
												<i class="icon-layers"></i>
											</span>
                            <span class="nav-title">Layouts</span>
                            <span class="lbl red"></span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='custom-drag.html'>Custom Panels</a>
                            </li>
                            <li>
                                <a href='layout.html'>Default Layout</a>
                            </li>
                            <li>
                                <a href='fixed-sidebar.html'>Fixed Sidebar</a>
                            </li>
                            <li>
                                <a href='boxed.html'>Boxed Layout</a>
                            </li>
                            <li>
                                <a href='fullscreen.html'>Full Screen</a>
                            </li>
                            <li>
                                <a href='layout-no-quick-actions.html'>No Quick Links</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
											<span class="has-icon">
												<i class="icon-receipt"></i>
											</span>
                            <span class="nav-title">Pages</span>
                            <span class="lbl green"></span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='profile.html'>User Profile</a>
                            </li>
                            <li>
                                <a href='contacts.html'>Contacts</a>
                            </li>
                            <li>
                                <a href='calendar.html'>Calendar</a>
                            </li>
                            <li>
                                <a href='invoice.html'>Invoice</a>
                            </li>
                            <li>
                                <a href='timeline.html'>Timeline</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing</a>
                            </li>
                            <li>
                                <a href="faq.html">Faq's</a>
                            </li>
                            <li>
                                <a href="search.html">Search results</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="cards.html">
											<span class="has-icon">
												<i class="icon-book3"></i>
											</span>
                            <span class="nav-title">Cards</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
											<span class="has-icon">
												<i class="icon-public"></i>
											</span>
                            <span class="nav-title">Maps</span>
                            <span class="lbl yellow"></span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='map-skins.html'>Snazzy Maps</a>
                            </li>
                            <li>
                                <a href='google-maps.html'>Google Maps</a>
                            </li>
                            <li>
                                <a href='vector-maps.html'>Vector Maps</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="gallery.html">
											<span class="has-icon">
												<i class="icon-image2"></i>
											</span>
                            <span class="nav-title">Gallery</span>
                        </a>
                    </li>
                    <li>
                        <a href="comments.html">
											<span class="has-icon">
												<i class="icon-chat_bubble_outline"></i>
											</span>
                            <span class="nav-title">Comments</span>
                        </a>
                    </li>
                    <li>
                        <a href="datepickers.html">
											<span class="has-icon">
												<i class="icon-insert_invitation"></i>
											</span>
                            <span class="nav-title">Datepickers</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
											<span class="has-icon">
												<i class="icon-chart-area-outline"></i>
											</span>
                            <span class="nav-title">Graphs</span>
                            <span class="lbl"></span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='c3-graphs.html'>C3 Graphs</a>
                            </li>
                            <li>
                                <a href='flot.html'>Flot Graphs</a>
                            </li>
                            <li>
                                <a href='morris.html'>Morris Graphs</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
											<span class="has-icon">
												<i class="icon-beaker"></i>
											</span>
                            <span class="nav-title">UI Elements</span>
                            <span class="lbl yellow"></span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='general-elements.html'>General Elements</a>
                            </li>
                            <li>
                                <a href='buttons.html'>Buttons</a>
                            </li>
                            <li>
                                <a href='tabs.html'>Tabs</a>
                            </li>
                            <li>
                                <a href="modals.html">Modals</a>
                            </li>
                            <li>
                                <a href='accordion.html'>Accordion</a>
                            </li>
                            <li>
                                <a href="labels-badges.html">Labels &amp; Badges</a>
                            </li>
                            <li>
                                <a href='notifications.html'>Notifications</a>
                            </li>
                            <li>
                                <a href='carousel.html'>Carousels</a>
                            </li>
                            <li>
                                <a href='list-items.html'>List Items</a>
                            </li>
                            <li>
                                <a href='cards.html'>Cards</a>
                            </li>
                            <li>
                                <a href='navbars.html'>Navbars</a>
                            </li>
                            <li>
                                <a href='popovers-tooltips.html'>Popovers &amp; Tooltips</a>
                            </li>
                            <li>
                                <a href='progress.html'>Progress Bars</a>
                            </li>
                            <li>
                                <a href='pagination.html'>Pagination</a>
                            </li>
                            <li>
                                <a href='typography.html'>Typography</a>
                            </li>
                            <li>
                                <a href='media-objects.html'>Media Objects</a>
                            </li>
                            <li>
                                <a href='icons.html'>Icons</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="tables.html">
											<span class="has-icon">
												<i class="icon-border_outer"></i>
											</span>
                            <span class="nav-title">Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="datatables.html">
											<span class="has-icon">
												<i class="icon-border_all"></i>
											</span>
                            <span class="nav-title">Data Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
											<span class="has-icon">
												<i class="icon-lock_outline"></i>
											</span>
                            <span class="nav-title">Authentication</span>
                            <span class="lbl red"></span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='login.html'>Login</a>
                            </li>
                            <li>
                                <a href='signup.html'>Signup</a>
                            </li>
                            <li>
                                <a href='forgot-pwd.html'>Forgot Password</a>
                            </li>
                            <li>
                                <a href="locked-screen.html">Locked Screen</a>
                            </li>
                            <li>
                                <a href='error404.html'>Error 404</a>
                            </li>
                            <li>
                                <a href='error505.html'>Error 505</a>
                            </li>
                            <li>
                                <a href='secure.html'>Secure Account</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
											<span class="has-icon">
												<i class="icon-format_align_left"></i>
											</span>
                            <span class="nav-title">Multi Level Nav</span>
                            <span class="lbl"></span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='#'>Level #One</a>
                            </li>
                            <li>
                                <a href="#" class="has-arrow" aria-expanded="false">
                                    <span class="nav-title">Level #One</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li>
                                        <a href='#'>Level #Two</a>
                                    </li>
                                    <li>
                                        <a href='#'>Level #Two</a>
                                    </li>
                                    <li>
                                        <a href='#'>Level #Two</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
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
