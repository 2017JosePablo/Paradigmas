<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ordenar alfabéticamente elementos del html con jquery</title>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

		<script>
			$(function(){
				var mylist = $('#myId');
				var listitems = mylist.children('li').get();
				listitems.sort(function(a, b) {
				   var compA = $(a).text().toUpperCase();
				   var compB = $(b).text().toUpperCase();
				   return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
				})
				$.each(listitems, function(idx, itm) { mylist.append(itm); });
			});
		</script>

		<link rel="stylesheet" href="../css/diseno.css">
		
	</head>
	<h1>ordenar alfabéticamente elementos del html con jquery</h1>

		<ul id="myId">
			<li>w</li>
			<li>e</li>
      <li>a</li>
      <li>z</li>
			<li>x</li>
      <li>a</li>
			<li>m</li>
			<li>a</li>
		</ul>

	<body>


	</body>

</html>
