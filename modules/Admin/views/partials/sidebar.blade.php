 <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
<div class="page-container">
         
 <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR --> 
                <div class="page-sidebar navbar-collapse collapse">
                   
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start active open">
                                    <a href="{{ url('/')}}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Dashboard</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                
                                </ul>
                        </li> 
                        
                         <li class="nav-item start active {{ (isset($page_title) && $page_title=='Role')?'open':'' }}">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="glyphicon glyphicon-th"></i>
                                        <span class="title">Roles</span>
                                        <span class="arrow {{ (isset($page_title) && $page_title=='Blog')?'open':'' }}"></span>
                                    </a>
                                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='View Role')?'block':'none' }}">
                                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Role')?'active':'' }}">
                                            <a href="{{ route('role') }}" class="nav-link ">
                                               <i class="glyphicon glyphicon-eye-open"></i> 
                                                <span class="title">
                                                    View Roles 
                                                </span>
                                            </a>
                                        </li> 

                                         <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Role')?'active':'' }}">
                                            <a href="{{ route('role.create') }}" class="nav-link ">
                                               <i class="glyphicon glyphicon-eye-open"></i> 
                                                <span class="title">
                                                    Create Role 
                                                </span>
                                            </a>
                                        </li> 
                                         <li class="nav-item  {{ (isset($page_title) && $page_action=='Update Permission')?'active':'' }}">
                                            <a href="{{ url('admin/permission') }}" class="nav-link ">
                                               <i class="glyphicon glyphicon-eye-open"></i> 
                                                <span class="title">
                                                    Set Permission 
                                                </span>
                                            </a>
                                        </li> 
                                    </ul>
                                </li>                    
                        

                        <li class="nav-item  start active  {{ (isset($page_title) && ($page_title=='Admin User' || $page_title=='Client User') )?'open':'' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                 <i class="glyphicon glyphicon-user"></i>
                                <span class="title">Manage User</span>
                                <span class="arrow {{ (isset($page_title) && $page_title=='Admin User')?'open':'' }}"></span>
                            </a>

                           <ul class="sub-menu" style="display: {{ (isset($page_title) && ($page_title=='Admin User' OR $page_title=='Client User' ))?'block':'none' }}">

                               <li class="nav-item  {{ (isset($page_title) && $page_title=='Admin User')?'open':'' }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">Super Admin User</span>
                                    <span class="arrow {{ (isset($page_title) && $page_title=='Admin User')?'open':'' }}"></span>
                                </a>
                                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Admin User')?'block':'none' }}">
                                        <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Admin User')?'active':'' }}">
                                            <a href="{{ route('user.create') }}" class="nav-link ">
                                                <i class="glyphicon glyphicon-plus-sign"></i> 
                                                <span class="title">
                                                    Create User
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Admin User')?'active':'' }}">
                                            <a href="{{ route('user') }}" class="nav-link ">
                                                 <i class="glyphicon glyphicon-eye-open"></i> 
                                                <span class="title">
                                                    View Users
                                                </span>
                                            </a>
                                        </li>
                                      
                                     
                                    </ul>
                                </li> 
                               <li class="nav-item  {{ (isset($page_title) && $page_title=='Client User')?'open':'' }}">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">Admin User</span>
                                    <span class="arrow {{ (isset($page_title) && $page_title=='Client User')?'open':'' }}"></span>
                                </a>
                                    <ul class="sub-menu" style="display: {{ (isset($page_title) && $page_title=='Client User')?'block':'none' }}">
                                        <!-- <li class="nav-item  {{ (isset($page_title) && $page_action=='Create Client User')?'active':'' }}">
                                            <a href="{{ route('clientuser.create') }}" class="nav-link ">
                                                <i class="glyphicon glyphicon-plus-sign"></i> 
                                                <span class="title">
                                                    Create User
                                                </span>
                                            </a>
                                        </li> -->

                                        <li class="nav-item  {{ (isset($page_title) && $page_action=='View Client User')?'active':'' }}">
                                            <a href="{{ route('clientuser') }}" class="nav-link ">
                                                 <i class="glyphicon glyphicon-eye-open"></i> 
                                                <span class="title">
                                                    View Users
                                                </span>
                                            </a>
                                        </li>
                                      
                                     
                                    </ul>
                                </li>
                                
                            </ul>  
                        </li> 
                        <!-- posttask end-->
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>