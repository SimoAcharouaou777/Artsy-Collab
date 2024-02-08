@extends('admin.dashboardAside')

@section('content')
    



<main>
  <div class="card shadow-sm">
    <div class="d-flexxx d-flex justify-content-between">
        <button class="btn btn-dark col-md-1" data-bs-toggle="modal" data-bs-target="#addModal">+</button>
        <div>
           
           {{-- Add Modal  --}}
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form id="addprojectform" action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
                        
                          @csrf
                        
                            <div class="mb-3">
                                <label for="title" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                              <label for="description" class="form-label">Description</label>
                              <input type="text" class="form-control" id="description" name="description" required>
                          </div>
        
                            <div class="mb-3">
                                <label for="requirements" class="form-label">Requirements</label>
                                <input type="text" class="form-control" id="requirements" name="requirements" required>
                            </div>
        
                            <div class="mb-3">
                              <label for="partner" class="form-label">Partner</label>
                              <select class="form-control" id="partner" name="partner" required>
                                  <option value="" disabled selected>Select a partner</option>
                                  @foreach($partners as $partner)
                                      <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                          

                            <div class="mb-3">
                              <label for="image" class="form-label">Image</label>
                              <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary" >ADD</button>
                        </form>
                    </div>
                  
                  </div>
                </div>
            </div>


        <input type="text" id="searchInput" onkeyup="search()" placeholder="rechercher">
        </div>
     
    </div>
  
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-4 mt-2 bg-white ">
            <thead class="bg-light">
          <tr>
            <th>ID</th>
            <th>Project Name </th>
            <th>Description</th>
            <th>Requirements</th>
            <th>Project Status</th>
            <th>Partner Name</th>
            <th>Number Of Collaboraters</th>
            <th>Project Image</th>
            <th>Action</th>
            				
          </tr>
        </thead>
        <tbody id="category">


          @foreach($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->requirements}}</td>
                <td>{{$project->status}}</td>
                <td>{{$project->partner->name}}</td>
                <td>number of coll</td>
                <td><img src="{{ asset('storage/' . $project->image) }}" alt="project Image" style="max-width: 70px;"></td>

       
                <td class="d-flex gap-2">
                <form action="{{ route('project.updateStatus', $project->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-light" name="status" value="published">
                    <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" viewBox="0 0 16 16">
                      <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM7 11a.5.5 0 0 1-1 0V6a.5.5 0 0 1 1 0v5a.5.5 0 0 1 0 1zM8 5.5a.5.5 0 0 1 1 0V10a.5.5 0 0 1-1 0V5.5zM4 8a1 1 0 0 1 1-1h5a1 1 0 0 1 0 2H5a1 1 0 0 1-1-1z"/>
                    </svg>
                  </button>
              </form>

              <form action="{{ route('project.updateStatus', $project->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-light" name="status" value="unpublished">
                  <svg class="bi bi-x-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM5.354 4.646a.5.5 0 0 1 .708 0L8 6.293l2.938-2.939a.5.5 0 0 1 .707.708L8.707 7l2.938 2.938a.5.5 0 0 1-.707.708L8 7.707 5.354 10.354a.5.5 0 0 1-.708-.708L7.293 7 4.646 4.354a.5.5 0 0 1 0-.708z"/>
                  </svg>  
                </button>
            </form>

                <form action="{{route('project.sofdelete' , $project->id)}}" method="post" >
                    @csrf 
                    @method('DELETE')
                    <button type="submit" name="submit"  class="btn btn-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>
                    </button>
                </form>
                </td>
            </tr>
            @endforeach


               {{-- Edite Modal  --}}
               {{-- @foreach() --}}
               <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                    </div>
                  
                  </div>
                </div>
            </div>
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