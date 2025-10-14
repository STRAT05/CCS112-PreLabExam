// === shop.js ===

// === Product Data (each product has a `category` and `series`) ===
const products = [
  // ====== DRONES (category: "drones") ======
  { name: "DJI Mavic 3 Pro", series: "mavic", category: "drones", price: 2200, popularity: 95, date: "2024-04-10", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Mavic 3 Classic", series: "mavic", category: "drones", price: 1700, popularity: 80, date: "2023-12-05", img: "FirstDroneSection/CameraDrone-Item-No.2.png" },
  { name: "DJI Mavic Air 2", series: "mavic", category: "drones", price: 999, popularity: 85, date: "2022-06-10", img: "FirstDroneSection/CameraDrone-Item-No.3.png" },
  { name: "DJI Mavic Mini Pro", series: "mavic", category: "drones", price: 699, popularity: 70, date: "2021-03-15", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },

  { name: "DJI Air 3", series: "air", category: "drones", price: 1100, popularity: 88, date: "2024-08-01", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Air 2S", series: "air", category: "drones", price: 999, popularity: 83, date: "2023-05-01", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Air Fly Combo", series: "air", category: "drones", price: 1250, popularity: 75, date: "2023-07-12", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Air Zoom Edition", series: "air", category: "drones", price: 1199, popularity: 70, date: "2022-11-20", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Air Standard", series: "air", category: "drones", price: 899, popularity: 65, date: "2021-09-05", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },

  { name: "DJI Flip Pro", series: "flip", category: "drones", price: 600, popularity: 60, date: "2024-01-10", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Flip Lite", series: "flip", category: "drones", price: 400, popularity: 55, date: "2023-02-20", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },

  { name: "DJI Neo 2", series: "neo", category: "drones", price: 850, popularity: 70, date: "2024-06-14", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Neo Pro", series: "neo", category: "drones", price: 950, popularity: 68, date: "2023-11-18", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Neo Lite", series: "neo", category: "drones", price: 650, popularity: 65, date: "2023-03-12", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Neo Advanced", series: "neo", category: "drones", price: 1050, popularity: 72, date: "2022-07-28", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },

  { name: "DJI Avata 2", series: "avata", category: "drones", price: 1300, popularity: 92, date: "2024-07-01", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Avata Pro", series: "avata", category: "drones", price: 1400, popularity: 85, date: "2024-05-12", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Avata Explorer", series: "avata", category: "drones", price: 1250, popularity: 75, date: "2023-12-22", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Avata Cine", series: "avata", category: "drones", price: 1600, popularity: 88, date: "2023-09-01", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Avata Sport", series: "avata", category: "drones", price: 1199, popularity: 65, date: "2022-04-14", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Avata Basic", series: "avata", category: "drones", price: 999, popularity: 60, date: "2021-11-11", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Avata FPV Combo", series: "avata", category: "drones", price: 1500, popularity: 80, date: "2021-07-19", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },

  { name: "DJI FPV 2", series: "fpv", category: "drones", price: 1100, popularity: 85, date: "2024-03-18", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI FPV Racing", series: "fpv", category: "drones", price: 999, popularity: 75, date: "2023-08-10", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI FPV Explorer", series: "fpv", category: "drones", price: 899, popularity: 65, date: "2022-12-15", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },

  { name: "DJI Inspire 3", series: "inspire", category: "drones", price: 15000, popularity: 98, date: "2024-09-25", img: "FirstDroneSection/CameraDrone-Item-No.1.png" },
  { name: "DJI Inspire 2", series: "inspire", category: "drones", price: 9999, popularity: 90, date: "2023-05-14", img: "FirstDroneSection/CameraDrone-Item-No.2.png" },
  { name: "DJI Inspire Pro", series: "inspire", category: "drones", price: 12000, popularity: 85, date: "2022-03-30", img: "FirstDroneSection/CameraDrone-Item-No.3.png" },
  { name: "DJI Inspire Cine", series: "inspire", category: "drones", price: 14000, popularity: 88, date: "2021-10-01", img: "FirstDroneSection/CameraDrone-Item-No.2.png" },

 // ====== HANDHELD (category: "handheld") ======
  // Action Camera
  { name: "DJI Action 5", series: "action", category: "handheld", price: 399, popularity: 88, date: "2024-02-10", img: "HandheldSection/Action-1.png" },
  { name: "DJI Action 5 Pro", series: "action", category: "handheld", price: 499, popularity: 91, date: "2024-05-05", img: "HandheldSection/Action-2.png" },
  { name: "DJI Action Mini", series: "action", category: "handheld", price: 249, popularity: 72, date: "2023-08-20", img: "HandheldSection/Action-3.png" },
  { name: "DJI Action 4", series: "action", category: "handheld", price: 379, popularity: 84, date: "2023-11-02", img: "HandheldSection/Action-4.png" },

  // Blog / Vlog Camera
  { name: "DJI Pocket Vlog Pro", series: "blog", category: "handheld", price: 529, popularity: 85, date: "2024-01-12", img: "HandheldSection/Blog-1.png" },
  { name: "DJI Pocket Mini Vlog", series: "blog", category: "handheld", price: 319, popularity: 75, date: "2023-06-18", img: "HandheldSection/Blog-2.png" },
  { name: "DJI Vlog Cam X", series: "blog", category: "handheld", price: 449, popularity: 80, date: "2023-10-01", img: "HandheldSection/Blog-3.png" },
  { name: "DJI Pocket 3 Vlogger Kit", series: "blog", category: "handheld", price: 599, popularity: 87, date: "2024-04-03", img: "HandheldSection/Blog-4.png" },

  // Gimbals
  { name: "DJI Ronin-S", series: "gimbal", category: "handheld", price: 749, popularity: 90, date: "2022-09-18", img: "HandheldSection/Gimbal-1.png" },
  { name: "DJI Ronin-SC", series: "gimbal", category: "handheld", price: 499, popularity: 82, date: "2023-02-10", img: "HandheldSection/Gimbal-2.png" },
  { name: "DJI Ronin 4D Mini", series: "gimbal", category: "handheld", price: 1299, popularity: 92, date: "2024-03-01", img: "HandheldSection/Gimbal-3.png" },
  { name: "DJI Gimbal Pro X", series: "gimbal", category: "handheld", price: 899, popularity: 78, date: "2023-07-24", img: "HandheldSection/Gimbal-4.png" },
  { name: "DJI Gimbal Lite", series: "gimbal", category: "handheld", price: 299, popularity: 70, date: "2022-11-05", img: "HandheldSection/Gimbal-5.png" },
  { name: "DJI Gimbal Studio", series: "gimbal", category: "handheld", price: 1099, popularity: 86, date: "2024-05-20", img: "HandheldSection/Gimbal-6.png" },

  // Wireless Microphone
  { name: "DJI Mic 2", series: "mic", category: "handheld", price: 249, popularity: 88, date: "2023-11-12", img: "HandheldSection/Mic-1.png" },
  { name: "DJI Wireless Mic Pro", series: "mic", category: "handheld", price: 299, popularity: 85, date: "2024-02-18", img: "HandheldSection/Mic-2.png" },
  { name: "DJI Lavalier Mic", series: "mic", category: "handheld", price: 129, popularity: 72, date: "2023-05-05", img: "HandheldSection/Mic-3.png" },
  { name: "DJI Podcast Mic Kit", series: "mic", category: "handheld", price: 199, popularity: 74, date: "2022-08-21", img: "HandheldSection/Mic-4.png" },

  // Stabilizers
  { name: "DJI Stabilizer X1", series: "stabilizer", category: "handheld", price: 199, popularity: 76, date: "2023-03-12", img: "HandheldSection/Stabilizer-1.png" },
  { name: "DJI Stabilizer Pro", series: "stabilizer", category: "handheld", price: 349, popularity: 83, date: "2023-09-30", img: "HandheldSection/Stabilizer-2.png" },
  { name: "DJI Stabilizer Mini", series: "stabilizer", category: "handheld", price: 159, popularity: 68, date: "2022-12-15", img: "HandheldSection/Stabilizer-3.png" },
  { name: "DJI Stabilizer Carbon", series: "stabilizer", category: "handheld", price: 429, popularity: 80, date: "2024-01-25", img: "HandheldSection/Stabilizer-4.png" },

  // ====== ACCESSORIES (category: "accessories") ======
  
  // Batteries (6)
  { name: "DJI Battery 1", series: "batteries", category: "accessories", price: 149, popularity: 80, date: "2024-04-20", img: "AccessoriesSection/Battery-1.png" },
  { name: "DJI Battery 2", series: "batteries", category: "accessories", price: 159, popularity: 78, date: "2024-03-15", img: "AccessoriesSection/Battery-2.png" },
  { name: "DJI Battery 3", series: "batteries", category: "accessories", price: 139, popularity: 75, date: "2023-11-12", img: "AccessoriesSection/Battery-3.png" },
  { name: "DJI Battery 4", series: "batteries", category: "accessories", price: 149, popularity: 82, date: "2023-08-05", img: "AccessoriesSection/Battery-4.png" },
  { name: "DJI Battery 5", series: "batteries", category: "accessories", price: 144, popularity: 77, date: "2024-01-20", img: "AccessoriesSection/Battery-5.png" },
  { name: "DJI Battery 6", series: "batteries", category: "accessories", price: 150, popularity: 79, date: "2024-05-12", img: "AccessoriesSection/Battery-6.png" },

  // Controllers (3)
  { name: "DJI Controller 1", series: "controllers", category: "accessories", price: 499, popularity: 85, date: "2024-02-10", img: "AccessoriesSection/Controller-1.png" },
  { name: "DJI Controller 2", series: "controllers", category: "accessories", price: 599, popularity: 88, date: "2024-03-05", img: "AccessoriesSection/Controller-2.png" },
  { name: "DJI Controller 3", series: "controllers", category: "accessories", price: 549, popularity: 83, date: "2024-01-15", img: "AccessoriesSection/Controller-3.png" },

  // Goggles (5)
  { name: "DJI Goggles 1", series: "goggles", category: "accessories", price: 569, popularity: 85, date: "2024-04-01", img: "AccessoriesSection/Goggles-1.png" },
  { name: "DJI Goggles 2", series: "goggles", category: "accessories", price: 579, popularity: 80, date: "2023-12-12", img: "AccessoriesSection/Goggles-2.png" },
  { name: "DJI Goggles 3", series: "goggles", category: "accessories", price: 589, popularity: 82, date: "2024-01-22", img: "AccessoriesSection/Goggles-3.png" },
  { name: "DJI Goggles 4", series: "goggles", category: "accessories", price: 559, popularity: 78, date: "2023-10-10", img: "AccessoriesSection/Goggles-4.png" },
  { name: "DJI Goggles 5", series: "goggles", category: "accessories", price: 599, popularity: 81, date: "2024-02-28", img: "AccessoriesSection/Goggles-5.png" },

  // Propeller (4)
  { name: "DJI Propeller 1", series: "propeller", category: "accessories", price: 49, popularity: 75, date: "2024-03-15", img: "AccessoriesSection/Propeller-1.png" },
  { name: "DJI Propeller 2", series: "propeller", category: "accessories", price: 55, popularity: 78, date: "2023-12-20", img: "AccessoriesSection/Propeller-2.png" },
  { name: "DJI Propeller 3", series: "propeller", category: "accessories", price: 52, popularity: 72, date: "2024-01-05", img: "AccessoriesSection/Propeller-3.png" },
  { name: "DJI Propeller 4", series: "propeller", category: "accessories", price: 50, popularity: 74, date: "2024-02-10", img: "AccessoriesSection/Propeller-4.png" },

  // Modules & Kits (10)
  { name: "DJI Module 1", series: "modules_kits", category: "accessories", price: 199, popularity: 80, date: "2024-01-10", img: "AccessoriesSection/Module-1.png" },
  { name: "DJI Module 2", series: "modules_kits", category: "accessories", price: 209, popularity: 82, date: "2024-02-12", img: "AccessoriesSection/Module-2.png" },
  { name: "DJI Module 3", series: "modules_kits", category: "accessories", price: 189, popularity: 78, date: "2024-03-01", img: "AccessoriesSection/Module-3.png" },
  { name: "DJI Module 4", series: "modules_kits", category: "accessories", price: 195, popularity: 77, date: "2024-03-20", img: "AccessoriesSection/Module-4.png" },
  { name: "DJI Module 5", series: "modules_kits", category: "accessories", price: 210, popularity: 80, date: "2024-04-05", img: "AccessoriesSection/Module-5.png" },
  { name: "DJI Module 6", series: "modules_kits", category: "accessories", price: 198, popularity: 79, date: "2024-04-20", img: "AccessoriesSection/Module-6.png" },
  { name: "DJI Module 7", series: "modules_kits", category: "accessories", price: 202, popularity: 81, date: "2024-05-02", img: "AccessoriesSection/Module-7.png" },
  { name: "DJI Module 8", series: "modules_kits", category: "accessories", price: 205, popularity: 78, date: "2024-05-15", img: "AccessoriesSection/Module-8.png" },
  { name: "DJI Module 9", series: "modules_kits", category: "accessories", price: 207, popularity: 77, date: "2024-06-01", img: "AccessoriesSection/Module-9.png" },
  { name: "DJI Module 10", series: "modules_kits", category: "accessories", price: 215, popularity: 80, date: "2024-06-10", img: "AccessoriesSection/Module-10.png" },

  // Camera Lens (5)
  { name: "DJI Lens 1", series: "camera_lens", category: "accessories", price: 299, popularity: 82, date: "2024-01-15", img: "AccessoriesSection/Lens-1.png" },
  { name: "DJI Lens 2", series: "camera_lens", category: "accessories", price: 309, popularity: 80, date: "2024-02-10", img: "AccessoriesSection/Lens-2.png" },
  { name: "DJI Lens 3", series: "camera_lens", category: "accessories", price: 319, popularity: 79, date: "2024-03-05", img: "AccessoriesSection/Lens-3.png" },
  { name: "DJI Lens 4", series: "camera_lens", category: "accessories", price: 305, popularity: 81, date: "2024-03-25", img: "AccessoriesSection/Lens-4.png" },
  { name: "DJI Lens 5", series: "camera_lens", category: "accessories", price: 315, popularity: 80, date: "2024-04-12", img: "AccessoriesSection/Lens-5.png" },

  // Quick Release Mount (7)
  { name: "DJI Mount 1", series: "quick_release_mount", category: "accessories", price: 79, popularity: 75, date: "2024-01-05", img: "AccessoriesSection/Mount-1.png" },
  { name: "DJI Mount 2", series: "quick_release_mount", category: "accessories", price: 85, popularity: 77, date: "2024-02-01", img: "AccessoriesSection/Mount-2.png" },
  { name: "DJI Mount 3", series: "quick_release_mount", category: "accessories", price: 82, popularity: 76, date: "2024-02-20", img: "AccessoriesSection/Mount-3.png" },
  { name: "DJI Mount 4", series: "quick_release_mount", category: "accessories", price: 80, popularity: 78, date: "2024-03-10", img: "AccessoriesSection/Mount-4.png" },
  { name: "DJI Mount 5", series: "quick_release_mount", category: "accessories", price: 83, popularity: 79, date: "2024-03-25", img: "AccessoriesSection/Mount-5.png" },
  { name: "DJI Mount 6", series: "quick_release_mount", category: "accessories", price: 81, popularity: 77, date: "2024-04-10", img: "AccessoriesSection/Mount-6.png" },
  { name: "DJI Mount 7", series: "quick_release_mount", category: "accessories", price: 84, popularity: 78, date: "2024-04-20", img: "AccessoriesSection/Mount-7.png" },
];

// === Category -> series mapping for sidebar ===
const SERIES_BY_CATEGORY = {
  drones: [
    { value: "mavic", label: "DJI Mavic" },
    { value: "air", label: "DJI Air" },
    { value: "mini", label: "DJI Mini" },
    { value: "flip", label: "DJI Flip" },
    { value: "neo", label: "DJI Neo" },
    { value: "avata", label: "DJI Avata" },
    { value: "fpv", label: "DJI FPV" },
    { value: "inspire", label: "Inspire" }
  ],
  handheld: [
    { value: "action", label: "Action Camera" },
    { value: "blog", label: "Vlog Camera" },
    { value: "gimbal", label: "Gimbal" },
    { value: "mic", label: "Wireless Microphone" },
    { value: "stabilizer", label: "Stabilizers" }
  ],
 accessories: [
  { value: "batteries", label: "Batteries" },
  { value: "controllers", label: "Controllers" },
  { value: "goggles", label: "Goggles" },
  { value: "propeller", label: "Propellers" },
  { value: "modules_kits", label: "Modules & Kits" },
  { value: "camera_lens", label: "Camera Lenses" },
  { value: "quick_release_mount", label: "Quick Release Mounts" }
]
};

// === STATE & DOM REFERENCES ===
let currentCategory = "drones"; // default
let checkboxes = [];

const productContainer = document.getElementById("products");
const sortMenu = document.getElementById("sortMenu");
const dropdownBtn = document.getElementById("dropdownBtn");
const selectedFiltersContainer = document.getElementById("selectedFilters");
const resetFiltersBtn = document.getElementById("resetFilters");
const itemCount = document.getElementById("itemCount");
const pageTitleEl = document.querySelector(".page-header h1");
const navLinks = document.querySelectorAll("header nav a");
const searchIcon = document.querySelector(".icons span:first-child");
const paginationContainer = document.getElementById("pagination");

// === Pagination State ===
let currentPage = 1;
const itemsPerPage = 10;
let lastRenderedList = []; // store the currently filtered+sorted list

// === SEARCH BAR ELEMENTS ===
const searchWrapper = document.createElement("div");
searchWrapper.className = "search-wrapper";
const searchInput = document.createElement("input");
searchInput.type = "text";
searchInput.placeholder = "Search products...";
searchWrapper.appendChild(searchInput);
const suggestionsList = document.createElement("ul");
suggestionsList.className = "suggestions";
searchWrapper.appendChild(suggestionsList);
document.querySelector("header").appendChild(searchWrapper);

// === MODAL ELEMENTS ===
const productModal = document.createElement("div");
productModal.id = "productModal";
productModal.className = "modal-overlay";
productModal.innerHTML = `
  <div class="modal-box">
    <button class="close-btn">×</button>
    <div id="modalContent"></div>
  </div>
`;
document.body.appendChild(productModal);

// Now we can safely get modalContent
const modalContent = productModal.querySelector("#modalContent");

const closeModalBtn = productModal.querySelector(".close-btn");
closeModalBtn.addEventListener("click", () => productModal.classList.remove("active"));
productModal.addEventListener("click", e => {
  if (e.target === productModal) productModal.classList.remove("active");
});

// === RENDER PRODUCTS (with pagination) ===
function renderProducts(list) {
  productContainer.innerHTML = "";
  itemCount.textContent = `${list.length} Item(s) Found`;

  if (!list.length) {
    productContainer.innerHTML = "<p>No products found.</p>";
    paginationContainer.innerHTML = "";
    lastRenderedList = list;
    return;
  }

  // Save the list so pagination buttons can re-render properly
  lastRenderedList = list;

  // Ensure current page is valid
  const totalItems = list.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;
  if (currentPage > totalPages) currentPage = totalPages;
  if (currentPage < 1) currentPage = 1;

  // Pagination slice
  const start = (currentPage - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  const paginatedItems = list.slice(start, end);

  // Overview sentence templates (kept from your original)
  const overviewTemplates = [
    (name) => `The ${name} has been engineered with precision to deliver top-tier performance for both enthusiasts and professionals. It combines durability, efficiency, and cutting-edge design, making it an essential companion for any task.`,
    (name) => `With the ${name}, you can expect reliability and strength that adapts to your needs. It’s built not only to meet expectations but to consistently exceed them, even during long sessions or demanding conditions.`,
    (name) => `Crafted with attention to detail, the ${name} provides exceptional versatility. Its advanced design ensures consistent results across different environments, offering peace of mind for users who value dependability.`,
    (name) => `The ${name} represents a new level of innovation. From its powerful capabilities to its refined construction, it has been tailored for users who demand high-quality performance without compromise.`,
    (name) => `No matter where your journey takes you, the ${name} is built to support you. Its optimized engineering focuses on maximizing endurance, efficiency, and stability in every use case.`
  ];

  paginatedItems.forEach(p => {
    const card = document.createElement("div");
    card.className = "product fade-in";
    card.innerHTML = `
      <img src="${p.img}" alt="${p.name}">
      <h3>${p.name}</h3>
      <p class="price">$${p.price}</p>
      <div class="product-buttons">
        <button class="add-to-cart">Add to Cart</button>
        <button class="show-details">Show Details</button>
      </div>
    `;
    productContainer.appendChild(card);

    // Add to Cart: (temporary alert) — keep your backend integration separate
    card.querySelector(".add-to-cart").addEventListener("click", () => {
      alert(`${p.name} added to cart!`);
    });

    // === SHOW DETAILS MODAL ===
    card.querySelector(".show-details").addEventListener("click", () => {
      // Pick 2–3 random overview sentences
      const selectedSentences = [];
      const sentenceCount = Math.floor(Math.random() * 2) + 2; // 2 or 3 sentences
      for (let i = 0; i < sentenceCount; i++) {
        const sentence = overviewTemplates[Math.floor(Math.random() * overviewTemplates.length)](p.name);
        selectedSentences.push(sentence);
      }
      const overviewText = selectedSentences.join(" ");

      modalContent.innerHTML = `
        <!-- 📸 Product Title -->
        <div class="modal-header">
          <h2 class="product-title">${p.name}</h2>
        </div>

        <div class="modal-body">
          <!-- Product Image -->
            <div class="product-image" style="text-align:center; margin-bottom: 20px;">
              <img src="${p.img}" alt="${p.name}" style="max-width:220px; height:auto; border-radius:8px;">
            </div>

          <!-- ➡️ Overview -->
          <h3>Overview</h3>
          <div class="product-overview">
            <p>${overviewText}</p>
            <br>
            <p style="font-size:0.85rem; color:#777; margin-top:6px;">
              * Performance measured under controlled conditions. Actual results may vary depending on environment, usage, and firmware version.
            </p>
          </div>

          <br>

          <!-- ➡️ In The Box -->
          <h3>What's In The Box</h3>
          <ul>
            <li>${p.name} Plus × 1</li>
            <li>Manual Guide × 1</li>
            <li>Item Bag x 1</li>
          </ul>

          <br>

          <!-- ➡️ Specifications -->
          <h3>Specifications</h3>
          <div class="product-meta">
            <p><span class="label">Model:</span> <span class="value">BWXNN5-${Math.floor(Math.random() * 9000) + 1000}-7.${Math.floor(Math.random() * 20) + 1}</span></p>
            <p><span class="label">Capacity:</span> <span class="value">${Math.floor(Math.random() * 2000) + 3000} mAh</span></p>
            <p><span class="label">Battery Type:</span> <span class="value">Li-ion</span></p>
            <p><span class="label">Charging Temp:</span> <span class="value">5° to 40° C (41° to 104° F)</span></p>
          </div>

          <br>

          <!-- ➡️ Details -->
          <h3>Details</h3>
          <div class="product-meta">
            <p><span class="label">Series:</span> <span class="value">${p.series}</span></p>
            <p><span class="label">Category:</span> <span class="value">${p.category}</span></p>
            <p><span class="label">Price:</span> <span class="value">$${p.price}</span></p>
            <p><span class="label">Popularity:</span> <span class="value">${p.popularity}</span></p>
            <p><span class="label">Release Date:</span> <span class="value">${p.date}</span></p>
          </div>
        </div>
      `;
      productModal.classList.add("active");
    });
  });

  // animate fade-in
  setTimeout(() => {
    document.querySelectorAll(".product.fade-in").forEach(el => el.classList.add("visible"));
  }, 10);

  // Render pagination controls for this list
  renderPagination(Math.ceil(list.length / itemsPerPage));
}





// === PAGINATION FUNCTION ===
function renderPagination(totalPages) {
  paginationContainer.innerHTML = "";

  if (!lastRenderedList.length) return;

  // ====== SCROLL FUNCTION ======
  const scrollToTop = () => {
    const productListContainer = document.getElementById("product-container"); // change to your actual product container ID
    if (productListContainer) {
      productListContainer.scrollIntoView({ behavior: "smooth", block: "start" });
    } else {
      window.scrollTo({ top: 0, behavior: "smooth" }); // fallback
    }
  };

  // ====== PREV BUTTON ======
  const prevBtn = document.createElement("button");
  prevBtn.textContent = "«";
  prevBtn.classList.add("page-btn", "arrow");
  if (currentPage === 1) prevBtn.classList.add("disabled");
  prevBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (currentPage > 1) {
      currentPage--;
      renderProducts(lastRenderedList);
      scrollToTop();
    }
  });
  paginationContainer.appendChild(prevBtn);

  // ====== PAGE NUMBERS ======
  for (let i = 1; i <= totalPages; i++) {
    const btn = document.createElement("button");
    btn.textContent = i;
    btn.classList.add("page-btn");
    btn.setAttribute("data-page", i);
    if (i === currentPage) btn.classList.add("active-page");

    btn.addEventListener("click", (e) => {
      e.preventDefault(); // prevents page refresh
      currentPage = i;
      renderProducts(lastRenderedList);
      scrollToTop();
    });

    paginationContainer.appendChild(btn);
  }

  // ====== NEXT BUTTON ======
  const nextBtn = document.createElement("button");
  nextBtn.textContent = "»";
  nextBtn.classList.add("page-btn", "arrow"); // fixed: should be nextBtn, not prevBtn
  if (currentPage === totalPages) nextBtn.classList.add("disabled");

  nextBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (currentPage < totalPages) {
      currentPage++;
      renderProducts(lastRenderedList);
      scrollToTop();
    }
  });
  paginationContainer.appendChild(nextBtn);
}

