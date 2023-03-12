# Barebones LMS
I was given 2 days to do this for an interview process which I ended up getting a job offer from.
This is a barebones Laravel App for course and student management. 

# Description
For students, we can:
- Display a list of students
- Add students
- Modify students

For courses, we can:
- Display a list of courses
- Display a list of students enrolled in each course
- Create a course
- Modify a course
- Enroll a student in a course.

# Todos
- Authorization and Authentication still needs to be done.
- Add more checks when enrolling students

# Setup
If using docker-compose, simply clone this repo, edit docker-compose.yml as desired, and run
```
docker-compose up
```

If running directly on an environment, have laravel set up, fill out .env, and run
```
php artisan serve --port=3001
```

Then your app should be running at localhost:3001 or something similar.
