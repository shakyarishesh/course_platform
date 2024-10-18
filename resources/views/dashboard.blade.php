<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Course Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/dashboard') }}" />
</head>

<body>
    @include('includes.header')
    <main>
        {{-- <section class="profile-section">
      <div class="profile-card">
          <img src="imgs/Course1.avif" alt="User Photo" class="user-photo">
          <div class="user-info">
              <h2>Martha Rosie</h2>
              <p>UX/UI Designer</p>
          </div>
      </div>
      <div class="stats">
          <div class="stat-item">
          
              <span class="stat-number">25</span> 
              <span class="stat-label">Save</span>
          </div>
          <div class="stat-item">
              <span class="stat-number">24</span>
              <span class="stat-label">Ongoing</span>
          </div>
          <div class="stat-item">
              <span class="stat-number">98</span>
              <span class="stat-label">Completed</span>
          </div>
      </div>
  </section> --}}
        <section class="courses-section">
            <h2>Saved Courses</h2>
            <div class="saved-course">
                @foreach ($courses as $course)
                    <a href="{{ route('course_details', ['course_id'=>$course->id])}}">
                        <div class="saved-course-card">
                            <img src="imgs/Course1.avif" alt="Product Design" class="course-image-large" />
                            <div class="course-info-large">
                                <h3>{{ $course->title }}</h3>
                                <p>{{ $course->teacher }}</p>
                                <div class="saved-course-details">
                                    <span>12 lessons</span>
                                </div>
                            </div>
                            <div class="course-price">{{ $course->price }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
</body>

</html>
