<?php 

// function to 'clean' data
function clean_input($data) {
	$data = trim($data);	
	$data = htmlspecialchars($data); //  needed for correct special character rendering
	return $data;
}

function get_data($dbconnect, $more_condition=null) {
	// q = quotes from tables
	// a = author from tables
	// s = s1, s2, and s3 are subjects

	$find_sql = "SELECT 
		fish.*, 
		c1.Color AS color1, 
		c2.Color AS color2
		FROM fish
		JOIN colors AS c1 ON fish.mainColor1_ID = c1.Color_ID
		JOIN colors AS c2 ON fish.mainColor2_ID = c2.Color_ID;
";

	if ($more_condition) {
		$find_sql .= $more_condition;
		echo "<span style='background-color:red;'>".$find_sql."</span>";
	}
	// Add extra string onto find sql
	$find_query = mysqli_query($dbconnect, $find_sql);
	$find_count = mysqli_num_rows($find_query);

	return array($find_query, $find_count);
}


?>
<script>
function isOverflown ({ clientWidth, clientHeight, scrollWidth, scrollHeight }) {return scrollHeight > clientHeight || scrollWidth > clientWidth;}
</script>