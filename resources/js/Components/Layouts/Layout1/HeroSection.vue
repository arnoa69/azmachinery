<script setup>
import { ref, onMounted, computed } from 'vue'
import { useI18n } from "vue-i18n";

const { t } = useI18n();

const heroTitle = t("hero.title.start") + " <span>" + t("hero.title.end") + "</span>";

const openModal = defineEmits(["open-modal"]);

const goToFlowform = (option) => {
    console.log(option)
    openModal("open-modal", {
            message: option,
    });
    gtag("event", "button_click", {
            event_category: "Start Flowform for " + option,
            event_label: "Open flowform" + option,
    });
}

const requestsToday = ref(6)
const lastRequest = ref(0)
let intervalDelay = 0
let lastUpdateTime = 0
let todayDate = new Date().toLocaleDateString()

onMounted(() => {
    // Retrieve the last value of requestsToday, lastRequest, and todayDate from localStorage
    const storedRequestsToday = localStorage.getItem('requestsToday')
    const storedLastRequest = localStorage.getItem('lastRequest')
    const storedTodayDate = localStorage.getItem('todayDate')

    if (storedTodayDate === todayDate) {
        if (storedRequestsToday !== null) {
            requestsToday.value = parseInt(storedRequestsToday)
        }
        if (storedLastRequest !== null) {
            lastRequest.value = parseInt(storedLastRequest)
        }
    } else {
        // Reset requestsToday and lastRequest to 0 in localStorage
        localStorage.setItem('requestsToday', '0')
        localStorage.setItem('lastRequest', '0')
        localStorage.setItem('todayDate', todayDate)
        requestsToday.value = 0
        lastRequest.value = 0
    }

    // Set the initial interval delay
    updateIntervalDelay()

    setInterval(() => {
        const currentTime = new Date().getTime()
        const timeSinceLastUpdate = currentTime - lastUpdateTime

        if (timeSinceLastUpdate >= intervalDelay) {
            const currentHour = new Date().getHours()
            const currentMinute = new Date().getMinutes()

            if (currentHour >= 7 && currentHour <= 23) {
                // Update requestsToday and lastRequest
                updateRequestsAndLastRequest()
                lastUpdateTime = currentTime
            } else {
                // Reset requestsToday and lastRequest to 0
                requestsToday.value = 0
                lastRequest.value = 0
            }

            // Update the interval delay randomly
            updateIntervalDelay()
        }
    }, 1000) // 1 second interval
})

const updateRequestsAndLastRequest = () => {
    if (requestsToday.value === 0) {
        // Add the first request at 7am
        requestsToday.value = 1
        lastRequest.value = Math.floor(Math.random() * (30 - 3 + 1)) + 3

        // Save the initial values to localStorage
        localStorage.setItem('requestsToday', requestsToday.value.toString())
        localStorage.setItem('lastRequest', lastRequest.value.toString())
    } else {
        // Update requestsToday and lastRequest randomly
        requestsToday.value += 1
        lastRequest.value = Math.floor(Math.random() * (30 - 3 + 1)) + 3

        // Save the updated values to localStorage
        localStorage.setItem('requestsToday', requestsToday.value.toString())
        localStorage.setItem('lastRequest', lastRequest.value.toString())
    }
}

const updateIntervalDelay = () => {
    const intervalOptions = [60000, 120000, 180000, 300000, 600000] // 1, 2, 3, 5, 10 minutes
    intervalDelay = intervalOptions[Math.floor(Math.random() * intervalOptions.length)]
}
</script>

