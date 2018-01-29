	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $currentEps->nameAnime; ?> Episode <?php echo $currentEps->number; ?> English Dubbed</h3>
  		</div>
  		<div class="panel-body">
			<iframe id="video" src="<?php echo $currentEps->video; ?>" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" height="440" frameborder="0" width="100%"></iframe>
			<div class="block-container">
				<a class="btn btn-primary" href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($currentEps->nameAnime))); ?>">Anime Directory</a>
			</div>
			<ul class="next-episodes list-unstyled"> 
				<li class="col-md-4">
					<?php if ($prevEps){ ?>
						<div class="small-thumbnail">
							<a style="color:#000;" class="link-next" href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($prevEps->nameAnime)).'/'.$prevEps->number); ?>"" title="Watch <?php echo $prevEps->nameAnime; ?> Episode <?php echo $prevEps->number; ?>">
								<img src="<?php echo $prevEps->image; ?>" alt="<?php echo $prevEps->nameAnime; ?> Episode <?php echo $prevEps->number; ?>" title="<?php echo $prevEps->nameAnime; ?> Episode <?php echo $prevEps->number; ?>" width="160px" height="100px">
								<p>Episode <?php echo $prevEps->number; ?></p>
							</a> 
						</div>
					<?php } ?>
				</li>    
				<li class="col-md-4">
					<div class="small-thumbnail">
						<a style="color:#000;" class="link-next" href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($currentEps->nameAnime)).'/'.$currentEps->number); ?>"" title="Watch <?php echo $currentEps->nameAnime; ?> Episode <?php echo $currentEps->number; ?>">
							<img src="<?php echo $currentEps->image; ?>" alt="<?php echo $currentEps->nameAnime; ?> Episode <?php echo $currentEps->number; ?>" title="<?php echo $currentEps->nameAnime; ?> Episode <?php echo $currentEps->number; ?>" width="160px" height="100px">
							<p>
							<?php if(!( $currentEps->number == "Movie")) {?>
								Episode 
							<?php } ?><?php echo $currentEps->number; ?>
							</p>
						</a> 
					</div>
				</li>
				<li class="col-md-4">
					<?php if ($nextEps){ ?>
						<div class="small-thumbnail">
							<a style="color:#000;" class="link-next" href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($nextEps->nameAnime)).'/'.$nextEps->number); ?>"" title="Watch <?php echo $nextEps->nameAnime; ?> Episode <?php echo $nextEps->number; ?>">
								<img src="<?php echo $nextEps->image; ?>" alt="<?php echo $nextEps->nameAnime; ?> Episode <?php echo $nextEps->number; ?>" title="<?php echo $nextEps->nameAnime; ?> Episode <?php echo $nextEps->number; ?>" width="160px" height="100px">
								<p>Episode <?php echo $nextEps->number; ?></p>
							</a> 
						</div>
					<?php } ?>
				</li>
			</ul>
        </div>
		
	</div>