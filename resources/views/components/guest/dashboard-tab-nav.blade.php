<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if(request()->is('customer')) active @endif " href="{{url('customer')}}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->is('customer/inquiries')) active @endif " href="{{url('customer/inquiries')}}">Inquiries</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->is('customer/settings')) active @endif " href="{{url('customer/settings')}}">Settings</a>
    </li>
</ul>
