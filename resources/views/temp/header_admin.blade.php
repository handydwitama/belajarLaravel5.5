    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand">#</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="{{ route('login') }}">List User</a></li>
              <li><a href="{{ route('login') }}">List Barang</a></li>
              <li><a href="{{ route('login') }}">Laporan Penjualan</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="glyphicon glyphicon-log-in"></span> Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                  </form>
              </li>
            </ul>
          </div>
        </div>
    </nav>
