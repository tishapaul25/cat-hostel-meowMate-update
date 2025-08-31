<?php
$featured_post = [
    'id' => 1,
    'title' => 'The Complete Guide to Cat Hostel Services: Everything You Need to Know',
    'excerpt' => 'Planning to travel and need a safe place for your feline friend? Discover how to choose the perfect cat hostel and what to expect from professional pet care services.',
    'author' => 'Dr. Sarah Mitchell',
    'date' => '2024-01-15',
    'category' => 'Hostel Guide',
    'image' => 'https://i.postimg.cc/4yv0tFD0/gallery-img-7.jpg',
    'read_time' => '12 min read',
    'featured' => true
];

$blog_posts = [
    [
        'id' => 2,
        'title' => '10 Signs Your Cat is Happy and Healthy',
        'excerpt' => 'Learn to recognize the key indicators that show your feline friend is thriving and content in their environment.',
        'author' => 'Emily Rodriguez',
        'date' => '2024-01-12',
        'category' => 'Health',
        'image' => 'https://i.postimg.cc/MH4Lw4mT/cat-playing.jpg',
        'read_time' => '6 min read'
    ],
    [
        'id' => 3,
        'title' => 'Creating the Perfect Cat-Friendly Home',
        'excerpt' => 'Transform your living space into a paradise for your cat with these expert design tips and safety considerations.',
        'author' => 'Michael Chen',
        'date' => '2024-01-10',
        'category' => 'Home Setup',
        'image' => 'https://i.postimg.cc/t48zqNfn/cat-hostel-hero.avif',
        'read_time' => '8 min read'
    ],
    [
        'id' => 4,
        'title' => 'Understanding Cat Behavior: Decoding Your Pet\'s Actions',
        'excerpt' => 'Why does your cat knead blankets or bring you "gifts"? Understand the fascinating world of feline behavior.',
        'author' => 'Dr. Lisa Thompson',
        'date' => '2024-01-08',
        'category' => 'Behavior',
        'image' => 'https://i.postimg.cc/VsSn6Cqj/product-img-3.jpg',
        'read_time' => '10 min read'
    ],
    [
        'id' => 5,
        'title' => 'Essential Cat Nutrition: Feeding Your Feline Right',
        'excerpt' => 'Discover the fundamentals of cat nutrition and learn how to choose the best diet for your pet\'s age and lifestyle.',
        'author' => 'James Wilson',
        'date' => '2024-01-05',
        'category' => 'Nutrition',
        'image' => 'https://i.postimg.cc/fTrnD1vz/gallery-img-3.jpg',
        'read_time' => '7 min read'
    ],
    [
        'id' => 6,
        'title' => 'Grooming Tips for Long-Haired Cats',
        'excerpt' => 'Keep your long-haired feline looking beautiful and healthy with these professional grooming techniques and tools.',
        'author' => 'Sophie Anderson',
        'date' => '2024-01-03',
        'category' => 'Grooming',
        'image' => 'https://i.postimg.cc/VsSn6Cqj/product-img-3.jpg',
        'read_time' => '5 min read'
    ],
    [
        'id' => 7,
        'title' => 'Preparing Your Cat for Their First Hostel Stay',
        'excerpt' => 'Make your cat\'s boarding experience stress-free with these preparation tips and what to pack for their stay.',
        'author' => 'Dr. Sarah Mitchell',
        'date' => '2024-01-01',
        'category' => 'Hostel Guide',
        'image' => 'https://i.postimg.cc/j57mqjZt/gallery-img-6.jpg',
        'read_time' => '9 min read'
    ]
];

$categories = [
    ['name' => 'All Posts', 'count' => 7, 'color' => 'bg-gray-100 text-gray-700'],
    ['name' => 'Health', 'count' => 2, 'color' => 'bg-red-100 text-red-700'],
    ['name' => 'Hostel Guide', 'count' => 2, 'color' => 'bg-green-100 text-green-700'],
    ['name' => 'Behavior', 'count' => 1, 'color' => 'bg-blue-100 text-blue-700'],
    ['name' => 'Nutrition', 'count' => 1, 'color' => 'bg-yellow-100 text-yellow-700'],
    ['name' => 'Home Setup', 'count' => 1, 'color' => 'bg-purple-100 text-purple-700'],
    ['name' => 'Grooming', 'count' => 1, 'color' => 'bg-pink-100 text-pink-700']
];
?>



