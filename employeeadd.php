<?php include('header.php'); ?>
<?php 
  
  $CountryId = 0;
  $StateId = 0;
  $CityId = 0;

  include_once('controller/connect.php');
  $dbs = new database();
  $db=$dbs->connection();

  $cityn = mysqli_query($db,"select * from city ORDER BY Name");
  $staten = mysqli_query($db,"select * from state  ORDER BY Name");
  $countryn = mysqli_query($db,"select * from country  ORDER BY Name");
  $gendern = mysqli_query($db,"select * from gender  ORDER BY Name");
  $rolen = mysqli_query($db,"select * from role  ORDER BY Name");
  $statusn = mysqli_query($db,"select * from status  ORDER BY Name");
  $maritaln = mysqli_query($db,"select * from maritalstatus  ORDER BY Name");
  $positionn = mysqli_query($db,"select * from position  ORDER BY Name");

  $result ="";
  $id="";
  if(isset($_GET['msg']))
  {
    $result=$_GET['msg'];
  }
  else if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }
  else if (isset($_GET['empid'])) 
  {
    $empid = $_GET['empid'];
    $editempid = mysqli_query($db,"SELECT e.*,ss.StateId,cc.CountryId FROM employee e join city c on e.CityId=c.CityId join state ss on c.StateId=ss.StateId join country cc on cc.CountryId=ss.CountryId where EmpId='$empid'");
    $editemp = mysqli_fetch_assoc($editempid);
    $CountryId = $editemp["CountryId"];
    $StateId = $editemp['StateId'];
    $CityId = $editemp['CityId'];
  }  