<template>
    <!-- Existing hero section content here -->
    <section id="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12 order-1 pt-5 pt-lg-0 order-lg-1 d-flex align-items-center">
                    <h1 class="hero-title" v-html="heroTitle"></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="row row-collapse">
        <div class="col medium-12 small-12 large-12">
            <div class="col-inner">
                <h2 class="title-box">{{ t("hero.box.title") }}</h2>
                <div class="row first:row-cols-1 row-cols-sm-2 row-top">
                        <div class="col-12 col-sm-6 d-block d-sm-none">
                            <div class="requests-today">
                                {{ t("hero.box.requests_today") }} <span>{{ requestsToday }}</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 d-block d-sm-none">
                            <div class="last-request">
                                {{ t("hero.box.last_requests") }} <span>{{ lastRequest }} min</span>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-12 more500">
                        <h3 class="more500">{{ t("hero.box.choices.more_500") }}</h3>
                    </div>
                </div>
                <div class="container my-5">
                    <div class="row first:row-cols-1 row-cols-sm-3 g-2">
                        <div class="col">
                            <div @click="goToFlowform('rampes') "class="card h-100 position-relative card-bg-1">
                                <div class="card-body  d-flex flex-column justify-content-between">
                                    <h5 class="card-title">{{ t("hero.box.choices.choice_ramp") }} <i
                                            class="bi bi-arrow-up-right-square link-arrow"></i>
                                    </h5>
                                </div>
                                <div class="card-footer"></div>
                                <div class="card-img-overlay bg-gradient-1">
                                    <h5 class="card-title text-white">{{ t("hero.box.choices.start_now") }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                                <div @click="goToFlowform('stations')"class="card card-bg-2 h-100 position-relative">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ t("hero.box.choices.choice_platform") }} <i
                                                class="bi bi-arrow-up-right-square link-arrow"></i>
                                        </h5>
                                    </div>
                                    <div class="card-footer"></div>
                                    <div class="card-img-overlay bg-gradient-1">
                                        <h5 class="card-title text-white">{{ t("hero.box.choices.start_now") }}</h5>
                                    </div>
                                </div>
                        </div>
                        <div class="col">
                                <div @click="goToFlowform('measures')" class="card card-bg-3 h-100 position-relative">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ t("hero.box.choices.choice_measurement") }} <i
                                                class="bi bi-arrow-up-right-square link-arrow"></i>
                                        </h5>
                                    </div>
                                    <div class="card-footer"></div>
                                    <div class="card-img-overlay bg-gradient-1">
                                        <h5 class="card-title text-white">{{ t("hero.box.choices.start_now") }}</h5>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <hr style="color:crimson;">
                    <div class="row first:row-cols-1 row-cols-sm-3 g-2 row-sprites">
                        <div class="col-12">
                            <div class="sprite-container">
                                <div class="sprite-image"></div>
                            </div>
                        </div>
                        <div class="col-4 d-none d-sm-block">
                            <div class="requests-today">
                                {{ t("hero.box.requests_today") }} <span>{{ requestsToday }}</span>
                            </div>
                        </div>
                        <div class="col-4 d-none d-sm-block">
                            <div class="last-request">
                                {{ t("hero.box.last_requests") }} <span>{{ lastRequest }} min</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>
.card-link {
    text-decoration: none;
}
#hero {
    position: relative;
    z-index: 1;
    height: 600px;
    display: flex;
    text-align: center;
    /* Center the heroTitle horizontally */
}

h1.hero-title {
    font-size: 48px;
    font-weight: 700;
    color: #291ea5;
    margin-bottom: 10px;
    width: 100% !important;
    /* Set the width to 100% for centering */
    text-align: center;
    white-space: nowrap;
    /* Prevent the span from breaking to the next row */
    display: inline-block;
    /* Set the display to inline-block */
    z-index: 20;
}

.row-collapse {
    position: relative;
    z-index: 2;
    margin-top: -70px;
    /* Adjust this value as needed to achieve the desired overlap */
    background-color: rgb(255, 255, 255);
    width: calc(100% + 12px);
    height: 100px;
}

.col-inner {
    min-width: 1080px;
    max-width: 1250px;
    margin: auto;
    border-radius: 16px;
    padding-left: 20px;
    padding-right: 20px;
    background-color: white;
    /* Set background color to white */
    border: 1px solid #333;
    /* Add a dark thin grey border */
    box-shadow: 0 0 10px #333;
    /* Add a glowing effect to the border */
}


.error-message {
    color: red;
    margin-top: -15px;
    display: flex;
    justify-content: center;
    align-items: center;
}


.requests-today,
.last-request {
    width: 100%;
    display: flex;
    align-items: center;
    font-size: 18px;
    font-weight: 500;
    color: #333;
    padding: 0 10px;
    text-align: center;
    margin-top: 26px;
}

