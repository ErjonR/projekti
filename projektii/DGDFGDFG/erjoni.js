
function addToCart(productId, productName, productPrice) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    
    const product = {
        id: productId,
        name: productName,
        price: productPrice
    };
    
    
    const existingProductIndex = cart.findIndex(item => item.id === productId);
    
    if (existingProductIndex > -1) {
        
        alert('Product already in cart!');
    } else {
        
        cart.push(product);
        
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    
    updateCartCount();
}


function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartCount = cart.length;
    const cartElement = document.querySelector('.cart-count');
    
    if (cartElement) {
        cartElement.innerText = cartCount;
    }
}


function displayCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItemsContainer = document.querySelector('.cart-items');
    const totalPriceElement = document.querySelector('.total-price');
    
    
    cartItemsContainer.innerHTML = '';
    
    let totalPrice = 0;

   
    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
    } else {
        cart.forEach(item => {
            const productElement = document.createElement('div');
            productElement.classList.add('cart-item');
            productElement.innerHTML = `
                <div class="cart-item-details">
                    <h3>${item.name}</h3>
                    <p>Price: ${item.price}</p>
                </div>
            `;
            
            cartItemsContainer.appendChild(productElement);

            
            totalPrice += parseFloat(item.price.replace('$', ''));
        });
    }

    totalPriceElement.innerText = totalPrice.toFixed(2);
}


document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
});


const addToCartButtons = document.querySelectorAll('.product button');
addToCartButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();

        const productCard = button.closest('.product');
        const productId = productCard.querySelector('img').getAttribute('alt'); 
        const productName = productCard.querySelector('h2').innerText;
        const productPrice = productCard.querySelector('p').innerText;

        addToCart(productId, productName, productPrice);
    });
});