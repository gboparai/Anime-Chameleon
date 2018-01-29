	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Dubbed Anime Series</h3>
  		</div>
  		<div class="panel-body">	
			<div class="a-z text-center">
				<button id="All" type="button">All</button><button id="#" type="button">#</button><button id="A" type="button">A</button><button id="B" type="button">B</button><button id="C" type="button">C</button><button id="D" type="button">D</button><button id="E" type="button">E</button><button id="F" type="button">F</button><button id="G" type="button">G</button><button id="H" type="button">H</button><button id="I" type="button">I</button><button id="J" type="button">J</button><button id="K" type="button">K</button><button id="L" type="button">L</button><button id="M" type="button">M</button><button id="N" type="button">N</button><button id="O" type="button">O</button><button id="P" type="button">P</button><button id="Q" type="button">Q</button><button id="R" type="button">R</button><button id="S" type="button">S</button><button id="T" type="button">T</button><button id="U" type="button">U</button><button id="V" type="button">V</button><button id="W" type="button">W</button><button id="X" type="button">X</button><button id="Y" type="button">Y</button><button id="Z" type="button">Z</button>
			</div>
			<div class="anime-list">
				<ul id="anime-series">
					<?php foreach ($animes as $anime): ?>
						<li class="col-sm-6 col-md-4">
							<a href="<?php  echo site_url('anime/'.htmlentities(rawurlencode($anime->name))); ?>" title="Watch <?php echo $anime->name; ?>">
								<i class="fa fa-star" aria-hidden="true"></i>
								<?php echo $anime->name; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
        </div>
	</div>