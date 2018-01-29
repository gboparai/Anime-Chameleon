<header class="text-center">
	<a href="/"><img id="logo" src="<?php echo site_url('img/Anime.png'); ?>"></a>
</header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">ACH</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/animes">Anime List</a></li>
        <li><a href="/genres">Genres</a></li>
      </ul>
		<div class="navbar-form navbar-right">
        <div class="form-group">
          <input class="form-control" placeholder="Search" id="search" type="text">
        </div>
        <button id="searchbutton" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>