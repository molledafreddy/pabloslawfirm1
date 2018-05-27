<template>
	<div>
		<b-modal id="newUser" ref="newUser" title="Nuevo usuario">
			<b-container>
				<form data-form-title="Crear Usuarios">
                    <input type="hidden" value="" data-form-email="true">
                    <div class="form-group">
                    	<h5>Nombre y Apellido</h5>
                        <input type="text" class="form-control" v-model="name" required>
                    </div>
                    <div class="form-group">
                    	<h5>Email</h5>
                        <input type="email" class="form-control" v-model="email" required>
                    </div>
                    <div class="form-group">
                    	<h5>Rol del Usuario</h5>
                    	<select  class="form-control" v-model="role_id">
                    		<option value="">Seleccionar Rol</option>
                            <option v-for="profile in profiles" :value="profile" required>{{profile.name}}</option>
                    	</select>
                    </div>
                    <div>
                        <b-form-checkbox id="checkbox1"
                        v-model="status"
                        value="Activo"
                        unchecked-value="Inactivo">
                        </b-form-checkbox>
                    <div>Status: <strong>{{status}}</strong></div>
                    </div>
	            </form>
    			
		 	</b-container>
		   <div slot="modal-footer" >
		     	<b-btn  variant="outline-danger" @click="close()">
           			Cerrar
         		</b-btn>
         		<b-btn  variant="outline-primary" @click="create()">
           			Crear
         		</b-btn>
         	</div>
  		</b-modal>		
	</div>
</template>

<script>
	export default{
		  data () {
           	return{
                name: '',
                email: '',
                profiles:[],
                role_id:'',
                status:'Inactivo',
            }                       
       },
       mounted() {
            this.getRoles()
        },
        methods:{
        	create(){
                axios.post('api/createUser',{
                    name: this.name,
                    email: this.email,
                    profile_id: this.role_id,
                    status: this.status,
                })
                .then(response => {
                    this.$refs.newUser.hide()
                    this.$parent.items.unshift({
                        id:response.data.data.id,
                        name:response.data.data.name,
                        email:response.data.data.email,
                           profile:response.data.data.profile,
                        profile_id:response.data.data.profile_id,
                        status:response.data.data.status
                    })
                })
                .catch(error => {
                    console.log(error)
                })
            },
            getRoles(){
	            let vm = this;
	            axios.get('/getRoles',)
  				.then(function (response) {
                    console.log(response.data)
    				vm.profiles = response.data;
  				})
  				.catch(function (error) {
    				console.log(error);
  				});   
          	},
			close(){
				this.$refs.newUser.hide()
			}
		}
	}
</script>