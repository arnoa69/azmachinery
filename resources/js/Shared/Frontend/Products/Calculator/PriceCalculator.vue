<script setup>
import { ref, computed, onMounted, watch } from "vue";
import generateUrl from '@/utils/urlHelper';
import { useI18n } from 'vue-i18n';
import { Inertia } from '@inertiajs/inertia';

const { locale, t } = useI18n();

const props = defineProps({
    baseName: {
        type: String,
        required: true,
    },
    slug: {
        type: String,
    },
    price: {
        type: String,
    },
    version: {
        type: String,
    },
    type: {
        type: String,
    },
});

// Import your mobileRamps data
const mobileRampsData = ref({
    star: {
        standard: { '8t': 12950, '10t': 13450, '12t': 14250, '15t': 15250, '20t': 16950 },
        xl: { '8t': 15250, '10t': 15750, '12t': 16950, '15t': 17950, '20t': 19750 },
        llo: { '8t': 18550, '10t': 18950, '12t': 19950, '15t': 20450, '20t': 22250 },
        lloxl: { '8t': 20750, '10t': 21250, '12t': 22050, '15t': 23050, '20t': 24750 },
    },
    'easy-xl': {
        standard: { '8t': 13450, '10t': 14450, '12t': 15450, '15t': 16950, '20t': 17950 },
    },
    wlo: {
        standard: { '8t': 6750, '10t': 7250, '12t': 7750 },
    },
    'prime-xs': {
        standard: { '6t': 9750, '8t': 10250, '10t': 10950 },
    },
    'star-otc': {
        standard: { '8t': 15750, '10t': 16750, '12t': 17750 },
    },
    'big-foot': {
        standard: { '15t': 20750, '20t': 21750, '25t': 22950 },
    },
});

const optionsData = ref({
    zr: { label: t('request-box.security-zone'), price: 500 },
    rl1200: { label: t('request-box.rl1200'), price: 1000 },
    rl1200p: { label: t('request-box.rl1200p'), price: 500 },
    rl350: { label: t('request-box.rl350'), price: 500 },
    le: { label: t('request-box.le'), price: 2000 },
    be: { label: t('request-box.be'), price: 3500 },
    ff: { label: t('request-box.ff'), price: 750 },
    ffd: { label: t('request-box.ffd'), price: 1500 },
    tt: { label: t('request-box.tt'), price: 750 },
    gan: { label: t('request-box.gan'), price: 3000 },
    gap: { label: t('request-box.gap'), price: 1500 },
    gab: { label: t('request-box.gab'), price: 5700 },
    gao: { label: t('request-box.gao'), price: 3500 },
    tb: { label: t('request-box.tb'), price: 4250 },
});

// Option Groups
const optionGroups = ref({
    'star': ['zr', 'rl1200', 'le', 'be', 'ff', 'gan'],
    'easy-xl': ['rl1200', 'le', 'ff', 'tt', 'tb', 'gan'],
    'wlo': ['rl1200', 'be', 'ff', 'tt', 'tb', 'gan'],
    'prime-xs': ['rl1200p', 'be', 'ff', 'tt', 'gap'],
    'star-otc': ['le', 'ff', 'gao', 'tb'],
    'big-foot': ['rl350', 'rl1200', 'ffd', 'gab'],
});

// Reactive properties for form fields
const selectedVersion = ref('');
const selectedWeightCapacity = ref('');
const selectedOptions = ref([]);

const availableVersions = computed(() => {
    return mobileRampsData.value[props.baseName] || {};
});

const availableWeightCapacities = computed(() => {
    return availableVersions.value[selectedVersion.value] || {};
});

// Filter options based on the selected baseName
const availableOptions = computed(() => {
    const availableKeys = optionGroups.value[props.baseName] || [];
    return Object.fromEntries(
        Object.entries(optionsData.value).filter(([key]) => availableKeys.includes(key))
    );
});

const generateOrderedOptions = (selectedOptions) => {
    const orderMap = {
        star: {
            zr: 0,
            rl1200: 1,
            le: 2,
            be: 3,
            ff: 4,
            gan: 5,
        },
        'easy-xl': {
            rl1200: 0,
            le: 1,
            ff: 2,
            tt: 3,
            tb: 4,
            gan: 5,
        },
        wlo: {
            rl1200: 0,
            be: 1,
            ff: 2,
            tt: 3,
            tb: 4,
            gan: 5,
        },
        'prime-xs': {
            rl1200p: 0,
            be: 1,
            ff: 2,
            tt: 3,
            gap: 4,
        },
        'star-otc': {
            le: 0,
            ff: 1,
            gao: 2,
            tb: 3,
        },
        'big-foot': {
            rl350: 0,
            rl1200: 1,
            ffd: 2,
            gab: 3,
        },
    };

    // Holen Sie sich die spezifische Reihenfolge für den aktuellen baseName
    const currentOrder = orderMap[props.baseName] || {};

    // Sortieren Sie die Optionen basierend auf der spezifischen Reihenfolge
    const sortedOptions = selectedOptions.sort((a, b) => {
        const aOrder = currentOrder[a] !== undefined ? currentOrder[a] : Infinity;
        const bOrder = currentOrder[b] !== undefined ? currentOrder[b] : Infinity;
        return aOrder - bOrder;
    });

    return sortedOptions;
};


