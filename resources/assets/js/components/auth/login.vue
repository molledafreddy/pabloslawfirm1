<template>
  <b-container class="pt-5">
    <b-row class="justify-content-center">
      <b-col md="8" >
      <div class="card">
          <h2 class="card-title ml-3 pt-2">Iniciar Sesión</h2>
          <div class="card-body card-login">
             <!--- ALERT SUCCESS ---->
              <div v-if="alert.msg != ''">
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
                <b-form-group id="InputGroup2" class="label-form"
                              label="Contraseña:"
                              label-for="formPassword"
                              :state="!errors.has('password')">
                  <b-form-input id="formPassword"
                                type="password"
                                name="password"
                                v-model="form.password"
                                placeholder="Password"
                                :state="!errors.has('password')"
                                v-validate="'required'">
                  </b-form-input>
                </b-form-group>
                <b-button type="submit" @click.prevent="doLogin" variant="primary">Autenticar</b-button>
                 <router-link to="/setpassword" class="btn btn-link" href="">¿Olvido su Contraseña?</router-link>
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
        email: '',
        password: ''
      },
      alert:{
        oper:null,
        msg:null,
      }
    }
  },
  methods: {
    doLogin(){     
      this.$validator.validateAll().then((result) => {
        if(result){
          var slf = this;
          axios.post('api/login', this.form).then((res)=>{
              console.log(res);
              if (res.status == 200)  {
                  slf.alert.oper='success';
                  slf.alert.msg='Usuario autenticado con éxito';
                  slf.$store.dispatch('setSession',res.data.user);
                  slf.$router.push('/home');
              }
          })
          .catch((error)=>{
              if(error.response.status=422){
                  this.alert.oper='danger';
                  this.alert.msg='Error en los datos de autenticación';
              }
          })
        }
      }).catch(() => {console.log('error form')});
    }
  },computed: {
    
  },
}
</script>
<style>

</style>

<!-- b-form-1.vue -->