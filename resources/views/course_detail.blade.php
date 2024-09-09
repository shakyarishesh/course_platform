<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/course_deatil.css')}}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
        @include('includes.header')
        <main>
            
            <div class="breadcrumb">
                <a href="#">Home</a> / <a href="#">Design</a> / <a href="#">UI/UX Design</a>
            </div>
            @foreach ($coursedetails as $coursedetail)
            <h1>{{ $coursedetail->title }}</h1>

            <div class="course-rating">
                <span class="material-icons">star</span>{{$coursedetail->rating}} {{$coursedetail->reviews}} {{$coursedetail->teacher}}
            </div>
            <div class="course-images">
                <div class="main-image">
                    <img src="{{ asset( $coursedetail->image) }}" alt="Main Image">
                </div>
                <div class="side-images">
                    <div class="side-image">
                        <img src="{{ asset( $coursedetail->image) }}" alt="Side Image 1">
                    </div>
                    <div class="side-image">
                        <img src="{{ asset( $coursedetail->image) }}" alt="Side Image 2">
                    </div>
                </div>
            </div>
            <div class="tabs">
                <button class="tab active" data-tab="description">Class description</button>
                <button class="tab" data-tab="benefits">Benefits</button>
                <button class="tab" data-tab="reviews">Reviews ({{ $coursedetail->reviews}})</button>
                <button class="tab" data-tab="related">Related courses</button>
            </div>
            <div class="tab-content active" id="description">
                <h2>Class description</h2>
                <p>{{ $coursedetail->description }}</p>
            </div>
            <div class="tab-content" id="benefits">
                <h2>Benefits</h2>
                <ul>
                    @foreach ($coursedetail->benefits as $benefit)
                    <li>✅{{ $benefit }}</li><br/>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content" id="reviews">
                <h2>Reviews ({{ $coursedetail->reviews }})</h2>
                <!-- Reviews content goes here -->
            </div>
            @endforeach
            <div class="tab-content" id="related">
                <h2>Related courses</h2>
                @foreach ($relatedCourses as $relatedCourse)
                <div class="related-course">
                    <img src="{{ asset($relatedCourse->image) }}" alt="Related Course" class="related-course-image">
                    <div class="related-course-info">
                        <span>{{ $relatedCourse->title }}</span>
                        <span>${{ $relatedCourse->price }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            
        </main>
        
        @include('includes.footer')
    </div>


    <script>
        document.querySelectorAll('.tab').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.tab').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
                document.getElementById(button.getAttribute('data-tab')).classList.add('active');
            });
        });
    </script>
</body>
</html>