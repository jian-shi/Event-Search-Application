<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css'>
<table width="600" height='400' style="margin: auto">
	<td>
<form action="/results" method='get'>
	<input name='keyword' placeholder="keyword"/>
	<select name='location'><option value='' selected disabled>Location</option><option value='losangeles'>Los Angeles</option><option value='newyork'>New York</option><option value='philadelphia'>Philadelphia</option>
	</select>
	<select name="category"><option value='' selected disabled>Category</option><option value='sport'>Sport</option><option value='hospitality'>Hospitality</option>	</select>
	<button type="submit" class='btn'>&nbsp;Search &nbsp;</button>
</form></td>
</table>
<script src='https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js'></script>
