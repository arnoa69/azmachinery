<script setup>
import GetQuoteLayout from '@/Layouts/GetQuoteLayout.vue';
import { ref } from 'vue'

const imagePath = ref('/../../../img/quote-bg.jpg');
const backgroundStyle = ref({
  backgroundImage: `url(${imagePath.value})`
});
</script>

<template>
        <GetQuoteLayout>
    <!-- Get A Quote Section -->
    <section id="get-a-quote" class="get-a-quote section">

<div class="container">

  <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-5 quote-bg" :style="backgroundStyle"></div>

    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
      <form action="forms/get-a-quote.php" method="post" class="php-email-form">
        <h3>Get a quote</h3>
        <p>Vel nobis odio laboriosam et hic voluptatem. Inventore vitae totam. Rerum repellendus enim linead sero park flows.</p>

        <div class="row gy-4">

          <div class="col-md-6">
            <input type="text" name="departure" class="form-control" placeholder="City of Departure" required="">
          </div>

          <div class="col-md-6">
            <input type="text" name="delivery" class="form-control" placeholder="Delivery City" required="">
          </div>

          <div class="col-md-6">
            <input type="text" name="weight" class="form-control" placeholder="Total Weight (kg)" required="">
          </div>

          <div class="col-md-6">
            <input type="text" name="dimensions" class="form-control" placeholder="Dimensions (cm)" required="">
          </div>

          <div class="col-lg-12">
            <h4>Your Personal Details</h4>
          </div>

          <div class="col-12">
            <input type="text" name="name" class="form-control" placeholder="Name" required="">
          </div>

          <div class="col-12 ">
            <input type="email" class="form-control" name="email" placeholder="Email" required="">
          </div>

          <div class="col-12">
            <input type="text" class="form-control" name="phone" placeholder="Phone" required="">
          </div>

          <div class="col-12">
            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
          </div>

          <div class="col-12 text-center">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your quote request has been sent successfully. Thank you!</div>

            <button type="submit">Get a quote</button>
          </div>

        </div>
      </form>
    </div><!-- End Quote Form -->

  </div>

</div>

</section><!-- /Get A Quote Section -->

        </GetQuoteLayout>
</template>

<style scoped>
/*--------------------------------------------------------------
# Get A Quote Section
--------------------------------------------------------------*/
.get-a-quote .quote-bg {
  min-height: 500px;
  background-size: cover;
  background-position: center;
}

.get-a-quote .php-email-form {
  background: color-mix(in srgb, var(--default-color), transparent 97%);
  padding: 30px;
  height: 100%;
}

@media (max-width: 575px) {
  .get-a-quote .php-email-form {
    padding: 20px;
  }
}

.get-a-quote .php-email-form h3 {
  font-size: 14px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.get-a-quote .php-email-form h4 {
  font-size: 14px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin: 20px 0 0 0;
}

.get-a-quote .php-email-form p {
  font-size: 14px;
  margin-bottom: 20px;
}

.get-a-quote .php-email-form input[type=text],
.get-a-quote .php-email-form input[type=email],
.get-a-quote .php-email-form textarea {
  font-size: 14px;
  padding: 10px 15px;
  box-shadow: none;
  border-radius: 0;
  color: var(--default-color);
  background-color: color-mix(in srgb, var(--background-color), transparent 20%);
  border-color: color-mix(in srgb, var(--default-color), transparent 80%);
}

.get-a-quote .php-email-form input[type=text]:focus,
.get-a-quote .php-email-form input[type=email]:focus,
.get-a-quote .php-email-form textarea:focus {
  border-color: var(--accent-color);
}

.get-a-quote .php-email-form input[type=text]::placeholder,
.get-a-quote .php-email-form input[type=email]::placeholder,
.get-a-quote .php-email-form textarea::placeholder {
  color: color-mix(in srgb, var(--default-color), transparent 70%);
}

.get-a-quote .php-email-form button[type=submit] {
  color: var(--contrast-color);
  background: var(--accent-color);
  border: 0;
  padding: 10px 30px;
  transition: 0.4s;
  border-radius: 4px;
}

.get-a-quote .php-email-form button[type=submit]:hover {
  background: color-mix(in srgb, var(--accent-color), transparent 20%);
}
</style>
