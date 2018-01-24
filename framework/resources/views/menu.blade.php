<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="./">
                    <i class="fa fa-dashboard"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{route('addType')}}" >
                    <i class="fa fa-map-marker"></i>
                    <span>Thêm loại sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="{{route('list_type')}}" >
                    <i class="fa fa-map-marker"></i>
                    <span>Danh sách loại</span>
                </a>
            </li>
            <li>
                <a href="{{route('addFood')}}" >
                    <i class="fa fa-map-marker"></i>
                    <span>Thêm sản phẩm</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-envelope"></i>
                    <span>Danh sách SP theo loại</span>
                </a>
                <ul class="sub">
                    @foreach($types as $t)
                    <li><a  href="{{route('list_product',$t->id)}}">{{$t->name}}</a></li>
                    @endforeach
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>