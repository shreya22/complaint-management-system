<!--home page -->

<!DOCTYPE html>
<html>

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
        include('includes.php');

    ?>


</head>

<body>

<div ng-app="home">
<!--
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
-->

<?php
        include('header.php');

    ?>

	<div class="container"  ng-controller="one">


				<?php require('twobuttons.php') ?>



		
	<h2 class="text-center">Complaints so far..</h2><br>

	<div class="row" ng-repeat= "x in cmpData">
		<div class="col-md-1">
			<h3>{{$index + 1}}</h3>
		</div>
		<div class="well col-md-9">
			
			<b>{{x.field_id}}</b>
			<br><br>
			{{x.text}}
			<br><br>

			<span class="small">DATE: {{x.date}}</span>
		</div>
		<div class="col-md-2">
		<strong>{{x.status}}</strong>
		</div>
	</div>

	<div class="text-center">

		<b>Lets hear From You!</b><br>
		<a class="btn btn-info btn-lg" href="<?php echo base_url(); ?>/Postcomplaint">Make a Complaint!</a	><br>

	</div>

	</div>

</div>

<?php
        include('require.php');

    ?>


<script>
var app = angular.module('home', []);
app.controller('one', function($scope, $http) {
    
	//get data of first 5 complaints from complaints table.
	$http({
              dataType: "json",
              method: 'POST',
              url: '<?php echo base_url(); ?>Home/FiveCmp',
          }).success(function(data){

          		console.log(data);
          		$scope.cmpData= data;
          })

});
</script>

</body>
</html>
