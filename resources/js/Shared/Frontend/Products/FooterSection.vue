<script setup>
import { useI18n } from "vue-i18n";

const { t } = useI18n();

const addressHtml = t('footer.headquarter.address.street') + "<br>" + t('footer.headquarter.address.zip') + "<br>" + t('footer.headquarter.address.country') + "<br><br><strong>" + t('footer.headquarter.address.phoneLabel') + "</strong>" + t('footer.headquarter.address.phone') + "<br><strong>" + t('footer.headquarter.address.emailLabel') + "</strong>" + t('footer.headquarter.address.email') + "<br>"
const copyRightHtml = t('footer.copyright')
const subscribeButton = t('footer.newsletter.button')


</script>

<template>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>{{ t('footer.headquarter.name') }}</h3>
              <p class="pb-3"><em>{{ t('footer.headquarter.description') }}</em></p>
              <h4><span>{{ t('footer.headquarter.title') }}</span></h4>
              <p v-html="addressHtml"></p>
                <div class="social-links mt-3">
                <a href="https://twitter.com/JeromeGuiguet/status/1193134166176649216" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/azmachineryfrance/" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://ar.pinterest.com/jerome_guiguet/" target="_blank" class="pinterest"><i class="bx bxl-pinterest"></i></a>
                <a href="https://www.instagram.com/azmachinery/" target="_blank"  class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://www.linkedin.com/company/azmachinery" target="_blank"  class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>{{ t('footer.links.title') }}</h4>
            <ul>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li> -->
              <li><i class="bx bx-chevron-right"></i> <a href="#about">{{ t('footer.links.about') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#features">{{ t('footer.links.features') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://az-machinery.fr/en/l/contact">{{ t('footer.links.imprint') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ t('footer.links.privacy') }}</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>{{ t('footer.service.title') }}</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ t('footer.service.customMade') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ t('footer.service.delivery') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ t('footer.service.production') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ t('footer.service.warranty') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ t('footer.service.rental') }}</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>{{ t('footer.newsletter.title') }}</h4>
            <p>{{ t('footer.newsletter.description') }}</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" :value="subscribeButton">
            </form>
            <!-- <a href="https://www.youtube.com/watch?v=StpBR2W8G5A" class="glightbox play-btn mb-4"></a> TODO: use later -->
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright" v-html="copyRightHtml">

      </div>

      <!-- <div class="credits" v-html="rightsHtml"></div> -->
    </div>
  </footer><!-- End footer -->
</template>
