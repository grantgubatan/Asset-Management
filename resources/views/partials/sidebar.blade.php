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
