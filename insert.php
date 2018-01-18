<!DOCTYPE html>
<head>
<title>Enter metadata for dataset</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<style>

fieldset {
	border:2px solid grey;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;	
	border-radius:8px;
	}

	body {
	 font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	}

	input, textarea, select{font-family:inherit;}

	.input{
	padding:5px;
	font-size:16px;
	}
	
input[type=text], select {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
	}

textarea {
	width: 100%;
	height: 150px;
	padding: 12px 20px;
	box-sizing: border-box;
	<!--border: 2px solid #ccc;-->
	border: 1px solid #ccc;
	border-radius: 4px;
	<!--background-color: #f8f8f8;-->
	font-size: 16px;
	resize: none;
	<!-- AJOUTS -->
	margin: 8px 0;
	margin-top: 8px;
	}

input[type=date], select {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
	}

input[type=submit] {
	width: 100%;
	background-color: #4CAF50;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	}

input[type=submit]:hover {
	background-color: #45a049;
	}

#map {
	height: 400px;
    width: 100%;
	}

.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}
	
</style>
</head>
<body>

<br>

<table width="100%">
<tr><td valign="bottom" style="font-size: 24pt;">&nbsp;&nbsp;Enter metadata for dataset</td>
<td align="right"><img src="img/logoGRIL_color.png" height=40></td>
<td width=20>&nbsp;&nbsp;</td></tr>
</table>

<br>

<form name="insert" action="insert.php" method="POST" >

<br>

<span title="Username"><label class="tooltip">Username:</label></span>
<select type="text" name="username" placeholder="Username">

<?php
$conn = pg_connect("host=localhost port=5432 dbname=gril user=test password=test");
$query = "SELECT username, first_name, last_name FROM test.users ORDER BY last_name, first_name";
$result = pg_query($conn, $query);
if (!$result) {
  echo "Une erreur est survenue.\n";
  exit;
}
while ($row = pg_fetch_assoc($result)) {
echo '<option value="' . $row["username"] . '">' .  $row["last_name"] . ', ' . $row["first_name"] . '</option>';}
?>
</select>

<br><br><br>

<fieldset>
<legend>Dataset</legend>
<span title="Provide a descriptive title. "><label class="tooltip">Title of dataset:</label></span><input type="text" name="title_dataset" placeholder="Provide a descriptive title. " />
<span title="Provide the URL of the data repository for the dataset. For the manuscript review stage, it is acceptable to say that this is forthcoming upon paper acceptance. "><label class="tooltip">URL of dataset:</label></span><input type="text" name="url_dataset" placeholder="Provide the URL of the data repository for the dataset. For the manuscript review stage, it is acceptable to say that this is forthcoming upon paper acceptance. " />
<span title="Describe the study and the associated data in text form. "><label class="tooltip">Abstract:</label></span><textarea name="abstract" placeholder="Describe the study and the associated data in text form. "></textarea>
<span title="The significant words or phrases of the dataset"><label class="tooltip">Keywords:</label></span><input type="text" name="keywords" placeholder="The significant words or phrases of the dataset" />
</fieldset>

<br><br>

<fieldset>
<legend>Author</legend>
<span title="The person responsible for compiling these metadata and posting these data. This may be the same as the primary contact person (below) or different. "><label class="tooltip">Dataset lead author:</label></span><input type="text" name="dataset_lead_author" placeholder="The person responsible for compiling these metadata and posting these data. This may be the same as the primary contact person (below) or different. " />
<span title="Job title of the data author and category (e.g., principle investigator, graduate student, post-doctoral researcher, staff, or other)"><label class="tooltip">Position of data author:</label></span><input type="text" name="position_data_author" placeholder="Job title of the data author and category (e.g., principle investigator, graduate student, post-doctoral researcher, staff, or other)" />
<span title="Address of the author during the collection of the data, as well as current address if it is different"><label class="tooltip">Address of data author:</label></span><input type="text" name="address_data_author" placeholder="Address of the author during the collection of the data, as well as current address if it is different" />
<span title="Current email address of the author"><label class="tooltip">Email address of data author:</label></span><input type="text" name="email_data_author" placeholder="Current email address of the author" />

