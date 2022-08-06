
window.addEventListener('load', ()=>{

    const providersSelect = document.querySelector('#select-providers');
    const productsSelect = document.querySelector('#select-products');
    const pcs = document.querySelector('#number-of-pieces');
    const submitButton = document.querySelector('#save-entry-btn');
    let products;

    const API = "http://localhost:8000/api"

    submitButton.setAttribute('disabled', 'true');
    events();

    function events(){
        providersSelect.addEventListener('change', loadProducts);
        pcs.addEventListener('change', validatePositive);
        pcs.addEventListener('keyup', validatePositive);
    }

    function validatePositive(e){

        if(parseInt(e.target.value) > 0){
            console.log('positivo');
            pcs.classList.remove('is-invalid');
            pcs.classList.add('is-valid');
            submitButton.removeAttribute('disabled');
        }else{
            pcs.classList.remove('is-valid');
            pcs.classList.add('is-invalid');
            submitButton.setAttribute('disabled', 'true');
        }
    }

    async function getProducts(providerId){
        await fetch(`${API}/products?provider_id=${providerId}`)
            .then(response => response.json())
            .then(data => products = data);
    }

    async function loadProducts(e){
        await getProducts(e.target.value);

        cleanHTML();

        const option = document.createElement('option');
            option.setAttribute('disabled', 'true');
            option.setAttribute('selected', 'true');
            option.innerHTML = '-- Selecciona un Producto --';

            productsSelect.appendChild(option);

        products.forEach(product => {
            const option = document.createElement('option');
            option.setAttribute('value', product.id);
            option.innerHTML = product.description;

            productsSelect.appendChild(option);
        });


    }

    function cleanHTML(){
        while (productsSelect.firstChild) {
            productsSelect.removeChild(productsSelect.firstChild);
        }
    }

});
