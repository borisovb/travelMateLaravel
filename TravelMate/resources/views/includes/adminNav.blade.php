<div class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a href="../" class="navbar-brand">TravelMate Panel</a>
      @if (auth()->user()->isAdmin)
      <span class="badge badge-danger">Admin</span>
      @elseif(auth()->user()->isEditor)
      <span class="badge badge-success">Editor</span>
      @else
      <span class="badge badge-info">Member</span>
      @endif
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/admin"><i class="fas fa-newspaper"></i> Stories</a>
          </li>
          @if (auth()->user()->isAdmin)
          <li class="nav-item">
            <a class="nav-link" href="/admin/users"><i class="fas fa-users-cog"></i> Users</a>
          </li>
          @endif
        </ul>

        <ul class="nav navbar-nav ml-auto">
                @if (auth()->user()->isAdmin)
                <li class="nav-item">
                    <a class="nav-link" href="/" target="_blank"><i class="fas fa-download"></i> Export Users</a>
                </li>
                @endif
          <li class="nav-item">
            <a class="nav-link" href="/" target="_blank">Back <i class="fas fa-caret-square-right"></i></a>
          </li>
        </ul>

      </div>
    </div>
  </div>
<br>
