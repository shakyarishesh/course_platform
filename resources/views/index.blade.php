<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Listing</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container">
        @include('includes.header') <!-- Include the header -->

        <main>
            <section class="recommended">
                <h2>Recommended for you</h2>
                <div class="courses">
                    @foreach ($courses as $course)
                    <div class="course-card">
                        <a href="/course_detail/{{$course->id}}">
                            <img src="{{ asset($course->image) }}" alt="{{ $course->title }}">
                            <div class="course-info">
                                <h3>{{$course->title}}</h3>
                                <p class="category">{{ $course->category }}</p>
                                <p class="level">{{ $course->level }}</p>
                                <p class="price">${{ $course->price}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                
            </section>

            <section class="promotion">
                <div class="promo-content">
                    <h2>Digital Illustrations</h2>
                    <p>Qui aliquip quis magna non sint voluptate officia qui. Laborum sit mollit id sint et dolore consequat.</p>
                    <a href="#" class="explore-btn">Explore more</a>
                </div>
            </section>

            <section class="popular">
                <h2>Popular courses</h2>
                <div class="courses">
                    <!-- Popular courses here -->
                </div>
            </section>

            <section class="trending">
                <h2>Trending courses</h2>
                <div class="courses">
                    <!-- Trending courses here -->
                </div>
            </section>
        </main>

        @include('includes.footer') <!-- Include the footer -->
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
