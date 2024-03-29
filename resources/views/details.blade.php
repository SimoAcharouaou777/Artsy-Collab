@extends('layouts.app')

@section('content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="">Home</a></li>
        <li>Portfolio Details</li>
      </ol>
      <h2>Portfolio Details</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">
      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
     </div>
   @endif

   @if(session('error'))
     <div class="alert alert-danger">
       {{ session('error') }}
     </div>
   @endif
        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="portfolio-details-img">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width: 100%;">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3>Project information</h3>
                    <ul>
                        <li><strong>Title</strong>: {{ $project->title }}</li>
                        <li><strong>Partner</strong>: {{ $project->partner->name}}</li>
                        <li><strong>Partner Logo</strong>:<img src="{{ asset('storage/' . $project->partner->image) }}" alt="{{ $project->partner->name }} Logo" style="max-width: 100%;"></li>
                        <li><strong>Project Description</strong>: {{$project->description}}</li>
                        <li><strong>Project Requirements</strong>: {{$project->requirements}}</li>
                    </ul>
                </div>
                <form action="{{ route('send.request',  $project->id) }}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-primary d-flex flex-column align-items-center">Send Request</button>
              </form>
            </div>
        </div>

    </div>
</section>
<!-- End Portfolio Details Section -->

</main><!-- End #main -->

@endsection
