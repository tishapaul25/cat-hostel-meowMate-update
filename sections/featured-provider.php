<?php
$topProviders = [
    [
        'id' => 1,
        'name' => 'Sarah Johnson',
        'image' => '/placeholder.svg?height=300&width=300&text=Sarah+with+Cats',
        'location' => 'Manhattan, NY',
        'rating' => 4.9,
        'reviews' => 127,
        'experience' => '5 years',
        'price' => '$35/night',
        'specialties' => ['Senior Cats', 'Medical Care', 'Grooming'],
        'verified' => true,
        'capacity' => '6 cats',
        'description' => 'Experienced cat lover with a cozy Manhattan apartment perfect for your feline friends.'
    ],
    [
        'id' => 2,
        'name' => 'Michael Chen',
        'image' => '/placeholder.svg?height=300&width=300&text=Michael+Cat+Care',
        'location' => 'Brooklyn, NY',
        'rating' => 4.8,
        'reviews' => 89,
        'experience' => '3 years',
        'price' => '$28/night',
        'specialties' => ['Playful Cats', 'Multiple Cats', 'Exercise'],
        'verified' => true,
        'capacity' => '8 cats',
        'description' => 'Professional pet sitter with spacious Brooklyn home and outdoor cat garden.'
    ],
    [
        'id' => 3,
        'name' => 'Emma Rodriguez',
        'image' => '/placeholder.svg?height=300&width=300&text=Emma+Cat+Sitter',
        'location' => 'Queens, NY',
        'rating' => 5.0,
        'reviews' => 156,
        'experience' => '7 years',
        'price' => '$32/night',
        'specialties' => ['Shy Cats', 'Medication', 'Special Needs'],
        'verified' => true,
        'capacity' => '4 cats',
        'description' => 'Certified veterinary assistant specializing in shy and special needs cats.'
    ]
];
?>

<section class="relative py-20 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <!-- Large Animated Blobs -->
        <div
            class="absolute top-10 left-10 w-72 h-72 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full opacity-20 animate-blob">
        </div>
        <div
            class="absolute top-20 right-10 w-64 h-64 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full opacity-20 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute bottom-20 left-1/3 w-80 h-80 bg-gradient-to-r from-indigo-400 to-blue-500 rounded-full opacity-20 animate-blob animation-delay-4000">
        </div>

        <!-- Floating Particles -->
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-float"></div>
        <div
            class="absolute top-1/3 right-1/4 w-3 h-3 bg-purple-400 rounded-full opacity-40 animate-float animation-delay-1000">
        </div>
        <div
            class="absolute bottom-1/3 left-1/2 w-1 h-1 bg-indigo-400 rounded-full opacity-80 animate-float animation-delay-2000">
        </div>
        <div
            class="absolute top-1/2 right-1/3 w-2 h-2 bg-pink-400 rounded-full opacity-50 animate-float animation-delay-3000">
        </div>
        <div
            class="absolute bottom-1/4 right-1/4 w-3 h-3 bg-blue-500 rounded-full opacity-30 animate-float animation-delay-4000">
        </div>

        <!-- Geometric Shapes -->
        <div
            class="absolute top-1/4 right-1/4 w-8 h-8 border-2 border-purple-300 rotate-45 opacity-30 animate-spin-slow">
        </div>
        <div class="absolute bottom-1/3 left-1/4 w-6 h-6 bg-blue-300 opacity-40 animate-pulse"></div>

        <!-- Animated Lines -->
        <div
            class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-blue-300 to-transparent opacity-50 animate-slide-right">
        </div>
        <div
            class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-300 to-transparent opacity-50 animate-slide-left">
        </div>
    </div>

    <div class="relative container mx-auto px-4 max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-16">
            <div class="inline-block animate-bounce">
                <span
                    class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-100 to-purple-100 text-blue-800 text-sm font-medium rounded-full mb-6 backdrop-blur-sm border border-blue-200">
                    ⭐ Top Rated Providers
                </span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">
                <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">
                    Meet Our Top Cat Hostel Providers
                </span>
            </h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto animate-fade-in-up animation-delay-200">
                Trusted, verified, and loved by thousands of cat parents. These are our highest-rated providers who go
                above and beyond for your feline friends.
            </p>
        </div>

        <!-- Providers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($topProviders as $index => $provider): ?>
                <div class="group relative bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/50 overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: <?php echo $index * 200; ?>ms;">

                    <!-- Provider Image -->
                    <div class="relative overflow-hidden">
                        <img src="<?php echo $provider['image']; ?>" alt="<?php echo $provider['name']; ?>"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" />

                        <!-- Verified Badge -->
                        <?php if ($provider['verified']): ?>
                            <div
                                class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Verified
                            </div>
                        <?php endif; ?>

                        <!-- Rating Badge -->
                        <div
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full flex items-center gap-1">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium text-gray-800"><?php echo $provider['rating']; ?></span>
                        </div>
                    </div>

                    <!-- Provider Info -->
                    <div class="p-6">
                        <!-- Name and Location -->
                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">
                                <?php echo $provider['name']; ?>
                            </h3>
                            <div class="flex items-center text-gray-600 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <?php echo $provider['location']; ?>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                            <div class="text-center p-2 bg-blue-50 rounded-lg">
                                <div class="font-bold text-blue-600"><?php echo $provider['reviews']; ?></div>
                                <div class="text-gray-600">Reviews</div>
                            </div>
                            <div class="text-center p-2 bg-purple-50 rounded-lg">
                                <div class="font-bold text-purple-600"><?php echo $provider['experience']; ?></div>
                                <div class="text-gray-600">Experience</div>
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            <?php echo $provider['description']; ?>
                        </p>

                        <!-- Specialties -->
                        <div class="mb-4">
                            <div class="flex flex-wrap gap-1">
                                <?php foreach (array_slice($provider['specialties'], 0, 2) as $specialty): ?>
                                    <span
                                        class="px-2 py-1 bg-gradient-to-r from-blue-100 to-purple-100 text-blue-700 text-xs rounded-full">
                                        <?php echo $specialty; ?>
                                    </span>
                                <?php endforeach; ?>
                                <?php if (count($provider['specialties']) > 2): ?>
                                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                                        +<?php echo count($provider['specialties']) - 2; ?> more
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Price and Action -->
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-green-600"><?php echo $provider['price']; ?></span>
                            </div>
                            <a href="provider-detail.php?id=<?php echo $provider['id']; ?>"
                                class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:scale-105">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="find-providers.php"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-4 rounded-xl font-medium text-lg transition-all duration-300 hover:scale-105 hover:shadow-lg">
                <span>View All Providers</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</section>

<style>
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1) rotate(0deg);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1) rotate(120deg);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9) rotate(240deg);
        }

        100% {
            transform: translate(0px, 0px) scale(1) rotate(360deg);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes slide-right {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    @keyframes slide-left {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-blob {
        animation: blob 12s infinite;
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-spin-slow {
        animation: spin-slow 8s linear infinite;
    }

    .animate-slide-right {
        animation: slide-right 15s linear infinite;
    }

    .animate-slide-left {
        animation: slide-left 15s linear infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }

    .animation-delay-200 {
        animation-delay: 200ms;
    }

    .animation-delay-1000 {
        animation-delay: 1000ms;
    }

    .animation-delay-2000 {
        animation-delay: 2000ms;
    }

    .animation-delay-3000 {
        animation-delay: 3000ms;
    }

    .animation-delay-4000 {
        animation-delay: 4000ms;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>