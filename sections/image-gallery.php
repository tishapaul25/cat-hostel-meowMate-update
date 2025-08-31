<?php
$galleryImages = [
    [
        'src' => 'https://i.postimg.cc/rFHTyZw5/luxorious-cat-suite.jpg',
        'alt' => 'Luxurious cat suite with comfortable bedding, climbing trees, and a black cat relaxing by the window',
        'title' => 'Cozy Cat Suites',
        'description' => 'Spacious suites with premium amenities'
    ],
    [
        'src' => 'https://i.postimg.cc/4yv0tFD0/gallery-img-7.jpg',
        'alt' => 'Three cats of different colors peacefully napping together on soft blankets in a sunny room',
        'title' => 'Peaceful Nap Time',
        'description' => 'Quiet spaces for restful sleep'
    ],
    [
        'src' => 'https://i.postimg.cc/3JWVSnQP/gallery-img-4.jpg',
        'alt' => 'Energetic kittens playing with colorful toys in a bright, spacious play area with climbing structures',
        'title' => 'Fun Play Time',
        'description' => 'Interactive play areas and toys'
    ],
    [
        'src' => 'https://i.postimg.cc/fTrnD1vz/gallery-img-3.jpg',
        'alt' => 'Multiple cats eating from individual bowls in a clean, organized feeding area with natural lighting',
        'title' => 'Meal Time Together',
        'description' => 'Nutritious meals served with care'
    ],
    [
        'src' => 'https://i.postimg.cc/MH4Lw4mT/cat-playing.jpg',
        'alt' => 'Secure outdoor garden area with cats exploring cat-safe plants, climbing posts, and sunny spots',
        'title' => 'Outdoor Cat Garden',
        'description' => 'Safe outdoor exploration space'
    ],
    [
        'src' => 'https://i.postimg.cc/66VbMgPj/hostel-provider-hero.avif',
        'alt' => 'Staff member gently cuddling with a content orange tabby cat in a comfortable reading nook',
        'title' => 'Cuddle Time',
        'description' => 'Personal attention and affection'
    ],
    [
        'src' => 'https://i.postimg.cc/VsSn6Cqj/product-img-3.jpg',
        'alt' => 'Relaxed long-haired cat receiving gentle spa treatment in a calm, soothing environment',
        'title' => 'Spa Treatment',
        'description' => 'Grooming and wellness services'
    ],
    [
        'src' => 'https://i.postimg.cc/t48zqNfn/cat-hostel-hero.avif',
        'alt' => 'Peaceful nighttime scene with cats sleeping comfortably in individual cozy beds with soft lighting',
        'title' => 'Night Time Comfort',
        'description' => 'Comfortable overnight accommodations'
    ]
];
?>

