<template>
    <DefaultField
        :field="field"
        :errors="errors"
        :show-help-text="showHelpText"
        :full-width-content="fullWidthContent">

        <template #field>
            <div v-if="this.field.form_toggle !== undefined && !this.field.form_toggle" :class="this.field.toggle_align">
                <span v-show="Number(field.value) === 1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24"
                        height="24" class="inline-block text-green-500" role="presentation">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                </span>
                <span v-show="Number(field.value) === 0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24"
                        height="24" class="inline-block text-red-500" role="presentation">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                </span>
            </div>

            <div v-if="this.field.form_toggle === undefined || this.field.form_toggle">
                <input
                    :id="field.attribute"
                    type="checkbox"
                    :class="'custom-color'"
                    :style.checked="this.field.color ? 'color:' +  this.field.color :  'color:#3AB95A;'"
                    :placeholder="field.name"
                    v-model="value"
                    v-bind:true-value="1" v-bind:false-value="0"
                />
            </div>
        </template>
    </DefaultField>
</template>

<script>
import {FormField, HandlesValidationErrors} from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],
    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */

        setInitialValue() {
            var field_value = false;
            if (this.field.value === '1' || this.field.value === 1 || this.field.value === true){
                field_value = 1;
            } else{
                field_value = 0;
            }
            this.value = field_value || 0
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            var field_value = false;
            if (this.value === '1' || this.value === 1 || this.value === true){
                field_value = 1;
            } else{
                field_value = 0;
            }

            formData.append(this.fieldAttribute, field_value || 0)
        },

    },
}
</script>
