<table id="calendar">
	<thead>
		<tr>
			<td v-for="day in day_names">
				<section v-for="lang in day">{{lang}}</section>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr v-for="week in grid">
			<td v-for="day in week" v-bind:id="'day_'+day">
				<section>
					{{day}}
				</section>
			</td>
		</tr>
	</tbody>
</table>

<script>



var vue_calendar = new Vue({
  el: '#calendar',
  data: {
  	day_names: [['poniedziałek','montag'],['wtorek','tuesday'],['środa','wednseday'],['czwartek','thursday'],['piątek','friday'],['sobota','saturday'],['niedziela','sunday']],
  	grid: grid_array
  }
});


</script>



