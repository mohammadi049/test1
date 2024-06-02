@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section text-center py-5">
        <div class="container">
            <h1 class="display-4 mb-4">Welcome to Our Project</h1>
            <p class="lead mb-4">Your journey into innovation starts here.</p>
            <a href="/filiere" class="btn btn-primary btn-lg">Explore</a>
        </div>
    </div>

    <!-- About Section -->
    <div class="about-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">About Us</h2>
                    <p class="mb-4">Welcome, Mohammadi Abderrazek, Maarouf Younes, and Annab Ismail! We are delighted to
                        have you here. We are a dedicated team committed to delivering cutting-edge solutions for your
                        needs. With a focus on innovation and user experience, we strive to exceed your expectations.</p>
                    <p class="mb-4">Explore our platform to discover the possibilities.</p>
                </div>
                <div class="col-md-6">
                    <img src="/image/welcome_image.jpg" alt="Welcome Image" width="100%" height="400px" class=" rounded ">
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Key Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h3>Community</h3>
                    <p>Join our vibrant community and connect with like-minded individuals.</p>
                </div>
                <div class="col-md-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-cogs fa-3x text-primary"></i>
                    </div>
                    <h3>Customization</h3>
                    <p>Personalize your experience with customizable features and settings.</p>
                </div>
                <div class="col-md-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-lock fa-3x text-primary"></i>
                    </div>
                    <h3>Security</h3>
                    <p>Rest assured, your data is protected with state-of-the-art security measures.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="cta-section text-center py-5">
        <div class="container">
            <h2 class="mb-4">Ready to Get Started?</h2>
            <p class="lead mb-4">Join us today, Mohammadi Abderrazek, Maarouf Younes, and Annab Ismail, and experience the
                future of innovation.</p>
            @if (!Auth::user())
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Sign Up</a>
            @endif
        </div>
    </div>
@endsection