// === SORT PRODUCTS ===
function sortProducts(list, reshuffle = false, forcedSort = null) {
  const active = forcedSort 
    ? { dataset: { sort: forcedSort } } 
    : document.querySelector("#sortMenu li.active");
  if (!active) return list;
  const val = active.dataset.sort;
  let sorted = [...list];

  switch(val) {
    case "recommendation":
      if (reshuffle) {
        const bySeries = {};
        sorted.forEach(p => {
          if (!bySeries[p.series]) bySeries[p.series] = [];
          bySeries[p.series].push(p);
        });
        sorted = Object.values(bySeries).map(arr => arr[Math.floor(Math.random() * arr.length)]);
      }
      break;
    case "popularity":
      sorted = sorted.sort((a,b) => b.popularity - a.popularity).slice(0,5);
      break;
    case "newest":
      sorted = sorted.sort((a,b) => new Date(b.date) - new Date(a.date));
      break;
    case "low-high":
      sorted.sort((a,b) => a.price - b.price);
      break;
    case "high-low":
      sorted.sort((a,b) => b.price - a.price);
      break;
  }
  return sorted;
}


// === FILTER PRODUCTS ===
function filterProducts(forceReshuffle=false, presetSeries=null, forcedSort=null) {
  // reset to page 1 whenever filters/sort change
  currentPage = 1;

  const activeSeries = presetSeries || Array.from(checkboxes).filter(cb => cb.checked).map(cb => cb.value);
  let filtered = products.filter(p => p.category === currentCategory);
  if (activeSeries.length) filtered = filtered.filter(p => activeSeries.includes(p.series));
  const sorted = sortProducts(filtered, forceReshuffle, forcedSort) || filtered;
  renderProducts(sorted);
  updateFilterTags(activeSeries);
  updateSidebarCounts();
}

