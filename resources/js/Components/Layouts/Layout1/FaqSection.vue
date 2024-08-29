<script setup>

</script>

<template>
    <section id="faq-2" class="faq-2 section light-background">

<div class="container section-title" data-aos="fade-up">
  <h2>Mobile Loading Ramps: Your Complete Guide</h2>
  <p>Everything You Need to Know About Mobile Loading </p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row justify-content-center">
  <div class="col-lg-4">
    <div data-aos="zoom-out" data-aos-delay="200">
        <img src="/img/others/faq-image.jpg" class="img-fluid animated rounded-4" alt="">
    </div>
  </div>

    <div class="col-lg-8">

      <div class="faq-container">

        <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>Why Choose Us?</h3>
          <div class="faq-content">
            <p>We are your one-stop shop for all your mobile loading ramp needs. Here's why we're the best choice:<br /><br />

                <b>Extensive Inventory:</b> We have over 500 ramps in stock, ready for immediate delivery to anywhere in Europe.<br />
                <b>Fast Delivery:</b> Experience lightning-fast delivery times. Your order will be shipped within 3 days, ensuring you get your ramps when you need them.<br />
                <b>Premium Quality:</b> Our ramps are crafted from the finest materials, guaranteeing durability and safety.<br />
                <b>Custom Solutions:</b> We specialize in creating customized ramps to accommodate your unique requirements.<br />
                <b>Innovative Features: </b> Our ramps incorporate cutting-edge safety features, making them the most reliable on the market.<br />
                <b>Rental Options:</b> Need a ramp for a short-term project? We offer flexible rental options to suit your needs.<br />
                <b>Expert Support:</b> Our team of experienced professionals is always available to provide expert guidance and assistance.

            </p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="300">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>What types of mobile loading ramps do you offer?</h3>
          <div class="faq-content">
            <p>We offer a variety of ramp types, including standard ramps, dock ramps, and specialty ramps for specific applications.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>How do I choose the right ramp for my needs?</h3>
          <div class="faq-content">
            <p>Our team of experts can help you select the ideal ramp based on your load weight, dimensions, and intended use.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>Can you customize your ramps?</h3>
          <div class="faq-content">
            <p>Absolutely! We can customize ramps to fit your specific requirements, such as length, width, and load capacity.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>Do you offer rental services?</h3>
          <div class="faq-content">
            <p>Yes, we offer flexible rental options for those who need a ramp for a short-term project.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>How long does delivery take?</h3>
          <div class="faq-content">
            <p>We typically deliver orders within 3 days to anywhere in Europe.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
          <i class="faq-icon bi bi-question-circle"></i>
          <h3>How can I contact technical support?</h3>
          <div class="faq-content">
            <p>You can contact our technical support team via phone, email, or live chat. Our contact information is available on our website.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

      </div>

    </div>

  </div>

</div>

</section><!-- /Faq 2 Section -->
</template>

<style scoped>
/*--------------------------------------------------------------
# Faq 2 Section
--------------------------------------------------------------*/
.faq-2 .faq-container {
  margin-top: 15px;
}

.faq-2 .faq-container .faq-item {
  background-color: var(--surface-color);
  position: relative;
  padding: 20px;
  margin-bottom: 20px;
  overflow: hidden;
}

.faq-2 .faq-container .faq-item:last-child {
  margin-bottom: 0;
}

.faq-2 .faq-container .faq-item h3 {
  font-weight: 600;
  font-size: 18px;
  line-height: 24px;
  margin: 0 30px 0 32px;
  transition: 0.3s;
  cursor: pointer;
}

.faq-2 .faq-container .faq-item h3 span {
  color: var(--accent-color);
  padding-right: 5px;
}

.faq-2 .faq-container .faq-item h3:hover {
  color: var(--accent-color);
}

.faq-2 .faq-container .faq-item .faq-content {
  display: grid;
  grid-template-rows: 0fr;
  transition: 0.3s ease-in-out;
  visibility: hidden;
  opacity: 0;
}

.faq-2 .faq-container .faq-item .faq-content p {
  margin-bottom: 0;
  overflow: hidden;
}

.faq-2 .faq-container .faq-item .faq-icon {
  position: absolute;
  top: 22px;
  left: 20px;
  font-size: 20px;
  line-height: 0;
  transition: 0.3s;
  color: var(--accent-color);
}

.faq-2 .faq-container .faq-item .faq-toggle {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 16px;
  line-height: 0;
  transition: 0.3s;
  cursor: pointer;
}

.faq-2 .faq-container .faq-item .faq-toggle:hover {
  color: var(--accent-color);
}

.faq-2 .faq-container .faq-active h3 {
  color: var(--accent-color);
}

.faq-2 .faq-container .faq-active .faq-content {
  grid-template-rows: 1fr;
  visibility: visible;
  opacity: 1;
  padding-top: 10px;
}

.faq-2 .faq-container .faq-active .faq-toggle {
  transform: rotate(90deg);
  color: var(--accent-color);
}
</style>
