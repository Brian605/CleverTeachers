
<div class="card pc-user-card">
    <div class="card-body">
        <div class="nav-user-image">
            <a data-bs-toggle="collapse" href="#navuserlink">
                <img src="{{asset('assets/images/user/avatar-1.jpg')}}" alt="user-image" class="user-avtar rounded-circle">
            </a>
        </div>
        <div class="pc-user-collpsed collapse" id="navuserlink">
            <h4 class="mb-0">{{auth()->user()->name}}</h4>
           <span>{{auth()->user()->roles[0]->name}}</span>
            <ul>
                <li><a class="pc-user-links">
                        <i class="ph-duotone ph-user"></i>
                        <span>My Account</span>
                    </a></li>
                <li><a class="pc-user-links">
                        <i class="ph-duotone ph-gear"></i>
                        <span>Settings</span>
                    </a></li>
                <li><a class="pc-user-links">
                        <i class="ph-duotone ph-lock-key"></i>
                        <span>Lock Screen</span>
                    </a></li>
                <li><a class="pc-user-links" href="/logout">
                        <i class="ph-duotone ph-power"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
