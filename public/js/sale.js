document.addEventListener('DOMContentLoaded', (event) => {

    const d = document;
    const getClient = d.getElementById('clients');
    const getProduct = d.getElementById('code-product');
    const productsSection = d.getElementById('products-section');
    const subTotalSection = d.getElementById('subtotal');
    const totalSection = d.getElementById('total');
    const saveSale = d.getElementById('save-sale');
    const discountSection = d.getElementById('discount-section');
    const clientCard = d.getElementById('client-section');

    getProduct.focus();

    const useLocalStorage = () => {

        const getSale = localStorage.getItem('sale');
        const getPriceData = localStorage.getItem('price-data');
        const getClientId = localStorage.getItem('client-data');

        if (!getSale) localStorage.setItem('sale', '[]');
        if (!getPriceData) localStorage.setItem('price-data', '[]');
        if (!getClientId) localStorage.setItem('client-data', '{}')

    }

    const existClient = () => {
        let client = localStorage.getItem('client-data');
        const dataClient = JSON.parse(client);

        if (Object.keys(dataClient).length < 1) {
            clientCard.textContent = '';
            return;
        }
        getClient.setAttribute('disabled', 'true');
        getClient.setAttribute('hidden', 'true')
        getClient.value = dataClient.id;
        renderClientSection();
    }
    useLocalStorage();


    const fetchData = (endpoint, data, method = 'GET') => {

        if (method === 'GET') {
            return fetch(endpoint);
        } else {
            return fetch(endpoint, {
                method,
                headers: { 'Content-type': 'application/json', 'X-CSRF-TOKEN': d.querySelector('meta[name="csrf-token"]').getAttribute('content') },
                body: JSON.stringify(data)
            });
        }

    };

    const applyDiscount = () => {

        const input = d.getElementById('input-discount');
        const btn = d.getElementById('btn-discount');
        let finalTotal = 0;

        if(!input.value) return;

        const { subTotal, total } = getTotalAndSubtotal();

        if (input.value < total) {
            finalTotal = total - input.value;
        }

        const finalPrices = { discount: parseInt(input.value), subTotal, total: finalTotal }
        localStorage.setItem('price-data', JSON.stringify(finalPrices));

        if (input) {
            subTotalSection.textContent = `SubTotal: $${subTotal}`
            totalSection.textContent = `Total: $${finalTotal}`
            input.setAttribute('disabled', 'true');
            btn.setAttribute('disabled', 'true');
        }
    }

    const renderDiscountSection = () => {

        discountSection.textContent = '';

        const sale = JSON.parse(localStorage.getItem('sale'))
        if (sale.length > 0) {

            const { discount } = JSON.parse(localStorage.getItem('price-data'));

            const $input = d.createElement('input');
            const $btnDiscount = d.createElement('button');

            if (discount) {
                const { subTotal, total } = getTotalAndSubtotal();

                $input.setAttribute('disabled', 'true');
                $input.value = discount;
                $btnDiscount.setAttribute('disabled', 'true');

                subTotalSection.textContent = `SubTotal: $${subTotal}`
                totalSection.textContent = `Total: $${total - discount}`
            }

            $input.setAttribute('type', 'text');
            $input.setAttribute('placeholder', 'Ingresa un descuento');
            $input.setAttribute('id', 'input-discount');
            $input.classList.add('py-2', 'px-3', 'my-3', 'mx-2', 'form-control', 'w-100');
            $input.addEventListener('keypress', (e) => {
                let key = window.event ? e.which : e.keyCode;
                if (key < 48 || key > 57) {
                    e.preventDefault();
                }
            })

            $btnDiscount.classList.add('btn', 'btn-primary', 'w-100');
            $btnDiscount.setAttribute('id', 'btn-discount')
            $btnDiscount.addEventListener('click', applyDiscount)
            $btnDiscount.textContent = 'Aplicar descuento';

            discountSection.appendChild($input);
            discountSection.appendChild($btnDiscount)
        }
    }

    const getDataClient = async ({ target }) => {

        const client_id = target.value;

        if (!client_id) {
            clientCard.textContent = ``;
            return;
        }

        const res = await fetchData(`/sales/get-client/${client_id}`);
        const client = await res.json();

        if (res.ok) {

            const { id, name, lastname, phone, address } = client;
            localStorage.setItem('client-data', JSON.stringify({ id, name, lastname, phone, address }));
            getClient.setAttribute('disabled', 'true')
            getClient.setAttribute('hidden', 'true')
            renderClientSection();

        }
        getProduct.focus();
    }

    const removeClient = () => {
        const client = localStorage.getItem('client-data') || [];

        if(!client) return;

        localStorage.removeItem('client-data');
        clientCard.textContent = '';
        getClient.removeAttribute('hidden');
        getClient.removeAttribute('disabled');
        localStorage.setItem('client-data', '{}');
    }

    const renderClientSection = () => {

        clientCard.textContent = '';

        const client = JSON.parse(localStorage.getItem('client-data')) || [];

        const { name, lastname, phone, address } = client;

        const $div = d.createElement('div');
        const $div2 = d.createElement('div');
        const $div3 = d.createElement('div');
        const $div4 = d.createElement('div');
        const $h5 = d.createElement('h5');
        const $pPhone = d.createElement('p');
        const $pAddress = d.createElement('p');
        const $btnRemoveClient = d.createElement('button');

        $div.classList.add('card', 'mb-3');
        $div2.classList.add('row', 'g-0');
        $div3.classList.add('col-md-8');
        $div4.classList.add('card-body');
        $h5.classList.add('card-title');
        $pPhone.classList.add('card-text');
        $pAddress.classList.add('card-text');
        $btnRemoveClient.classList.add('btn', 'btn-danger', 'mb-5');

        $h5.textContent = `Nombre: ${name} ${lastname}`;
        $pPhone.textContent = `Teléfono: ${phone}`;
        $pAddress.textContent = `Dirección: ${address}`;
        $btnRemoveClient.textContent = 'Eliminar';

        $div.appendChild($div2);
        $div2.appendChild($div3);
        $div3.appendChild($div4);
        $div4.appendChild($h5);
        $div4.appendChild($pPhone);
        $div4.appendChild($pAddress);

        $btnRemoveClient.addEventListener('click', removeClient)

        clientCard.appendChild($div);
        clientCard.appendChild($btnRemoveClient);


    }

    const renderFinalPrice = () => {
        const { subTotal, total } = getTotalAndSubtotal();
        subTotalSection.textContent = `SubTotal: $${subTotal}`
        totalSection.textContent = `Total: $${total}`

    }

    const deleteProductFromSale = async (product_id) => {

        let sale = JSON.parse(localStorage.getItem('sale')) || [];

        const dataProduct = sale.filter(item => item.product.id === product_id);

        const product = {
            id: dataProduct[0].product.id,
            quantity: dataProduct[0].quantity,
        }

        const res = await fetchData('/sale/delete-product', product, 'POST');
        const data = await res.json();

        if (res.ok) {
            let deleteProductFromSale = sale.filter(item => item.product.id !== product_id);
            sale = [...deleteProductFromSale];
            localStorage.setItem('sale', JSON.stringify(sale));
            if (sale.length < 1) {
                localStorage.removeItem('price-data');
            }
            renderProducts();
            renderFinalPrice();
            renderBtnSaveSale();
            renderDiscountSection();
            alert(data.message);
        } else {
            alert(data.message);
        }
    }

    const renderProducts = () => {
        productsSection.textContent = '';

        const sale = JSON.parse(localStorage.getItem('sale')) || [];

        sale.map((item) => {

            const $tr = d.createElement('tr');
            const $tdCode = d.createElement('td');
            const $tdDecription = d.createElement('td');
            const $tdQuantity = d.createElement('td');
            const $tdPrice = d.createElement('td');
            const $tdTotal = d.createElement('td');
            const $tdActions = d.createElement('td');
            const $btnIcon = d.createElement('i');

            $tdCode.textContent = item.product.code;
            $tdDecription.textContent = (item.product.description).substring(0, 20);
            $tdQuantity.textContent = item.quantity;
            $tdPrice.textContent = `$${item.product.price}`;
            $tdTotal.textContent = `$${item.quantity * item.product.price}`;
            $btnIcon.classList.add('bi', 'bi-trash3');

            const $btnAction = document.createElement('button');
            $btnAction.classList.add('btn', 'btn-danger');
            $btnAction.appendChild($btnIcon);
            $btnAction.addEventListener('click', () => deleteProductFromSale(item.product.id));
            $tdActions.appendChild($btnAction)

            $tr.appendChild($tdCode);
            $tr.appendChild($tdDecription);
            $tr.appendChild($tdQuantity);
            $tr.appendChild($tdPrice);
            $tr.appendChild($tdTotal);
            $tr.appendChild($tdActions);

            productsSection.appendChild($tr);
        });
    }

    const searchProduct = async ({ target }) => {

        const code_product = target.value;
        const res = await fetchData(`/sale/getProduct/${code_product}`);
        const data = await res.json();

        if (res.ok) {

            const { product } = data;

            let sale = JSON.parse(localStorage.getItem('sale'));

            const productInSale = sale.find(cart => cart.product.id === product.id);

            const { wholesale_quantity, wholesale_price, wholesale, price } = product;

            if (!productInSale) {
                sale = [...sale, { product, quantity: 1, total: price }];
            } else {
                sale = sale.map((item) =>
                    item.product.id === product.id
                        ? {
                            ...item.quantity >= wholesale_quantity ? {
                                ...item, quantity: item.quantity + 1, total: (item.quantity + 1) * wholesale_price
                            } : {
                                ...item, quantity: item.quantity + 1, total: (item.quantity + 1) * price
                            }
                        }
                        : { ...item }
                )
            }

            localStorage.setItem('sale', JSON.stringify(sale));
            renderProducts();
            renderBtnSaveSale();
            renderFinalPrice();
            renderDiscountSection();
        } else {
            alert(data.message)
        }

        getProduct.value = "";
        getProduct.focus();
    }

    const getTotalAndSubtotal = () => {

        let total = 0, subTotal = 0;
        let sale = JSON.parse(localStorage.getItem('sale'));
        let priceData = JSON.parse(localStorage.getItem('price-data')) || [];

        if (sale.length > 0) {

            total = sale.map(sale => sale.product.price * sale.quantity);
            subTotal = sale.map(sale => sale.product.price * sale.quantity);

            data = {
                total: total.reduce((a, b) => a + b, 0),
                subTotal: subTotal.reduce((a, b) => a + b, 0),
                discount: 0,
            }
            localStorage.setItem('price-data', JSON.stringify(data))

            return data
        }
        return { total, subTotal };
    }

    const saveNewSale = async (event) => {

        const sale = localStorage.getItem('sale');
        const pricesData = localStorage.getItem('price-data');
        const client = localStorage.getItem('client-data') || '[]';

        const res = await fetchData('/sale/save-sale', { products: sale, pricesData, client }, 'POST');
        const data = await res.json();

        if (res.ok) {
            const base_url = location.origin;
            localStorage.removeItem('sale');
            localStorage.removeItem('price-data');
            localStorage.removeItem('client-data');
            renderProducts();
            alert(data.message);
            return window.location.href = `${base_url}/store`
        } else {
            alert('Parece que hubo un error, intentalo más tarde');
        }
    }

    const renderBtnSaveSale = () => {

        const sale = JSON.parse(localStorage.getItem('sale'));

        saveSale.textContent = ''

        if (sale.length > 0) {
            const $btnSaveSale = document.createElement('button');
            $btnSaveSale.classList.add('btn', 'btn-primary', 'w-100', 'mx-2');
            $btnSaveSale.textContent = 'Finalizar Compra';
            $btnSaveSale.addEventListener('click', saveNewSale);
            saveSale.appendChild($btnSaveSale);

            const $btnCancelSale = document.createElement('button');
            $btnCancelSale.classList.add('btn', 'btn-danger', 'w-100');
            $btnCancelSale.textContent = 'Cancelar Compra';
            $btnCancelSale.addEventListener('click', cancelSales);
            saveSale.appendChild($btnCancelSale);
        }

    }

    const cancelSales = async () => {

        const sale = JSON.parse(localStorage.getItem('sale'));
        const res = await fetchData('/sale/cancel-sales', { sale }, 'POST');
        const data = await res.json();

        if (res.ok) {
            const base_url = location.origin;
            localStorage.removeItem('sale');
            localStorage.removeItem('price-data');
            localStorage.removeItem('client-data');
            alert(data.message);
            return window.location.href = `${base_url}/store`
        }
    }

    renderProducts();
    renderBtnSaveSale();
    renderFinalPrice();
    renderDiscountSection();
    existClient();

    getProduct.addEventListener('change', searchProduct)
    getClient.addEventListener('change', getDataClient);

}, false);