?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Employee<i class="fa fa-angle-right"></i> Employee Add</li>
</ol>
<!--grid-->
 	<div class="validation-system" style="margin-top: 0;">
 		
 		<div class="validation-form">
 	<!---->
        <form method="post" action="addemployee.php">
            
        <div class="vali-form-group">
          <div class="col-md-4 control-label">
              <label class="control-label">Employee ID*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="empid" title="Employee ID" value="<?php echo(isset($editemp["EmployeeId"]))?$editemp["EmployeeId"]:""; ?>" class="form-control" placeholder="Employee ID" required="">
              </div>
            </div>
            

            <div class="col-md-4 control-label">
              <label class="control-label">Profile Image*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-picture-o" aria-hidden="true"></i>
              </span>
              <input type="file" name="pfimg" title="Profile Image" class="form-control" name="fileupload"  >
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Gender*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-male" aria-hidden="true"></i>
              </span>
              <select name="gender" title="Gender" required="" style="padding: 5px 5px; text-transform: capitalize;"">
                <option value="">-- Select Gender --</option>
                <?php while($rw = mysqli_fetch_assoc($gendern)){ ?> 
                <option value="<?php echo $rw["GenderId"]; ?>" <?php if(isset($editemp["Gender"]) && $editemp["Gender"]==$rw["GenderId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>
            </div>
            <div class="clearfix"> </div>

         	<div class="vali-form-group">
            <div class="col-md-4 control-label">
              <label class="control-label">First Name*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="fname" title="First Name" value="<?php echo(isset($editemp["FirstName"]))?$editemp["FirstName"]:""; ?>" class="form-control" placeholder="First Name" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Middel Name*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="mname" title="Middel Name" value="<?php echo(isset($editemp["MiddleName"]))?$editemp["MiddleName"]:""; ?>" class="form-control" placeholder="Middel Name" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Last Name*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="lname" title="Last Name" value="<?php echo(isset($editemp["LastName"]))?$editemp["LastName"]:""; ?>" class="form-control" placeholder="Last Name" required="">
              </div>
            </div>
              <div class="clearfix"> </div>
            </div>

            <div class="vali-form-group">
            <div class="col-md-4 control-label">
              <label class="control-label">Birth Date*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="Birthdate" title="Birth Date" name="bdate" placeholder="Birth Date" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo(isset($editemp["Birthdate"]))?$editemp["Birthdate"]:""; ?>"  class="form-control" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Marital*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <select name="marital" title="Marital" required="" style="text-transform: capitalize;">
                <option value="">-- Select Marital --</option>
                <?php while($rw = mysqli_fetch_assoc($maritaln)){ ?> 
                  <option value="<?php echo $rw["MaritalId"]; ?>" <?php if(isset($editemp["MaritalStatus"]) && $editemp["MaritalStatus"]==$rw["MaritalId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Mobile Number*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <input type="text" name="mnumber" title="Mobile Number" value="<?php echo(isset($editemp["Mobile"]))?$editemp["Mobile"]:""; ?>" class="form-control" placeholder="Mobile Number" min="10" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
              </div>
            </div>

            
            </div>
            <div class="clearfix"> </div>

            <div class="col-md-12 control-label">
              <label class="control-label">Address 1*</label>
              <div class="input-group">   
              <span class="input-group-addon">
              <i class="fa fa-pencil " aria-hidden="true"></i>
              </span>          
              <input type="text" name="address1" title="Address 1" value="<?php echo(isset($editemp["Address1"]))?$editemp["Address1"]:""; ?>" class="form-control" placeholder="Address Line 1" required="">
              </div>
            </div>
            <div class="clearfix"> </div>

            <div class="col-md-12 control-label">
              <label class="control-label">Address 2*</label>
              <div class="input-group">
              <span class="input-group-addon">
              <i class="fa fa-pencil " aria-hidden="true"></i>
              </span>
                          
              <input type="text" name="address2" title="Address 2" value="<?php echo(isset($editemp["Address2"]))?$editemp["Address2"]:""; ?>" class="form-control" placeholder="Address Line 2" required="">
              </div>
            </div>
            <div class="clearfix"> </div>
            <div class="col-md-12 control-label">
              <label class="control-label">Address 3</label>
              <div class="input-group"> 
              <span class="input-group-addon">
              <i class="fa fa-pencil " aria-hidden="true"></i>
              </span>            
              <input type="text" name="address3" title="Address 3" value="<?php echo(isset($editemp["Address3"]))?$editemp["Address3"]:""; ?>" class="form-control" placeholder="Address Line 3">
              </div>
            </div>
            <div class="clearfix"> </div>



            <div class="vali-form-group">
            <div class="col-md-3 control-label">
              <label class="control-label">Country*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-globe" aria-hidden="true"></i>
              </span>
              <select name="country" id="contryid" title="Country" required="" onchange="contrychange()" style="text-transform: capitalize;">
                <option value="">-- Select Country --</option>
                <?php while($rw = mysqli_fetch_assoc($countryn)){ ?> 
                  <option value="<?php echo $rw["CountryId"]; ?>" <?php if(isset($editemp["CountryId"]) && $editemp["CountryId"]==$rw["CountryId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">State*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
              <select name="state" id="stateid" title="State" onchange="statechange()" required="" style="text-transform: capitalize;">
                <option value="">-- Select State --</option>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">City*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
              <select name="city" id="cityid" title="City" required="" style="text-transform: capitalize;">
                <option value="">-- Select City --</option> 
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Aadhar Card Number*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="text" name="aadharcard" title="Aadhar Number" value="<?php echo(isset($editemp["AadharNumber"]))?$editemp["AadharNumber"]:""; ?>" placeholder="Aadhar Card Number" class="form-control" required="">
              </div>
            </div>
              <div class="clearfix"> </div>
            </div>

            <div class="vali-form-group">
            <div class="col-md-3 control-label">
              <label class="control-label">Join Date*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="JoinDate" title="Join Date" name="joindate" placeholder="Join Date" value="<?php echo(isset($editemp["JoinDate"]))?$editemp["JoinDate"]:""; ?>" class="form-control" required="" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Leave Date</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="LeaveDate" title="Leave Date" name="leavedate" placeholder="Leave Date" value="<?php echo(isset($editemp["LeaveDate"]))?$editemp["LeaveDate"]:""; ?>" class="form-control" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Status</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
              <select name="status" title="Status" required="" style="text-transform: capitalize;">
                <option value="">-- Select Status --</option>
                <?php while($rw = mysqli_fetch_assoc($statusn)){ ?> 
                  <option value="<?php echo $rw["StatusId"]; ?>" <?php if(isset($editemp["StatusId"]) && $editemp["StatusId"]==$rw["StatusId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Role*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <select name="role" required="" title="Role" style="text-transform: capitalize;"  >
                <option value="">-- Select Role --</option>
                <?php while($rw = mysqli_fetch_assoc($rolen)){ ?> 
                  <option value="<?php echo $rw["RoleId"]; ?>" <?php if(isset($editemp["RoleId"]) && $editemp["RoleId"]==$rw["RoleId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>
                
            <div class="clearfix"> </div>
            </div>

            <div class="vali-form-group">
            <div class="col-md-3 control-label">
              <label class="control-label">Position*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-language" aria-hidden="true"></i>
              </span>
              <select name="position" title="Position" style="text-transform: capitalize;" required="">
                <option value="">-- Select Position --</option>
                <?php while($rw = mysqli_fetch_assoc($positionn)){ ?> 
                  <option value="<?php echo $rw["PositinId"]; ?>" <?php if(isset($editemp["PositionId"]) && $editemp["PositionId"]==$rw["PositinId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Email*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
              <input type="email" name="email" title="Email" value="<?php echo(isset($editemp["Email"]))?$editemp["Email"]:""; ?>" class="form-control" placeholder="Email Address" required="">
              </div>
            </div>
            
            <div class="col-md-3 control-label">
              <label class="control-label">Password*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="password" id="Psw" title="Password" value="<?php echo(isset($editemp["Password"]))?$editemp["Password"]:""; ?>" name="password" placeholder="Password " class="form-control" required="">
              <span class="input-group-addon">
              <a><i class='fa fa-eye' aria-hidden='false' onclick="passwordeyes()"></i></a>
              </span>
              </div>              
            </div>
                <div class="col-md-3 control-label">
              <label class="control-label">Salary*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="text" id="sal" title="Salary" value="<?php echo(isset($editemp["Salary"]))?$editemp["Salary"]:""; ?>" name="Salary" placeholder="salary " class="form-control" required="">
              <span class="input-group-addon">
           
              </span>
              </div>              
            </div>
           
              <div class="clearfix"> </div>
          </div>
            <div class="col-md-12 form-group">
              <input type="submit" name="submit" class="btn btn-primary">
              <button type="reset" class="btn btn-default">Reset</button>
              <input type="text" name="imagefilename" hidden="" value="<?php echo(isset($editemp['ImageName']))?$editemp['ImageName']:''; ?>">
            </div>
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>
</div>
<script>
function passwordeyes() {
    var x = document.getElementById("Psw").type;
    if(x=="password")
      document.getElementById("Psw").type="text";
    else
      document.getElementById("Psw").type="password";
}

</script>
<script>
var OneStepBack;
function nmac(val,e){
  if(e.keyCode!=8)
  {
    if(val.length==2)
      document.getElementById("mac").value = val+"-";
    if(val.length==5)
      document.getElementById("mac").value = val+"-";
    if(val.length==8)
      document.getElementById("mac").value = val+"-";
      if(val.length==11)
      document.getElementById("mac").value = val+"-";
      if(val.length==14)
      {
        document.getElementById("mac").value = val+"-";   
      }
  }
}

function nmac1(val,e){
if(e.keyCode==32){
return false;
}

  if(e.keyCode!=8){

    if(val.length==2)
      document.getElementById("mac").value = val+"-";
    if(val.length==5)
      document.getElementById("mac").value = val+"-";
    if(val.length==8)
      document.getElementById("mac").value = val+"-";
      if(val.length==11)
      document.getElementById("mac").value = val+"-";
      if(val.length==14){
      document.getElementById("mac").value = val+"-";   
    }

    if(val.length==17){
        return false;
    }
  } 
}
</script>
<script>
  contrychange();
  function contrychange()
  {
    var selectedstateid = "<?php echo $StateId; ?>";
    var selectedstateid = parseInt(selectedstateid);

    var selectedcountry = $('#contryid').val();
    $.get("controller/getstatecity.php?Type=s&ci="+selectedcountry+"&ss="+selectedstateid,function(data,status){
        $("#stateid").html(data);
    });
    statechange(selectedstateid);
  }
  function statechange(si)
  {

    var selectedstate = $('#stateid').val();
    if(si!=undefined)
      selectedstate=si;

    var selectedcityid = "<?php echo $CityId; ?>";
    selectedcityid = parseInt(selectedcityid);
    
    $.get("controller/getstatecity.php?Type=c&si="+selectedstate+"&sc="+selectedcityid,function(data,status){
      $("#cityid").html(data);
    });
  }
</script>

<script>
  
  var birthdate = $('#Birthdate').val();
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yy = today.getFullYear();
    var tdate = yy+"/"+mm+"/"+dd;

$('#Birthdate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'Y/m/d',
  formatDate:'Y/m/d',
  //minDate:'-1980/01/01', // yesterday is minimum date
  maxDate: tdate // and tommorow is maximum date calendar
});

$('#JoinDate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'Y/m/d',
  formatDate:'Y/m/d',
  //minDate:'-1980/01/01', // yesterday is minimum date
  //maxDate: tdate // and tommorow is maximum date calendar
});

$('#LeaveDate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'Y/m/d',
  formatDate:'Y/m/d',
  //minDate:'-1980/01/01', // yesterday is minimum date
  //maxDate: tdate // and tommorow is maximum date calendar
});

</script>
<?php include('footer.php'); ?>