// === RENDER SIDEBAR CHECKBOXES ===
function renderSidebarForCategory(category, autoCheckAll=false, defaultSort = "high-low") {
  const ul = document.querySelector(".filter ul");
  ul.innerHTML = "";
  const seriesList = SERIES_BY_CATEGORY[category] || [];
  seriesList.forEach(s => {
    const li = document.createElement("li");
    li.innerHTML = `<label><input type="checkbox" value="${s.value}" data-label="${s.label}">${s.label} <span class="count"></span></label>`;
    ul.appendChild(li);
  });

  checkboxes = document.querySelectorAll(".filter input[type='checkbox']");
  checkboxes.forEach(cb => cb.addEventListener("change", () => filterProducts()));
  if (autoCheckAll) checkboxes.forEach(cb => cb.checked = true);
  updateSidebarCounts();

  const preset = autoCheckAll ? Array.from(checkboxes).map(cb => cb.value) : [];
  filterProducts(false, preset, defaultSort);
}

// === UPDATE SIDEBAR COUNTS & FILTER TAGS ===
function updateSidebarCounts() {
  checkboxes.forEach(cb => {
    const cnt = products.filter(p => p.category === currentCategory && p.series === cb.value).length;
    const span = cb.parentElement.querySelector("span.count");
    if (span) span.textContent = `(${cnt})`;
  });
}

