<script setup>
import { ref, onMounted, computed } from 'vue'
import { useI18n } from "vue-i18n";

const { t } = useI18n();

</script>

<template>
  <section id="hero" class="hero-section-tech">
    <!-- Technischer Glow-Hintergrund -->
    <div class="glow-bg"></div>
    <div class="hero-content-wrapper">
      <div class="hero-left">
        <h1 class="hero-title">{{ $t('hero.title.start') }}</h1>
        <h2 class="hero-subtitle">{{ $t('hero.title.description') }}</h2>
        <a href="/get-a-quote" class="hero-btn">{{ $t('hero.title.button') }}</a>
      </div>
      <div class="hero-right">
        <div class="video-frame">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/KjJPN3IRYG8" title="Hero Video" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.hero-section-tech {
  position: relative;
  min-height: 80vh;
  background: #111;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}
.glow-bg {
  position: absolute;
  top: -20%;
  left: -10%;
  width: 150vw;
  height: 120vh;
  background: radial-gradient(circle at 60% 40%, #e50914 0%, rgba(229,9,20,0.2) 30%, transparent 70%),
              radial-gradient(circle at 30% 80%, #e50914 0%, rgba(229,9,20,0.1) 40%, transparent 80%);
  filter: blur(80px);
  z-index: 0;
  pointer-events: none;
}
.hero-content-wrapper {
  position: relative;
  display: flex;
  flex-direction: row;
  width: 100%;
  max-width: 1400px;
  z-index: 1;
  padding: 4rem 2rem 2rem 2rem;
  gap: 2rem;
}
.hero-left {
  flex: 1 1 50%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  color: #fff;
  z-index: 2;
}
.hero-title {
  font-size: 3rem;
  font-weight: 800;
  color: #e50914;
  margin-bottom: 1rem;
  letter-spacing: -1px;
}
.hero-subtitle {
  font-size: 1.5rem;
  font-weight: 400;
  color: #fff;
  margin-bottom: 1rem;
}
.hero-desc {
  font-size: 1.1rem;
  color: #ddd;
  margin-bottom: 2rem;
}
.hero-btn {
  display: inline-block;
  background: #e50914;
  color: #fff;
  padding: 0.9em 2.2em;
  border-radius: 40px;
  font-weight: 700;
  font-size: 1.1rem;
  letter-spacing: 0.5px;
  box-shadow: 0 4px 24px 0 rgba(229,9,20,0.2);
  transition: background 0.2s;
  text-decoration: none;
  width: 50%;
}
.hero-btn:hover {
  background: #b0060f;
}
.hero-right {
  flex: 1 1 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
}
.video-frame {
  position: relative;
  width: 420px;
  max-width: 90vw;
  aspect-ratio: 16/9;
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 0 0 4px #e50914, 0 8px 32px 0 rgba(0,0,0,0.7);
  background: #000;
  display: flex;
  align-items: center;
  justify-content: center;
}
.video-overlay {
  position: absolute;
  right: 0;
  top: 0;
  width: 50%;
  height: 100%;
  background: rgba(17,17,17,0.82);
  display: flex;
  align-items: center;
  justify-content: flex-end;
}
.video-overlay-content {
  color: #fff;
  padding: 2rem 1.2rem 2rem 1.2rem;
  text-align: left;
  width: 100%;
}
.video-overlay-content h3 {
  color: #e50914;
  margin-bottom: 0.7rem;
  font-size: 1.2rem;
  font-weight: 700;
}
.video-overlay-content p {
  color: #fff;
  margin-bottom: 1rem;
  font-size: 1rem;
}
.video-action-btn {
  background: #e50914;
  color: #fff;
  padding: 0.5em 1.5em;
  border-radius: 30px;
  font-weight: 600;
  font-size: 1rem;
  text-decoration: none;
  transition: background 0.2s;
  box-shadow: 0 2px 8px 0 rgba(229,9,20,0.2);
}
.video-action-btn:hover {
  background: #b0060f;
}
@media (max-width: 900px) {
  .hero-content-wrapper {
    flex-direction: column;
    gap: 2.5rem;
    align-items: center;
    padding: 2rem 1rem;
  }
  .hero-left, .hero-right {
    flex: 1 1 100%;
    width: 100%;
    justify-content: center;
    align-items: center;
    text-align: center;
  }
  .video-overlay {
    width: 100%;
    justify-content: center;
    align-items: flex-end;
    background: rgba(17,17,17,0.82);
  }
  .video-overlay-content {
    padding: 1.5rem 1rem;
    text-align: center;
  }
}
</style>


<style scoped></style>
