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

78
</head>

<body>

<div ng-app="home">
    <?php
        include('header.php');

    ?>


	

	<br><br><br>
  
	<div class="container" ng-controller="one">
		
		<?php require('twobuttons.php') ?>

		<h2 class="text-center">Log in!</h2>
		<br>
		<div class="btn-group btn-group-justified" role="group" aria-label="...">

		  <!--button for student signup -->
		  <div class="btn-group" role="group" ng-click="student()">
		    <button type="button" class="btn btn-default"><b>Student Login</b></button>
		  </div>

		  <!--button for authority signup -->
		  <div class="btn-group" role="group" ng-click="authority()">
		    <button type="button" class="btn btn-default"><b>Authority Login</b></button>
		  </div>
		</div>

		<div class="well">

			<h3 class="text-center">{{category}}</h3>
		
			<form role="form" method="post" ng-submit= "SubmitLgn()" >
			  <div class="form-group">
			    <label for="email">Email address:</label>
			    <input type="email" class="form-control" name="email" ng-model="formData.email">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" name="pwd" ng-model="formData.pwd">
			  </div>
			  <button type="submit" class="btn btn-info">Submit</button>
			</form>
		</div>

    {{error}}{{message}}


		



		<br>
    

	</div>

</div>

<?php
        include('require.php');
    ?>

<script>
var app = angular.module('home', []);
app.controller('one', function($scope, $http) {
    
	$scope.category= "Student";

    $scope.student= function(){
    	$scope.category= "Student";

    };
    $scope.authority= function(){
    	$scope.category= "Authority";
    };

    $scope.SubmitLgn= function(){
    	console.log($.param($scope.formData));

    	
    	if($scope.category== "Student")
    	{
    		//student logging in

    		$http({
              dataType: "json",
              method: 'POST',
              url: '<?php echo base_url(); ?>Login/Student',
              data    : $.param($scope.formData),  // pass in data as strings
              headers : { 'Content-Type': 'application/x-www-form-urlencoded' }

          }).success(function(data){

              console.log(data);
           //   alert(data);

              if (data.status == 'false') {
                // if not successful, bind errors to error variables

                if(data.msg == "")
                { 

                  console.log('yeah its empty!');
                  $scope.error = "Please Fill in the fields!";

                }else{
                  $scope.error = data.msg;
                }

              } else {

                // if successful, bind success message to message
                $scope.message = data.msg;
                alert('Logged In successfully!');

                window.location.href = "<?php echo base_url(); ?>";

              }
          });
    	}
    	else
    	{
    		//authority logging in

    		$http({
              dataType: "json",
              method: 'POST',
              url: '<?php echo base_url(); ?>Login/Authority',
              data    : $.param($scope.formData),  // pass in data as strings
              headers : { 'Content-Type': 'application/x-www-form-urlencoded' }

          }).success(function(data){

              console.log(data);
           //   alert(data);

              if (data.status == 'false') {
                // if not successful, bind errors to error variables

                if(data.msg == "")
                { 

                  console.log('yeah its empty!');
                  $scope.error = "Please Fill in the fields!";

                }else{
                  $scope.error = data.msg;
                }

              } else {

                // if successful, bind success message to message
                $scope.message = data.msg;
                alert('Logged In successfully!');

                window.location.href = "<?php echo base_url(); ?>";

              }
          });
    	}

    }

    

});
</script>

</body>
</html>
