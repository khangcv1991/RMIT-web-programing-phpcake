<html lang="en">
<head>
<meta charset="utf-8">
<title>RMIT Cinema</title>
<link rel="stylesheet" type="text/css" href="css/background.css">
<link rel="stylesheet" type="text/css" href="css/homecss.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/myjs.js"></script>

<!-- slide show -->
<script type="text/javascript">
var slideimages = new Array() // create new array to preload images
slideimages[0] = new Image() // create new instance of image object
slideimages[0].src = "img/slide1.png" // set image src property to image path, preloading image in the process
slideimages[1] = new Image()
slideimages[1].src = "img/slide2.png"
slideimages[2] = new Image()
slideimages[2].src = "img/slide3.png"
</script>
<!-- end of slide show -->
</head>
<body>
	<div class="wrapper">
		<?php
		include_once ("header.php");
		include_once 'navigator.php';
		?>		
		<div class="slide-show">
			<a href="javascript:slidelink()"><img src="img/slide1.png" id="slide"
				width=940 height=350 /></a>
			<script type="text/javascript">
			//variable that will increment through the images
			var step = 0
			var whichimg = 0
			function slideShow(){
			 //if browser does not support the image object, exit.
			 if (!document.images)
			  return
			 document.getElementById("slide").src = slideimages[step].src
			 whichimg = step
			 if (step<2)
			  step++
			 else
			  step = 0
			 //call function "slideit()" every 3 seconds
			 setTimeout("slideShow()",3000)
			}

			function slidelink(){
				 if (whichimg == 0)
				  window.location = "link1.htm"
				 else if (whichimg == 1)
				  window.location = "link2.htm"
				 else if (whichimg == 2)
				  window.location = "link3.htm"
				}
			slideShow()
			</script>

		</div>
		<div class="body-wrapper">
			<div class="left-body-wrapper">
				<div id="mtabs">
					<div id="mtabs-nav">
						<ul id="mlink-tabs" onclick="addCSSToElement(event)">
							<li><a href="#tab-1" id="link-tab-1">In Showing</a></li>
							<li><a href="#tab-2" id="link-tab-2">Coming Soon</a></li>
							<li><a href="#tab-3" id="link-tab-3">Time Table</a></li>
						</ul>
					</div>
					<div class="mtabs-content">
						<div id="tab-1" style="display: block;">
							<div class="items-wrapper">
								<ul class="items">
									<li class="theme">
										<div class="item-wrapper" style="">
											<a href=""> <img alt="Ant Man" src="img/ant-man.png"
												height="280px" width="168px" class="movie-image" /> <img
												alt="" src="img/PG.png"
												style="position: absolute; padding-left: 141px; padding-top: 5px;" />
											</a>
											<div class="item-info">Ant Man</div>
										</div>
									</li>

									<li class="theme">
										<div class="item-wrapper" style="">
											<a href=""> <img alt="Force of Destiny"
												src="img/forceofdestiny.png" height="280px" width="168px"
												class="movie-image" /> <img alt="" src="img/CTC.png"
												style="position: absolute; padding-left: 141px; padding-top: 5px; height: 25px; width: 25px" />
											</a>
											<div class="item-info">Force of Destiny</div>
										</div>
									</li>

									<li class="theme">
										<div class="item-wrapper" style="">
											<a href=""> <img alt="Ben-Hur" src="img/ben-hur.png"
												height="280px" width="168px" class="movie-image" /> <img
												alt="" src="img/PG.png"
												style="position: absolute; padding-left: 141px; padding-top: 5px;" />
											</a>
											<div class="item-info">Ben-Hur</div>
										</div>
									</li>

									<li class="theme">
										<div class="item-wrapper" style="">
											<a href=""> <img alt="A Walk in the Woods"
												src="img/a-walk-in-the-woods.png" height="280px"
												width="168px" class="movie-image" /> <img alt=""
												src="img/M.png"
												style="position: absolute; padding-left: 141px; padding-top: 5px;" />
											</a>
											<div class="item-info">A Walk in the Woods</div>
										</div>
									</li>

									<li class="theme">
										<div class="item-wrapper" style="">
											<a href=""> <img alt="Straight Outta Compton"
												src="img/straight-outta-compton.png" height="280px"
												width="168px" class="movie-image" /> <img alt=""
												src="img/MA15+.png"
												style="position: absolute; padding-left: 141px; padding-top: 5px; height: 25px; width: 25px" />
											</a>
											<div class="item-info">Straight Outta Compton</div>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div id="tab-2" style="display: block;">
							<ul class="items">
								<li class="theme">
									<div class="item-wrapper" style="">
										<a href=""> <img alt="" src="img/life.png" height="280px"
											width="168px" class="movie-image" /> <img alt=""
											src="img/MA15+.png"
											style="position: absolute; padding-left: 141px; padding-top: 5px; height: 25px; width: 25px" />
										</a>
										<div class="item-info">Life</div>
									</div>
								</li>

								<li class="theme">
									<div class="item-wrapper" style="">
										<a href=""> <img alt="" src="img/the-scorch-trials.png"
											height="280px" width="168px" class="movie-image" /> <img
											alt="" src="img/M.png"
											style="position: absolute; padding-left: 141px; padding-top: 5px;" />
										</a>
										<div class="item-info">The Scorch Trials</div>
									</div>
								</li>

								<li class="theme">
									<div class="item-wrapper" style="">
										<a href=""> <img alt="" src="img/umrika.png" height="280px"
											width="168px" class="movie-image" /> <img alt=""
											src="img/M.png"
											style="position: absolute; padding-left: 141px; padding-top: 5px;" />
										</a>
										<div class="item-info">Umrika</div>
									</div>
								</li>

								<li class="theme">
									<div class="item-wrapper" style="">
										<a href=""> <img alt="" src="img/oddball.png" height="280px"
											width="168px" class="movie-image" /> <img alt=""
											src="img/CTC.png"
											style="position: absolute; padding-left: 141px; padding-top: 5px; height: 25px; width: 25px" />
										</a>
										<div class="item-info">Oddball</div>
									</div>
								</li>

								<li class="theme">
									<div class="item-wrapper" style="">
										<a href=""> <img alt="" src="img/the-evil-dead.png"
											height="280px" width="168px" class="movie-image" /> <img
											alt="" src="img/18+.png"
											style="position: absolute; padding-left: 141px; padding-top: 5px; height: 25px; width: 25px" />
										</a>
										<div class="item-info">The Evil Dead</div>
									</div>
								</li>
							</ul>
						</div>
						<div id="tab-3"
							style="display: block; position: absolute; padding-left: 80px;">
							<table>

								<tr>
									<th>Time</th>
									<th>Mon - Tue</th>
									<th>Wed - Thur - Fri</th>
									<th>Sat - Sun</th>
								</tr>


								<tr>
									<th>12:00pm</th>

									<td></td>
									<td></td>
									<td class="normal-price">Childrens</td>



								</tr>

								<tr>
									<th>1:00pm</th>

									<td class="discount-price">Childrens</td>


									<td class="discount-price">Romantic Comedy</td>

									<td></td>

								</tr>

								<tr>
									<th>3:00pm</th>

									<td></td>
									<td></td>

									<td class="normal-price">Art / Foreign</td>


								</tr>

								<tr>
									<th>6:00pm</th>

									<td class="discount-price">Art / Foreign</td>


									<td class="normal-price">Childrens</td>
									<td class="normal-price">Romantic Comedy</td>



								</tr>

								<tr>
									<th>9:00pm</th>
									<td class="discount-price">Romantic Comedy</td>

									<td class="normal-price">Action</td>

									<td class="normal-price">Action</td>

								</tr>
							</table>
							<div class="legend-color" style="margin-top: 20px;">
								<div class="discount-price"
									style="width: 120px; height: 40px; float: right; text-align: center; padding-top: 5px; margin-left: 10px;">normal
									price</div>
								<div class="normal-price"
									style="width: 120px; height: 40px; float: right; text-align: center; padding-top: 5px;">discount
									price</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="right-body-wrapper"></div>
		</div>		
		<?php
		include_once 'footer.php';
		?>
	</div>
</body>
</html>