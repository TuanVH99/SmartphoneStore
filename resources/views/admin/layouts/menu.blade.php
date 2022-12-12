<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Bảng điều khiển</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Danh mục sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('category.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('category.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-check-circle" aria-hidden="true"></i> Thương hiệu sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('brand.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('brand.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-dropbox" aria-hidden="true"></i> Sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('product.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('product.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Nhà cung cấp<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('producer.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('producer.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-film" aria-hidden="true"></i> Slide<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('slide.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('slide.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Tin tức<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('article.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('article.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-ticket" aria-hidden="true"></i> Mã khuyến mãi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('promotion.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('promotion.add.form') }}">Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Người dùng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('customer.list') }}">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-weixin" aria-hidden="true"></i> Liên hệ<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('contact.list') }}">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> Đánh giá<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('comment.list') }}">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Đơn hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('order.list') }}">Danh sách</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>