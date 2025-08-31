<?php
$features = [
    [
        'icon' => 'shield',
        'title' => 'Safe & Secure',
        'description' => '24/7 monitoring, secure facilities, and trained staff ensure your cat\'s safety and well-being at all times.',
        'color' => 'from-blue-400 to-blue-600',
        'bg' => 'bg-blue-50'
    ],
    [
        'icon' => 'heart',
        'title' => 'Loving Care',
        'description' => 'Individual attention, playtime, and cuddles from our cat-loving staff who treat your pet like family.',
        'color' => 'from-pink-400 to-pink-600',
        'bg' => 'bg-pink-50'
    ],
    [
        'icon' => 'clock',
        'title' => 'Flexible Stays',
        'description' => 'Short-term or long-term boarding options with flexible scheduling to meet your travel needs.',
        'color' => 'from-purple-400 to-purple-600',
        'bg' => 'bg-purple-50'
    ],
    [
        'icon' => 'award',
        'title' => 'Certified Staff',
        'description' => 'All our caregivers are professionally trained and certified in pet care and first aid.',
        'color' => 'from-yellow-400 to-yellow-600',
        'bg' => 'bg-yellow-50'
    ],
    [
        'icon' => 'users',
        'title' => 'Small Groups',
        'description' => 'We maintain small group sizes to ensure each cat gets personalized attention and care.',
        'color' => 'from-green-400 to-green-600',
        'bg' => 'bg-green-50'
    ],
    [
        'icon' => 'zap',
        'title' => 'Quick Booking',
        'description' => 'Easy online booking system with instant confirmation and real-time availability updates.',
        'color' => 'from-orange-400 to-orange-600',
        'bg' => 'bg-orange-50'
    ]
];
?>

