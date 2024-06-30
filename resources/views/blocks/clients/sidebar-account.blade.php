<div class="col-lg-4">
    <aside class="bg-white p-2 p-md-3">
        <h3 class="fs-20 text-uppercase text-muted mb-2">{{Auth::user()->name}}</h3>
        <div class="nav nav-menu flex-column lavalamp" id="sidebar-1" role="tablist">
            <a href="{{route('thong-tin-nguoi-dung')}}">
                <i class="fs-24 icon-user"></i>Thông tin
            </a>
            <a href="{{route('lich-su-don-hang')}}">
                <i class="fs-24 icon-box"></i>Đơn hàng
            </a>
            <a href="{{route('doi-mat-khau')}}">
                <i class="fs-24 icon-lock"></i>Thay đổi mật khẩu
            </a>
        </div>
    </aside>
</div>