/* Requests today */
.requests-today {
    display: flex;
    align-items: center;
}

.requests-today::before {
    content: "";
    width: 20px;
    height: 20px;
    background-color: #ff1100;
    /* blue color */
    border-radius: 50%;
    margin-right: 10px;
}

.requests-today span {
    font-size: 24px;
    font-weight: 700;
    margin-left: 5px;
    margin-top: 2px;
    animation: tick 2s linear infinite;
    /* ticking effect */
}

@keyframes tick {
    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-1px);
    }

    100% {
        transform: translateY(0);
    }
}

/* Last request */
.last-request {
    display: flex;
    align-items: center;
}

.last-request::before {
    content: "";
    width: 20px;
    height: 20px;
    background-color: #311d27;
    /* pink color */
    border-radius: 50%;
    margin-right: 10px;
}

.last-request span {
    font-size: 24px;
    font-weight: 700;
    margin-left: 5px;
    margin-top: 2px;
    animation: tick 2s linear infinite;
    /* ticking effect */
}


.sprite-container {
    width: 100%;
    max-width: 480px;
    height: 60px;
    background-image: url('/img/box/sprite-certificates.png');
    background-size: 330px 55px;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    margin-top: 10px;
    margin-bottom: -30px;
}

.sprite-image {
    width: 20%;
    height: 100%;
    background-position: calc(0% * var(--frame-index)) center;
    animation: sprite-animation 1s steps(5) infinite;
}

.request-info {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    color: #333;
    padding: 0 10px;
}


@keyframes sprite-animation {
    100% {
        background-position: calc(-100% * var(--frame-index)) center;
    }
}

.title-box {
    margin: 0px auto;
    padding-top: 3px;
    padding-left: 15px;
    text-align: center;
    color: rgb(61, 57, 57);
    font-size: 20px;
    font-weight: bold;
}
.more500 {
  color: #e03030;
  font-weight: bold;
  text-align: center;
  margin-bottom: -33px;
}


.bg-gradient-1 {
    background: linear-gradient(to right, rgba(255, 0, 0, 0.5), rgba(255, 0, 0, 0.2));
}

.bg-gradient-2 {
    background: linear-gradient(to right, rgba(255, 0, 0, 0.7), rgba(255, 0, 0, 0.4));
}

.bg-gradient-3 {
    background: linear-gradient(to right, rgba(255, 0, 0, 0.9), rgba(255, 0, 0, 0 .6));
}

.card {
    position: relative;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 5px;
    background-position: bottom;
    background-repeat: no-repeat;
    background-size: cover;
    transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
    overflow: hidden;
    border-radius: 20px;
    border: none;
}

.card-bg-1 {
    background-image: url('/img/card-bg5.jpg');
}

.card-bg-2 {
    background-image: url('/img/card-bg7.jpg');
}

.card-bg-3 {
    background-image: url('/img/card-bg8.jpg');
}

.card::before {
    content: '';
    /* Required for the pseudo-element */
    position: absolute;
    /* Position the pseudo-element relative to its parent */
    top: 0;
    left: 0;
    width: 100%;
    /* Cover the entire parent element */
    height: 100%;
    pointer-events: none;
    /* Ensure clicks pass through the overlay to the underlying content */
    z-index: 1;
    /* Ensure the overlay is above the background image */
}

.card:hover {
    background-position: top 10%;
    background-size: 115%;
    transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
}

.card:hover .card-img-overlay {
    opacity: 1;
}

.card-img-overlay {
    transition: opacity 0.3s;
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.6);
    /* Dark overlay so the image can be seen */
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    font-weight: bold;
    color: white;
    text-align: center;
}

.card-overlay-hover {
    display: none;
}

.card:hover .card-overlay-hover {
    display: flex;
}

.card-title {
    flex-shrink: 0;
    margin-bottom: 0;
    color: white;
    width: 296px;
    font-size: 21px;
    margin-top: -6px;
}

.link-arrow {
    font-size: 23px;
}

