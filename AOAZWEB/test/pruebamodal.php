<html>
<head>
  <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    input { display:block;
outline:none;
border-radius:9px;
border: none; }

    </style>

</head>




<body>


<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit" >Edit</button>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: orange;" >
      <div class="modal-header" style="background: orange;" >
        <h5 class="modal-title" id="exampleModalLabel">Edit information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p">
        <form>
            
  
            <label for="recipient-name"   class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name">
        
            <label for="recipient-name" class="col-form-label">Surname:</label>
            <input type="text" class="form-control" id="recipient-name">
     
      
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text"   class="form-control" id="recipient-name">

         
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="Password" class="form-control" id="recipient-name">
          
            
            <label for="recipient-name" class="col-form-label">Repeat Password:</label>
            <input type="Password"  class="form-control" id="recipient-name">
  

         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>





</body>




</html>

