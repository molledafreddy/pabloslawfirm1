<template>
    <nav class="navbar navbar-expand-lg navbar-light" :class="{'bg-light':styleMenu,'menu1':!styleMenu}">
      <a class="navbar-brand" :href="root"><img class="img-fluid logo d-md-none d-lg-block" :src="root+'/img/logo.png'" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"  aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav ml-auto">
         <ul class="navbar-nav mr-auto">
             <template v-if="styleMenu">
                <li class="nav-item">
                    <a class="nav-link ancla" v-scroll-to="'#home'" href="#">INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ancla" href="#" @click="services" v-scroll-to="'#services'">SERVICIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ancla" href="#" @click="visas" v-scroll-to="'#visas'">VISAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ancla" href="#" @click="process" v-scroll-to="'#process'" >NUESTRO PROCESO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ancla" href="##" v-scroll-to="'#testimony'">TESTIMONIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ancla" href="#" @click="about" v-scroll-to="'#about'">SOBRE LOS ABOGADOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ancla" v-scroll-to="'#contact'" href="#">CONTACTANOS</a>
                </li>
                <li class="nav-item">
                     <router-link to="/login" class="nav-item nav-link ancla" href="" v-show="!validAuthenticated">LOGIN</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/home" class="nav-item nav-link ancla" href="" v-show="validAuthenticated">HOME</router-link>
                </li>
                <li class="nav-item">
                    <a v-show="validAuthenticated"  @click="logout" class="nav-item nav-link ancla" href="#"  >CERRAR SESSION</a>
                </li>
                </template>
                <template v-else>
                     <li class="nav-item">
                        <router-link to="/" class="nav-item nav-link ancla" href=""    v-show="validAuthenticated">GESTION DE CASOS</router-link>
                      </li>
                      <li class="nav-item">
                        <router-link to="/" class="nav-item nav-link ancla" href="" v-show="validAuthenticated">DASHBOARD ASISTENTE</router-link>
                      </li>
                      <li class="nav-item">
                        <router-link to="/" class="nav-item nav-link ancla" href="" v-show="validAuthenticated">DASHBOARD ABOGADO</router-link>
                      </li>
                      <li class="nav-item dropdown" v-show="validAuthenticated">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          ADMIN
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <router-link to="/" class="nav-item nav-link ancla" href="" >Usuarios</router-link>
                          <router-link to="/" class="nav-item nav-link ancla" href="" >Roles</router-link>
                          <router-link to="/" class="nav-item nav-link ancla" href="" >Estatus de Casos</router-link>
                        </div>
                      </li>
                      <li class="nav-item">
                        <router-link to="/login" class="nav-item nav-link ancla" href="" v-show="!validAuthenticated">LOGIN</router-link>
                      </li>
                      <li class="nav-item">
                        <a v-show="validAuthenticated"  @click="logout" class="nav-item nav-link ancla" href="#"  >CERRAR SESSION</a>
                      </li>
                </template>
            </ul>
        </div>
    </div>
</nav>
</template>
<script>
    export default{
     data(){
            return{
                root:null,
                style:false,
            }
        },
        mounted() {
            this.$store.dispatch('listComponents');
            this.root=window.location.origin;
            //console.log(window.location.pathname);
        },
        methods:{
            services(){
                this.$store.commit('deleteContent',2);
                this.$store.dispatch('listComponentbyId',2);
            },
            process(){
                this.$store.commit('deleteContent',3);
                this.$store.dispatch('listComponentbyId',3);
            },
            visas(){
                this.$store.commit('deleteContent',7);
                this.$store.dispatch('listComponentbyId',7);
            },
            about(){
                this.$store.commit('deleteContent',4);
                this.$store.dispatch('listComponentbyId',4);
            },logout(){
                let vm = this;
                axios.post('api/logout')
                .then(response => {
                    vm.$store.commit('logout');
                    vm.$router.push('/login');
                    // location.reload();
                })
                .catch(error => {
                    console.log(error.response)
                });
            },
        },computed: {
          validAuthenticated(){
            console.log(this.$store.getters.getSession);
            if(this.$store.getters.getSession.name!=undefined){
              //this.name_user=this.$store.getters.getSession[0].name;
              return true;
            }else{
              return false;
            }
          },styleMenu(){
            return this.$route.path=="/";
          }
        }
    }
</script>
<style>
    .menu1{
        min-height: 100px!important;
        background-color: #1E88E5!important;
    }
    /*.menu{
        height: 25vh!important;
    }*/
</style>