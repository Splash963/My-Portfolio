//==========Add Project==========
document.getElementById('addProjectForm').addEventListener('submit', function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    const modalElement = document.getElementById('addProjectModal');
    const modalInstance = bootstrap.Modal.getInstance(modalElement);

    fetch(projectAddRoute, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            alert(data.message);
            modalInstance.hide();
            location.reload();
        })
        .catch(error => console.log(error));
});