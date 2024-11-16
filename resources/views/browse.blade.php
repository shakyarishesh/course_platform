<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Courses</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Search Section */
        h2 {
            margin-bottom: 20px;
        }

        .search-section {
            padding: 20px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .search-input {
            width: 50%;
            padding: 10px 15px;
            border: 1px solid #444444;
            border-radius: 5px;
            background-color: #333333;
            color: #FFFFFF;
            font-size: 16px;
        }

        .search-button {
            padding: 10px 20px;
            background-color: #2E8BC0;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-button:hover {
            background-color: #3C9FD7;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('includes.header') <!-- Include the header -->

        <main>
            <section class="search-section">
                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Search for courses..." class="search-input">
                    <button type="submit" class="search-button">
                        <i class="fas fa-search"></i> Search
                    </button>
                </form>
            </section>

            <section class="course-list">
                <h2>All Courses</h2>
                <div class="container mt-4">
                    <div class="courses">
                        @foreach ($courses as $course)
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
                    </div>

                </div>
            </section>
        </main>

        @include('includes.footer') <!-- Include the footer -->
    </div>
</body>

</html>
