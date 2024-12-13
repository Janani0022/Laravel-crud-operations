<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Inventory System</title>
    <link href="CSS/home.css" rel="stylesheet" >
    @include('boots/css')

    <style>
        body{background-color: rgb(220, 222, 226);}
        
        </style>
</head>
<body>
    @include('nav')

    <br>
    
    


<div class="align"> <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
   Add New Item
  </button>
</div>
  
  <!-- Modal for Add-->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Item</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <!-- Form -->
           <form id="AddForm" method="POST" action="{{url('/fill')}}">
            @csrf
            <div class="form-group">
              <label for="item">Item Id</label>
              <input type="text" class="form-control" id="item" name="item" required>
            </div>
            <div class="form-group">
              <label for="name">Item Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-select" aria-label="Default select example" required>
                    <option value="Milk Chocolate">Milk Chocolate</option>
                    <option value="Dark Chocolate">Dark Chocolate</option>
                    <option value="White Chocolate">White Chocolate</option>
                    <option value="Fruit and Nut Chocolate">Fruit and Nut Chocolate</option>
                  </select>
            </div>
            <div class="form-group">
                <label for="supplier">Supplier</label>
                <select name="supplier" id="supplier" class="form-select" aria-label="Default select example" required>
                    <option value="CBL">CBL</option>
                    <option value="Edna Group">Edna Group</option>
                    <option value="Upali Group">Upali Group</option>
                    
                  </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity in Stock</label>
                <input type="text" class="form-control" id="quantity" name="quantity" required>
              </div>
            <div class="form-group">
                <label for="price">Unit Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="last">Date Last Ordered</label>
                <input type="date" class="form-control" id="last" name="last">
              </div>
            <div class="form-group">
                <label for="restock">Date of Restock</label>
                <input type="date" class="form-control" id="restock" name="restock">
            </div>


            <br>
            <button type="reset" class="btn btn-danger">Reset</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
      </div>
    </div>
  </div>

  <center>
    @if(isset($items))
<div class="rec-container">
 
    @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          </div>
      @endif


<table id="data-table" name="data-table">

    <h1>All Items</h1>
    <thead>
<tr>
  <th class="hidden">Id</th>
  <th>Item Id</th>
  <th>Item Name</th>
  <th>Category</th>
  <th>Supplier</th>
  <th>Quantity in Stock</th>
  <th>Unit Price(Rs.)</th>
  <th>Date Last Ordered</th>
  <th>Date of Restock</th>
  <th>View</th>
  <th>Edit</th>
  <th>Delete</th>
</tr>
</thead>
<tbody>
@foreach ($items as $rec)
<tr id="row-{{$items}}">
  <td class="hidden">{{$rec['id']}}</td>
  <td>{{$rec['Item_Id']}}</td>
  <td>{{$rec['Item_Name']}}</td>
  <td>{{$rec['Category']}}</td>
  <td>{{$rec['Supplier']}}</td>
  <td>{{$rec['Quantity_in_Stock']}}</td>
  <td>{{$rec['Unit_Price']}}</td>
  <td>{{$rec['Date_Last_Ordered']}}</td>
  <td>{{$rec['Date_of_Restock']}}</td>
  
  <td>
  
    <a href="javascript:void(0);" data-id="{{$rec['id']}}" class="btn btn-info view" data-bs-toggle="modal" data-bs-target="#viewform">View</a>
  </td><td>
    <button type="button" class="btn btn-secondary edit">Edit</button>
  </td><td>
    <button type="submit" class="btn btn-danger delete">Delete</button>
  </td>
   
</tr>
@endforeach
</tbody>
</table>
</div>
@endif
  
