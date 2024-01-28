<div class="sidebar" data-color="white" data-active-color="success">
    <div class="logo p-3">
        <a href="{{url('/')}}">
            <img src="{{asset('common/images/logo-bg-transparent.png')}}">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if(Auth::user()->role === 'ADMIN')
                <li class="{{ (request()->is('admin')) ? 'active' : '' }}">
                    <a href="{{url('admin')}}">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ (request()->is('admin/inquiries/*')) ? 'active' : '' }}">
                    <a href="{{url('admin/inquiries/all')}}">
                        <i class="fa fa-folder-o"></i>
                        <p>Inquiries</p>
                    </a>
                </li>
                <li class="{{ (request()->is('admin/blog-posts/*')) ? 'active' : '' }}">
                    <a href="{{url('admin/blog-posts/all')}}">
                        <i class="fa fa-newspaper-o"></i>
                        <p>Blog Posts</p>
                    </a>
                </li>
                <li class="{{ (request()->is('admin/system-users/*'))  ? 'active' : '' }}">
                    <a href="{{url('admin/system-users/all')}}">
                        <i class="nc-icon nc-circle-10"></i>
                        <p>Users</p>
                    </a>
                </li>


            @elseif(Auth::user()->role === 'COACH')
                <li class="{{ (request()->is('coach')) ? 'active' : '' }}">
                    <a href="{{url('coach')}}">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ (request()->is('coach/events/*')) ? 'active' : '' }}">
                    <a href="{{url('coach/events/all')}}">
                        <i class="nc-icon nc-trophy"></i>
                        <p>Events</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
