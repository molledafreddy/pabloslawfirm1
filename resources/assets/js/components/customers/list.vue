<template>
  <b-container fluid style="padding-top:120px;">
    <div class="row pb-2">
      <b-col md="6">
        <b-input-group>
          <b-form-input v-model="filter" placeholder="Cliente" />
          <b-input-group-append>
            <b-btn :disabled="!filter"  @click="filter = ''">Clear</b-btn>
          </b-input-group-append>
        </b-input-group>
      </b-col>
    </div>
    <b-row>
        <b-col md="6">
           <b-button @click="modalClient">Crear Cliente</b-button>
        </b-col> 
    </b-row> 
     <div v-if="alert.msg != ''">
        <div class="alert-container mt-2">
            <transition enter-active-class="animated fadeInLeft">
                <div class="alert" :class="'alert-'+alert.oper" role="alert">
                  {{alert.msg}}
                </div>                          
            </transition>
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
        <b-button size="sm" @click="ModalDelete(row.item)" class="mr-1 btn btn-danger" title="Eliminar">
          <i class="far fa-trash-alt"></i>
        </b-button>
      </template>
    </b-table>
    <b-row>
      <b-col sm="12" >
        <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="d-flex justify-content-center my-0" />
      </b-col>
    </b-row>
     
     <!-- Modal -->
     <div>
        <b-modal ref="myModalRef" hide-footer :title="titlemodal" hide-header-close>
          <div class="d-block">
            <b-form>
              <b-form-group id="InputGroup2" class="label-form"
                            label="Nombre:"
                            label-for="formName"
                            :state="!errors.has('name')"
                            >
                <b-form-input id="formName" 
                              type="text"
                              name="name"
                              v-model.trim="form.name"
                              :state="!errors.has('name')"
                              placeholder="Nombre del Cliente"
                               v-validate="'required'">
                </b-form-input>
              </b-form-group>
               <b-form-group id="InputGroup1" class="label-form"
                            label="Email:"
                            label-for="formEmail"
                            :state="!errors.has('email')"
                            >
                <b-form-input id="formEmail" 
                              type="email"
                              name="email"
                              v-model.trim="form.email"
                              :state="!errors.has('email')"
                              placeholder="Correo Electronico"
                               v-validate="'required|email'">
                </b-form-input>
              </b-form-group>
              <b-form-group id="InputGroup3" class="label-form"
                            label="Telefono:"
                            label-for="formPhone"
                            :state="!errors.has('phone')"
                            >

                <input id="formPhone" v-validate="'required'" v-model.trim="form.phone" name="phone" type="text" placeholder="(__)__.__.__" :class="{'form-control': true, 'is-invalid': errors.has('phone'),'is-valid':!errors.has('phone')}"  v-mask="'(##) ####-#####'" >

                </b-form-input>
              </b-form-group>
              <b-form-group id="InputGroup4" class="label-form"
                            label="Direccion:"
                            label-for="formAddress"
                            :state="!errors.has('address')"
                            >
                  <b-form-textarea id="textarea1"
                                   name="address"
                                   v-model.trim="form.address"
                                   placeholder="Enter something"
                                   :rows="3"
                                   :max-rows="6"
                                   :state="!errors.has('address')"
                                    v-validate="'required'">
                  </b-form-textarea>
              </b-form-group>
            </b-form>
          </div>
          <b-button type="button" @click.prevent="back()" variant="danger">Cerrar</b-button>
          <b-button type="button"  @click.prevent="saveClient()" variant="primary">Guardar</b-button>
        </b-modal>
        <b-modal ref="myModalRef1" hide-footer title="Confirmar">
            <div class="d-block text-center mb-4 font-weight-bold">
              <p class="msj-alert">¿Desea realizar esta operación?</p>
            </div>
            <div class="text-center">
              <b-button type="button" @click.prevent="closeModal()" variant="danger">Cancelar</b-button>
              <b-button type="button"  @click.prevent="DeleteClient()" variant="primary">Aceptar</b-button>
            </div>
        </b-modal>
      </div>
    <!-- Info modal -->
    <!-- <b-modal id="modalInfo" @hide="resetModal" :title="modalInfo.title" ok-only>
      <pre>{{ modalInfo.content }}</pre>
    </b-modal> -->
    
  </b-container>
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
      form_test:{
        email: null,
        name: null,
        phone: null,
        id:null,
        address:null,
      },
      indexrow:null,
      idclient:null,
      titlemodal:'Crear Cliente',
      items: null,
      fields: [
        { key: 'name', label: 'Nombre del Cliente', sortable: true },
        { key: 'email', label: 'Email', sortable: true, 'class': 'text-center' },
        { key: 'phone', label: 'Telefono',sortable: true, 'class': 'text-center' },
        { key: 'address', label: 'Direccion',sortable: true, 'class': 'text-center' },
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
        email: null,
        name: null,
        phone: null,
        id:null,
        address:null,
      },alert:{
        oper:null,
        msg:null,
      }
    }
  },
  computed: {
  },
  methods: {
    DeleteClient(){
      var obj={};
      obj.idclient=this.idclient;
      var slf=this;
      axios.post('api/deleteClient',obj).then((res)=>{
          slf.alert.oper=res.data.alert;
          slf.alert.msg=res.data.msg;
          setTimeout(function(){
               slf.alert.oper=null;
               slf.alert.msg=null;
          },2500);   
          if (res.status == 200)  {
            for(var i in slf.items){
              if(parseInt(slf.items[i].id)==parseInt(slf.idclient)){
                 Vue.delete(slf.items,i);
                 slf.$refs.myModalRef1.hide();
                 break;
              }
            }              
          }
      })
      .catch((error)=>{
          
      })
    },
    ModalDelete(item){
      this.idclient=item.id;
      this.$refs.myModalRef1.show();
    },
    closeModal(){
      this.$refs.myModalRef1.hide();
    },
    resetInputs(){
      this.form.id=null;
      this.form.name=null;
      this.form.email=null;
      this.form.phone=null;
      this.form.address=null;
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
    },listClients() { //ctx
        let slf=this;
        axios.get('api/listClient').then((res)=>{
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
        this.titlemodal="Modificar Cliente";
        this.form.id=item.id;
        this.form.name=item.name;
        this.form.email=item.email;
        this.form.phone=item.phone;
        this.form.address=item.address;
        this.$refs.myModalRef.show();
    },saveClient(){
      this.$validator.validateAll().then((result) => {
        if(result){
          var slf = this;
          axios.post('api/editClient', this.form).then((res)=>{
                slf.form_test.name=slf.form.name;
                slf.form_test.email=slf.form.email;
                slf.form_test.phone=slf.form.phone;
                slf.form_test.address=slf.form.address;
                slf.alert.oper=res.data.alert;
                if (res.status == 200)  {                    
                    slf.alert.msg=res.data.msg;
                    if(res.data.oper=="update"){
                      Vue.set(slf.items[slf.indexrow], 'name', slf.form.name);
                      Vue.set(slf.items[slf.indexrow], 'email', slf.form.email);
                      Vue.set(slf.items[slf.indexrow], 'phone', slf.form.phone);
                      Vue.set(slf.items[slf.indexrow], 'address', slf.form.address);
                      slf.back();
                    }
                    if(res.data.oper=="insert"){
                      var val=[];
                      val.push(slf.form_test);
                      for(var a in slf.items){
                         val.push(slf.items[a]); 
                      } 
                      slf.items.length=0;
                      slf.items=val;
                      slf.back();
                    }                 
                }
                setTimeout(function(){
                    slf.alert.oper=null;
                    slf.alert.msg=null;
                },2500); 
            })
            .catch((error)=>{
                
            })
        }
      }).catch(() => {console.log('error form')});
    },modalClient(){
      this.errors.clear();
      this.$refs.myModalRef.show();
    }
  },mounted () {
    this.listClients();
  }
}
</script>
