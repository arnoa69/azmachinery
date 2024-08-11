<script setup>
const props = defineProps({
    product: {
        type: Object,
        required: true,
    }
});
</script>

<template>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-1">
            {{ $t("products.weight_capacity", { tonnes: product.weight_capacity }) }}
        </div>
        <div class="right-side right-color-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-minecart-loaded" viewBox="0 0 16 16">
                <path
                    d="M4 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2m0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4m8-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2m0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4M.115 3.18A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 14 12H2a.5.5 0 0 1-.491-.408l-1.5-8a.5.5 0 0 1 .106-.411zm.987.82 1.313 7h11.17l1.313-7z" />
                <path fill-rule="evenodd"
                    d="M6 1a2.498 2.498 0 0 1 4 0c.818 0 1.545.394 2 1 .67 0 1.552.57 2 1h-2c-.314 0-.611-.15-.8-.4-.274-.365-.71-.6-1.2-.6-.314 0-.611-.15-.8-.4a1.497 1.497 0 0 0-2.4 0c-.189.25-.486.4-.8.4-.507 0-.955.251-1.228.638q-.136.194-.308.362H3c.13-.147.401-.432.562-.545a1.6 1.6 0 0 0 .393-.393A2.5 2.5 0 0 1 6 1" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-2">
            {{ $t("products.width_used", { width_used: product.width_used }) }}
        </div>
        <div class="right-side right-color-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                class="bi bi-arrows-vertical" viewBox="0 0 16 16">
                <path
                    d="M8.354 14.854a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 13.293V2.707L6.354 3.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 2.707v10.586l1.146-1.147a.5.5 0 0 1 .708.708z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-3">
            {{ $t("products.total_width", { total_width: product.total_width }) }}
        </div>
        <div class="right-side right-color-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                class="bi bi-arrows-vertical" viewBox="0 0 16 16">
                <path
                    d="M8.354 14.854a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 13.293V2.707L6.354 3.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 2.707v10.586l1.146-1.147a.5.5 0 0 1 .708.708z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-4">
            {{ $t("products.total_length", { total_length: product.total_length }) }}
        </div>
        <div class="right-side right-color-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-arrows"
                viewBox="0 0 16 16">
                <path
                    d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-5">
            {{ $t("products.length_inclined_plane", {
                length: product.length_inclined_plane
            }) }}
        </div>
        <div class="right-side right-color-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-arrows"
                viewBox="0 0 16 16">
                <path
                    d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-6">
            {{ $t("products.length_plateform_horizontal", {
                length:
                    product.length_plateform_horizontal
            }) }}
        </div>
        <div class="right-side right-color-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-arrows"
                viewBox="0 0 16 16">
                <path
                    d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-7">
            {{ $t("products.length_lip_penetrating", {
                length:
                    product.length_lip_penetrating
            }) }}
        </div>
        <div class="right-side right-color-7">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-arrows"
                viewBox="0 0 16 16">
                <path
                    d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-8">
            {{ $t("products.exit_lip_length", { length: product.exit_lip_length }) }}
        </div>
        <div class="right-side right-color-8">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-arrows"
                viewBox="0 0 16 16">
                <path
                    d="M1.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L2.707 7.5h10.586l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L13.293 8.5H2.707l1.147 1.146a.5.5 0 0 1-.708.708z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-9">
            {{ $t("products.slope_min_max", {
                min_slope: product.slope_min, max_slope:
                    product.slope_max
            }) }}
        </div>
        <div class="right-side right-color-9">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-slash-lg"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-10">
            {{ $t("products.lifting_height", {
                min_height: product.min_height, max_height:
                    product.max_height
            }) }}
        </div>
        <div class="right-side right-color-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-align-top"
                viewBox="0 0 16 16">
                <rect width="4" height="12" rx="1" transform="matrix(1 0 0 -1 6 15)" />
                <path d="M1.5 2a.5.5 0 0 1 0-1zm13-1a.5.5 0 0 1 0 1zm-13 0h13v1h-13z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-11">
            {{ $t("products.unloaded_weight", { weight: product.unloaded_weight }) }}
        </div>
        <div class="right-side right-color-11">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-minecart"
                viewBox="0 0 16 16">
                <path
                    d="M4 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2m0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4m8-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2m0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4M.115 3.18A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 14 12H2a.5.5 0 0 1-.491-.408l-1.5-8a.5.5 0 0 1 .106-.411zm.987.82 1.313 7h11.17l1.313-7z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-2">
            {{ $t("products.support_feet", { feet: product.amount_feet }) }}
        </div>
        <div class="right-side right-color-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-align-bottom" viewBox="0 0 16 16">
                <rect width="4" height="12" x="6" y="1" rx="1" />
                <path d="M1.5 14a.5.5 0 0 0 0 1zm13 1a.5.5 0 0 0 0-1zm-13 0h13v-1h-13z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-3">
            {{ $t("products.side_railings", { height: product.side_railings_height }) }}
        </div>
        <div class="right-side right-color-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                class="bi bi-arrows-vertical" viewBox="0 0 16 16">
                <path
                    d="M8.354 14.854a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 13.293V2.707L6.354 3.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 2.707v10.586l1.146-1.147a.5.5 0 0 1 .708.708z" />
            </svg>
        </div>
    </div>
    <div class="long-pill" data-aos="zoom-in" data-aos-delay="100">
        <div class="left-side left-color-6">
            {{ $t("products.security_chaines") }}
        </div>
        <div class="right-side right-color-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-shield-check" viewBox="0 0 16 16">
                <path
                    d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                <path
                    d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
            </svg>
        </div>
    </div>
