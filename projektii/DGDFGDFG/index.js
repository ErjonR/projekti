
const addToCartButtons = document.querySelectorAll('.btn');

addToCartButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        
        const productCard = event.target.closest('.product-card');
        const productName = productCard.querySelector('h3').textContent;
        const productImage = productCard.querySelector('img').src;
        const productPrice = productCard.querySelector('p').textContent;

        
        const product = {
            name: productName,
            image: productImage,
            price: productPrice,
        };

        
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        
        cart.push(product);

        
        localStorage.setItem('cart', JSON.stringify(cart));

        
        alert(`${productName} është shtuar në karrocën tuaj.`);
    });
});


const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        
        const targetId = link.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        window.scrollTo({
            top: targetElement.offsetTop,
            behavior: 'smooth',
        });
    });
});