<script setup>
</script>

<template>
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a  href="/"><img src="../../../../../public/img/az-machinery-logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="/#about">{{ $t('header.about') }}</a></li>
          <li class="dropdown"><a href="#"><span>{{ $t('header.products') }}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a :href="`${locale}/products`">{{ $t('header.menu.productList') }}</a></li>
              <li class="dropdown"><a href="/categories"><span>{{ $t('header.menu.types') }}</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/category/mobile">{{ $t("categories.main.mobile_ramp_label") }}</a></li>
                  <li><a href="/category/static">{{ $t("categories.main.static_ramp_label") }}</a></li>
                  <li><a href="/category/station">{{ $t("categories.main.station_ramp_label") }}</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="/#features">{{ $t('header.features') }}</a></li>
          <li><a class="nav-link scrollto" href="/#gallery">{{ $t('header.gallery') }}</a></li>
          <li><a class="nav-link scrollto" href="/#testimonials">{{ $t('header.testimonials') }}</a></li>
          <li><a class="nav-link scrollto" href="/#contact">{{ $t('header.contact') }}</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
</template>


<style scoped>
 /*--------------------------------------------------------------
  # Navigation Menu
  --------------------------------------------------------------*/
  /**
  * Desktop Navigation
  */
  .navbar {
    padding: 0;
  }

  .navbar ul {
    margin: 0;
    padding: 0;
    display: flex;
    list-style: none;
    align-items: center;
  }

  .navbar li {
    position: relative;
  }

  .navbar a,
  .navbar a:focus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0 10px 30px;
    font-size: 15px;
    font-weight: 500;
    font-family: "Poppins", sans-serif;
    color: rgba(255, 255, 255, 0.7);
    white-space: nowrap;
    transition: 0.3s;
  }

  .navbar a i,
  .navbar a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
  }

  .navbar>ul>li>a:before {
    content: "";
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 3px;
    left: 30px;
    background-color: #FE0000;
    visibility: hidden;
    width: 0px;
    transition: all 0.3s ease-in-out 0s;
  }

  .navbar a:hover:before,
  .navbar li:hover>a:before,
  .navbar .active:before {
    visibility: visible;
    width: 25px;
  }

  .navbar a:hover,
  .navbar .active,
  .navbar .active:focus,
  .navbar li:hover>a {
    color: #fff;
  }

  .navbar .dropdown ul {
    display: block;
    position: absolute;
    left: 30px;
    top: calc(100% + 30px);
    margin: 0;
    padding: 10px 0;
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    transition: 0.3s;
    border-radius: 4px;
  }

  .navbar .dropdown ul li {
    min-width: 200px;
  }

  .navbar .dropdown ul a {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 500;
    text-transform: none;
    color: #01036f;
  }

  .navbar .dropdown ul a i {
    font-size: 12px;
  }

  .navbar .dropdown ul a:hover,
  .navbar .dropdown ul .active:hover,
  .navbar .dropdown ul li:hover>a {
    color: #FE0000;
  }

  .navbar .dropdown:hover>ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
  }

  .navbar .dropdown .dropdown ul {
    top: 0;
    left: calc(100% - 30px);
    visibility: hidden;
  }

  .navbar .dropdown .dropdown:hover>ul {
    opacity: 1;
    top: 0;
    left: 100%;
    visibility: visible;
  }

  @media (max-width: 1366px) {
    .navbar .dropdown .dropdown ul {
      left: -90%;
    }

    .navbar .dropdown .dropdown:hover>ul {
      left: -100%;
    }
  }

  /**
  * Mobile Navigation
  */
  .mobile-nav-toggle {
    color: #fff;
    font-size: 28px;
    cursor: pointer;
    display: none;
    line-height: 0;
    transition: 0.5s;
  }

  @media (max-width: 991px) {
    .mobile-nav-toggle {
      display: block;
    }

    .navbar ul {
      display: none;
    }
  }

  .navbar-mobile {
    position: fixed;
    overflow: hidden;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background: rgba(1, 3, 91, 0.9);
    transition: 0.3s;
    z-index: 999;
  }

  .navbar-mobile .mobile-nav-toggle {
    position: absolute;
    top: 15px;
    right: 15px;
  }

  .navbar-mobile ul {
    display: block;
    position: absolute;
    top: 55px;
    right: 15px;
    bottom: 15px;
    left: 15px;
    padding: 10px 0;
    border-radius: 8px;
    background-color: #fff;
    overflow-y: auto;
    transition: 0.3s;
  }

  .navbar-mobile>ul>li>a:before {
    left: 20px;
  }

  .navbar-mobile a,
  .navbar-mobile a:focus {
    padding: 10px 20px;
    font-size: 15px;
    color: #0205a1;
  }

  .navbar-mobile a:hover,
  .navbar-mobile .active,
  .navbar-mobile li:hover>a {
    color: #3f43fd;
  }

  .navbar-mobile .getstarted,
  .navbar-mobile .getstarted:focus {
    margin: 15px;
  }

  .navbar-mobile .dropdown ul,
  .navbar-mobile .dropdown .dropdown ul {
    position: static;
    display: none;
    margin: 10px 20px;
    padding: 10px 0;
    z-index: 99;
    opacity: 1;
    visibility: visible;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  }

  .navbar-mobile .dropdown ul li,
  .navbar-mobile .dropdown .dropdown ul li {
    min-width: 200px;
  }

  .navbar-mobile .dropdown ul a,
  .navbar-mobile .dropdown .dropdown ul a {
    padding: 10px 20px;
  }

  .navbar-mobile .dropdown ul a i,
  .navbar-mobile .dropdown .dropdown ul a i {
    font-size: 12px;
  }

  .navbar-mobile .dropdown ul a:hover,
  .navbar-mobile .dropdown ul .active:hover,
  .navbar-mobile .dropdown ul li:hover>a,
  .navbar-mobile .dropdown .dropdown ul a:hover,
  .navbar-mobile .dropdown .dropdown ul .active:hover,
  .navbar-mobile .dropdown .dropdown ul li:hover>a {
    color: #d17104;
  }

  .navbar-mobile .dropdown>.dropdown-active,
  .navbar-mobile .dropdown .dropdown>.dropdown-active {
    display: block;
  }

</style>
