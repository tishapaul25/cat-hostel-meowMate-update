<div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Floating Paw Prints -->
        <div class="absolute top-20 left-10 animate-bounce delay-100">
            <i data-lucide="cat" class="w-8 h-8 text-green-300 opacity-60"></i>
        </div>
        <div class="absolute top-40 right-20 animate-bounce delay-300">
            <i data-lucide="heart" class="w-6 h-6 text-pink-300 opacity-60"></i>
        </div>
        <div class="absolute bottom-40 left-20 animate-bounce delay-500">
            <i data-lucide="home" class="w-7 h-7 text-blue-300 opacity-60"></i>
        </div>
        <div class="absolute bottom-20 right-40 animate-bounce delay-700">
            <i data-lucide="star" class="w-5 h-5 text-yellow-300 opacity-60"></i>
        </div>

        <!-- Floating Circles -->
        <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-green-200 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute top-3/4 right-1/4 w-24 h-24 bg-blue-200 rounded-full opacity-20 animate-pulse delay-1000">
        </div>
        <div class="absolute top-1/2 left-1/2 w-16 h-16 bg-purple-200 rounded-full opacity-20 animate-pulse delay-500">
        </div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4">
        <!-- Welcome Animation Container -->
        <div class="text-center space-y-8 max-w-4xl mx-auto">
            <!-- Animated Logo -->
            <div class="welcome-logo mb-8">
                <div class="relative inline-block">
                    <div
                        class="w-32 h-32 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-2xl transform hover:scale-110 transition-transform duration-300">
                        <i data-lucide="cat" class="w-16 h-16 text-white animate-pulse"></i>
                    </div>
                    <!-- Animated Ring -->
                    <div
                        class="absolute inset-0 w-32 h-32 border-4 border-green-300 rounded-full animate-ping opacity-75">
                    </div>
                    <div
                        class="absolute inset-0 w-32 h-32 border-2 border-green-400 rounded-full animate-spin opacity-50">
                    </div>
                </div>
            </div>

            <!-- Welcome Text with Typewriter Effect -->
            <div class="space-y-4">
                <h1
                    class="text-6xl md:text-7xl font-bold bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent animate-fade-in">
                    Welcome Back!
                </h1>
                <div class="typewriter-container">
                    <p class="text-2xl md:text-3xl text-gray-700 font-medium" id="typewriter-text"></p>
                    <span class="typewriter-cursor">|</span>
                </div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed animate-slide-up">
                    We're thrilled to have you back! Your furry friends are waiting for the best care possible.
                    Let's make their day purrfect together! 🐾
                </p>
            </div>

            <!-- Animated Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 animate-slide-up delay-300">
                <div
                    class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-green-100">
                    <div
                        class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full mx-auto mb-4 animate-bounce">
                        <i data-lucide="calendar-check" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">3</h3>
                    <p class="text-gray-600">Active Bookings</p>
                    <div class="mt-2 text-sm text-green-600 font-medium">Ready to go!</div>
                </div>

                <div
                    class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-blue-100">
                    <div
                        class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full mx-auto mb-4 animate-bounce delay-100">
                        <i data-lucide="heart" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">8</h3>
                    <p class="text-gray-600">Trusted Providers</p>
                    <div class="mt-2 text-sm text-blue-600 font-medium">Amazing care!</div>
                </div>

                <div
                    class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-purple-100">
                    <div
                        class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full mx-auto mb-4 animate-bounce delay-200">
                        <i data-lucide="cat" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">2</h3>
                    <p class="text-gray-600">Happy Cats</p>
                    <div class="mt-2 text-sm text-purple-600 font-medium">Whiskers & Luna</div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-12 animate-slide-up delay-500">
                <button onclick="startExploring()"
                    class="group bg-gradient-to-r from-green-500 to-emerald-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center justify-center space-x-2">
                    <i data-lucide="compass" class="w-5 h-5 group-hover:animate-spin"></i>
                    <span>Start Exploring</span>
                </button>
                <button onclick="quickBook()"
                    class="group bg-white text-green-600 px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 border-2 border-green-200 hover:border-green-300 flex items-center justify-center space-x-2">
                    <i data-lucide="calendar-plus" class="w-5 h-5 group-hover:animate-bounce"></i>
                    <span>Quick Book</span>
                </button>
            </div>

            <!-- Fun Cat Facts Carousel -->
            <div
                class="mt-16 bg-white/60 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-green-100 animate-slide-up delay-700">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center justify-center space-x-2">
                    <i data-lucide="lightbulb" class="w-5 h-5 text-yellow-500 animate-pulse"></i>
                    <span>Did You Know?</span>
                </h3>
                <div id="cat-facts" class="text-gray-700 text-center min-h-[60px] flex items-center justify-center">
                    <p class="text-lg italic"></p>
                </div>
                <div class="flex justify-center mt-4 space-x-2">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <div class="w-2 h-2 bg-green-300 rounded-full animate-pulse delay-100"></div>
                    <div class="w-2 h-2 bg-green-200 rounded-full animate-pulse delay-200"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Action Button -->
    <div class="fixed bottom-8 right-8 z-20">
        <button onclick="skipWelcome()"
            class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 animate-bounce">
            <i data-lucide="arrow-right" class="w-6 h-6"></i>
        </button>
    </div>