</center>






  <!-- Modal for edit-->
  <div class="modal fade" id="editform" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel1">Edit Item</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <!-- Form -->
           <form id="EditForm" method="POST" action="'/items">
            @csrf
            @method('PUT')

            

            <div class="form-group">
              <label for="item">Item Id</label>
              <input type="text" class="form-control" id="eitem" name="eitem" required>
            </div>
            <div class="form-group">
              <label for="name">Item Name</label>
              <input type="text" class="form-control" id="ename" name="ename" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="ecategory" id="ecategory" class="form-select" aria-label="Default select example" required>
                    <option value="Milk Chocolate">Milk Chocolate</option>
                    <option value="Dark Chocolate">Dark Chocolate</option>
                    <option value="White Chocolate">White Chocolate</option>
                    <option value="Fruit and Nut Chocolate">Fruit and Nut Chocolate</option>
                  </select>
            </div>
            <div class="form-group">
                <label for="supplier">Supplier</label>
                <select name="esupplier" id="esupplier" class="form-select" aria-label="Default select example" required>
                    <option value="CBL">CBL</option>
                    <option value="Edna Group">Edna Group</option>
                    <option value="Upali Group">Upali Group</option>
                    
                  </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity in Stock</label>
                <input type="text" class="form-control" id="equantity" name="equantity" required>
              </div>
            <div class="form-group">
                <label for="price">Unit Price</label>
                <input type="text" class="form-control" id="eprice" name="eprice" required>
            </div>
            <div class="form-group">
                <label for="last">Date Last Ordered</label>
                <input type="date" class="form-control" id="elast" name="elast">
              </div>
            <div class="form-group">
                <label for="restock">Date of Restock</label>
                <input type="date" class="form-control" id="erestock" name="erestock">
            </div>


            <br>
            <button type="reset" class="btn btn-danger">Reset</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
      </div>
    </div>
  </div>
         
        




  <!-- Modal for delete-->
  <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel2">Delete Item</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <!-- Form -->
           <form id="DeleteForm" method="POST" action="{{url('/del'.$rec->id)}}">
            @csrf
            @method('DELETE')

              <input type="hidden" name="_method" value="DELETE">
              <p>Are you sure to delete the record?</p>

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-success">Yes</button>
    </form>
</div>
      </div>
    </div>
  </div>

   

   <!-- Modal for view-->
   <div class="modal fade" id="viewform" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel2">Item Profile</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          
           <p><strong>Item ID:</strong> <span id="item-id"></span></p>
           <p><strong>Item Name:</strong> <span id="item-name"></span></p>
           <p><strong>Category:</strong> <span id="item-category"></span></p>
           <p><strong>Supplier:</strong> <span id="item-supplier"></span></p>
           <p><strong>Quantity in Stock:</strong> <span id="item-quantity"></span></p>
           <p><strong>Unit Price:</strong> <span id="item-price"></span></p>
           <p><strong>Date Last Ordered:</strong> <span id="item-ordered"></span></p>
           <p><strong>Date of Restock:</strong> <span id="item-restock"></span></p>

          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          
    </form>
</div>
      </div>
    </div>
  </div>



    

  @include('boots/script')

    <script type="text/javascript">
    
    
    
      $(document).ready(function () {
          var table = $('#data-table').DataTable();
          
      
          // Edit Record
          table.on('click', '.edit', function () {
              $tr = $(this).closest('tr');
              if ($($tr).hasClass('child')) {
                  $tr = $tr.prev('.parent');
              }
      
              var data = table.row($tr).data();
              console.log(data);
      
              $('#eitem').val(data[1]);
              $('#ename').val(data[2]);
              $('#ecategory').val(data[3]);
              $('#esupplier').val(data[4]);
              $('#equantity').val(data[5]);
              $('#eprice').val(data[6]);
              $('#elast').val(data[7]);
              $('#erestock').val(data[8]);
      
              $('#EditForm').attr('action', '/items/' + data[0]);
              $('#editform').modal('show');
          });



          // Delete Record
          table.on('click', '.delete', function () {
              $tr = $(this).closest('tr');
              if ($($tr).hasClass('child')) {
                  $tr = $tr.prev('.parent');
              }
      
              var data = table.row($tr).data();
              console.log(data);
      
              // $('#item').val(data[0]);
             
              $('#DeleteForm').attr('action', '/del/' + data[0]);
              $('#staticBackdrop2').modal('show');
          });
     
          // Read Record
          $(document).on('click', '.view', function () {
              var itemId = $(this).data('id');
              $.ajax({
              url: '/shows/' + itemId,
              method: 'GET',
            
            success: function (data) {
                $('#item-id').text(data.item.Item_Id);
                $('#item-name').text(data.item.Item_Name);
                $('#item-category').text(data.item.Category);
                $('#item-supplier').text(data.item.Supplier);
                $('#item-quantity').text(data.item.Quantity_in_Stock);
                $('#item-price').text(data.item.Unit_Price);
                $('#item-ordered').text(data.item.Date_Last_Ordered);
                $('#item-restock').text(data.item.Date_of_Restock);

                $('#viewform').modal('show');
            }
        });
    });

    
      });

      </script>
      
      
</body>
</html>