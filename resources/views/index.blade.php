<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Listing</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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
                            <a href="/course_detail/{{ $course->id }}">
                                <img src="storage/{{$course->image}}" alt="{{ $course->title }}">
                                <div class="course-info">
                                    <h3>{{ $course->title }}</h3>
                                    <p class="category">{{ $course->category }}</p>
                                    <p class="level">{{ $course->level }}</p>
                                    <p class="price">${{ $course->price }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination Links -->
                    <div class="pagination">
                        {!! $courses->links('pagination::bootstrap-4') !!}
                    </div>
            </section>
            <section class="popular">
                <h2>Popular courses</h2>
                <div class="courses">
                    @isset($popularCourses)
                        @foreach ($popularCourses as $course)
                    <div class="course-card">
                        <a href="/course_detail/{{ $course->id }}">
                            <img src="storage/{{ $course->image }}" alt="{{ $course->title }}">
                            <div class="course-info">
                                <h3>{{ $course->title }}</h3>
                                <p class="category">{{ $course->category }}</p>
                                <p class="level">{{ $course->level }}</p>
                                <p class="price">${{ $course->price }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                        @else
                            <p>No popular courses available at the moment.</p>
                        @endisset
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