</div>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slide-up {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes typewriter {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    @keyframes blink {

        0%,
        50% {
            opacity: 1;
        }

        51%,
        100% {
            opacity: 0;
        }
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }

    .animate-slide-up {
        animation: slide-up 0.8s ease-out;
    }

    .delay-300 {
        animation-delay: 0.3s;
    }

    .delay-500 {
        animation-delay: 0.5s;
    }

    .delay-700 {
        animation-delay: 0.7s;
    }

    .typewriter-container {
        position: relative;
        display: inline-block;
    }

    .typewriter-cursor {
        animation: blink 1s infinite;
        font-weight: bold;
        font-size: 1.2em;
        color: #059669;
    }

    .welcome-logo {
        animation: fade-in 1.5s ease-out;
    }

    /* Gradient text animation */
    @keyframes gradient-shift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .bg-gradient-to-r {
        background-size: 200% 200%;
        animation: gradient-shift 3s ease infinite;
    }

    /* Floating animation for background elements */
    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
</style>

<script>
    // Typewriter effect
    const texts = [
        "Ready to pamper your cats? 🐱",
        "Your feline friends deserve the best! ✨",
        "Let's create magical moments together! 🌟",
        "Adventure awaits your furry companions! 🎉"
    ];

    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    function typeWriter() {
        const currentText = texts[textIndex];
        const typewriterElement = document.getElementById('typewriter-text');

        if (isDeleting) {
            typewriterElement.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
        } else {
            typewriterElement.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
        }

        if (!isDeleting && charIndex === currentText.length) {
            setTimeout(() => {
                isDeleting = true;
            }, 2000);
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
        }

        const typingSpeed = isDeleting ? 50 : 100;
        setTimeout(typeWriter, typingSpeed);
    }

    // Cat facts carousel
    const catFacts = [
        "Cats spend 70% of their lives sleeping - that's 13-16 hours a day! 😴",
        "A group of cats is called a 'clowder' and a group of kittens is called a 'kindle'! 📚",
        "Cats have over 20 muscles that control their ears! 👂",
        "A cat's purr vibrates at a frequency that promotes bone healing! 💚",
        "Cats can rotate their ears 180 degrees! 🔄",
        "The oldest known pet cat existed 9,500 years ago! 🏺"
    ];

    let factIndex = 0;

    function rotateFacts() {
        const factElement = document.querySelector('#cat-facts p');
        factElement.style.opacity = '0';

        setTimeout(() => {
            factElement.textContent = catFacts[factIndex];
            factElement.style.opacity = '1';
            factIndex = (factIndex + 1) % catFacts.length;
        }, 500);
    }

    // Button functions
    function startExploring() {
        // Add sparkle effect
        createSparkles();
        setTimeout(() => {
            window.location.href = '?page=overview';
        }, 1000);
    }

    function quickBook() {
        // Add bounce effect
        const button = event.target.closest('button');
        button.classList.add('animate-pulse');
        setTimeout(() => {
            window.location.href = '?page=providers';
        }, 500);
    }

    function skipWelcome() {
        // Fade out animation
        document.body.style.transition = 'opacity 0.5s ease-out';
        document.body.style.opacity = '0';
        setTimeout(() => {
            window.location.href = '?page=overview';
        }, 500);
    }

    function createSparkles() {
        for (let i = 0; i < 20; i++) {
            const sparkle = document.createElement('div');
            sparkle.innerHTML = '✨';
            sparkle.style.position = 'fixed';
            sparkle.style.left = Math.random() * window.innerWidth + 'px';
            sparkle.style.top = Math.random() * window.innerHeight + 'px';
            sparkle.style.fontSize = Math.random() * 20 + 10 + 'px';
            sparkle.style.pointerEvents = 'none';
            sparkle.style.zIndex = '1000';
            sparkle.style.animation = 'sparkle 1s ease-out forwards';
            document.body.appendChild(sparkle);

            setTimeout(() => {
                sparkle.remove();
            }, 1000);
        }
    }

    // Add sparkle animation CSS
    const sparkleStyle = document.createElement('style');
    sparkleStyle.textContent = `
        @keyframes sparkle {
            0% {
                opacity: 0;
                transform: scale(0) rotate(0deg);
            }
            50% {
                opacity: 1;
                transform: scale(1) rotate(180deg);
            }
            100% {
                opacity: 0;
                transform: scale(0) rotate(360deg);
            }
        }
    `;
    document.head.appendChild(sparkleStyle);

    // Initialize animations
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(typeWriter, 1000);
        setTimeout(() => {
            rotateFacts();
            setInterval(rotateFacts, 4000);
        }, 2000);

        // Add entrance animation to elements
        const elements = document.querySelectorAll('.animate-slide-up');
        elements.forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(40px)';
            setTimeout(() => {
                el.style.transition = 'all 0.8s ease-out';
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, 300 * (index + 1));
        });
    });

    // Auto-redirect after 10 seconds (optional)
    setTimeout(() => {
        const autoRedirect = confirm('Would you like to continue to your dashboard?');
        if (autoRedirect) {
            startExploring();
        }
    }, 10000);
</script>