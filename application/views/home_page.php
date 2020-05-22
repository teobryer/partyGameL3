	<div class="h-100 container-fluid">

		<div class="h-100 row align-middle">
			<div class="col my-auto" style="text-align:center">
				<a href='<?php base_url() ?>game/reloadNewGame'>
					<svg width="310" height="310">
						<circle cx="155" cy="155" r="150" fill="#007bff" />
						<text x="50%" y="50%" text-anchor="middle" fill="white" font-size="25px" font-family="Arial"
							dy=".3em">New Game</text>
						Sorry, your browser does not support inline SVG.
					</svg>
				</a>
			</div>
<?php

if($this->session->has_userdata('instancePartie')) {


		echo	'<div class="col my-auto" style="text-align:center">'.
				"<a href='". base_url()."game'>".
					'<svg width="310" height="310">
						<circle cx="155" cy="155" r="150" fill="#dc3545"/> 
						<text x="50%" y="50%" text-anchor="middle" fill="white" font-size="25px" font-family="Arial"
							dy=".3em">Resume Game</text>
						Sorry, your browser does not support inline SVG.
					</svg>
				</a>
			</div>';

}
			?>
		
		</div>

	</div>
