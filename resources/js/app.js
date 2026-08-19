/**
 * DapurKuliner - Main Application Script
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
            }
        });
    }

    // 2. Admin Modal Logic & Shortcut (Ctrl + Shift + L)
    const adminModal = document.getElementById('admin-modal');
    const adminModalBox = document.getElementById('admin-modal-box');
    const closeAdminModalBtn = document.getElementById('close-admin-modal-btn');
    const adminPasswordInput = document.getElementById('admin-password');
    const openAdminBtns = document.querySelectorAll('.open-admin-modal-btn');

    function openAdminModal() {
        if (!adminModal) return;
        adminModal.classList.remove('hidden');
        adminModal.classList.add('flex');
        setTimeout(() => {
            if (adminModalBox) {
                adminModalBox.classList.remove('scale-95', 'opacity-0');
                adminModalBox.classList.add('scale-100', 'opacity-100');
            }
            if (adminPasswordInput) {
                adminPasswordInput.focus();
            }
        }, 30);
    }

    function closeAdminModal() {
        if (!adminModal) return;
        if (adminModalBox) {
            adminModalBox.classList.remove('scale-100', 'opacity-100');
            adminModalBox.classList.add('scale-95', 'opacity-0');
        }
        setTimeout(() => {
            adminModal.classList.add('hidden');
            adminModal.classList.remove('flex');
        }, 200);
    }

    function toggleAdminModal() {
        if (adminModal && !adminModal.classList.contains('hidden')) {
            closeAdminModal();
        } else {
            openAdminModal();
        }
    }

    // Event listener for Ctrl + Shift + L
    document.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.key === 'L' || e.key === 'l' || e.code === 'KeyL')) {
            e.preventDefault();
            toggleAdminModal();
        }
        if (e.key === 'Escape') {
            closeAdminModal();
        }
    });

    if (closeAdminModalBtn) {
        closeAdminModalBtn.addEventListener('click', closeAdminModal);
    }

    openAdminBtns.forEach(btn => {
        btn.addEventListener('click', openAdminModal);
    });

    if (adminModal) {
        adminModal.addEventListener('click', (e) => {
            if (e.target === adminModal) {
                closeAdminModal();
            }
        });
    }

    // 3. Live Image Preview on Create Form
    const imageInput = document.getElementById('image-input');
    const imagePreview = document.getElementById('image-preview');
    const previewPlaceholder = document.getElementById('preview-placeholder');

    if (imageInput && imagePreview && previewPlaceholder) {
        const updatePreview = () => {
            const url = imageInput.value.trim();
            if (url) {
                imagePreview.src = url;
                imagePreview.onload = () => {
                    imagePreview.classList.remove('hidden');
                    previewPlaceholder.classList.add('hidden');
                };
                imagePreview.onerror = () => {
                    imagePreview.classList.add('hidden');
                    previewPlaceholder.classList.remove('hidden');
                    previewPlaceholder.innerHTML = '<span class="text-rose-500 font-semibold text-xs text-center px-4"><i class="fa-solid fa-triangle-exclamation mr-1"></i> Gambar gagal dimuat. Pastikan URL gambar benar.</span>';
                };
            } else {
                imagePreview.classList.add('hidden');
                previewPlaceholder.classList.remove('hidden');
                previewPlaceholder.innerHTML = '<span class="text-stone-400 text-xs"><i class="fa-solid fa-image mr-1"></i> Pratinjau foto hidangan akan otomatis muncul di sini</span>';
            }
        };

        imageInput.addEventListener('input', updatePreview);
        imageInput.addEventListener('change', updatePreview);
        if (imageInput.value) {
            updatePreview();
        }
    }

    // 4. Interactive Ingredient Checklist on Detail Page
    const ingredientCheckboxes = document.querySelectorAll('.ingredient-checkbox');
    const progressCount = document.getElementById('ingredients-progress-count');

    if (ingredientCheckboxes.length > 0) {
        const updateProgress = () => {
            const total = ingredientCheckboxes.length;
            const checkedCount = document.querySelectorAll('.ingredient-checkbox:checked').length;
            
            if (progressCount) {
                progressCount.textContent = `${checkedCount}/${total} bahan siap`;
            }
        };

        ingredientCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (e) => {
                const parent = e.target.closest('.ingredient-item');
                if (parent) {
                    if (e.target.checked) {
                        parent.classList.add('checked');
                    } else {
                        parent.classList.remove('checked');
                    }
                }
                updateProgress();
            });
        });

        updateProgress();
    }

    // 5. Share Recipe Link Helper
    const shareBtn = document.getElementById('share-recipe-btn');
    if (shareBtn) {
        shareBtn.addEventListener('click', async () => {
            const url = window.location.href;
            if (navigator.clipboard) {
                try {
                    await navigator.clipboard.writeText(url);
                    showToast('Tautan resep berhasil disalin ke clipboard! 📋');
                } catch (err) {
                    prompt('Salin link resep ini:', url);
                }
            } else {
                prompt('Salin link resep ini:', url);
            }
        });
    }

    // 6. Toast Notification Helper
    function showToast(message) {
        let toast = document.getElementById('dk-toast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'dk-toast';
            toast.className = 'fixed bottom-6 right-6 z-50 bg-[#1c120c] text-amber-100 border border-amber-600/50 px-5 py-3 rounded-2xl shadow-2xl flex items-center gap-3 text-sm font-medium transition-all duration-300 transform translate-y-12 opacity-0';
            document.body.appendChild(toast);
        }

        toast.innerHTML = `<i class="fa-solid fa-circle-check text-amber-400 text-lg"></i> <span>${message}</span>`;
        
        // Show
        setTimeout(() => {
            toast.classList.remove('translate-y-12', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        }, 50);

        // Hide
        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('translate-y-12', 'opacity-0');
        }, 3000);
    }
});