</fieldset>

<br><br>

<fieldset>
<legend>Primary contact person</legend>
<span title="The person who is ultimately responsible for the data, if it is different than the data author. "><label class="tooltip">Primary contact person for dataset:</label></span><input type="text" name="primary_contact_person" placeholder="The person who is ultimately responsible for the data, if it is different than the data author. " />
<span title="Job title of the primary contact person and category (e.g. principal investigator, graduate student, post-doctoral researcher, staff, or other)"><label class="tooltip">Position of primary contact person:</label></span><input type="text" name="position_primary_contact_person" placeholder="Job title of the primary contact person and category (e.g. principal investigator, graduate student, post-doctoral researcher, staff, or other)" />
<span title="Current work address"><label class="tooltip">Address of primary contact person:</label></span><input type="text" name="address_primary_contact_person" placeholder="Current work address" />
<span title="Current email address"><label class="tooltip">Email address of primary contact person:</label></span><input type="text" name="email_address_primary_contact_person" placeholder="Current email address" />
</fieldset>

<br><br>

<fieldset>
<legend>Organization and usage rights</legend>
<span title="Organization associated with the data if other than the organization of the data author or contact person"><label class="tooltip">Organization associated with the data:</label></span><input type="text" name="organization" placeholder="Organization associated with the data if other than the organization of the data author or contact person" />
<span title="Intended usage rights; the default should be 'publicly available and free to use', unless restrictions to sharing and using the data are needed, which must be approved by the Editor-in-Chief"><label class="tooltip">Usage Rights:</label></span><input type="text" name="usage_rights" placeholder="Intended usage rights; the default should be 'publicly available and free to use', unless restrictions to sharing and using the data are needed, which must be approved by the Editor-in-Chief" />
</fieldset>

<br><br>

<fieldset>
	<legend>Geographic coverage</legend>
	<table cellspacing="20">
		<tr><td width=50% valign="top"><span title="Text description of the region of study as well as finer-scaled information"><label class="tooltip">Geographic region:</label></span><input type="text" name="geographic_region" placeholder="Text description of the region of study as well as finer-scaled information" />
		<label>North:</label><input type="text" name="ne_latitude" id="ne_latitude" value="" readonly />
		<label>South:</label><input type="text" name="sw_latitude" id="sw_latitude" value="" readonly />
		<label>East:</label><input type="text" name="ne_longitude" id="ne_longitude" value="" readonly />
		<label>West:</label><input type="text" name="sw_longitude" id="sw_longitude" value="" readonly /></td>
		<td align="right"><div id="map"></div></td></tr>
	</table>
</fieldset>

<br><br>

<fieldset>
	<legend>Temporal coverage</legend>
	<table cellspacing="20" width=100%>
		<tr><td width=50%><span title="Begin date of the observations that are included in the dataset"><label class="tooltip">Begin date:</label></span><input type="date" name="temporal_coverage_begin_date" placeholder="Begin date of the observations that are included in the dataset" /></td>
		<td><span title="End date of the observations that are included in the dataset"><label class="tooltip">End date:</label></span><input type="date" name="temporal_coverage_end_date" placeholder="End date of the observations that are included in the dataset" /></td></tr>
	</table>
</fieldset>

<br><br>

