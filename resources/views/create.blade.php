<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ezgi's Gallery</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets_a/assets/img/favicon.ico')}}" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets_a/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container">

<h1  class="fw-light text-center text-lg-start mt-4 mb-0">Your Gallery</h1>

<hr class="mt-2 mb-5">

<div class="row text-center text-lg-start">
@if($errors->any())
<h3>{{$errors->first()}}</h3>
@endif
<form action="{{route('insert.post')}}" method="POST" enctype="multipart/form-data">
        @csrf
 <input type="text" name="title">
 <input type="text" name="desc">
 <input type="file" name="image" multiple accept="image/*">
 <button type="submit">Create</button>
 </form>
<div class="conatiner-fluid" style="margin-top: 20px;">
 <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    @foreach ($posts as $post)
                    <div class="col-lg-4 col-sm-6">
                        <a  href="{{route('show.post', $post->id)}}" title="">

                            <img class="img-fluid" src="{{URL::to($post->image)}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Post</div>
                                <div class="project-name">{{$post->title}}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('assets_a/js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>