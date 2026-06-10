document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star-btn');
    const ratingInput = document.getElementById('rating_value');

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

    // Form Submission
    const form = document.getElementById('reviewForm');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            if (!ratingInput || ratingInput.value == 0) {
                alert('Please select a rating!');
                return;
            }

            const data = {
                company_name: document.getElementById('companyName').value,
                position: document.getElementById('position').value,
                review: document.getElementById('review').value,
                rating: ratingInput.value,
            };

            fetch(reviewSubmitRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
                        ratingInput.value = 0;
                    }
                })
                .catch(err => console.error(err));
        });
    }
});

//==========View All Appointment Data==========
document.addEventListener('DOMContentLoaded', function () {
    const viewButtons = document.querySelectorAll('.view-btn');

    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const userName = this.getAttribute('data-user-name') || 'Guest';
            const email = this.getAttribute('data-email') || 'N/A';
            const companyName = this.getAttribute('data-company-name') || 'N/A';
            const position = this.getAttribute('data-position') || 'N/A';
            const reviewText = this.getAttribute('data-review') || '';
            const rating = parseInt(this.getAttribute('data-rating')) || 0;
            const status = this.getAttribute('data-status') || 'Pending';
            const createdAt = this.getAttribute('data-created-at') || 'N/A';
            const updatedAt = this.getAttribute('data-updated-at') || 'N/A';


            if (document.getElementById('id')) document.getElementById('id').textContent = id;
            if (document.getElementById('user-name')) document.getElementById('user-name').textContent = userName;
            if (document.getElementById('email')) document.getElementById('email').textContent = email;
            if (document.getElementById('company-name')) document.getElementById('company-name').textContent = companyName;
            if (document.getElementById('position')) document.getElementById('position').textContent = position;
            if (document.getElementById('review')) document.getElementById('review').textContent = reviewText;
            if (document.getElementById('created_at')) document.getElementById('created_at').textContent = createdAt;
            if (document.getElementById('updated_at')) document.getElementById('updated_at').textContent = updatedAt;

            const ratingSpan = document.getElementById('rating');
            if (ratingSpan) {
                let starHTML = '';
                for (let i = 1; i <= 5; i++) {
                    if (i <= rating) {
                        starHTML += '<i class="fa-solid fa-star text-warning" style="margin-right: 4px;"></i>';
                    } else {
                        starHTML += '<i class="fa-regular fa-star text-muted" style="margin-right: 4px;"></i>';
                    }
                }
                ratingSpan.innerHTML = starHTML;
            }

            const statusSpan = document.getElementById('status');
            if (statusSpan) {
                statusSpan.textContent = status;
                statusSpan.className = 'badge';

                if (status === 'Approved') {
                    statusSpan.classList.add('bg-success');
                } else if (status === 'Canceled' || status === 'Rejected') {
                    statusSpan.classList.add('bg-danger');
                } else {
                    statusSpan.classList.add('bg-warning', 'text-dark');
                }
            }

            const deleteBtn = document.getElementById('delete-btn');
            if (deleteBtn) deleteBtn.setAttribute('data-id', id);
        });
    });
});


//Stars Loader
const ratingSpan = document.getElementById('rating');
if (ratingSpan) {
    ratingSpan.innerHTML = '';

    for (let i = 1; i <= 5; i++) {
        const starIcon = document.createElement('i');

        if (i <= rating) {
            starIcon.className = 'fa-solid fa-star text-warning me-1';
        } else {
            starIcon.className = 'fa-regular fa-star text-muted me-1';
        }

        ratingSpan.appendChild(starIcon);
    }

    if (window.FontAwesome) {
        window.FontAwesome.dom.i2svg({ node: ratingSpan });
    }
}


document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'); // Ensure CSRF token is fetched

    // --- Approve Buttons ---
    document.querySelectorAll('.approve-btn').forEach(button => {
        button.addEventListener('click', function () {
            const reviewId = this.getAttribute('data-id');

            if (!reviewId) return;
            if (!confirm('Are you sure you want to approve this review?')) return;

            fetch(`/admin/reviews/${reviewId}/approve`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert('Failed to approve review!');
                    }
                })
                .catch(err => console.error(err));
        });
    });

    // --- Reject (Cancel) Buttons ---
    document.querySelectorAll('.reject-btn').forEach(button => {
        button.addEventListener('click', function () {
            const reviewId = this.getAttribute('data-id');

            if (!reviewId) return;
            if (!confirm('Are you sure you want to reject this review?')) return;

            fetch(`/admin/reviews/${reviewId}/reject`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert('Failed to reject review!');
                    }
                })
                .catch(err => console.error(err));
        });
    });
});
