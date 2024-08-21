{{-- show users --}}
{{-- Montre toutes les infos et posts du user et de l'id en question en question --}}
{{-- localhost/user/1 --}}
{{-- <!-- <h1>Name: {{$user->name}}</h1> --}}
{{-- <h1>Bio: {{$user->biography}}</h1> --}}

{{-- <p>{{$user}}</p> --}}
{{-- <img src={{asset("images/".$user->profile_picture)}} alt=""> --}}
{{-- <div>{{$posts}}</div> --> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-section img.profile-picture {
            max-width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
        .profile-section h2 {
            margin-top: 15px;
            font-size: 24px;
        }
        .profile-section p {
            color: #6c757d;
        }
        .profile-section .btn {
            margin-top: 15px;
        }
        .stats-section {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        .stats-section .stat {
            text-align: center;
            margin: 0 15px;
            flex: 1;
        }
        .stats-section .stat h5 {
            margin-bottom: 5px;
            font-size: 16px;
        }
        .stats-section .stat p {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
        .posts-section {
            margin-top: 20px;
        }
        .post-card {
            margin-bottom: 20px;
            padding: 0;
        }
        .post-card img {
            width: 100%;
            height: 200px; /* Fixed height to ensure images are square */
            object-fit: cover; /* Ensure images cover the container */
        }
        @media (max-width: 767.98px) {
            .posts-section {
                margin-top: 10px;
            }
            .post-card {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <h1 class="text-center text-decoration-none"><a  href="index" class="text-center text-decoration-none">InstaFeed</a></h1>
        </div>
        <!-- Profile section -->
        <div class="row">
            <div class="col-12 profile-section">
                <!-- Profile Picture -->
                <img src="{{ asset('images/'.$user->profile_picture) }}" class="profile-picture" alt="Profile Picture">
                
                <!-- User Name -->
                <h2>{{ $user->name }}</h2>

                <!-- User Bio -->
                <p>{{ $user->biography }}</p>

                <!-- Edit Profile Button -->
                <a href="{{ route('user.edit') }}" class="btn btn-primary">Edit Profil</a>
            </div>
        </div>

        <!-- Stats section (Followers & Following) -->
        <div class="row stats-section">
            <div class="col-12 col-md-4 stat">
                <h5>Followers</h5>
                <p>1,234</p> <!-- Fake number for followers -->
            </div>
            <div class="col-12 col-md-4 stat">
                <h5>Following</h5>
                <p>567</p> <!-- Fake number for following -->
            </div>
            <div class="col-12 col-md-4 stat">
                <h5>Posts</h5>
                <p>{{ $posts->count() }}</p> <!-- Actual number of posts -->
            </div>
        </div>

        <!-- Posts section -->
        <div class="row posts-section">
            @forelse($posts as $post)
                <div class="col-12 col-md-4 post-card">
                    <div class="card">
                        <img src="{{ asset('images/'.$post->image) }}" alt="Post Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center w-100">No posts available.</p>
            @endforelse
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