const generatedSlug = computed(() => {
    if (selectedOptions.value.length === 0) {
        return `az-ramp-${props.baseName}-${selectedWeightCapacity.value}-${selectedVersion.value}`;
    }
    // Verwenden Sie die neue Funktion, um die Optionen zu sortieren
    const orderedOptions = generateOrderedOptions(selectedOptions.value);
    const optionsArray = orderedOptions.join('-');

    return `az-ramp-${props.baseName}-${selectedWeightCapacity.value}-${selectedVersion.value}-${optionsArray}`;
});


const initializeForm = () => {
    if (!props.slug) return;

    const regex = /(\d+t)-(.*)/;
    const match = props.slug.match(regex);

    if (match) {
        const [_, weightCapacity, rest] = match;
        const [version, ...options] = rest.split('-');
        selectedWeightCapacity.value = weightCapacity;
        selectedVersion.value = version;
        selectedOptions.value = options;
    }
};

onMounted(() => {
    initializeForm(props.slug);
});


const handleChange = (key) => {
    const selectedVersion = document.getElementById('version');
    const selectedWeightCapacity = document.getElementById('weightCapacity').value;
    if (props.baseName === 'big-foot') {
        // Wenn rl1200 ausgewählt wird und rl350 bereits ausgewählt ist
        if (key === 'rl1200' && selectedOptions.value.includes('rl350')) {
            // Entferne rl350 aus den ausgewählten Optionen
            selectedOptions.value = selectedOptions.value.filter(option => option !== 'rl350');
        }
        // Wenn rl350 ausgewählt wird und rl1200 bereits ausgewählt ist
        else if (key === 'rl350' && selectedOptions.value.includes('rl1200')) {
            // Entferne rl1200 aus den ausgewählten Optionen
            selectedOptions.value = selectedOptions.value.filter(option => option !== 'rl1200');
        }
    }

    // Generiere die neue URL
    const newUrl = generateUrl(generatedSlug.value, selectedVersion.value, props.type, locale.value);

    // Verwende Inertia, um zur neuen URL zu navigieren
    Inertia.visit(newUrl, {
        preserveState: true, // Behalte den aktuellen Zustand
        preserveScroll: true // Behalte die Scroll-Position
    });
};

</script>

<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="flex-grow-1">
                <span class="fw-bold">{{ baseName }} {{ selectedVersion }}</span>
            </div>
            <span class="description fw-bold">{{ price }}€</span>
        </div>
        <div class="card-body">
            <form @submit.prevent="submitForm">
                <div class="row">
                    <div class="col-6" >
                        <label for="version" class="form-label">{{ $t( 'request-box.versionlabel' )}}</label>
                        <select id="version" class="form-select" v-model="selectedVersion"
                            :disabled="!Object.keys(availableVersions).length" @change="handleChange">
                            <option value="">{{ $t( 'request-box.choose-version' )}}</option>
                            <option v-for="(value, key) in availableVersions" :key="key" :value="key">{{ key }}</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="weightCapacity" class="form-label">{{ $t( 'request-box.capacitylabel' )}}</label>
                        <select id="weightCapacity" class="form-select" v-model="selectedWeightCapacity"
                            :disabled="!Object.keys(availableWeightCapacities).length" @change="handleChange">
                            <option value="">{{ $t( 'request-box.choose-capacity' )}}</option>
                            <option v-for="(capacity, key) in availableWeightCapacities" :key="key" :value="key">{{ key }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="weightCapacity" class="form-label">{{ $t( 'request-box.optionen' )}}</label>
                    <div class="col-12">
                        <!-- Check if there are any options available -->
                        <template v-if="Object.keys(availableOptions).length > 0">
                        <div v-for="(optionData, key) in availableOptions" :key="key">
                            <input type="checkbox" :id="`option-${key}`" :value="key" v-model="selectedOptions"
                                :checked="selectedOptions.includes(key)"
                                @change="handleChange(key)">
                            <label :for="`option-${key}`">{{ optionData.label }} ({{ optionData.price }}€)</label>
                        </div>
                        </template>
                        <!-- If no options are available -->
                        <div v-else>
                            {{ $t( 'request-box.no-option' )}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>

.card {
  border: none;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(232, 47, 47, 0.3);
  min-height: 400px;
}

.card-header {
  background-color: #424242;
  color: #FFFFFF;
  border-radius: 20px 20px 0 0;
  padding: 20px;
  position: relative;
  background-image: linear-gradient(to bottom, #424242, #161519);
  background-size: 100% 100%;
}

.card-header .fw-bold {
  font-size: 24px;
  font-weight: bold;
  color: #FFFFFF;
}

.card-header .description {
  font-size: 18px;
  font-weight: normal;
  color: #FFFFFF;
  position: absolute;
  top: 20px;
  right: 20px;
  background-color: #FF3737;
  padding: 5px 10px;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.card-body {
  background-color: #FFFFFF;
  border-radius: 0 0 20px 20px;
  padding: 20px;
  margin-top: 5px;
}

.card-body label {
  font-size: 14px;
  color: #666666;
}

.card-body input[type="checkbox"] {
  margin-right: 10px;
}

.card-body label img {
  width: 20px;
  height: 20px;
  margin-right: 10px;
  border-radius: 50%;
}

/* add a dummy picture to the checkbox label */
.card-body label img.dummy-picture {
  background-color: #CCCCCC;
  border: none;
  padding: 5px;
}

@media (max-width: 768px) {
    .card-header .fw-bold {
        font-size: 14px;
        font-weight: bold;
        color: #FFFFFF;
    }
}
</style>