<fieldset>
<legend>Study design</legend>
<span title="Describe the overall study design (i.e., field survey, field experiment, laboratory experiment) along with sufficient details to understand the data collected. "><label class="tooltip">General study design:</label></span><input type="text" name="general_study_design" placeholder="Describe the overall study design (i.e., field survey, field experiment, laboratory experiment) along with sufficient details to understand the data collected. " />
<span title="Describe the steps followed in the study within the above study design, which should be a detailed description of the above study design. "><label class="tooltip">Methods description:</label></span><input type="text" name="methods_description" placeholder="Describe the steps followed in the study within the above study design, which should be a detailed description of the above study design. " />
<span title="Describe the lab, field, or other processing methods for each variable included in the data table. This section may, and should, be long. You should insert additional rows in this table to complete this section. "><label class="tooltip">Laboratory, field, or other analytical methods:</label></span><input type="text" name="laboratory_field_analytical_methods" placeholder="Describe the lab, field, or other processing methods for each variable included in the data table. This section may, and should, be long. You should insert additional rows in this table to complete this section. " />
<span title="Describe the steps taken for quality control of the data provided. "><label class="tooltip">Quality control:</label></span><input type="text" name="quality_control" placeholder="Describe the steps taken for quality control of the data provided. " />
<span title="Any additional information that may help future users of the data not included in the above rows, or in the table below. "><label class="tooltip">Additional information:</label></span><input type="text" name="additional_information" placeholder="Any additional information that may help future users of the data not included in the above rows, or in the table below. " />
</fieldset>

<br><br>

<input type="submit" value="Soumettre" />

</form>

<br><br>

<table width="100%">
<tr><td valign="bottom" style="font-size: 24pt;"></td>
<td align="right"><img src="img/logoGRIL_color.png" height=40></td>
<td width=20>&nbsp;&nbsp;</td></tr>
</table>

<br><br>

<script>
  
  var rectangle;
  var map;
  var infoWindow;

  function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
	  center: {lat: 53.5, lng: -68.5}, zoom: 3});
	var bounds = {north: 63, south: 44, east: -56, west: -81};
	rectangle = new google.maps.Rectangle({bounds: bounds, editable: true, draggable: true});
	rectangle.setMap(map);
	// Add an event listener on the rectangle.
	rectangle.addListener('bounds_changed', showNewRect);
	document.getElementById('ne_latitude').value = bounds.north;
	document.getElementById('sw_latitude').value = bounds.south;
	document.getElementById('ne_longitude').value = bounds.east;
	document.getElementById('sw_longitude').value = bounds.west;
	}

  function showNewRect(event) {
	var ne = rectangle.getBounds().getNorthEast();
	var sw = rectangle.getBounds().getSouthWest();
	document.getElementById('ne_latitude').value = ne.lat();
	document.getElementById('sw_latitude').value = sw.lat();
	document.getElementById('ne_longitude').value = ne.lng();
	document.getElementById('sw_longitude').value = sw.lng();

  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSoKVAiUE1tNYYgZHG1ytaWyL9UAWd5Ag&callback=initMap">
</script>

</body>
</html>
<?php
$conn = pg_connect("host=localhost port=5432 dbname=gril user=test password=test");
$query = "INSERT INTO test.fiche_metadonnees (username,title_dataset,url_dataset,abstract,keywords,dataset_lead_author,position_data_author,address_data_author,email_data_author,
primary_contact_person,position_primary_contact_person,address_primary_contact_person,email_primary_contact_person,
organization,usage_rights,ne_latitude,sw_latitude,ne_longitude,sw_longitude,
general_study_design,methods_description,laboratory_field_analytical_methods,quality_control,additional_information) VALUES ('$_POST[username]','$_POST[title_dataset]','$_POST[url_dataset]','$_POST[abstract]','$_POST[keywords]','$_POST[dataset_lead_author]',
'$_POST[position_data_author]','$_POST[address_data_author]','$_POST[email_data_author]',
'$_POST[primary_contact_person]','$_POST[position_primary_contact_person]',
'$_POST[address_primary_contact_person]','$_POST[email_primary_contact_person]',
'$_POST[organization_associated_with_the_data]','$_POST[usage_rights]',
'$_POST[ne_latitude]','$_POST[sw_latitude]','$_POST[ne_longitude]','$_POST[sw_longitude]',
'$_POST[general_study_design]','$_POST[methods_description]','$_POST[laboratory_field_analytical_methods]',
'$_POST[quality_control]','$_POST[additional_information]')";
$result = pg_query($conn, $query);
// echo $query;
// echo $result;
?>