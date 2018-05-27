<template>
    <div>
        <new-contact :show="showModal" @close="showModal = false"/>
        <section class="container-fluid" id="contact">
                <div class="row">
                    <div class="col-sm-12 col-md-4 p-0 mb-0" v-for="(content,index) in contents">
                        <template v-if="content.id != draft.id">
                            <div>
                                <img class=" w-100" alt="" :src="content.image">
                            </div>
<!--                             <template v-if="admin">
                            <button type="button" class="btn btn-info ml-6 mr-6" @click="edit(content,index)"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-danger ml-6 mr-6 " @click.prevent="remove(index)"><i class="far fa-trash-alt"></i></button>
                            </template> -->
                        </template>
<!--                         <template v-else>
                            <div class="form-group">
                            <label for="formGroupExampleInput">Image</label>
                                <input class="form-control" type="file" @change.prevent="processFile($event)">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" @click.prevent="save(content,index)"><i class="fas fa-check"></i></button>
                                <button class="btn btn-danger" @click.prevent="cancel(content,index)"><i class="fas fa-ban"></i></button>
                            </div>
                        </template> -->
                    </div>
                </div>
        </section>
        <!-- <button v-if="admin" class="btn btn-danger text-center align-self-center" style="margin: 10px" @click.prevent="showModal = true">Add Img</button> -->
    </div>
</template>
<script>

let marked = require('marked');
    export default{
        props:['component'],
        data(){
            return{
                currentContent: 0,
                showModal:false,
                someData:null,
                admin: false,
                draft:{},
                section:5,

            }
        },
        mounted(){
            
        },
        methods:{
            
            setCurrent(index){
                this.currentContent = this.contents[index]['detailmodal'];
                this.$refs.modal1.show()
            },

            hideModal(){
                this.$refs.modal1.hide()
            },

        },
        computed: {
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
    // export default{
    //     methods:{
    //         edit(content, index){
    //             this.draft = clone(content);
    //         },
    //         save(content,index){
    //             this.contents[index] = this.draft
    //             this.draft = {};
    //         },
    //         cancel(content,index){
    //             this.draft = {};
    //         },
    //         processFile(e){
    //              var files = e.target.files || e.dataTransfer.files;
    //             if (!files.length)
    //                 return;
    //                 this.createImage(files[0]);
    //         },
    //         createImage(file) {
    //             var image = new Image();
    //             var reader = new FileReader();
    //             var vm = this;
    //             reader.onload = (e) => {
    //                 vm.draft.img = e.target.result;
    //             };
    //             reader.readAsDataURL(file);
    //         },
    //         remove(index){
    //             Vue.delete(this.contents,index);
    //         },
    //     }
    // }
</script>




