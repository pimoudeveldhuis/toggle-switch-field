<template>
    <div v-if="this.field.index_toggle !== undefined && !this.field.index_toggle" :class="this.field.toggle_align">
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
    <div v-if="this.field.index_toggle === undefined || this.field.index_toggle" :class="this.field.toggle_align">
        <input
            :id="field.attribute"
            type="checkbox"
            :class="'custom-color'"
            :style.checked="this.field.color ? 'color:' +  this.field.color :  'color:#3AB95A;'"
            :placeholder="field.name"
            v-model="new_value"
            v-bind:true-value="1" v-bind:false-value="0"
            :checked="field.value"
            @click="toggle"
        />
    </div>

</template>

<script>
export default {
    props: ['resource', 'resourceName', 'field'],
    data() {
        return {
            new_value: this.field.value,
        };
    },
    computed: {
        fieldValue() {
            return this.field.displayedAs || this.field.value
        },
    },
    methods: {
        toggle(event) {
            event.stopPropagation();

            var data = {
                'resource_id': this.resource.id.value,
                'resource_name': this.resourceName,
                'old_value': this.field.value,
                'new_value': !this.new_value,
                'resource': this.resource
            }
            Nova.request().post('/pimoudeveldhuis/toggle-switch-field/update-toggle', data)
                .then(function (response) {

                }.bind(this))
                .catch(function (error) {
                    Nova.error(error);
                }.bind(this));
        },
    }

}
</script>
