<div class="sidebar" data-color="blue" data-image="{{URL::to('/img/sidebar-5.jpg')}}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
               
                <a href="#" class="simple-text">
                    <i class="pe-7s-home"></i>Tenant System
                </a>
            </div>

            <ul class="nav">
                <li class="{{Request::segment('2') == 'home' || Request::segment('2')== 'home-bedspacer'  ? 'active' : ''}}">
                    <a href="{{route('admin_home')}}">
                        <i class="pe-7s-browser"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="{{Request::segment('2') == 'rooms' || Request::segment('2') == 'rooms-bedspacer' ? 'active' : ''}}">
                    <a href="{{route('admin_rooms')}}">
                        <i class="pe-7s-home"></i>
                        <p>Rooms</p>
                    </a>
                </li>
                <li class="{{Request::segment('2') == 'room-reports' || Request::segment('2') == 'bedspace-reports' ? 'active' : ''}}">
                    <a href="{{route('admin_reports')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Reports</p>
                    </a>
                </li>
                
            </ul>
    	</div>
    </div>