function updateFilterTags(activeSeries=[]) {
  selectedFiltersContainer.innerHTML = "";
  if (!activeSeries) return;
  activeSeries.forEach(series => {
    const cb = Array.from(checkboxes).find(c => c.value === series);
    if (!cb) return;
    const label = cb.dataset.label || series;
    const tag = document.createElement("div");
    tag.className = "filter-tag slide-in";
    tag.innerHTML = `<span>${label}</span><button>×</button>`;
    tag.querySelector("button").addEventListener("click", () => {
      cb.checked = false;
      tag.classList.add("slide-out");
      tag.addEventListener("transitionend", () => filterProducts());
    });
    selectedFiltersContainer.appendChild(tag);
    setTimeout(() => tag.classList.add("visible"), 10);
  });
}

// === SORT DROPDOWN ===
dropdownBtn.addEventListener("click", () => sortMenu.classList.toggle("show"));
sortMenu.querySelectorAll("li").forEach(item => {
  item.addEventListener("click", () => {
    const wasActive = item.classList.contains("active");
    sortMenu.querySelectorAll("li").forEach(li => li.classList.remove("active"));
    item.classList.add("active");
    dropdownBtn.textContent = `Sort by: ${item.textContent}`;
    sortMenu.classList.remove("show");
    // reset to page 1 when sort changes
    currentPage = 1;
    if (wasActive && item.dataset.sort === "recommendation") filterProducts(true);
    else filterProducts();
  });
});

