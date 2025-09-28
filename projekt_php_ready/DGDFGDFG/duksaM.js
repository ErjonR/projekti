
function addToCart(event) {
    const productName = event.target.parentElement.querySelector('h2').textContent;
    alert(`${productName} është shtuar në karrocën tuaj!`);
}


const addToCartButtons = document.querySelectorAll('.product button');
addToCartButtons.forEach(button => {
    button.addEventListener('click', addToCart);
});


const products = document.querySelectorAll('.product');

products.forEach(product => {
    product.addEventListener('mouseover', function() {
        product.style.transform = 'scale(1.05)';
        product.style.transition = 'transform 0.3s ease';
    });

    product.addEventListener('mouseout', function() {
        product.style.transform = 'scale(1)';
    });
});


const buttons = document.querySelectorAll('.product button');

buttons.forEach(button => {
    button.addEventListener('mouseover', function() {
        button.style.backgroundColor = '#ffcc00'; 
    });

    button.addEventListener('mouseout', function() {
        button.style.backgroundColor = ''; 
    });
});