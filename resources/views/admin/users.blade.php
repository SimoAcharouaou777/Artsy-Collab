@extends('admin.dashboardAside')

@section('content')
    



<main>
  <div class="card shadow-sm">
    <div class="d-flexxx d-flex justify-content-between">
        <button class="btn btn-dark col-md-1" data-bs-toggle="modal" data-bs-target="#addModal">+</button>
        <div>
           
           {{-- Add Modal  --}}
            {{-- <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div>
                        @if($errors->any())
                        <ul>
                          @foreach($errors->all() as $error)
                          <li>
                            {{$error}}
                          </li>
                          @endforeach
                        </ul>
                        @endif
                      </div>
                        <form id="addBookForm" action="" method="post">
                        
                            @csrf
                        
                            <div class="mb-3">
                                <label for="title" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                              <label for="genre" class="form-label">Email</label>
                              <input type="text" class="form-control" id="genre" name="genre" required>
                          </div>
        
                            <div class="mb-3">
                                <label for="author" class="form-label">Requirements</label>
                                <input type="text" class="form-control" id="author" name="author" required>
                            </div>

                            <div class="mb-3">
                              <label for="image" class="form-label">Image</label>
                              <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">ADD</button>
                        </form>
                    </div>
                  
                  </div>
                </div>
            </div> --}}


        <input type="text" id="searchInput" onkeyup="search()" placeholder="rechercher">
        </div>
     
    </div>
  
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-4 mt-2 bg-white ">
            <thead class="bg-light">
          <tr>
            <th>ID</th>
            <th>User Name </th>
            <th>Email</th>
            <th>Skills</th>
            <th>profile</th>
            <th>Status</th>
            <th>Role</th>
            <th>Number of Collaborated Projects</th>
            <th>Action</th>
            				
          </tr>
        </thead>
        <tbody id="category">


          {{-- @foreach --}}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

       
                <td class="d-flex gap-2">
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                            <path d="M7.982 2C4.04 2 1 5.07 1 8s3.04 6 6.982 6C11.924 14 15 11.16 15 8s-3.076-6-7.018-6zM8 10a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm-.032-4.497a.764.764 0 0 1-.217.576c-.145.14-.332.23-.53.25a.92.92 0 0 1-.61-.093c-.147-.092-.265-.225-.352-.38a.762.762 0 0 1-.065-.618.775.775 0 0 1 .24-.384.935.935 0 0 1 .464-.215c.176-.02.356.015.5.108.138.092.246.233.318.394zM8 1.5c.1 0 .193.028.273.08.071.053.127.128.165.214.03.066.047.137.047.206a.756.756 0 0 1-.219.542.8.8 0 0 1-1.084.095c-.1-.07-.185-.163-.24-.27a.754.754 0 0 1-.025-.664.784.784 0 0 1 .508-.472A.73.73 0 0 1 8 1.5zM8 15a7.98 7.98 0 0 1-5.992-2.732A.743.743 0 0 1 2 11.757c0-.217.076-.43.215-.605s.328-.278.534-.316A8.015 8.015 0 0 1 8 1c1.91 0 3.667.685 5.006 1.823.206.038.37.15.535.316.148.175.24.392.24.605s-.092.43-.24.605a.743.743 0 0 1-.534.316.732.732 0 0 1-.549-.175A6.47 6.47 0 0 0 8 2a6.48 6.48 0 0 0-4.596 1.904A6.481 6.481 0 0 0 2 8c0 1.498.512 2.873 1.368 3.963.168.2.39.365.641.48a.793.793 0 0 1 .354.62.746.746 0 0 1-.242.55A7.97 7.97 0 0 1 8 15zM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
                        </svg>
                    </button>
                    
                
                <form action="" method="post" >
                    @csrf 
                    @method('DELETE')
                    <button type="submit" name="submit"  class="btn btn-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>
                    </button>
                </form>
                </td>
            </tr>
            {{-- @endforeach --}}


               {{-- Edite Modal  --}}
               {{-- @foreach() --}}
               {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
                {{-- <div class="modal-dialog">
                  <div class="modal-content"> --}}
                    {{-- <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> --}}
                    {{-- <div class="modal-body">
                        <form  action="" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="title" name="title" value="" required>
                            </div>

                            <div class="mb-3">
                              <label for="title" class="form-label">Description</label>
                              <input type="text" class="form-control" id="genre" name="genre" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Requirements</label>
                                <input type="text" class="form-control" id="author" name="author"  value="" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="description" class="form-label">Partner</label>
                                <input type="text" class="form-control" id="description" value="" name="description" required>
                            </div>
                            <div class="mb-3">
                              <label for="image" class="form-label">Image</label>
                              <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                          </div>
                            <button type="submit"  class="btn btn-primary">Edite</button>
                        </form>
                    </div> --}}
                  
                  {{-- </div>
                </div> --}}
            {{-- </div> --}}
            {{-- @endforeach --}}

           
              



          
         
           
         
        </tbody>
      </table>

     
    </div>
  </div>



</main>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
  function toggleAside() {
    var aside = document.getElementById("myAside");
    var righttt = document.getElementById("right");
    var rightttBtn = document.getElementById("rightBtn");
    var leftBtn = document.getElementById("leftBtn");
    var links = document.querySelectorAll(".link");

    if (aside.style.width === "5%") {
      aside.style.width = "17%";
      righttt.style.width="83%";
      leftBtn.style.display="block";
      rightttBtn.style.display="none";
      links.forEach(function (link) {
            link.style.display = "block";
        });
    
    } else {
      aside.style.width = "5%";
      righttt.style.width="95%";
      leftBtn.style.display="none";
      rightttBtn.style.display="block";
   
        links.forEach(function (link) {
            link.style.display = "none";
        });
    }
  }
  
 

</script>
</body>
</html>
@endsection