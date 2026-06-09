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

            // Meta tag එකෙන් CSRF token එක live කියවනවා
            const tokenElement = document.querySelector('meta[name="csrf-token"]');
            const token = tokenElement ? tokenElement.getAttribute('content') : '';

            fetch(reviewSubmitRoute, {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
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
                .catch(err => console.error(err));
        });
    }
});