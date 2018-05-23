<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Blog<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('post.index') }}">Posts</a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('tag.index') }}">Tags</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('about.index') }}">About</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Widgets<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        @if (isset($widget))
                            <a href="{{ route('widget.edit', $widget->id) }}">Author Widget</a>
                        @else
                            <a href="{{ route('widget.create') }}">Author Widget</a>
                        @endif
                    </li>
                    
                    <li>
                        @if (isset($contact_widget))
                            <a href="{{ route('contact.widget.edit', $contact_widget->id) }}">Contact Widget</a>    
                        @else
                            <a href="{{ route('contact.widget.create') }}">Contact Widget</a>
                        @endif
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>