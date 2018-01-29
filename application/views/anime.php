
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $anime->name; ?></h3>
  		</div>
  		<div class="panel-body">	
			<img class="col-md-3" style="padding-bottom:10px" src="<?php echo $anime->image; ?>" title="<?php echo $anime->name; ?>" alt="<?php echo $anime->name; ?>" />
			<p class="col-md-9">
				<strong>Title</strong> <?php echo $anime->name; ?><br/>
				<strong>Year</strong> <?php echo $anime->year; ?><br/>
				<strong>Status</strong> <?php echo $anime->status; ?><br/>
				<strong>Genres</strong>
					<?php foreach ($genres as $genre): ?>
						<?php echo $genre->genre;?>, 
					<?php endforeach; ?><br/>
				<strong>Description</strong><br/>
				<?php echo $anime->description; ?>
			</p>
			<div id="episodes-container" class="col-md-12">
				<h4>Episodes</h4>
				<ul id="episodes-list" class="list-group">
					<?php foreach ($episodes as $episode): ?>
						<li class="list-group-item col-xs-12 col-md-6">
							<a href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($episode->nameAnime)).'/'.$episode->number); ?>" title="Watch <?php echo $episode->nameAnime; ?> Episode <?php echo $episode->number; ?>"><?php echo $anime->name; ?> 
							<?php if(!( $episode->number == "Movie")) {?>
							Episode <?php echo $episode->number; ?>
							<?php } ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
        </div>
	</div>