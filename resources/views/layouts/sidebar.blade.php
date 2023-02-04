<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>TK4 Team 4</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
            
            @foreach ($links_sidebar as [$name, $link]) 
                @if ($name === 'Dashboard Graphic') <li class="nav-item"><a class="nav-link" href="{{ url(''.$link) }}"><i class="fas fa-tachometer-alt"></i><span>{{$name}}</span></a></li>
                @else <li class="nav-item"><a class="nav-link" href="{{ url(''.$link) }}"><i class="fas fa-table"></i><span>{{$name}}</span></a></li>
                @endif
            @endforeach
            <li class="nav-item"><a class="nav-link" href="/logout" ><i class="fa fa-door-closed"></i><span>Log Out</span></a></li>
        </ul>
    </div>
</nav>
