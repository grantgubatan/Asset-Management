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
