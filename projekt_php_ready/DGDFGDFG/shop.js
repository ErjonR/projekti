// Funksioni për të shtuar një produkt në karrocë
function shtoNeKarroce(emriProdukti, cmimiProdukti) {
  let karroca = JSON.parse(localStorage.getItem("karroca")) || [];

  // Kontrollo nëse produkti ekziston tashmë në karrocë
  const produktiEKsistuar = karroca.find(item => item.name === emriProdukti);

  if (produktiEKsistuar) {
      produktiEKsistuar.quantity += 1; // Rrite sasinë
  } else {
      karroca.push({ name: emriProdukti, price: cmimiProdukti, quantity: 1 });
  }

  // Ruaj karrocën e përditësuar në localStorage
  localStorage.setItem("karroca", JSON.stringify(karroca));

  // Njofto përdoruesin
  alert(`${emriProdukti} është shtuar në karrocën tuaj!`);
}

// Trajto klikimet mbi butonat "Add to Cart"
document.querySelectorAll('.product form button').forEach(button => {
  button.addEventListener('click', (event) => {
      const produktiElement = event.target.closest('.product');
      const emriProdukti = produktiElement.querySelector('h2').textContent;
      const cmimiProdukti = parseFloat(produktiElement.querySelector('p').textContent.replace('€', '').trim());

      shtoNeKarroce(emriProdukti, cmimiProdukti);
  });
});

// Funksioni për të shfaqur karrocën
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

// Filtrimi i produkteve në frontend me slider
function filtroProdukte(maxPrice) {
  const produktet = document.querySelectorAll(".product");
  produktet.forEach(produkt => {
    const cmimi = parseFloat(produkt.querySelector("p").textContent.replace('€', '').trim());
    produkt.style.display = (cmimi <= maxPrice) ? "block" : "none";
  });
}

// Lidh slider-in me filtrimin në frontend
const slider = document.getElementById("priceRange");
if (slider) {
  slider.addEventListener("input", function () {
    const value = parseInt(this.value);
    document.getElementById("priceValue").innerText = value + "€";
    filtroProdukte(value); // filtro pa refresh
  });
}

// Shfaq karrocën automatikisht në faqen e karrocës
if (document.body.contains(document.getElementById("cart-container"))) {
  shfaqKarrocen();
}