// === RESET FILTERS ===
resetFiltersBtn.addEventListener("click", () => {
  checkboxes.forEach(cb => cb.checked = false);
  currentPage = 1;
  filterProducts();
});

// === NAV HANDLERS ===
navLinks.forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    const txt = link.textContent.trim().toLowerCase();
    let target = currentCategory;
    if (txt.includes("drone") || txt.includes("home")) target = "drones";
    else if (txt.includes("handheld")) target = "handheld";
    else if (txt.includes("accessor")) target = "accessories";
    if (target === currentCategory) return;

    navLinks.forEach(n => n.classList.remove("active"));
    link.classList.add("active");
    pageTitleEl.textContent = target === "drones" ? "DJI Camera Drones" : target === "handheld" ? "DJI Handheld" : "DJI Accessories";
    currentCategory = target;

    // reset sort to High to Low by default
    sortMenu.querySelectorAll("li").forEach(li => li.classList.remove("active"));
    const highLow = sortMenu.querySelector("li[data-sort='high-low']");
    if (highLow) highLow.classList.add("active");
    dropdownBtn.textContent = "Sort by: High to Low";

    // reset page and render sidebar
    currentPage = 1;
    renderSidebarForCategory(currentCategory, false, "high-low");
  });
});

// === SEARCH FUNCTIONALITY ===
searchIcon.addEventListener("click", () => {
  searchWrapper.classList.toggle("active");
  if (searchWrapper.classList.contains("active")) searchInput.focus();
  else suggestionsList.innerHTML = "";
});

