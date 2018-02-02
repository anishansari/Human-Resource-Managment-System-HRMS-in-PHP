<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->


			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
						
                           <div class="menu">
									<ul id="menu" >
										<li><a href="home.php"><i class="fa fa-tachometer"></i> <span>Dashboard	</span><div class="clearfix"></div></a></li>

										<li><a href="#"><i class="fa fa-user"></i><span>Employee</span><span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
											<ul>
												<li><a href="employeeadd.php">Add Employee</a></li>
												<li><a href="employeeview.php">Employee View</a></li>
												<li><a href="atten.php">Attendece Details</a></li>
												<li><a href="modifiedlogout.php">Modified Logout Time</a></li>
											<!-- 	<li><a href="inquiry.php">Inquiry</a></li>--> 
											</ul>
										</li>
										<li><a href="#"><i class="fa fa-users"></i><span>Designation</span><span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
											<ul>
												<li><a href="Designation.php">Add Designation</a></li>
											
												
											</ul>
										</li>
                                        
                                        <li><a href="#"><i class="fa fa-tasks"></i><span>Project</span><span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
											<ul>
												<li><a href="project.php">Add Project</a></li>
												<li><a href="viewproject.php">View Project</a></li>
												
												
											</ul>
										</li>
                                        <li><a href="#"><i class="fa fa-bell"></i><span>Vacancies</span><span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
											<ul>
												<li><a href="vacancy.php">Add Vacancies</a></li>
												<li><a href="viewvacancy.php"> View Vacancies</a></li>
												
											</ul>
										</li>
                                        
                                        
                                        <li><a href="#"><i class="fa fa-money"></i><span>Salary</span><span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
											<ul>
												
												<li><a href="salary.php"> View Salary</a></li>
												
											</ul>
										</li>
                                        
										<li><a href="#"><i class="fa fa-pagelines"></i><span>Leave</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										  	<ul>
										  		<li><a href="leaverequest.php">Request leave</a></li>
												 <li><a href="addleave.php">Apply Leave</a></li> 
												<li><a href="workingdayadd.php">Working Day</a></li>
											</ul>
										</li>

										
							        	<li id="menu-academico" ><a href="changepassword.php"><i class="fa fa-cogs"></i><span>Change Password</span></a> <!-- <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div>
										 <ul id="menu-academico-sub">
											<li id="menu-academico-avaliacoes" ><a href="changepassword.php">Change Password</a></li>
											

										  </ul> -->
									 	</li>

										<!-- <li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Forms</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										  	<ul>
												<li><a href="employeeadd.php">All Employee</a></li>
											</ul>
										</li> -->

										
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											``````````````````````````````````````````````````````````````````````````````toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>