<section class="relative w-full py-20 md:py-32 lg:py-40 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50">
        <!-- Animated Gradient Background -->
        <div
            class="absolute inset-0 bg-gradient-to-br from-purple-100 via-pink-100 to-orange-100 animate-gradient-shift">
        </div>

        <!-- Large Animated Blobs -->
        <div
            class="absolute top-10 left-10 w-96 h-96 bg-gradient-to-r from-purple-300 to-pink-300 rounded-full opacity-20 animate-blob-1">
        </div>
        <div
            class="absolute top-40 right-20 w-80 h-80 bg-gradient-to-r from-pink-300 to-orange-300 rounded-full opacity-20 animate-blob-2">
        </div>
        <div
            class="absolute bottom-20 left-1/4 w-72 h-72 bg-gradient-to-r from-orange-300 to-purple-300 rounded-full opacity-20 animate-blob-3">
        </div>

        <!-- Medium Floating Shapes -->
        <div
            class="absolute top-1/4 left-1/3 w-32 h-32 bg-gradient-to-r from-purple-200 to-pink-200 rounded-full opacity-30 animate-float-slow">
        </div>
        <div
            class="absolute bottom-1/3 right-1/4 w-24 h-24 bg-gradient-to-r from-pink-200 to-orange-200 rounded-full opacity-30 animate-float-medium">
        </div>
        <div
            class="absolute top-2/3 left-1/5 w-20 h-20 bg-gradient-to-r from-orange-200 to-purple-200 rounded-full opacity-30 animate-float-fast">
        </div>

        <!-- Small Particles -->
        <div class="absolute top-20 right-1/3 w-4 h-4 bg-purple-300 rounded-full opacity-40 animate-particle-1"></div>
        <div class="absolute bottom-40 left-1/2 w-3 h-3 bg-pink-300 rounded-full opacity-40 animate-particle-2"></div>
        <div class="absolute top-1/2 right-20 w-5 h-5 bg-orange-300 rounded-full opacity-40 animate-particle-3"></div>
        <div class="absolute bottom-20 right-1/3 w-2 h-2 bg-purple-400 rounded-full opacity-50 animate-particle-4">
        </div>
        <div class="absolute top-3/4 left-10 w-3 h-3 bg-pink-400 rounded-full opacity-50 animate-particle-5"></div>

        <!-- Geometric Shapes -->
        <div
            class="absolute top-32 right-40 w-16 h-16 bg-gradient-to-r from-purple-200 to-pink-200 opacity-20 animate-rotate-slow transform rotate-45">
        </div>
        <div
            class="absolute bottom-32 left-40 w-12 h-12 bg-gradient-to-r from-pink-200 to-orange-200 opacity-20 animate-rotate-reverse transform rotate-12">
        </div>

        <!-- Animated Lines -->
        <div
            class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-300 to-transparent opacity-30 animate-line-move">
        </div>
        <div
            class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-pink-300 to-transparent opacity-30 animate-line-move-reverse">
        </div>
    </div>

    <div class="relative container px-4 md:px-6 mx-auto max-w-7xl">
        <!-- Header Section -->
        <div class="flex flex-col items-center justify-center space-y-6 text-center mb-16">
            <div
                class="inline-flex items-center rounded-full border-2 border-purple-200 bg-white/80 backdrop-blur-sm px-4 py-2 text-sm font-semibold text-purple-700 shadow-lg animate-bounce-gentle">
                <span class="mr-2">📸</span>
                Our Amazing Facilities
            </div>

            <h2
                class="text-4xl md:text-6xl font-bold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-pink-600 to-orange-600 animate-gradient-text">
                See Our Happy Guests in Action
            </h2>

            <p class="max-w-4xl text-lg md:text-xl text-gray-700 leading-relaxed">
                Take a peek at our cozy rooms, play areas, and the adorable cats who call our hostel their temporary
                home.
                Every corner is designed with love and care for your feline friends.
            </p>

            <div class="flex items-center space-x-2 text-purple-600 animate-pulse">
                <span class="text-2xl">✨</span>
                <span class="font-medium">Trusted by 1000+ Cat Parents</span>
                <span class="text-2xl">✨</span>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <?php foreach ($galleryImages as $index => $image): ?>
                <div class="gallery-item group cursor-pointer animate-fade-in-up" data-index="<?php echo $index; ?>"
                    style="animation-delay: <?php echo $index * 0.1; ?>s">

                    <div
                        class="relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 bg-white/90 backdrop-blur-sm border border-white/50">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden <?php echo ($index % 2 === 0) ? 'h-80' : 'h-56'; ?>">
                            <img src="<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>"
                                class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-1" />

                            <!-- Gradient Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>

                            <!-- Floating Icons -->
                            <div
                                class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-2 group-hover:translate-y-0">
                                <div class="bg-white/90 backdrop-blur-sm rounded-full p-2 shadow-lg animate-pulse">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3
                                class="font-bold text-xl text-gray-800 mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-purple-600 group-hover:to-pink-600 transition-all duration-500">
                                <?php echo $image['title']; ?>
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                <?php echo $image['description']; ?>
                            </p>

                            <!-- Animated Bottom Border -->
                            <div
                                class="mt-4 h-1 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div class="inline-flex items-center space-x-2 text-purple-600 animate-bounce-gentle">
                <span class="text-2xl animate-pulse">🐾</span>
                <span class="font-semibold text-lg">Scroll down to explore more amazing features</span>
                <span class="text-2xl animate-pulse">🐾</span>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="image-modal"
        class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 p-4 opacity-0 invisible transition-all duration-500">
        <div
            class="relative max-w-5xl max-h-full bg-white/10 backdrop-blur-md rounded-3xl overflow-hidden shadow-2xl transform scale-95 transition-all duration-500">
            <!-- Close Button -->
            <button id="close-modal"
                class="absolute top-6 right-6 text-white hover:text-pink-300 z-10 bg-black/30 backdrop-blur-sm rounded-full p-2 transition-all duration-300 hover:scale-110">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            <!-- Navigation Buttons -->
            <button id="prev-image"
                class="absolute left-6 top-1/2 transform -translate-y-1/2 text-white hover:text-pink-300 z-10 bg-black/30 backdrop-blur-sm rounded-full p-3 transition-all duration-300 hover:scale-110">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <button id="next-image"
                class="absolute right-6 top-1/2 transform -translate-y-1/2 text-white hover:text-pink-300 z-10 bg-black/30 backdrop-blur-sm rounded-full p-3 transition-all duration-300 hover:scale-110">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Modal Content -->
            <div class="p-8">
                <img id="modal-image" src="/placeholder.svg" alt=""
                    class="max-w-full max-h-[70vh] object-contain rounded-2xl mx-auto shadow-2xl" />

                <div class="text-center mt-6 text-white">
                    <h3 id="modal-title"
                        class="font-bold text-2xl mb-2 text-transparent bg-clip-text bg-gradient-to-r from-purple-300 to-pink-300">
                    </h3>
                    <p id="modal-description" class="text-gray-300 text-lg"></p>
                    <p id="modal-counter" class="text-sm opacity-75 mt-2"></p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom Animations */
    @keyframes gradient-shift {

        0%,
        100% {
            background: linear-gradient(135deg, #f3e8ff, #fce7f3, #fed7aa);
        }

        25% {
            background: linear-gradient(135deg, #fce7f3, #fed7aa, #f3e8ff);
        }

        50% {
            background: linear-gradient(135deg, #fed7aa, #f3e8ff, #fce7f3);
        }

        75% {
            background: linear-gradient(135deg, #f3e8ff, #fce7f3, #fed7aa);
        }
    }

    @keyframes blob-1 {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg) scale(1);
        }

        25% {
            transform: translate(30px, -30px) rotate(90deg) scale(1.1);
        }

        50% {
            transform: translate(-20px, 20px) rotate(180deg) scale(0.9);
        }

        75% {
            transform: translate(40px, 10px) rotate(270deg) scale(1.05);
        }
    }

    @keyframes blob-2 {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg) scale(1);
        }

        33% {
            transform: translate(-40px, 30px) rotate(120deg) scale(1.15);
        }

        66% {
            transform: translate(20px, -40px) rotate(240deg) scale(0.85);
        }
    }

    @keyframes blob-3 {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg) scale(1);
        }

        50% {
            transform: translate(50px, -20px) rotate(180deg) scale(1.2);
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
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-15px) rotate(360deg);
        }
    }

    @keyframes float-fast {

        0%,
        100% {
            transform: translateY(0px) scale(1);
        }

        50% {
            transform: translateY(-25px) scale(1.1);
        }
    }

    @keyframes particle-1 {

        0%,
        100% {
            transform: translate(0, 0) scale(1) rotate(0deg);
            opacity: 0.4;
        }

        25% {
            transform: translate(20px, -30px) scale(1.5) rotate(90deg);
            opacity: 0.8;
        }

        50% {
            transform: translate(-15px, -10px) scale(0.8) rotate(180deg);
            opacity: 0.6;
        }

        75% {
            transform: translate(30px, 20px) scale(1.2) rotate(270deg);
            opacity: 0.9;
        }
    }

    @keyframes particle-2 {

        0%,
        100% {
            transform: translate(0, 0) scale(1);
            opacity: 0.4;
        }

        50% {
            transform: translate(-25px, -35px) scale(1.8);
            opacity: 0.8;
        }
    }

    @keyframes particle-3 {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg) scale(1);
            opacity: 0.4;
        }

        33% {
            transform: translate(15px, -20px) rotate(120deg) scale(1.3);
            opacity: 0.7;
        }

        66% {
            transform: translate(-20px, 15px) rotate(240deg) scale(0.9);
            opacity: 0.9;
        }
    }

    @keyframes particle-4 {

        0%,
        100% {
            transform: translate(0, 0) scale(1);
            opacity: 0.5;
        }

        50% {
            transform: translate(40px, -15px) scale(2);
            opacity: 1;
        }
    }

    @keyframes particle-5 {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg) scale(1);
            opacity: 0.5;
        }

        25% {
            transform: translate(-10px, -25px) rotate(90deg) scale(1.4);
            opacity: 0.8;
        }

        75% {
            transform: translate(25px, 10px) rotate(270deg) scale(1.1);
            opacity: 0.9;
        }
    }

    @keyframes rotate-slow {
        from {
            transform: rotate(45deg);
        }

        to {
            transform: rotate(405deg);
        }
    }

    @keyframes rotate-reverse {
        from {
            transform: rotate(12deg);
        }

        to {
            transform: rotate(-348deg);
        }
    }

    @keyframes line-move {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    @keyframes line-move-reverse {
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

    @keyframes gradient-text {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
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

    @keyframes sparkle {

        0%,
        100% {
            transform: scale(1) rotate(0deg);
            opacity: 0.7;
        }

        50% {
            transform: scale(1.5) rotate(180deg);
            opacity: 1;
        }
    }

    /* Apply Animations */
    .animate-gradient-shift {
        animation: gradient-shift 15s ease-in-out infinite;
    }

    .animate-blob-1 {
        animation: blob-1 12s ease-in-out infinite;
    }

    .animate-blob-2 {
        animation: blob-2 10s ease-in-out infinite;
    }

    .animate-blob-3 {
        animation: blob-3 14s ease-in-out infinite;
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

    .animate-particle-1 {
        animation: particle-1 8s ease-in-out infinite;
    }

    .animate-particle-2 {
        animation: particle-2 6s ease-in-out infinite;
    }

    .animate-particle-3 {
        animation: particle-3 7s ease-in-out infinite;
    }

    .animate-particle-4 {
        animation: particle-4 5s ease-in-out infinite;
    }

    .animate-particle-5 {
        animation: particle-5 9s ease-in-out infinite;
    }

    .animate-rotate-slow {
        animation: rotate-slow 20s linear infinite;
    }

    .animate-rotate-reverse {
        animation: rotate-reverse 15s linear infinite;
    }

    .animate-line-move {
        animation: line-move 8s linear infinite;
    }

    .animate-line-move-reverse {
        animation: line-move-reverse 10s linear infinite;
    }

    .animate-bounce-gentle {
        animation: bounce-gentle 2s ease-in-out infinite;
    }

    .animate-gradient-text {
        background-size: 200% 200%;
        animation: gradient-text 3s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0;
    }


    /* Modal Animations */
    #image-modal.show {
        opacity: 1;
        visibility: visible;
    }

    #image-modal.show>div {
        transform: scale(1);
    }
</style>

<script>
    // Gallery data for JavaScript
    const galleryData = <?php echo json_encode($galleryImages); ?>;

    document.addEventListener('DOMContentLoaded', function () {
        const galleryItems = document.querySelectorAll('.gallery-item');
        const modal = document.getElementById('image-modal');
        const modalImage = document.getElementById('modal-image');
        const modalTitle = document.getElementById('modal-title');
        const modalDescription = document.getElementById('modal-description');
        const modalCounter = document.getElementById('modal-counter');
        const closeModal = document.getElementById('close-modal');
        const prevImage = document.getElementById('prev-image');
        const nextImage = document.getElementById('next-image');

        let currentImageIndex = 0;

        // Open modal
        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentImageIndex = index;
                showModal();
            });
        });

        // Close modal
        closeModal.addEventListener('click', hideModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) hideModal();
        });

        // Navigation
        prevImage.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + galleryData.length) % galleryData.length;
            updateModalContent();
        });

        nextImage.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % galleryData.length;
            updateModalContent();
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!modal.classList.contains('show')) return;

            if (e.key === 'Escape') hideModal();
            if (e.key === 'ArrowLeft') prevImage.click();
            if (e.key === 'ArrowRight') nextImage.click();
        });

        function showModal() {
            updateModalContent();
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function hideModal() {
            modal.classList.remove('show');
            document.body.style.overflow = '';
        }

        function updateModalContent() {
            const image = galleryData[currentImageIndex];
            modalImage.src = image.src;
            modalImage.alt = image.alt;
            modalTitle.textContent = image.title;
            modalDescription.textContent = image.description;
            modalCounter.textContent = `${currentImageIndex + 1} of ${galleryData.length}`;
        }
    });
</script>