</template>


<style scoped>
.long-pill {
    display: inline-flex;
    border-radius: 5px;
    overflow: hidden;
    width: 100%;
    /* Set the total width of the long pill */
    margin-bottom: 2px;
}

.left-side,
.right-side {
    display: flex;
    align-items: center;
    color: white;
    font-weight: bold;
    font-size: 12px !important;
    /* Set the font size for the text */
    max-height: 25px;
}

.left-side {
    width: 91%;
    /* Set the width of the left side */
    justify-content: flex-start;
    /* Align text to the left */
    border-top-left-radius: 5px;
    /* Adjust border radius for left side */
    border-bottom-left-radius: 5px;
    /* Adjust border radius for left side */
    padding: 4px 0 4px 9px;
    /* Adjust padding as needed */
}

.right-side {
    width: 9%;
    /* Set the width of the right side */
    justify-content: flex-end;
    /* Align text to the right */
    border-top-right-radius: 5px;
    /* Adjust border radius for right side */
    border-bottom-right-radius: 5px;
    /* Adjust border radius for right side */
    background-color: #f6d0cf;
    color: #f8f2f2;
    padding: 4px 9px 4px 0;
    /* Adjust padding as needed */
}

.number-odd {
    font-weight: normal;
    color: #dbd9d9;
    margin-left: 3px;
}

.number-even {
    font-weight: normal;
    color: #111;
    margin-left: 3px;
}

.left-color-1,
.left-color-3,
.left-color-5,
.left-color-7,
.left-color-9,
.left-color-11 {
    background-color: #e0dfdf;
    /* Dark grey color for the left side */
    color: #111;
    /* Light font color */
}

.left-color-2,
.left-color-4,
.left-color-6,
.left-color-8,
.left-color-10 {
    background-color: #fff;
    /* Brighter grey color for the left side */
    color: #111;
    /* Light font color */
}

.right-color-1,
.right-color-3,
.right-color-5,
.right-color-7,
.right-color-9,
.right-color-11 {
    background-color: #e0dfdf;
    /* Light red color for the right side */
    color: #333333;
    /* Dark font color */
}

.right-color-2,
.right-color-4,
.right-color-6,
.right-color-8,
.right-color-10 {
    background-color: #fff;
    /* Lighter red color for the right side */
    color: #333333;
    /* Dark font color */
}

/* Add more classes for additional colors as needed */

@media (min-width: 992px) and (max-width: 1400px) {

.left-side,
.right-side {
    font-weight: normal;
    max-height: 25px;
}

.left-side {
    font-size: 10px;
    width: 88%;
}

.right-side {
    font-size: 10px;
    width: 12%;
}
}
</style>