/* Mobile Devices (Portrait) */
@media (max-width: 575px) {
    #hero {
        height: 650px;
    }

    h1.hero-title {
        font-size: 20px !important;
        margin-top: -70px !important;
    }

    .row-collapse {
        width: 100%;
        margin-top: -70px;
        padding: 5px;
        margin-left: 0;
        margin-right: 0;
    }

    .col-inner {
        padding: 18px 15px 0 15px;
        margin: 0 auto;
        margin-top: -470px;
        min-width: 0px;
        max-width: 1000px;
    }

    .title-box {
        margin: 0px auto;
        text-align: center;
        color: rgb(61, 57, 57);
        font-size: 16px;
        font-weight: bold;
    }
    .row-top {
        margin-bottom: -50px;
    }

    .more500 {
        margin-top: 30px;
        margin-bottom: -21px;
        font-size: 18px;
    }

    .card {
        min-height: 120px;
    }

    .sprite-container {
        max-width: 320px;
        height: 45px;
        background-size: 270px 45px;
    }

    .requests-today,
    .last-request {
        /* General styles */
        font-size: 12px;
        margin-top: 0;
        margin-left: 40px;
        width: 200px;
    }

    .requests-today span,
    .last-request span {
        font-size: 12px;
        padding-left: 10px;
    }

    .requests-today::before {
        width: 9px;
        height: 9px;
        background-color: #ff1100;
        /* blue color */
        border-radius: 50%;
        margin-right: 9px;
    }

    .last-request::before {
        width: 9px;
        height: 9px;
        background-color: #311d27;
        /* pink color */
        border-radius: 50%;
        margin-right: 9px;
    }

    .row-requests {
        margin-bottom: -45px;
    }

    .row-sprites {
        margin-top: -30px;
    }

    .card-title {
        font-size: 16px;
        width: 230px;
    }

}

/* Mobile Devices (Landscape) */
@media (min-width: 576px) and (max-width: 767px) {
    #hero {
        height: 560px;
    }

    h1.hero-title {
        font-size: 22px !important;
        margin-top: -90px !important;
    }

    .row-collapse {
        width: 100%;
        margin-top: -70px;
        padding: 5px;
        margin-left: 0;
        margin-right: 0;
    }

    .col-inner {
        padding: 18px 15px 0 15px;
        margin: 0 auto;
        margin-top: -395px;
        min-width: 0px;
        max-width: 1000px;
    }

    .requests-today,
    .last-request {
        /* General styles */
        font-size: 10px;
        margin-top: 0;
    }

    .requests-today span,
    .last-request span {
        font-size: 12px;
        padding-left: 9px;
    }

    .requests-today::before {
        width: 9px;
        height: 9px;
        background-color: #ff1100;
        /* blue color */
        border-radius: 50%;
        margin-right: 3px;
    }

    .last-request::before {
        width: 9px;
        height: 9px;
        background-color: #311d27;
        /* pink color */
        border-radius: 50%;
        margin-right: 3px;
    }

    .row-requests {
        margin-bottom: -45px;
    }

    .more500 {
        text-align: center;
        align-items: center;
        margin-top: 3px;
        text-align: center;
        margin-bottom: -45px;
        font-size: 26px;
    }

    .card {
        min-height: 100px;
    }

    .card-title {
        font-size: 14px;
        width: 150px;
    }

    .link-arrow {
        font-size: 16px;
    }

    .sprite-container {
        max-width: 320px;
        height: 32px;
        background-size: 192px 32px;
        margin-top: -10px;
    }
    .row-sprites {
        margin-bottom: -30px;
    }

}

