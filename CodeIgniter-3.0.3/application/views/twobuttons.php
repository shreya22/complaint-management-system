

	<?php  //print_r($this->session->all_userdata());
		if($this->session->has_userdata('studentloggedin'))
		{
			$sess= $this->session->userdata('studentloggedin');
			//echo $sess." hi";
			//print_r($sess);


	?>
		
		<div class="btn-group" role="group">
		    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		      <span class="glyphicon glyphicon-user"></span> &nbsp; Welcome <b><span class="text-uppercase"><?php echo $sess['name'] ?></span></b>
		      <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu">
		      <li><a href="<?php echo base_url(); ?>/Viewcomplaints/">View Complaints</a></li>
		  <li><a href="<?php echo base_url(); ?>/Logout/student">Logout</a></li>
		    </ul>
		</div>



	<?php
		}
		elseif ($this->session->has_userdata('authloggedin')) {
			$sess= $this->session->userdata('authloggedin');

	?>

		<div class="btn-group" role="group">
		    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		      <span class="glyphicon glyphicon-user"></span> &nbsp; Welcome <b><span class="text-uppercase"><?php echo $sess['name'] ?></span></b>
		      <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu">
		      <li><a href="<?php echo base_url(); ?>/Viewcomplaints/">View Complaints</a></li>
		  <li><a href="<?php echo base_url(); ?>/Logout/authority">Logout</a></li>
		    </ul>
		</div>

		

	<?php
		}
		else
		{
	?>
			<div class="btn-group" role="group">
			    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			      <span class="glyphicon glyphicon-user"></span> Register
			      <span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu">
			      <li><a href="<?php echo base_url(); ?>/Signin/Student">Student</a></li>
			  <li><a href="<?php echo base_url(); ?>/Signin/Authority">Authority</a></li>
			    </ul>
			</div>

			<a class="btn btn-info btn-outline btn-circle collapsed "  href="<?php echo base_url(); ?>/Login" >&nbsp;<span class="glyphicon glyphicon-log-in"></span> Login</a>
		
	<?php
		}
	?>


		<a class="btn btn-link btn-outline btn-circle collapsed "  href="<?php echo base_url(); ?>" >HOME</a>
		<a class="btn btn-link btn-outline btn-circle collapsed "  href="<?php echo base_url(); ?>Postcomplaint" >POST COMLPAINT</a>



