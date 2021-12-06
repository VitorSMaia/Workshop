<template>
<div>
    <div class="container">
        <b-button v-b-modal.modal-add-serviceOrder>Add ServiceOrder</b-button>
    </div>
    <!-- Modal Insert Service Order -->
    <div>
        <b-modal
            id="modal-add-serviceOrder"
            title="ServiceOrder"
            ref="modal"
            @show="resetModal"
            @hidden="resetModal"
            @ok="handleOk"
        >
            <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group
                label="Title"
                label-for="title-input"
                invalid-feedback="Title is required"
                :state="titleState"
                >
                    <b-form-input
                        id="title-input"
                        v-model="title"
                        :state="titleState"
                        required
                    >
                    </b-form-input>
                </b-form-group>
                <b-form-group
                label="Description"
                label-for="description-input"
                invalid-feedback="Description is required"
                :state="descriptionState"
                >
                    <b-form-textarea
                        id="description-input"
                        v-model="description"
                        :state="descriptionState"
                        required
                    >
                    </b-form-textarea>
                </b-form-group>
                <b-form-group
                label="Mark"
                label-for="mark-input"
                invalid-feedback="Mark is required"
                :state="markState"
                >
                <b-form-select v-model="mark" required :state="markState" :options="options"></b-form-select>
                </b-form-group>
                <b-form-group
                label="Model"
                label-for="model-input"
                invalid-feedback="Model is required"
                :state="mdelState"
                >
                <b-form-select v-model="model" required :state="modelState" :options="options"></b-form-select>
                </b-form-group>
                <b-form-group
                label="Producer"
                label-for="producer-input"
                invalid-feedback="Producer is required"
                :state="producerState"
                >
                <b-form-select v-model="producer" required :state="producerState" :options="options"></b-form-select>
                </b-form-group>
                <b-form-group
                label="Parts"
                label-for="part-input"
                invalid-feedback="Parts is required"
                :state="partState"
                >
                <b-form-checkbox-group
                    id="checkbox-group-1"
                    v-model="selectedCheck"
                    :options="optionsCheck"
                    :aria-describedby="ariaDescribedby"
                    :state="partState"
                    name="flavour-1"
                ></b-form-checkbox-group>
                </b-form-group>
            </form>
        </b-modal>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                title: '',
                titleState: null,
                submittedNames: [],
                description: '',
                descriptionState: null,
                mark: null,
                markState: null,
                model: null,
                modelState: null,
                producer: null,
                producerState: null,
                options: [
                    { value: null, text: 'Please select an option' },
                    { value: 'a', text: 'This is First option' },
                    { value: 'b', text: 'Selected Option' },
                    { value: { C: '3PO' }, text: 'This is an option with object value' },
                    { value: 'd', text: 'This one is disabled', disabled: true }
                ],
                optionsCheck: [
                    { text: 'Orange', value: 'orange' },
                    { text: 'Apple', value: 'apple' },
                    { text: 'Pineapple', value: 'pineapple' },
                    { text: 'Grape', value: 'grape' }
                ]
            }
        },
        methods: {
            checkFormValidity() {
                const valid = this.$refs.form.checkValidity()
                this.titleState = valid
                this.descriptionState = valid
                this.markState = valid
                this.modelState = valid
                this.producerState = valid
                this.partState = valid
                return valid
            },
            resetModal() {
                this.title = ''
                this.titleState = null
                this.description = ''
                this.descriptionState = null
                this.mark = null,
                this.markState = null,
                this.model = null,
                this.modelState = null,
                this.producer = null,
                this.producerState = null,
                this.selectedCheck = null
            },
            handleOk(bvModalEvt) {
                // Prevent modal from closing
                bvModalEvt.preventDefault()
                // Trigger submit handler
                this.handleSubmit()
            },
            handleSubmit() {
                // Exit when the form isn't valid
                if (!this.checkFormValidity()) {
                return
                }
                // Push the name to submitted names
                this.submittedNames.push(this.name)
                // Hide the modal manually
                this.$nextTick(() => {
                this.$bvModal.hide('modal-prevent-closing')
                })
            }
        }
    }
</script>
