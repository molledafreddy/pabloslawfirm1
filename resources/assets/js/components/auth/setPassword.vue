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
                                    label="Email:"
                                    label-for="formEmail"
                                    :state="validemail && !errors.has('email')">
                        <b-form-input id="formEmail" 
                                      @click.native="resetError"
                                      type="email"
                                      v-model="form.email"
                                      name="email"
                                      :state="validemail && !errors.has('email')"
                                       v-validate="'required|email'"
                                      placeholder="Correo Electronico">
                        </b-form-input>
                      </b-form-group>
                      <b-button type="button" @click="ValidEmail" variant="primary">Enviar</b-button>
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
      form: {
        email: ''
      },
      validemail:true,
      alert:{
        msg:null,
        oper:null
      }
    }
  },
  methods: {
    resetError(){
      this.alert.msg=null;
      this.alert.oper=null;
      this.validemail=true;
    },
    ValidEmail() {
      this.$validator.validateAll().then((result) => {
          if(result){
            var slf=this;
            axios.post('../api/validEmail', this.form).then((res)=>{
                if (res.status == 200)  {
                  if(slf.$store.getters.getSession.name!=undefined){
                    slf.validemail=false;
                    slf.alert.oper='danger';
                    slf.alert.msg='Error! Debe cerrar la session para continuar';
                    //slf.$router.push('/home');
                  }else{
                    if(res.data.oper==true){
                      slf.alert.oper='success';
                      slf.alert.msg=res.data.msg;
                    }else{
                      slf.alert.oper='danger';
                      slf.alert.msg=res.data.msg;
                      slf.validemail=false;
                    }
                  }
                }
            })
            .catch((error)=>{
              this.validemail=false;
              this.alert.msg=error.response.data.msg;
              this.alert.oper=error.response.data.oper;
            });
        }
      }).catch(() => {console.log('error form')});
      
    }
  },computed: {

  }
}
</script>
<style>

</style> 