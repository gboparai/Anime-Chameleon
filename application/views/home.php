	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-home" aria-hidden="true"></i> Anime Chameleon - Watch English Dubbed Anime Online Free</h3>
  		</div>
  		<div class="panel-body">	
            <strong>Anime Chameleon</strong> is an Anime streaming site where you can Watch English Dub's of Anime's completely free.
        </div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Latest Episodes</h3>
  		</div>
  		<div id="episodes-latest" class="panel-body">
			<?php foreach ($episodes as $key => $episode): ?>
				
				<div class="thumbnail-content col-sm-6 col-md-3">
					<div class="thumbnail">
						<div class="thumbnail-title"><?php echo $episode->nameAnime; ?></div>
						<a href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($episode->nameAnime)).'/'.$episode->number); ?>" title="Watch <?php echo $episode->nameAnime; ?> Episode <?php echo $episode->number; ?>"><img src="<?php echo $episode->image; ?>" alt="<?php echo $episode->nameAnime; ?>" title="Watch <?php echo $episode->nameAnime; ?> Episode <?php echo $episode->number; ?>"></a>
						<div class="thumbnail-info">
							<p><a href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($episode->nameAnime)).'/'.$episode->number); ?>" class="btn btn-primary btn-sm pull-right thumbnail--btn" role="button" title="Watch <?php echo $episode->nameAnime; ?> Episode <?php echo $episode->number; ?>"> Watch 
							<?php if(!( $episode->number == "Movie")) {?>
							Episode 
							<?php } ?><?php echo $episode->number; ?></a></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
        </div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Latest Anime</h3>
  		</div>
  		<div id="animes-latest" class="panel-body">	
			<?php foreach ($animes as $anime): ?>
				<div class="thumbnail-content col-sm-6 col-md-4 col-lg-4">
					<div class="thumbnail">
						<div class="thumbnail-title"><?php echo $anime->name; ?></div>
						<a href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($anime->name))); ?>" title="Watch <?php echo $anime->name; ?>"><img src="<?php echo $anime->image; ?>" alt="<?php echo $anime->name; ?>" title="Watch <?php echo $anime->name; ?>"></a>
						<div class="thumbnail-info">
							<p><a href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($anime->name))); ?>" class="btn btn-primary btn-sm pull-right thumbnail--btn" role="button" title="Watch <?php echo $anime->name; ?>"> Watch </a></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
        </div>
	</div>