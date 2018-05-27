<template>
  <div>
    <create-user/>
    <b-container fluid style="padding-top:120px;">
      <b-button  v-b-modal.newUser>Crear Usuario</b-button>
       <div v-if="alert.msg != ''">
          <div class="alert-container mt-2">
              <transition enter-active-class="animated fadeInLeft">
                  <div class="alert" :class="'alert-'+alert.oper" role="alert">
                    {{alert.msg}}
                  </div>                          
              </transition>
              <div class="row pb-2">
      <b-col md="6">
        <b-input-group>
          <b-form-input v-model="filter" placeholder="Busqueda de Usuario" />
          <b-input-group-append>
            <b-btn :disabled="!filter" @click="filter = ''">Clear</b-btn>
          </b-input-group-append>
        </b-input-group>
      </b-col>
    </div>
          </div>
      </div>
      <!-- Main table element -->
      <b-table ref="table" striped hover show-empty
               stacked="md"
               :items="items"
               :fields="fields"
               :current-page="currentPage"
               :per-page="perPage"
               :filter="filter"
               :sort-by.sync="sortBy"
               :sort-desc.sync="sortDesc"
               empty-text="Cargando..."
               @filtered="onFiltered"             
      >
  <template slot="actions" slot-scope="row">
        <b-button size="sm" @click="edit(row.item,row.index)" class="mr-1 btn btn-success" title="Editar">
          <i class="far fa-edit"></i>
        </b-button>
        <b-button size="sm" @click="ModalDelete(row.item,row.index)" class="mr-1 btn btn-danger" title="Eliminar">
          <i class="far fa-trash-alt"></i>
        </b-button>
          <b-modal ref="myModalRef1" hide-footer title="Confirmar">
            <div class="d-block text-center mb-4 font-weight-bold">
              <p class="msj-alert">¿Desea realizar esta operación?</p>
            </div>
            <div class="text-center">
              <b-button type="button" @click.prevent="closeModal()" variant="danger">Cancelar</b-button>
              <b-button type="button"  @click.prevent="deleteUser(row.item,row.index)" variant="primary">Aceptar</b-button>
            </div>
        </b-modal>

       <!-- Modal -->
        <div>
            <b-modal ref="myModalRef" hide-footer :title="titlemodal">
                <div class="d-block">
                    <b-form>
                        <b-form-group id="InputGroup2" class="label-form"
                            label="Nombre:"
                            label-for="formName"
                            :state="!errors.has('name')">

                            <b-form-input id="formName" 
                                type="text"
                                name="name"
                                v-model.trim="form.name"
                                :state="!errors.has('name')"
                                placeholder="Nombre del Usuario"
                                v-validate="'required'">
                            </b-form-input>
                        </b-form-group>

                        <b-form-group id="InputGroup1" class="label-form"
                            label="Email:"
                            label-for="formEmail"
                            :state="!errors.has('email')">

                            <b-form-input id="formEmail" 
                                type="email"
                                name="email"
                                v-model.trim="form.email"
                                :state="!errors.has('email')"
                                placeholder="Correo Electronico"
                                v-validate="'required|email'">
                            </b-form-input>
                        </b-form-group>

                        <b-form-group id="InputGroup5" class="label-form"
                            label="Rol:"
                            label-for="formProfile.name"
                            :state="!errors.has('Rol')">

                          <select  class="form-control" v-model="form.profile_id">
                            <option value="">Seleccionar Rol</option>
                            <option v-for="profile in profiles" :value="profile.id" required>{{profile.name}}</option>
                        </select>
                        </b-form-group>

                        <b-form-group id="InputGroup6" class="checkbox"
                            label="Status:"
                            label-for="formStatus"
                            :state="!errors.has('Status')">

                            <b-form-checkbox id="formStatus"
                            v-model="form.status"
                            value="Activo"
                            unchecked-value="Inactivo">
                            </b-form-checkbox>
                                <div>Status: <strong>{{form.status}}</strong></div>
                            </b-form-group>
                    </b-form>
                </div>

                <b-button type="button" @click.prevent="back()" variant="danger">Cerrar</b-button>
                <b-button type="button"  @click.prevent="saveUsers(row.item,row.index)" variant="primary">Guardar</b-button>
            </b-modal>
          
        </div>
      <!-- Info modal -->
    </template>
      </b-table>
      <b-row>
        <b-col md="6" class="my-1">
          <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0" />
        </b-col>
      </b-row>

      <!-- <b-modal id="modalInfo" @hide="resetModal" :title="modalInfo.title" ok-only>
        <pre>{{ modalInfo.content }}</pre>
      </b-modal> -->
      
    </b-container>
  </div>