<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-emerald-50 via-green-50 to-teal-50 py-20 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-20 h-20 bg-green-400 rounded-full animate-pulse"></div>
        <div class="absolute top-32 right-20 w-16 h-16 bg-emerald-400 rounded-full animate-bounce"
            style="animation-delay: 0.5s;"></div>
        <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-teal-400 rounded-full animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute bottom-32 right-1/3 w-14 h-14 bg-green-500 rounded-full animate-bounce"
            style="animation-delay: 1.5s;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <div class="inline-flex items-center bg-white rounded-full px-6 py-2 shadow-lg mb-6">
                <span class="text-2xl mr-2">📚</span>
                <span class="text-green-600 font-semibold">Expert Cat Care Insights</span>
            </div>

            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Cat Care <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-600">Blog</span>
            </h1>

            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                Discover expert tips, heartwarming stories, and valuable insights to help you provide the best care for
                your feline friend. From health advice to hostel guides, we've got you covered.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <div class="relative">
                    <input type="text" placeholder="Search articles..."
                        class="w-80 px-6 py-3 rounded-full border-2 border-green-200 focus:border-green-500 focus:outline-none text-gray-700 shadow-lg"
                        id="search-input">
                    <button
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Post -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Featured Article</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-emerald-600 mx-auto rounded-full"></div>
        </div>

        <div class="max-w-6xl mx-auto">
            <div
                class="bg-white rounded-2xl shadow-2xl overflow-hidden hover:shadow-3xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="md:flex">
                    <div class="md:w-1/2 relative">
                        <img src="<?php echo $featured_post['image']; ?>" alt="<?php echo $featured_post['title']; ?>"
                            class="w-full h-64 md:h-full object-cover">
                        <div class="absolute top-4 left-4">
                            <span
                                class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                ⭐ Featured
                            </span>
                        </div>
                    </div>
                    <div class="md:w-1/2 p-8 md:p-12">
                        <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-medium">
                                <?php echo $featured_post['category']; ?>
                            </span>
                            <span><?php echo $featured_post['read_time']; ?></span>
                        </div>

                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                            <?php echo $featured_post['title']; ?>
                        </h3>

                        <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                            <?php echo $featured_post['excerpt']; ?>
                        </p>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-10 h-10 bg-gradient-to-r from-green-600 to-emerald-600 rounded-full flex items-center justify-center text-white font-semibold">
                                    <?php echo substr($featured_post['author'], 0, 1); ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900"><?php echo $featured_post['author']; ?></p>
                                    <p class="text-sm text-gray-500">
                                        <?php echo date('M j, Y', strtotime($featured_post['date'])); ?>
                                    </p>
                                </div>
                            </div>

                            <button onclick="openPost(<?php echo $featured_post['id']; ?>)"
                                class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-3 rounded-full font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Read Article →
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Browse by Category</h2>
        </div>

        <div class="flex flex-wrap justify-center gap-3">
            <?php foreach ($categories as $index => $category): ?>
                <button onclick="filterByCategory('<?php echo strtolower(str_replace(' ', '-', $category['name'])); ?>')"
                    class="category-btn <?php echo $category['color']; ?> px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg <?php echo $index === 0 ? 'ring-2 ring-green-500' : ''; ?>"
                    data-category="<?php echo strtolower(str_replace(' ', '-', $category['name'])); ?>">
                    <?php echo $category['name']; ?> (<?php echo $category['count']; ?>)
                </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Blog Posts Grid -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Latest Articles</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-emerald-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="posts-grid">
            <?php foreach ($blog_posts as $post): ?>
                <article
                    class="blog-post bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden"
                    data-category="<?php echo strtolower(str_replace(' ', '-', $post['category'])); ?>">
                    <div class="relative">
                        <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>"
                            class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        <div class="absolute top-4 left-4">
                            <?php
                            $categoryColors = [
                                'Health' => 'bg-red-500',
                                'Hostel Guide' => 'bg-green-500',
                                'Behavior' => 'bg-blue-500',
                                'Nutrition' => 'bg-yellow-500',
                                'Home Setup' => 'bg-purple-500',
                                'Grooming' => 'bg-pink-500'
                            ];
                            $colorClass = $categoryColors[$post['category']] ?? 'bg-gray-500';
                            ?>
                            <span
                                class="<?php echo $colorClass; ?> text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                <?php echo $post['category']; ?>
                            </span>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-black/50 text-white px-2 py-1 rounded text-xs">
                                <?php echo $post['read_time']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3
                            class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 hover:text-green-600 transition-colors">
                            <?php echo $post['title']; ?>
                        </h3>

                        <p class="text-gray-600 mb-4 line-clamp-3">
                            <?php echo $post['excerpt']; ?>
                        </p>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div
                                    class="w-8 h-8 bg-gradient-to-r from-green-600 to-emerald-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                    <?php echo substr($post['author'], 0, 1); ?>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">
                                        <?php echo explode(' ', $post['author'])[0]; ?>
                                    </p>
                                    <p class="text-xs text-gray-500"><?php echo date('M j', strtotime($post['date'])); ?>
                                    </p>
                                </div>
                            </div>

                            <button onclick="openPost(<?php echo $post['id']; ?>)"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 transform hover:scale-105">
                                Read More
                            </button>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Load More -->
        <div class="text-center mt-12">
            <button
                class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-full font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Load More Articles
            </button>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-gradient-to-r from-green-600 to-emerald-600">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-white/10 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                <span class="text-4xl">📧</span>
            </div>

            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Stay Updated with Cat Care Tips
            </h2>

            <p class="text-xl text-green-100 mb-8">
                Get the latest articles, expert advice, and exclusive content delivered straight to your inbox.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Enter your email address"
                    class="flex-1 px-6 py-4 rounded-full border-0 focus:outline-none focus:ring-4 focus:ring-white/30 text-gray-900" />
                <button
                    class="bg-white text-green-600 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition-colors shadow-lg">
                    Subscribe Now
                </button>
            </div>

            <p class="text-green-100 text-sm mt-4">
                Join 5,000+ cat parents who trust our advice. Unsubscribe anytime.
            </p>
        </div>
    </div>
