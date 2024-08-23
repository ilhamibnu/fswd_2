<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a class="ai-icon @if(request()->is('dashboard')) mm-active @endif" href="/admin/dashboard" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>

            </li>
            <li><a href="/admin/category" class="ai-icon @if(request()->is('data-kategori')) mm-active @endif" aria-expanded="false">
                    <i class="flaticon-381-file"></i>
                    <span class="nav-text">Kategori</span>
                </a>
            </li>

            <li><a href="/admin/product" class="ai-icon @if(request()->is('data-product')) mm-active @endif" aria-expanded="false">
                    <i class="flaticon-381-file"></i>
                    <span class="nav-text">Product</span>
                </a>
            </li>

            <li><a href="/admin/transaksi" class="ai-icon @if(request()->is('data-transaksi')) mm-active @endif" aria-expanded="false">
                    <i class="flaticon-381-file"></i>
                    <span class="nav-text">Transaksi</span>
                </a>
            </li>

            <li><a href="/admin/user" class="ai-icon @if(request()->is('data-user')) mm-active @endif" aria-expanded="false">
                    <i class="flaticon-381-file"></i>
                    <span class="nav-text">User</span>
                </a>
            </li>


        </ul>


    </div>
</div>
