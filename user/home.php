<?php include('userheader.php'); ?>
               <div class="s-12 l-10">
               <h1>Home</h1><hr>
               <div class="clearfix"></div>
               </div>
               <div class="s-12 l-6">
                 	<form action="" method="post">
					    <label for="fname">First Name</label>
					    <input type="text" id="fname" name="firstname" placeholder="Your name.." required="">
					    <label for="lname">Last Name</label>
					    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required="">
					    <label for="country">Country</label>
					    <select id="country" name="country" required="">
					    	<option value="">-- Select Country --</option>
					      	<option value="australia">Australia</option>
					      	<option value="canada">Canada</option>
					      	<option value="usa">USA</option>
					    </select>
					  
					    <input type="submit"  value="Submit">
				  	</form>
               </div>
<?php include('userfooter.php'); ?>