<section class="relative w-full py-20 md:py-32 lg:py-40 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50">
        <!-- Animated Gradient Background -->
        <div class="absolute inset-0 opacity-60">
            <div
                class="absolute inset-0 bg-gradient-to-r from-emerald-200/30 via-teal-200/30 to-cyan-200/30 animate-gradient-shift">
            </div>
        </div>

        <!-- Large Animated Blobs -->
        <div
            class="absolute -top-20 -left-20 w-96 h-96 bg-gradient-to-r from-emerald-300/20 to-teal-300/20 rounded-full blur-3xl animate-blob-slow">
        </div>
        <div
            class="absolute top-40 -right-20 w-80 h-80 bg-gradient-to-r from-cyan-300/20 to-blue-300/20 rounded-full blur-3xl animate-blob-medium">
        </div>
        <div
            class="absolute -bottom-20 left-1/3 w-72 h-72 bg-gradient-to-r from-teal-300/20 to-emerald-300/20 rounded-full blur-3xl animate-blob-fast">
        </div>

        <!-- Floating Particles -->
        <div class="absolute top-1/4 left-1/4 w-4 h-4 bg-emerald-400/30 rounded-full animate-float-slow"></div>
        <div class="absolute top-1/3 right-1/4 w-3 h-3 bg-teal-400/40 rounded-full animate-float-medium"></div>
        <div class="absolute bottom-1/3 left-1/3 w-5 h-5 bg-cyan-400/30 rounded-full animate-float-fast"></div>
        <div class="absolute top-2/3 right-1/3 w-2 h-2 bg-blue-400/50 rounded-full animate-float-reverse"></div>
        <div class="absolute bottom-1/4 right-1/5 w-6 h-6 bg-emerald-300/20 rounded-full animate-float-slow"></div>

        <!-- Geometric Shapes -->
        <div class="absolute top-20 right-20 w-8 h-8 border-2 border-teal-300/30 rotate-45 animate-spin-slow"></div>
        <div class="absolute bottom-32 left-20 w-6 h-6 border-2 border-emerald-300/40 animate-pulse-slow"></div>
        <div class="absolute top-1/2 left-10 w-10 h-10 border border-cyan-300/30 rounded-full animate-ping-slow"></div>

        <!-- Moving Lines -->
        <div
            class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-emerald-300/20 to-transparent animate-move-right">
        </div>
        <div
            class="absolute bottom-0 right-0 w-full h-1 bg-gradient-to-l from-transparent via-teal-300/20 to-transparent animate-move-left">
        </div>
    </div>

    <div class="relative container px-4 md:px-6 mx-auto max-w-7xl">
        <!-- Header Section -->
        <div class="flex flex-col items-center justify-center space-y-6 text-center mb-16">
            <div class="space-y-4">
                <!-- Animated Badge -->
                <div
                    class="inline-flex items-center rounded-full border-2 border-emerald-200 bg-white/80 backdrop-blur-sm px-4 py-2 text-sm font-semibold text-emerald-800 shadow-lg animate-bounce-gentle">
                    <span class="animate-pulse mr-2">✨</span>
                    Why Choose Us
                    <span class="animate-pulse ml-2">✨</span>
                </div>

                <!-- Animated Title -->
                <h2
                    class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent animate-fade-in-up">
                    Premium Cat Care
                    <span
                        class="block mt-2 bg-gradient-to-r from-cyan-600 via-teal-600 to-emerald-600 bg-clip-text text-transparent animate-fade-in-up-delay">
                        Services
                    </span>
                </h2>

                <!-- Animated Description -->
                <p class="max-w-4xl text-lg md:text-xl text-gray-700 leading-relaxed animate-fade-in-up-delay-2">
                    We provide exceptional care for your feline friends with professional staff, modern facilities, and
                    <span class="font-semibold text-emerald-600">personalized attention</span> that makes all the
                    difference.
                </p>
            </div>
        </div>

        <!-- Features Grid -->
        <div class="grid gap-8 lg:gap-12 md:grid-cols-2 lg:grid-cols-3 max-w-6xl mx-auto">
            <?php foreach ($features as $index => $feature): ?>
                <div class="group relative animate-fade-in-up" style="animation-delay: <?php echo $index * 0.1; ?>s;">
                    <!-- Card Background with Animated Border -->
                    <div
                        class="absolute inset-0 bg-gradient-to-r <?php echo $feature['color']; ?> rounded-2xl blur-sm opacity-0 group-hover:opacity-20 transition-all duration-500 animate-pulse-gentle">
                    </div>

                    <!-- Main Card -->
                    <div
                        class="relative bg-white/90 backdrop-blur-sm rounded-2xl border border-white/50 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 overflow-hidden">
                        <!-- Animated Background Pattern -->
                        <div
                            class="absolute inset-0 <?php echo $feature['bg']; ?> opacity-0 group-hover:opacity-50 transition-all duration-500">
                        </div>



                        <div class="relative p-8 text-center">
                            <!-- Animated Icon Container -->
                            <div class="mx-auto mb-6 relative">
                                <div
                                    class="w-16 h-16 mx-auto bg-gradient-to-r <?php echo $feature['color']; ?> rounded-2xl flex items-center justify-center shadow-lg transform group-hover:rotate-12 group-hover:scale-110 transition-all duration-500">
                                    <i data-lucide="<?php echo $feature['icon']; ?>"
                                        class="w-8 h-8 text-white animate-pulse-gentle"></i>
                                </div>
                                <!-- Animated Ring -->
                                <div
                                    class="absolute inset-0 w-16 h-16 mx-auto border-2 border-gradient-to-r <?php echo $feature['color']; ?> rounded-2xl animate-ping-slow opacity-0 group-hover:opacity-30">
                                </div>
                            </div>

                            <!-- Animated Title -->
                            <h3
                                class="text-2xl font-bold mb-4 text-gray-800 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:<?php echo $feature['color']; ?> group-hover:bg-clip-text transition-all duration-500">
                                <?php echo $feature['title']; ?>
                            </h3>

                            <!-- Description -->
                            <p
                                class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                                <?php echo $feature['description']; ?>
                            </p>

                            <!-- Animated Bottom Border -->
                            <div
                                class="absolute bottom-0 left-0 w-0 h-1 bg-gradient-to-r <?php echo $feature['color']; ?> group-hover:w-full transition-all duration-500">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bottom Decorative Elements -->
        <div class="mt-20 text-center">
            <div class="inline-flex items-center space-x-2 text-emerald-600 animate-bounce-gentle">
                <span class="text-2xl animate-pulse">🐱</span>
                <span class="font-semibold">Trusted by 1000+ Cat Parents</span>
                <span class="text-2xl animate-pulse">🐱</span>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom Animations */
    @keyframes gradient-shift {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    @keyframes blob-slow {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg) scale(1);
        }

        33% {
            transform: translate(30px, -30px) rotate(120deg) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) rotate(240deg) scale(0.9);
        }
    }

    @keyframes blob-medium {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg) scale(1);
        }

        50% {
            transform: translate(-40px, -20px) rotate(180deg) scale(1.2);
        }
    }

    @keyframes blob-fast {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg) scale(1);
        }

        25% {
            transform: translate(20px, -40px) rotate(90deg) scale(1.1);
        }

        50% {
            transform: translate(-30px, -10px) rotate(180deg) scale(0.8);
        }

        75% {
            transform: translate(10px, 30px) rotate(270deg) scale(1.3);
        }
    }

    @keyframes float-slow {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    @keyframes float-medium {

        0%,
        100% {
            transform: translateY(0px) scale(1);
        }

        50% {
            transform: translateY(-15px) scale(1.2);
        }
    }

    @keyframes float-fast {

        0%,
        100% {
            transform: translateY(0px) translateX(0px);
        }

        33% {
            transform: translateY(-10px) translateX(10px);
        }

        66% {
            transform: translateY(-5px) translateX(-5px);
        }
    }

    @keyframes float-reverse {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(25px) rotate(-180deg);
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

    @keyframes pulse-slow {

        0%,
        100% {
            opacity: 0.3;
            transform: scale(1);
        }

        50% {
            opacity: 0.8;
            transform: scale(1.1);
        }
    }

    @keyframes ping-slow {
        0% {
            transform: scale(1);
            opacity: 1;
        }

        75%,
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    @keyframes move-right {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    @keyframes move-left {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    @keyframes bounce-gentle {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    @keyframes pulse-gentle {

        0%,
        100% {
            opacity: 0.8;
        }

        50% {
            opacity: 1;
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

    @keyframes fade-in-up-delay {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fade-in-up-delay-2 {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Apply animations */
    .animate-gradient-shift {
        animation: gradient-shift 8s ease infinite;
        background-size: 200% 200%;
    }

    .animate-blob-slow {
        animation: blob-slow 20s ease-in-out infinite;
    }

    .animate-blob-medium {
        animation: blob-medium 15s ease-in-out infinite;
    }

    .animate-blob-fast {
        animation: blob-fast 12s ease-in-out infinite;
    }

    .animate-float-slow {
        animation: float-slow 6s ease-in-out infinite;
    }

    .animate-float-medium {
        animation: float-medium 4s ease-in-out infinite;
    }

    .animate-float-fast {
        animation: float-fast 3s ease-in-out infinite;
    }

    .animate-float-reverse {
        animation: float-reverse 5s ease-in-out infinite;
    }

    .animate-spin-slow {
        animation: spin-slow 8s linear infinite;
    }

    .animate-pulse-slow {
        animation: pulse-slow 3s ease-in-out infinite;
    }

    .animate-ping-slow {
        animation: ping-slow 3s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    .animate-move-right {
        animation: move-right 10s linear infinite;
    }

    .animate-move-left {
        animation: move-left 12s linear infinite;
    }

    .animate-bounce-gentle {
        animation: bounce-gentle 2s ease-in-out infinite;
    }

    .animate-pulse-gentle {
        animation: pulse-gentle 2s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }

    .animate-fade-in-up-delay {
        animation: fade-in-up-delay 0.8s ease-out 0.2s forwards;
        opacity: 0;
    }

    .animate-fade-in-up-delay-2 {
        animation: fade-in-up-delay-2 0.8s ease-out 0.4s forwards;
        opacity: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {

        .animate-blob-slow,
        .animate-blob-medium,
        .animate-blob-fast {
            width: 200px;
            height: 200px;
        }
    }
</style>