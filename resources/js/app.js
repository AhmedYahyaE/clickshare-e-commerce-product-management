import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();




// Custom JS
// function getAuthenticationToken() {

//     fetch('http://127.0.0.1:8000/api/v1/authenticate', {
//         method: 'POST',
//         headers: {
//             'Accept': 'application/json',
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': csrfToken
//         },
//         body: JSON.stringify({
//             token_name: 'user-session-token'  // A dynamic token name or any other parameter if needed
//         })
//     });
// }

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
        console.log(jsonResponse);

        /*
            // Display the products in products/index.blade.php
            const productsContainer = document.getElementById('products-container');
            jsonResponse.data.forEach(product => {
                const productDivElement = document.createElement('div');
                productDivElement.textContent = `Product ID: ${product.id}, Product Name: ${product.name}, Product Price: ${product.price}, Product Quantity: ${product.quantity}, Product Description: ${product.description}`;
                productsContainer.appendChild(productDivElement);
            });
        */

        // Without Pagination
        /*
            const productsTableBody = document.querySelector('#products-table-body');
            // productsTableBody.innerHTML = ''; // Clear any previous content
            jsonResponse.data.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>${product.price}</td>
                    <td>${product.quantity}</td>
                `;
                productsTableBody.appendChild(row);
            });
        */

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

    // Create Next Button
    if (jsonResponseMetaKey.next_page_url) {
        const nextButton = document.createElement('button');
        nextButton.innerHTML = 'Next &raquo;';
        nextButton.onclick = () => fetchProductsFromAPI(jsonResponseMetaKey.current_page + 1);
        paginationContainer.appendChild(nextButton);
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

            authenticateUserWithProductsAPI(loginEmail, loginPassword);

            // Submit Breeze Login Form Programmatically after I prevented its submission (anyway)
            breezeLoginForm.submit();
        });
    }
}

function authenticateUserWithProductsAPI(loginEmai, loginPassword) {
    fetch('http://127.0.0.1:8000/api/v1/authenticate', {
        method: 'POST',
        headers: {
            'Accept':       'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            email:      loginEmai,
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

document.addEventListener('DOMContentLoaded', () => {
    collectBreezeLoginFormData();
    fetchProductsFromAPI();
    // getAuthenticationToken(); // Get authentication token when the page is loaded
    // fetchProductsFromAPI(); // Fetch products when the page is loaded
});