searchInput.addEventListener("input", () => {
  const keyword = searchInput.value.trim().toLowerCase();
  suggestionsList.innerHTML = "";
  if (!keyword) return;

  const matches = products.filter(p => p.name.toLowerCase().includes(keyword)).slice(0,8);
  matches.forEach(p => {
    const li = document.createElement("li");
    li.textContent = p.name;
    li.addEventListener("click", () => {
      searchInput.value = "";
      searchWrapper.classList.remove("active");
      currentPage = 1;
      renderProducts([p]); // show single result (pagination will adapt)
      suggestionsList.innerHTML = "";
    });
    suggestionsList.appendChild(li);
  });
});

document.addEventListener("click", (e) => {
  if (!searchWrapper.contains(e.target) && e.target !== searchIcon) {
    searchWrapper.classList.remove("active");
    suggestionsList.innerHTML = "";
  }
});

// === INIT ===
(function init() {
  const defaultSort = document.querySelector("#sortMenu li[data-sort='high-low']");
  if (defaultSort) defaultSort.classList.add("active");
  dropdownBtn.textContent = "Sort by: High to Low";

  navLinks.forEach(n => n.classList.remove("active"));
  const droneNav = Array.from(navLinks).find(a => a.textContent.toLowerCase().includes("drone"));
  if (droneNav) droneNav.classList.add("active");

  pageTitleEl.textContent = "DJI Camera Drones";

  renderSidebarForCategory(currentCategory, false, "high-low");
})();
