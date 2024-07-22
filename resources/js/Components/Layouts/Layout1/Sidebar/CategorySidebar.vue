<script setup>
import { useI18n } from 'vue-i18n';
const { locale } = useI18n();

</script>

<template>
    <div class="service-box">
        <h4>AZ Machinery Produkte</h4>
        <div class="services-list">
            <a :href="`/${locale}/category/mobile`">
                <i class="bi bi-arrow-right-circle"></i>
                <span>{{ $t("categories.main.mobile_ramp_label") }}
                </span>
            </a>
            <a :href="`/${locale}/category/static`">
                <i class="bi bi-arrow-right-circle"></i>
                <span>{{ $t("categories.main.static_ramp_label") }}</span>
            </a>
            <a :href="`/${locale}/category/station`">
                <i class="bi bi-arrow-right-circle"></i>
                <span>{{ $t("categories.main.station_ramp_label") }}</span>
            </a>
        </div>
    </div>
</template>

<style scoped>

.categories-list {
    margin-top: 10px;
    margin-bottom: 20px;
}

.service-details .service-box {
    padding: 20px;
    box-shadow: 0px 2px 20px rgba(194, 193, 193, 0.6);
}

.service-details .service-box+.service-box {
    margin-top: 30px;
}

.service-details .service-box h4 {
    font-size: 20px;
    font-weight: 700;
    border-bottom: 2px solid rgba(235, 233, 233, 0.9);
    padding-bottom: 15px;
    margin-bottom: 15px;
}

.service-details .services-list a {
    color: rgba(47, 49, 51, 0.8);
    background-color: rgba(244, 244, 244, 0.9);
    display: flex;
    align-items: center;
    padding: 12px 15px;
    margin-top: 15px;
    transition: 0.3s;
    text-decoration: none;
}

.service-details .services-list a i {
    font-size: 16px;
    margin-right: 8px;
    color: var(--accent-color);
}

.service-details .services-list a.active {
    color: #fff;
    background-color: rgba(232, 69, 69, 0.9);
}

.service-details .services-list a.active i {
    color: var(--contrast-color);
}

.service-details .services-list a:hover {
    color: #fff;
    background-color: rgba(232, 69, 69, 0.9);
}
</style>
