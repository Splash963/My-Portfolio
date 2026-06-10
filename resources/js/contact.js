// Form Submission
const form = document.getElementById('messageForm');
if (form) {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const data = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            subject: document.getElementById('subject').value,
            message: document.getElementById('message').value,
        };
        console.log(data);
        console.log(contactSubmitRoute);

        fetch(contactSubmitRoute, {
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
                    alert('Thank you! Your message has been sent successfully.');
                    form.reset();
                }
            })
            .catch(err => console.error(err));
    });
}