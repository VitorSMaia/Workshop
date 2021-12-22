<template>
<div>
    <div class="container">
        <b-button v-b-modal.modal-add-model>Add Model</b-button>
    </div>
    <div class="container">
        <a>{{ submittedNames }}</a>
    </div>
    <!-- Modal Insert Service Order -->
    <div>
        <b-modal
            id="modal-add-model"
            title="Model"
            ref="modal"
            @show="resetModal"
            @hidden="resetModal"
            @ok="handleOk"
        >
            <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group
                label="Description"
                label-for="description-input"
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
                    {{ errors[0] }}
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
                errors: '',
                title: '',
                titleState: null,
                submittedNames: [
                    {
                    }
                ],
            }
        },
        methods: {
            checkFormValidity(e) {
                this.errors = [];
                if(!this.title)
                    this.errors.push("Title required.");
                if(!this.description)
                    this.errors.push("Description required.");

                if(this.title != '' && this.description != '')
                {
                    this.errors = '';
                    return true;
                }
                e.preventDefault();
            },
            resetModal() {
                this.title = ''
                this.titleState = null
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
                this.submittedNames.push(
                    {
                        'title':this.title
                    }
                )
                // Hide the modal manually
                this.$nextTick(() => {
                    this.$bvModal.hide('modal-add-serviceOrder')
                })
            }
        }
    }
</script>
