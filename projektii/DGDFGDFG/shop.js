
function shtoNeKarroce(emriProdukti, cmimiProdukti) {
  let karroca = JSON.parse(localStorage.getItem("karroca")) || [];

 
  const produktiEKsistuar = karroca.find(item => item.name === emriProdukti);

  if (produktiEKsistuar) {
      produktiEKsistuar.quantity += 1; 
  } else {
      karroca.push({ name: emriProdukti, price: cmimiProdukti, quantity: 1 });
  }

  
  localStorage.setItem("karroca", JSON.stringify(karroca));


  alert(`${emriProdukti} është shtuar në karrocën tuaj!`);
}

document.querySelectorAll('.product form button').forEach(button => {
  button.addEventListener('click', (event) => {
      const produktiElement = event.target.closest('.product');
      const emriProdukti = produktiElement.querySelector('h2').textContent;
      const cmimiProdukti = parseFloat(produktiElement.querySelector('p').textContent.replace('€', '').trim());

      shtoNeKarroce(emriProdukti, cmimiProdukti);
  });
});


function shfaqKarrocen() {
  const karroca = JSON.parse(localStorage.getItem("karroca")) || [];
  const karrocaContainer = document.getElementById("cart-container");

  if (!karrocaContainer) return;

  if (karroca.length === 0) {
      karrocaContainer.innerHTML = "<p>Karroca juaj është bosh.</p>";
  } else {
      karrocaContainer.innerHTML = "";
      karroca.forEach(item => {
          const itemElement = document.createElement("div");
          itemElement.classList.add("cart-item");
          itemElement.innerHTML = `
              <h3>${item.name}</h3>
              <p>Çmimi: €${item.price}</p>
              <p>Sasia: ${item.quantity}</p>
          `;
          karrocaContainer.appendChild(itemElement);
      });
  }
}


function filtroProdukte(maxPrice) {
  const produktet = document.querySelectorAll(".product");
  produktet.forEach(produkt => {
    const cmimi = parseFloat(produkt.querySelector("p").textContent.replace('€', '').trim());
    produkt.style.display = (cmimi <= maxPrice) ? "block" : "none";
  });
}


const slider = document.getElementById("priceRange");
if (slider) {
  slider.addEventListener("input", function () {
    const value = parseInt(this.value);
    document.getElementById("priceValue").innerText = value + "€";
    filtroProdukte(value);    
  });
}

    
if (document.body.contains(document.getElementById("cart-container"))) {
  shfaqKarrocen();
}
