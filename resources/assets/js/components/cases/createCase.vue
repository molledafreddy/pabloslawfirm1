<template>
    <div>
    <section id="createCase" class="zona-3">
        <div class="container pt-5">
            <div class="py-5" >
                    <H2><strong>Crear caso</strong></H2>
            </div>
            <div v-if="alert.msg != ''">
              <div class="alert-container mt-2">
                  <transition enter-active-class="animated fadeInLeft">
                      <div class="alert" :class="'alert-'+alert.oper" role="alert">
                        {{alert.msg}}
                      </div>                          
                  </transition>
              </div>
            </div>
            <template >
              <b-row class="justify-content-center">
                <div class="card">
                  <div class="card-body">
                	 <div class="d-block pt-3">
                    <b-form class="row">
                      <h3><strong class="ml-3">Datos cliente</strong></h3>
                      <hr style="color: #0056b2;" size="30" class="label-form col-lg-9" />
                    	<b-form-group id="InputGroup1" class="label-form col-lg-4"
                                  label="Id cliente:"
                                  label-for="formID"
                                  :state="!errors.has('id')"
                                  >
                      <b-form-input id="formName" 
                                    type="text"
                                    name="id"
                                    v-model.trim="form.id"
                                    :state="!errors.has('id')"
                                    placeholder="Id del Cliente"
                                    v-validate="'required'"
                                    disabled>
                      </b-form-input>
                      </b-form-group>
                      <b-form-group id="InputGroup2" class="label-form col-lg-5">
                      	<b-button class="mt-4" type="button" @click.prevent="modalClient" variant="info">Buscar</b-button>
                      </b-form-group>
                      <b-form-group id="InputGroup2" class="label-form col-lg-4"
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
                                     v-validate="'required'"
                                     disabled>
                      </b-form-input>
                      </b-form-group>
                     <b-form-group id="InputGroup3" class="label-form col-lg-4"
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
                                    v-validate="'required|email'"
                                    disabled>
                      </b-form-input>
                    </b-form-group>
                    <b-form-group id="InputGroup4" class="label-form col-lg-4"
                                  label="Telefono:"
                                  label-for="formPhone"
                                  :state="!errors.has('phone')"
                                  >

                      <input id="formPhone" v-validate="'required'" v-model.trim="form.phone" name="phone" type="text"  :class="{'form-control': true, 'is-invalid': errors.has('phone'),'is-valid':!errors.has('phone')}"  
                      disabled>

                      </b-form-input>
                    </b-form-group>
                    <b-form-group id="InputGroup4" class="label-form col-lg-12"
                                  label="Direccion:"
                                  label-for="formAddress"
                                  :state="!errors.has('address')"
                                  >
                        <b-form-textarea id="textarea1"
                                         name="address"
                                         v-model.trim="form.address"
                                         placeholder="Enter something"
                                         :rows="1"
                                         :max-rows="3"
                                         :state="!errors.has('address')"
                                         v-validate="'required'"
                                         disabled>
                        </b-form-textarea>
                    </b-form-group>
                    <h3><strong class="ml-3">Datos caso</strong></h3>
                      <hr style="color: #0056b2;" class="label-form col-lg-9" />
                      <b-form-group id="InputGroup4" class="label-form col-lg-12"
                                  label="Descripcion:"
                                  label-for="formDescription"
                                  :state="!errors.has('description')"
                                  >
                        <b-form-textarea id="textarea1"
                                         name="description"
                                         v-model.trim="form.description"
                                         placeholder="Enter something"
                                         :rows="3"
                                         :max-rows="6"
                                         :state="!errors.has('description')"
                                          v-validate="'required'">
                        </b-form-textarea>
                      </b-form-group>
                      <b-form-group id="InputGroup4" class="label-form col-lg-4"
                                  label="Estatus:"
                                  label-for="formStatus"
                                  :state="!errors.has('status')"
                                  >
                        <b-form-select v-model="form.status_id" :options="optionStatus" class="mb-3" />
                      </b-form-group>
                      <b-form-group id="InputGroup4" class="label-form col-lg-4"
                                  label="Abogados:"
                                  label-for="formLawyers"
                                  :state="!errors.has('Lawyers')"
                                  >
                        <b-form-select v-model="form.lawyer" :options="optionLawyers" class="mb-3" />                        
                      </b-form-group>
                      <b-form-group id="InputGroup4" class="label-form col-lg-4"
                                  label="Fecha del caso:"
                                  label-for="formDate"
                                  :state="!errors.has('date_created')"
                                  >
                        <date-picker :date="startTime" :option="option" ></date-picker>                       
                      </b-form-group>
                     
                  </b-form>
              </div>
              <b-button type="button" @click.prevent="back()" variant="danger">Cerrar</b-button>
              <b-button type="button"  @click.prevent="saveCase()" variant="primary">Guardar</b-button>
            </div>
            </div> 
          </b-row>           
            </template>
        </div>
        <!-- Modal -->
     <div>
        <b-modal ref="myModalRef" hide-footer :title="titlemodal" hide-header-close>
          <div class="d-block">
            <div class="chat-search">
                <input class="form-control" type="text" placeholder="Buscar un usuario..." v-model="name" >   
            </div>
            <!-- </b-col> -->              
            <b-form>
              <template v-if="name!=''">
                <b-list-group>
                  <div v-for="(client, index) in searchClients">
                      <b-list-group-item href="#some-link" v-on:click="getClient(client.id)">
                        <strong >Nombre:</strong>{{client.name}} <strong> Correo:</strong>{{client.email}} <strong> Telef:</strong>{{client.phone}}
                      </b-list-group-item>                      
                  </div>
                  <!-- <b-list-group-item href="#" active>Link with active state</b-list-group-item>                   -->
                </b-list-group>                
              </template>
            </b-form>
          </div>
          <b-button type="button" @click.prevent="back()" variant="danger">Cerrar</b-button>
          <b-button type="button"  @click.prevent="selectClient()" variant="primary">Seleccionar</b-button>
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
        </section>
    </div>
