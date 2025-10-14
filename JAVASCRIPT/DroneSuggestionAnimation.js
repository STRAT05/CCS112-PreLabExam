const droneContent = document.getElementById("droneContent");
const tabs = document.querySelectorAll(".tab");

const aerialDrones = `
  <div class="drone-card">
    <img src="DroneCategories/Category1.png" alt="DJI Mavic 4 Pro">
    <h3>DJI Mavic 4 Pro</h3>
    <a href="#" class="learn-link">Learn More →</a>
    <ul class="drone-specs">
      <li><strong>< 1063 g</strong> Takeoff Weight</li>
      <li>51-min Max Flight Time</li>
      <li>4/3 CMOS Hasselblad Main + Tele + Medium Camera</li>
      <li><strong>6K/60fps HDR</strong> Max Video</li>
      <li><strong>100 MP</strong> Max Photo</li>
      <li>Omnidirectional Obstacle Sensing</li>
      <li>DJI O4+ Up to 20 km</li>
    </ul>
  </div>
  <div class="drone-card">
    <img src="DroneCategories/Category2.png" alt="DJI Air 3S">
    <h3>DJI Air 3S</h3>
    <a href="#" class="learn-link">Learn More →</a>
    <ul class="drone-specs">
      <li><strong>< 724 g</strong> Takeoff Weight</li>
      <li>45-min Max Flight Time</li>
      <li>1-inch CMOS Wide + Medium Camera</li>
      <li><strong>4K/60fps HDR</strong> Max Video</li>
      <li><strong>50 MP</strong> Max Photo</li>
      <li>Omnidirectional Obstacle Sensing</li>
      <li>DJI O4+ Up to 20 km</li>
    </ul>
  </div>
  <div class="drone-card">
    <img src="DroneCategories/Category1.png" alt="DJI Mini 5 Pro">
    <h3>DJI Mini 5 Pro</h3>
    <a href="#" class="learn-link">Learn More →</a>
    <ul class="drone-specs">
      <li><strong>< 249.9 g</strong> Takeoff Weight</li>
      <li>37/52-min Max Flight Time Dual Battery 36</li>
      <li>1-inch CMOS Camera</li>
      <li><strong>4K/60fps HDR</strong> Max Video</li>
      <li><strong>50 MP</strong> Max Photo</li>
      <li>Omnidirectional Obstacle Sensing</li>
      <li>DJI O4+ Up to 12 km</li>
    </ul>
  </div>
  <div class="drone-card">
    <img src="DroneCategories/Category4.png" alt="DJI Flip">
    <h3>DJI Flip</h3>
    <a href="#" class="learn-link">Learn More →</a>
    <ul class="drone-specs">
      <li><strong>&lt; 249 g</strong> Takeoff Weight</li>
      <li>31-min Max Flight Time Single Powered Battery</li>
      <li>1/1.3 CMOS Camera</li>
      <li><strong>4K/60fps HDR</strong> Max Video</li>
      <li><strong>48 MP</strong> Max Photo</li>
      <li>Forward & Downward Sensing</li>
      <li>DJI O4 Up to 10 km</li>
    </ul>
  </div>
`;

const immersiveDrones = `
  <div class="drone-card">
    <img src="DroneCategories/Category4.png" alt="DJI Avata 2">
    <h3>DJI Avata 2</h3>
    <div class="out-of-stock">Not in stock</div>
    <a href="#" class="learn-link">Learn More →</a>
    <ul class="drone-specs">
      <li><strong>377 g</strong> Takeoff Weight</li>
      <li>Built-in Propeller Guard</li>
      <li>23-min Max Flight Time</li>
      <li>O4 HD Video Transmission (13km)</li>
      <li>1/1.3-inch CMOS</li>
      <li>155° Ultra-Wide FOV</li>
      <li>RockSteady & HorizonSteady</li>
    </ul>
  </div>
  <div class="drone-card">
    <img src="DroneCategories/Category2.png" alt="DJI Avata">
    <h3>DJI Avata</h3>
    <div class="out-of-stock">Not in stock</div>
    <a href="#" class="learn-link">Learn More →</a>
    <ul class="drone-specs">
      <li><strong>410 g</strong> Takeoff Weight</li>
      <li>Built-in Propeller Guard</li>
      <li>18-min Max Flight Time</li>
      <li>O3+ Video Transmission (10km)</li>
      <li>1/1.7-inch CMOS</li>
      <li>155° Ultra-Wide FOV</li>
      <li>RockSteady & HorizonSteady</li>
    </ul>
  </div>
  <div class="drone-card">
    <img src="DroneCategories/Category1.png" alt="DJI FPV">
    <h3>DJI FPV</h3>
    <div class="out-of-stock">Not in stock</div>
    <a href="#" class="learn-link">Learn More →</a>
    <ul class="drone-specs">
      <li><strong>795 g</strong> Takeoff Weight</li>
      <li>Built-in Propeller Guard</li>
      <li>16-min Max Flight Time</li>
      <li>O3 Video Transmission (10km)</li>
      <li>1/2.3-inch CMOS</li>
      <li>150° Ultra-Wide FOV</li>
      <li>RockSteady Stabilization</li>
    </ul>
  </div>
`;

function updateContent(tabType) {
  droneContent.innerHTML = tabType === "aerial" ? aerialDrones : immersiveDrones;
}

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    if (!tab.classList.contains("active")) {
      tabs.forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");

      updateContent(tab.dataset.tab);
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  updateContent("aerial");
});



  //SCRolled epek
  const navbar = document.querySelector(".navbar");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  });

  // Toggle mobile menu
  const toggleBtn = document.querySelector(".menu-toggle");
  const mobileMenu = document.querySelector(".mobile-menu");
  
  toggleBtn.addEventListener("click", () => {
    mobileMenu.classList.toggle("active");
  });
