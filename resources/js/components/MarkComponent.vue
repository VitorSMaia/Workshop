<template>
<div>
    <div class="container">
        <b-button v-b-modal.modal-add-mark>Add Mark</b-button>
    </div>
    <div class="container">
        <a>{{ submittedNames }}</a>
    </div>
  <div>
    <b-table striped hover :items="listMark" :fields="listfields">
        <template v-slot:cell(actions)="listMark">
			<b-button size="sm" class="mr-2" variant="info" v-on:click="editarMark(listMark.item.id)">Editar</b-button>
			<b-button size="sm" variant="danger" v-on:click="excluir(listMark.id)">Excluir</b-button>
		</template>
    </b-table>
  </div>
    <!-- Modal Insert Service Order -->
    <div>
        <b-modal
            id="modal-add-mark"
            title="Mark"
            ref="modal"
            @show="resetModal"
            @hidden="resetModal"
            @ok="handleOk"
        >
            <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group
                label="Description"
                label-for="description-input"
                invalid-feedback="Description is required"
                :state="descriptionState"
                >
                    <b-form-input
                        id="description-input"
                        v-model="description"
                        :state="descriptionState"
                        required
                    >
                    </b-form-input>
                    {{ errors[0] }}
                </b-form-group>
            </form>
        </b-modal>
    </div>
    <!-- Modal Edit Service Order -->
    <div>
        <b-modal
            id="modal-edit-mark"
            title="Edit Mark"
            ref="modal"
            @show="resetModal"
            @hidden="resetModal"
            @ok="handleOk"
        >
            <form ref="form" @submit.stop.prevent="handleSubmit">
                <b-form-group
                label="Description"
                label-for="description-input"
                invalid-feedback="Description is required"
                :state="descriptionState"
                >
                    <b-form-input
                        id="description-input"
                        v-model="description"
                        :state="descriptionState"
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
        data()
        {
            return {
                errors: '',
                description: '',
                descriptionState: null,
                listMark: [],
                submittedNames: [
                ],
                listfields: [
                    {
                        key: 'id',
                        label: '#',
                        sortable: false
                    },
                    {
                        key: 'descricao',
                        label: 'Descrição'
                    },
                    {
                        key: 'created_at',
                        label: 'Criado'
                    },
                    {
                        key: 'updated_at',
                        label: 'Atualizado'
                    },
                    {
                        key: 'actions',
                        label: 'Ações'
                    }
                ],
            }
        },
        methods: {
            getMark(){
                axios.get('/mark/all')
                     .then((response)=>{
                       this.listMark = response.data
                     })
            },
            postMark(desc){
                axios.post('/mark', {
                    'description': desc
                })
                .then(function (response) {
                    desc = response.data;
                })
                .catch(function (error) {
                    desc = error;
                })
            },
            // +++++++++++++++++ Add Modal 
            checkFormValidity(e) {
                this.errors = [];
                if(!this.description)
                    this.errors.push("Description required.");

                if(this.description != '')
                {
                    this.errors = '';
                    return true;
                }
                e.preventDefault();
            },
            resetModal() {
                this.description = ''
                this.descriptionState = null
                this.errors = []
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
                this.postMark(this.description)
                // Push the name to submitted names
                this.submittedNames.push(
                    {
                        'description':this.description
                    }
                )
                // Hide the modal manually
                this.$nextTick(() => {
                    this.$bvModal.hide('modal-add-mark')
                })
            },
            // +++++++++++++++++ Add Modal 
            // +++++++++++++++++ Add Modal 
            editarMark(id)
            {
                this.$bvModal.show("modal-edit-mark")

                function isCherries(id) {
                    return id === this.listMark.id;
                }
                console.log(this.listMark.find(isCherries))
                console.log(id)
                // document.getElementById("description-input").value = "Johnny Bravo";

            }
        },
        created() {
            this.getMark()
        }
    }
</script>