</template>

<style>
  .msj-alert{
    font-size: 15px;
  }
</style>

<script>
let marked = require('marked');
import myDatepicker from 'vue-datepicker'
    export default{
        props:['component'],
        data(){
            return{
              startTime: {
                time: ''
              },
              endtime: {
                time: ''
              },
              
        option: {
          type: 'day',
          week: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
          month: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          format: 'YYYY-MM-DD',
          placeholder: 'when?',
          inputStyle: {
            'display': 'inline-block',
            'padding': '6px',
            'line-height': '22px',
            'font-size': '16px',
            'border': '4px solid #fff',
            'box-shadow': '0 1px 3px 0 rgba(0, 0, 0, 0.2)',
            'border-radius': '2px',
            'color': '#5F5F5F'
          },
          color: {
            header: '#ccc',
            headerText: '#f00'
          },
          buttons: {
            ok: 'Ok',
            cancel: 'Cancel'
          },
          overlayOpacity: 0.5, // 0.5 as default
          dismissible: true // as true as default
        },
        	form_test:{
			        status_id: null,
			        description: null,
			        user_id: null,
			    	  client_id:null,
              date_created:null,
			    },
          alert:{
            oper:null,
            msg:null,
          },
			    form: {
			        description: null,
			        status_id: null,
			        client_id: null,
			        user_id:null,
              date_created:null,
			    },
            effect: 'fadeLeft',
            currentContent: 0,
            filter: null,
            showModal:false,
            someData:null,
            admin: false,
            draft:{},
            section:4,
            selectedStatus:null,
            selectedLawyer:null,
            optionStatus:[],
            optionLawyers:[],
            clients:[],
            titlemodal:'Buscar cliente',
            name:'',
            client:{
              id:null,
              name:null,
              email:null,
              phone:null,
              address:null,
            }
          }
        },
        components: {
          'date-picker': myDatepicker
        },
        mounted(){
            this.$store.dispatch('listComponents');
            this.list();
        },
        methods:{
            list() { //ctx
              let self=this;
              axios.get('api/listCreateCase').then((res)=>{
                  // console.log(res);
                    if (res.status == 200)  {
                        // slf.totalRows= res.data.data.length;
                        var status =res.data.status;
                        var lawyers=res.data.lawyers;
                        self.clients=res.data.clients;
                         for (var i = status.length - 1; i >= 0; i--) {
                           var obj={};
                           obj.value = status[i].id;
                           obj.text=status[i].name;
                           self.optionStatus.push(obj);
                         }
                         for (var i = lawyers.length - 1; i >= 0; i--) {
                           var obj={};
                           obj.value = lawyers[i].id;
                           obj.text= lawyers[i].name;
                           self.optionLawyers.push(obj);
                         }
                    }
                })
                .catch((error)=>{
                    
                })
           },getClient(index){
              this.form = Object.assign({}, this.clients[index]);
              this.back();

            },modalClient(){
              this.errors.clear();
              this.$refs.myModalRef.show();
            },
            back() {
            // this.resetInputs();
            this.errors.clear();
            this.$refs.myModalRef.hide();
            },
            edit(content){
                this.draft = clone(content);
            },
            cancel(content,index){
                this.draft = {};
            },
            remove(idComponent){
                var obj={};
                obj.section=this.section;
                obj.idcomponent=idComponent;
                this.$store.dispatch('removeComponent',obj).then(() => {
                    this.draft = {};
                    this.$loading.endLoading('deleteComponent'+idComponent);
                    
                })
                .catch(() => {
                    console.log('error');
                })
            },

            //pendientes
            processFile(e){
                 var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                    this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;
                reader.onload = (e) => {
                    vm.draft.img = e.target.result;
                };
                reader.readAsDataURL(file);
            },

            //modal
            setCurrent(index){
                this.currentContent = this.contents[index]['detailmodal'];
                this.$refs.modal1.show()
            },

            hideModal(){
                this.$refs.modal1.hide()
            },
            shortExpanded(index) {
                marked.setOptions({
                renderer: new marked.Renderer(),
                gfm: true,
                tables: true,
                breaks: true,
                pedantic: false,
                sanitize: true,
                smartLists: true,
                smartypants: false,
                breaks: true,
                });
                var content = marked(this.contents[index] ? this.contents[index].modal_text : '').substring(0, 600) + '...'
                return content
            },
            saveCase(){
              this.form.date_created = this.startTime.time;  
              console.log(this.form.date_created);
                this.$validator.validateAll().then((result) => {
                  if(result){
                    var slf = this;
                    axios.post('api/editCase', this.form).then((res)=>{
                    console.log(res);
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
              },
        },
        computed: {
             searchClients: function(){
                var valor =this.clients.filter((client) => client.name.includes(this.name));
              console.log(valor);
                return valor;
            },
            contentExpanded() {
              marked.setOptions({
                renderer: new marked.Renderer(),
                gfm: true,
                tables: true,
                breaks: true,
                pedantic: false,
                sanitize: true,
                smartLists: true,
                smartypants: false
              });
              return marked(this.currentContent ? this.currentContent.modal_text : '' )
             },contents(){
                var list_components=this.$store.getters.getComponents(this.section);
                return list_components.components;
             }
        },
    }
</script>