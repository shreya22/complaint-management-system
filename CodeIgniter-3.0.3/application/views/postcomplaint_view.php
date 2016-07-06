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


<div ng-app="postComplaint">

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

  

  <div class="container" ng-controller="PostCmp">

        <?php require('twobuttons.php') ?>

          <br><br>


      <form class="form-horizontal" role="form" method="post" ng-submit="submitCmp()" >

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
          <label class="control-label col-sm-2" for="pwd">Enter Complaint:</label>
          <div class="col-sm-10">          
          <textarea class="form-control" ng-model="formData.complaint" rows="5" id="cmp" placeholder="Start typing complaint..." name="complaint"></textarea>

          

          </div>
        </div>
        
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>


        {{error}}
        {{message}}

          </div>

        </div>

      </form>

     
  </div>


</div>



<script>
var app = angular.module('postComplaint', []);
app.controller('PostCmp', function($scope, $http) {
    $scope.formData= {};
    $scope.error= undefined;
    $scope.message= undefined;

      console.log('checking validity of user to post comlaint');
      $http({
        dataType: "text",
        url: '<?php echo base_url(); ?>SessionCheck/checkSession'

      }).success(function(data){
          console.log(data);
          //alert(data);

          //only student can post a complaint.
          //if unregistered user or authority, direct to home page.

          if(data != 'student')
          {
            alert('Only A registered student can post complaints! Directing to home page...');
            window.location.href = "<?php echo base_url(); ?>";
          }

      });

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
              url: '<?php echo base_url(); ?>Postcomplaint/postCmp',
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
                alert('Complaint successfully posted. Please check your account in next few days to get status of the complaint.. :)');

                window.location.href = "<?php echo base_url(); ?>Postcomplaint/";

              }
          });
    

          
      }
      //form submitted 


});
</script>

</body>
</html>



