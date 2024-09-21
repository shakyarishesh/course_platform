<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/course_deatil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                    <span class="material-icons">star</span>{{ $coursedetail->rating }} {{ $coursedetail->reviews }}
                    {{ $coursedetail->teacher }}
                </div>
                <!-- <img src="{{ asset($coursedetail->image) }}" alt="Side Image 1"> -->
                <!-- Updated Images Section -->
                <section class="course-images">
                    <img src="{{ asset($coursedetail->image) }}" alt="Side Image 1" class="large-image">
                    <div class="small-images">
                        <img src="{{ asset($coursedetail->image) }}" alt="Side Image 1" class="small-image">
                        <img src="{{ asset($coursedetail->image) }}" alt="Side Image 1" class="small-image">
                    </div>
                </section>

                <!-- Updated Independent Tabs and Teacher Section -->
                <section class="course-content-wrapper">
                    <!-- Tabs Section -->
                    <div class="tabs-section">
                        <div class="tabs">
                            <button class="tab active" data-tab="description">Class description</button>
                            <button class="tab" data-tab="benefits">Benefits</button>
                            <button class="tab" data-tab="reviews">Reviews ({{ $coursedetail->reviews }})</button>
                        </div>

                        <!-- Tab Contents -->
                        <div class="tab-content active" id="description">
                            <h2>Class description</h2>
                            <p>{{ $coursedetail->description }}</p>
                        </div>
                        <div class="tab-content" id="benefits">
                            <h2>Benefits</h2>
                            <ul>
                                @foreach ($coursedetail->benefits as $benefit)
                                    <li>✅{{ $benefit }}</li><br />
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content" id="reviews">
                            <h2>Reviews ({{ $coursedetail->reviews }})</h2>
                            <!-- Reviews content goes here -->
                        </div>
                    </div>

                    <div class="teacher-course-container">
                        <!-- Teacher Info Section -->
                        <div class="teacher-info">
                            <div class="teacher-leftt">
                                <div class="teacher-left">
                                    <img src="{{ asset($coursedetail->image) }}" alt="Teacher Image"
                                        class="teacher-image">
                                </div>
                                <div class="teacher-center">
                                    <h3>{{ $coursedetail->teacher }}</h3>
                                    <p class="teacher-label">Top teacher</p>
                                </div>
                            </div>
                            <div class="teacher-right">
                                <button class="follow-btn">Follow</button>
                            </div>
                        </div>

                        <!-- Course Info Section -->
                        <div class="courses-card">
                            <div class="courses-header">
                                <h3>{{ $coursedetail->title }}</h3>
                                <div class="courses-rating">
                                    <span class="star">⭐</span>
                                    <span class="rating-value">4.5</span>
                                </div>
                            </div>

                            <div class="courses-details">
                                <p>Course (12 lessons) <span class="price">${{ $coursedetail->price }}</span></p>
                                <p>Document <span class="document-badge">Free</span> <span class="price">0</span></p>
                            </div>

                            <hr>

                            <div class="courses-total">
                                <p>Total <span class="total-price">${{ $coursedetail->price }}</span></p>
                            </div>

                            <div class="courses-actions">
                                <button class="buy-now-btn">Buy now</button>
                                <button class="add-to-cart-btn">Add to cart</button>
                            </div>
                        </div>
                    </div>

                </section>

                <!-- Related Courses Section - Outside of the Tabs -->
                <section class="related-courses">
                    <h2>Recommended for you</h2>
                    <div class="related-course">
                        @foreach ($recommended_courses as $recommendcourse)
                            <div class="related-course-card">
                                <a href="/course_detail/{{ $recommendcourse->id }}">
                                    <img src="{{ asset($recommendcourse->image) }}" alt="{{$recommendcourse->category}}">
                                    <div class="related-course-info">
                                        <h3>{{$recommendcourse->title}}</h3>
                                        <p class="category">{{$recommendcourse->category}}</p>
                                        <p class="level">{{$recommendcourse->level}}</p>
                                        <p class="price">{{$recommendcourse->price}}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </section>
            @endforeach

        </main>

        @include('includes.footer')
    </div>
    <script src="{{ asset('js/course_detail.js') }}"></script>
</body>

</html>
