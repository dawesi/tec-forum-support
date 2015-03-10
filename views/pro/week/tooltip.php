<script type="text/html" id="tribe_tmpl_tooltip">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">
		<h4 class="entry-title summary">[[=title]]</h4>

		<div class="tribe-events-event-body">
			<div class="duration">
				<abbr class="tribe-events-abbr updated published dtstart">[[=dateDisplay]] </abbr>
			</div>
			[[ if(imageTooltipSrc.length) { ]]
			<div class="tribe-events-event-thumb">
				<img src="[[=imageTooltipSrc]]" alt="[[=title]]" />
			</div>
			[[ } ]]
			[[ if(excerpt.length) { ]]
			<p class="entry-summary description">[[=raw excerpt]]</p>
			[[ } ]]
			[[ if(venue) { ]]
			<div class="entry-venue">Venue: <a href="[[=venue_link]]" style="display: inline; width: auto; height: auto; color:inherit; font-size: inherit;">[[=venue_title]]</a></div>
			[[ } ]]
			[[ if(organizer) { ]]
			<div class="entry-organizer">Organizer: [[=raw organizer]]</div>
			[[ } ]]
			[[ if(price) { ]]
			<div class="entry-price">Price: [[=raw price]]</a></div>
			[[ } ]]
			<span class="tribe-events-arrow"></span>
		</div>
	</div>
</script>