<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li style="">
                <div style="padding: 10px 10px;">
                    <div style="display:inline-block;">
                        <img src="/img/users/{{Session::get('user_avatar')}}" onError="this.onerror=null;this.src='/img/users/default-avatar.png';" style="border-radius:30%;" width="50px">
                    </div>
                    <div style="display:inline-block;">
                        <h5>&nbsp;&nbsp;{{Session::get('user_name')}} {{Session::get('user_lastname')}}</h5>
                    </div>
                </div>
            </li>
            <li>
                <a class="{{($menu == 'dashboard')? 'active' : '' }}" href="/"><i class="fa fa-dashboard fa-fw"></i> {{ Lang::get('menu.dashboard')}}</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> {{ Lang::get('menu.users')}}<span class="fa arrow"></span></a>
                <ul class="{{($menu == 'users')? 'nav nav-second-level collapse in' : 'nav nav-second-level collapse' }}">
                    <li>
                        <a class="{{($submenu == 'users')? 'active' : '' }}" href="Users">{{ Lang::get('menu.users-table')}}</a>
                    </li>
                    <li>
                        <a class="{{($submenu == 'roles')? 'active' : '' }}" href="Roles">{{ Lang::get('menu.users-roles')}}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> {{ Lang::get('menu.tasks')}}<span class="fa arrow"></span></a>
                <ul class="{{($menu == 'tasks')? 'nav nav-second-level collapse in' : 'nav nav-second-level collapse' }}">
                    <li>
                        <a class="{{($submenu == 'tasks')? 'active' : '' }}" href="Tasks">{{ Lang::get('menu.tasks-table')}}</a>
                    </li>
                    <li>
                        <a class="{{($submenu == 'types')? 'active' : '' }}" href="Tasks-Types">{{ Lang::get('menu.tasks-types')}}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="About"><i class="fa fa-code"></i> {{ Lang::get('menu.about')}}</a>
            </li>
            <li>
                <a href="Log-out"><i class="fa fa-sign-out"></i> {{ Lang::get('menu.log-out')}}</a>
            </li>
        </ul>
    </div>
</div>