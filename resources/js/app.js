import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();




// Custom JS
function fetchProductsFromAPI(page = 1) {
    const productsAPIToken = 'Bearer ' + localStorage.getItem('user-login-api-token'); // Retrieve the stored API Token from the Local Storage and add the 'Bearer ' prefix to the API Bearer Token
    console.log(productsAPIToken);

    fetch('http://127.0.0.1:8000/api/v1/products' + '?page=' + page, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Authorization': productsAPIToken
        },
    })
    .then(response => response.json())
    .then(jsonResponse => {
        // console.log(jsonResponse);

        // With Pagination
        const productsTableBody = document.querySelector('#products-table-body');
        productsTableBody.innerHTML = ''; // Clear any previous content
        jsonResponse.data.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${product.id}</td>
                <td>${product.name}</td>
                <td>${product.description}</td>
                <td>${product.price}</td>
                <td>${product.quantity}</td>
                <td>
                    <button class="edit-button" data-id="${product.id}">Edit</button>
                    <button class="delete-button" data-id="${product.id}">Delete</button>
                </td>
            `;
            productsTableBody.appendChild(row);
        });

        // Render pagination
        renderPagination(jsonResponse.meta); // Pass the paginated 'meta' key value to render pagination controls
    });
}


function renderPagination(jsonResponseMetaKey) {
    const paginationContainer = document.querySelector('#pagination');
    paginationContainer.innerHTML = ''; // Clear existing pagination

    // Create Previous Button
    if (jsonResponseMetaKey.prev_page_url) {
        const prevButton = document.createElement('button');
        prevButton.innerHTML = '&laquo; Previous';
        prevButton.onclick = () => fetchProductsFromAPI(jsonResponseMetaKey.current_page - 1);
        paginationContainer.appendChild(prevButton);
    }

    // Create Page Number Buttons
    jsonResponseMetaKey.links.forEach(link => {
        if (link.url) {
            // console.log(link.url);
            const pageButton = document.createElement('button');
            pageButton.innerHTML = link.label;
            pageButton.onclick = () => fetchProductsFromAPI(new URL(link.url).searchParams.get('page'));
            if (link.active) {
                pageButton.disabled = true; // Disable the current active page button
            }
            paginationContainer.appendChild(pageButton);
        }
    });

    // Create Next Button
    if (jsonResponseMetaKey.next_page_url) {
        const nextButton = document.createElement('button');
        nextButton.innerHTML = 'Next &raquo;';
        nextButton.onclick = () => fetchProductsFromAPI(jsonResponseMetaKey.current_page + 1);
        paginationContainer.appendChild(nextButton);
    }
}



function collectBreezeLoginFormData() {
    const breezeLoginForm = document.getElementById('breeze-login-form');
    // console.log(breezeLoginForm);

    if (breezeLoginForm) {
        breezeLoginForm.addEventListener('submit', function(event) {
            // event.preventDefault(); // Prevent default form submission

            const breezeLoginFormData = new FormData(breezeLoginForm);
            const
                loginEmail = breezeLoginFormData.get('email'),
                loginPassword = breezeLoginFormData.get('password')
            ;
            console.log(loginEmail, loginPassword, breezeLoginForm);

            // If the 'user-login-api-token' isn't stored in the Local Storage, authenticate the user with the Products API
            if (localStorage.getItem('user-login-api-token') === null) {
                authenticateUserWithProductsAPI(loginEmail, loginPassword);
            }

            // Submit Breeze Login Form Programmatically after I prevented its submission (anyway)
            breezeLoginForm.submit();
        });
    }
}

function authenticateUserWithProductsAPI(loginEmail, loginPassword) {
    fetch('http://127.0.0.1:8000/api/v1/authenticate', {
        method: 'POST',
        headers: {
            'Accept':       'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            email:      loginEmail,
            password:   loginPassword,
            token_name: 'user-session-token'
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);

        // Save the token in the Local Storage
        if (data.token) {
            localStorage.setItem('user-login-api-token', data.token);
        }
    });
}

// Function to handle product deletion
function deleteProduct(productId) {
    const productsAPIToken = 'Bearer ' + localStorage.getItem('user-login-api-token'); // Retrieve the token
    fetch(`http://127.0.0.1:8000/products/${productId}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'Authorization': productsAPIToken,
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => {
        if (response.ok) {
            alert('Product deleted successfully!');
            fetchProductsFromAPI(); // Refresh the table
        } else {
            alert('Failed to delete the product.');
        }
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', () => {
    collectBreezeLoginFormData();
    fetchProductsFromAPI();


    const productsTableBody = document.querySelector('#products-table-body');

    // Attach event listeners for Edit and Delete buttons
    productsTableBody.addEventListener('click', (event) => {  // Event Delegation to the table <body> element
        if (event.target.classList.contains('edit-button')) {
            // Handle Edit button click
            const productId = event.target.getAttribute('data-id');
            window.location.href = `/products/${productId}/edit`; // Redirect to edit page
        } else if (event.target.classList.contains('delete-button')) {
            // Handle Delete button click
            const productId = event.target.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this product?')) {
                deleteProduct(productId); // Call the delete function
            }
        }
    });

});
