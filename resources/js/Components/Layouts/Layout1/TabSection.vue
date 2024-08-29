<script setup>
import { useI18n } from "vue-i18n";

const { t } = useI18n()
</script>


<template>
    <!-- Tabs Section -->
    <section id="tabs" class="tabs section">

        <div class="container">

            <ul class="nav nav-tabs row  d-flex" data-aos="fade-up" data-aos-delay="100">
                <li class="nav-item col-3">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tabs-tab-1">
                        <i class="bi bi-collection"></i>
                        <h4 class="d-none d-lg-block">{{ $t('tabs.stock.teaser') }}</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tabs-tab-2">
                        <i class="bi bi-piggy-bank"></i>
                        <h4 class="d-none d-lg-block">{{ $t('tabs.rent.teaser') }}</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tabs-tab-3">
                        <i class="bi bi-shield-check"></i>
                        <h4 class="d-none d-lg-block">{{ $t('tabs.security.teaser') }}</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tabs-tab-4">
                        <i class="bi bi-command"></i>
                        <h4 class="d-none d-lg-block">{{ $t('tabs.support.teaser') }}</h4>
                    </a>
                </li>
            </ul><!-- End Tab Nav -->

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-pane fade active show" id="tabs-tab-1">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>{{ $t('tabs.stock.h3') }}</h3>
                            <p class="fst-italic">
                                {{ $t('tabs.stock.p') }}
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i>
                                    <span>{{ $t('tabs.stock.li-1') }}</span>
                                </li>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.stock.li-2') }}</span>.</li>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.stock.li-3') }}</span></li>
                            </ul>
                            <p>
                                {{ $t('tabs.stock.li-3') }}
                                <a href="/products">{{ $t('tabs.stock.catalog-link') }}</a>
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="zoom-out" data-aos-delay="200">
                            <img src="/img/about/about.jpg" alt="" class="img-fluid animated rounded">
                        </div>
                    </div>
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="tabs-tab-2">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>{{ $t('tabs.rent.h3') }}</h3>
                            <p>
                                {{ $t('tabs.rent.p') }}
                            </p>
                            <p class="fst-italic">
                                {{ $t('tabs.rent.p-itali') }}
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.rent.li-1') }}</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.rent.li-2') }}
                                </span></li>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.rent.li-3') }}</span></li>
                            </ul>
                            <p>
                                {{ $t('tabs.rent.p-end') }}
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="/img/about/rent-a-ramp.jpg" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="tabs-tab-3">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>{{ $t('tabs.security.h3') }}</h3>
                            <p>
                                {{ $t('tabs.security.p') }}
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.security.li-1') }}</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.security.li-2') }}</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.security.li-3') }}</span></li>
                            </ul>
                            <p>
                                {{ $t('tabs.security.p-end') }}
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="/img/about/loading-ramp-security.jpg" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="tabs-tab-4">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>{{ $t('tabs.support.h3') }}</h3>
                            <p>
                                {{ $t('tabs.support.p') }}
                            </p>
                            <p class="fst-italic">
                                {{ $t('tabs.support.p-itali') }}
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.support.li-1') }}.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.support.li-2') }}</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>{{ $t('tabs.support.li-3') }}</span></li>
                            </ul>
                            <p>
                                {{ $t('tabs.support.p-end') }}
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="/img/about/reliable-partner.jpg" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                </div><!-- End Tab Content Item -->

            </div>

        </div>

    </section><!-- /Tabs Section -->
</template>

<style scoped>
/*--------------------------------------------------------------
# Tabs Section
--------------------------------------------------------------*/
.tabs .nav-tabs {
    border: 0;
  }

  .tabs .nav-link {
    color: var(--heading-color);
    border: 1px solid color-mix(in srgb, var(--default-color), transparent 85%);
    padding: 15px 20px;
    transition: 0.3s;
    border-radius: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    height: 100%;
  }

  .tabs .nav-link i {
    padding-right: 15px;
    font-size: 48px;
  }

  .tabs .nav-link h4 {
    font-size: 18px;
    font-weight: 600;
    margin: 0;
  }

  .tabs .nav-link:hover {
    color: var(--accent-color);
    border-color: var(--accent-color);
  }

  .tabs .nav-link.active {
    background: var(--accent-color);
    color: var(--contrast-color);
    border-color: var(--accent-color);
  }

  .tabs .nav-link.active h4 {
    color: var(--contrast-color);
  }

  @media (max-width: 768px) {
    .tabs .nav-link i {
      padding: 0;
      line-height: 1;
      font-size: 36px;
    }
  }

  @media (max-width: 575px) {
    .tabs .nav-link {
      padding: 15px;
    }

    .tabs .nav-link i {
      font-size: 24px;
    }
  }

  .tabs .tab-content {
    margin-top: 30px;
  }

  .tabs .tab-pane h3 {
    color: var(--heading-color);
    font-weight: 700;
    font-size: 26px;
  }

  .tabs .tab-pane ul {
    list-style: none;
    padding: 0;
  }

  .tabs .tab-pane ul li {
    padding-bottom: 10px;
  }

  .tabs .tab-pane ul i {
    font-size: 20px;
    padding-right: 4px;
    color: var(--accent-color);
  }

  .tabs .tab-pane p:last-child {
    margin-bottom: 0;
  }
</style>
