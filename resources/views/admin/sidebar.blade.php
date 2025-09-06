<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">  <span class="logo-name">Sirdaryo24</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown ">
                <a href="{{ route('admin.category.index') }}" class=" nav-link active">
                    <i data-feather="briefcase"></i><span>Category</span></a>

            </li>
            <li class="dropdown ">
                <a href="{{ route('admin.post.index') }}" class=" nav-link active">
                    <i data-feather="command"></i><span>Post</span></a>

            </li>
            <li class="dropdown ">
                <a href="{{ route('admin.tag.index') }}" class=" nav-link active">
                    <i data-feather="mail"></i><span>Tags</span></a>

            </li>
            <li class="dropdown ">
                <a href="{{ route('admin.ads.index') }}" class=" nav-link active">
                    <i data-feather="image"></i><span>Ads</span></a>

            </li>

        </ul>
    </aside>
</div>
