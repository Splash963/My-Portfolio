document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'); // Ensure CSRF token is fetched

    // --- Reply Buttons ---
    document.querySelectorAll('.reply-btn').forEach(button => {
        button.addEventListener('click', function () {
            const reviewId = this.getAttribute('data-id');

            if (!reviewId) return;
            if (!confirm('Are you sure you replyed to this message?')) return;

            fetch(`/admin/messages/${reviewId}/reply`, {
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
                        alert('Failed to Status Change!');
                    }
                })
                .catch(err => console.error(err));
        });
    });

    // --- Pending Buttons ---
    document.querySelectorAll('.pending-btn').forEach(button => {
        button.addEventListener('click', function () {
            const reviewId = this.getAttribute('data-id');

            if (!reviewId) return;
            if (!confirm('Are you sure you want to Change Status of this message?')) return;

            fetch(`/admin/messages/${reviewId}/pending`, {
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