</section>

<!-- Article Modal -->
<div id="article-modal" class="fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b p-6 flex items-center justify-between rounded-t-2xl">
            <h3 id="modal-title" class="text-2xl font-bold text-gray-900"></h3>
            <button id="close-modal" class="text-gray-500 hover:text-gray-700 p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="p-6">
            <div id="modal-meta" class="flex items-center space-x-4 text-sm text-gray-500 mb-6"></div>
            <img id="modal-image" src="/placeholder.svg" alt="" class="w-full h-64 object-cover rounded-xl mb-6" />
            <div id="modal-content" class="prose prose-lg max-w-none"></div>
        </div>
    </div>
</div>

<script>
    // Sample full content for posts
    const fullPosts = {
        1: {
            title: "The Complete Guide to Cat Hostel Services: Everything You Need to Know",
            content: `
            <p>When planning a vacation or business trip, finding the right care for your beloved feline companion is crucial. Cat hostels provide a safe, comfortable environment where your pet can stay while you're away, but choosing the right one requires careful consideration.</p>
            
            <h3>What to Look for in a Cat Hostel</h3>
            <p>A quality cat hostel should offer clean, spacious accommodations with proper ventilation and temperature control. Look for facilities that provide individual spaces for each cat, reducing stress and preventing the spread of illness.</p>
            
            <h3>Questions to Ask Before Booking</h3>
            <ul>
                <li>What are the staff qualifications and experience?</li>
                <li>How often are cats checked on during the day?</li>
                <li>What happens in case of a medical emergency?</li>
                <li>Can you bring your cat's favorite toys and bedding?</li>
            </ul>
            
            <p>Remember, a good cat hostel will welcome your questions and provide detailed answers about their care procedures.</p>
        `
        },
        2: {
            title: "10 Signs Your Cat is Happy and Healthy",
            content: `
            <p>Understanding your cat's wellbeing is essential for providing the best care. Here are the key indicators that your feline friend is thriving.</p>
            
            <h3>Physical Signs of Health</h3>
            <p>A healthy cat will have bright, clear eyes, a clean nose, and a shiny coat. Their appetite should be consistent, and they should maintain a healthy weight.</p>
            
            <h3>Behavioral Indicators</h3>
            <p>Happy cats are playful, curious, and social. They'll seek attention from their owners and show interest in their environment.</p>
        `
        }
        // Add more posts as needed
    };

    // Filter functionality
    function filterByCategory(category) {
        const posts = document.querySelectorAll('.blog-post');
        const buttons = document.querySelectorAll('.category-btn');

        // Update active button
        buttons.forEach(btn => {
            btn.classList.remove('ring-2', 'ring-green-500');
            if (btn.dataset.category === category) {
                btn.classList.add('ring-2', 'ring-green-500');
            }
        });

        // Show/hide posts
        posts.forEach(post => {
            if (category === 'all-posts' || post.dataset.category === category) {
                post.style.display = 'block';
            } else {
                post.style.display = 'none';
            }
        });
    }

    // Open article modal
    function openPost(postId) {
        const post = fullPosts[postId];
        if (!post) return;

        document.getElementById('modal-title').textContent = post.title;
        document.getElementById('modal-content').innerHTML = post.content;
        document.getElementById('article-modal').classList.remove('hidden');
    }

    // Close modal
    document.getElementById('close-modal').addEventListener('click', function () {
        document.getElementById('article-modal').classList.add('hidden');
    });

    // Close modal on background click
    document.getElementById('article-modal').addEventListener('click', function (e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });

    // Search functionality
    document.getElementById('search-input').addEventListener('input', function (e) {
        const searchTerm = e.target.value.toLowerCase();
        const posts = document.querySelectorAll('.blog-post');

        posts.forEach(post => {
            const title = post.querySelector('h3').textContent.toLowerCase();
            const excerpt = post.querySelector('p').textContent.toLowerCase();

            if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                post.style.display = 'block';
            } else {
                post.style.display = 'none';
            }
        });
    });
</script>