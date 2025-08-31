<script>
// Initialize Lucide icons
lucide.createIcons();

// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    }

    // Image gallery modal
    const galleryItems = document.querySelectorAll('.gallery-item');
    const modal = document.getElementById('image-modal');
    const modalImage = document.getElementById('modal-image');
    const modalTitle = document.getElementById('modal-title');
    const modalCounter = document.getElementById('modal-counter');
    const closeModal = document.getElementById('close-modal');
    const prevImage = document.getElementById('prev-image');
    const nextImage = document.getElementById('next-image');

    let currentImageIndex = 0;

    if (galleryItems.length > 0 && typeof galleryData !== 'undefined') {
        galleryItems.forEach((item, index) => {
            item.addEventListener('click', function() {
                currentImageIndex = index;
                showModal();
            });
        });

        closeModal?.addEventListener('click', hideModal);
        prevImage?.addEventListener('click', showPrevImage);
        nextImage?.addEventListener('click', showNextImage);

        // Close modal on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') hideModal();
            if (e.key === 'ArrowLeft') showPrevImage();
            if (e.key === 'ArrowRight') showNextImage();
        });

        // Close modal on background click
        modal?.addEventListener('click', function(e) {
            if (e.target === modal) hideModal();
        });
    }

    function showModal() {
        const image = galleryData[currentImageIndex];
        modalImage.src = image.src;
        modalImage.alt = image.alt;
        modalTitle.textContent = image.title;
        modalCounter.textContent = `${currentImageIndex + 1} of ${galleryData.length}`;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function hideModal() {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function showPrevImage() {
        currentImageIndex = (currentImageIndex - 1 + galleryData.length) % galleryData.length;
        showModal();
    }

    function showNextImage() {
        currentImageIndex = (currentImageIndex + 1) % galleryData.length;
        showModal();
    }
});
</script>
