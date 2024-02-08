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
                        <form id="addprojectform" action="" method="POST" enctype="multipart/form-data">
                        
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
                                  {{-- @foreach($partners as $partner) --}}
                                      <option value=""></option>
                                  {{-- @endforeach --}}
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


          @foreach($archivedProjects as $project)
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
                  <form action="{{route('project.restore', $project->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path d="M7.625 0a7.992 7.992 0 0 0-4.7 1.538l-.849-.849A8.962 8.962 0 0 1 7.625 0zM7.625 1.5A7.523 7.523 0 0 1 2.51 3.777l1.714 1.028a6.479 6.479 0 0 0 .717-.045L4.5 3.75a.75.75 0 0 0-1.5 0V5.25a.75.75 0 0 0 .75.75h2.25a.75.75 0 1 0 0-1.5H5.202L6.532 2.934a8.726 8.726 0 0 0 .314 1.072 1.5 1.5 0 1 1-2.17 1.924 8.054 8.054 0 0 0 1.788-.766l-.801-.48A7.523 7.523 0 0 1 7.625 1.5zM14.5 10.5a.75.75 0 0 0-.75-.75h-2.25a.75.75 0 0 0 0 1.5H11.798l-1.33 2.316a8.726 8.726 0 0 0-.314-1.072 1.5 1.5 0 1 1 2.17-1.924 8.054 8.054 0 0 0-1.788.766l.801.48a7.992 7.992 0 0 0 4.7-1.538l.849.849A8.962 8.962 0 0 1 7.625 15a7.523 7.523 0 0 1-4.115-1.277l-1.714 1.028a6.479 6.479 0 0 0 .717.045L3.5 12.25a.75.75 0 0 0-1.5 0V13.5a.75.75 0 0 0 .75.75h2.25a.75.75 0 0 0 0-1.5H4.202L5.532 11.434a8.726 8.726 0 0 0 .314 1.072 1.5 1.5 0 1 1-2.17 1.924 8.054 8.054 0 0 0 1.788-.766l-.801-.48A7.523 7.523 0 0 1 7.625 10.5a7.992 7.992 0 0 0 4.7-1.538l.849.849A8.962 8.962 0 0 1 7.625 10.5z"/>
                        </svg>
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