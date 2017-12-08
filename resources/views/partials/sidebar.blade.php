<<<<<<< HEAD
<nav class="main-menu">
            <ul>
              <li>
                  <a href="{{url('/')}}">
                      <i class="fa fa-database fa-2x"></i>
                      <span class="nav-text">
                          Asset Manager v1.0
                      </span>
                  </a>

              </li>

                <li>
                    <a href="{{url('home')}}">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="{{url('deliveries')}}">
                        <i class="fa fa-truck fa-2x"></i>
                        <span class="nav-text">
                            Deliveries
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="{{url('inventory')}}">
                       <i class="fa fa-dropbox fa-2x"></i>
                        <span class="nav-text">
                            Inventory
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="{{url('deployed')}}">
                       <i class="fa fa-users fa-2x"></i>
                        <span class="nav-text">
                            Deployed
                        </span>
                    </a>

                </li>

                <li class="has-subnav">
                    <a href="{{url('#')}}">
                       <i class="fa fa-file fa-2x"></i>
                        <span class="nav-text">
                            Software Assets
                        </span>
                    </a>

                </li>

                <li class="has-subnav">
                    <a href="{{url('servermon')}}">
                       <i class="fa fa-server fa-2x"></i>
                        <span class="nav-text">
                            Server Monitoring
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                    <a href="{{url('status')}}">
                       <i class="fa fa-exclamation  fa-2x"></i>
                        <span class="nav-text">
                            Network Status
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                    <a href="{{url('calendar')}}">
                       <i class="fa fa-calendar  fa-2x"></i>
                        <span class="nav-text">
                            Calendar
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                    <a href="{{url('disposed')}}">
                       <i class="fa fa-trash  fa-2x"></i>
                        <span class="nav-text">
                            Disposed Assets
                        </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                       <i class="fa fa-book fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out"></i> <span class="nav-text">Logout</span>
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
            </ul>
        </nav>
=======
<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-database fa-lg"></i> Asset Management v1.0
                  </a>
                </li>

                <li>
                  <a href="{{url('home')}}">
                  <i class="fa fa-home fa-lg"></i> Home
                  </a>
                </li>

                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-eye fa-lg"></i> View <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                  <li><a href="{{url('deliveries')}}"><i class="fa fa-truck fa-lg"></i> Deliveries</a></li>
                  <li><a href="{{url('inventory')}}"><i class="fa fa-dropbox fa-lg"></i> Inventory</a></li>
                  <li><a href="{{url('deployed')}}"><i class="fa fa-users fa-lg"></i> Deployed</a></li>
                </ul>

                 <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
            </ul>
     </div>
</div>
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