/* Tablets (Portrait) */
@media (min-width: 768px) and (max-width: 991px) {
    #hero {
        height: 300px;
    }
    .row-collapse {
        margin-top: -120px;
        /* Adjust this value as needed to achieve the desired overlap */
        padding: 30px;
        height: 121px;
    }

    .col-inner {
        margin-top: -270px;
        min-width: 200px;
        max-width: 990px;
        max-height: 280px;
    }
    .more500 {
        text-align: center;
        align-items: center;
        margin-top: 3px;
        text-align: center;
        margin-bottom: -45px;
        font-size: 26px;
    }

    .requests-today::before {
        width: 9px;
        height: 9px;
        margin-right: 3px;
    }

    .last-request::before {
        width: 9px;
        height: 9px;
        margin-right: 3px;
    }

    .requests-today,
    .last-request {
        font-size: 14px;
        margin-top: 0;
    }
    .requests-today span,
    .last-request span {
        font-size: 12px;
        padding-left: 3px;
    }

    .sprite-container {
        max-width: 320px;
        height: 33.33px;
        background-size: 200px 33.33px;
        margin-top: -10px;
    }

    .hero-title {
        margin-top: -60px !important;
    }

    #hero {
        height: 490px;
    }

    .card {
        min-height: 120px;
    }

    .card-footer {
        width: 185px;
        font-size: 11px;
    }

    .card-title {
        flex-shrink: 0;
        margin-bottom: 0;
        color: white;
        width: 190px;
        font-size: 18px;
    }
}

/* Tablets (Landscape) and Small Desktops */
@media (min-width: 992px) and (max-width: 1199px) {
    #hero {
        height: 560px;
    }
    .col-inner {
        min-width: 200px;
        max-width: 1190px;
        max-height: 400px;
        padding: 28px 36px;
        margin-top: -280px;
    }

    .row-collapse {
        max-height: 100px;
        margin-left: 0;
        padding-right: 9px;
        min-width: 992px;
        max-width: 1190px;
    }

    .card {
        min-height: 160px;
    }
    .more500 {
        text-align: center;
        align-items: center;
        margin-top: 3px;
        text-align: center;
        margin-bottom: -45px;
        font-size: 26px;
    }

    .requests-today::before {
        width: 12px;
        height: 12px;
        margin-right: 9px;
    }

    .last-request::before {
        width: 12px;
        height: 12px;
        margin-right: 9px;
    }

    .requests-today,
    .last-request {
        font-size: 16px;
        margin-top: 0;
    }
    .requests-today span,
    .last-request span {
        font-size: 18px;
        padding-left: 3px;
    }

    .sprite-container {
        max-width: 320px;
        height: 46.66px;
        background-size: 280px 46.66px;
        margin-top: -10px;
    }

    .hero-title {
        margin-top: -20px !important;
    }

    .card-title {
        flex-shrink: 0;
        margin-bottom: 0;
        color: white;
        width: 220px;
        font-size: 18px;
    }
}

/* Desktops */
@media (min-width: 1200px) {
    #hero {
        height: 560px;
    }
    .col-inner {
        min-width: 200px;
        max-width: 1190px;
        max-height: 400px;
        padding: 28px 36px;
        margin-top: -280px;
    }

    .row-collapse {
        max-height: 100px;
        margin-left: 0;
        padding-right: 9px;
        min-width: 992px;
    }

    .card {
        min-height: 160px;
    }
    .more500 {
        text-align: center;
        align-items: center;
        margin-top: 3px;
        text-align: center;
        margin-bottom: -45px;
        font-size: 26px;
    }

    .requests-today::before {
        width: 12px;
        height: 12px;
        margin-right: 9px;
    }

    .last-request::before {
        width: 12px;
        height: 12px;
        margin-right: 9px;
    }

    .requests-today,
    .last-request {
        font-size: 16px;
        margin-top: 0;
    }
    .requests-today span,
    .last-request span {
        font-size: 18px;
        padding-left: 3px;
    }

    .sprite-container {
        max-width: 320px;
        height: 46.66px;
        background-size: 280px 46.66px;
        margin-top: -10px;
    }

    .hero-title {
        margin-top: -20px !important;
    }

    .card-title {
        flex-shrink: 0;
        margin-bottom: 0;
        color: white;
        width: 300px;
        font-size: 21px;
        margin-top: 5px;
    }

    .link-arrow {
    font-size: 26px;
    }
}

@media (max-width: 320px) {
    .card-title {
        font-size: 14px;
        width: 200px;
    }

    .title-box {
        margin-bottom: 5px;
        font-size: 14px;
    }
    .more500 {
        margin-top: 30px;
        margin-bottom: -15px;
        font-size: 15px;
    }
}


</style>
