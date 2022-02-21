<nav id="app" class="main-header navbar navbar-expand navbar-white navbar-light">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
    </a>
    @hasrole('Admin')
        <notification :userId="{{auth()->id()}}" :unreads ="{{auth()->user()->unreadNotifications}}"/>
    @endhasrole
</nav>

