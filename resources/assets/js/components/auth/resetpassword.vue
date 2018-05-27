<template>
   <b-container>
      <b-row class="justify-content-center">
        <b-col md="8" >
          <div class="card">
                <h2 class="card-title ml-3 pt-2">Resetear Contraseña</h2>
                <div class="card-body card-login">
                    <!--- ALERT SUCCESS ---->
                    <div v-show="alert.msg != ''">
                        <div class="alert-container">
                            <transition enter-active-class="animated fadeInLeft">
                                <div class="alert" :class="'alert-'+alert.oper" role="alert">
                                  {{alert.msg}}
                                </div>                          
                            </transition>
                        </div>
                    </div>
                    <b-form>
                       <b-form-group id="InputGroup1" class="label-form"
                                    label="Usuario:"
                                    label-for="formEmail"
                                    :state="validemail && !errors.has('email')"
                                    >
                        <b-form-input id="formEmail" 
                                      @click.native="resetError"
                                      type="email"
                                      name="email"
                                      v-model.trim="form.email"
                                      :state="validemail && !errors.has('email')"
                                      placeholder="Correo Electronico"
                                       v-validate="'required|email'">
                        </b-form-input>
                      </b-form-group>
                      <b-form-group id="InputGroup1" class="label-form"
                                    label="Password:"
                                    label-for="formPassword"
                                    :state="!errors.has('password')"
                                    >
                        <b-form-input id="formPassword" 
                                      type="password"
                                      name="password"
                                      v-model.trim="form.password"
                                      :state="!errors.has('password')"
                                      placeholder="Contrasena"
                                       v-validate="'required'">
                        </b-form-input>
                      </b-form-group>
                      <b-form-group id="InputGroup1" class="label-form"
                                    label="Confirmar Password:"
                                    label-for="formConPassword"
                                    :state="!errors.has('password_confirmation')"
                                    >
                        <b-form-input id="formConPassword" 
                                      type="password"
                                      name="password_confirmation"
                                      v-model.trim="form.password_confirmation"
                                      :state="!errors.has('password_confirmation')"
                                      placeholder="Confirmar Contrasena"
                                       v-validate="'required|confirmed:password'">
                        </b-form-input>
                      </b-form-group>
                      <b-button type="button" @click="setPass" variant="primary">Reset Password</b-button>
                    </b-form>
                  </div>
                </div>
          </b-col>
      </b-row>
  </b-container>
</template>
<script>
  export default {
  data () {
    return {
      csrf_token: axios.defaults.headers.common['X-CSRF-TOKEN'],
      validemail:true,
      form: {
        email: '',
        password: '',
        password_confirmation:'',
        token:this.$route.params.hash,
      },
      alert:{
        oper:null,
        msg:null,
      }
    }
  },mounted() {
      //this.validView();
  },methods: {
    // validView(){
    //   var sfl=this;
    //   var obj={};
    //   obj.hash=this.form.token;
    //   axios.post('../../validViewHash',obj)
    //     .then(response => {
    //        console.log(response);
    //     })
    //     .catch(error => {
    //         console.log(error.response)
    //     });
    // },
    resetError(){
      this.alert.msg=null;
      this.alert.oper=null;
      this.validemail=true;
    },
    setPass(){     
      this.$validator.validateAll().then((result) => {
        if(result){
          this.sendForm();
        }
      }).catch(() => {console.log('error form')});
    },sendForm(){  
      axios.post('../../api/password/reset', this.form).then((res)=>{
          if (res.status == 200)  {
            this.alert.msg=res.data.msg;
            this.alert.oper=res.data.oper;
            var sfl=this;
            axios.post('../../logout')
              .then(response => {
                  sfl.$store.commit('logout');
                  sfl.$router.push('/login');
                  // location.reload();
              })
              .catch(error => {
                  console.log(error.response)
              });
          }
      })
      .catch((error)=>{
        this.alert.msg=error.response.data.msg;
        this.alert.oper=error.response.data.oper;
      });
    }
  }
}
</script>

