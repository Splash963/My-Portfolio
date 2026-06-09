document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star-btn');
    const ratingInput = document.getElementById('rating_value');

    // ==================================================
    // 1. STAR RATING CLICK SELECTION LOGIC
    // ==================================================
    if (stars && stars.length > 0) {
        stars.forEach(star => {
            star.addEventListener('click', function () {
                const value = this.getAttribute('data-value');
                if (ratingInput) ratingInput.value = value;

                stars.forEach(s => {
                    const sValue = s.getAttribute('data-value');
                    if (parseInt(sValue) <= parseInt(value)) {
                        s.classList.remove('fa-regular', 'far');
                        s.classList.add('fa-solid');
                    } else {
                        s.classList.remove('fa-solid');
                        s.classList.add('fa-regular');
                    }
                });
            });
        });
    }

    // ==================================================
    // 2. FORM SUBMISSION (ADD REVIEW VIA AJAX)
    // ==================================================
    const form = document.getElementById('reviewForm');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const currentRating = document.getElementById('rating_value') ? document.getElementById('rating_value').value : 0;

            if (currentRating == 0) {
                alert('Please select a rating!');
                return;
            }

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());

            fetch(reviewSubmitRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || csrfToken
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(res => {
                    if (res.success) {
                        alert('Thank you! Your review has been submitted for approval.');
                        form.reset();
                        stars.forEach(s => {
                            s.classList.remove('fa-solid');
                            s.classList.add('fa-regular');
                        });
                        if (ratingInput) ratingInput.value = 0;
                    }
                })
                .catch(err => console.error('Error submitting form:', err));
        });
    }
});

//==========View All Appointment Data==========
document.addEventListener('DOMContentLoaded', function () {
    const viewButtons = document.querySelectorAll('.view-btn');

    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Get data from HTML attributes
            const id = this.getAttribute('data-id');
            const userName = this.getAttribute('data-user-name') || 'Guest';
            const email = this.getAttribute('data-email') || 'N/A';
            const companyName = this.getAttribute('data-company-name') || 'N/A';
            const position = this.getAttribute('data-position') || 'N/A';
            const reviewText = this.getAttribute('data-review') || '';
            const rating = parseInt(this.getAttribute('data-rating')) || 0;
            const isApproved = this.getAttribute('data-approved');
            const createdAt = this.getAttribute('data-created-at') || 'N/A';
            const updatedAt = this.getAttribute('data-updated-at') || 'N/A';

            // Set text values into Modal safely
            if (document.getElementById('id')) document.getElementById('id').textContent = id;
            if (document.getElementById('user-name')) document.getElementById('user-name').textContent = userName;
            if (document.getElementById('email')) document.getElementById('email').textContent = email;
            if (document.getElementById('company-name')) document.getElementById('company-name').textContent = companyName;
            if (document.getElementById('position')) document.getElementById('position').textContent = position;
            if (document.getElementById('review')) document.getElementById('review').textContent = reviewText;
            if (document.getElementById('created_at')) document.getElementById('created_at').textContent = createdAt;
            if (document.getElementById('updated_at')) document.getElementById('updated_at').textContent = updatedAt;

            // --- FIXED RATING STARS LOGIC ---
            const ratingSpan = document.getElementById('rating');
            if (ratingSpan) {
                let starHTML = '';
                for (let i = 1; i <= 5; i++) {
                    if (i <= rating) {
                        // Solid Star (Bolding Yellow)
                        starHTML += '<i class="fa-solid fa-star text-warning" style="margin-right: 4px;"></i>';
                    } else {
                        // Empty Star (Gray)
                        starHTML += '<i class="fa-regular fa-star text-muted" style="margin-right: 4px;"></i>';
                    }
                }
                // String එකක් විදිහට එකපාර HTML එක ඇතුළට පුරවනවා
                ratingSpan.innerHTML = starHTML;
            }

            // Status Badge Logic
            const statusSpan = document.getElementById('status');
            if (statusSpan) {
                statusSpan.className = 'badge';
                if (isApproved == '1' || isApproved == 'true' || isApproved === true) {
                    statusSpan.textContent = 'Approved';
                    statusSpan.classList.add('bg-success');
                } else {
                    statusSpan.textContent = 'Pending';
                    statusSpan.classList.add('bg-warning', 'text-dark');
                }
            }

            // Delete Button Update
            const deleteBtn = document.getElementById('delete-btn');
            if (deleteBtn) deleteBtn.setAttribute('data-id', id);
        });
    });
});

// --- CSS UNICODE RATING STARS LOGIC ---
const ratingSpan = document.getElementById('rating');
if (ratingSpan) {
    ratingSpan.innerHTML = ''; // Clear old content

    for (let i = 1; i <= 5; i++) {
        const starIcon = document.createElement('i');

        if (i <= rating) {
            // Solid Star (Font Awesome v6 Unicode: f005)
            starIcon.className = 'fa-solid fa-star text-warning me-1';
        } else {
            // Regular/Empty Star (Font Awesome v6 Unicode: f005)
            starIcon.className = 'fa-regular fa-star text-muted me-1';
        }

        ratingSpan.appendChild(starIcon);
    }

    // Font Awesome JS/SVG එකට බල කරනවා අලුත් tags ටික ආයේ scan කරලා SVG කරන්න
    if (window.FontAwesome) {
        window.FontAwesome.dom.i2svg({ node: ratingSpan });
    }
}