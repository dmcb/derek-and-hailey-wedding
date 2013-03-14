  	<div class="page">
  		<div class="wrapper">
  			<div class="section" id="tweets">
				<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
				<div class="twitter_box half" id="derek_tweets">
					<script>
						new TWTR.Widget({
							version: 2,
							type: 'profile',
							rpp: 4,
							interval: 30000,
							width: 368,
							height: 200,
							theme: {
								shell: {
									background: '#dbcbb0',
									color: '#5a3b08'
								},
								tweets: {
									background: '#f0e7d8',
									color: '#666666',
									links: '#f37a7a'
								}
							},
							features: {
								scrollbar: false,
								loop: false,
								live: true,
								behavior: 'all'
							}
						}).render().setUser('derekmcb').start();
					</script>
				</div>
				<div class="twitter_box" id="hailey_tweets">
					<script>
						new TWTR.Widget({
							version: 2,
							type: 'profile',
							rpp: 4,
							interval: 30000,
							width: 368,
							height: 200,
							theme: {
								shell: {
									background: '#dbcbb0',
									color: '#5a3b08'
								},
								tweets: {
									background: '#f0e7d8',
									color: '#666666',
									links: '#f37a7a'
								}
							},
							features: {
								scrollbar: false,
								loop: false,
								live: true,
								behavior: 'all'
							}
						}).render().setUser('haileymcb').start();
					</script>
				</div>
				<div class="twitter_picture">
					<img src="assets/images/derek_and_hailey_twitter.png" alt="" class="no_border" />
				</div>
			</div>
  		</div>
  	</div>
