<header class="app-header">
    <div class="container-fluid">

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-7 col-7">

                <!-- BEGIN .logo -->
                <div class="logo-block">
                    <a href="index-2.html" class="logo">
                        <img src="{{asset('Admin')}}/img/logo.png" alt="Elite Admin Dashboard" />
                    </a>
                    <a class="mini-nav-btn" href="#" id="onoffcanvas-nav">
                        <i class="open"></i>
                        <i class="open"></i>
                        <i class="open"></i>
                    </a>
                    <a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
                        <i class="open"></i>
                        <i class="open"></i>
                        <i class="open"></i>
                    </a>
                </div>
                <!-- END .logo -->

                <!-- Live updates start -->
                <div class="live-updates">
                    <ul class="header-news" id="header-news">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="icon-shopping-basket"></i>
                                <span>25 new items sold out in Themeforest.</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="icon-timer"></i>
                                <span>7 new features updated successfully.</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="icon-star"></i>
                                <span>Successfully launched new product.</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Live updates end -->

            </div>
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-5 col-5">

                <!-- Header actions start -->
                <ul class="header-actions">
                    <li class="dropdown">
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-notifications_none"></i>
                            <span class="count-label">7</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lg" aria-labelledby="notifications">
                            <ul class="imp-notify">
                                <li>
                                    <div class="icon">W</div>
                                    <div class="details">
                                        <h6 class="username">Wilson</h6>
                                        <p class="desc">The best Dashboard design I have seen ever.</p>
                                        <p class="time">6:30 PM</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon green">J</div>
                                    <div class="details">
                                        <h6 class="username">John Smith</h6>
                                        <p class="desc">Jhonny sent you a message. Read now!</p>
                                        <p class="time">7:20 PM</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon red">R</div>
                                    <div class="details">
                                        <h6 class="username">Zustin Mezzell</h6>
                                        <p class="desc">Stella, Added you as a Friend. Accept it!</p>
                                        <p class="time">3:45 PM</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" id="todos" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-person_outline"></i>
                            <span class="count-label red">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lg" aria-labelledby="todos">
                            <ul class="tasks-widget">
                                <li>
                                    <p>Task #48<span>90%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                            <span class="sr-only">90% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>Task #98<span>60%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>Task #7<span>40%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                            <span class="avatar">ER<span class="status online"></span></span>
                            <span class="user-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                            <i class="icon-chevron-small-down downarrow"></i>
                        </a>
                        <div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
                            <div class="admin-settings">
                                <ul class="admin-settings-list">


                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <a  class="btn btn-primary">Logout</a>
                                        </x-dropdown-link>
                                    </form>
                                <div class="actions">

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- Header actions end -->

            </div>
        </div>
        <!-- Row start -->

    </div>
</header>
