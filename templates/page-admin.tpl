<div class="nperformance-app wrap">
	<div class="nperformance-container">
		<div class="nperformance-header">
			<div class="nperformance-title">
				<h1 class="nperformance-title-name"><?php esc_html_e( 'Welcome to Native Performance!', 'nperformance' ); ?></h1>
			</div>

			<div class="nperformance-content nperformance-style nperformance-colums-x6 nperformance-pX20">
				<div class="nperformance-grid-x1 nperformance-center">
					<svg style="width: 80px; height: 64px;" viewBox="0 0 116 89.804" width="218" height="218" xmlns="http://www.w3.org/2000/svg">
						<g>
							<title>background</title>
							<rect fill="none" id="canvas_background" height="402" width="582" y="-1" x="-1"/>
						</g>
						<g>
							<title>Layer 1</title>
							<circle id="svg_1" fill="#b277ff" r="16.2" cy="69.802" cx="71.6"/>
							<path id="svg_2" fill="#7734CA" d="m10.9,73.302a1.538,1.538 0 0 1 -1.5,-1.5l0,-54.3a8.839,8.839 0 0 1 9.1,-8.6l78.60001,0a1.5,1.5 0 0 1 0,3l-78.7,0a5.961,5.961 0 0 0 -6.1,5.6l0,54.3a1.391,1.391 0 0 1 -1.4,1.5z"/>
							<path id="svg_3" fill="#7734CA" d="m1.5,64.40199a1.538,1.538 0 0 1 -1.5,-1.5l0,-54.3a8.814,8.814 0 0 1 9,-8.6l78.60001,0a1.5,1.5 0 0 1 0,3l-78.50001,0a5.961,5.961 0 0 0 -6.1,5.6l0,54.3a1.473,1.473 0 0 1 -1.5,1.5z"/>
							<path id="svg_4" fill="#7734CA" d="m107,18.302l-78.7,0a8.9,8.9 0 0 0 -9.1,8.6l0,54.3a8.839,8.839 0 0 0 9.1,8.60001l78.6,0a8.9,8.9 0 0 0 9.1,-8.60001l0,-54.3a8.752,8.752 0 0 0 -9,-8.6zm-78.7,3l78.6,0a5.961,5.961 0 0 1 6.1,5.6l0,8l-90.7,0l0,-8a5.808,5.808 0 0 1 6,-5.6zm78.7,65.5l-78.7,0a5.961,5.961 0 0 1 -6.1,-5.60001l0,-43.3l90.7,0l0,43.3a5.66,5.66 0 0 1 -5.9,5.60001z"/>
							<circle id="svg_5" fill="#7734CA" r="2.7" cy="27.902" cx="31.2"/>
							<circle id="svg_6" fill="#7734CA" r="2.7" cy="27.902" cx="39.3"/>
							<circle id="svg_7" fill="#7734CA" r="2.7" cy="27.902" cx="47.3"/>
							<text transform="rotate(0.0213033, 67.7334, 61.0285)" font-style="italic" font-weight="bold" xml:space="preserve" text-anchor="start" font-family="Arvo, sans-serif" font-size="43" id="svg_8" y="76.02848" x="30.63342" stroke-width="0" fill="#7734CA">N P</text>
						</g>
					</svg>
				</div>
				<div class="nperformance-grid-x5"><?php esc_html_e( 'Easy Performance is an all-in-one complement that integrates, in a complete and robust core, a set of tools for the solution of common errors, optimization, performance and much more.', 'nperformance' ); ?></div>
			</div>
			<div class="nperformance-separator"></div>
			<div class="nperformance-content nperformance-colums-x6">
				<div class="nperformance-container nperformance-style nperformance-grid-x5">
					<?
						$op_nperformance = get_option('nperformance_modules');
						foreach ($op_nperformance as $option) {
					?>
					<div class="nperformance-box nperformance-content nperformance-colums-x6">
						<div class="nperformance-box nperformance-grid-x5">
							<h2 class="nperformance-title-box"><?=$option["title"]?></h2>
							<p class="nperformance-description-box"><?php esc_html_e($option["description"], 'nperformance'); ?></p>
						</div>
						<div class="nperformance-box nperformance-grid-x1 nperformance-center">
							<?php
								if(native_performance_active('dashicons')):
							?>
							<a href="#" class="nperformance-button active"><?php esc_html_e( 'Disable', 'nperformance'); ?></a>
							<?
								;else:
							?>
							<a href="#" class="nperformance-button"><?php esc_html_e( 'Enables', 'nperformance'); ?></a>
							<?
								endif;
							?>
						</div>
					</div>
					<hr class="nperformance-separator">
					<?
						}
					?>
					
				</div>
				<div class="nperformance-slider nperformance-grid-x1">
					<div class="nperformance-donations nperformance-style">
						<div class="nperformance-title nperformance-pX5">
							<h2><?php esc_html_e('Help us with your donation', 'nperformance'); ?></h2>
						</div>
						<div class="nperformance-body nperformance-pX5">
							<ul>
								<li><a target="_blank" href="https://www.paypal.me/QueCodig"><img width="12" src="data:image/svg+xml;base64,<?php echo base64_encode('<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90px" height="90px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve"><g><path id="PayPal" d="M58.057,0H18.649L1.189,80.146h23.124l5.664-26.558h16.521c15.803,0,29.019-9.744,32.562-26.312C83.064,8.521,69.612,0,58.057,0z M40.816,38.242H33.28l4.953-21.924h11.326c3.885,0,6.827,2.314,7.794,5.712c-0.496-0.086-0.956-0.235-1.498-0.235H44.53L40.816,38.242z M57.347,27.278c-1.379,5.95-7.033,10.698-12.79,10.921l2.711-12.023h10.267C57.473,26.543,57.448,26.897,57.347,27.278z M85.355,32.754c1.326-6.211,0.711-11.275-1.086-15.306c3.748,4.47,5.688,10.955,3.824,19.687C84.55,53.701,71.332,63.445,55.532,63.445h-16.52L33.349,90H10.223l0.96-4.381h19.428l5.663-26.555h16.521C68.597,59.064,81.813,49.32,85.355,32.754z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'); ?>"> <?php echo sprintf( __('Donate to %1$s', 'nperformance'), '@QuéCódigo'); ?></a></li>
								<li><a target="_blank" href="https://www.quecodigo.com"><?php echo sprintf( __('Visit the website of %1$s', 'nperformance'), '@QuéCódigo'); ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>