</template>
<style>
  .msj-alert{
    font-size: 15px;
  }
</style>
<script>
// const items = []

export default {
  data () {
    return {
        status:'',
      indexrow:null,
      titlemodal:'Crear Usuario',
      items: null,
      fields: [
        { key: 'name', label: 'Nombre del Usuario', sortable: true, 'class': 'text-center'},
        { key: 'email', label: 'Email', sortable: true, 'class': 'text-center' },
        { key: 'profile.name', label: 'Rol',sortable: true, 'class': 'text-center' },
        { key: 'status', label: 'status',sortable: true, 'class': 'text-center' },
        { key: 'actions', label: 'Actions' }
      ],
      currentPage: 1,
      perPage: 5,
      totalRows: null,
      pageOptions: [ 5, 10, 15 ],
      sortBy: null,
      sortDesc: false,
      filter: null,
      modalInfo: { title: '', content: '' },
      form: {
        email: '',
        name: '',
        profile_id: '',
        status:'',
        id:'',
        status:'',
      },alert:{
        oper:null,
        msg:null,
      },
       profiles:[],
        role_id:'',

    }
  },
  computed: {

  },
  methods: {
    getRoles(){
        let vm = this;
        axios.get('/getRoles',)
        .then(function (response) {
            vm.profiles = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });   
    },
    deleteUser(item,index){
        console.log(index);
        var obj={};
        obj.iduser=this.iduser;
        var slf=this;
        axios.post('api/deleteUser/'+item.id)
        .then((res) => {
            alert(res.data.message)
            slf.$refs.myModalRef1.hide();
            this.items.splice(index,1)
         
        })   
        .catch((error)=>{
            console.log(error)
      })
    },
    ModalDelete(item){
      this.iduser=item.id;
      this.$refs.myModalRef1.show();
    },
    closeModal(){
      this.$refs.myModalRef1.hide();
    },
    resetInputs(){
      this.form.id=null;
      this.form.name=null;
      this.form.email=null;
      this.form.profile=null;
      this.form.status=null;
    },
    back() {
    this.resetInputs();
    this.errors.clear();
    this.$refs.myModalRef.hide();
    },
    onFiltered (filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length
      this.currentPage = 1
    },listUsers() { //ctx
        let slf=this;
        axios.get('api/listUsers').then((res)=>{
              if (res.status == 200)  {
                  slf.totalRows= res.data.data.length;
                  slf.items=res.data.data; 
                  return(slf.items)
              }
          })
          .catch((error)=>{
              
          })
   },edit(item,index){
        this.indexrow=index;
        this.titlemodal="Modificar Usuario";
        //console.log(item);
        this.form.id=item.id;
        this.form.name=item.name;
        this.form.email=item.email;
        this.form.profile_id = item.profile_id;
        this.form.status=item.status;
        this.$refs.myModalRef.show();
    },saveUsers(item,index){
   
          var slf = this;
          axios.post('api/editUser/'+item.id, {
            name:this.form.name,
            email:this.form.email,
            status:this.form.status,
            profile_id:this.form.profile_id
          })
            .then((res)=>{
                slf.$refs.myModalRef.hide();
                alert(res.data.message)
                slf.items.splice(index,1,res.data.data)
            })
            .catch((error)=>{
                console.log(error)
            })
     },
    modalUser(){
      this.errors.clear();
      this.$refs.myModalRef.show();
    }
  },
  mounted () {
    this.listUsers();
    this.getRoles();
  },

    close(){
        this.$refs.newUser.hide()
    }
}
</script>
