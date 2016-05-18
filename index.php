<?php
	include_once("connection.php");
//$conn = mysqli_connect("localhost","root","dbpass","dbname");
?>

<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Pie</title>
</head>
<body>
<nav> //navigation start	
	 <ul>
	 <div id="data-options">
	  <li><a class="active" href="index.php">Executive</a></li>
	  <li><a href="ptj.php">PTj</a></li>
	  </div>
	</ul>
</nav> //navigation end

<br><center><form method=post name=f1 action=''> //form start
<table border="0" cellspacing="0" >
<tr><td align=right > 
<select name=month value=''>Select Month</option>
<option value='January'>January</option>
<option value='February'>February</option>
<option value='March'>March</option>
</select>

</td><td align=right >
<select name=category value=''>Select Category</option>
<option value='Category'>Category</option>
<option value='Act'>Div Act</option>
</select>

</td><td align=right >
Year(yyyy)<input type=text name=year size=4 value=2016>
<input type=submit name=Submit value=Submit>
</table>

<?php
//$todo=$_POST['todo'];
if(isset($_POST['Submit']))
{
	$month=$_POST['month'];
	$year=$_POST['year'];
	$date_value="$month/$year";
	echo "$date_value<br>";
	$date_value="$year-$month";
	echo "$date_value<br>";
	$category=$_POST['category'];
	
	//if ($category == "Category")
	if(strcmp($category,'Category')==0)
	{
		echo "<h1>".$category."</h1>";
		$sql =	"SELECT name, total from ...."; 
		$res=mysqli_query($conn,$sql);
		$jsArray[] = array();
		foreach($res as $results)
		{
		 $jsArray[] = array($results['name'], (int)$results['Total']);
		}
?>
		  <br><br>
		<?php
			$sql = mysqli_query($conn, "SELECT name, total from ....");
			$rows = array();
			while($row = mysqli_fetch_object($sql))
			{
				$rows[] = $row;
			}
			echo "<strong>Dari segi kategori perkhidmatan ICT yang dilaksanakan pada bulan ini , kategori tertinggi adalah kategori ".$rows[0]->name." iaitu ".$rows[0]->Total." tiket, 
			diikuti dengan perkhidmatan ".$rows[1]->name." iaitu ".$rows[1]->Total." tiket, 
			manakala kategori perkhidmatan ketiga tertinggi adalah ".$rows[2]->name." iaitu ".$rows[2]->Total." tiket.</strong>";
		?>
			<br><br>

		<div id="piechart"></div>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
      var result = <?php echo json_encode($jsArray) ?>;
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable(result);

        var options = {
          title: 'Total Category',
          titleTextStyle: {fontName: 'Lato', fontSize: 18, bold: true},
          hAxis: {title: 'Age Range', titleTextStyle: {color: '#3E4827'}},
          height: 400,
          chartArea:{left:50,top:50,width:'100%',height:'85%'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
		alert(result[2]); // debug passing value from php to javascript
      }
    </script>
 </form>
 </div>
 </div>
 <footer class="footer-distributed">

			<div class="footer-right">

				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>

			</div>

			<div class="footer-left">

				<p class="footer-links">
					<a href="index.php">Home</a>
					.
					<a href="contact.php">Contact</a>
				</p>

				<p>Pusat Teknologi Maklumat 2016 | Universiti Tun Hussein Onn Malaysia</p>
			</div>

		</footer>

</div>
</body>
</html>
