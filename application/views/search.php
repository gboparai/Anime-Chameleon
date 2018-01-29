	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Search &quot;<?php echo $query; ?>&quot;</h3>
  		</div>
  		<div class="panel-body">
			<?php if($animes){ ?>
				<?php foreach ($animes as $anime): ?>
					<div class="anime-preview">
						<h4><a href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($anime->name))); ?>" ><?php echo $anime->name; ?></a></h4>
						<p><?php echo $anime->description; ?></p>
					</div>
				<?php endforeach; ?>
			<?php } else { ?>
				<h4>No Matching Entries Found</h4>
			<?php } ?>
        </div>
		
	</div>