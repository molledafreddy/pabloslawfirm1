<template>
	<div>
		<modal v-if="show" @close="show = false">
				<h3 class="col-sm-12 col-md-12 col-lg-12  text-center align-self-center" slot="header">
					Create a new Visa
				</h3>

				<div slot="body">
					<div class="row py-2 ">
						<div class="col-sm-12 col-md-12 col-lg-12  text-center align-self-center form-group">
							<label class="control-label">New title:</label>
							<div class="col-md-12">
								<input type="text" class="form-control" v-model="new_visa.title">
							</div>
							<label class="control-label">New description:</label>
							<div class="col-md-12">
								<input type="text" class="form-control" v-model="new_visa.description">
							</div>
							<label class="control-label">Button Name:</label>
							<div class="col-md-12">
								<input type="text" class="form-control" v-model="new_visa.button">
							</div>
						</div>
					</div>

					<div class="row py-2 ">
						<div class="col-sm-12 col-md-12 col-lg-12  text-center align-self-center form-group">
							<label class="control-label">New Image:</label>
							<div class="col-md-12">
								<label type="button" class="btn btn-info" @change="processFile($event)"><i class="far fa-image"></i>
										Add Image
									<input type="file" style="display:none" >
								</label>

								<img :src="image" style="height:150px; width=150px">
							</div>
						</div>
					</div>
				</div>

			<div slot="footer">
				<button class="btn btn-danger btn-sm" @click="close()"><i class="fas fa-times"></i></button>
				<button class="btn btn-primary btn-sm" @click="save()"><i class="fas fa-cloud-upload-alt"></i></button>

			</div>
  		</modal>
	</div>
</template>

<script>
	export default{
		props:['show'],
		data(){
			return{
				new_visa:{},
				someData:'',
				file_name:'',
				image:'',
			}
		},
		methods:{
			save(){
				var test={};
				test.id=Math.random();
				test.title=this.new_visa.title;
				test.description=this.new_visa.description;
				test.button=this.new_visa.button;
				test.img=this.image;
				var ultimoindex='';
		         for (var i in this.$parent.contents) {
		            ultimoindex=i;
		         }
		        var ind=parseInt(ultimoindex)+1;
		        Vue.set(this.$parent.contents,ind,test);
		        this.$emit('close');
				this.new_visa={};
				this.image = ''
			},
			processFile(e) {
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
		        	vm.image = e.target.result;
		      	};
      			reader.readAsDataURL(file);
    		},
			removeImage: function (e) {
	      		this.image = '';
			},
			close(){
				this.$emit('close')
				this.new_visa={};
				this.image = ''
			}
			
		}
	}
</script>
