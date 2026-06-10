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



//View Data in Modal
document.addEventListener('DOMContentLoaded', function () {
    const viewButtons = document.querySelectorAll('.view-btn');

    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const userName = this.getAttribute('data-user-name') || 'Guest';
            const email = this.getAttribute('data-email') || 'N/A';
            const subject = this.getAttribute('data-subject') || 'N/A';
            const message = this.getAttribute('data-message') || 'N/A';
            const status = this.getAttribute('data-status') || 'Pending';
            const createdAt = this.getAttribute('data-created-at') || 'N/A';
            const updatedAt = this.getAttribute('data-updated-at') || 'N/A';


            if (document.getElementById('id')) document.getElementById('id').textContent = id;
            if (document.getElementById('user-name')) document.getElementById('user-name').textContent = userName;
            if (document.getElementById('email')) document.getElementById('email').textContent = email;
            if (document.getElementById('subject')) document.getElementById('subject').textContent = subject;
            if (document.getElementById('message')) document.getElementById('message').textContent = message;
            if (document.getElementById('created_at')) document.getElementById('created_at').textContent = createdAt;
            if (document.getElementById('updated_at')) document.getElementById('updated_at').textContent = updatedAt;


            const statusSpan = document.getElementById('status');
            if (statusSpan) {
                statusSpan.textContent = status;
                statusSpan.className = 'badge';

                if (status === 'Replied') {
                    statusSpan.classList.add('bg-success');
                } else if (status === 'Pending') {
                    statusSpan.classList.add('bg-warning', 'text-dark');
                }
            }

            const deleteBtn = document.getElementById('delete-btn');
            if (deleteBtn) deleteBtn.setAttribute('data-id', id);
        });
    });
});
