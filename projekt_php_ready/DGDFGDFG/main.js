
function addToCart(event) {
    
    const productElement = event.target.closest('.product');
    const productName = productElement.querySelector('h2').innerText;
    const productPrice = productElement.querySelector('p').innerText;

    
    console.log(`Shtuar në Karrocë: ${productName} - ${productPrice}`);

    
    alert(`${productName} është shtuar në karrocën tuaj.`);
}


document.querySelectorAll('.product button').forEach(button => {
    button.addEventListener('click', addToCart);
});