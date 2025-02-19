 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  @if( Request()->is('admin-area*'))
                  <li class="nav {{ Request()->is('admin-area') || Request()->is('admin-area/user-add') || Request()->is('admin-area/user-edit/*') ? 'active' : '' }}"><a href="{{route('admin-area')}}"><i class="fa fa-users"></i> Users </a>
                  <li class="nav {{ Request()->is('admin-area/group') || Request()->is('admin-area/group-add') || Request()->is('admin-area/group-edit/*') ? 'active' : '' }}"><a href="{{route('admin-area.group')}}"><i class="fa fa-group"></i> Groups </a>
                  </li>
                  <!-- <li class="nav {{ Request()->is('admin-area/permissions') ? 'active' : '' }}"><a href="{{route('admin-area.permission')}}"><i class="fa fa-group"></i> Permissions </a> -->
                  @else
                  <li class="nav"><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard </a>
                   
                  </li>
                  <li class="nav"><a href="{{route('admin.company')}}"><i class="fa fa-users"></i> Companies </a>
                  <li class="nav"><a href="{{route('admin.branch')}}"><i class="fa fa-users"></i> Branch </a>
                  <li class="nav"><a href="{{route('admin.company.branch')}}"><i class="fa fa-users"></i> Company Branch </a>

                  <li class="nav"><a href="{{route('admin.driver')}}"><i class="fa fa-users"></i> Driver Mangement </a>
                  <li class="nav"><a href="{{route('admin.customer')}}"><i class="fa fa-users"></i> Customer Mangement </a>
                  
                  <li class="nav"><a href="{{route('admin.service.rate')}}"><i class="fa fa-users"></i> Service Rate </a>
                  <li class="nav"><a href="{{route('admin.order')}}"><i class="fa fa-users"></i> Order Mangement </a>
                  <li class="nav"><a href="{{route('admin.scheduler')}}"><i class="fa fa-users"></i> Scheduler </a>

                  <li><a><i class="fa fa-table"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{route('admin.fleet')}}">Fleet</a></li>
                      <li><a href="{{route('admin.suppliers')}}">Suppliers</a></li>
                      <li><a href="{{route('admin.stock-code')}}">Stock Codes</a></li>
                      <li><a href="{{route('admin.fleet-type')}}">Fleet Types</a></li>
                      <li><a href="{{route('admin.vehicle_type')}}">Vehicle Types</a></li>
                      <li><a href="{{route('admin.service_type')}}">Service Types</a></li>
                      <li><a href="{{route('admin.fuel')}}">Fuel Stations & Fuel Prices</a></li>
                      <li><a href="{{route('admin.renewals')}}">Renewals</a></li>
                      <li><a href="{{route('admin.insurance')}}">Insurance Companies</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Fleet Report</a></li>
                      <li><a href="#">Fuel Report</a></li>
                      <li><a href="#">Maintenace Records</a></li>
                      <li><a href="#">Stock Movement</a></li>
                      <li><a href="#">Stock Balance</a></li>
                      <li><a href="#">Accident Report</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Stocks <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.stock.stock-purchase')}}">Stock Purchases</a></li>
                      <li><a href="{{route('admin.stock.stock-issue')}}">Stock Issues</a></li>
                      <li><a href="{{route('admin.stock.removals')}}">Removals</a></li>
                      <li><a href="{{route('admin.stock.disposals')}}">Disposals</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Rebuilt Types <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.rebuilt.tyre.removal')}}">Tyre Removals</a></li>
                      <li><a href="{{route('admin.send.to.build')}}">Send to Build</a></li>
                      <li><a href="{{route('admin.rebuilt.receipt')}}">Rebuilt Receipts</a></li>
                      <li><a href="{{route('admin.rebuilt.issue')}}">Rebuilt Issues</a></li>
                      <li><a href="{{route('admin.rebuilt.tyre.disposal')}}">Rebuild Tyre Disposals</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cog"></i> Repaires<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.general.repair')}}">General Repair</a></li>
                      <li><a href="{{route('admin.accident.repair')}}">Accident Repair</a></li>
                    </ul>
                  </li>
                  <li class="nav"><a href="{{route('admin.regular.maintenance')}}"><i class="fa fa-windows"></i> Regular Maintenance </a>
                  <li><a><i class="fa fa-laptop"></i> Renewals<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.renewal.insurance')}}">Insurance</a></li>
                      <li><a href="{{route('admin.other.renewal')}}">Other Renewals</a></li>
                    </ul>
                  </li>
                  <li class="nav"><a href="{{route('admin.insurance.claim')}}"><i class="fa fa-edit"></i> Insurance Claim </a>
                  @endif
                  
                  <!-- <li class="nav-item">
                  <a href="{{route('home')}}" class="nav-link {{ Request()->is('home') ? 'active' : '' }}">
                      <i class="nav-icon fa fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                  </a>
                  </li> -->
                  <!-- <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
              <!-- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div> -->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>

              <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" title="Logout">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
              
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/img.jpg')}}" alt="">{{Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{route('admin.profile')}}"> Profile</a>
                      <!-- <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a> -->
                  @if(Request()->is('admin-area*'))    
                  <a class="dropdown-item"  href="{{route('home')}}">Exit Admin Area</a>
                  @else
                  <a class="dropdown-item"  href="{{route('admin-area')}}">Admin Area</a>
                  @endif
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" title="Logout">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <!-- <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a> -->
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->