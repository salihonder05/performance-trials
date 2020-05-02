<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body id="body">
	
	




	<script>

		var url = "service.php";
		var questorUrl = "service.php?getQueryID=True";





		if(window.localStorage.getItem('localQueryID') !== null) {
			// Local Query ID Var ise...
				var localQueryID = window.localStorage.getItem('localQueryID');

				$.getJSON(questorUrl, function(data) {
					var queryID = data[0].key;
					//document.write(data[0].key);
				if (queryID === localQueryID) {
					// Sorgu sonucunda son query id aynı bulundu, değişiklik talep edilmedi.
						var data = window.localStorage.getItem('siteData');
						data = JSON.parse(data);
						const copy = []; 
						data.forEach(function(item){ 
							copy.push('ID: ' + item.id + '=' + item.number + '<br>'); 
						}); 
						document.write(copy); 
				}
				else {
					// Sorgu sonucunda son query farklı bulundu, değişiklik istendi.
						$.getJSON(url, function(data) {
							data = JSON.stringify(data);
							var queryID = data[0].key;
							//İlk defa ziyaret edildi. Query ID kaydedildi.
							var localQueryID = window.localStorage.setItem('localQueryID', queryID);
							var localQueryID = window.localStorage.setItem('siteData', data);

							var data = window.localStorage.getItem('siteData');
							data = JSON.parse(data);
							const copy = []; 
							data.forEach(function(item){ 
								copy.push(item.number + '<br>'); 
							}); 
							document.write(copy); 
					})
				}
				})


		}
		else {
			// Local Query ID Yok ise...
				$.getJSON(questorUrl, function(data) {
					var queryID = data[0].key;
					//İlk defa ziyaret edildi. Query ID kaydedildi.
					var localQueryID = window.localStorage.setItem('localQueryID',queryID);
				})
				$.getJSON(url, function(data) {
					//İlk defa ziyaret edildi. Datalar kaydedildi.
					data = JSON.stringify(data);
					var localQueryID = window.localStorage.setItem('siteData',data);
				})
				var data = window.localStorage.getItem('siteData');
				data = JSON.parse(data);
				const copy = []; 
				data.forEach(function(item){ 
					copy.push(item.number + '<br>'); 
				}); 
				document.write(copy); 

		}

		
		


	</script>

</body>
</html>