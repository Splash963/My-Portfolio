// Helper function to escape HTML
function escapeHtml(text) {
    if (!text) return '';
    return text
        .toString()
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

//==========View Projects==========
function fetchProjects() {
    fetch(projectViewRoute, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const tableBody = document.getElementById('projects-table-body');
            tableBody.innerHTML = ''; // Clear existing table body

            if (data.length === 0) {
                tableBody.innerHTML = `
                    <tr class="table-dark text-center">
                        <td colspan="9">No projects found.</td>
                    </tr>
                `;
                return;
            }

            data.forEach(project => {
                const tr = document.createElement('tr');
                tr.className = 'table-dark';

                const createdAt = new Date(project.created_at).toLocaleString();
                const updatedAt = new Date(project.updated_at).toLocaleString();

                tr.innerHTML = `
                    <th scope="row">${project.id}</th>
                    <td>${escapeHtml(project.title)}</td>
                    <td>
                        ${project.image ? `<img src="${projectImageBase}/${project.image}" alt="${escapeHtml(project.title)}" style="max-height: 50px; border-radius: 4px; object-fit: cover;">` : 'No Image'}
                    </td>
                    <td>${escapeHtml(project.description)}</td>
                    <td>
                        ${project.project_link ? `<a href="${escapeHtml(project.project_link)}" target="_blank" class="text-info">${escapeHtml(project.project_link)}</a>` : 'N/A'}
                    </td>
                    <td>
                        ${project.github_link ? `<a href="${escapeHtml(project.github_link)}" target="_blank" class="text-info">${escapeHtml(project.github_link)}</a>` : 'N/A'}
                    </td>
                    <td>${createdAt}</td>
                    <td>${updatedAt}</td>
                    <td style="display: flex; justify-content: center; gap: 1rem;">
                        <button class="btn btn-warning btn-sm" disabled title="Update functionality not implemented on backend">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </button>
                        <button class="btn btn-danger btn-sm" disabled title="Delete functionality not implemented on backend">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </button>
                    </td>
                `;
                tableBody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error fetching projects:', error));
}

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
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            alert(data.message);
            modalInstance.hide();

            // Reset the form fields
            document.getElementById('addProjectForm').reset();

            // Refresh table dynamically without page reload
            fetchProjects();
        })
        .catch(error => {
            console.error('Error adding project:', error);
            alert('Failed to add project. Please try again.');
        });
});

// Load projects on page load
document.addEventListener('DOMContentLoaded', fetchProjects);
