
document.addEventListener('DOMContentLoaded', () => {
    
    const contactForm = document.querySelector('.contact-form');

    
    contactForm.addEventListener('submit', function (event) {
        event.preventDefault(); 

        
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;

        
        if (!name || !email || !message) {
            alert('Ju lutem plotësoni të gjitha fushat.');
            return;
        }

        
        alert('Faleminderit për mesazhin tuaj, ' + name + '! Ne do të kontaktojmë me ju shumë shpejt.');

        
        contactForm.reset();
    });
});
