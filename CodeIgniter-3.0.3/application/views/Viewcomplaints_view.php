<!--home page -->

<!DOCTYPE html>
<html>

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- bootstrap include script -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- angular include script -->
  <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

</head>

<body>

<div ng-app="home">

	<div class="jumbotron text-center row">

		<div class="col-md-3">
			<img class="img-responsive" src="http://placehold.it/120x120" alt="">
		</div>
		<div class="col-md-6">
			<h1>E-Complaint System</h1>
		    <h3>ABV-IIITM Gwalior</h3>
		</div>
		<div class="col-md-3">
			<img class="img-responsive" src="http://placehold.it/120x120" alt="">
		</div>		
	    
	</div>

	<?php

		
	 ?>

	<div class="container"  ng-controller="one">


				<?php require('twobuttons.php') ?>



		
	<h2 class="text-center">{{title}}</h2><br>

	<div class="row" ng-repeat= "x in cmpData">
		<div class="col-md-1">
			<h3>{{$index + 1}}</h3>
		</div>
		<div class="well col-md-7">
			
			<b>{{x.field_id}}</b>
			<br><br>
			{{x.text}}
			<br><br>

			<span class="small">DATE: {{x.date}}</span>
		</div>
		<div class="col-md-1">
			<strong>{{x.status}}</strong>
		</div>
		<div class="col-md-2">
			<button class= "btn btn-info">{{x.edit}}</button>
		</div>
	</div>

	


	</div>

</div>


<script>
var app = angular.module('home', []);
app.controller('one', function($scope, $http) {
    
	//checking if student is logged in or authority
	$http({
              dataType: "json",
              method: 'POST',
              url: '<?php echo base_url(); ?>SessionCheck/checkSession',
          }).success(function(data){

          		console.log(data);
          		if(data == 'student')
          		{

          			$scope.title= 'Your Complaints..';

          			$http({
			              dataType: "json",
			              method: 'POST',
			              url: '<?php echo base_url(); ?>Viewcomplaints/s_getCmp',
			          }).success(function(data){

			          		console.log(data);
			          		$scope.cmpData= data;
			          })

          		}
          		else if(data == 'authority')
          		{

          			$scope.title= 'Complaints under your category..';

          			$http({
			              dataType: "json",
			              method: 'POST',
			              url: '<?php echo base_url(); ?>Viewcomplaints/a_getCmp',
			          }).success(function(data){

			          		console.log(data);
			          		$scope.cmpData= data;
			          })
          		}
          		else
          		{
                	window.location.href = "<?php echo base_url(); ?>";

          		}

          });


	

});
</script>

</body>
</html>
