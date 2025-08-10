<!-- 🦶 Footer Section -->
<footer class="bg-dark text-white pt-5 pb-3">
  <div class="container">

    <div class="row text-center text-md-start mb-4">
      
      <!-- Map Column -->
      <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="mb-3">Our Location</h5>
        <div class="map-container rounded overflow-hidden shadow-sm">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63354.57656090238!2d79.8374!3d6.9271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2596e927e0d8f%3A0x342ca9a55c93d1f2!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2sus!4v1688990123456!5m2!1sen!2sus" 
            width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <!-- Quick Links Column -->
      <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="mb-3">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="{{ url('/') }}" class="text-white footer-link">Home</a></li>
          <li><a href="{{ url('/gallery') }}" class="text-white footer-link">Gallery</a></li>
          <li><a href="{{ url('/about') }}" class="text-white footer-link">About Us</a></li>
          <li><a href="{{ url('/contact') }}" class="text-white footer-link">Contact</a></li>
          <li><a href="{{ url('/faq') }}" class="text-white footer-link">FAQ</a></li>
        </ul>
      </div>

      <!-- Social & Contact Column -->
      <div class="col-md-4 text-center text-md-start">
        <h5 class="mb-3">Connect with Us</h5>
        <p>Follow us on social media for the latest updates and offers!</p>
        <div class="d-flex justify-content-center justify-content-md-start gap-3 mb-3">
          <a href="https://facebook.com/aziijewelers" target="_blank" class="text-white fs-4" aria-label="Facebook">
            <i class="fab fa-facebook-square"></i>
          </a>
          <a href="https://instagram.com/aziijewelers" target="_blank" class="text-white fs-4" aria-label="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://twitter.com/aziijewelers" target="_blank" class="text-white fs-4" aria-label="Twitter">
            <i class="fab fa-twitter-square"></i>
          </a>
          <a href="https://linkedin.com/company/aziijewelers" target="_blank" class="text-white fs-4" aria-label="LinkedIn">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="mailto:info@aziijewelers.com" class="text-white fs-4" aria-label="Email">
            <i class="fas fa-envelope"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- Copyright row below -->
    <div class="row">
      <div class="col-12 text-center border-top border-secondary pt-3">
        <p class="mb-0">&copy; 2025 Azii Jewelers. All rights reserved.</p>
      </div>
    </div>

  </div>
</footer>
