

<!--  -->




<style>
.bnav {
  overflow: hidden;
  background-color: #347ce0;
}

.bnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.bnav a:hover {
  background-color: #79b3ed;
  color: #79b3ed;
}

.bnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>

<!--  -->
<div class="navbar">
           <div class="navbar-inner">
               <div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
             
							<div class="nav-collapse collapse">
							<ul class="nav" id="footer_nav">
			
		<li ><a class="bnav" href="index.php"><i class="icon-home"></i>&nbsp;Home</a></li>
			<li class="divider-vertical"></li>
		<li><a class = "bnav"href="#about" data-toggle="modal"><i class="icon-info-sign"></i>&nbsp;About</a></li>
		<?php include('about.php'); ?>
			<li class="divider-vertical"></li>
		<li><a  class = "bnav" href="calendar_of_events.php"><i class="icon-calendar"></i>&nbsp;Calendar of Events</a></li>
			<li class="divider-vertical"></li>
		<li><a class = "bnav" href="#directories" data-toggle="modal"><i class="icon-phone"></i>&nbsp;Contact us</a></li>
				<?php include('contact.php'); ?>
			
		
	
	</ul>
							</div>
                   <!--/.nav-collapse -->
               </div>
           </div>
</div>

	