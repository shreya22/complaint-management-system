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

  <style type="text/css">
  		.active{
  			background-color: #ccc;
  		}
  </style>


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

	<br><br><br>


	<div class="container" ng-controller="one">
		
				<?php require('twobuttons.php') ?>


		<h2 class="text-center">Authority Sign Up!</h2>
		<br>
		<form role="form" method="post" ng-submit="submitCmp()">

		  <div class="form-group">
		    <label for="name">Name:</label>
		    <input type="text" class="form-control" name="name" ng-model="formData.name">
		  </div>
		  
		   <div class="form-group">
	          <label class="control-label col-sm-2" for="email">Select Field:</label>
	          <div class="col-sm-10">
	            <div class="form-group" id="field">
	              <select class="form-control" id="sel1" ng-model="formData.field" name="field">
	                <option value="1">Education</option>
	                <option value="2">Administration</option>
	                <option value="3">Medical</option>
	                <option value="4">Food ANd Water</option>
	                <option value="5">Security</option>
	                <option value="6">Others</option>
	              </select>
	            </div>
	          
	          </div>
	        </div>

		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" name="email" ng-model="formData.email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" name="pwd" ng-model="formData.pwd">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Retype Password:</label>
		    <input type="password" class="form-control" name="repwd" ng-model="formData.repwd">
		  </div>

		  <button type="submit" class="btn btn-info">Submit</button>
		</form>
		{{error}}{{message}}

	</div>

</div>


<script>
var app = angular.module('home', []);
app.controller('one', function($scope, $http) {
    $scope.formData= {};
    $scope.error= undefined;
    $scope.message= undefined;

    

      $scope.submitCmp= function(){
          console.log("posting data....");

          console.log($.param($scope.formData));
      //    alert($.param($scope.formData));

      	  var x= $scope.formData.field;
          var temp= 'F_000000'+x;
          $scope.formData.field= temp;

          console.log("field id is: "+ $scope.formData.field);

          $http({
              dataType: "json",
              method: 'POST',
              url: '<?php echo base_url(); ?>Signin/A_signin',
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
                alert('Signed In successfully!');

                window.location.href = "<?php echo base_url(); ?>";

              }
          });
    

          
      }
      //form submitted 


});
</script>

</body>
</html>
