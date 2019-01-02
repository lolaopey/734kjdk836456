<!DOCTYPE html>
<html>
	<head>
		<title>Mindfury Test</title>
			<link href="CSS/page.css" type="text/css" rel="stylesheet" />
			<link href="CSS/allelements.css" type="text/css" rel="stylesheet" />
			<link href="CSS/text.css" type="text/css" rel="stylesheet" />
			
			<meta name="viewpoint" content="width=device-width">
				
				<style>
					@media only screen and (max-width: 768px){
						article{
								border: 3px solid purple;
								width: 	90%;
								}
								
								#b2{
									float:none;
								}
								
								.main_aside{
									width: 		90%;
	
									}		
						}
			</style>
	</head>
		<body>
			<header><h1>CRYPTOCURRENCY</h1></header>
				<article>
					<aside class="main_aside">
						<section id="b1">
							<hgroup>
								<h2>GBP</h2>
								<h2>1</h2> 
								<h3>Bitcoin</h3>
							</hgroup>
								<p id="view1"></p>
									<input type='text' name='bit' id='bit'/>
								<p id="view2"></p>
						</section>
							
						<section id="b2">
							<hgroup>
								<h2>GBP</h2>
								<h2>1</h2> 
								<h3>SmartCash</h3>
							</hgroup>	
								
								<p id="view3"></p>
									<input type='text' name='sma' id='sma'/>
								<p id="view4"></p>
						</section>	

						
					</aside>
			<section>
							<button onclick="myFunction()">Get Rates</button>
						</section>
					<aside><p>Ratio:is 1 Bitcoin / Smartcash</p></aside>
					<aside><p>Ratio:is 1 Smartcash / Bitcoin </p></aside>
				</article>	
<!--this is where the view would be for the ratio's-->				
					
			<footer><p>Copyright Design By Lola Opeyokun</p></footer>
	
			<script type="text/javascript">
			
				function myFunction(){
					
					var bit = document.getElementById("bit").value;
					var sma = document.getElementById("sma").value;			
							//document.getElementById("view1").innerHTML = bit;
							//document.getElementById("view2").innerHTML = sma;
										
						makeRequest('BITCOIN.php', bit, sma);
							}
								
						//I would capture the url's in an array and loop through and call the makeRequest function 
						//if i had more time. Code does not show currency for smartcash as data did not display GBP.
								
							
				function makeRequest(url, bit, sma){
					var req;
						req = new XMLHttpRequest();
							req.open('POST', url);
							req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
							req.send('bit=' + encodeURIComponent(bit) + '&sma=' + encodeURIComponent(sma));
						req.onreadystatechange = function(){
							if(req.readyState == 4){
							if(req.status == 200){
							if(this.responseText!=null){
					var response = JSON.parse(this.responseText);   
							document.getElementById("view1").innerHTML = response.BITCOIN;
							document.getElementById("view2").innerHTML = response.CONVERTER;
							document.getElementById("view3").innerHTML = response.SMART;
							document.getElementById("view4").innerHTML = response.SMACONVERTER;
							//document.getElementById("sma").innerHTML = response.Sma;
				}
					}
						}
							} 
								}
								
			</script>
		</body>
</html>

